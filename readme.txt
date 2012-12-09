=== Startbox Easy hooks ===
Contributors: Benjamin Bradley (wpstudio.com), Brian Richards (wpstartbox.com)
Tags: theme, customization, functions, display, hooks, filters, Startbox
Requires at least: 3.0
Tested up to: 3.0.3
Stable tag: trunk

This plugin allows you to insert arbitrary content into the many hooks that the Startbox framework provides. With this plugin you won't have to open a file and edit it again.

== Description ==

Startbox Easy Hooks takes the process of modifying Startbox and simplifies it!

Not only can arbitrary HTML, CSS, JavaScript, and even PHP be inserted into any of Startbox hooks, you can also easily remove any of the hooked default elements within Startbox with the click of a button!

Startbox Easy Hooks is based heavily upon Thesis OpenHook & K2 Hook Up</a>.

More information can be found at http://wpstudio.com

== Installation ==

After you have downloaded the file and extracted the `sbhookit/` directory from the archive...

1. Upload the entire `sbhookit/` directory to the `wp-content/plugins/` directory.
1. Activate the plugin through the Plugins menu in WordPress.
1. Visit Appearance -> Startbox Easy Hooks and customize to your heart's content!

== Frequently Asked Questions ==


== Changelog ==
= 0.2.5 =
* Fixed bugs for saving content in sb_before_header, sb_header, and sb_featured hooks

= 0.2.4 =
* Added two new hooks for sb_before_first_post and sb_after_first_post

= 0.2.3 =
* Renamed from SBHookIt to Startbox Easy Hooks
* Minor style updates for Options page

= 0.2.2 =
* Bug fixes

= 0.2.1 =
* Adding php variable striping to post boxes
* Updated to latest version of startbox hooks

= 0.1.4 =
* Bug fixes
* Modified support information

= 0.1.3 =
* Bug fixes in options.php file

= 0.1.2 =
* Added wp_head() & wp_footer() to options
* Bug fixes

= 0.1.1 =
* First public alpha
* Fixed front end issue of duplicate functions being called

= 0.0.3 =
* Rewrote the hooks list to accommodate for a change in the Hooks API
* Added definitions for each hook on the Admin screen
* Setup non-variabled hooks
* Added inline docs and comments
* Deprecated old Hook API naming convention

TODO:
* Add variable options for hooks

= 0.0.2 =
* Added sections for all Startbox Hooks to navigate easily.