<?php namespace AdammBalogh\KeyValueStore\Adapter\NotImplementedAdapter;

use AdammBalogh\KeyValueStore\Exception\NotImplementedException;

trait ServerTrait
{
    /**
     * @throws NotImplementedException
     */
    public function flush()
    {
        throw new NotImplementedException();
    }
}
