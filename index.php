<?php

require_once "vendor/autoload.php";

use Complex\Complex;

$a = new Complex(2, 3, 'j');
 
echo 'Комплексное число: ' . $a . '<br>';

echo 'Сложение: ' . $a->addition(10.10, '-10.10') . '<br>';

echo 'Вычитание: ' . $a->subtract(5.5, 5.5) . '<br>';

echo 'Умножение: ' . $a->multiplyBy(5.5, 6.2) . '<br>';

echo 'Деление: ' . $a->divideBy(5, -7) . '<br>'. '<br>';



$b = new Complex(2);
 
echo 'Комплексное число: ' . $b . '<br>';

echo 'Сложение: ' . $b->addition(10.10, 10.10) . '<br>';

echo 'Вычитание: ' . $b->subtract(5.5, 5.5) . '<br>';

echo 'Умножение: ' . $b->multiplyBy(5.5, 6.2) . '<br>';

echo 'Деление: ' . $b->divideBy(5, -7) . '<br>'. '<br>';


$b = new Complex(2, 3);
 
echo 'Комплексное число: ' . $b . '<br>';

echo 'Сложение: ' . $b->addition( 0, 10.10) . '<br>';

echo 'Вычитание: ' . $b->subtract( 0, 5.5) . '<br>';

echo 'Умножение: ' . $b->multiplyBy(0, 6.2) . '<br>';

echo 'Деление: ' . $b->divideBy(0, -7) . '<br>'. '<br>';


$b = new Complex(2);
 
echo 'Комплексное число: ' . $b . '<br>';

echo 'Сложение: ' . $b->addition(10.10) . '<br>';

echo 'Вычитание: ' . $b->subtract(5.5) . '<br>';

echo 'Умножение: ' . $b->multiplyBy(5.5) . '<br>';

echo 'Деление: ' . $b->divideBy(5) . '<br>'. '<br>';


$b = new Complex(2, "3");
 
echo 'Комплексное число: ' . $b . '<br>';

echo 'Сложение: ' . $b->addition( 0, 10.10) . '<br>';

echo 'Вычитание: ' . $b->subtract( 0, "5.5") . '<br>';

echo 'Умножение: ' . $b->multiplyBy(0, 6.2) . '<br>';

echo 'Деление: ' . $b->divideBy(0, "-7") . '<br>'. '<br>';


$b = new Complex(2, "3");
 
echo 'Комплексное число: ' . $b . '<br>';

echo 'Сложение: ' . $b->addition( 0, 10.10) . '<br>';

echo 'Вычитание: ' . $b->subtract( 0, 0) . '<br>'. '<br>';

// echo 'Деление: ' . $b->divideBy(0, 0) . '<br>'. '<br>';


$b = new Complex(2);
 
echo 'Комплексное число: ' . $b . '<br>';

echo 'Сложение: ' . $b->addition( 0, "10.10f") . '<br>';

echo 'Вычитание: ' . $b->subtract( 0, 6.2) . '<br>';

echo 'Деление: ' . $b->divideBy(0, 6.2) . '<br>'. '<br>';
