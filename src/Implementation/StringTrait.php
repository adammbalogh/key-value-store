<?php namespace AdammBalogh\KeyValueStore\Implementation;

trait StringTrait
{
    public function append($key, $value)
    {
        $this->adapter->append($key, $value);
    }

    public function decr($key)
    {
        $this->adapter->decr($key);
    }

    public function decrBy($key, $decrement)
    {
        $this->adapter->decrBy($key, $decrement);
    }

    public function get($key)
    {
        $this->adapter->get($key);
    }

    public function getValueLength($key)
    {
        $this->adapter->getValueLength($key);
    }

    public function incr($key)
    {
        $this->adapter->incr($key);
    }

    public function incrBy($key, $increment)
    {
        $this->adapter->incrBy($key, $increment);
    }

    public function set($key, $value)
    {
        $this->adapter->set($key, $value);
    }

    public function setIfNotExists($key, $value)
    {
        $this->adapter->setIfNotExists($key, $value);
    }
}
