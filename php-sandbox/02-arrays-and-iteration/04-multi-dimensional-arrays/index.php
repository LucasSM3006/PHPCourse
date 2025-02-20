<?php
$output = null;

$fruits = [
  ['Apple', 'Red'],
  ['Orange', 'Orange'],
  ['Pear', 'Green']
];

$apple = $fruits[0][0];
$orange = $fruits[1][0];
$pear = $fruits[2][0];

$appleColor = $fruits[0][1];
$orangeColor = $fruits[1][1];
$pearColor = $fruits[2][1];



$users = [
  ['name' => 'John', 'email' => 'johndoe@hmail.com', 'password' => '123456'],
  ['name' => 'Marianne', 'email' => 'marianne@hmail.com', 'password' => '123456'],
  ['name' => 'Rose', 'email' => 'rose@hmail.com', 'password' => '123456'],
];

$users[] = ['Joseph' => 'Rose', 'email' => 'joseph@hmail.com', 'password' => '123456'];

$mariannesEmail = $users[1]['email'];
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
      <p class="text-xl"><?= $output ?></p>
      <p class="text-xl"><?= $apple ?></p>
      <p class="text-xl"><?= $orange ?></p>
      <p class="text-xl"><?= $pear ?></p>
      <p class="text-xl"><?= $appleColor ?></p>
      <p class="text-xl"><?= $orangeColor ?></p>
      <p class="text-xl"><?= $pearColor ?></p>
      <br />
      <p class="text-xl">
        <pre>
          <?php print_r($users);?>
        </pre>
      </p>
      <p class = "text-xl"><?= $mariannesEmail ?></p>
    </div>
  </div>
</body>

</html>