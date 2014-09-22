<?php namespace AdammBalogh\KeyValueStore\Contract;

interface ServerInterface
{
    /**
     * @return bool True if the persist was success, false if the persis was unsuccessful.
     */
    public function flush();
}
