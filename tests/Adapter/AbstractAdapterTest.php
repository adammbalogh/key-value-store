<?php namespace AdammBalogh\KeyValueStore\Adapter;

class AbstractAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAdapter()
    {
        $dummyAdapter = \Mockery::mock('AdammBalogh\KeyValueStore\Adapter\AbstractAdapter[]');

        $this->assertEquals($dummyAdapter, $dummyAdapter->getAdapter());
    }
}
