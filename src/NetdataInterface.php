<?php
/**
 * Created by PhpStorm.
 * User: garming
 * Date: 8/20/15
 * Time: 22:04
 */

namespace NetData;


interface NetdataInterface
{
    function getData();
    function setData($response);
    function setProc($proc);
    function getProc();
    function readBool();
    function readInt8();
    function readInt16();
    function readInt32();
    function readFloat32();
    function readFloat64();
    function readString();
    function writeBool($v);
    function writeInt8($v);
    function writeInt16($v);
    function writeInt32($v);
    function writeFloat32($v);
    function writeFloat64($v);
    function writeString($v);
//    function readInt64();
//    function readId();
//    function writeInt64($v);
//    function writeId($v);
}