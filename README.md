# PHP Socket Library
=======================

## Requirements

- php5.6+

## Installation

  - composer.json  
  ```
  "require":
        {
             "joyport/netdata":  "dev-master"
        }
  ```

  - command  
  ```composer install``` or ```composer update```


## Introduction

- socket连接c++服务器的php封装库

## How to use Muticall

```
<?php
    $params = [
        [
            'host' => '10.0.19.41',
            'port' => 1234,
        ]
    ];
    $nd = \NetData\Instance::get();
    $socket = \NetData\SocketService::start($params);
    $nd->setProc(20000);
    $nd->writeBool(1);
    $nd->writeInt8(97);
    $nd->writeInt16(10086);
    $nd->writeInt32(-10086);
    $nd->writeFloat32(3.14);
    $nd->writeFloat64(4.123456789);
    $nd->writeString('中guoRen');
    $socket->call($nd);

    print_r($nd->readBool().' ');
    print_r($nd->readInt8().' ');
    print_r($nd->readInt16().' ');
    print_r($nd->readInt32().' ');
    print_r($nd->readFloat32().' ');
    print_r($nd->readFloat64().' ');
    print_r($nd->readString().' ');
?>
```
## License
MIT License see http://mit-license.org/
