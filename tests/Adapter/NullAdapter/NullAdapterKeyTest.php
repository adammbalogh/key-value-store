<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Adapter\NullAdapter;
use AdammBalogh\KeyValueStore\KeyValueStore;

class NullAdapterKeyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \AdammBalogh\KeyValueStore\Contract\AdapterInterface
     */
    protected $kvs;

    public function setUp()
    {
        $this->kvs = new KeyValueStore(new NullAdapter());
    }

    public function testDelete()
    {
        $this->assertFalse($this->kvs->delete('key'));
    }

    public function testExpire()
    {
        $this->assertFalse($this->kvs->expire('key', 0));
    }

    public function testKeys()
    {
        $this->assertEquals([], $this->kvs->getKeys());
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testGetTtl()
    {
        $this->kvs->getTtl('key');
    }

    public function testHas()
    {
        $this->assertFalse($this->kvs->has('key'));
    }

    public function testPersist()
    {
        $this->assertFalse($this->kvs->persist('key'));
    }

    public function tearDown()
    {
        unset($this->kvs);
    }
}
