<?php

$numbers = [1,2,3,4,5];

$squareFunction = function ($n)
{
    return $n * $n;
};

// $squaredNumbers = array_map(function ($number)
// {
//     return $number * $number;
// }, $numbers);

$squaredNumbers = array_map($squareFunction, $numbers);

// print_r($squaredNumbers);


function applyCallback($callback, $value)
{
    return $callback($value);
}

$double = function ($n)
{
    return $n * 2;
};

echo applyCallback($double, 100);