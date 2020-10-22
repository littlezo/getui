<?php
namespace Gt\Client\Igetui\IGtAPNPayload;

class SimpleAlertMsg implements ApnMsg{
    var $alertMsg;

    public function get_alertMsg() {
        return $this->alertMsg;
    }
}