<?php

// Hook for adding admin menus
add_action('admin_menu', 'ontreat_add_pages');
// action function for above hook
function ontreat_add_pages() {
    // Add a new submenu under Settings:
    add_menu_page(__('Push Notification','push-notification'), __('ACS Notification Push','push-notification'), 'manage_options', 'pushnotification', 'ontreat_settings_page');
}


//register selected post for push notification
add_action('wp_loaded','register_post_for_push_notification');
function register_post_for_push_notification(){
    $posts = get_option('custome_post_type');
    if(sizeof($posts)>0):
        foreach($posts as $post){

            add_action( 'publish_'.$post, 'asc_push_notification' );

        }
    endif;
}
//register to get all post type
add_action( 'wp_loaded', 'ontreat_get_all_post_type' );
function ontreat_get_all_post_type() {
  // if you want only custom post types use '_builtin'=> false in the arguments array
  // 2nd argument should be 'objects' not 'object'
    $args = array( 'public' => true );
    $post_types = get_post_types( $args, 'names' );
    //$cpts = get_post_types( array( '_builtin'=> false ), 'name'); 
  //var_dump($post_types);
    return $post_types;
}



function plugin_is_active($plugin_path) {
    $return_var = in_array( $plugin_path, apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
    return $return_var;
  }


add_action('admin_notices', 'my_plugin_admin_notices');
function my_plugin_admin_notices() {
    if (!get_option('push_secret_key')&&!plugin_is_active('plugin-directory/plugin-file.php')) {
        echo "<div class='error'><p>
            Need to set ACS plugins settings <a href='admin.php?page=pushnotification'> Settings </a>
            </p></div>";
    }
}
add_action('admin_notices', 'my_plugin_admin_notices');


?>