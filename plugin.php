<?php
/*
Plugin Name: Home Page Templates
Plugin URI: https://shubhampandey.in
Description: New Home Page design.
Version: 1.0.1
Author: Shubham Pandey
Author URI: https://shubhampandey.in
License: GPLv2
*/

function spin_add_page_template ($templates) {
	$templates['home-page.php'] = 'Home Page Design';
	return $templates;
}
add_filter ('theme_page_templates', 'spin_add_page_template');

function spin_redirect_page_template ($template) {
	$post = get_post();
	$page_template = get_post_meta( $post->ID, '_wp_page_template', true ); 
	if ('home-page.php' == basename ($page_template))
		$template = WP_PLUGIN_DIR . '/home-templates/home-page.php';
	return $template;
}
add_filter ('page_template', 'spin_redirect_page_template');