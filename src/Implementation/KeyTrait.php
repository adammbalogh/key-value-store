<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\Exception\InternalException;
use AdammBalogh\KeyValueStore\Exception\KeyNotFoundException;

trait KeyTrait
{
    use AdapterTrait;

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
        $this->adapter->delete($key);
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
        $this->adapter->expire($key, $seconds);
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
        $this->adapter->expireAt($key, $timestamp);
    }

    /**
     * @return array
     */
    public function getKeys()
    {
        $this->adapter->getKeys();
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
        $this->adapter->getTtl($key);
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
        $this->adapter->has($key);
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
        $this->adapter->persist($key);
    }
}
