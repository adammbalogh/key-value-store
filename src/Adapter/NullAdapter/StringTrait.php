<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Exception\KeyAlreadyExistsException;
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
     * @return int The length of the string after the append operation.
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function append($key, $value)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     *
     * @return int The value of key after the decrement
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function decrement($key)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     * @param int $decrement
     *
     * @return int The value of key after the decrement
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function decrementBy($key, $decrement)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     *
     * @return string The value of the key
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function get($key)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function getValueLength($key)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     *
     * @return int The value of key after the increment
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function increment($key)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     * @param int $increment
     *
     * @return int The value of key after the increment
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function incrementBy($key, $increment)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return bool True if the set was successful, false if it was unsuccessful
     *
     * @throws \InvalidArgumentException
     */
    public function set($key, $value)
    {
        return false;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return bool True if the set was successful, false if it was unsuccessful
     *
     * @throws \InvalidArgumentException
     * @throws KeyAlreadyExistsException
     */
    public function setIfNotExists($key, $value)
    {
        return false;
    }
}
