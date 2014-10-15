<?php namespace AdammBalogh\KeyValueStore\Adapter;

class Util
{
    /**
     * @param string $value
     * @param int $seconds
     * @param int $timestamp
     *
     * @return string
     */
    public static function getDataWithExpire($value, $seconds, $timestamp)
    {
        return serialize([
            'v' => $value,
            's' => $seconds,
            'ts' => $timestamp
        ]);
    }

    /**
     * @param mixed $unserializedValue
     *
     * @return bool
     */
    public static function hasInternalExpireTime($unserializedValue)
    {
        return (
            is_array($unserializedValue)
            && array_key_exists('v', $unserializedValue)
            && array_key_exists('s', $unserializedValue)
            && array_key_exists('ts', $unserializedValue)
        );
    }

    /**
     * @param string $param
     *
     * @throws \Exception
     */
    public static function checkInteger($param)
    {
        if (!is_numeric($param) || !is_integer($param + 0)) {
            throw new \Exception('The stored value is not an integer');
        }
    }

    /**
     * @param mixed $argument
     *
     * @throws \InvalidArgumentException
     */
    public static function checkArgString($argument)
    {
        if (!is_string($argument)) {
            throw new \InvalidArgumentException();
        }
    }

    /**
     * @param mixed $argument
     *
     * @throws \InvalidArgumentException
     */
    public static function checkArgInteger($argument)
    {
        if (!is_integer($argument)) {
            throw new \InvalidArgumentException();
        }
    }

    /**
     * @param mixed $argument
     *
     * @throws \InvalidArgumentException
     */
    public static function checkArgSerializable($argument)
    {
        if (is_resource($argument)) {
            throw new \InvalidArgumentException();
        }
    }
}
