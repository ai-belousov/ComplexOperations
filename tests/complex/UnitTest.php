<?php
namespace UnitTest;
use PHPUnit\Framework\TestCase;
use App\Complex;

class Test extends TestCase {

	private static $precision;

    public static function setPrecision()
    {
        self::$precision = ini_set('precision', 10);
    }

	public function testAddition()
	{
		// echo PHP_EOL.'testAddition()'.PHP_EOL;
		$complex = new Complex(2, 3);
		$result = $complex->addition(5, -7);
		$this->assertEquals(7, $result->getReal());
		$this->assertEquals(-4, $result->getImaginary());
		$this->assertEquals(new Complex(2, 3), $complex);
	}

	public function testSubtract()
	{
		// echo PHP_EOL.'testSubtract()'.PHP_EOL;
		$complex = new Complex(2, 3);
		$result = $complex->subtract(5, -7);
		$this->assertEquals(-3, $result->getReal());
		$this->assertEquals(10, $result->getImaginary());
		$this->assertEquals(new Complex(2, 3), $complex);
	}
	
	public function testMultiplyBy()
	{
		// echo PHP_EOL.'testMultiplyBy()'.PHP_EOL;
		$complex = new Complex(2, 3);
		$result = $complex->multiplyBy(5, -7);
		$this->assertEquals(31, $result->getReal());
		$this->assertEquals(1, $result->getImaginary());
		$this->assertEquals(new Complex(2, 3), $complex);
	}

	public function testDivideBy()
	{
		// echo PHP_EOL.'testDivideBy()'.PHP_EOL;
		$complex = new Complex(2, 3);
		$result = $complex->divideBy(5, -7);
		$this->assertEquals(-0.1486486486, $result->getReal());
		$this->assertEquals(0.3918918919, $result->getImaginary());
		$this->assertEquals(new Complex(2, 3), $complex);
		echo $result->getReal();
	}

}