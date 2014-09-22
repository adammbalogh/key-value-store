<?php namespace AdammBalogh\KeyValueStore;

use AdammBalogh\KeyValueStore\Contract\AdapterInterface;
use AdammBalogh\KeyValueStore\Implementation\AdapterTrait;
use AdammBalogh\KeyValueStore\Implementation\KeyTrait;
use AdammBalogh\KeyValueStore\Implementation\ServerTrait;
use AdammBalogh\KeyValueStore\Implementation\StringTrait;

class KeyValueStore implements AdapterInterface
{
    use AdapterTrait, KeyTrait, StringTrait, ServerTrait {
        AdapterTrait::getAdapter insteadof KeyTrait;
        AdapterTrait::getAdapter insteadof StringTrait;
        AdapterTrait::getAdapter insteadof ServerTrait;
        KeyTrait::checkString insteadof StringTrait;
        KeyTrait::checkString insteadof ServerTrait;
        KeyTrait::checkInteger insteadof StringTrait;
        KeyTrait::checkInteger insteadof ServerTrait;
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
