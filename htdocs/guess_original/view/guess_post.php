<div class="game">
<h1>Guess my number</h1>

<p>Guess a number between 1 and 100, you
    have <?= $Stats->tries() ?> tries left.</p>

<form method="post">
    <input type="text" name="guess" autofocus>
    <input type="submit" name="doGuess" value="Make a guess"<?= $deactivate ?>>
    <input type="submit" name="doInit" value="Start over">
    <input type="submit" name="doCheat" value="Cheat"<?= $deactivate ?>>
</form>

<?php
if (isset($_POST["doGuess"]) && $_POST["doGuess"] != null) : ?>
    <p class="answer"><?= $_POST["guess"] ?> is <strong><?= $answer ?></strong></p>
    <?php
endif;
echo "</div>";
if (isset($_POST["doCheat"]) && $_POST["doCheat"] != null) : ?>
    <p class="cheat">Cheat: Number is <?= $Stats->number() ?>.</p>
<?php endif; ?>

<div class="screen_bottom">
    <button onclick="debugVisibility()">Debug</button>
    <div id="debug" class="invisible">
        <!-- Error checking -->
        <h4>$_POST</h4>
<code>
<?= var_dump($_POST); ?>
</code>
<hr>
<h4>$_SESSION</h4>
<code>
<?= var_dump($_SESSION); ?>
</code>
    </div><!-- debug -->
</div><!-- screen_bottom -->
