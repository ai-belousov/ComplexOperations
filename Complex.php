<?php
// namespace Complex;

/**
 * 
 */
class Complex
{

	protected $real;
	protected $imaginary;
	protected $suffix;
	protected $complex;

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

        // echo $this->complex;
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

	public function format(): string
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

$a = new Complex(5.5, 6.2);
echo $a.'<br>';

$a->addition(5.5, 6.2);

echo $a.'<br>';

$a->subtract(5.5, 6.2);
echo $a.'<br>';


$a->multiply(5.5, 6.2);
echo $a.'<br>';


$a->divideby(5.5, 6.2);
echo $a.'<br>';