<?php
/**
 * Guess my number
 */
require __DIR__ . "/autoload.php";
require __DIR__ . "/config.php";

// If isset...
$Stats = $_SESSION['stats'] ?? new Guess();
// var_dump($Stats);
$_SESSION["stats"] = $Stats;

// Render page
require __DIR__ . "/view/header.php";
require __DIR__ . "/view/guess_post.php";
require __DIR__ . "/view/footer.php";
