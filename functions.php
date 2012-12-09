<?php
/*
 * Add Navigation Panel link
 */
function add_sbhookit_options_page() {
	add_theme_page(__('Startbox Easy Hooks', 'sbhookit'), __('Startbox Easy Hooks', 'sbhookit'), 'edit_themes', dirname(__FILE__) . '/options.php');
}
/*
 * Create an array of default setting names to register
 */
$defaults = array(
	'sbhookit_save_button', 'sbhookit_sb_404', 'sbhookit_sb_404_php',
	'sbhookit_sb_admin_left', 'sbhookit_sb_admin_left_php', 'sbhookit_sb_admin_right',
	'sbhookit_sb_admin_right_php', 'sbhookit_sb_after', 'sbhookit_sb_after_content',
	'sbhookit_sb_after_content_php', 'sbhookit_sb_after_featured', 'sbhookit_sb_after_featured_php',
	'sbhookit_sb_after_first_post', 'sbhookit_sb_after_first_post_php', 'sbhookit_sb_after_footer',
	'sbhookit_sb_after_footer_php', 'sbhookit_sb_after_footer_widgets', 'sbhookit_sb_after_footer_widgets_php',
	'sbhookit_sb_after_header', 'sbhookit_sb_after_header_php', 'sbhookit_sb_after_php',
	'sbhookit_sb_after_post', 'sbhookit_sb_after_post_content', 'sbhookit_sb_after_post_content_php',
	'sbhookit_sb_after_post_php', 'sbhookit_sb_after_secondary_widgets', 'sbhookit_sb_after_secondary_widgets_php',
	'sbhookit_sb_after_tertiary_widgets', 'sbhookit_sb_after_tertiary_widgets_php', 'sbhookit_sb_before',
	'sbhookit_sb_before_content', 'sbhookit_sb_before_content_php', 'sbhookit_sb_before_featured',
	'sbhookit_sb_before_featured_php', 'sbhookit_sb_before_first_post', 'sbhookit_sb_before_first_post_php',
	'sbhookit_sb_before_footer', 'sbhookit_sb_before_footer_php', 'sbhookit_sb_before_footer_widgets',
	'sbhookit_sb_before_footer_widgets_php', 'sbhookit_sb_before_header', 'sbhookit_sb_before_header_php',
	'sbhookit_sb_before_php', 'sbhookit_sb_before_post', 'sbhookit_sb_before_post_content',
	'sbhookit_sb_before_post_content_php', 'sbhookit_sb_before_post_php', 'sbhookit_sb_before_primary_widgets',
	'sbhookit_sb_before_primary_widgets_php', 'sbhookit_sb_before_tertiary_widgets', 'sbhookit_sb_before_tertiary_widgets_php',
	'sbhookit_sb_between_content_and_footer', 'sbhookit_sb_between_content_and_footer_php', 'sbhookit_sb_between_footer_widgets',
	'sbhookit_sb_between_footer_widgets_php', 'sbhookit_sb_between_primary_and_secondary_widgets', 'sbhookit_sb_between_primary_and_secondary_widgets_php',
	'sbhookit_sb_features', 'sbhookit_sb_features_php', 'sbhookit_sb_footer',
	'sbhookit_sb_footer_php', 'sbhookit_sb_header', 'sbhookit_sb_header_php',
	'sbhookit_sb_home', 'sbhookit_sb_home_php', 'sbhookit_sb_post_footer',
	'sbhookit_sb_post_footer_php', 'sbhookit_sb_post_header', 'sbhookit_sb_post_header_php',
	'sbhookit_wp_footer', 'sbhookit_wp_head',
);
/*
 TODO: Document how to add new settings/hooks/functions.
*/
//Filter the array so that the user can add more.
$custom = array();
$custom = apply_filters( 'sb_hooks_custom', $custom );

global $sb_hooks;
$sb_hooks = wp_parse_args( $custom, $defaults);

/*
 * Register SBHookIt settings
 */
function sbhookit_settings() {
	global $sb_hooks;
	foreach ( $sb_hooks as $setting ) {
		register_setting( 'sb_easyhooks_options', $setting );
	}
}
/*
 * Callback funtion for each of our custom functions below.
 */
function sbhookit_setup($optionname, $suffix = '') {
	$val = stripslashes( get_option( $optionname ) );

	if ( get_option( $optionname . $suffix ) ) {
		ob_start();
		eval("?>$val<?php");
		$val = ob_get_contents();
		ob_end_clean();
	}
	echo $val;
}
/*
	NOTE: Possible to loop? Not sure
*/
function sbhookit_wp_head() {
	sbhookit_setup( 'sbhookit_wp_head', '_php' );
}
function sbhookit_wp_footer() {
	sbhookit_setup('sbhookit_wp_footer', '_php' );
}
function sbhookit_sb_before() {
	sbhookit_setup('sbhookit_sb_before', '_php' );
}
function sbhookit_sb_before_header() {
	sbhookit_setup('sbhookit_sb_before_header', '_php' );
}
function sbhookit_sb_header() {
	sbhookit_setup('sbhookit_sb_header', '_php' );
}
function sbhookit_sb_after_header() {
	sbhookit_setup('sbhookit_sb_after_header', '_php' );
}
function sbhookit_sb_before_featured() {
	sbhookit_setup('sbhookit_sb_before_featured', '_php' );
}
function sbhookit_sb_featured() {
	sbhookit_setup('sbhookit_sb_featured', '_php' );
}
function sbhookit_sb_after_featured() {
	sbhookit_setup('sbhookit_sb_after_featured', '_php' );
}
function sbhookit_sb_home() {
	sbhookit_setup('sbhookit_sb_home', '_php' );
}
function sbhookit_sb_before_content() {
	sbhookit_setup('sbhookit_sb_before_content', '_php' );
}
function sbhookit_sb_after_content() {
	sbhookit_setup('sbhookit_sb_after_content', '_php' );
}
function sbhookit_sb_before_post() {
	sbhookit_setup('sbhookit_sb_before_post', '_php' );
}
function sbhookit_sb_before_first_post() {
	sbhookit_setup('sbhookit_sb_before_first_post', '_php' );
}
function sbhookit_sb_post_header() {
	sbhookit_setup('sbhookit_sb_post_header', '_php' );
}
function sbhookit_sb_before_post_content() {
	sbhookit_setup('sbhookit_sb_before_post_content', '_php' );
}
function sbhookit_sb_after_post_content() {
	sbhookit_setup('sbhookit_sb_after_post_content', '_php' );
}
function sbhookit_sb_post_footer() {
	sbhookit_setup('sbhookit_sb_post_footer', '_php' );
}
function sbhookit_sb_after_post() {
	sbhookit_setup('sbhookit_sb_after_post', '_php' );
}
function sbhookit_sb_after_first_post() {
	sbhookit_setup('sbhookit_sb_after_first_post', '_php' );
}
function sbhookit_sb_admin_left() {
	sbhookit_setup('sbhookit_sb_admin_left', '_php' );
}
function sbhookit_sb_admin_right() {
	sbhookit_setup('sbhookit_sb_admin_right', '_php' );
}
function sbhookit_sb_404() {
	sbhookit_setup('sbhookit_sb_404', '_php' );
}
function sbhookit_sb_before_primary_widgets() {
	sbhookit_setup('sbhookit_sb_before_primary_widgets', '_php' );
}
function sbhookit_sb_between_primary_and_secondary_widgets() {
	sbhookit_setup('sbhookit_sb_between_primary_and_secondary_widgets', '_php' );
}
function sbhookit_sb_after_secondary_widgets() {
	sbhookit_setup('sbhookit_sb_after_secondary_widgets', '_php' );
}
function sbhookit_sb_before_tertiary_widgets() {
	sbhookit_setup('sbhookit_sb_before_tertiary_widgets', '_php' );
}
function sbhookit_sb_after_tertiary_widgets() {
	sbhookit_setup('sbhookit_sb_after_tertiary_widgets', '_php' );
}
function sbhookit_sb_before_footer_widgets() {
	sbhookit_setup('sbhookit_sb_before_footer_widgets', '_php' );
}
function sbhookit_sb_between_footer_widgets() {
	sbhookit_setup('sbhookit_sb_between_footer_widgets', '_php' );
}
function sbhookit_sb_after_footer_widgets() {
	sbhookit_setup('sbhookit_sb_after_footer_widgets', '_php' );
}
function sbhookit_sb_between_content_and_footer() {
	sbhookit_setup('sbhookit_sb_between_content_and_footer', '_php' );
}
function sbhookit_sb_before_footer() {
	sbhookit_setup('sbhookit_sb_before_footer', '_php' );
}
function sbhookit_sb_footer() {
	sbhookit_setup('sbhookit_sb_footer', '_php' );
}
function sbhookit_sb_after_footer() {
	sbhookit_setup('sbhookit_sb_after_footer', '_php' );
}
function sbhookit_sb_after() {
	sbhookit_setup('sbhookit_sb_after', '_php' );
}