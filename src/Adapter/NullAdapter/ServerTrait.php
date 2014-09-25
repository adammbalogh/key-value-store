<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Exception\InternalException;

trait ServerTrait
{
    /**
     * @return void
     *
     * @throws InternalException
     */
    public function flush()
    {
        throw new InternalException();
    }
}
