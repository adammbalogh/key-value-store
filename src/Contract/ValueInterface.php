<?php namespace AdammBalogh\KeyValueStore\Contract;

use AdammBalogh\KeyValueStore\Exception\InternalException;
use AdammBalogh\KeyValueStore\Exception\KeyNotFoundException;

interface ValueInterface
{
    /**
     * Gets the value of a key.
     *
     * @param string $key
     *
     * @return mixed The value of the key.
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws InternalException
     */
    public function get($key);

    /**
     * Sets the value of a key.
     *
     * @param string $key
     * @param mixed $value Can be any of serializable data type.
     *
     * @return bool True if the set was successful, false if it was unsuccessful.
     *
     * @throws \InvalidArgumentException
     * @throws InternalException
     */
    public function set($key, $value);
}
