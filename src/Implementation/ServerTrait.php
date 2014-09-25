<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\Exception\InternalException;

trait ServerTrait
{
    use AdapterTrait, ValidatorTrait;

    /**
     * @return void
     *
     * @throws InternalException
     */
    public function flush()
    {
        try {
            $this->getAdapter()->flush();
        } catch (\Exception $e) {
            throw new InternalException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
