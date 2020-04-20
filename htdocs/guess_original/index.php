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

$deactivate = "";
$answer = "";

if (isset($_POST["doInit"]) && $_POST["doInit"] != null) {
    destroy_session();
    $Stats = new Guess();
    $_SESSION["stats"] = $Stats;
}

if (isset($_POST["doGuess"]) && $_POST["doGuess"] != null) {
    $answer = $Stats->makeGuess($_POST["guess"]);
}

if ($Stats->tries() < 1 || $answer == "correct") {
    $deactivate = " disabled";
}

// Render page
require __DIR__ . "/view/header.php";
require __DIR__ . "/view/guess_post.php";
require __DIR__ . "/view/footer.php";
