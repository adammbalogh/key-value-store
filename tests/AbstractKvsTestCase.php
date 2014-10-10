<?php namespace AdammBalogh\KeyValueStore;

abstract class AbstractKvsTestCase extends \PHPUnit_Framework_TestCase
{
    public function getDummyAdapter()
    {
        return \Mockery::mock('AdammBalogh\KeyValueStore\Adapter\AbstractAdapter');
    }

    public function kvsProvider()
    {
        $dummyAdapter = $this->getDummyAdapter();

        return [
            [
                new KeyValueStore($dummyAdapter),
                $dummyAdapter
            ]
        ];
    }

    public function kvsAndNotStringArgProvider()
    {
        $dummyAdapter = $this->getDummyAdapter();
        $kvs = new KeyValueStore($dummyAdapter);

        return [
            [$kvs, $dummyAdapter, null],
            [$kvs, $dummyAdapter, true],
            [$kvs, $dummyAdapter, 1],
            [$kvs, $dummyAdapter, 1.5],
            [$kvs, $dummyAdapter, []],
            [$kvs, $dummyAdapter, new \stdClass()]
        ];
    }

    public function kvsAndNotIntegerArgProvider()
    {
        $dummyAdapter = $this->getDummyAdapter();
        $kvs = new KeyValueStore($dummyAdapter);

        return [
            [$kvs, $dummyAdapter, null],
            [$kvs, $dummyAdapter, true],
            [$kvs, $dummyAdapter, ''],
            [$kvs, $dummyAdapter, '1'],
            [$kvs, $dummyAdapter, '1.5'],
            [$kvs, $dummyAdapter, []],
            [$kvs, $dummyAdapter, new \stdClass()]
        ];
    }
}
