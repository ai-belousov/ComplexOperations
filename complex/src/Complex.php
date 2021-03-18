<?php
namespace App;

/**
 * 
 */
class Complex
{

	protected $real;
	protected $imaginary;
	protected $suffix;

	/**
	 * __construct получаем вещественную чать
	 * @param float  $real      Вещественная часть
	 * @param float  $imaginary Мнимая часть
	 * @param string $suffix    Суффикс
	 */
	public function __construct(float $real = 0.0, float $imaginary = null, string $suffix = 'i')
    {
        $this->real = $real;
        $this->imaginary = $imaginary;
        $this->suffix = $suffix;
    }

    public function addition(float $real = 0.0, float $imaginary)
    {
    	$this->real += $real;
        $this->imaginary += $imaginary;        
    }

    public function subtract(float $real = 0.0, float $imaginary)
    {
    	$this->real -= $real;
        $this->imaginary -= $imaginary;
    }

    public function multiply(float $a2 = 0.0, float $b2)
    {
    	$real_multiply = ($this->real * $a2 - $this->imaginary * $b2);
        $imaginary_multiply = ($this->real * $b2 + $this->imaginary * $a2);

        $this->real = $real_multiply;
		$this->imaginary = $imaginary_multiply;
    }

    public function divideby(float $a2 = 0.0, float $b2)
    {
    	$real_divideby = ($this->real * $a2 + $this->imaginary * $b2)/($a2 * $a2 + $b2 * $b2);
        $imaginary_divideby = ($this->imaginary * $a2 - $this->real * $b2)/($a2 * $a2 + $b2 * $b2);

        $this->real = $real_divideby;
		$this->imaginary = $imaginary_divideby;
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