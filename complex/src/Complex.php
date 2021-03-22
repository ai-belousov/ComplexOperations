<?php
namespace Complex;

/**
 * объект Комплексного числа
 * @package Complex 
 * 
 * @method Complex addition( float $real, string $imaginary) Сложение комплексного числа
 * @method Complex subtract( float $real, string $imaginary) Вычитание комплексного числа
 * @method Complex multiplyBy( float $real, string $imaginary) Умножение комплексного числа
 * @method Complex divideBy( float $real, string $imaginary) Деление комплексного числа
 */
class Complex
{

	/**
     * Вещественная часть комплексного числа
     * @var float
     */
    protected $real = 0.0;

    /**
     * Мнимая часть комплексного числа
     * @var float
     */
	protected $imaginary = 0.0;

    /**
     * Идентификатор мнимой части
     * @var string
     */
	protected $suffix = '';

	/**
	 * __construct создаем комплексное число
	 * @param float  $real      Вещественная часть комплексного числа
	 * @param float  $imaginary Мнимая часть часть комплексного числа
	 * @param string $suffix    Идентификатор мнимой части
	 */
	public function __construct( $real = 0.0, $imaginary = 0.0, $suffix = 'i')
    {
        if ($imaginary != 0.0 && empty($suffix)) {
            $suffix = 'i';
        } elseif ($imaginary == 0.0 && !empty($suffix)) {
            $suffix = '';
        }

        $this->real = (float) $real;
        $this->imaginary = (float) $imaginary;
        $this->suffix = (string) strtolower($suffix);
    }

    /**
     * Сложение комплексного числа
     * @param  float|string  $real      Вещественная часть комплексного числа
     * @param  float|string  $imaginary Минмая часть комплексного числа
     * @return Complex                  Создаем новое комплексное число
     */
    public function addition($real = 0.0, $imaginary = 0.0)
    {
        $real = floatval ($real);
        $imaginary = floatval ($imaginary);

        $real = $real + $this->getReal();
        $imaginary = $imaginary + $this->getImaginary();

        $result = new Complex(
            $real,
            $imaginary,
            $this->getSuffix()
        );

        return $result;
    }

    /**
     * Вычитание комплексного числа
     * @param  float  $real      Вещественная часть комплексного числа
     * @param  float  $imaginary Минмая часть комплексного числа
     * @return Complex           Создаем новое комплексное число
     */
    public function subtract($real = 0.0, $imaginary = 0.0)
    {
        $real = floatval ($real);
        $imaginary = floatval ($imaginary);
    	$real = $this->getReal() - $real;
        $imaginary = $this->getImaginary() - $imaginary;

        $result = new Complex(
            $real,
            $imaginary,
            $this->getSuffix()
        );

        return $result;
    }

    /**
     * Умножение комплексного числа
     * @param  float  $real      Вещественная часть комплексного числа
     * @param  float  $imaginary Минмая часть комплексного числа
     * @return Complex           Создаем новое комплексное число
     */
    public function multiplyBy($real2 = 0.0, $imaginary2 = 0.0)
    {
        $real2 = floatval ($real2);
        $imaginary2 = floatval ($imaginary2);
        
    	$real = ($this->real * $real2) - ($this->imaginary * $imaginary2);
        $imaginary = ($this->real * $imaginary2 + $this->imaginary * $real2);

        $result = new Complex(
            $real,
            $imaginary,
            $this->getSuffix()
        );

        return $result;
    }

    /**
     * Деление комплексного числа
     * @param  float  $real      Вещественная часть комплексного числа
     * @param  float  $imaginary Минмая часть комплексного числа
     * @return Complex           Создаем новое комплексное число
     */
    public function divideBy($real2 = 0.0, $imaginary2 = 0.0)
    {
        $real2 = floatval ($real2);
        $imaginary2 = floatval ($imaginary2);

        if ($real2 == 0.0 && $imaginary2 == 0.0) {
            throw new \Exception('Division by zero');
        }

    	$real = ($this->real * $real2 + $this->imaginary * $imaginary2)/($real2 * $real2 + $imaginary2 * $imaginary2);
        $imaginary = ($this->imaginary * $real2 - $this->real * $imaginary2)/($real2 * $real2 + $imaginary2 * $imaginary2);

        $result = new Complex(
            $real,
            $imaginary,
            $this->getSuffix()
        );

        return $result;
    }

    private function valueToFloat($val)
    {
        $val = (float) $val;
        
        return [$real, $imaginary];
    }

    /**
     * Возвращает вещественную часть комплексного числа
     * @return float
     */
    public function getReal(): float
    {
        return $this->real;
    }

    /**
     * Возвращает мнимую часть комплексного числа
     * @return float
     */
    public function getImaginary(): float
    {
        return $this->imaginary;
    }

    /**
     * Возвращает идентификатор комплексного числа
     * @return string
     */
    public function getSuffix(): string
    {
        return $this->suffix;
    }
    
    /**
     * Возвращает строку созданную на основе объекта комплексного числа
     * @return string
     */
	public function format(): string
    {
        $str = "";
        if ($this->imaginary != 0.0) {
            if ($this->imaginary != 1.0 && $this->imaginary != -1.0) {
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

    /**
     * При обращении к объекту как к строке возвращает строку сформированную из комплексного объекта Пример: "echo object" вернет 
     * @return string [description]
     */
    public function __toString(): string
    {
        return $this->format();
    }

}