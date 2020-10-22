<?php


namespace Gt\Client\Igetui\IGtReq;



use Gt\Client\Protobuf\Type\PBEnum;

class ServerNotify_NotifyType extends PBEnum
{
    const normal  = 0;
    const serverListChanged  = 1;
    const exception  = 2;
}