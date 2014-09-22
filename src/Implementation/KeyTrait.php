<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\Exception\InternalException;
use AdammBalogh\KeyValueStore\Exception\KeyNotFoundException;

trait KeyTrait
{
    use AdapterTrait, ValidatorTrait;

    /**
     * @param string $key
     *
     * @return bool True if the deletion was successful, false if it was unsuccessful.
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     */
    public function delete($key)
    {
        $this->checkString($key);

        return $this->getAdapter()->delete($key);
    }

    /**
     * @param string $key
     * @param int $seconds
     *
     * @return bool True if the timeout was set, false if the timeout could not be set.
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     */
    public function expire($key, $seconds)
    {
        $this->checkString($key);
        $this->checkInteger($seconds);

        return $this->getAdapter()->expire($key, $seconds);
    }

    /**
     * @param string $key
     * @param int $timestamp
     *
     * @return bool True if the timeout was set, false if the timeout could not be set.
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     */
    public function expireAt($key, $timestamp)
    {
        $this->checkString($key);
        $this->checkInteger($timestamp);

        return $this->getAdapter()->expireAt($key, $timestamp);
    }

    /**
     * @return array
     */
    public function getKeys()
    {
        return $this->getAdapter()->getKeys();
    }

    /**
     * Returns the remaining time to live of a key that has a timeout.
     *
     * @param string $key
     *
     * @return int Ttl in seconds
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws InternalException If the key exists but has no associated expire.
     */
    public function getTtl($key)
    {
        $this->checkString($key);

        return $this->getAdapter()->getTtl($key);
    }

    /**
     * @param string $key
     *
     * @return bool True if the key does exist, false if the key does not exist.
     *
     * @throws \InvalidArgumentException
     */
    public function has($key)
    {
        $this->checkString($key);

        return $this->getAdapter()->has($key);
    }

    /**
     * Remove the existing timeout on key, turning the key from volatile (a key with an expire set)
     * to persistent (a key that will never expire as no timeout is associated).
     *
     * @param string $key
     *
     * @return bool True if the persist was success, false if the persis was unsuccessful.
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     */
    public function persist($key)
    {
        $this->checkString($key);

        return $this->getAdapter()->persist($key);
    }
}
