<?php


namespace getui\Client;

use getui\GeTuiException;

class Task extends Entity
{
    public $taskId;

    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    /**
     * 执行推送服务
     * @param bool $is_detail
     * @return bool|mixed
     * @throws GeTuiException
     */
    public function run($is_detail = false)
    {
        if (!$this->taskId) {
            throw new GeTuiException('taskid不存在');
        }
        $res = ['need_detail' => $is_detail, 'taskid' => $this->taskId,];
        if ($this->alias && is_array($this->alias)) {
            $res['alias'] = $this->alias;
        }
        if ($this->cid && is_array($this->cid)) {
            $res['cid'] = $this->cid;
        }
        if (empty($res['cid'])) {
            throw new GeTuiException('推送对象非列表');
        }
        $this->reset();
        return $this->api->pushTask($res);
    }

    /**
     * 保存推送任务
     * @throws \getui\GeTuiException
     */
    public function save()
    {
        $taskId = $this->api->saveTask($this->buildRequestData());
        if (!$taskId) {
            throw new GeTuiException('个推任务保存失败了。');
        }
        $this->taskId = $taskId;
        return $this;
    }
}
