<?php
/*
Plugin Name: StartBox Easy Hooks
Plugin URI: http://wpstartbox.com/
Description: Easily insert most kinds of content into the various hooks available in the StartBox theme, without editing any files. Based on Thesis OpenHook & K2 Hook Up and GPLed.
Version: 1.0
Author: webdevstudios, williamsba1, rzen, tw2113
Author URI: http://webdevstudios.com
*/

// Localization. Should be bablefish ready.
load_plugin_textdomain( 'sb_easy_hooks', FALSE, dirname( __FILE__ ) );

// Fire up ze engines!
add_action( 'admin_menu', 'add_sb_easy_hooks_options_page' );
add_action( 'admin_init', 'sb_easy_hooks_options_init' );
add_action( 'admin_init', 'sb_easy_hooks_array_init' );
add_action( 'admin_init', 'sb_easy_hooks_notice' );
add_action( 'init', 'sb_easy_hooks_array_init' );
add_action( 'init', 'sb_easy_hooks_add_actions' );

/**
 * Add the options page to the Appearance submenu.
 *
 * @since 1.0
 */
function add_sb_easy_hooks_options_page() {
	add_theme_page( __( 'StartBox Easy Hooks', 'sb_easy_hooks' ), __( 'StartBox Easy Hooks', 'sb_easy_hooks' ), 'manage_options', 'sbeasyhook', 'sb_easy_hooks_do_settings_page' );
}

/**
 * Set up our master sword array.
 *
 * @since 1.0
 */
function sb_easy_hooks_array_init() {
	global $sb_easy_hooks_array;

	// Setup our master hooks array, and make it filterable for other devs
	$sb_easy_hooks_array = apply_filters( 'sb_easy_hooks_array', array(
			'header_group'         => array( 'title' => __( 'Header.php', 'sb_easy_hooks' ),         'description' => __( 'Hooks related to the header', 'sb_easy_hooks' ),          'hooks' => array( 'sb_before', 'sb_before_header', 'sb_header', 'sb_after_header' ) ),
			'frontpage_group'      => array( 'title' => __( 'Front-page.php', 'sb_easy_hooks' ),     'description' => __( 'Hooks related to the front page', 'sb_easy_hooks' ),      'hooks' => array( 'sb_before_featured', 'sb_featured', 'sb_after_featured', 'sb_home' ) ),
			'all_group'            => array( 'title' => __( 'All Templates', 'sb_easy_hooks' ),      'description' => __( 'Hooks related to the all templates', 'sb_easy_hooks' ),   'hooks' => array( 'sb_before_content', 'sb_after_content' ) ),
			'loop_group'           => array( 'title' => __( 'Loop', 'sb_easy_hooks' ),               'description' => __( 'Hooks related to the post loop', 'sb_easy_hooks' ),       'hooks' => array( 'sb_before_post', 'sb_after_post', 'sb_before_first_post', 'sb_after_first_post' ) ),
			'loop_single_group'    => array( 'title' => __( 'Loop and Single', 'sb_easy_hooks' ),    'description' => __( 'Hooks related to the single post', 'sb_easy_hooks' ),     'hooks' => array( 'sb_post_header', 'sb_before_post_content', 'sb_after_post_content', 'sb_post_footer' ) ),
			'404_group'            => array( 'title' => __( '404', 'sb_easy_hooks' ),                'description' => __( 'Hooks related to the 404 page', 'sb_easy_hooks' ),        'hooks' => array( 'sb_404' ) ),
			'sidebar_group'        => array( 'title' => __( 'Sidebar.php', 'sb_easy_hooks' ),        'description' => __( 'Hooks related to the sidebar', 'sb_easy_hooks' ),         'hooks' => array( 'sb_before_primary_widgets', 'sb_between_primary_and_secondary_widgets', 'sb_after_secondary_widgets' ) ),
			'sidebar_footer_group' => array( 'title' => __( 'Sidebar-footer.php', 'sb_easy_hooks' ), 'description' => __( 'Hooks related to the footer sidebars', 'sb_easy_hooks' ), 'hooks' => array( 'sb_before_footer_widgets', 'sb_between_footer_widgets', 'sb_after_footer_widgets' ) ),
			'footer_group'         => array( 'title' => __( 'Footer.php', 'sb_easy_hooks' ),         'description' => __( 'Hooks related to the footer', 'sb_easy_hooks' ),          'hooks' => array( 'sb_between_content_and_footer', 'sb_before_footer', 'sb_footer', 'sb_after_footer', 'sb_after' ) ),
			'wp_native_group'      => array( 'title' => __( 'WordPress Native', 'sb_easy_hooks' ),   'description' => __( 'Hooks related to WordPress itself', 'sb_easy_hooks' ),    'hooks' => array( 'wp_head', 'wp_footer'  ) )
	) );
}

/**
 * Register our settings and add our sections/fields.
 *
 * @since 1.0
 */
function sb_easy_hooks_options_init() {
	global $sb_easy_hooks_array;

	// Register our settings options
	register_setting( 'sb_easy_hooks_options', 'sb_easy_hooks_options', 'sb_easy_hooks_options_validate' );

	// Setup all our sections and inputs
	foreach ( $sb_easy_hooks_array as $section_id => $section ) {

		// Register each settings section
		add_settings_section( $section_id, $section['title'], 'sb_easy_hooks_render_hook_section', 'sbeasyhook' );

		// Register each hook as a setting for it's section
		foreach ( $section['hooks'] as $hook ) {
			add_settings_field( $hook, $hook, 'sb_easy_hooks_render_hook_field', 'sbeasyhook', $section_id, array( 'label_for' => $hook, 'section_id' => $section_id, 'hook' => $hook ) );
		}
	}
}

/**
 * Lets get our page rendered.
 *
 * @since 1.0
 */
function sb_easy_hooks_do_settings_page() {
	global $sb_easy_hooks_array; ?>

	<div class="wrap">
		<?php screen_icon();?>
		<h2><?php _e( 'StartBox Easy Hooks Settings', 'sb_easy_hooks' ); ?></h2>
		<p><?php _e('You can use StartBox Easy Hooks to easily add content and basic html markup to various parts of your StartBox based project. Along the left, you will see available file names and below those, the StartBox hooks that are present in the file. On the right, you can add your markup or content and it will be displayed at the appropriate spot when a visitor stops by. When you are all done, hit save and go see your handywork.', 'sb_easy_hooks'); ?></p>

		<form action="options.php" method="post">
			<?php submit_button(); ?>
			<?php settings_fields( 'sb_easy_hooks_options' ); ?>

			<?php do_settings_sections( 'sbeasyhook' ); ?>

			<?php submit_button(); ?>

		</form>

		<p><?php _e('You can find more information on StartBox at the following locations: <a href="http://wpstartbox.com/" title="WordPress StartBox Theme Framework">WP StartBox Homepage</a>, <a href="https://github.com/WebDevStudios/StartBox" title="WordPress StartBox Theme Framework on GitHub">GitHub</a> and <a href="http://www.twitter.com/wpstartbox" title="WordPress StartBox on Twitter">Twitter</a>.', 'sb_easy_hooks'); ?></p>
	</div>
<?php }

/**
 * Validation for each of our hook fields
 *
 * @since 1.0
 * @param string  $input The value of the input field that we need to validate
 */
function sb_easy_hooks_options_validate( $input ) {
	global $sb_easy_hooks_array;

	foreach ( $sb_easy_hooks_array as $section_id => $section ) {
		foreach ( $section['hooks'] as $hook ) {
			$newinput[ $hook ] = trim( wp_kses_data( $input[ $hook ] ) );
		}
	}

	return $newinput;
}

/**
 * Add our notice when appropriate
 *
 * @since 1.0
 */
function sb_easy_hooks_notice() {
	if ( !empty( $_GET['settings-updated'] ) && $_GET['settings-updated'] == 'true' )
		add_action( 'admin_notices', 'sb_easy_hooks_notice_success');
}
/**
 * Admin notice indicating successful saving of our settings
 *
 * @since 1.0
 */
function sb_easy_hooks_notice_success() {
	echo '<div class="updated"><p>' . __( 'Your hook settings have been successfully saved.', 'sb_easy_hooks' ) . '</div>';
}

/**
 * Helper function for rendering our hook sections
 *
 * @since  1.0
 * @param array   $section The given section we want to render
 */
function sb_easy_hooks_render_hook_section( $section ) {
	global $sb_easy_hooks_array;
	echo $sb_easy_hooks_array[$section['id']]['description'];
}

/**
 * Helper function for rendering our input fields
 *
 * @since  1.0
 * @param array   $args The arguments being passed in for the field
 */
function sb_easy_hooks_render_hook_field( $args ) {
	$easy_hooks_options = get_option( 'sb_easy_hooks_options' );

	$sb_hook_value = isset( $easy_hooks_options[ $args['hook'] ] ) ? $easy_hooks_options[ $args['hook'] ] : '';
?>
	<textarea id="<?php $args['hook']; ?>" name="sb_easy_hooks_options[<?php echo $args['hook']; ?>]" style="height: 150px; resize: vertical; width: 530px; float: right;"><?php echo $sb_hook_value; ?></textarea>
<?php
}

/**
 * Add our option values to each registered hook
 *
 * @since 1.0
 */
function sb_easy_hooks_add_actions() {
	// Grab our easy hooks array
	global $sb_easy_hooks_array;

	// Loop through each section of the master array
	foreach ( $sb_easy_hooks_array as $section_id => $section ) {
		// Loop through each hook in each section
		foreach ( $section['hooks'] as $hook ) {
			// Add our option output to the hook
			add_action( $hook, array( new SB_Easy_Hooks_Output( $hook ), 'hook_output' ), 10, 1 );
		}
	}
}

/**
 * Helper class for sb_easy_hooks_add_actions()
 *
 * @param string $hook The hook whose output we want to grab
 */
if ( ! class_exists( 'SB_Easy_Hooks_Output' ) ) {
	class SB_Easy_Hooks_Output {
		// Initialize our class
		function __construct( $hook = null ) {
			// Setup our passed $hook
			$this->hook = $hook;
		}
		// Grab and echo the output or our hook
		function hook_output() {
			// Grab our plugin settings
			$easy_hooks_options = get_option( 'sb_easy_hooks_options' );
			$hook_value = $easy_hooks_options[$this->hook];

			// Echo our output
			echo $hook_value;
		}
	}
} // END: If class_exists