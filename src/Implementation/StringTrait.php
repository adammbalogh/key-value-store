<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\Exception\InternalException;
use AdammBalogh\KeyValueStore\Exception\KeyAlreadyExistsException;
use AdammBalogh\KeyValueStore\Exception\KeyNotFoundException;

trait StringTrait
{
    use AdapterTrait;

    /**
     * @param string $key
     * @param string $value
     *
     * @return int The length of the string after the append operation.
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws InternalException
     */
    public function append($key, $value)
    {
        $this->adapter->append($key, $value);
    }

    /**
     * @param string $key
     *
     * @return int The value of key after the decrement
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws InternalException
     */
    public function decrement($key)
    {
        $this->adapter->decrement($key);
    }

    /**
     * @param string $key
     * @param int $decrement
     *
     * @return int The value of key after the decrement
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws InternalException
     */
    public function decrementBy($key, $decrement)
    {
        $this->adapter->decrementBy($key, $decrement);
    }

    /**
     * @param string $key
     *
     * @return string The value of the key
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws InternalException
     */
    public function get($key)
    {
        $this->adapter->get($key);
    }

    /**
     * @param string $key
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws InternalException
     */
    public function getValueLength($key)
    {
        $this->adapter->getValueLength($key);
    }

    /**
     * @param string $key
     *
     * @return int The value of key after the increment
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws InternalException
     */
    public function increment($key)
    {
        $this->adapter->increment($key);
    }

    /**
     * @param string $key
     * @param int $increment
     *
     * @return int The value of key after the increment
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws InternalException
     */
    public function incrementBy($key, $increment)
    {
        $this->adapter->incrementBy($key, $increment);
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
        $this->adapter->set($key, $value);
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
        $this->adapter->setIfNotExists($key, $value);
    }
}
