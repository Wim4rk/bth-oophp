<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


/**
 * A nice var_dump();...
 */
function nice_dump($var)
{
    echo "<code>" . var_export($var, true) . "</code>\n";
}

?><hr>
<div class="screen_bottom">
    <button onclick="debugVisibility()">Debug</button>
    <div id="debug" class="invisible">
    <!-- <div id="debug"> -->
        <!-- Error checking -->
        <h4>$_POST</h4>
<?= nice_dump($_POST); ?>
<h4>$_GET</h4>
<?= nice_dump($_GET); ?>
<h4>$_SESSION</h4>
<?= nice_dump($_SESSION); ?>
    </div><!-- debug -->
</div><!-- screen_bottom -->
<hr>

<script>
"use strict";

function debugVisibility() {
    // Toggle visibility
    var debug = document.getElementById("debug");

    debug.classList.toggle("invisible");
}
</script>
