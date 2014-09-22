<?php namespace AdammBalogh\KeyValueStore\Implementation;

trait ValidatorTrait
{
    /**
     * @param mixed $parameter
     *
     * @throws \InvalidArgumentException
     */
    protected function checkString($parameter)
    {
        if (!is_string($parameter)) {
            throw new \InvalidArgumentException();
        }
    }

    /**
     * @param mixed $parameter
     *
     * @throws \InvalidArgumentException
     */
    protected function checkInteger($parameter)
    {
        if (!is_integer($parameter)) {
            throw new \InvalidArgumentException();
        }
    }
}
