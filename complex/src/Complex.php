<?php
namespace App;

/**
 * 
 */
class Complex
{

	protected $real = 0.0;
	protected $imaginary = 0.0;
	protected $suffix;

	/**
	 * __construct создаем комплексное число
	 * @param float  $real      Вещественная часть
	 * @param float  $imaginary Мнимая часть
	 * @param string $suffix    Суффикс
	 */
	public function __construct(float $real = 0.0, float $imaginary = 0.0, string $suffix = 'i')
    {
        $this->real = $real;
        $this->imaginary = $imaginary;
        $this->suffix = strtolower($suffix);
    }

    public function addition(float $real = 0.0, float $imaginary = 0.0)
    {
        $real = $real + $this->getReal();
        $imaginary = $imaginary + $this->getImaginary();

        $result = new Complex(
            $real,
            $imaginary,
            $this->getSuffix()
        );

        return $result;
    }

    public function subtract(float $real = 0.0, float $imaginary = 0.0)
    {
    	$real = $this->getReal() - $real;
        $imaginary = $this->getImaginary() - $imaginary;

        $result = new Complex(
            $real,
            $imaginary,
            $this->getSuffix()
        );
        return $result;
    }

    public function multiplyBy(float $real2 = 0.0, float $imaginary2 = 0.0)
    {
    	$real = ($this->real * $real2) - ($this->imaginary * $imaginary2);
        $imaginary = ($this->real * $imaginary2 + $this->imaginary * $real2);

        $result = new Complex(
            $real,
            $imaginary,
            $this->getSuffix()
        );
        return $result;
    }

    public function divideBy(float $real2 = 0.0, float $imaginary2 = 0.0)
    {
    	$real = ($this->real * $real2 + $this->imaginary * $imaginary2)/($real2 * $real2 + $imaginary2 * $imaginary2);
        $imaginary = ($this->imaginary * $real2 - $this->real * $imaginary2)/($real2 * $real2 + $imaginary2 * $imaginary2);

        $result = new Complex(
            $real,
            $imaginary,
            $this->getSuffix()
        );
        return $result;
    }

    public function getReal(): float
    {
        return $this->real;
    }

    public function getImaginary(): float
    {
        return $this->imaginary;
    }

    public function getSuffix(): string
    {
        return $this->suffix;
    }
    
	private function format(): string
    {
        $str = "";
        if ($this->imaginary != 0.0) {
            if ($this->imaginary != 1.0) {
                $str .= $this->imaginary . $this->suffix;
            } else {
                $str .= (($this->imaginary < 0.0) ? '-' : '') . $this->suffix;
            }
        }
        if ($this->real != 0.0) {
            if (($str) && ($this->imaginary > 0.0)) {
                $str = "+" . $str;
            }
            $str = $this->real . $str;
        }
        if (!$str) {
            $str = "0.0";
        }

        return $str;
    }

    public function __toString(): string
    {
        return $this->format();
    }

}