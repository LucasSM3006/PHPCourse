<?php

$name = $_REQUEST['name'] ?? '';
$age = $_REQUEST['age'] ?? '';
$value = $_REQUEST['value'] ?? '';

?>

<form method="post">
  <div>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
  </div>
  <div>
    <label for="age">Age:</label>
    <input type="text" name="age" id="age">
  </div>
  <input type="submit" name="submit" value="Submit">
</form>

<div>
  <div>
    <h2>Name:</h2>
      <p>
        <?= $name ?>
      </p>
  </div>
  <div>
    <h2>Age: </h2>
      <p>
        <?= $age ?>
      </p>
  </div>
  <div>
    <h2>Value: </h2>
      <p>
        <?= $value ?>
      </p>
  </div>
</div>