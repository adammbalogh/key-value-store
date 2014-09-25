<?php namespace AdammBalogh\KeyValueStore\Exception;

class NotImplementedException extends \Exception
{
    public function __construct($code = 0, \Exception $previous = null)
    {
        parent::__construct('Not implemented function', $code, $previous);
    }
}
