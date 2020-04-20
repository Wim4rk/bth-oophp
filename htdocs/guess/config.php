<?php header('content-type: text/html;charset=utf-8');
/**
 *
 * Set the error reporting
 */
error_reporting(-1);            // Report all type of errors
ini_set("display_errors", 1);   // Display all errors

// Root directory
define('ROOT_PATH', __DIR__);

// Include common functions
include(__DIR__ . "/src/common.php");

/**
 * A nice var_dump();...
 */
function nice_dump($var) {
    echo "<code>" . var_export($var, true) . "</code>\n";
}

/**
 * Name-given SESSION.
 */
$name = preg_replace("/[^a-z\d]/i", "", __DIR__);
session_name($name);
session_start();


/**
 * Default exception handler.
 */
set_exception_handler(function ($e) {
    echo "<p>Anax: Uncaught exception:</p><p>Line "
        . $e->getLine()
        . " in file <samp>"
        . $e->getFile()
        . "</samp></p><p><code>"
        . get_class($e)
        . "</code></p><p>"
        . $e->getMessage()
        . "</p><p>Code: "
        . $e->getCode()
        . "</p><code>"
        . $e->getTraceAsString()
        . "</code>";
});
