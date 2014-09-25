<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Adapter\NotImplementedAdapter;
use AdammBalogh\KeyValueStore\KeyValueStore;

class NotImplementedAdapterKeyTest extends \PHPUnit_Framework_TestCase
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
    public function testDelete()
    {
        $this->kvs->delete('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testExpire()
    {
        $this->kvs->expire('key', 0);
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testExpireAt()
    {
        $this->kvs->expireAt('key', time());
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testKeys()
    {
        $this->kvs->getKeys();
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testGetTtl()
    {
        $this->kvs->getTtl('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     */
    public function testHas()
    {
        $this->kvs->has('key');
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
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
