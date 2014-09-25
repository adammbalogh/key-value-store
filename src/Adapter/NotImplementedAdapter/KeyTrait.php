<?php namespace AdammBalogh\KeyValueStore\Adapter\NotImplementedAdapter;

use AdammBalogh\KeyValueStore\Exception\NotImplementedException;

/**
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
trait KeyTrait
{
    /**
     * @param string $key
     *
     * @throws NotImplementedException
     */
    public function delete($key)
    {
        throw new NotImplementedException();
    }

    /**
     * @param string $key
     * @param int $seconds
     *
     * @throws NotImplementedException
     */
    public function expire($key, $seconds)
    {
        throw new NotImplementedException();
    }

    /**
     * @param string $key
     * @param int $timestamp
     *
     * @throws NotImplementedException
     */
    public function expireAt($key, $timestamp)
    {
        throw new NotImplementedException();
    }

    /**
     * @throws NotImplementedException
     */
    public function getKeys()
    {
        throw new NotImplementedException();
    }

    /**
     * Returns the remaining time to live of a key that has a timeout.
     *
     * @param string $key
     *
     * @throws NotImplementedException
     */
    public function getTtl($key)
    {
        throw new NotImplementedException();
    }

    /**
     * @param string $key
     *
     * @throws NotImplementedException
     */
    public function has($key)
    {
        throw new NotImplementedException();
    }

    /**
     * Remove the existing timeout on key, turning the key from volatile (a key with an expire set)
     * to persistent (a key that will never expire as no timeout is associated).
     *
     * @param string $key
     *
     * @throws NotImplementedException
     */
    public function persist($key)
    {
        throw new NotImplementedException();
    }
}
