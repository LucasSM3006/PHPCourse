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
    require basePath('views/' . $name . '.view.php');
}

/**
 * Loads a partial by using a require.
 * 
 * @param string name
 * @return void
 * 
 * File extensions, even when just holding html, will be .php.
 * Thus it is possible to get the file by just passing the name.
 * Ie. $name = 'footer' instead of $name = 'footer.php'
 */

function loadPartial($name)
{
    require basePath('views/partials/' . $name . '.php');
}