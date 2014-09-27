<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Exception\InternalException;

trait ServerTrait
{
    /**
     * @return void
     */
    public function flush()
    {
    }
}
