<?php
namespace TestCase;
use PHPUnit\Framework\TestCase;
use Complex\Complex;

class TestCaseComplexOperations extends TestCase {

	/**
    * @expectedException \Exception
    */
    public function testDivideByZero()
    {
        $complex = new Complex(2.5, -1);
        $complex->divideBy(0.0);
    }
    
	/**
    * @dataProvider providerAddition
    */
	public function testAddition($a, $b)
	{
		$args = func_get_args();
		$this->assertEqualsForComplexOperations($args, 'addition');
	}

    /**
     * @dataProvider providerSubtract
     */
	public function testSubtract()
	{
		$args = func_get_args();
		$this->assertEqualsForComplexOperations($args, 'subtract');
	}

    /**
     * @dataProvider providerMultiplyBy
     */	
	public function testMultiplyBy()
	{
		$args = func_get_args();
		$this->assertEqualsForComplexOperations($args, 'multiplyBy');
	}

    /**
     * @dataProvider providerDivideBy
     */	
	public function testDivideBy()
	{
		$args = func_get_args();
		$this->assertEqualsForComplexOperations($args, 'divideBy');
	}

	public function assertEqualsForComplexOperations($args, $method)
	{
		list($arg1, $arg2, $expected_result) = $args;
		$complex = new Complex($arg1[0], $arg1[1], $arg1[2]);
		$result = $complex->$method($arg2[0], $arg2[1]);

		$this->assertEquals($expected_result[0], $result->getReal());
		$this->assertEquals($expected_result[1], $result->getImaginary());
		$this->assertEquals($expected_result[2], $result->getSuffix());
		$this->assertEquals(new Complex($arg1[0], $arg1[1], $arg1[2]), $complex);
	}

    private $two_complex_value_data_sets = [
        [123,      null,   null,   456,        null,   null],
        [123.456,  null,   null,   789.012,    null,   null],
        [123.456,  78.90,  null,   -987.654,   -32.1,  null],
        [123.456,  78.90,  null,   -987.654,   null,   null],
        [-987.654, -32.1,  null,   0,          1,      null],
        [-987.654, -32.1,  null,   0,          -1,     null],
    ];

    private function formatTwoArgumentTestResultArray($expected_results)
    {
        $test_values = [];
        foreach ($this->two_complex_value_data_sets as $test => $data_set) {
            $test_values[$test][] = array_slice($data_set, 0, 3);
            $test_values[$test][] = array_slice($data_set, 3, 3);
            $test_values[$test][] = $expected_results[$test];
        }

        return $test_values;
    }

    public function providerAddition()
    {
        $expected_results = [
            [579, 0, ''],
            [912.468, 0, ''],
            [-864.198, 46.8, 'i'],
            [-864.198, 78.9, 'i'],
            [-987.654, -31.1, 'i'],
            [-987.654, -33.1, 'i'],
        ];

        return $this->formatTwoArgumentTestResultArray($expected_results);
    }

    public function providerSubtract()
    {
        $expected_results = [
            [-333, 0, ''],
            [-665.556, 0, ''],
            [1111.11, 111, 'i'],
            [1111.11, 78.9,'i'],
            [-987.654, -33.1,'i'],
            [-987.654, -31.1,'i'],
        ];

        return $this->formatTwoArgumentTestResultArray($expected_results);
    }

    public function providerMultiplyBy()
    {
        $expected_results = [
            [56088, 0, ''],
            [97408.265472, 0, ''],
            [-119399.122224, -81888.8382, 'i'],
            [-121931.812224, -77925.9006, 'i'],
            [32.1, -987.654, 'i'],
            [-32.1, 987.654, 'i'],
        ];

        return $this->formatTwoArgumentTestResultArray($expected_results);
    }

    public function providerDivideBy()
    {
        $expected_results = [
            [0.26973684210526, 0, ''],
            [0.15646910313151, 0, ''],
            [-0.127461004165656, -0.07574363265504158, 'i'],
            [-0.1249992406247532, -0.0798862759630397, 'i'],
            [-32.1, 987.654, 'i'],
            [32.1, -987.654, 'i'],
        ];

        return $this->formatTwoArgumentTestResultArray($expected_results);
    }
}