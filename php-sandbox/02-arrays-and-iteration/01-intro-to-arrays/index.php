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

// echo $names; // this causes a warning, "array to string conversion".