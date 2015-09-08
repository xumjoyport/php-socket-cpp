<?php
/**
 * Created by PhpStorm.
 * User: garming
 * Date: 8/20/15
 * Time: 22:13
 */

namespace NetData\Lib;


use NetData\NetdataInterface;

class nireusNetdata implements NetdataInterface
{
    private $pack_type = 1;
    private $proc_type = 0;
    private $proc;//协议号
    private $client_order;
    private $client_id;
    private $data;
    private $response;
    private $read_point = 0;

    public function __construct(){
        $this->data = net_data_create(0);
    }
    function getData()
    {
        $send = $this->data;
        $this->data = null;
        return $send;
    }

    function setData($response)
    {
//        var_dump($response->getData());
//        if (strlen($response) < 19) {
//            throw new \Exception('Illegal response');
//        }
//        $this->read_point = 0;
//
//        $this->pack_type    = unpack("C",substr($response, 0, 1))[1];
//        $this->proc_type    = unpack("C",substr($response, 1, 1))[1];
//        $this->proc         = unpack("V",substr($response, 2, 4))[1];
//        $this->client_order = unpack("V",substr($response, 6, 4))[1];
//        $this->client_id    = unpack("V",substr($response, 10, 4))[1];
//        $len                = unpack("V",substr($response, 14, 4))[1];
//
//        if(!is_numeric($len)){
//            throw new \Exception('Illegal response header');
//        }

        $this->response = $response;
    }

    function setProc($proc)
    {
        $this->proc = $proc;
    }

    function getProc()
    {
        return $this->proc;
    }

    public function readBool()
    {
        return net_data_read_byte($this->response);
    }

    public function readInt8()
    {
        return net_data_read_byte($this->response);
    }

    public function readInt16()
    {
        throw new \Exception("nireus netdata don't support readInt16");
    }

    public function readInt32()
    {
        return net_data_read_int($this->response);
    }

    public function readFloat32()
    {
        throw new \Exception("nireus netdata don't support readFloat32");
    }

    public function readFloat64()
    {
        return net_data_read_double($this->response);
    }

    public function readString()
    {
        return net_Data_read_string($this->response);
    }

    public function writeBool($v)
    {
        net_data_write_byte($this->data, $v);

    }

    public function writeInt8($v)
    {
        net_data_write_byte($this->data, $v);
    }

    public function writeInt16($v)
    {
        throw new \Exception("nireus netdata don't support writeInt16");
    }

    public function writeInt32($v)
    {
        net_data_write_int($this->data, $v);
    }

    public function writeFloat32($v)
    {
        throw new \Exception("nireus netdata don't support writeFloat32");
    }

    public function writeFloat64($v)
    {
        net_data_write_double($this->data, $v);
    }

    public function writeString($v)
    {
        net_data_write_string($this->data, $v);
    }
//    public function readInt64()
//    {
//        //TODO
//    }
//    public function readId()
//    {
//        //TODO
//    }
//    public function writeInt64($v)
//    {
//        //TODO
//    }
//    public function writeId($v)
//    {
//        //TODO
//    }
}