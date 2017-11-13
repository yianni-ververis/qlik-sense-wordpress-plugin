# Qlik Sense Wordpress Plugin

#### This is a simple plugin to connect to your Qlik Sense server and create a mashup by getting the object with a shortcode inside a post or page within the admin panel

##### This is created with Wordpress 4.8.3

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/qlik-sense` directory, or install the plugin through the WordPress plugins screen directly by searching for "Qlik".
![Wordpress Plugins Search](/install.png?raw=true "Wordpress Plugins Search")
![Wordpress Plugins Directory](/PluginsDirectory.png?raw=true "Wordpress Plugins Directory")

2. Activate the plugin through the 'Plugins' screen in WordPress

![Qlik Sense - Activate](/Activate.png?raw=true "Qlik Sense - Activate")

3. Go to "Qlik Sense" settings and add the host, virtual proxy and the app id

![Qlik Sense - Settings](/Settings.png?raw=true "Qlik Sense - Settings")

- then add the shortcode into your posts "[qlik-sense-object id="page1-obj2" qvid="nvqpV" height="400" app2="true"]"
    - id: is the unique div id. This is needed especially when you want to display the same object in 2 different instances
    - qvid: Is the object id as found in the "dev-hub/single-configurator"
    - height: The height of the visualization in pixels
    - nointeraction: Add this if you want to disable interactions. If you want the objects to have interaction, you can just omit this.
    - app2: Add this if your object is coming from the second app that you have specified in the settings
- You can also add the clear selections button "[qlik-sense-object-clear-selections title="Clear Selections"]"

![Qlik Sense - Edit Post](/EditPost.png?raw=true "Qlik Sense - Edit Post")

- The final page should look like this. Notice that in the page with app 1 objects I have included an object from app2 and they both display when all pages are loaded on the same screen

![Qlik Sense - App 2](/Helloworld.png?raw=true "Qlik Sense - App 2")
![Qlik Sense - App 1](/Helloworld2.png?raw=true "Qlik Sense - App 1")

#### requently Asked Questions

##### Cannot access the page

- Make sure you whitelist the site's url in your Virtual Proxy
- If the virtual proxy is "yianni" make sure you add in the settings "/yianni/"

#### Changelog

##### 1.1.1
* Added unique id instead of using the qvid so we can display multiple instances of the same object

##### 1.1.0
* Added second app in the settings

##### 1.0.5
* Add virtual proxy to the css and js resources.

##### 1.0.4
* Fixin compatability issues with wordpress.org.

##### 1.0.3
* Added Clear Selections Button.

##### 1.0.2
* Changed the option names to start with qs_.
