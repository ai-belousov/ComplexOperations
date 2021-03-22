<?php
namespace TestCase;
use PHPUnit\Framework\TestCase;
use Complex\Complex;

class ComplexTest extends TestCase
{

    public function testInstantiate()
    {
        $complex_object = new Complex();
        $this->assertTrue(is_object($complex_object));

        $default_complex_real = $complex_object->getReal();
        $this->assertEquals(0.0, $default_complex_real);

        $defaultComplexImaginary = $complex_object->getImaginary();
        $this->assertEquals(0.0, $defaultComplexImaginary);

        $defaultComplexSuffix = $complex_object->getSuffix();
        $this->assertEquals('', $defaultComplexSuffix);
    }

    public function testInstantiateWithArgument()
    {
        $complex_object = new Complex(123.456);

        $default_complex_real = $complex_object->getReal();
        $this->assertEquals(123.456, $default_complex_real);

        $defaultComplexImaginary = $complex_object->getImaginary();
        $this->assertEquals(0.0, $defaultComplexImaginary);

        $defaultComplexSuffix = $complex_object->getSuffix();
        $this->assertEquals('', $defaultComplexSuffix);
    }

    public function testInstantiateWithArguments()
    {
        $complex_object = new Complex(1.2, 3.4);

        $default_complex_real = $complex_object->getReal();
        $this->assertEquals(1.2, $default_complex_real);

        $defaultComplexImaginary = $complex_object->getImaginary();
        $this->assertEquals(3.4, $defaultComplexImaginary);

        $defaultComplexSuffix = $complex_object->getSuffix();
        $this->assertEquals('i', $defaultComplexSuffix);
    }

    public function testFormat()
    {
        $complex_object = new Complex(0, -2.5 ,'i');
        $format = $complex_object->format();
        $this->assertEquals('-2.5i', $format);

        $complex_object = new Complex(0, -1 ,'i');
        $format = $complex_object->format();
        $this->assertEquals('-i', $format);

        $complex_object = new Complex(-1, 2, 'i');
        $format = $complex_object->format();
        $this->assertEquals('-1+2i', $format);

        $complex_object = new Complex(0.0);
        $format = $complex_object->format();
        $this->assertEquals('0.0', $format);
    }


    public function testInvalidComplex()
    {
        $complex = new Complex('ABCDEFGHI');
        $this->expectException(\Exception::class);
        throw new \Exception('Wrong exception');

    }
}
