<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\AbstractKvsTestCase;
use AdammBalogh\KeyValueStore\KeyValueStore;
use Mockery\MockInterface;

class ServerTraitTest extends AbstractKvsTestCase
{
    /**
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testFlush(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('flush');

        $this->assertNull($kvs->flush());
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param KeyValueStore $kvs
     * @param MockInterface $dummyAdapter
     */
    public function testFlushException(KeyValueStore $kvs, MockInterface $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('flush')->andThrow('\Exception');

        $kvs->flush();
    }
}
