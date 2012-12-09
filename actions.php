<?php
/*
 *	This file is intended to add_action all of our action hooks. Right before that is done,
 *	we do an apply_filters() so that users can add their own without altering the plugin itself.
 */

//Construct an array of all our default hooks.
$defaults = array(
	array( 'hook' => 'admin_init', 'function_name' => 'sbhookit_settings' ),
	array( 'hook' => 'admin_menu', 'function_name' => 'add_sbhookit_options_page' ),
	array( 'hook' => 'wp_head', 'function_name' => 'sbhookit_wp_head' ),
	array( 'hook' => 'wp_footer', 'function_name' => 'sbhookit_wp_footer' ),
	array( 'hook' => 'sb_before', 'function_name' => 'sbhookit_sb_before' ),
	array( 'hook' => 'sb_before_header', 'function_name' => 'sbhookit_sb_before_header' ),
	array( 'hook' => 'sb_header', 'function_name' => 'sbhookit_sb_header' ),
	array( 'hook' => 'sb_after_header', 'function_name' => 'sbhookit_sb_after_header' ),
	array( 'hook' => 'sb_before_featured', 'function_name' => 'sbhookit_sb_before_featured' ),
	array( 'hook' => 'sb_featured', 'function_name' => 'sbhookit_sb_featured' ),
	array( 'hook' => 'sb_after_featured', 'function_name' => 'sbhookit_sb_after_featured' ),
	array( 'hook' => 'sb_home', 'function_name' => 'sbhookit_sb_home' ),
	array( 'hook' => 'sb_before_content', 'function_name' => 'sbhookit_sb_before_content' ),
	array( 'hook' => 'sb_after_content', 'function_name' => 'sbhookit_sb_after_content' ),
	array( 'hook' => 'sb_before_post', 'function_name' => 'sbhookit_sb_before_post' ),
	array( 'hook' => 'sb_after_post', 'function_name' => 'sbhookit_sb_after_post' ),
	array( 'hook' => 'sb_before_first_post', 'function_name' => 'sbhookit_sb_before_first_post' ),
	array( 'hook' => 'sb_after_first_post', 'function_name' => 'sbhookit_sb_after_first_post' ),
	array( 'hook' => 'sb_post_header', 'function_name' => 'sbhookit_sb_post_header' ),
	array( 'hook' => 'sb_before_post_content', 'function_name' => 'sbhookit_sb_before_post_content' ),
	array( 'hook' => 'sb_after_post_content', 'function_name' => 'sbhookit_sb_after_post_content' ),
	array( 'hook' => 'sb_post_footer', 'function_name' => 'sbhookit_sb_post_footer' ),
	array( 'hook' => 'sb_admin_left', 'function_name' => 'sbhookit_sb_admin_left' ),
	array( 'hook' => 'sb_admin_right', 'function_name' => 'sbhookit_sb_admin_right' ),
	array( 'hook' => 'sb_404', 'function_name' => 'sbhookit_sb_404' ),
	array( 'hook' => 'sb_before_primary_widgets', 'function_name' => 'sbhookit_sb_before_primary_widgets' ),
	array( 'hook' => 'sb_between_primary_and_secondary_widgets', 'function_name' => 'sbhookit_sb_between_primary_and_secondary_widgets' ),
	array( 'hook' => 'sb_after_secondary_widgets', 'function_name' => 'sbhookit_sb_after_secondary_widgets' ),
	array( 'hook' => 'sb_before_tertiary_widgets', 'function_name' => 'sbhookit_sb_before_tertiary_widgets' ),
	array( 'hook' => 'sb_after_tertiary_widgets', 'function_name' => 'sbhookit_sb_after_tertiary_widgets' ),
	array( 'hook' => 'sb_before_footer_widgets', 'function_name' => 'sbhookit_sb_before_footer_widgets' ),
	array( 'hook' => 'sb_between_footer_widgets', 'function_name' => 'sbhookit_sb_between_footer_widgets' ),
	array( 'hook' => 'sb_after_footer_widgets', 'function_name' => 'sbhookit_sb_after_footer_widgets' ),
	array( 'hook' => 'sb_between_content_and_footer', 'function_name' => 'sbhookit_sb_between_content_and_footer' ),
	array( 'hook' => 'sb_before_footer', 'function_name' => 'sbhookit_sb_before_footer' ),
	array( 'hook' => 'sb_footer', 'function_name' => 'sbhookit_sb_footer' ),
	array( 'hook' => 'sb_after_footer', 'function_name' => 'sbhookit_sb_after_footer' ),
	array( 'hook' => 'sb_after', 'function_name' => 'sbhookit_sb_after ' )
);

//Lets get our filters on. Start with an empty array to pass in.
//Filtering an array of actions, oh my.
$custom = array();
$custom = apply_filters( 'sb_easy_hooks_custom', $custom );

//And then merge the filtered array into our default set.
$actions = wp_parse_args( $custom, $defaults);

//loop through them all and register them as action hooks.
foreach ( $actions as $action ) {
	add_action( $action['hook'], $action['function_name'] );
}