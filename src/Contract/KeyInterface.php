<?php namespace AdammBalogh\KeyValueStore\Contract;

interface KeyInterface
{
    public function delete($key);

    public function expire($key, $seconds);

    public function expireAt($key, $timestamp);

    public function getKeys();

    public function getTtl($key);

    public function has($key);

    public function persist($key);
}
