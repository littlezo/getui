<?php


namespace Gt\Client\Igetui\IGtReq;


use Gt\Client\Protobuf\Type\PBEnum;

class PushResult_EPushResult extends PBEnum
{
    const successed_online  = 0;
    const successed_offline  = 1;
    const successed_ignore  = 2;
    const failed  = 3;
    const busy  = 4;
    const success_startBatch  = 5;
    const success_endBatch  = 6;
    const successed_async  = 7;
}