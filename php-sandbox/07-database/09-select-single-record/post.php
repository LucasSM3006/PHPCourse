<?php
require_once 'database.php';

$id = $_GET['id'] ?? null;

if(!$id)
{
  header('Location: index.php');
  exit;
}

$displayPost = false;


$sql = ('SELECT * FROM posts where id = :id');

$stmt = $pdo->prepare($sql);

$params = ['id' => $id]; // Basically tells it to replace ':id' with the value of $id.

$stmt->execute($params);

$post = $stmt->fetch();

$displayPost = true;

if($post === false)
{
  $displayPost = false;
}
else
{
  $displayPost = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Post One</title>
</head>

<body class="bg-gray-100">
  <header class="bg-blue-500 text-white p-4">
    <div class="container mx-auto">
      <h1 class="text-3xl font-semibold">My Blog</h1>
    </div>
  </header>
  <div class="container mx-auto p-4 mt-4">

    <div class="md my-4">
      <div class="rounded-lg shadow-md">
        <div class="p-4">
          <?php if($displayPost) : ?>
            <h2 class="text-xl font-semibold"><?= $post['title'] ?></h2>
            <p class="text-gray-700 text-lg mt-2 mb-5"><?= $post['body'] ?></p>
            <?php else: ?>
            <h2 class="text-xl font-semibold">Post not found.</h2>
          <?php endif; ?>
          <a href="index.php">Go Back</a>
        </div>
      </div>
    </div>

  </div>
</body>

</html>