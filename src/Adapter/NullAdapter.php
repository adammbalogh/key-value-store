<?php namespace AdammBalogh\KeyValueStore\Adapter;

use AdammBalogh\KeyValueStore\Adapter\NullAdapter\KeyTrait;
use AdammBalogh\KeyValueStore\Adapter\NullAdapter\ServerTrait;
use AdammBalogh\KeyValueStore\Adapter\NullAdapter\StringTrait;

class NullAdapter extends AbstractAdapter
{
    use KeyTrait, StringTrait, ServerTrait;

    /**
     * @var null
     */
    protected $client;

    /**
     * @return null
     */
    public function getClient()
    {
        return $this->client;
    }
}
