<?php

require __DIR__ . "/autoload.php";
require __DIR__ . "/config.php";

$Example = new Guess();
echo "Guess 14 is {$Example->makeGuess(14)}.\n";
echo "{$Example->number()} would be correct.\n";
