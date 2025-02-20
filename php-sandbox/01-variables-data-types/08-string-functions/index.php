<?php
$output = null;
$string = "long string, yep";

// strlen. length of string.

$length = strlen($string);

// str_word_count. counts how many words.

$howManyWords = str_word_count($string);

// strpos. position where the word starts, based on index.

$indexOfWordString = strpos($string, "string");

// get char by index

$indexOfCharacter = $string[2];

// substr. makes a substring, takes two parameters, start and end.

$substring = substr($string, 5, 10);

// str_replace. replaces substrings with something else.

$replacedSubstring = str_replace("long", "VERY LONG", $string); // word we want to replace, word to replace, string to replace.

// strtolower

$lowerCaseString = strtolower($string);

// strtoupper

$upperCaseString = strtoupper($string);

// ucwords. makes the first letter of each word uppercase

$firstLetterUppercase = ucwords($string);

// trim. trims empty space @ the start and finish.

$trimmedString = trim("     empty space        ");

// most commonly used functions, but there's more.
// documentation: https://www.php.net/manual/en/ref.strings.php

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
      <p class="text-xl">
        <?= "Length of '" . $string . "': " . $length . "<br />" ?>
        <?= "Word count of '" . $string . "': " . $howManyWords . "<br />" ?>
        <?= "Index of when 'string' starts on '" . $string . "': " . $indexOfWordString . "<br />" ?>
        <?= "Length of" . $string . ": " . $length . "<br />" ?>
        <?= "Character at index 2 on '$string': $indexOfCharacter <br />" ?>
        <?= "Substring of '$string' starting at index 5 and ending at 10: $substring <br />" ?>
        <?= "Substring of '$string' with replacement of 'long': $replacedSubstring <br />" ?>

    </p>
    </div>
  </div>
</body>

</html>