<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Exception\KeyNotFoundException;

/**
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
trait KeyTrait
{
    use ClientTrait;

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
        throw new KeyNotFoundException();
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
        throw new KeyNotFoundException();
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
        throw new KeyNotFoundException();
    }

    /**
     * @return array
     */
    public function getKeys()
    {
        return [];
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
     * @throws \AdammBalogh\KeyValueStore\Exception\InternalException If the key exists but has no associated expire.
     */
    public function getTtl($key)
    {
        throw new KeyNotFoundException();
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
        return false;
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
        throw new KeyNotFoundException();
    }
}
