<?php

/*
  PHP DATA TYPES:

- String
- Integer
- Float
- Boolean
- Array
- Object
- NULL
- Resource
*/

// Strings
// There are no chars in PHP.

$name1 = 'Single Quote String'; 
$name2 = "Double Quote String";

var_dump($name1); // Dumps value & type in an echo.
echo "<br />";
var_dump($name2);

echo "<br />";
echo getType($name1);
echo "<br />";

// Integers
// Follows tradition of between -2147483648 and 2147483647

$integer1 = 23347472;

var_dump($integer1);

echo "<br />";

// Float

$float1 = 10.01;

var_dump($float1);

echo "<br />";

// Bools
// T / F

$true = true;
$false = false;

var_dump($true);
echo "<br />";
var_dump($false);

echo "<br />";

// Array

$numbers = [1,2,3,4,5,6,7,8];
$strings = ["aaa", "bbbb", "cccc"];
$differentTypes = ["aaa", 1, 20.96, true];

var_dump($numbers);
echo "<br />";
var_dump($strings);
echo "<br />";
var_dump($differentTypes);
echo "<br />";

// Object

$person = new stdClass();

var_dump($person);

echo "<br />";

// Null 

$nullValue = null; // Null is its own type. Simply dumps as "NULL"

var_dump($nullValue);

echo "<br />";

// Reference
// Could be a file, a sample, a json, etc. Outside resources.

$file = fopen('TestFile.txt', 'r'); // We can change the 'r' to 'w' to write.

// If the file isn't found, it "prints" out a warning instead.

var_dump($file);

echo "<br />";