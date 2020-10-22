<?php


namespace Gt\Client\Igetui\IGtReq;


use Gt\Client\Protobuf\Type\PBEnum;

class NotifyInfo_Type extends PBEnum
{
    const _payload  = 0;
    const _intent  = 1;
    const _url  = 2;
}