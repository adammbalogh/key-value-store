<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

trait ClientTrait
{
    /**
     * @return null
     */
    public function getClient()
    {
        return $this->client;
    }
}
