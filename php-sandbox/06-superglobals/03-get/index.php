<?php
// Add a query parameter to the URL in the browser's address bar:
// http://localhost:8000/?name=John

echo isset($_GET['name']) ? $_GET['name'] : "";

echo "<br/>";

echo $_GET['name'] ?? "";

echo "<br/>";

// the user can send anything through the queries, including javascript
// so if we're displaying things on screen with an echo, they could run a <script></script> tag.
// to not let it execute, we can do:

echo htmlspecialchars($_GET['name'] ?? '');

echo "<br/>";

var_dump($_GET); // gets everything sent as a query through the website