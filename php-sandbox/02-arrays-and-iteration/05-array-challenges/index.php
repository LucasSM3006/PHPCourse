<?php

/*
  Challenge 1: Sum of an array
  
  1. Create an array of numbers 
  2. Get the sum of all of the numbers combined and put into a variable.
  4. Get the amount of numbers in the array and put into a variable.
  5. Print out 'The sum of the {amount} numbers is: {sum} '. For example, if the array is [1, 2, 3, 4, 5], the output should be 'The sum of the 5 numbers is: 15'. 
*/
$numberArray = [1,2,3,4,5];
$arraySum = array_sum($numberArray);
$countOfNumbers = count($numberArray);
echo "<h3>The sum of the $countOfNumbers numbers is: $arraySum</h3>";

/*
  Challenge 2: Colors array

  1. Reverse the `$colors` array.
  2. Add 'purple' and 'orange' to the end of the array.
  3. Replace the second color with 'pink'
  4. Remove the last element of the array.

You should end up with the following array: ['yellow', 'pink', 'blue', 'red', 'purple']
*/

echo '<h3>Colors Array</h3>';

$colors = ['red', 'blue', 'green', 'yellow'];
$colors = array_reverse($colors);
$colors[] = 'purple';
$colors[] = 'orange';
array_splice($colors, 1, 1, 'pink');
array_pop($colors);
var_dump($colors);

/*
  Challenge 3: Job listings array

  1. Create a multi-dimensional array of associative arrays of 3 job listings with the fields id, job_title, company, contact_email, and contact_phone.
  Also add an array field for skills.
  The skills array should be an array of strings with each skill a person has. For example, 'PHP', 'MySQL', 'JavaScript', 'HTML', 'CSS', etc.
  2. Create a new listing using the `array_push()` function. The new listing should have the same fields as the others.
  3. Print out the job_title of the second job listing in the array.
  4. Print out the first skill of the third job listing in the array.
*/

$jobListings = [
  [
    'id' => 1,
    'job_title' => 'PHP Developer',
    'company' => 'OligSoff',
    'contact_email' => 'hr_php@oligsoff.com',
    'contact_phone' => '123344132',
    'skills' => ['PHP', 'MySQL', 'Docker']
  ],
  [
    'id' => 2,
    'job_title' => 'Java Developer',
    'company' => 'OligSoff',
    'contact_email' => 'hr_java@oligsoff.com',
    'contact_phone' => '233398132',
    'skills' => ['Java', 'MySQL', 'Spring']
  ],
  [
    'id' => 3,
    'job_title' => 'C# Developer',
    'company' => 'BongoSOLS',
    'contact_email' => 'hr_php@bongosols.com',
    'contact_phone' => '123882132',
    'skills' => ['.NET/C#', 'PostgreSQL', 'Asp']
  ]
];

$newJobOpening = [
  'id' => 4,
  'job_title' => 'C# Developer Jr',
  'company' => 'ToTheMoonware',
  'contact_email' => 'hr_csharp@moonware.com',
  'contact_phone' => '123882132',
  'skills' => ['.NET/C#', 'PostgreSQL', 'Asp']
];

array_push($jobListings, $newJobOpening);

echo '<h3>Job Listings</h3>';
echo '<pre>';
print_r($jobListings);
echo '</pre>';

echo '<p>';
echo "Second job of it: " . $jobListings[1]['job_title'] . "<br />";
echo "First skill of the third job: " . $jobListings[2]['skills'][0];
echo '</p>';