<?php namespace AdammBalogh\KeyValueStore\Adapter;

use AdammBalogh\KeyValueStore\Adapter\NotImplementedAdapter\KeyTrait;
use AdammBalogh\KeyValueStore\Adapter\NotImplementedAdapter\ServerTrait;
use AdammBalogh\KeyValueStore\Adapter\NotImplementedAdapter\StringTrait;

class NotImplementedAdapter extends AbstractAdapter
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
