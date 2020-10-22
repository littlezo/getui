<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-10-21 22:27:59
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-10-22 11:56:54
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\pak\\getui\\src\\RequestClient.php
 */

namespace getui;

use Symfony\Component\Cache\Simple\FilesystemCache;
use GuzzleHttp\Client as HttpClient;

trait RequestClient
{

    /**
     * 请求uri
     * @var string
     */
    protected $baseUri = 'https://restapi.getui.com/v2/';

    /**
     * 授权token
     * @var string
     */
    protected $token;

    /**
     * 文件缓存实例
     * @var FilesystemCache
     */
    protected $cache;

    /**
     * 配置数组
     * @var array
     */
    protected $config;

    /**
     * 设置配置
     * @param array $config
     */
    public function init(array $config)
    {
        $this->config = $config;
        $this->baseUri .= $this->config['app_id'];
        $this->cache = new FilesystemCache();
    }

    /**
     * 获取鉴权的authToken
     * @return mixed
     * @throws GeTuiException
     */
    public function getAuthToken()
    {
        if ($this->token) {
            return $this->token;
        }
        if ($this->cache->has('auth_token.' . $this->config['app_id'])) {
            $this->token = $this->cache->get('auth_token.' . $this->config['app_id']);
            return $this->token;
        }
        $this->token = $this->auth();
        $this->cache->set('auth_token.' . $this->config['app_id'], $this->token, 3600 * 24);
        return $this->token;
    }

    /**
     * 个推鉴权
     * @return mixed
     * @throws GeTuiException
     */
    public function auth()
    {
        $data = [
            'appkey' => $this->config['app_key'],
            'timestamp' => (int)floor(microtime(true) * 1000),
        ];
        $data['sign'] = hash('sha256', "{$data['appkey']}{$data['timestamp']}{$this->config['master_secret']}");
        $ret = $this->request('POST', $this->baseUri . '/auth', $data, false);
        if ($ret['result'] != 'ok') {
            throw new GeTuiException('鉴权失败');
        }
        return $ret['auth_token'];
    }

    /**
     * 销毁授权token，删除auth缓存
     * @return bool
     * @throws GeTuiException
     */
    public function authDestroy()
    {
        $ret = $this->request('DELETE', $this->baseUri . '/auth' . '/' . $this->token, []);
        if ($ret['result'] != 'ok') {
            return false;
        }
        $this->cache->delete('auth_token.' . $this->config['app_id']);
        $this->token = '';
        return true;
    }

    /**
     * 发送http请求
     * @param $method
     * @param $url
     * @param array $data
     * @param bool $is_auth
     * @return mixed
     * @throws GeTuiException
     */
    protected function request($method, $url, array $data = [], $is_auth = true)
    {
        $client = new HttpClient(['timeout' => 5.0]);
        $response = $client->request($method, $url, [
            'json' => $data,
            'headers' => [
                'token' => $is_auth ? $this->getAuthToken() : '',
            ]
        ]);
        if ($response->getStatusCode() != 200) {
            throw new GeTuiException('请求个推服务器接口出现了异常，响应状态：' . $response->getStatusCode());
        }
        $ret = json_decode($response->getBody()->getContents(), true);
        if (!$ret) {
            throw new GeTuiException('个推响应结果异常，异常内容：' . $response->getBody()->getContents());
        }
        return $ret;
    }
}
