<?php

$names = array("John Madden", "John Doe", "John Dough");
$namesalt = ["John Madden", "John Doe", "John Dough"];

// FUNCTIONS!

function inspect($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

$numbers = [1,2,3,4,5,5,12,312,32,421,4,21,421,4,214,213,12];

echo $names[0] . "<br />";
echo $namesalt[0] . "<br />";

inspect($names);
// die(); // this functions kills anything after it. Anything below will not be executed.
inspect($numbers);

print_r($numbers); // shows all values formatted.

echo "<br />";

// echo $names; // this causes a warning, "array to string conversion".

// Adding elements to arrays. They're dynamically sized.

$numbers[17] = 123213; // Last position atm.
$numbers[] = 111; // Adds to the last position if empty.

unset($numbers[3]); // Not only removes the value, but also the index. Weird behaviour.

$numbers = array_values($numbers); // Rearranges the array, fixes the lacking indexes.

inspect($numbers);