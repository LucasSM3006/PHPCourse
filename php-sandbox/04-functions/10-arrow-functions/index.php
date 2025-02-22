<?php

// arrow functions
// special type of anonymous lambda function
// allows us to write one line functions

// regular function
function add($a,$b)
{
    return $a+$b;
}

// arrow function... C# lambda
$add = fn ($a,$b) => $a + $b;

echo add(1,5);
echo "<br />";
echo $add(1,5);

$numbers = [1,2,3,4,5];

$squared = function ($n)
{
    return $n * $n;
};

$squaredArr = fn ($n) => $n * $n;

$squaredNumbers = array_map($squared, $numbers);
$squaredNumbersArr = array_map($squaredArr, $numbers);

print_r($squaredNumbers);
echo "<br />";
print_r($squaredNumbersArr);