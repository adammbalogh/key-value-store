<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\Contract\AdapterInterface;

trait AdapterTrait
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @return AdapterInterface
     */
    public function getAdapter()
    {
        return $this->adapter;
    }
}
