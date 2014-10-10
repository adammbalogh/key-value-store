<?php namespace AdammBalogh\KeyValueStore\Implementation;

use AdammBalogh\KeyValueStore\AbstractKvsTestCase;

class ServerTraitTest extends AbstractKvsTestCase
{
    /**
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testFlush($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('flush');

        $this->assertNull($kvs->flush());
    }

    /**
     * @expectedException \AdammBalogh\KeyValueStore\Exception\InternalException
     *
     * @dataProvider kvsProvider
     *
     * @param \AdammBalogh\KeyValueStore\KeyValueStore $kvs
     * @param \Mockery\MockInterface $dummyAdapter
     */
    public function testFlushException($kvs, $dummyAdapter)
    {
        $dummyAdapter->shouldReceive('flush')->andThrow('\Exception');

        $kvs->flush();
    }

}
