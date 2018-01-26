<?php
	/*
	Plugin Name: Qlik Sense
	Plugin URI: https://github.com/yianni-ververis/qlik-sense-wordpress-plugin
	Description: 
		A plugin to connect to Qlik Sense server or desktop and get the objects. 
		- Unzip the plugin into your plugins directory
		- Activate from the admin panel
		- Go to "Qlik Sense" settings and add the host, virtual proxy and the app id
		- then add the shortcode into your posts "[sense-object qvid="ZwjJQq" height="400" nointeraction="true"]"
		- YOu can also add the Clear Selections button [sense-object-clear-selections title="Clear Selections"]
	Version: 1.2.3
	Author: yianni.ververis@qlik.com
	License: MIT
	*/
	defined('ABSPATH') or die("No script kiddies please!"); //Block direct access to this php file

    define( 'QLIK_SENSE_PLUGIN_VERSION', '1.2.3' );
    define( 'QLIK_SENSE_PLUGIN_MINIMUM_WP_VERSION', '4.0' );
    define( 'QLIK_SENSE_PLUGIN_PLUGIN_DIR', plugin_dir_url( __FILE__ ) );

	// Get the CSS and JS from Sense
    add_action( 'wp_enqueue_scripts', 'qlik_sense_enqueued_styles');
    function qlik_sense_enqueued_styles() {
		$qs = array(
			"http"		=> (esc_attr( get_option('qs_secure') ) ) ? 'https' : 'http' , 
			"host"		=> esc_attr( get_option('qs_host') ) ,
			"port"		=> (esc_attr( get_option('qs_port') ) ) ? esc_attr( get_option('qs_port') ) : 443 , 
			"prefix"	=> (esc_attr( get_option('qs_prefix') ) ) ? esc_attr( get_option('qs_prefix') ) : '/'  , 
			"style"		=> "resources/autogenerated/qlik-styles.css"
		);
		$url = $qs['http'] . "://" . $qs['host'] . ":" . $qs['port'] . $qs['prefix'] . $qs['style'] ;
		wp_enqueue_style( 'qlik-sense-styles', $url );
    }

	add_action( 'wp_enqueue_scripts', 'qlik_sense_enqueued_assets', 20 );
	// Get the Requirejs from Qlik Sense
    function qlik_sense_enqueued_assets() {		
		if( ! wp_script_is( 'qlik-sense-require', 'enqueued' ) ) {
			$qs = array(
				"http"		=> (esc_attr( get_option('qs_secure') ) ) ? 'https' : 'http' , 
				"host"		=> esc_attr( get_option('qs_host') ) ,
				"port"		=> (esc_attr( get_option('qs_port') ) ) ? esc_attr( get_option('qs_port') ) : 443 , 
				"prefix"	=> (esc_attr( get_option('qs_prefix') ) ) ? esc_attr( get_option('qs_prefix') ) : '/'  , 
				"require"	=> "resources/assets/external/requirejs/require.js"
			);
			$url = $qs['http'] . "://" . $qs['host'] . ":" . $qs['port'] . $qs['prefix'] . $qs['require'] ;
			wp_enqueue_script( 'qlik-sense-require', $url, array(), QLIK_SENSE_PLUGIN_VERSION, $in_footer = true );
		}

		// Register the script
		wp_register_script( 'qlik-sense-js', QLIK_SENSE_PLUGIN_PLUGIN_DIR . 'index.js', array('jquery'), QLIK_SENSE_PLUGIN_VERSION, $in_footer = true );

		// Localize the script with new data (pass it to the index.js)
		$qs = esc_attr( get_option('qs') );
		$translation_array = array(	
			'version'		=> QLIK_SENSE_PLUGIN_VERSION,
			'qs_host'		=> esc_attr( get_option('qs_host') ),
			'qs_port'		=> esc_attr( get_option('qs_port') ),
			'qs_secure'		=> esc_attr( get_option('qs_secure') ),
			'qs_prefix'		=> esc_attr( get_option('qs_prefix') ),
			'qs_id'			=> esc_attr( get_option('qs_id') ),
			'qs_id2'		=> esc_attr( get_option('qs_id2') ),
			'qs_appid'		=> esc_attr( get_post_meta(get_the_ID(), 'appid', true) )						
		);
		wp_localize_script( 'qlik-sense-js', 'vars', $translation_array );

		// Enqueued script with localized data.
		wp_enqueue_script( 'qlik-sense-js' );
	}
	
	add_action('admin_menu', 'qlik_sense_plugin_menu');
	function qlik_sense_plugin_menu() {
		add_menu_page('Qlik Sense Plugin Settings', 'Qlik Sense', 'administrator', 'qlik_sense_plugin_settings', 'qlik_sense_plugin_settings_page', 'dashicons-admin-generic');
	}
	
	// Create the options to be saved in the Database
	add_action( 'admin_init', 'qlik_sense_plugin_settings' );	
	function qlik_sense_plugin_settings() {
		register_setting( 'qlik_sense-plugin-settings-group', 'qs_host' );
		register_setting( 'qlik_sense-plugin-settings-group', 'qs_prefix' );
		register_setting( 'qlik_sense-plugin-settings-group', 'qs_id' );
		register_setting( 'qlik_sense-plugin-settings-group', 'qs_id2' );
		register_setting( 'qlik_sense-plugin-settings-group', 'qs_port' );
		register_setting( 'qlik_sense-plugin-settings-group', 'qs_secure' );
		register_setting( 'qlik_sense-plugin-settings-group', 'qs_id2' );
	}

	// Create the Admin Setting Page
	function qlik_sense_plugin_settings_page() {
?>
		<div class="wrap">
			<h2>Qlik Sense Plugin Settings</h2>
			<form method="post" action="options.php">
				<?php settings_fields( 'qlik_sense-plugin-settings-group' ); ?>
				<?php do_settings_sections( 'qlik_sense-plugin-settings-group' ); ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">Host:</th>
						<td><input type="text" name="qs_host" size="50" value="<?php echo esc_attr( get_option('qs_host') ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row">Virtual Proxy (Prefix):</th>
						<td><input type="text" name="qs_prefix" size="5" value="<?php echo esc_attr( get_option('qs_prefix') ); ?>" /></td>
					</tr>	
					<tr valign="top">
						<th scope="row">Port:</th>
						<td><input type="text" name="qs_port" size="5" value="<?php echo esc_attr( get_option('qs_port') ); ?>" /></td>
					</tr>	
					<tr valign="top">
						<th scope="row">Is it over Https?</th>
						<td><input type="checkbox" name="qs_secure" value="1" <?php checked( esc_attr( get_option('qs_secure') ), 1 ); ?> /></td>
					</tr>	
					<tr valign="top">
						<th scope="row">App ID:</th>
						<td><input type="text" name="qs_id" size="50" value="<?php echo esc_attr( get_option('qs_id') ); ?>" /></td>
					</tr>					
					<tr valign="top">
						<th scope="row">App2 ID:</th>
						<td><input type="text" name="qs_id2" size="50" value="<?php echo esc_attr( get_option('qs_id2') ); ?>" /></td>
					</tr>				
					<tr valign="top">
						<th scope="row">&nbsp;</th>
						<td><?php submit_button(); ?></td>
					</tr>
				</table>
				
				<div style="border-top:1px solid #ccc;padding-top:35px;"><a href="https://www.qlik.com/us/"><img src="<?php echo QLIK_SENSE_PLUGIN_PLUGIN_DIR . "/QlikLogo-RGB.png"?>" width="200"></a></div>
			</form>
		</div>
<?php
	}

	// Create the Html Snippet for use inside the posts/pages
	// [qlik-sense-object qvid="ZwjJQq" height="400" nointeraction="true" app2="true" appid=""]
	function qlik_sense_object_func( $atts ) {
		$app = ($atts['app2']) ? 'data-app2="true"' : null;
		return "<div id=\"qs_{$atts['id']}\" data-id=\"qs_{$atts['id']}\" data-qvid=\"{$atts['qvid']}\" data-nointeraction=\"{$atts['nointeraction']}\" class=\"wp-qs\" ${app} style=\"height:{$atts['height']}px\"></div>";
	}
	add_shortcode( 'qlik-sense-object', 'qlik_sense_object_func' );
	
	// [qlik-sense-object-clear-selections title="Clear Selections"]
	function qlik_sense_object_clear_selections_func( $atts ) {
		$app = ($atts['app2']) ? '-app2' : '-app1';
		return "<button id=\"qlik-sense-clear-selections${app}-{$atts['id']}\">{$atts['title']}</button>";
	}
	add_shortcode( 'qlik-sense-object-clear-selections', 'qlik_sense_object_clear_selections_func' );

	// [qlik-sense-selection-toolbar]
	function qlik_sense_selection_toolbar_func() {
		$app = ($atts['app2']) ? '-app2' : '-app1';
		return "<div class=\"qvobject fifty\" data-qvid=\"CurrentSelections\" id=\"CurrentSelections${app}\"></div>";
	}
	add_shortcode( 'qlik-sense-selection-toolbar', 'qlik_sense_selection_toolbar_func' );

	// Add buttons to the Wordpress text editor for easy addition of shortcodes
	//  qlik sense object
	function qlik_sense_obj_button_script() {
			if(wp_script_is("quicktags")) {
					?>
							<script type="text/javascript">
									// this function is used to retrieve the selected text from the text editor. 
									// although this shortcode doesn't wrap around text, we need this to make sure we don't accidentally replace any selected text when inserting the shortcode.
									function getSel()
									{
											var txtarea = document.getElementById("content");
											var start = txtarea.selectionStart;
											var finish = txtarea.selectionEnd;
											return txtarea.value.substring(start, finish);
									}

									QTags.addButton( 
											"qlik_sense_obj_shortcode", 
											"Qlik Sense Object", 
											callback
									);

									function callback()
									{
											var selected_text = getSel();
											var id = prompt("Unique Div ID", "page1-obj1");
											var qvid = prompt("Sense Object ID", "");
											QTags.insertContent("[qlik-sense-object id=\”" + id + "\″ qvid=\""+ qvid + "\" height=\"400\"]" +  selected_text);
									}
							</script>
					<?php
			}
	}
	add_action("admin_print_footer_scripts", "qlik_sense_obj_button_script");
	
	//  qlik sense clear selections
	function qlik_sense_clear_button_script() {
			if(wp_script_is("quicktags")) {
					?>
							<script type="text/javascript">
									// this function is used to retrieve the selected text from the text editor. 
									// although this shortcode doesn't wrap around text, we need this to make sure we don't accidentally replace any selected text when inserting the shortcode.
									function getSel()
									{
											var txtarea = document.getElementById("content");
											var start = txtarea.selectionStart;
											var finish = txtarea.selectionEnd;
											return txtarea.value.substring(start, finish);
									}

									QTags.addButton( 
											"qlik_sense_clear_shortcode", 
											"Qlik Sense Clear", 
											callback
									);

									function callback()
									{
											var selected_text = getSel();
											QTags.insertContent("[qlik-sense-object-clear-selections title=\"Clear Selections\"]" +  selected_text);
									}
							</script>
					<?php
			}
	}
	add_action("admin_print_footer_scripts", "qlik_sense_clear_button_script");
	
	//  qlik sense selections toolbar
	function qlik_sense_toolbar_button_script() {
			if(wp_script_is("quicktags")) {
					?>
							<script type="text/javascript">
									// this function is used to retrieve the selected text from the text editor. 
									// although this shortcode doesn't wrap around text, we need this to make sure we don't accidentally replace any selected text when inserting the shortcode.
									function getSel()
									{
											var txtarea = document.getElementById("content");
											var start = txtarea.selectionStart;
											var finish = txtarea.selectionEnd;
											return txtarea.value.substring(start, finish);
									}

									QTags.addButton( 
											"qlik_sense_toolbar_shortcode", 
											"Qlik Sense Toolbar", 
											callback
									);

									function callback()
									{
											var selected_text = getSel();
											QTags.insertContent("[qlik-sense-selection-toolbar]" +  selected_text);
									}
							</script>
					<?php
			}
	}
	add_action("admin_print_footer_scripts", "qlik_sense_toolbar_button_script");
	
	// Add the buttons to the TinyMCE so that the shortcodes can be added via the visual page/post editor
	function register_qlik_sense_buttons( $buttons ) {
		 array_push( $buttons, "qlik-sense-menu-button" );//"qlik_sense_obj_button", "qlik_sense_clear_button", "qlik_sense_toolbar_button" );
		 return $buttons;
	}

	function add_qlik_sense_plugin( $plugin_array ) {
		 $plugin_array['qlik_sense_buttons'] = plugin_dir_url(__FILE__) . 'js/qlik-sense-shortcode-buttons.js';
		 return $plugin_array;
	}

	function qlik_sense_buttons() {
		 if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
				return;
		 }

		 if ( get_user_option('rich_editing') == 'true' ) {
				add_filter( 'mce_external_plugins', 'add_qlik_sense_plugin' );
				add_filter( 'mce_buttons', 'register_qlik_sense_buttons' );
		 }
	}
	add_action('init', 'qlik_sense_buttons');
	
?>