<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Init guess number, redirect tot play.
 */
$app->router->get("guess/init", function () use ($app) {
    // init session
    return $app->response->redirect("guess/play");
});



/**
 * PLay the game
 */
$app->router->get("guess/play", function () use ($app) {
    // echo "Some debugging information";
    return ["Play the game!!!"];
});



/**
* Showing message Hello World, rendered within the standard page layout.
 */
$app->router->get("lek/hello-world-page", function () use ($app) {
    $title = "Hello World as a page";
    $data = [
        "class" => "hello-world",
        "content" => "Hello World in " . __FILE__,
    ];

    $app->page->add("anax/v2/article/default", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
