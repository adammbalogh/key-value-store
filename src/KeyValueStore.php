<?php namespace AdammBalogh\KeyValueStore;

use AdammBalogh\KeyValueStore\Contract\AdapterInterface;
use AdammBalogh\KeyValueStore\Implementation\AdapterTrait;
use AdammBalogh\KeyValueStore\Implementation\KeyTrait;
use AdammBalogh\KeyValueStore\Implementation\ValueTrait;
use AdammBalogh\KeyValueStore\Implementation\ServerTrait;

class KeyValueStore implements AdapterInterface
{
    use AdapterTrait, KeyTrait, ValueTrait, ServerTrait {
        AdapterTrait::getAdapter insteadof KeyTrait;
        AdapterTrait::getAdapter insteadof ValueTrait;
        AdapterTrait::getAdapter insteadof ServerTrait;
    }

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}
