<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Exception\InternalException;

trait ServerTrait
{
    /**
     * @throws InternalException
     */
    public function flush()
    {
        throw new InternalException();
    }
}
