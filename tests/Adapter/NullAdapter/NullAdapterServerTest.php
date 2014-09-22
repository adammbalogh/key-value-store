<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Adapter\NullAdapter;
use AdammBalogh\KeyValueStore\KeyValueStore;

class NullAdapterServerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \AdammBalogh\KeyValueStore\Contract\AdapterInterface
     */
    protected $kvs;

    public function setUp()
    {
        $this->kvs = new KeyValueStore(new NullAdapter());
    }

    public function testFlush()
    {
        $this->assertFalse($this->kvs->flush());
    }

    public function tearDown()
    {
        unset($this->kvs);
    }
}
