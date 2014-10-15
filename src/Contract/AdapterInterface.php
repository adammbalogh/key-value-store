<?php namespace AdammBalogh\KeyValueStore\Contract;

interface AdapterInterface extends KeyInterface, ValueInterface, ServerInterface
{
    /**
     * @return AdapterInterface
     */
    public function getAdapter();
}
