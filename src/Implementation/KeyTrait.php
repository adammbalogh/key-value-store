<?php namespace AdammBalogh\KeyValueStore\Implementation;

trait KeyTrait
{
    public function delete($key)
    {
        $this->adapter->delete($key);
    }

    public function expire($key, $seconds)
    {
        $this->adapter->expire($key, $seconds);
    }

    public function expireAt($key, $timestamp)
    {
        $this->adapter->expireAt($key, $timestamp);
    }

    public function getKeys()
    {
        $this->adapter->getKeys();
    }

    public function getTtl($key)
    {
        $this->adapter->getTtl($key);
    }

    public function has($key)
    {
        $this->adapter->has($key);
    }

    public function persist($key)
    {
        $this->adapter->persist($key);
    }
}
