<?php 

function vp_daily_recipe_cb(){
    ob_start();
    ?>

    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output; 
}