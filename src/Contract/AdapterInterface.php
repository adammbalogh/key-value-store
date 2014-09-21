<?php namespace AdammBalogh\KeyValueStore\Contract;

interface AdapterInterface extends KeyInterface, StringInterface
{
    /**
     * @return AdapterInterface
     */
    public function getAdapter();
}
