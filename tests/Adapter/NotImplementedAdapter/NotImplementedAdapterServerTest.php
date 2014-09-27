<?php namespace AdammBalogh\KeyValueStore\Adapter\NullAdapter;

use AdammBalogh\KeyValueStore\Adapter\NotImplementedAdapter;
use AdammBalogh\KeyValueStore\KeyValueStore;

class NotImplementedAdapterServerTest extends \PHPUnit_Framework_TestCase
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
    public function testFlush()
    {
        $this->kvs->flush();
    }

    public function tearDown()
    {
        unset($this->kvs);
    }
}
