<?php
// Y - Year
// m - Month
// d - Day
// D - Day of the week short name
// l - Full day of the week name
// h - The hour
// i - The minute
// s - The second
// a - AM/PM

// Get year
$output = date('Y');

// Get year with timestamp
// timestamp (number of miliseconds since Jan 1st, 1970)
$timeStamp = date('Y', 936345600);

// str to time.
// Get timestamp from string to time
$strToTime = date('Y', strtotime('1999-09-01'));

// Get month
$currentMonth = date('m'); // current month

// Year month and day
$currentYearMonthDay = date("Y-m-d");
// Format is flexible.
$currentDayMonthYear = date("d-m-Y");
$currentMonthDayYear = date("m-d-Y");

// get hour
$currentHour = date("h");

// get minute
$currentMinute = date("i");

// Get year month day hour minute
$currentYearMonthDayHourMinute = date("Y-m-d h:i:s a");

// https://www.php.net/manual/en/function.date.php
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
                <?= $output . "<br />" ?>
                <?= "$timeStamp <br />" ?>
                <?= "$strToTime <br />" ?>
                <?= "$currentMonth <br />" ?>
                <?= "$currentYearMonthDay <br />" ?>
                <?= "$currentDayMonthYear <br />" ?>
                <?= "$currentMonthDayYear <br />" ?>
                <?= "$currentHour <br />" ?>
                <?= "$currentMinute <br />" ?>
                <?= "$currentYearMonthDayHourMinute <br />" ?>
        </p>
        </div>
    </div>
</body>

</html>