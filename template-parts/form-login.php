<?php
if ( ! is_user_logged_in() ) {
    $args = array(
        'redirect'       => home_url(), // URL kam se přesměruje po přihlášení
        'form_id'        => 'loginform',
        'label_username' => __( 'Username' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in'   => __( 'Log In' ),
        'remember'       => true
    );
    wp_login_form( $args );
} else {
    echo '<p>You are already logged in.</p>';
}
