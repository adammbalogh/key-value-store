<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\Contract\AdapterInterface;

trait AdapterTrait
{
    use KeyTrait, StringTrait;

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * {@inheritdoc}
     */
    public function getAdapter()
    {
        return $this->adapter;
    }
}
