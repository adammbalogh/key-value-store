<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

trait ClientTrait
{
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
