<?php 

function vp_popular_recipes_cb() {

    ob_start();
    ?>

    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}