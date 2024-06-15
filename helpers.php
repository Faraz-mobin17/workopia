<?php

/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */
function base_path($path = '')
{
    return __DIR__ . '/' . $path;
}

/**
 * Load a view 
 * @param string $name
 * @return void
 */

function loadView($name)
{
    $viewPath =  base_path("views/{$name}.view.php");
    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo "View not found {$name} not found";
    }
}


/**
 * Load a partial 
 * @param string $name
 * @return void
 */

function loadPartial($name)
{
    $partialFile =  base_path("partials/{$name}.php");
    if (file_exists($partialFile)) {
        require $partialFile;
    } else {
        echo "Partial not found {$name} not found";
    }
}
