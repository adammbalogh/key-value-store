<?php namespace AdammBalogh\KeyValueStore\Implementation;

trait AdapterTrait
{
    /**
     * @return \AdammBalogh\KeyValueStore\Contract\AdapterInterface
     */
    public function getAdapter()
    {
        return $this->adapter;
    }
}
