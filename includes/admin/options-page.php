<?php 

function vp_plugin_options_page() {
    $options = get_option('vp_options');

    ?>
        <div class="wrap">
        <h1>
            <?php esc_html_e('Veci Plus Settings', 'veci-plus' ); ?>
        </h1>
        <?php
            if(isset($_GET['status']) && $_GET['status'] == '1'){
                ?>
                    <div class="notice notice-success inline">
                        <p> <?php esc_html_e('Options updated successfully!', 'veci-plus'); ?></p>
                    </div>
                <?php
            }
        ?>
            <form novalidate="novalidate" method="POST" action="admin-post.php">
                <input type="hidden" name="action" value="vp_save_options"/> 
                <?php wp_nonce_field('vp_options_verify'); ?>
                <table class="form-table">
                    <tbody>
                    <!-- Open Graph Title -->
                    <tr>
                        <th>
                        <label for="vp_og_title">
                            <?php esc_html_e('Open Graph Title', 'veci-plus'); ?>
                        </label>
                        </th>
                        <td>
                        <input name="vp_og_title" type="text" id="vp_og_title"
                            class="regular-text" 
                            value="<?php echo esc_attr($options['og_title'])?>"
                            />
                        </td>
                    </tr>
                    <!-- Open Graph Image -->
                    <tr>
                        <th>
                        <label for="vp_og_image">
                            <?php esc_html_e('Open Graph Image', 'veci-plus'); ?>
                        </label>
                        </th>
                        <td>
                        <input type="hidden" name="vp_og_image" id="vp_og_image"  value="<?php echo esc_attr($options['og_image'])?>"/>
                        <img id="og-img-preview" src="<?php echo esc_attr($options['og_image'])?>">
                        <a href="#" class="button-primary" id="og-img-btn">
                            Select Image
                        </a>
                        </td>
                    </tr>
                    <!-- Open Graph Description -->
                    <tr>
                        <th>
                        <label for="vp_og_description">
                            <?php esc_html_e('Open Graph Description', 'veci-plus'); ?>
                        </label>
                        </th>
                        <td>
                        <textarea 
                            id="vp_og_description" 
                            name="vp_og_description"
                            class="large-text"
                        > <?php echo esc_html($options['og_description'])?></textarea>
                        </td>
                    </tr>
                    <!-- Enable Open Graph -->
                    <tr>
                        <th>
                        <?php esc_html_e('Open Graph', 'veci-plus'); ?>
                        </th>
                        <td>
                        <label for="up_enable_og"> 
                        <input name="up_enable_og" type="checkbox" id="up_enable_og" 
                            value="1" <?php checked('1',$options['enable_og'])?> /> 
                        <span>Enable</span>
                        </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
    <?php
}
