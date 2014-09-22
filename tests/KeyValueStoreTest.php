<?php namespace AdammBalogh\KeyValueStore;

use AdammBalogh\KeyValueStore\Adapter\NullAdapter;
use AdammBalogh\KeyValueStore\Contract\AdapterInterface;

class KeyValueStoreTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AdapterInterface
     */
    protected $kvs;

    public function setUp()
    {
        $this->kvs = new KeyValueStore(new NullAdapter());
    }

    public function testAdapter()
    {
        $this->assertInstanceOf(
            '\AdammBalogh\KeyValueStore\Contract\AdapterInterface',
            $this->kvs->getAdapter()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWrongArgumentOnDelete()
    {
        $this->kvs->delete([]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWrongArgumentOnExpire()
    {
        $this->kvs->expire('key', 'not an integer');
    }

    public function tearDown()
    {
        unset($this->kvs);
    }
}
