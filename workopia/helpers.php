<?php

/**
 * Get the base path
 * 
 * @param string path
 * @return string
 * 
 * Returns the absolute path. __DIR__ gets it.
 */
function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

/**
 * Loads a view by using a require.
 * 
 * @param string name
 * @return void
 * 
 * Suffix of views is .view.php therefore it is done in a way where
 * you can simply pass the name of the resource. Ie. $name = 'search' instead of $name = 'search.view.php'
 */

function loadView($name)
{
    $viewPath = basePath('views/' . $name . '.view.php');

    if(file_exists($viewPath))
    {
        require $viewPath;
    }
    else
    {
        echo "View '{$name}' doesn't exist.";
    }
}

/**
 * Loads a partial by using a require.
 * 
 * @param string name
 * @return void
 * 
 * File extensions in our app, even when just holding html, will be .php.
 * Get the file by just passing the name.
 * Ie. $name = 'footer' instead of $name = 'footer.php'
 */

function loadPartial($name)
{
    $partialPath = basePath('views/partials/' . $name . '.php');

    if(file_exists($partialPath))
    {
        require $partialPath;
    }
    else
    {
        echo "View '{$name}' doesn't exist.";
    }
}

/**
 * Inspect the value(s) of a variable. Useful for debugging.
 * 
 * @param mixed value
 * @return void
 */

 function inspect($value)
 {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
 }

/**
 * Inspect the value(s) of a variable dies.
 * 
 * @param mixed value
 * @return void
 */

 function inspectAndDie($value)
 {
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
 }