<?php

function vp_header_tools_render_cb($atts) {

    ob_start();
    ?>
        

    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}