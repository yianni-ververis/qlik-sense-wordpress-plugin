# Qlik Sense Wordpress Plugin
[![WordPress plugin](https://img.shields.io/wordpress/plugin/v/qlik-sense.svg)](https://wordpress.org/plugins/qlik-sense/)
[![WordPress plugin](https://img.shields.io/wordpress/plugin/dt/qlik-sense.svg)](https://wordpress.org/plugins/qlik-sense/)
[![WordPress plugin rating](https://img.shields.io/wordpress/plugin/r/qlik-sense.svg)](https://wordpress.org/plugins/qlik-sense/)

This is a simple plugin to connect to your Qlik Sense server and create a mashup by getting the object with a shortcode inside a post or page within the admin panel


### Installation ###

- Watch the Video below for Installation and simple Usage (Thnx to Giuseppe Panella).
[![Watch the Video for Installation and simple Usage](https://img.youtube.com/vi/dSZh5IJcp2g/0.jpg)](https://www.youtube.com/watch?v=dSZh5IJcp2g)

It is strongly advised to install the plugin from the WordPress plugins manager to receive notifications of future updates. This can be done as follows:

1. Login to your WordPress Admin Portal.

2. On the left hand navigation panel, select "Plugins". 

3. Towards the top of the plugins list, click the "Add New" button. 

4. In the search box towards the right hand side, type "Qlik" and hit enter to search.
![Qlik Sense Plugin Search](/assets/Plugin-search.png?raw=true "Qlik Sense Plugin Search")

5. The Qlik Sense plugin is currently one of only two results returned. Click the "Install Now" button next to it.
![Qlik Sense Plugin Install](/assets/Plugin-install.png?raw=true "Qlik Sense Plugin Install")

6. WordPress will then download and install the plugin for you. Once complete, "Install Now" button will change to "Activate". Click the "Activate" button to complete the installation.

7. The plugin is now installed and ready to Configure.

### How to Configure ###

Before the plugin can be used, it must be configured as follows:

1. Login to your WordPress Admin Portal.

2. On the left hand navigation panel, select "Qlik Sense". 

3. Enter the relevant Qlik Sense server URL, Virtual Proxy, Port and App ID(s) to connect to your Qlik Sense server:
![Qlik Sense - Settings](/assets/Settings-server.png?raw=true "Qlik Sense - Settings")


4. If you are using a local install of Qlik Sense Desktop instead, your settings should appear as follows:
![Qlik Sense - Settings](/assets/Settings-local.png?raw=true "Qlik Sense - Settings")


### How to Use ###

The plugin utilizes a WordPress shortcode to insert Qlik Sense objects into a post or page. There are currently 3 shortcodes available to insert Qlik Sense objects, a clear selections button or the Qlik Sense selections toolbar. The shortcodes can be added manually as detailed below or alternatively, the shortcodes can be generated and inserted using the buttons provided within the WordPress text or visual post/page editor. In the text editor, place the cursor in the post/page where you wish to insert the object, then click the relevant Qlik Sense button on the editor menu. You You may be prompted to enter required parameters for the shortcode. Once complete, the shortcode will be added to the post or page.

![WordPress Visual Editor Buttons](/assets/Plugin-buttons-visual.png?raw=true "WordPress Visual Editor Buttons")
![WordPress Text Editor Buttons](/assets/Plugin-buttons-text.png?raw=true "WordPress Text Editor Buttons")

#### Qlik Sense Object ###

This shortcode allows you to embed a chart, table or other Qlik Sense object. The shortcode syntax is as follows:
```
[qlik-sense-object id="page1-obj2" qvid="nvqpV" height="400"]
```
Parameters are as follows:
* id="": is the unique div id. This is needed especially when you want to display the same object in 2 different instances
* qvid="": Is the object id as found in the "dev-hub/single-configurator" or the Qlik Explorer for Developers
* height="": The height of the visualization in pixels.
* nointeraction="true" (optional): Add this if you want to disable interactions. If you want the objects to have interaction, you can just omit this.
* app2="true" (optional): 
* appid="" (optional): The variable qs_appid is added to store the value from the custom field appid. The custom field is used to be able to use a separate app for each page rather than the apps defined in the plugin config.
 
#### Qlik Sense Clear Selections Button ####

This shortcode allows you to ebmed a Clear Selections button.
```
"[qlik-sense-object-clear-selections title="Clear Selections"]"
```
Parameters are as follows:
* title="": Defines the text to be displayed on the button

#### Qlik Sense Selections Toolbar ####

This shortcode allows you to add the Qlik Sense selections toolbar to the post or page.
```
[qlik-sense-selection-toolbar]
```
No parameters are possible.

### The Result ###

If you save and view the page, it should look something like this. Notice that in the page with app 1 objects I have included an object from app2 and they both display when all pages are loaded on the same screen

![Qlik Sense - App 2](/assets/Helloworld.png?raw=true "Qlik Sense - App 2")
![Qlik Sense - App 1](/assets/Helloworld2.png?raw=true "Qlik Sense - App 1")
![Selection Toolbar](/assets/selection-toolbar.png?raw=true "Selection Toolbar")

### Frequently Asked ###

##### Cannot access the page

- For those that are upgrading to 1.1.7, make sure you set the settings page again with the port and if its over https
- Make sure you or a Qlik Sys Admin whitelists the site's url in your Virtual Proxy
- If the virtual proxy is "yianni" make sure you add in the settings "/yianni/"
- There are known issues with wp's cache plugins.
- You may experience issues if any other plugin is using requirejs.

### Examples of use ###
* If you are using it, please send me an email to add your mashup here (yianni.ververis@qlik.com)

### Changelog ###

##### 1.3.0 #####
* Add button to the WordPress visual editor to make adding shortcodes easier (Thnx to Matt Fryer)
* Made Qlik Sense scripts and style sheets only load on pages and posts containing one or more of the shortcodes (Thnx to Matt Fryer)
* Updated installation and configuration instructions

##### 1.2.2 #####
* Add buttons to WordPress text editor to make adding shortcodes easier (Thnx to Matt Fryer)

##### 1.2.1 #####
* Add Selection Toolbar for 2nd app (Thnx to @nixnut)

##### 1.2.0 #####
* Add Qlik Sense's Selection Toolbar.

##### 1.1.7 #####
* Add "Port" and "Secure" in the options so we can connect to Qlik Sense Desktop

##### 1.1.6 #####
* The variable qs_appid is added to store the value from the custom field appid. The custom field is used to be able to use a separate app for each page.

##### 1.1.5 #####
* Changed the order of loading css.

##### 1.1.4 #####
* Changed the order of loading requirejs.

##### 1.1.3 #####
* Hide the alert window on qlik error

##### 1.1.2 #####
* Changed the order of the loading for css and js. Put them to load first so they do not break any theme

##### 1.1.1 #####
* Added unique id instead of using the qvid so we can display multiple instances of the same object

##### 1.1.0 #####
* Added second app in the settings

##### 1.0.5 #####
* Add virtual proxy to the css and js resources.

##### 1.0.4 #####
* Fixin compatability issues with wordpress.org.

##### 1.0.3 #####
* Added Clear Selections Button.

##### 1.0.2 #####
* Changed the option names to start with qs_.
