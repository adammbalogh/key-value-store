<?php namespace AdammBalogh\KeyValueStore\Contract;

interface ServerInterface
{
    /**
     * @return void
     *
     * @throws \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function flush();
}
