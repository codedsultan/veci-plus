<?php

function vp_settings_api(){
 register_setting('vp_options_group', 'vp_options');

 add_settings_section(
    'vp_options_section',
    __('Veci Plus Settings' , 'veci-plus'),
    'vp_options_section_cb',
    'vp-options-page'
 );

 add_settings_field(
    'og_title_input',
    __('Open Graph Title'),
    'og_title_input_cb',
    'vp-options-page',
    'vp_options_section'
 );

 add_settings_field(
    'og_image_input',
    __('Open Graph Image'),
    'og_image_input_cb',
    'vp-options-page',
    'vp_options_section'
 );

 add_settings_field(
    'og_description_input',
    __('Open Graph Description'),
    'og_description_input_cb',
    'vp-options-page',
    'vp_options_section'
 );

 add_settings_field(
    'og_enable_input',
    __('Open Graph Enable'),
    'og_enable_input_cb',
    'vp-options-page',
    'vp_options_section'
 );
}

function og_title_input_cb() {
    $options = get_option('vp_options');
    ?>
        <input class="regular-text" name="vp_options[og_title]" value=<?php echo esc_attr($options['og_title']); ?> />
    <?php
}

function og_image_input_cb(){
    $options = get_option('vp_options');
    ?>
    <input type="hidden" name="vp_options[og_image]" id="vp_og_image"
      value="<?php echo esc_attr($options['og_image']); ?>">
    <img src="<?php echo esc_attr($options['og_image']); ?>"
      id="og-img-preview">
    <a href="#" class="button-primary" 
      id="og-img-btn">
      Select Image
    </a>
    <?php
  }
  
  function og_description_input_cb(){
    $options = get_option('vp_options');
    ?>
    <textarea 
      name="vp_options[og_description]"
      class="large-text"
    ><?php echo esc_html($options['og_description']); ?></textarea>
    <?php
  }
  
  function og_enable_input_cb(){
    $options = get_option('vp_options');
    ?>
    <label for="vp_enable_og"> 
      <input name="vp_options[enable_og]" type="checkbox" id="vp_enable_og" 
        value="1" <?php checked('1', $options['enable_og']); ?> /> 
      <span>Enable</span>
    </label>
    <?php
  }
function vp_options_section_cb() {
    ?> <p>An alternative form for updating options with the setings API.</p><?php
}