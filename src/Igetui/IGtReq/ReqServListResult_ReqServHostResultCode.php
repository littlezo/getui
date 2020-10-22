<?php


namespace Gt\Client\Igetui\IGtReq;


use Gt\Client\Protobuf\Type\PBEnum;

class ReqServListResult_ReqServHostResultCode extends PBEnum
{
    const successed  = 0;
    const failed  = 1;
    const busy  = 2;
}