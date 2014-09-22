<?php namespace AdammBalogh\KeyValueStore\Contract;

interface AdapterInterface extends KeyInterface, StringInterface, ServerInterface
{
    /**
     * @return AdapterInterface
     */
    public function getAdapter();
}
