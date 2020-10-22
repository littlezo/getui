<?php
namespace Gt\Client\Payload;

use RuntimeException;

Class VOIPPayload {
    var $voIPPayload;

    public function get_payload()
    {
        $payload = $this->voIPPayload;
        if($payload == null || empty($payload)){
            throw new RuntimeException("Payload cannot be empty");
        }
        $params = array();
        if($payload != null){
            $params["Payload"] = $payload;
        }
        $params["isVoIP"] = 1;
        return json_encode($params);
     }

     public function setVoIPPayload($voIPPayload){
        $this->voIPPayload = $voIPPayload;
     }

}