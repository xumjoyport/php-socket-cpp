<?php
/**
 * Created by PhpStorm.
 * User: garming
 * Date: 8/5/15
 * Time: 16:52
 */

namespace NetData\Lib;


use NetData\SocketInterface;

class ShortSocket implements SocketInterface
{
    private static $__flag = false;
    private static $__instance;
    private $socket;

    private function __construct($params)
    {
        if (!isset($params[0]['host']) || !isset($params[0]['port'])) {
            throw new \Exception('socket config error');
        }
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        foreach($params as $k => $v){
            if(isset($v['host']) && isset($v['port'])){
                if(socket_connect($this->socket, $v['host'], $v['port'])){
                    socket_write($this->socket, "12345678912345678912345");
                    self::$__flag = true;
                    break;
                }
            }
        }
    }

    public static function connect($params)
    {
        if (!(self::$__instance instanceof self)) {
            self::$__instance = new self($params);
            if (!self::$__flag) {
                throw new \Exception('connection error:there is not connection with all hosts');
            }
        }
        return self::$__instance;
    }

    /**
     * 同步访问
     * @param $netdata
     * @return mixed
     */
    public function call($netdata)
    {
        socket_write($this->socket, $netdata->getData());
        $netdata->socket = $this->socket;
        $netdata->setData();
    }

    /**
     * 异步访问
     * @param $netdata
     * @param $callback
     * @return mixed
     */
    public function send($netdata, $callback)
    {
    }

    /**
     * 服务端下发
     * @return mixed
     */
    public function notify()
    {
    }
}