<?php namespace AdammBalogh\KeyValueStore\Contract;

interface ServerInterface
{
    /**
     * Removes all keys.
     *
     * @return void
     *
     * @throws \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function flush();
}
