<?php namespace AdammBalogh\KeyValueStore\Adapter;

class HelperTest extends \PHPUnit_Framework_TestCase
{
    public function testGetDataWithExpire()
    {
        $this->assertEquals(
            serialize([
                'v' => 'value',
                's' => 2,
                'ts' => 1411750189
            ]),
            Helper::getDataWithExpire('value', 2, 1411750189)
        );
    }

    public function testHasInternalExpireTimeTrue()
    {
        $this->assertTrue(Helper::hasInternalExpireTime(['v'=>'', 's'=>'', 'ts'=>'']));
    }

    public function testHasInternalExpireTimeFalse()
    {
        $this->assertFalse(Helper::hasInternalExpireTime([]));
    }

    /**
     * @expectedException \Exception
     */
    public function testThrowExIfNotNumericInteger()
    {
        Helper::throwExIfNotNumericInteger('2.3');
    }

    public function testThrowExIfNotNumericIntegerCorrectly()
    {
        Helper::throwExIfNotNumericInteger('2');
    }
}
