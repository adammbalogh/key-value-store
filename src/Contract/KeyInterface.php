<?php namespace AdammBalogh\KeyValueStore\Contract;

use AdammBalogh\KeyValueStore\Exception\InternalException;
use AdammBalogh\KeyValueStore\Exception\KeyNotFoundException;

interface KeyInterface
{
    /**
     * Removes a key.
     *
     * @param string $key
     *
     * @return bool True if the deletion was successful, false if the deletion was unsuccessful.
     *
     * @throws \InvalidArgumentException
     * @throws InternalException
     */
    public function delete($key);

    /**
     * Sets a key's time to live in seconds.
     *
     * @param string $key
     * @param int $seconds
     *
     * @return bool True if the timeout was set, false if the timeout could not be set.
     *
     * @throws \InvalidArgumentException
     * @throws InternalException
     */
    public function expire($key, $seconds);

    /**
     * Returns the remaining time to live of a key that has a timeout.
     *
     * @param string $key
     *
     * @return int Ttl in seconds.
     *
     * @throws \InvalidArgumentException
     * @throws KeyNotFoundException
     * @throws InternalException
     */
    public function getTtl($key);

    /**
     * Determines if a key exists.
     *
     * @param string $key
     *
     * @return bool True if the key does exist, false if the key does not exist.
     *
     * @throws \InvalidArgumentException
     * @throws InternalException
     */
    public function has($key);

    /**
     * Removes the existing timeout on key, turning the key from volatile (a key with an expire set)
     * to persistent (a key that will never expire as no timeout is associated).
     *
     * @param string $key
     *
     * @return bool True if the persist was success, false if the persis was unsuccessful.
     *
     * @throws \InvalidArgumentException
     * @throws InternalException
     */
    public function persist($key);
}
