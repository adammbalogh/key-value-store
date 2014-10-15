<?php namespace AdammBalogh\KeyValueStore\Adapter;

class UtilTest extends \PHPUnit_Framework_TestCase
{
    public function testGetDataWithExpire()
    {
        $this->assertEquals(
            serialize([
                'v' => 'value',
                's' => 2,
                'ts' => 1411750189
            ]),
            Util::getDataWithExpire('value', 2, 1411750189)
        );
    }

    public function testHasInternalExpireTimeTrue()
    {
        $this->assertTrue(Util::hasInternalExpireTime(['v'=>'', 's'=>'', 'ts'=>'']));
    }

    public function testHasInternalExpireTimeFalse()
    {
        $this->assertFalse(Util::hasInternalExpireTime([]));
    }

    /**
     * @expectedException \Exception
     */
    public function testThrowExIfNotNumericInteger()
    {
        Util::checkInteger('2.3');
    }

    public function testThrowExIfNotNumericIntegerCorrectly()
    {
        Util::checkInteger('2');
    }

    public function testCheckArgString()
    {
        Util::checkArgString('string');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCheckArgStringWithNotString()
    {
        Util::checkArgString(5);
    }

    public function testCheckArgInteger()
    {
        Util::checkArgInteger(1);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCheckArgIntegerWithNotInteger()
    {
        Util::checkArgInteger('1');
    }

    public function testCheckArgSerializable()
    {
        Util::checkArgSerializable(1);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCheckArgSerializableWithNotSerializable()
    {
        Util::checkArgSerializable(tmpfile());
    }
}
