<?php namespace AdammBalogh\KeyValueStore;

use AdammBalogh\KeyValueStore\Contract\AdapterInterface;
use AdammBalogh\KeyValueStore\Implementation\AdapterTrait;
use AdammBalogh\KeyValueStore\Implementation\KeyTrait;
use AdammBalogh\KeyValueStore\Implementation\StringTrait;

class KeyValueStore implements AdapterInterface
{
    use AdapterTrait, KeyTrait, StringTrait;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}
