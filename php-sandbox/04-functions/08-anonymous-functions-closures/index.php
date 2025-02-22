<?php

// Anonymous function
$square = function ($number)
{
    return $number * $number;
};

$number = 5;
$result = $square($number);

echo "The square of {$number} is: {$result} <br />";

// Closures

function createCounter()
{
    $count = 0;

    $counter = function() use (&$count)
    {
        return ++$count;
    };

    return $counter;
}

$counter = createCounter();

echo $counter() . "<br />";
echo $counter() . "<br />";
echo $counter() . "<br />";
echo $counter() . "<br />";