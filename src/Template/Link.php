<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-10-21 22:40:02
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-10-21 22:42:09
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\getui\\src\\Template\\Link.php
 */


namespace Getui\Template;

class Link
{
    /**
     * 通知栏消息布局样式，详见Style说明
     * @var array
     */
    protected $style = [];

    /**
     * 打开网址
     * @var string
     */
    protected $url;

    /**
     * 设定展示开始时间，格式为yyyy-MM-dd HH:mm:ss
     * @var string
     */
    protected $duration_begin;

    /**
     * 设定展示结束时间，格式为yyyy-MM-dd HH:mm:ss
     * @var string
     */
    protected $duration_end;

    /**
     * 获取应用模板
     * @return array
     */
    public function getEntity()
    {
        $res = [
            'style' => $this->style,
            'url' => $this->url
        ];
        $this->duration_begin && $res['duration_begin'] = $this->duration_begin;
        $this->duration_end && $res['duration_end'] = $this->duration_end;
        return $res;
    }

    /**
     * @param array $style
     */
    public function setStyle($style)
    {
        $this->style = $style;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param string $duration_begin
     */
    public function setDurationBegin($duration_begin)
    {
        $this->duration_begin = $duration_begin;
    }

    /**
     * @param string $duration_end
     */
    public function setDurationEnd($duration_end)
    {
        $this->duration_end = $duration_end;
    }
}
