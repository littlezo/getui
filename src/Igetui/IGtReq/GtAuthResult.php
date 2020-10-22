<?php


namespace Gt\Client\Igetui\IGtReq;


use Gt\Client\Protobuf\PBMessage;

class GtAuthResult extends PBMessage
{
    var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
    public function __construct($reader=null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "PBInt";
        $this->values["1"] = "";
        $this->fields["2"] = "PBString";
        $this->values["2"] = "";
        $this->fields["3"] = "PBString";
        $this->values["3"] = "";
        $this->fields["4"] = "PBString";
        $this->values["4"] = "";
        $this->fields["5"] = "PBString";
        $this->values["5"] = array();
    }
    function code()
    {
        return $this->_get_value("1");
    }
    function set_code($value)
    {
        return $this->_set_value("1", $value);
    }
    function redirectAddress()
    {
        return $this->_get_value("2");
    }
    function set_redirectAddress($value)
    {
        return $this->_set_value("2", $value);
    }
    function seqId()
    {
        return $this->_get_value("3");
    }
    function set_seqId($value)
    {
        return $this->_set_value("3", $value);
    }
    function info()
    {
        return $this->_get_value("4");
    }
    function set_info($value)
    {
        return $this->_set_value("4", $value);
    }
    function appid($offset)
    {
        $v = $this->_get_arr_value("5", $offset);
        return $v->get_value();
    }
    function append_appid($value)
    {
        $v = $this->_add_arr_value("5");
        $v->set_value($value);
    }
    function set_appid($index, $value)
    {
        $v = $this->newType($this->fields["5"]);
        $v->set_value($value);
        $this->_set_arr_value("5", $index, $v);
    }
    function newType($className)
    {
        $className = '\Gt\Client\Protobuf\Type\'' . $className;

        return new $className();
    }

    function remove_last_appid()
    {
        $this->_remove_last_arr_value("5");
    }
    function appid_size()
    {
        return $this->_get_arr_size("5");
    }
}