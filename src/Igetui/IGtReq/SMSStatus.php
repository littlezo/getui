<?php


namespace Gt\Client\Igetui\IGtReq;


use Gt\Client\Protobuf\Type\PBEnum;

class SMSStatus extends PBEnum
{
    const unread  = 0;
    const read  = 1;
}