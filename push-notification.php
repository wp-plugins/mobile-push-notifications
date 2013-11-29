<?php
/**
 *
 * Plugin Name: ACS Notification Push
 * Plugin URI: http://it.ontreat.com/
 * Description: Wordpress plugins that usases Appcelerator Cloud Services to send push notification to iOS and andorid mobile
 * Version: 1.0
 * Author: Ontreat Inc
 * Author URI: http://it.ontreat.com/
 *
 *
 */
require('acs-conf.php');
require("push-function.php");
require("acs-settings.php");


function asc_push_notification( $post_id ) {

	// If this is just a revision, don't send the email.
	if ( wp_is_post_revision( $post_id ) )
		return;

	$post_title = get_the_title( $post_id );
	$post_url = get_permalink( $post_id );

	$message = "New Post - ".$post_title;
	// $message .= $post_title . ": " . $post_url;

	 
	/*** SETUP ***************************************************/
    $key        = get_option(KEY_NAME);
    $username   = get_option(USER_NAME);
    $password   = get_option(USER_PASSWORD_NAME);
    $channel    = get_option(CHANNEL_NAME);
    $message    = $message;
    $title      = "3g apps Noticiation";
    $tmp_fname  = 'cookie.txt';
    $json       = '{"alert":"'. $message .'","title":"'. $title .'","vibrate":true,"sound":"default"}';
 
    /*** PUSH NOTIFICATION ***********************************/
 
    $post_array = array('login' => $username, 'password' => $password);
 
    /*** INIT CURL *******************************************/
    $curlObj    = curl_init();
    $c_opt      = array(CURLOPT_URL => 'https://api.cloud.appcelerator.com/v1/users/login.json?key='.$key,
                        CURLOPT_COOKIEJAR => $tmp_fname, 
                        CURLOPT_COOKIEFILE => $tmp_fname, 
                        CURLOPT_RETURNTRANSFER => true, 
                        CURLOPT_POST => 1,
                        CURLOPT_POSTFIELDS  =>  "login=".$username."&password=".$password,
                        CURLOPT_FOLLOWLOCATION  =>  1,
                        CURLOPT_TIMEOUT => 60);
 
    /*** LOGIN **********************************************/
    curl_setopt_array($curlObj, $c_opt); 
    $session = curl_exec($curlObj);     
 
    /*** SEND PUSH ******************************************/
    $c_opt[CURLOPT_URL]         = "https://api.cloud.appcelerator.com/v1/push_notification/notify.json?key=".$key; 
    $c_opt[CURLOPT_POSTFIELDS]  = "channel=".$channel."&payload=".$json; 
 
    curl_setopt_array($curlObj, $c_opt); 
    $session = curl_exec($curlObj);     
 
    /*** THE END ********************************************/
    curl_close($curlObj);
    // echo $session;
	
	// Send email to admin.
	// wp_mail( 'kishor@amplecube.com', $subject, $message );
	// echo "<script>alert('push is calling');</script>";
}
add_action( 'publish_post', 'asc_push_notification' );
// more post action added on function file

?>