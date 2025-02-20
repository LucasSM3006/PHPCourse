<?php

$number1 = 5;
$number2 = 100;
$number3 = '22';
$number4 = 0;
$fruit = 'apple';
$bool1 = true;
$bool2 = false;
$null = null;

// Implicit conversion
$result = $number1 + $number2; // This is an int. No conversion. 
$result = $number1 + $number3; // This is an int. String to integer conversion.
$result = $number3 + $number3; // This is also an int. String to integer conversion.
$result = $number3 . $number1; // This is a string. String + (string) int.
// $result = $fruit + $number2; // Error type. String + Int is not supported.
$result = $number1 + $bool1; // This is an int... Yep, it treats boolean as a 0 or 1 in calculations. Both love and hate this.
$result = null + $number1; // This is an int. Converts null into 0.


// Explicit conversion
$result = (string) $number1; // Like a cast. We force it ourselves.
$result = (int) $number3; // Casting a string to an int.
$result = (bool) $number1; // Becomes a true. Bigger than 1.
$result = (bool) $number4; // Becomes a false.

var_dump($result);