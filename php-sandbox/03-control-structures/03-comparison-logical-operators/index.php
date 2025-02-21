<?php

function breakLine()
{
    echo "<br />";
}

/*
| Comparison Operators
| Operator | Description              |
| -------- | ------------------------ |
| ==       | Equal to                 |
| ===      | Identical to             |
| !=       | Not equal to             |
| <>       | Not equal to             |
| !==      | Not identical to         |
| <        | Less than                |
| >        | Greater than             |
| <=       | Less than or equal to    |
| >=       | Greater than or equal to |
*/

$x = 10;
$y = 10;

var_dump($x == $y);
breakLine();

// now here's something that is both nifty but also kinda annoyin'.
$a = 10;
$b = '10';

var_dump($a == $b); // This returns true. We need to do it like javascript for types.
breakLine();
var_dump($a === $b); // Both value and type, thus, returns false.
breakLine();

$differentToA = 11;
$sameAsB = 10;

// Not equal.

var_dump($a != $differentToA); // true
breakLine();
var_dump($b != $sameAsB); // false
breakLine();
var_dump($a != $b); // false 'cause they hold the same value.
breakline();
var_dump($a !== $b); // true 'cause theyre not identical.
breakline();
var_dump($a <> $b); // false, afaik, same as !=
breakLine();

// Lesser/Equal/Greater

var_dump($a > $b); // false, 10 == 10
breakLine();
var_dump($a < $b); // false, 10 == 10
breakLine();
var_dump($a >= $b); // true 'cause 10 is equal to 10
breakLine();
var_dump($a <= $b); // true 'cause 10 is equal to 10
breakLine();


/*
| Logical Operators
| Operator | Description            |
| -------- | ---------------------- |
| and      | True if both are true  |
| &&       | True if both are true  |
| or       | True if either is true |
| ||       | True if either is true |
| xor      | True if one is true    |
| !        | True if it is not true |
*/

$a = 10;
$b = 20;

var_dump(10 == 10 && $b == 20);
breakLine();
var_dump(10 == 10 and $b == 20);
breakLine();
var_dump(10 == 1 || $b == 20);
breakLine();
var_dump(10 == 1 or $b == 20);
breakLine();
var_dump(10 == 10 xor $b == 20); // False. If more than one is true, it is false. Very... Rare.
breakLine();
var_dump(!(10 == 1)); // True because 10 is not equal to 1, which is false, which in turn, because of '!' is true.
breakLine();