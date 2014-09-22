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

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testDelete()
    {
        $this->kvs->delete('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testExpire()
    {
        $this->kvs->expire('key', 0);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testExpireAt()
    {
        $this->kvs->expireAt('key', time());
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

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\KeyNotFoundException
     */
    public function testPersist()
    {
        $this->kvs->persist('key');
    }

    public function tearDown()
    {
        unset($this->kvs);
    }
}
