<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><hr>
<div class="screen_bottom">
    <button onclick="debugVisibility()">Debug</button>
    <div id="debug" class="invisible">
    <!-- <div id="debug"> -->
        <!-- Error checking -->
        <h4>$_POST</h4>
<code>
<?= var_dump($_POST); ?>
</code>
<h4>$_GET</h4>
<code>
<?= var_dump($_GET); ?>
</code>
<h4>$_SESSION</h4>
<code>
<?= var_dump($_SESSION); ?>
</code>
    </div><!-- debug -->
</div><!-- screen_bottom -->
<hr>
