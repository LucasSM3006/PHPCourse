<?php

define('APP_NAME', 'My App');
define('APP_VERSION', 'v1.0(DEV_BUILD)');

const APP_DESC = "My PHP app! Learning the language!";
const DB_NAME = "PHP_DATA";
const DB_PASS = "PHP_SUUUPERSAFEPASSWORD!";

run();

function run()
{
    echo "App name: " . APP_NAME;
    echo "<br />";
    echo "App version: " . APP_VERSION;
    echo "App description: " . APP_DESC;
    echo "<br />";
    echo "Database name: " . DB_NAME;
    echo "<br />";
    echo "Database password (shhhhh): " . DB_PASS;
    echo "<br />";
}