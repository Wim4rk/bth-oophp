<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><h1>Guess my number</h1>

<p>Guess a number between 1 and 100, you
    have <?= $tries ?> tries left.</p>

<!-- <form method="post">
    <input type="text" name="guess" autofocus>
    <input type="submit" name="doGuess" value="Make a guess"<?= $deactivate ?>>
    <input type="submit" name="doInit" value="Start over">
    <input type="submit" name="doCheat" value="Cheat"<?= $deactivate ?>>
</form> -->

<?php
$deactivate = "";
if ($res == "correct" || $tries < 1) {
    $deactivate = " disabled";
}
?>

<form method="post">
    <input type="text" name="guess" autofocus>
    <input type="submit" name="doGuess" value="Make a guess"<?= $deactivate ?>>
    <input type="submit" name="doInit" value="Start over">
    <input type="submit" name="doCheat" value="Cheat"<?= $deactivate ?>>
</form>

<?php if ($res) : ?>
    <p class="answer"><?= $guess ?> is <strong><?= $res ?></strong></p>
<?php endif; ?>

<?php if ($doCheat) : ?>
    <p class="cheat">Cheat: Number is <?= $number ?>.</p>
<?php endif; ?>
