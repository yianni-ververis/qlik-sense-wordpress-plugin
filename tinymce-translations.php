<?php
 
 defined('ABSPATH') or die("No humans here please!"); //Block direct access to this php file
 
if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );
 
function qlik_sense_tinymce_translation() {
    $strings = array(
        'insertSense' => esc_attr__('Insert Qlik Sense...', 'qlik-sense'), 
        'insertObject' => esc_attr__('Insert Object', 'qlik-sense'), 
        'uniqueDivId' => esc_attr__('Unique Div ID', 'qlik-sense'), 
        'senseObjId' => esc_attr__('Sense Object ID', 'qlik-sense'), 
        'insertClearSelections' => esc_attr__('Insert Clear Selections', 'qlik-sense'), 
        'insertSelectionsToolbar' => esc_attr__('Insert Selections Toolbar', 'qlik-sense'), 
				
    );
 
    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.qlik_sense_buttons", ' . json_encode( $strings ) . ");\n";
 
    return $translated;
}
 
$strings = qlik_sense_tinymce_translation();

?>