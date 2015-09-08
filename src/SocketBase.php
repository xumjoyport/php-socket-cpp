<?php
/**
 * Created by PhpStorm.
 * User: garming
 * Date: 8/11/15
 * Time: 15:29
 */

namespace NetData;


class SocketBase
{
    public $pack_type=1;
    public $proc_type=0;
    public $proc;//协议号
    public $client_order;
    public $client_id;
    public $data;
    public $response;
    public $read_point = 0;
    public $socket;

    function getData()
    {
        $send = pack("CCVVVV",$this->pack_type,$this->proc_type,$this->proc,$this->client_order,$this->client_id,strlen($this->data)).$this->data;
        $this->data = null;
        return $send;
    }
    function setData($dt)
    {
        $this->read_point = 0;
        $this->response = substr($dt,18);//多出一个字节出来需要框架处理
    }
    function setProc($proc)
    {
        $this->proc = $proc;
    }
    function getProc()
    {
        return $this->proc;
    }
}