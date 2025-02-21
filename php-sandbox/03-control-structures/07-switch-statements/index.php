<?php

$dayOfWeek = date('l');
$message;
$color;

switch($dayOfWeek)
{
  case('Monday') :
    $message = "Monday Blues!";
    $color = "blue";
    break;
  case('Tuesday') :
    $message = "Tuesday Greens!";
    $color = "green";
    break;
  case('Wednesday') :
    $message = "Wednesday Reds!";
    $color = "red";
    break;
  case('Thursday') :
    $message = "Thursday Yellows!";
    $color = "yellow";
    break;
  case('Friday') :
    $message = "Friday Pinks!";
    $color = "pink";
    break;
  case('Saturday') :
    $message = "Saturday Purples!";
    $color = "purple";
    break;
  case('Sunday') :
    $message = "Sunday Black!";
    $color = "black";
    break;
  default :
    $message = "At least it's not monday...";
    $color = "pink";
    break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>What Day Is It?</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: <?= $color ?>;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
  </style>
</head>

<body>

  <h1><?= $message ?></h1>

</body>

</html>