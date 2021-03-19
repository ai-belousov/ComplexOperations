<?php

require_once "vendor/autoload.php";

use App\Complex;
use UnitTest\UnitTest;

$a = new Complex(2, 3);
 
echo 'Комплексное число: ' . $a . '<br>';

echo 'Сложение: ' . $a->addition(10.10, 10.10) . '<br>';

echo 'Вычитание: ' . $a->subtract(5.5, 5.5) . '<br>';

echo 'Умножение: ' . $a->multiplyBy(5.5, 6.2) . '<br>';

echo 'Деление: ' . $a->divideBy(5, -7) . '<br>';

var_dump($a->addition(10.10, 10.10));