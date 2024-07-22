<?php 

function vp_plugin_options_alt_page () {
    ?>
        <div class="wrap">
            <form method="POST" action="options.php">
                <?php 
                    settings_fields('vp_options_group');
                    do_settings_sections('vp-options-page');
                    submit_button();
                 ?>
            </form>
        </div>
    <?php
}