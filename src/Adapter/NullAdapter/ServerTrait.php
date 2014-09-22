<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

trait ServerTrait
{
    use ClientTrait;

    /**
     * @return bool True if the persist was success, false if the persis was unsuccessful.
     */
    public function flush()
    {
        return false;
    }
}
