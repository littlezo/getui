<?php


namespace Gt\Client\Protobuf\Type;


class TypeHelp
{
    public static function newType($className, $arg = null)
    {
        $class = __NAMESPACE__ . '\\' . $className;
        if(class_exists($class)){
            return new $class($arg);
        } else {
            return \Gt\Client\Igetui\IGtReq\TypeHelp::newType($className, $arg);
        }
    }
}