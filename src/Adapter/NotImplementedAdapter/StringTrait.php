<?php namespace AdammBalogh\KeyValueStore\Adapter\NotImplementedAdapter;

use AdammBalogh\KeyValueStore\Exception\NotImplementedException;

/**
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
trait StringTrait
{
    /**
     * @param string $key
     * @param string $value
     *
     * @throws NotImplementedException
     */
    public function append($key, $value)
    {
        throw new NotImplementedException();
    }

    /**
     * @param string $key
     *
     * @throws NotImplementedException
     */
    public function decrement($key)
    {
        throw new NotImplementedException();
    }

    /**
     * @param string $key
     * @param int $decrement
     *
     * @throws NotImplementedException
     */
    public function decrementBy($key, $decrement)
    {
        throw new NotImplementedException();
    }

    /**
     * @param string $key
     *
     * @throws NotImplementedException
     */
    public function get($key)
    {
        throw new NotImplementedException();
    }

    /**
     * @param string $key
     *
     * @throws NotImplementedException
     */
    public function getValueLength($key)
    {
        throw new NotImplementedException();
    }

    /**
     * @param string $key
     *
     * @throws NotImplementedException
     */
    public function increment($key)
    {
        throw new NotImplementedException();
    }

    /**
     * @param string $key
     * @param int $increment
     *
     * @throws NotImplementedException
     */
    public function incrementBy($key, $increment)
    {
        throw new NotImplementedException();
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @throws NotImplementedException
     */
    public function set($key, $value)
    {
        throw new NotImplementedException();
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @throws NotImplementedException
     */
    public function setIfNotExists($key, $value)
    {
        throw new NotImplementedException();
    }
}
