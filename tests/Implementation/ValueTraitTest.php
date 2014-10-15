<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\AbstractKvsTestCase;
use AdammBalogh\KeyValueStore\KeyValueStore;
use Mockery\MockInterface;

class ValueTraitTest extends AbstractKvsTestCase
{
    /**
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testGet(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('get')->with('key-e')->andReturn('value');

        $this->assertEquals('value', $kvs->get('key-e'));
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     *
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testGetKeyNotFound(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('get')
            ->with('key-ne')
            ->andThrow('\AdammBalogh\KeyValueStore\Exception\KeyNotFoundException');

        $kvs->get('key-ne');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testGetException(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('get')->andThrow('\Exception');

        $kvs->get('key');
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotStringArgProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testGetWithWrongKeyArg(KeyValueStore $kvs, MockInterface $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('get')->andReturn('value');

        $kvs->get($key);
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testSet(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('set')->with('key-e', 'text')->andReturn(true);

        $this->assertTrue($kvs->set('key-e', 'text'));
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotStringArgProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testSetWithWrongKeyArg(KeyValueStore $kvs, MockInterface $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('set')->andReturn(false);

        $kvs->set($key, 'text');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testSetException(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('set')->andThrow('\Exception');

        $kvs->set('key', 'text');
    }
}
