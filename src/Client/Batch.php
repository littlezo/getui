<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-10-21 22:36:56
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-10-21 22:44:29
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\getui\\src\\Client\\Batch.php
 */

namespace getui\Client;

use getui\GeTuiException;

class Batch extends Entity
{
    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    /**
     * 推送服务
     * 如果设置过条件，那么直接通过条件推送
     * @param bool $is_detail
     * @return bool|mixed
     * @throws GeTuiException
     */
    public function push($is_detail = false)
    {
        $res = $this->buildRequestData();
        if ($this->conditions) {
            $res['condition'] = $this->conditions;
            $this->reset();
            return $this->api->pushByConditions($res);
        }
        if (!($this->alias && is_array($this->alias)) && !($this->cid && is_array($this->cid))) {
            throw new GeTuiException('请先设置推送设备ID或者别名');
        }
        $arr = [];
        if ($this->cid) {
            foreach ($this->cid as $value) {
                $res = $this->buildRequestData();
                $res['cid'] = $value;
                $arr[] = $res;
            }
        }
        if ($this->alias) {
            foreach ($this->alias as $value) {
                $res = $this->buildRequestData();
                $res['alias'] = $value;
                $arr[] = $res;
            }
        }
        $this->reset();
        return $this->api->pushSingleBatch($arr, $is_detail);
    }
}
