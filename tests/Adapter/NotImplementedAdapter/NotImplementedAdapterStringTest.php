<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Adapter\NotImplementedAdapter;
use AdammBalogh\KeyValueStore\KeyValueStore;

class NotImplementedAdapterStringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \AdammBalogh\KeyValueStore\Contract\AdapterInterface
     */
    protected $kvs;

    public function setUp()
    {
        $this->kvs = new KeyValueStore(new NotImplementedAdapter());
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testAppend()
    {
        $this->kvs->append('key', 'value');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testDecrement()
    {
        $this->kvs->decrement('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testDecrementBy()
    {
        $this->kvs->decrementBy('key', 5);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testGet()
    {
        $this->kvs->get('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testGetValueLength()
    {
        $this->kvs->getValueLength('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testIncrement()
    {
        $this->kvs->increment('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testIncrementBy()
    {
        $this->kvs->incrementBy('key', 5);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testSet()
    {
        $this->kvs->set('key', 'value');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testSetIfNotExists()
    {
        $this->kvs->setIfNotExists('key', 'value');
    }

    public function tearDown()
    {
        unset($this->kvs);
    }
}
