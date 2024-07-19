<?php

function vp_cuisine_add_form_fields () {
    ?>
        <div class="form-field">
            <label><?php _e('More Info Url' ,'veci-plus');?></label>
            <input type="text" name="vp_more_info_url"/>
            <p><?php _e( 'A url a user can click to learn more about a cuisine')?></p>
        </div>
    <?php
}