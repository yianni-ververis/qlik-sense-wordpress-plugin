# Qlik Sense Wordpress Plugin

#### This is a simple plugin to connect to your Qlick Sense server and create a mashup by getting the object with a shortcode inside a post or page within the admin panel

##### This is created with Wordpress 4.8.3

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.

2. Activate the plugin through the 'Plugins' screen in WordPress

- ![Qlik Sense - Activate](/Activate.png?raw=true "Qlik Sense - Activate")

3. Go to "Qlik Sense" settings and add the host, virtual proxy and the app id

- ![Qlik Sense - Settings](/Settings.png?raw=true "Qlik Sense - Settings")

- then add the shortcode into your posts "[qlik-sense-object qvid="ZwjJQq" height="400" nointeraction="true"]"
    - qvid: Is the object id as found in the "dev-hub/single-configurator"
    - height: The height of the visualization in pixels
    - nointeraction: Add this if you want to disable interactions. If you want the objects to have interaction, you can just omit this.
- You can also add the clear selections button "[qlik-sense-object-clear-selections title="Clear Selections"]"

- ![Qlik Sense - Edit Post](/EditPost.png?raw=true "Qlik Sense - Edit Post")

- The final page should look like this

- ![Qlik Sense - Hello World](/Helloworld.png?raw=true "Qlik Sense - Hello World")

#### Changelog

##### 1.0.4
* Fixin compatability issues with wordpress.org.

##### 1.0.3
* Added Clear Selections Button.

##### 1.0.2
* Changed the option names to start with qs_.
