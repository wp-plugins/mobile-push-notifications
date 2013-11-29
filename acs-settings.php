<?php

// ontreat_settings_page() displays the page content for the Test settings submenu
function ontreat_settings_page() {

    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    

    // Read in existing option value from database
    $key_val = get_option( KEY_NAME );
    $user_name_val = get_option(USER_NAME);
    $user_password_val = get_option(USER_PASSWORD_NAME);
    $channel_val = get_option(CHANNEL_NAME);
    $custome_post_type_val = get_option(CUSTOME_POST_TYPE_NAME);


    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[HIDDEN_FIELD_NAME]) && $_POST[HIDDEN_FIELD_NAME] == 'Y' ) {
        // Read their posted value
        $key_val = $_POST[ DATA_FIELD_NAME ];
        $user_name_val = $_POST[USER_NAME];
        $user_password_val = $_POST[USER_PASSWORD_NAME];
        $channel_val = $_POST[CHANNEL_NAME];
        $custome_post_type_val = $_POST[CUSTOME_POST_TYPE_NAME];
        
        // Save the posted value in the database
        update_option( KEY_NAME, $key_val );
        update_option( USER_NAME, $user_name_val );
        update_option( USER_PASSWORD_NAME, $user_password_val );
        update_option( CHANNEL_NAME, $channel_val );
        update_option( CUSTOME_POST_TYPE_NAME,$custome_post_type_val);

        // Put an settings updated message on the screen

?>
    <div class="updated">
        <p><strong><?php _e('settings saved.', 'push-notification' ); ?></strong></p>
    </div>
<?php } // close funciton
    

    // include push-form
    include('push-form.php');


} //close main function


?>