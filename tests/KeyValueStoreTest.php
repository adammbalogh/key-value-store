<?php namespace AdammBalogh\KeyValueStore;

class KeyValueStoreTest extends \PHPUnit_Framework_TestCase
{
    public function testInstantiation()
    {
        $dummyAdapter = \Mockery::mock('AdammBalogh\KeyValueStore\Contract\AdapterInterface');

        new KeyValueStore($dummyAdapter);
    }
}
