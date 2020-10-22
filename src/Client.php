<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-10-21 22:30:31
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-10-21 22:44:56
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\getui\\src\\Client.php
 */

namespace getui;

use getui\Client\Batch;
use getui\Client\Single;
use getui\Client\Task;

class Client
{
    public $api;
    public $single;
    public $batch;
    public $task;

    /**
     * Client constructor.
     * @param array $config
     * @throws GeTuiException
     */
    public function __construct(array $config)
    {
        if (!$config) {
            throw new GeTuiException('未设置配置信息');
        }
        $this->api = new Getui($config);
        $this->single = new Single($config);
        $this->batch = new Batch($config);
        $this->task = new Task($config);
    }
}
