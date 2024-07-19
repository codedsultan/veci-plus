<?php

function vp_auth_modal_render_cb($atts) {
    
    ob_start();
    ?>
        <div class="wp-block-udemy-plus-auth-modal">
            <div class="modal-container">
                <div class="modal-overlay"></div>

                <span class="modal-trick">&#8203;</span>

                <div class="modal-content">
                <button class="modal-btn-close" type="button">
                    <i class="bi bi-x"></i>
                </button>
                <!-- Tabs -->
                <ul class="tabs">
                    <!-- Login Tab -->
                    <li>
                        <a href="#signin-tab" class="active-tab">
                            <i class="bi bi-key"></i>Sign in
                        </a>
                    </li>
                    <!-- Register Tab -->
                     <?php 
                        if($atts['showRegister']){
                        ?>
                        <li>
                        <a href="#signup-tab">
                            <i class="bi bi-person-plus-fill"></i>Sign up
                        </a>
                    </li>
                    <?php

                        }
                     ?>
                    
                </ul>
                <div class="modal-body">
                    <!-- Login Form -->
                    <form id="signin-tab" style="display: block;">
                        <div id="signin-status"></div>
                        <fieldset>
                            <label>Name/Email</label>
                            <input type="text" id="si-email" placeholder="johndoe@example.com" />

                            <label>Password</label>
                            <input type="password" id="si-password" />

                            <button type="submit">Sign in</button>
                        </fieldset>
                    </form>
                    <!-- Register Form -->
                    <?php 
                        if($atts['showRegister']){
                        ?>
                    <form id="signup-tab">
                        <div id="signup-status"></div>
                        <fieldset>
                            <label>Full name</label>
                            <input type="text" id="su-name" placeholder="John Doe" />

                            <label>Email address</label>
                            <input type="email" id="su-email" placeholder="johndoe@example.com" />

                            <label for="su-password">Password</label>
                            <input type="password" id="su-password" />

                            <button type="submit">Sign up</button>
                        </fieldset>
                    </form>
                        <?php

                        }
                    ?>
                </div>
                </div>
            </div>
        </div>
    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}