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

function vp_cuisine_edit_form_fields ($term) {

    $url = get_term_meta($term->term_id,'more_info_url',true)
     ?>
        <tr class="form-field">
            <th>
                <label><?php _e('More Info Url' ,'veci-plus');?></label> 
            </th>

            <td>
                <input type="text" name="vp_more_info_url" value="<?php echo $url ?>"/>
                <p class="description"><?php _e( 'A url a user can click to learn more about a cuisine')?></p>
            </td>
        </tr>
     <?php
}