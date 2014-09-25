<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Exception\KeyNotFoundException;

/**
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
trait StringTrait
{
    /**
     * @param string $key
     * @param string $value
     *
     * @throws KeyNotFoundException
     */
    public function append($key, $value)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     *
     * @throws KeyNotFoundException
     */
    public function decrement($key)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     * @param int $decrement
     *
     * @throws KeyNotFoundException
     */
    public function decrementBy($key, $decrement)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     *
     * @throws KeyNotFoundException
     */
    public function get($key)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     *
     * @throws KeyNotFoundException
     */
    public function getValueLength($key)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     *
     * @throws KeyNotFoundException
     */
    public function increment($key)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     * @param int $increment
     *
     * @throws KeyNotFoundException
     */
    public function incrementBy($key, $increment)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return false
     */
    public function set($key, $value)
    {
        return false;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return false
     */
    public function setIfNotExists($key, $value)
    {
        return false;
    }
}
