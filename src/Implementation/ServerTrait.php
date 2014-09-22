<?php namespace AdammBalogh\KeyValueStore\Implementation;

trait ServerTrait
{
    use AdapterTrait, ValidatorTrait;

    /**
     * @return bool True if the persist was success, false if the persis was unsuccessful.
     */
    public function flush()
    {
        return $this->getAdapter()->flush();
    }
}
