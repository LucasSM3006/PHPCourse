<?php
/*
| Arithmetic Operators
| Operator | Description    |
| -------- | -------------- |
| `+`      | Addition       |
| `-`      | Subtraction    |
| `*`      | Multiplication |
| `/`      | Division       |
| `%`      | Modulus        |
*/

$num1 = 20;
$num2 = 10;

// Basic math.
$output1 = "$num1 + $num2 = " . $num1 + $num2 ;
$output2 = "$num1 - $num2 = " . $num1 - $num2 ;
$output3 = "$num1 * $num2 = " . $num1 * $num2 ;
$output4 = "$num1 / $num2 = " . $num1 / $num2 ;
$output5 = "$num1 % $num2 = " . $num1 % $num2 ;

// Assignment operator
$num3 = 10;
$num3 = $num3 + 10;
$num3 += 20;
$num3 /= 2;
$num3 *= 2;

// Built in PHP functions
$randomNumOutput = rand(); // Generates a random number.
// Of course, the maximum number the random generate can get is the maximum allowed limited for integers.
$randomNumOutputBetween1and100 = rand(1,100);

// round() rounds floats
$roundedOutput = round(4.2);
$roundedCeilOutput = ceil(4.2); // Will be rounded upwards, even if it is 4.00001
$roundedFloorOutput = floor(4.7); // Will be rounded downwards.

// sqrt() square root.
$squareRootOf64 = sqrt(8);

// pi
$piValue = pi();

// abs() absolute value. grabs the value's absolute number. -10 is 10, -2 is 2, -4 is 4, for example.
$fourAbsolute = abs(-4);

// max() maximum value of an array. Accepts regular input & also arrays.
$maximumValue = max(1,2,50,3,4);
$maximumValueArray = max([10,2,3,4]);
$maximumStringvalue = max("a", "B"); // for whatever reason it thinks lower case is is bigger than B.

// min() opposite of max()

// number_format.
$floatValueWithALotOfHouses = 1222322.12839123139;

$floatFormatted = number_format($floatValueWithALotOfHouses, 2); // The decimal houses.
// It's used for formatting, adding "." and "," so you can work with different countries and how they handle thousands and cents.
// By the way, yes, it actually does round the number.
$floatFormatted = number_format($floatValueWithALotOfHouses, 2, '.', ','); // the "." is the decimal separator, the "," is the thousandth separator. 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>PHP From Scratch</title>
</head>

<body class="bg-gray-100">
  <header class="bg-blue-500 text-white p-4">
    <div class="container mx-auto">
      <h1 class="text-3xl font-semibold">PHP From Scratch</h1>
    </div>
  </header>
  <div class="container mx-auto p-4 mt-4">
    <div class="bg-white rounded-lg shadow-md p-6 mt-6">
      <!-- Output -->
      <p class="text-xl">
        <?= $output1 . "<br />" ?>
        <?= $output2 . "<br />" ?>
        <?= $output3 . "<br />" ?>
        <?= $output4 . "<br />" ?>
        <?= $output5 . "<br />" ?>
        <?= "Result of assignment operator: " . $num3 . "<br />" ?>
        <?= "Random number: " . $randomNumOutput . "<br />" ?>
        <?= "Random number between 1 and 100: " . $randomNumOutputBetween1and100 . "<br />" ?>
        <?= "maximum string value: " . $maximumStringvalue . "<br />" ?>
        <?= "non formatted float: " . $floatValueWithALotOfHouses . "<br />" ?>
        <?= "formatted float value: " . $floatFormatted . "<br />" ?>

      </p>
    </div>
  </div>
</body>

</html>