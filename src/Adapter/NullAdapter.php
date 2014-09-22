<?php namespace AdammBalogh\KeyValueStore\Adapter;

use AdammBalogh\KeyValueStore\Adapter\NullAdapter\ClientTrait;
use AdammBalogh\KeyValueStore\Adapter\NullAdapter\KeyTrait;
use AdammBalogh\KeyValueStore\Adapter\NullAdapter\ServerTrait;
use AdammBalogh\KeyValueStore\Adapter\NullAdapter\StringTrait;

class NullAdapter extends AbstractAdapter
{
    use ClientTrait, KeyTrait, StringTrait, ServerTrait {
        ClientTrait::getClient insteadof KeyTrait;
        ClientTrait::getClient insteadof StringTrait;
        ClientTrait::getClient insteadof ServerTrait;
    }

    /**
     * @var null
     */
    protected $client;
}
