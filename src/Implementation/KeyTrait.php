<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\Adapter\Helper;
use AdammBalogh\KeyValueStore\Exception\InternalException;
use AdammBalogh\KeyValueStore\Exception\KeyNotFoundException;

/**
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
trait KeyTrait
{
    use AdapterTrait;

    /**
     * @param string $key
     *
     * @return bool True if the deletion was successful, false if the deletion was unsuccessful.
     *
     * @throws \InvalidArgumentException
     * @throws InternalException
     */
    public function delete($key)
    {
        Helper::checkArgString($key);

        try {
            return $this->getAdapter()->delete($key);
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $key
     * @param int $seconds
     *
     * @return bool True if the timeout was set, false if the timeout could not be set.
     *
     * @throws \InvalidArgumentException
     * @throws InternalException
     */
    public function expire($key, $seconds)
    {
        Helper::checkArgString($key);
        Helper::checkArgInteger($seconds);

        try {
            return $this->getAdapter()->expire($key, $seconds);
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @return array
     *
     * @throws InternalException
     */
    public function getKeys()
    {
        try {
            return $this->getAdapter()->getKeys();
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
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
     * @throws InternalException
     */
    public function getTtl($key)
    {
        Helper::checkArgString($key);

        try {
            return $this->getAdapter()->getTtl($key);
        } catch (KeyNotFoundException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $key
     *
     * @return bool True if the key does exist, false if the key does not exist.
     *
     * @throws \InvalidArgumentException
     * @throws InternalException
     */
    public function has($key)
    {
        Helper::checkArgString($key);

        try {
            return $this->getAdapter()->has($key);
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
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
     * @throws InternalException
     */
    public function persist($key)
    {
        Helper::checkArgString($key);

        try {
            return $this->getAdapter()->persist($key);
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
