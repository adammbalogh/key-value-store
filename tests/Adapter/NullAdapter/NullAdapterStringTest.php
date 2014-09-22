<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Adapter\NullAdapter;
use AdammBalogh\KeyValueStore\KeyValueStore;

class NullAdapterStringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \AdammBalogh\KeyValueStore\Contract\AdapterInterface
     */
    protected $kvs;

    public function setUp()
    {
        $this->kvs = new KeyValueStore(new NullAdapter());
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testAppend()
    {
        $this->kvs->append('key', 'value');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testDecrement()
    {
        $this->kvs->decrement('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testDecrementBy()
    {
        $this->kvs->decrementBy('key', 5);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testGet()
    {
        $this->kvs->get('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testGetValueLength()
    {
        $this->kvs->getValueLength('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testIncrement()
    {
        $this->kvs->increment('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testIncrementBy()
    {
        $this->kvs->incrementBy('key', 5);
    }

    public function testSet()
    {
        $this->assertFalse($this->kvs->set('key', 'value'));
    }

    public function testSetIfNotExists()
    {
        $this->assertFalse($this->kvs->setIfNotExists('key', 'value'));
    }

    public function tearDown()
    {
        unset($this->kvs);
    }
}
