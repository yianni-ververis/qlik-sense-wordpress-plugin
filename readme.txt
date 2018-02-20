=== Plugin Name ===
Contributors: yianniververis, mattfryer
Tags: qlik, sense, capabilities api, engine api
Requires at least: 4.6
Tested up to: 4.9.1
Stable tag: 1.3.0
License: MIT
License URI: https://opensource.org/licenses/MIT

Allows you to create a mashup by embedding Qlik Sense objects inside WordPress posts and pages.

== Description ==

This is a simple plugin to connect to your Qlik Sense server and create a mashup by getting the object with a shortcode inside a post or page within the admin panel

== How to Configure ==

Before the plugin can be used, it must be configured as follows:
1. Login to your WordPress Admin Portal.
1. On the left hand navigation panel, select "Qlik Sense". 
1. Enter the relevant Qlik Sense server URL, Virtual Proxy, Port and App ID(s) to connect to your Qlik Sense server.

== How to Use ==

The plugin utilizes a WordPress shortcode to insert Qlik Sense objects into a post or page. There are currently 3 shortcodes available to insert Qlik Sense objects, a clear selections button or the Qlik Sense selections toolbar. The shortcodes can be added manually as detailed below or alternatively, the shortcodes can be generated and inserted using the buttons provided within the WordPress text or visual post/page editor. In the text editor, place the cursor in the post/page where you wish to insert the object, then click the relevant Qlik Sense button on the editor menu. You You may be prompted to enter required parameters for the shortcode. Once complete, the shortcode will be added to the post or page.

=== Qlik Sense Object ===

This shortcode allows you to embed a chart, table or other Qlik Sense object. The shortcode syntax is as follows:

`[qlik-sense-object id="page1-obj2" qvid="nvqpV" height="400"]`

Parameters are as follows:
* id="": is the unique div id. This is needed especially when you want to display the same object in 2 different instances
* qvid="": Is the object id as found in the "dev-hub/single-configurator" or the Qlik Explorer for Developers
* height="": The height of the visualization in pixels.
* nointeraction="true" (optional): Add this if you want to disable interactions. If you want the objects to have interaction, you can just omit this.
* app2="true" (optional): Add this to get the objects from the app defined as app 2 in the plugin settings.
* appid="" (optional): The variable qs_appid is added to store the value from the custom field appid. The custom field is used to be able to use a separate app for each page rather than the apps defined in the plugin config.
 
=== Qlik Sense Clear Selections Button ===

This shortcode allows you to ebmed a Clear Selections button.

`[qlik-sense-object-clear-selections title="Clear Selections"]`

Parameters are as follows:
* title="": Defines the text to be displayed on the button

=== Qlik Sense Selections Toolbar ===

This shortcode allows you to add the Qlik Sense selections toolbar to the post or page.

`[qlik-sense-selection-toolbar]`

No parameters are possible.

== Installation ==

It is strongly advised to install the plugin from the WordPress plugins manager to receive notifications of future updates. This can be done as follows:

1. Login to your WordPress Admin Portal.
1. On the left hand navigation panel, select "Plugins". 
1. Towards the top of the plugins list, click the "Add New" button. 
1. In the search box towards the right hand side, type "Qlik" and hit enter to search.
1. The Qlik Sense plugin is currently one of only two results returned. Click the "Install Now" button next to it.
1. WordPress will then download and install the plugin for you. Once complete, "Install Now" button will change to "Activate". Click the "Activate" button to complete the installation.
1. The plugin is now installed and ready to Configure.

== Frequently Asked Questions ==

= Cannot access the page =

* For those that are upgrading to 1.1.7, make sure you set the settings page again with the port and if its over https
* Make sure you or a Qlik Sys Admin whitelists the site's url in your Virtual Proxy
* If the virtual proxy is "yianni" make sure you add in the settings "/yianni/"
* There are known issues with wp's cache plugins.
* You may experience issues if any other plugin is using requirejs.

== Screenshots ==

1. Activate plugin
2. Settings Page - Server
2. Settings Page - Local
3. Add the shortcodes with the object ids to your post
4. Preview
5. Preview

== Changelog ==

= 1.3.0 =
* Add button to the WordPress visual editor to make adding shortcodes easier (Thnx to Matt Fryer)
* Made Qlik Sense scripts and style sheets only load on pages and posts containing one or more of the shortcodes (Thnx to Matt Fryer)
* Updated installation and configuration instructions

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
