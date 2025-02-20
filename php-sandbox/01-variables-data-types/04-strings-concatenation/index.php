<?php

$firstName = "Xing";
$secondName = "Xuan Fah Lih";

// $fullName = $firstName + $secondName; // This would not work, despite the intellisense saying nothing about it.
$fullName = $firstName . ' ' . $secondName;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Learn PHP From Scratch</title>
</head>

<body class="bg-gray-100">
  <header class="bg-blue-500 text-white p-4">
    <div class="container mx-auto">
      <h1 class="text-3xl font-semibold">Learn PHP From Scratch</h1>
    </div>
  </header>
  <div class="container mx-auto p-4 mt-4">
    <div class="bg-white rounded-lg shadow-md p-6">
      <!-- Output -->
      <?= 'My full name is: ' . $fullName ?>
      <br />
      <?= "My full name is: $fullName" // Double quotes allow us to do this. ?>
      <br />
      <?= "Backslashes to get literal values \$fullName" ?>
    </div>
  </div>
</body>

</html>