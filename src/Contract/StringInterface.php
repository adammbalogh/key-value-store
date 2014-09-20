<?php namespace AdammBalogh\KeyValueStore\Contract;

interface StringInterface
{
    public function append($key, $value);

    public function decr($key);

    public function decrBy($key, $decrement);

    public function get($key);

    public function getValueLength($key);

    public function incr($key);

    public function incrBy($key, $increment);

    public function set($key, $value);

    public function setIfNotExists($key, $value);
}
