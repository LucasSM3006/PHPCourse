<?php

$number = 1;

while($number <= 10)
{
    if($number % 2 == 0)
    {
        echo $number . " is even <br />";
    }
    else 
    {
        echo $number . " is odd <br />";
    }
    $number++;
}

echo "<br />";

for($i = 0; $i < 100; $i++)
{
    echo $i . "<br />";
    if($i == 50)
    {
        break;
    }
}

echo "<br />";

for($i = 0; $i < 100; $i++)
{
    if($i % 2 == 0)
    {
        continue;
    }
    echo $i . "<br />";
}

echo "<br />";

$studentGrades =
[
    'john' => 100,
    'jack' => 56,
    'joanne' => 72,
    'rifret' => 10,
    'mordecai' => 89,
    'rigby' => 35
];

foreach($studentGrades as $name => $grade)
{
    if($grade >= 90)
    {
        echo "$name got an A!";
    }
    else if($grade >= 80)
    {
        echo "$name got a B!";
    }
    else if($grade >= 70)
    {
        echo "$name got a C!";
    }
    else if($grade >= 55)
    {
        echo "$name got a D!";
    }
    else
    {
        echo "$name got an F!";
    }
    echo "<br />";
}

?>