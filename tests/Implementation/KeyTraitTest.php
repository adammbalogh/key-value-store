<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\AbstractKvsTestCase;

class KeyTraitTest extends AbstractKvsTestCase
{
    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testDelete($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('delete')->with('key-e')->andReturn(true);
        $dummyAdapter->shouldReceive('delete')->with('key-ne')->andReturn(false);

        $this->assertTrue($kvs->delete('key-e'));
        $this->assertFalse($kvs->delete('key-ne'));
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotStringArgProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testDeleteWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('delete')->andReturn(false);

        $kvs->delete($key);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testDeleteException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('delete')->andThrow('\Exception');

        $kvs->delete('key');
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testExpire($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('expire')->with('key-e', 1)->andReturn(true);
        $dummyAdapter->shouldReceive('expire')->with('key-ne', 1)->andReturn(false);

        $this->assertTrue($kvs->expire('key-e', 1));
        $this->assertFalse($kvs->expire('key-ne', 1));
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotStringArgProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testExpireWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('expire')->andReturn(false);

        $kvs->expire($key, 1);
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotIntegerArgProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     * @param mixed $seconds
     */
    public function testExpireWithWrongSecondsArg($kvs, $dummyAdapter, $seconds)
    {
        $dummyAdapter->shouldReceive('expire')->andReturn(false);

        $kvs->expire('key', $seconds);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testExpireException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('expire', 1)->andThrow('\Exception');

        $kvs->expire('key', 1);
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testGetKeys($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('getKeys')->andReturn([
            'key1',
            'key2',
            'key3'
        ]);

        $this->assertCount(3, $kvs->getKeys());
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testGetKeysException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('getKeys')->andThrow('\Exception');

        $kvs->getKeys();
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testGetTtl($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('getTtl')->with('key-e')->andReturn(5);

        $this->assertEquals(5, $kvs->getTtl('key-e'));
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testGetTtlKeyNotFound($kvs, $dummyAdapter)
    {
        $dummyAdapter
            ->shouldReceive('getTtl')
            ->with('key-ne')
            ->andThrow('\AdammBalogh\KeyValueStore\Exception\KeyNotFoundException');

        $kvs->getTtl('key-ne');
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotStringArgProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testGetTtlWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('getTtl')->andReturn(5);

        $kvs->getTtl($key);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testGetTtlException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('getTtl')->andThrow('\Exception');

        $kvs->getTtl('key');
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testHas($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('has')->with('key-e')->andReturn(true);
        $dummyAdapter->shouldReceive('has')->with('key-ne')->andReturn(false);

        $this->assertTrue($kvs->has('key-e'));
        $this->assertFalse($kvs->has('key-ne'));
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotStringArgProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testHasWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('has')->andReturn(false);

        $kvs->has($key);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testHasException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('has')->andThrow('\Exception');

        $kvs->has('key');
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testPersist($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('persist')->with('key-e')->andReturn(true);
        $dummyAdapter->shouldReceive('persist')->with('key-ne')->andReturn(false);

        $this->assertTrue($kvs->persist('key-e'));
        $this->assertFalse($kvs->persist('key-ne'));
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotStringArgProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testPersistWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('persist')->andReturn(false);

        $kvs->persist($key);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testPersistException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('persist')->andThrow('\Exception');

        $kvs->persist('key');
    }
}
