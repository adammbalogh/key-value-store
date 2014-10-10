<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\AbstractKvsTestCase;

class StringTraitTest extends AbstractKvsTestCase
{
    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testAppend($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('append')->with('key-e', 'text')->andReturn(8);

        $this->assertEquals(8, $kvs->append('key-e', 'text'));
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
    public function testAppendWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('append')->andReturn(0);

        $kvs->append($key, 'text');
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotStringArgProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     * @param mixed $value
     */
    public function testAppendWithWrongValueArg($kvs, $dummyAdapter, $value)
    {
        $dummyAdapter->shouldReceive('append')->andReturn(0);

        $kvs->append('key', $value);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testAppendKeyNotFound($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('append')
            ->with('key-ne', 'text')
            ->andThrow('\AdammBalogh\KeyValueStore\Exception\KeyNotFoundException');

        $kvs->append('key-ne', 'text');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testAppendException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('append')->andThrow('\Exception');

        $kvs->append('key', 'text');
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testDecrement($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('decrement')->with('key-e')->andReturn(1);

        $this->assertEquals(1, $kvs->decrement('key-e'));
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testDecrementKeyNotFound($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('decrement')
            ->with('key-ne')
            ->andThrow('\AdammBalogh\KeyValueStore\Exception\KeyNotFoundException');

        $kvs->decrement('key-ne');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testDecrementException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('decrement')->andThrow('\Exception');

        $kvs->decrement('key');
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
    public function testDecrementWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('decrement')->andReturn(0);

        $kvs->decrement($key);
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testDecrementBy($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('decrementBy')->with('key-e', 5)->andReturn(1);

        $this->assertEquals(1, $kvs->decrementBy('key-e', 5));
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testDecrementByKeyNotFound($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('decrementBy')
            ->with('key-ne', 5)
            ->andThrow('\AdammBalogh\KeyValueStore\Exception\KeyNotFoundException');

        $kvs->decrementBy('key-ne', 5);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testDecrementByException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('decrementBy')->andThrow('\Exception');

        $kvs->decrementBy('key', 5);
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
    public function testDecrementByWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('decrementBy')->andReturn(0);

        $kvs->decrementBy($key, 5);
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotIntegerArgProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     * @param mixed $decrement
     */
    public function testDecrementByWithWrongDecrementArg($kvs, $dummyAdapter, $decrement)
    {
        $dummyAdapter->shouldReceive('decrementBy')->andReturn(0);

        $kvs->decrementBy('key', $decrement);
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testGet($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('get')->with('key-e')->andReturn('value');

        $this->assertEquals('value', $kvs->get('key-e'));
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testGetKeyNotFound($kvs, $dummyAdapter)
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
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testGetException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('get')->andThrow('\Exception');

        $kvs->get('key');
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
    public function testGetWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('get')->andReturn('value');

        $kvs->get($key);
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testGetValueLength($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('getValueLength')->with('key-e')->andReturn(5);

        $this->assertEquals(5, $kvs->getValueLength('key-e'));
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testGetValueLengthKeyNotFound($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('getValueLength')
            ->with('key-ne')
            ->andThrow('\AdammBalogh\KeyValueStore\Exception\KeyNotFoundException');

        $kvs->getValueLength('key-ne');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testGetValueLengthException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('getValueLength')->andThrow('\Exception');

        $kvs->getValueLength('key');
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
    public function testGetValueLengthWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('getValueLength')->andReturn(5);

        $kvs->getValueLength($key);
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testIncrement($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('increment')->with('key-e')->andReturn(1);

        $this->assertEquals(1, $kvs->increment('key-e'));
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testIncrementKeyNotFound($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('increment')
            ->with('key-ne')
            ->andThrow('\AdammBalogh\KeyValueStore\Exception\KeyNotFoundException');

        $kvs->increment('key-ne');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testIncrementException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('increment')->andThrow('\Exception');

        $kvs->increment('key');
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
    public function testIncrementWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('increment')->andReturn(0);

        $kvs->increment($key);
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testIncrementBy($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('incrementBy')->with('key-e', 5)->andReturn(1);

        $this->assertEquals(1, $kvs->incrementBy('key-e', 5));
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testIncrementByKeyNotFound($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('incrementBy')
            ->with('key-ne', 5)
            ->andThrow('\AdammBalogh\KeyValueStore\Exception\KeyNotFoundException');

        $kvs->incrementBy('key-ne', 5);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testIncrementByException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('incrementBy')->andThrow('\Exception');

        $kvs->incrementBy('key', 5);
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
    public function testIncrementByWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('incrementBy')->andReturn(0);

        $kvs->incrementBy($key, 5);
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotIntegerArgProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     * @param mixed $increment
     */
    public function testIncrementByWithWrongIncrementArg($kvs, $dummyAdapter, $increment)
    {
        $dummyAdapter->shouldReceive('incrementBy')->andReturn(0);

        $kvs->incrementBy('key', $increment);
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testSet($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('set')->with('key-e', 'text')->andReturn(true);

        $this->assertTrue($kvs->set('key-e', 'text'));
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
    public function testSetWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('set')->andReturn(false);

        $kvs->set($key, 'text');
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotStringArgProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     * @param mixed $value
     */
    public function testSetWithWrongValueArg($kvs, $dummyAdapter, $value)
    {
        $dummyAdapter->shouldReceive('set')->andReturn(false);

        $kvs->set('key', $value);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testSetException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('set')->andThrow('\Exception');

        $kvs->set('key', 'text');
    }

    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testSetIfNotExists($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('setIfNotExists')->with('key-e', 'text')->andReturn(true);

        $this->assertTrue($kvs->setIfNotExists('key-e', 'text'));
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
    public function testSetIfNotExistsWithWrongKeyArg($kvs, $dummyAdapter, $key)
    {
        $dummyAdapter->shouldReceive('setIfNotExists')->andReturn(false);

        $kvs->setIfNotExists($key, 'text');
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @dataProvider kvsAndNotStringArgProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     * @param mixed $value
     */
    public function testSetIfNotExistsWithWrongValueArg($kvs, $dummyAdapter, $value)
    {
        $dummyAdapter->shouldReceive('setIfNotExists')->andReturn(false);

        $kvs->setIfNotExists('key', $value);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testSetIfNotExistsException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('setIfNotExists')->andThrow('\Exception');

        $kvs->setIfNotExists('key', 'text');
    }
}
