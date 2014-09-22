<?php namespace AdammBalogh\KeyValueStore\Adapter;

class NullAdapterKeyTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAdapter()
    {
        $this->assertInstanceOf(
            '\AdammBalogh\KeyValueStore\Contract\AdapterInterface',
            (new NullAdapter())->getAdapter()
        );
    }

    public function testGetClient()
    {
        $this->assertNull((new NullAdapter())->getClient());
    }
}
