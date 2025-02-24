<?php

setcookie('username', 'useruser221', time() + 3600, '/'); // Sets a cookie with a name of username, value of useruser221, expiration of one hour, and root as the location.

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>PHP Cookies</title>
</head>

<body>
  <p>Cookie set. <a href="page.php">Go to page.php</a></p>
</body>

</html>