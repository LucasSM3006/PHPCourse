<?php

$defaultColor;
$favoriteColor;

// Ternary operator
$color = isset($favoriteColor) ? $favoriteColor : 'red';

// Null coalescing operator. Same thing as the ternary operator above. Whatever is on the left is null, it'll be what is on the right.
$color = $favoriteColor ?? 'red';

// Ternary operator inside a ternary operator.
$color = isset($favoritecolor) ? $favoriteColor : (isset($defaultColor) ? $defaultColor : 'red');

// Null coalescing operator doing the same operation as above.
$color = $favoriteColor ?? $defaultColor ?? 'red';