<?php namespace AdammBalogh\KeyValueStore\Adapter;

use AdammBalogh\KeyValueStore\Contract\AdapterInterface;

abstract class AbstractAdapter implements AdapterInterface
{
    /**
     * @return $this
     */
    public function getAdapter()
    {
        return $this;
    }

    /**
     * @return mixed
     */
    abstract public function getClient();
}
