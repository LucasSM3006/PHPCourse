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