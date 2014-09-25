<?php namespace AdammBalogh\KeyValueStore\Adapter;

class NotImplementedAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAdapter()
    {
        $this->assertInstanceOf(
            '\AdammBalogh\KeyValueStore\Contract\AdapterInterface',
            (new NotImplementedAdapter())->getAdapter()
        );
    }

    public function testGetClient()
    {
        $this->assertNull((new NotImplementedAdapter())->getClient());
    }
}
