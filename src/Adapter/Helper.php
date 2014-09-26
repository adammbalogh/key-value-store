<?php namespace AdammBalogh\KeyValueStore\Adapter;

class Helper
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
    public static function throwExIfNotNumericInteger($param)
    {
        if (!is_numeric($param) || !is_integer($param + 0)) {
            throw new \Exception('The stored value is not an integer');
        }
    }

    /**
     * @param mixed $param
     *
     * @throws \InvalidArgumentException
     */
    public static function throwExIfNotString($param)
    {
        if (!is_string($param)) {
            throw new \InvalidArgumentException();
        }
    }

    /**
     * @param mixed $param
     *
     * @throws \InvalidArgumentException
     */
    public static function throwExIfNotInteger($param)
    {
        if (!is_integer($param)) {
            throw new \InvalidArgumentException();
        }
    }
}
