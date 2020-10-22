<?php


namespace Gt\Client\Igetui\IGtReq;


class TypeHelp
{
    public static function newType($className, $arg = null)
    {
        $class = __NAMESPACE__ . '\\' . $className;
        return new $class($arg);
    }
}