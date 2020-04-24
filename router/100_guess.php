<?php
/**
 * Create routes using $app programming style.
 */
// var_dump(array_keys(get_defined_vars()));
$app->router->get("guess/init", function () use ($app) {

    $game = new Wim4rk\Guess\Guess();
    $res = $_SESSION['number'] = $game->number();
    $tries = $_SESSION['tries'] = $game->tries();

    return $app->response->redirect("guess/play");
});



/**
 * Game status.
 */
$app->router->get("guess/play", function () use ($app) {
    // init session
    // $game = new Wim4rk\Guess\Guess();
    // $_SESSION["number"] = $game->number();
    // $_SESSION["tries"] = $game->tries();
    // return $app->response->redirect("guess/play");
    $title = "Guessing game";
    $tries = $_SESSION['tries'] ?? null;
    $res = $_SESSION['res'] ?? null;
    $guess = $_SESSION['guess'] ?? null;

    $_SESSION['res'] = null;
    $_SESSION['guess'] = null;

    $data = [
        "guess" => $guess,
        "tries" => $tries,
        "number" => $number ?? null,
        "res" => $res,
        "doGuess" => $doGuess ?? null,
        "doCheat" => $doCheat ?? null,
    ];

    $app->page->add("guess/play", $data);
    $app->page->add("guess/debug");

    return $app->page->render([
        "title" => $title,
    ]);
});



/**
 * Make a guess
 */
$app->router->post("guess/play", function () use ($app) {
    // $title = "Guess my number";

    // Incoming variables
    $guess = $_POST['guess'] ?? null;
    $doInit = $_POST['doInit'] ?? null;
    $doGuess = $_POST['doGuess'] ?? null;
    $doCheat =  $_POST['doCheat'] ?? null;

    if ($doInit) {
        return $app->response->redirect("guess/init");
    }

    // Current settings from SESSION
    $number = $_SESSION['number'] ?? null;
    $tries = $_SESSION['tries'] ?? null;

    if ($doGuess) {
        // Make a guess
        $game = new Wim4rk\Guess\Guess($number, $tries);
        $res = $game->makeGuess($guess);

        $_SESSION['tries'] = $game->tries();
        $_SESSION['res'] = $res;
        $_SESSION['guess'] = $guess;
    }

    return $app->response->redirect("guess/play");
});
