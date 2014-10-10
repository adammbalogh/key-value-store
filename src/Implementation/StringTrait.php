<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\Adapter\Util;
use AdammBalogh\KeyValueStore\Exception\InternalException;
use AdammBalogh\KeyValueStore\Exception\KeyNotFoundException;

/**
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
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
        Util::checkArgString($key);
        Util::checkArgString($value);

        try {
            return $this->getAdapter()->append($key, $value);
        } catch (KeyNotFoundException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
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
        Util::checkArgString($key);

        try {
            return $this->getAdapter()->decrement($key);
        } catch (KeyNotFoundException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
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
        Util::checkArgString($key);
        Util::checkArgInteger($decrement);

        try {
            return $this->getAdapter()->decrementBy($key, $decrement);
        } catch (KeyNotFoundException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
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
        Util::checkArgString($key);

        try {
            return $this->getAdapter()->get($key);
        } catch (KeyNotFoundException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
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
        Util::checkArgString($key);

        try {
            return $this->getAdapter()->getValueLength($key);
        } catch (KeyNotFoundException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
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
        Util::checkArgString($key);

        try {
            return $this->getAdapter()->increment($key);
        } catch (KeyNotFoundException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
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
        Util::checkArgString($key);
        Util::checkArgInteger($increment);

        try {
            return $this->getAdapter()->incrementBy($key, $increment);
        } catch (KeyNotFoundException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return bool True if the set was successful, false if it was unsuccessful
     *
     * @throws \InvalidArgumentException
     * @throws InternalException
     */
    public function set($key, $value)
    {
        Util::checkArgString($key);
        Util::checkArgString($value);

        try {
            return $this->getAdapter()->set($key, $value);
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return bool True if the set was successful, false if it was unsuccessful
     *
     * @throws \InvalidArgumentException
     * @throws InternalException
     */
    public function setIfNotExists($key, $value)
    {
        Util::checkArgString($key);
        Util::checkArgString($value);

        try {
            return $this->getAdapter()->setIfNotExists($key, $value);
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
