<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\AbstractKvsTestCase;
use AdammBalogh\KeyValueStore\KeyValueStore;
use Mockery\MockInterface;

class KeyTraitTest extends AbstractKvsTestCase
{
    /**
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testDelete(KeyValueStore $kvs, MockInterface $dummyAdapter)
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
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testDeleteWithWrongKeyArg(KeyValueStore $kvs, MockInterface $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('delete')->andReturn(false);

        $kvs->delete($key);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testDeleteException(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('delete')->andThrow('\Exception');

        $kvs->delete('key');
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testExpire(KeyValueStore $kvs, MockInterface $dummyAdapter)
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
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testExpireWithWrongKeyArg(KeyValueStore $kvs, MockInterface $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('expire')->andReturn(false);

        $kvs->expire($key, 1);
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotIntegerArgProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     * @param mixed $seconds
     */
    public function testExpireWithWrongSecondsArg(KeyValueStore $kvs, MockInterface $dummyAdapter, $seconds)
    {
        $dummyAdapter->shouldReceive('expire')->andReturn(false);

        $kvs->expire('key', $seconds);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testExpireException(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('expire', 1)->andThrow('\Exception');

        $kvs->expire('key', 1);
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testGetTtl(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('getTtl')->with('key-e')->andReturn(5);

        $this->assertEquals(5, $kvs->getTtl('key-e'));
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     *
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testGetTtlKeyNotFound(KeyValueStore $kvs, MockInterface $dummyAdapter)
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
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testGetTtlWithWrongKeyArg(KeyValueStore $kvs, MockInterface $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('getTtl')->andReturn(5);

        $kvs->getTtl($key);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testGetTtlException(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('getTtl')->andThrow('\Exception');

        $kvs->getTtl('key');
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testHas(KeyValueStore $kvs, MockInterface $dummyAdapter)
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
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testHasWithWrongKeyArg(KeyValueStore $kvs, MockInterface $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('has')->andReturn(false);

        $kvs->has($key);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testHasException(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('has')->andThrow('\Exception');

        $kvs->has('key');
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testPersist(KeyValueStore $kvs, MockInterface $dummyAdapter)
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
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     * @param mixed $key
     */
    public function testPersistWithWrongKeyArg(KeyValueStore $kvs, MockInterface $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('persist')->andReturn(false);

        $kvs->persist($key);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testPersistException(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('persist')->andThrow('\Exception');

        $kvs->persist('key');
    }
}
