<?php

for($i = 0; $i < 10; $i++)
{
    echo $i;
}

$count = 0;

do
{
    echo $count;
    $count++;
} while($count < 10);

$count = 0;

while($count < 10)
{
    echo $count . "<br />";
    $count++;
};
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
            <ul>
                <?php for($i = 0; $i < 10; $i++): ?>
                    <li>NumberForLoop: <?= $i ?></li>
                <?php endfor; ?>
                    <br />
                <?php $i = 0; while ($i < 10): ?>
                    <li>NumberWhileLoop: <?= $i ?></li>
                <?php $i++; endwhile; ?>
                    <br />
                <?php $i = 0; do {?>
                    <li>NumberDoLoop: <?= $i ?></li>
                <?php $i++; } while($i < 10); ?>
            </ul>
        </div>
    </div>
</body>

</html>