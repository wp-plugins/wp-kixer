<?php
/* WP-Kixer Admin */
add_action( 'admin_menu', 'kx_add_admin_menu' );
add_action( 'admin_init', 'kx_settings_init' );

function kx_add_admin_menu(  ) { 
	add_submenu_page( 'plugins.php', 'wp-kixer', 'WP-Kixer', 'manage_options', 'wp-kixer', 'kx_options_page' );

}

function kx_settings_init(  ) { 
	register_setting( 'pluginPage', 'kx_settings' );


	add_settings_section(
		'kx_pluginPage_section', 
		__( 'How to use', 'wordpress' ), 
		'kx_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'kx_id', 
		__( 'Enter unit ID number', 'wordpress' ), 
		'kx_bottom_id', 
		'pluginPage', 
		'kx_pluginPage_section' 
	);

	add_settings_field( 
		'kx_bottom', 
		__( 'Insert at bottom of page/post content', 'wordpress' ), 
		'kx_checkbox_bottom', 
		'pluginPage', 
		'kx_pluginPage_section' 
	);
	
	
	add_settings_section(
		'kx_pluginPage_section2', 
		__( '<hr>Footer Placement', 'wordpress' ), 
		'kx_settings_section_callback2', 
		'pluginPage'
	);	
	
	add_settings_field( 
		'kx_footer_id', 
		__( 'Enter unit ID number', 'wordpress' ), 
		'kx_footer_id', 
		'pluginPage', 
		'kx_pluginPage_section2' 
	);
	
	add_settings_field( 
		'kx_footer', 
		__( 'Insert in footer', 'wordpress' ), 
		'kx_checkbox_footer', 
		'pluginPage', 
		'kx_pluginPage_section2' 
	);	
}

function kx_bottom_id(  ) { 
	$options = get_option( 'kx_settings' );
	?>
	<input type='number' min='1' name='kx_settings[kx_id]' value='<?php echo $options['kx_id']; ?>'>
	<?php
}

function kx_checkbox_bottom(  ) { 
	$options = get_option( 'kx_settings' );
	?>
	<input type='checkbox' name='kx_settings[kx_bottom]' <?php checked( $options['kx_bottom'], 1 ); ?> value='1'>
	<?php
}

function kx_footer_id(  ) { 
	$options = get_option( 'kx_settings' );
	?>
	<input type='number' min='1' name='kx_settings[kx_footer_id]' value='<?php echo $options['kx_footer_id']; ?>'>
	<?php
}

function kx_checkbox_footer(  ) { 
	$options = get_option( 'kx_settings' );
	?>
	<input type='checkbox' name='kx_settings[kx_footer]' <?php checked( $options['kx_footer'], 1 ); ?> value='1'>
	<?php
}

function kx_settings_section_callback(  ) { 
	echo __( 'WP-Kixer allows you to easily add kixer units into posts and pages. <br>You must have a unit ID number provided by Kixer before using this plugin. <br>There are three ways to use the plugin.<br><hr><h3>Shortcode</h3> Another option is to use a shortcode if you want to insert in specific pages. <br>Place the kixer shortcode anywhere in your post, page or widgets to fire the unit. Example: <br><b>[kixer id=1]</b> <br>Don\'t forget to replace the number 1 for your unit\'s id.<br><hr><h3>Template Tag</h3>If you have access to your theme\'s files, you may prefer to include the kixer function in your post template: <br> <b>kixer_unit(1);</b><br>Don\'t forget to replace the number 2 for your unit\'s id.<br><hr><h3>Below Content</h3> Fill-in your unit\'s ID field and select the checkbox if you want to insert the unit at the bottom of your posts and pages. ', 'wordpress' );
}

function kx_settings_section_callback2(  ) { 
	echo __( 'For certain types of units, like adhesion, adding their code in the footer might be recommended.' );
}

function kx_options_page(  ) { 
	?>
	<form action='options.php' method='post'>	
		<h2>WP-Kixer</h2>
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );	
		submit_button();
		?>
	</form>
	<?php
}
?>