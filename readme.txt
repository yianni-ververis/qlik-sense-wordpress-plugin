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

1. Upload the plugin files to the `/wp-content/plugins/qlik-sense` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Go to "Qlik Sense" settings and add the host, virtual proxy and the app id
- then add the shortcode into your posts "[qlik-sense-object qvid="ZwjJQq" height="400" nointeraction="true"]"
    - qvid: Is the object id as found in the "dev-hub/single-configurator"
    - height: The height of the visualization in pixels
    - nointeraction: Add this if you want to disable interactions. If you want the objects to have interaction, you can just omit this.
- You can also add the clear selections button "[qlik-sense-object-clear-selections title="Clear Selections"]"

== Changelog ==

= 1.0.4 =
* Fixin compatability issues with wordpress.org.

= 1.0.3 =
* Added Clear Selections Button.

= 1.0.2 =
* Changed the option names to start with qs_.
