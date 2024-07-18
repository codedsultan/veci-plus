<?php

function vp_search_form_render_cb() {

    ob_start();
    ?>
        <div {...blockProps}>
            <h1>Search: Your search term here</h1>
            <form>
            <input type="text" placeholder="Search" />
            <div className="btn-wrapper">
                <button type="submit" style={{'background-color' : bgColor, color :textColor}}>Search</button>
            </div>
            </form>
         </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}