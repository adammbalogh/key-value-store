<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Exception\KeyNotFoundException;

/**
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
trait KeyTrait
{
    /**
     * @param string $key
     *
     * @return false
     */
    public function delete($key)
    {
        return false;
    }

    /**
     * @param string $key
     * @param int $seconds
     *
     * @return false
     */
    public function expire($key, $seconds)
    {
        return false;
    }

    /**
     * @param string $key
     * @param int $timestamp
     *
     * @return false
     */
    public function expireAt($key, $timestamp)
    {
        return false;
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
     * @throws KeyNotFoundException
     */
    public function getTtl($key)
    {
        throw new KeyNotFoundException();
    }

    /**
     * @param string $key
     *
     * @return false
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
     * @return false
     */
    public function persist($key)
    {
        return false;
    }
}
