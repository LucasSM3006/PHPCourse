<?php
/*
  Challenge 1: Fahrenheit to Celsius
  Create a function called `fahrenheitToCelsius` that takes a Fahrenheit temperature as an argument. Return the temperature converted to Celsius.

  The formula to convert Fahrenheit to Celsius is: Celsius = (Fahrenheit - 32) * 5/9
*/

function fahrenheitToCelsius($temp)
{
  return ($temp - 39) * 5/9;
}

echo "90 F to C: " . fahrenheitToCelsius(90);
echo '<br>';
echo "120 F to C: " . fahrenheitToCelsius(120);
echo '<br>';
echo "150 F to C: " . fahrenheitToCelsius(150);
echo '<br>';
echo "32 F to C: " . fahrenheitToCelsius(32);
echo '<br>';
echo '<br>';

/*
  Challenge 2: Print names in uppercase
  Create a function called `printNamesToUpperCase` that takes an array of names as an argument.
  The function should loop through the array and print each name to the screen in uppercase letters.
*/

$names =
[
  "John",
  "Maria",
  "Juarez",
  "Aiko",
  "Yuki",
  "Ichiban",
  "Falkore"
];

function printNamesToUpperCase($names) 
{
  foreach($names as $name)
  {
    echo strtoupper($name);
    echo '<br>';
  }
}

echo printNamesToUpperCase($names);

echo '<br>';
echo '<br>';

/*
  Challenge 3: Find the longest word
  1. Create a function called `findLongestWord` that takes a sentence as an argument.
  2. The function should return the longest word in the sentence.
  3. The output should look like this:
*/

$longSentence = "The biggest possible word that exists in the world is REALLY big, but I have no idea what it could possibly be, so here's a long one in Portuguese: Otorrinolaringologista.";

function findLongestWord($sentence)
{
  $longestWord = "";

  $sentenceArray = explode(" ", $sentence);

  foreach($sentenceArray as $word)
  {
    if(strlen($word) > strlen($longestWord))
    {
      $longestWord = $word;
    }
  }

  return $longestWord;
}

echo findLongestWord($longSentence);