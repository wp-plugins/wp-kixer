<?php 
/*
 * Plugin Name: WP-Kixer
 * Description: Add kixer units to your WordPress
 * Version: 0.2
 * Author: Kixer
 * Author URI: http://kixer.com
 */
 
define( 'WPKIXER__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if ( is_admin() ) {
	require_once( WPKIXER__PLUGIN_DIR . 'wp-kixer-admin.php' );
}

function get_kixer_code( $id ) {
	return '<div id="__kx_ad_'. $id .'"></div>
	<script type="text/javascript" language="javascript">
	var __kx_ad_slots = __kx_ad_slots || [];
	(function () {
		var slot = '. $id .'
		var h = false;
		__kx_ad_slots.push(slot);
		if (typeof __kx_ad_start == "function") {
			__kx_ad_start();
		} else {
			var s = document.createElement("script");
			s.type = "text/javascript";
			s.async = true;
			s.src = "http://cdn.kixer.com/ad/load.js";
			s.onload = s.onreadystatechange = function(){
				if (!h && (!this.readyState || this.readyState == "loaded" || this.readyState == "complete")) {
					h = true;
					s.onload = s.onreadystatechange = null;
					__kx_ad_start();
				}
			};
			var x = document.getElementsByTagName("script")[0];
			x.parentNode.insertBefore(s, x);
		}
	})();
	</script>';
}

/* Template tag */
function kixer_unit($id) {
	echo get_kixer_code($id);	
}
 
/* Kixer Shortcode */
function add_kixer_unit( $atts ){	
	$unit = shortcode_atts( array(
		'id' => '1',
	), $atts );	
	$output = get_kixer_code($unit['id']);
	return $output;
}
add_shortcode('kixer', 'add_kixer_unit');

/* Kixer Bottom Unit */
function kixer_bottom($content) {	
	$__kx_options = get_option( 'kx_settings');
	$id = $__kx_options['kx_id'];
	$output = get_kixer_code($id);
	return $content . $output;
}

function kixer_footer() {	
	$__kx_options = get_option( 'kx_settings');
	$id = $__kx_options['kx_footer_id'];
	$output = get_kixer_code($id);
	echo $output;
}

$__kx_options = get_option( 'kx_settings');
if( !empty($__kx_options) ) {
	if( $__kx_options['kx_bottom'] == "1" ) {
		add_filter('the_content', 'kixer_bottom');	
	}
	if( $__kx_options['kx_footer'] == "1" ) {
		add_action( 'wp_footer', 'kixer_footer' );
	}
}
?>