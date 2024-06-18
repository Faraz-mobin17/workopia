<?php

/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */
function base_path(string $path = ''): string
{
    return __DIR__ . '/' . $path;
}

/**
 * Load a view 
 * @param string $name
 * @param array $data
 * @return void
 */

function loadView(string $name, array $data = []): void
{
    $viewPath =  base_path("views/{$name}.view.php");
    if (file_exists($viewPath)) {
        extract($data);
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

function loadPartial(string $name): void
{
    $partialFile =  base_path("partials/{$name}.php");
    if (file_exists($partialFile)) {
        require $partialFile;
    } else {
        echo "Partial not found {$name} not found";
    }
}

/**
 * Inspect a values(s)
 * @param mixed $value
 * @return void
 */

function inspect(mixed $value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}


/**
 * Inspect a values(s) and die
 * @param mixed $value
 * @return void
 */

function inspectAndDie(mixed $value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

/**
 * format salary
 * @param string $salary
 * @return string formattedSalary
 */

function formatSalary(string $salary): string
{
    return number_format(floatval($salary));
}
