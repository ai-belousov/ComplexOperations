<?php

require_once "vendor/autoload.php";

// include('bootstrap.php');

use App\Complex;
use UnitTest\UnitTest;

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

// $test = new UnitTest();
// $test->testPower();