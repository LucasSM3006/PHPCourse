<?php
// echo $_SERVER['REQUEST_METHOD'];

$title = '';
$description = '';
$isSubmitted = false;

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) // we can get the data out of input fields through the names of the fields. Submit is a field at the bottom.
{
  $title = htmlspecialchars($_POST['title']) ?? "";
  $description = htmlspecialchars($_POST['description']) ?? "";

  // echo "Title: {$title}, Description: {$description}";
  $isSubmitted = true;
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Job Listing</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
      <h1 class="text-2xl font-semibold mb-6">Create Job Listing</h1>
       <form method="post"> <!-- action="process.php" action is going to submit that data to a certain file. if we leave it empty, it defaults to index.php-->
        <div class="mb-4">
          <label for="title" class="block text-gray-700 font-medium">Title</label>
          <input type="text" id="title" name="title" placeholder="Enter job title" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none">
        </div>
        <div class="mb-6">
          <label for="description" class="block text-gray-700 font-medium">Description</label>
          <textarea id="description" name="description" placeholder="Enter job description" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none"></textarea>
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
            Create Listing
          </button>
          <a href="#" class="text-blue-500 hover:underline">Back to Listings</a>
        </div>
      </form>

      <!-- Display submitted data -->
       <?php if($isSubmitted) : ?>
        <div class="mt-6 p-4 border rounded bg-gray-200">
          <h2 class="text-lg font-semibold">Submitted Listing:</h2>
          <p>
            <strong>Title:</strong>
            <?= $title ?>
          </p>
          <p>
          <strong>Description:</strong>
            <?= $description ?>
          </p>
        </div>
        <?php endif; ?>
    </div>
  </div>
</body>

</html>