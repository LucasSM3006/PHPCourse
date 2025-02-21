<?php

function makeStringUpperCase($string) // parameters
{
    return strtoupper($string);
}

function makeStringUpperCaseWithDefaultValue($string = "If no arguments were passed, defaults to this.")
{
    return strtoupper($string);
}

// spread operator
// function with multiple arguments but without necessarily declaring them

function addAll(...$numbers)
{
    $total = 0;
    foreach($numbers as $number)
    {
        $total += $number;
    }
    return $total;
}

function breakLine()
{
    echo "<br />";
}

echo makeStringUpperCase("lowercase string"); // argument
breakLine();
echo makeStringUpperCaseWithDefaultValue();
breakLine();
echo addAll(1,2,3,4,4,5,5,5,1,2,3,43,45,1);