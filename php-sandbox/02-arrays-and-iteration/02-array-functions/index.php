<?php
$output = null;

$ids = [10,22,15,45,76];
$users = ['user1','user3','user2'];

$output = count($ids);

// sort. directly manipulates the array instead of returning a value.

sort($ids);
sort($users);

// rsort. reverse sort.

rsort($ids);
rsort($users);

// array_push, adds value to the last position of an array, it's a function that also manipulates arrays directly

array_push($ids, 100);
array_push($users, "user4");

// array_pop. removes last element of array.

array_pop($ids);
array_pop($users);

// array_shift. take off an element from the beginning.
array_shift($ids);
array_shift($users);

// array_unshit. adds an element at the beginning.
array_unshift($ids, 100);
array_unshift($users, "user5");

// array_slice. cuts arrays and makes a subarray.
$ids2 = array_slice($ids, 2, 4); // array, where to begin, where to end.
// var_dump($ids2);

// array_splice. returns a portion of the array and replace it with something else.
array_splice($ids, 1, 1, 'Replaced id'); // array, position, offset (where to end), what to replace it with.
array_splice($users, 0, 1, 'Replaced user');

// array_sum
$ids[1] = 10; // doing this otherwise it pops an error. strings can't be added mathematically.
$output = "Sum of IDs: " . array_sum($ids);

// array_search. searches array for a given value.

$output = "User 2 is at index: " . array_search("user2", $users);

// in_array. is something in array?
array_push($users, 'user10');
$output = "User 3 exists? : " . in_array('user10', $users); // displays nothing if false, displays 1 if true.

// explode. string into an array.
$tags = "#Tech,#Code,#Programming,#Learning,#Functions";
$tagsArray = explode(",", $tags); // delimiter/separator, array.
var_dump($tagsArray);
echo "<br />";

// implode. array into string.
$stringFromArray = implode(",", $users);
var_dump($stringFromArray);

// https://www.php.net/manual/en/ref.array.php
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
            <h2 class="text-xl font-semibold my-4">IDs array:</h2>
            <p>
                <pre>
                    <?php print_r($ids); ?>
                </pre>
            </p>
            <h2 class="text-xl font-semibold my-4">Users array:</h2>
            <p>
                <pre>
                    <?php print_r($users); ?>
                </pre>
            </p>
        </div>
    </div>
</body>

</html>