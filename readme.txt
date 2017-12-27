=== Plugin Name ===
Contributors: yianniververis
Tags: qlik, sense, capabilities api, engine api
Requires at least: 4.6
Tested up to: 4.8
Stable tag: 4.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

This is a simple plugin to connect to your Qlik Sense server and create a mashup by getting the object with a shortcode inside a post or page within the admin panel

== Installation ==

1. Upload the plugin files (You or the Your Web Site Sys Admin) to the `/wp-content/plugins/qlik-sense` directory, or install the plugin through the WordPress plugins screen directly by searching for "Qlik".
2. Activate the plugin (You or a Web Dev) through the 'Plugins' screen in WordPress
3. Go to "Qlik Sense" settings and add the host, virtual proxy and the app id. If you are planning on using a second app, then add the second app id in "App2 ID".
- then add the shortcode into your posts "[qlik-sense-object id="page1-obj2" qvid="nvqpV" height="400" app2="true"]"
    - id: is the unique div id. This is needed especially when you want to display the same object in 2 different instances
    - qvid: Is the object id as found in the "dev-hub/single-configurator"
    - height: The height of the visualization in pixels
    - nointeraction: Add this if you want to disable interactions. If you want the objects to have interaction, you can just omit this.
    - app2: Add this if your object is coming from the second app that you have specified in the settings
    - appid (optional): The variable qs_appid is added to store the value from the custom field appid. The custom field is used to be able to use a separate app for each page.
- You can also add the clear selections button "[qlik-sense-object-clear-selections title="Clear Selections"]"
- For Selection Toolbar for app2, just add app2="true" [qlik-sense-selection-toolbar app2="true"]


== Frequently Asked Questions ==

= Cannot access the page =

- For those that are upgrading to 1.1.7, make sure you set the settings page again with the port and if its over https
- Make sure you or a Qlik Sys Admin whitelists the site's url in your Virtual Proxy
- If the virtual proxy is "yianni" make sure you add in the settings "/yianni/"
- There are known issues with wp's cache plugins.
- You may experience issues if any other plugin is using requirejs.

== Screenshots ==

1. Activate plugin
2. Settings Page - Server
2. Settings Page - Local
3. Add the shortcodes with the object ids to your post
4. Preview
5. Preview

== Examples of use ==
* If you are using it, please send me an email to add your mashup here (yianni.ververis@qlik.com)

== Changelog ==

= 1.2.1 =
* Add Selection Toolbar for 2nd app (Thnx to @nixnut)

= 1.2.0 =
* Add Qlik Sense's Selection Toolbar.

= 1.1.7 =
* Add "Port" and "Secure" in the options so we can connect to Qlik Sense Desktop

= 1.1.6 =
* The variable qs_appid is added to store the value from the custom field appid. The custom field is used to be able to use a separate app for each page.

= 1.1.5 =
* Changed the order of loading css.

= 1.1.4 =
* Changed the order of loading requirejs.

= 1.1.3 =
* Hide the alert window on qlik error

= 1.1.2 =
* Changed the order of the loading for css and js. Put them to load first so they do not break any theme

= 1.1.1 =
* Added unique id instead of using the qvid so we can display multiple instances of the same object

= 1.1.0 =
* Added second app in the settings

= 1.0.5 =
* Add virtual proxy to the css and js resources.

= 1.0.4 =
* Fixin compatability issues with wordpress.org.

= 1.0.3 =
* Added Clear Selections Button.

= 1.0.2 =
* Changed the option names to start with qs_.
