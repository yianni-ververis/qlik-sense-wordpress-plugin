# Qlik Sense Wordpress Plugin

#### This is a simple plugin to connect to your Qlick Sense server and create a mashup by getting the object with a shortcode inside a post or page within the admin panel

- Unzip the plugin into your plugins directory
- Activate from the admin panel
![Qlik Sense - Activate](/Activate.png?raw=true "Qlik Sense - Activate")
- Go to "Qlik Sense" settings and add the host, virtual proxy and the app id
![Qlik Sense - Settings](/Settings.png?raw=true "Qlik Sense - Settings")
- then add the shortcode into your posts "[sense-object qvid="ZwjJQq" height="400" nointeraction="true"]"
    - qvid: Is the object id as found in the "dev-hub/single-configurator"
    - height: The height of the visualization in pixels
    - nointeraction: Add this if you want to disable interactions. If you want the objects to have interaction, you can just omit this.
![Qlik Sense - Edit Post](/EditPost.png?raw=true "Qlik Sense - Edit Post")
- The final page should look like this
![Qlik Sense - Hello World](/Helloworld.png?raw=true "Qlik Sense - Hello World")
