<?php

require 'database.php';

// if database.php is somewhere else, you need to type out the location.
// require '../../database.php;

$statement = $pdo->prepare("SELECT * FROM posts");

// running it.

$statement->execute();

// get results.

$posts = $statement->fetchAll();

// $results = $statement->fetchAll(PDO::FETCH_ASSOC); // This code will just get an associative array.
// We get indexes in the fetchAll(), but by giving it PDO::FETCH_ASSOC as a parameter, we just get the arrays without the indexes.
// It's also possible to set attributes (CHECK /database.php) to see that. Commented below the attribute set.

// echo "<pre>";
// var_dump($results);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Blog</title>
</head>

<body class="bg-gray-100">
  <header class="bg-blue-500 text-white p-4">
    <div class="container mx-auto">
      <h1 class="text-3xl font-semibold">My Blog</h1>
    </div>
  </header>

  <div class="container mx-auto p-4 mt-4">
    <?php foreach($posts as $post): ?>
    <div class="md my-4">
      <div class="rounded-lg shadow-md">
        <div class="p-4">
          <h2 class="text-xl font-semibold"><?= $post['title'] ?></h2>
          <p class="text-gray-700 text-lg mt-2"><?= $post['body'] ?></p>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

</body>

</html>