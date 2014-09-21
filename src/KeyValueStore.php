<?php namespace AdammBalogh\KeyValueStore;

use AdammBalogh\KeyValueStore\Contract\AdapterInterface;
use AdammBalogh\KeyValueStore\Implementation\AdapterTrait;

class KeyValueStore implements AdapterInterface
{
    use AdapterTrait;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}
