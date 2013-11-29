=== Push Notification ===
Contributors: ontreat
Donate link: http://it.ontreat.com/
Tags: ACS Notification, Push Notification, ACS wordpress
Requires at least: 3.0.1
Tested up to: 3.7.1
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


A plugins that uses the ACS Notification push API to send push notification to iPhone and Android Phones from the new post creation.

== Description ==
Push Notification is a WordPress plugin that send Push message to ACS (Appcelerator Cloud Service) API which send a push to iPhone and Android Phones. ACS uses APNs (Apple Push Notification Service) and Google Cloud Messaging (GCM) service to send push notification to iOS devices and android devices. The notification is send from the WordPress when “new post” (page, post and any custom posts) is created. You MUST have an ACS subscription to use this plugin. **You have to provide user name, password and application key.**

**More features are coming like**

1. Send push notification to particular channel or all channels.

**After the installation process, there is setting page** you need to fill up ACS application user name, password and pay key.  Please do not fill your primary login information.**

**Setting page**

*	Fill up apps key (secret key of apps)
*	Fill up username (apps username)
*	Fill up Password (apps password)
*	Fill up Push channel (ie. demo_alert)


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-name` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress or extract file and place file in plugins directory 

3. Manage your plugins settings by ACS notification push settings 

	* 	Fill up apps key (secret key of apps)
	* 	Fill up username (apps username)
	* 	Fill up Password (apps password)
	* 	Fill up Push channel (ie. demo_alert)

5. Select your post type from select post type select option, which notify your apps when post is published. 

== Frequently Asked Questions ==
= What is a Push Notification? =
Push Notifications allow you to send messages directly to the people who have installed your mobile app, even when your app is closed.

== Screenshots ==
1. Settings Screen

== Upgrade Notice ==
* initial
== Changelog ==

= 1.0 =
* First version of Push Notification
