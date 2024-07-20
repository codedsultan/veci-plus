<?php

function vp_page_header_render_cb($atts) {
    $heading = esc_html($atts['content']);

    if($atts['showCategory']) {
        $heading = get_the_archive_title();     
    }
    ob_start();
    ?>
        <div class="wp-block-veci-plus-page-header" >
            <div class="inner-page-header">
               <h1><?php echo $heading ?></h1>
            </div>
        </div>

    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}