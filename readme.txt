=== StartBox Easy Hooks ===
Contributors: webdevstudios, williamsba1, rzen, tw2113
Tags: theme, customization, functions, display, hooks, filters, StartBox
Requires at least: 3.0
Tested up to: 3.5
Stable tag: 1.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily insert most kinds of text content or markup into the various hooks available in the StartBox Theme Framework, without editing any theme files.

== Description ==

Easily insert most kinds of content or markup into the various hooks available in the StartBox Theme Framework, without editing any theme files. This allows you to further customize your StartBox based project without having to deal with code and manually adding WordPress hooks.

For more information on the StartBox hooks, visit [StartBox Hooks](http://docs.wpstartbox.com/Hooks)

All official development on this plugin is on GitHub. Version bumps will still be published here on WordPress.org. You can find the repo at [https://github.com/WebDevStudios/StartBox-Easy-Hooks](https://github.com/WebDevStudios/StartBox-Easy-Hooks). Please file issues, bugs, and enhancement ideas there, when possible.

== Installation ==

Automatic

1. Navigate to your "Add New" plugins screen and search for "StartBox Easy Hooks" When you find it in the listing, click "Install Now".
2. Activate when prompted.
3. You can find the settings page under your Appearance menu.

Manual

1. Download the StartBox Easy Hooks zip file on the right, and upload to your WordPress install's wp-content/plugins/ folder.
2. Log into your WordPress install, navigate to your installed plugins listing, and activate StartBox Easy Hooks.
3. You can find the settings page under your Appearance menu.

== Documentation ==

To add an entire group to the Easy Hooks page, add a filter like so.

`<?php
add_filter( 'sb_easy_hooks_array', 'prefix_add_custom_hooks_group' );
function prefix_add_custom_hooks_group( $hooks ) {
	$hooks['group_name'] = array(
		'title' => __( 'File Location.php', 'sb_easy_hooks' ),
		'description' => __( 'Description goes here', 'sb_easy_hooks' ),
		'hooks' => array( 'hook_one', 'hook_two' )
	);
	return $hooks
}
?>
`
This will create an entire new grouping in the options page and fill in all appropriate spots.

If you want to add a single hook to an already existing grouping, filter this way. You will need to get the correct array key before you begin. You can do this either by doing a var_dump() on the $hooks array that's passed in, or just check the plugin's source code to see the default structure. This example will use the 404_group key.

`
<?php
add_filter( 'sb_easy_hooks_array', 'prefix_add_custom_hooks' );
function prefix_add_custom_hooks( $hooks ) {
	$hooks['404_group']['hooks'][] = 'new_hook';
	return $hooks;
}
?>
`

== Frequently Asked Questions ==

None...yet.

== Changelog ==

1.1 Better logic handling for admin notice display.

1.0 Initial commit.

== Upgrade Notice ==

1.1 Adds better handling for admin notices when using plugin

== Screenshots ==

Coming soon.