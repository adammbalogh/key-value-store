<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\Exception\InternalException;
use AdammBalogh\KeyValueStore\Exception\KeyAlreadyExistsException;
use AdammBalogh\KeyValueStore\Exception\KeyNotFoundException;

trait StringTrait
{
    use AdapterTrait, ValidatorTrait;

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
        $this->checkString($key);
        $this->checkString($value);

        return $this->getAdapter()->append($key, $value);
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
        $this->checkString($key);

        return $this->getAdapter()->decrement($key);
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
        $this->checkString($key);
        $this->checkInteger($decrement);

        return $this->getAdapter()->decrementBy($key, $decrement);
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
        $this->checkString($key);

        return $this->getAdapter()->get($key);
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
        $this->checkString($key);

        return $this->getAdapter()->getValueLength($key);
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
        $this->checkString($key);

        return $this->getAdapter()->increment($key);
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
        $this->checkString($key);
        $this->checkInteger($increment);

        return $this->getAdapter()->incrementBy($key, $increment);
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
        $this->checkString($key);
        $this->checkString($value);

        return $this->getAdapter()->set($key, $value);
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
        $this->checkString($key);
        $this->checkString($value);

        return $this->getAdapter()->setIfNotExists($key, $value);
    }
}
