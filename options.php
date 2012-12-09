<?php
/**
 * Options page for the SB Hook It Plugin
 *
 * http://wpstudio.com
 * Copyright 2010 Benjamin Bradley (email: benjaminwbradley@gmail.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 **/

/*
 * This is to prevent the file from being accessed from outside WP
*/
if ( !current_user_can( 'edit_themes' ) )
	wp_die( __( 'You are not authorized to access Startbox Easy Hooks.', 'sbhookit' ) );

/*
 * Spit out the clean version of the hook's content
*/
function sbhookit_option( $option ) {
	echo stripslashes( htmlspecialchars( get_option( $option ) ) );
}

/*
 * Take care of posted content
*/
if ( !empty( $_POST ) ) {
	$sb_update_options = array(
		'sbhookit_save_button', 'sbhookit_wp_head', 'sbhookit_wp_head_php',
		'sbhookit_wp_footer', 'sbhookit_wp_footer_php', 'sbhookit_sb_before',
		'sbhookit_sb_before_php', 'sbhookit_sb_before_header', 'sbhookit_sb_before_header_php',
		'sbhookit_sb_header', 'sbhookit_sb_header_php', 'sbhookit_sb_after_header',
		'sbhookit_sb_after_header_php', 'sbhookit_sb_before_featured', 'sbhookit_sb_before_featured_php',
		'sbhookit_sb_featured', 'sbhookit_sb_featured_php', 'sbhookit_sb_after_featured',
		'sbhookit_sb_after_featured_php', 'sbhookit_sb_home', 'sbhookit_sb_home_php',
		'sbhookit_sb_before_content', 'sbhookit_sb_before_content_php', 'sbhookit_sb_after_content',
		'sbhookit_sb_after_content_php', 'sbhookit_sb_before_post', 'sbhookit_sb_before_post_php',
		'sbhookit_sb_before_first_post', 'sbhookit_sb_before_first_post_php', 'sbhookit_sb_post_header',
		'sbhookit_sb_post_header_php', 'sbhookit_sb_before_post_content', 'sbhookit_sb_before_post_content_php',
		'sbhookit_sb_after_post_content', 'sbhookit_sb_after_post_content_php', 'sbhookit_sb_post_footer',
		'sbhookit_sb_post_footer_php', 'sbhookit_sb_after_post', 'sbhookit_sb_after_post_php',
		'sbhookit_sb_after_first_post', 'sbhookit_sb_after_first_post_php', 'sbhookit_sb_admin_left',
		'sbhookit_sb_admin_left_php', 'sbhookit_sb_admin_right', 'sbhookit_sb_admin_right_php',
		'sbhookit_sb_404', 'sbhookit_sb_404_php', 'sbhookit_sb_before_primary_widgets',
		'sbhookit_sb_before_primary_widgets_php', 'sbhookit_sb_between_primary_and_secondary_widgets', 'sbhookit_sb_between_primary_and_secondary_widgets_php',
		'sbhookit_sb_after_secondary_widgets', 'sbhookit_sb_after_secondary_widgets_php', 'sbhookit_sb_before_tertiary_widgets',
		'sbhookit_sb_before_tertiary_widgets_php', 'sbhookit_sb_after_tertiary_widgets', 'sbhookit_sb_after_tertiary_widgets_php',
		'sbhookit_sb_before_footer_widgets', 'sbhookit_sb_before_footer_widgets_php', 'sbhookit_sb_between_footer_widgets',
		'sbhookit_sb_between_footer_widgets_php', 'sbhookit_sb_after_footer_widgets', 'sbhookit_sb_after_footer_widgets_php',
		'sbhookit_sb_between_content_and_footer', 'sbhookit_sb_between_content_and_footer_php', 'sbhookit_sb_before_footer',
		'sbhookit_sb_before_footer_php', 'sbhookit_sb_footer', 'sbhookit_sb_footer_php',
		'sbhookit_sb_after_footer', 'sbhookit_sb_after_footer_php', 'sbhookit_sb_after', 'sbhookit_sb_after_php'
	);

	foreach ( $sb_update_options as $sb_options ) {
		update_option( $sb_option, $_POST[ $sb_option ] );
	}

	//Add filter to message at top of WP admin
	echo '<div id="message" class="updated fade"><p><strong>' . __( 'Settings Saved! <a href="' . get_bloginfo( 'url' ) . '" target="_blank">Check your site</a> and make sure everything is working as expected.' ) . '</strong></p></div>' . "\n";
}

/*
 * Save Button
*/
$save_button = attribute_escape( get_option( 'sbhookit_save_button' ) );
if ( $save_button == '' )
	$save_button = __( 'Save All', 'sbhookit' );
?>
<style type="text/css">
<!--/* --><![CDATA[/*><!--*/
#jumpbox {
	position:fixed;
	bottom: 5em;
	right:1em;
	background: #bbb;
	border:1px solid #444;
	padding:1em;
	opacity:0.7;
	-webkit-border-radius:0.7em;
	-khtml-border-radius:0.7em;
	-moz-border-radius:0.7em;
	border-radius:0.7em;
}
#f {
	opacity: 1 !important;
}
#f optgroup option {
	text-indent: 1em;
}
/*]]>*/-->
</style>
<div class="wrap">
<?php screen_icon(); ?>
	<h2><?php _e( 'Startbox Easy Hooks (beta)', 'sbhookit' ); ?></h2>
	<p><?php printf( __( 'Startbox Easy Hooks is a free plugin given to the Startbox Community, originally written by <a href="http://wpstudio.com" title="WPStudio" target="_blank">Benjamin Bradley</a>, and currently maintained by <a href="http://www.webdevstudios.com" title="WebDevStudios" target="_blank">WebDevStudios</a>', 'sbhookit' ) ); ?></p>
	<p><?php _e( 'For more info about Startbox hooks please read the <a href="http://docs.wpstartbox.com/Hooks">Startbox docs page</a>.' ); ?></p>
	<p><?php _e( 'Currently these settings are only for <em>Action Hooks</em>, future updates may add <em>Filters</em>.' ); ?></p>

	<form method="post" action="">
		<div class="hidden">
			<?php settings_fields( 'sbhookit' ); ?>
		</div>
		<table class="form-table">
<?php
	/*
		TODO: Settings API. Will remove all this excess.
		NOTE: reduce amount of "Save all", every X options? Just top and bottom of page?
		NOTE: grid + 2 column.
	*/ ?>
<!-- header.php -->
<tr valign="top">
	<th scope="row"><h2 id="headerphp"><?php _e( 'Header.php', 'sbhookit' ); ?></h2></th>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_before"><?php _e( 'sb_before', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_before</code></legend>
			<p><label for="sb_before"><?php printf( __( 'The very first thing inside body tag.', 'sbhookit' ), '<code>sb_before</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_before" name="sbhookit_sb_before" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_before' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_before_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_before_php' ) ); ?> value="1" id="sbhookit_sb_before_php" name="sbhookit_sb_before_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>

<tr valign="top">
	<th scope="row"><h3 id="sb_before_header"><?php _e( 'sb_before_header', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_before_header</code></legend>
			<p><label for="sb_before_header"><?php printf( __( 'Inside the div #wrap and before the div #header', 'sbhookit' ), '<code>sb_before_header</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_before_header" name="sbhookit_sb_before_header" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_before_header' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_before_header_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_before_header_php' ) ); ?> value="1" id="sbhookit_sb_before_header_php" name="sbhookit_sb_before_header_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_header"><?php _e( 'sb_header', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_header</code></legend>
			<p><label for="sb_header"><?php printf( __( 'Inside the div #header and before any content', 'sbhookit' ), '<code>sb_header</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_header" name="sbhookit_sb_header" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_header' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_header_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_header_php' ) ); ?> value="1" id="sbhookit_sb_header_php" name="sbhookit_sb_header_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_after_header"><?php _e( 'sb_after_header', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_after_header</code></legend>
			<p><label for="sb_after_header"><?php printf( __( 'Inside the div #wrap and after the div #header', 'sbhookit' ), '<code>sb_after_header</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_after_header" name="sbhookit_sb_after_header" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_after_header' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_after_header_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_after_header_php' ) ); ?> value="1" id="sbhookit_sb_after_header_php" name="sbhookit_sb_after_header_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h2 id="frontpagephp"><?php _e( 'Front-page.php', 'sbhookit' ); ?></h2></th>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_before_featured"><?php _e( 'sb_before_featured', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_before_featured</code></legend>
			<p><label for="sb_before_featured"><?php printf( __( 'Located just after sb_before_content.', 'sbhookit' ), '<code>sb_before_featured</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_before_featured" name="sbhookit_sb_before_featured" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_before_featured' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_before_featured_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_before_featured_php' ) ); ?> value="1" id="sbhookit_sb_before_featured_php" name="sbhookit_sb_before_featured_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_featured"><?php _e( 'sb_featured', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_featured</code></legend>
			<p><label for="sb_featured"><?php printf( __( 'Located just after sb_before_featured.', 'sbhookit' ), '<code>sb_featured</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_featured" name="sbhookit_sb_featured" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_featured' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_featured_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_featured_php' ) ); ?> value="1" id="sbhookit_sb_featured_php" name="sbhookit_sb_featured_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_after_featured"><?php _e( 'sb_after_featured', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_after_featured</code></legend>
			<p><label for="sb_after_featured"><?php printf( __( 'Located just after sb_featured.', 'sbhookit' ), '<code>sb_after_featured</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_after_featured" name="sbhookit_sb_after_featured" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_after_featured' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_after_featured_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_after_featured_php' ) ); ?> value="1" id="sbhookit_sb_after_featured_php" name="sbhookit_sb_after_featured_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_home"><?php _e( 'sb_home', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_home</code></legend>
			<p><label for="sb_home"><?php printf( __( 'Located just after sb_after_featured.', 'sbhookit' ), '<code>sb_home</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_home" name="sbhookit_sb_home" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_home' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_home_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_home_php' ) ); ?> value="1" id="sbhookit_sb_home_php" name="sbhookit_sb_home_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h2 id="alltemplates"><?php _e( 'All Templates', 'sbhookit' ); ?></h2></th>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_before_content"><?php _e( 'sb_before_content', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_before_content</code></legend>
			<p><label for="sb_before_content"><?php printf( __( 'Very first thing inside div #content', 'sbhookit' ), '<code>sb_before_content</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_before_content" name="sbhookit_sb_before_content" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_before_content' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_before_content_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_before_content_php' ) ); ?> value="1" id="sbhookit_sb_before_content_php" name="sbhookit_sb_before_content_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_after_content"><?php _e( 'sb_after_content', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_after_content</code></legend>
			<p><label for="sb_after_content"><?php printf( __( 'Very last thing inside div #content', 'sbhookit' ), '<code>sb_after_content</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_after_content" name="sbhookit_sb_after_content" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_after_content' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_after_content_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_after_content_php' ) ); ?> value="1" id="sbhookit_sb_after_content_php" name="sbhookit_sb_after_content_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h2 id="loop"><?php _e( 'Loop', 'sbhookit' ); ?></h2></th>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_before_post"><?php _e( 'sb_before_post', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_before_post</code></legend>
			<p><label for="sb_before_post"><?php printf( __( 'Just before .post', 'sbhookit' ), '<code>sb_before_post</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_before_post" name="sbhookit_sb_before_post" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_before_post' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_before_post_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_before_post_php' ) ); ?> value="1" id="sbhookit_sb_before_post_php" name="sbhookit_sb_before_post_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_after_post"><?php _e( 'sb_after_post', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_after_post</code></legend>
			<p><label for="sb_after_post"><?php printf( __( 'Just after .post', 'sbhookit' ), '<code>sb_after_post</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_after_post" name="sbhookit_sb_after_post" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_after_post' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_after_post_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_after_post_php' ) ); ?> value="1" id="sbhookit_sb_after_post_php" name="sbhookit_sb_after_post_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_before_first_post"><?php _e( 'sb_before_first_post', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_before_first_post</code></legend>
			<p><label for="sb_before_first_post"><?php printf( __( 'Just before .post (only for first post in loop)', 'sbhookit' ), '<code>sb_before_first_post</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_before_first_post" name="sbhookit_sb_before_first_post" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_before_first_post' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_before_first_post_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_before_first_post_php' ) ); ?> value="1" id="sbhookit_sb_before_first_post_php" name="sbhookit_sb_before_first_post_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_after_first_post"><?php _e( 'sb_after_first_post', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_after_first_post</code></legend>
			<p><label for="sb_after_first_post"><?php printf( __( 'Just after .post (only for first post in loop)', 'sbhookit' ), '<code>sb_after_first_post</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_after_first_post" name="sbhookit_sb_after_first_post" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_after_first_post' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_after_first_post_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_after_first_post_php' ) ); ?> value="1" id="sbhookit_sb_after_first_post_php" name="sbhookit_sb_after_first_post_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h2 id="loopsinglephp"><?php _e( 'Loop and Single', 'sbhookit' ); ?></h2></th>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_post_header"><?php _e( 'sb_post_header', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_post_header</code></legend>
			<p><label for="sb_post_header"><?php printf( __( 'Inside div .entry-meta', 'sbhookit' ), '<code>sb_post_header</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_post_header" name="sbhookit_sb_post_header" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_post_header' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_post_header_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_post_header_php' ) ); ?> value="1" id="sbhookit_sb_post_header_php" name="sbhookit_sb_post_header_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_before_post_content"><?php _e( 'sb_before_post_content', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_before_post_content</code></legend>
			<p><label for="sb_before_post_content"><?php printf( __( 'After .entry-header and before .entry-content', 'sbhookit' ), '<code>sb_before_post_content</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_before_post_content" name="sbhookit_sb_before_post_content" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_before_post_content' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_before_post_content_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_before_post_content_php' ) ); ?> value="1" id="sbhookit_sb_before_post_content_php" name="sbhookit_sb_before_post_content_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_after_post_content"><?php _e( 'sb_after_post_content', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_after_post_content</code></legend>
			<p><label for="sb_after_post_content"><?php printf( __( 'After .entry-content and before .entry-footer', 'sbhookit' ), '<code>sb_after_post_content</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_after_post_content" name="sbhookit_sb_after_post_content" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_after_post_content' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_after_post_content_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_after_post_content_php' ) ); ?> value="1" id="sbhookit_sb_after_post_content_php" name="sbhookit_sb_after_post_content_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_post_footer"><?php _e( 'sb_post_footer', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_post_footer</code></legend>
			<p><label for="sb_post_footer"><?php printf( __( 'Inside dev .entry-footer', 'sbhookit' ), '<code>sb_post_footer</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_post_footer" name="sbhookit_sb_post_footer" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_post_footer' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_post_footer_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_post_footer_php' ) ); ?> value="1" id="sbhookit_sb_post_footer_php" name="sbhookit_sb_post_footer_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h2 id="adminphp"><?php _e( 'Admin.php Hooks', 'sbhookit' ); ?></h2></th>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_admin_left"><?php _e( 'sb_admin_left', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_admin_left</code></legend>
			<p><label for="sb_admin_left"><?php printf( __( 'Left column admin panels', 'sbhookit' ), '<code>sb_admin_left</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_admin_left" name="sbhookit_sb_admin_left" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_admin_left' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_admin_left_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_admin_left_php' ) ); ?> value="1" id="sbhookit_sb_admin_left_php" name="sbhookit_sb_admin_left_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_admin_right"><?php _e( 'sb_admin_right', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_admin_right</code></legend>
			<p><label for="sb_admin_right"><?php printf( __( 'Right column admin panels', 'sbhookit' ), '<code>sb_admin_right</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_admin_right" name="sbhookit_sb_admin_right" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_admin_right' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_admin_right_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_admin_right_php' ) ); ?> value="1" id="sbhookit_sb_admin_right_php" name="sbhookit_sb_admin_right_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h2 id="404php"><?php _e( '404 Hooks', 'sbhookit' ); ?></h2></th>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_404"><?php _e( 'sb_404', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_404</code></legend>
			<p><label for="sb_404"><?php printf( __( 'Creates content of 404 page, inside div .post', 'sbhookit' ), '<code>sb_404</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_404" name="sbhookit_sb_404" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_404' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_404_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_404_php' ) ); ?> value="1" id="sbhookit_sb_404_php" name="sbhookit_sb_404_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h2 id="sidebarphp"><?php _e( 'Sidebar.php Hooks', 'sbhookit' ); ?></h2></th>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_before_primary_widgets"><?php _e( 'sb_before_primary_widgets', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_before_primary_widgets</code></legend>
			<p><label for="sb_before_primary_widgets"><?php printf( __( 'Right after div #content and before div #primary', 'sbhookit' ), '<code>sb_before_primary_widgets</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_before_primary_widgets" name="sbhookit_sb_before_primary_widgets" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_before_primary_widgets' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_before_primary_widgets_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_before_primary_widgets_php' ) ); ?> value="1" id="sbhookit_sb_before_primary_widgets_php" name="sbhookit_sb_before_primary_widgets_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_between_primary_and_secondary_widgets"><?php _e( 'sb_between_primary_and_secondary_widgets', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_between_primary_and_secondary_widgets</code></legend>
			<p><label for="sb_between_primary_and_secondary_widgets"><?php printf( __( 'Between div #primary and div #secondary', 'sbhookit' ), '<code>sb_between_primary_and_secondary_widgets</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_between_primary_and_secondary_widgets" name="sbhookit_sb_between_primary_and_secondary_widgets" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_between_primary_and_secondary_widgets' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_between_primary_and_secondary_widgets_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_between_primary_and_secondary_widgets_php' ) ); ?> value="1" id="sbhookit_sb_between_primary_and_secondary_widgets_php" name="sbhookit_sb_between_primary_and_secondary_widgets_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_after_secondary_widgets"><?php _e( 'sb_after_secondary_widgets', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_after_secondary_widgets</code></legend>
			<p><label for="sb_after_secondary_widgets"><?php printf( __( 'Right after div #secondary', 'sbhookit' ), '<code>sb_after_secondary_widgets</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_after_secondary_widgets" name="sbhookit_sb_after_secondary_widgets" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_after_secondary_widgets' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_after_secondary_widgets_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_after_secondary_widgets_php' ) ); ?> value="1" id="sbhookit_sb_after_secondary_widgets_php" name="sbhookit_sb_after_secondary_widgets_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h2 id="sidebartertiaryphp"><?php _e( 'Sidebar-tertiary.php Hooks', 'sbhookit' ); ?></h2></th>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_before_tertiary_widgets"><?php _e( 'sb_before_tertiary_widgets', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_before_tertiary_widgets</code></legend>
			<p><label for="sb_before_tertiary_widgets"><?php printf( __( 'Right after div #content and before div #tertiary', 'sbhookit' ), '<code>sb_before_tertiary_widgets</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_before_tertiary_widgets" name="sbhookit_sb_before_tertiary_widgets" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_before_tertiary_widgets' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_before_tertiary_widgets_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_before_tertiary_widgets_php' ) ); ?> value="1" id="sbhookit_sb_before_tertiary_widgets_php" name="sbhookit_sb_before_tertiary_widgets_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_after_tertiary_widgets"><?php _e( 'sb_after_tertiary_widgets', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_after_tertiary_widgets</code></legend>
			<p><label for="sb_after_tertiary_widgets"><?php printf( __( 'Right after div #tertiary', 'sbhookit' ), '<code>sb_after_tertiary_widgets</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_after_tertiary_widgets" name="sbhookit_sb_after_tertiary_widgets" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_after_tertiary_widgets' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_after_tertiary_widgets_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_after_tertiary_widgets_php' ) ); ?> value="1" id="sbhookit_sb_after_tertiary_widgets_php" name="sbhookit_sb_after_tertiary_widgets_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h2 id="sidebarfooterphp"><?php _e( 'Sidebar-footer.php Hooks', 'sbhookit' ); ?></h2></th>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_before_footer_widgets"><?php _e( 'sb_before_footer_widgets', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_before_footer_widgets</code></legend>
			<p><label for="sb_before_footer_widgets"><?php printf( __( 'Inside div #footer and before div #footer_sidebar', 'sbhookit' ), '<code>sb_before_footer_widgets</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_before_footer_widgets" name="sbhookit_sb_before_footer_widgets" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_before_footer_widgets' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_before_footer_widgets_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_before_footer_widgets_php' ) ); ?> value="1" id="sbhookit_sb_before_footer_widgets_php" name="sbhookit_sb_before_footer_widgets_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_between_footer_widgets"><?php _e( 'sb_between_footer_widgets', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_between_footer_widgets</code></legend>
			<p><label for="sb_between_footer_widgets"><?php printf( __( 'Inside div #footer_sidebar and between each div .aside', 'sbhookit' ), '<code>sb_between_footer_widgets</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_between_footer_widgets" name="sbhookit_sb_between_footer_widgets" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_between_footer_widgets' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_between_footer_widgets_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_between_footer_widgets_php' ) ); ?> value="1" id="sbhookit_sb_between_footer_widgets_php" name="sbhookit_sb_between_footer_widgets_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_after_footer_widgets"><?php _e( 'sb_after_footer_widgets', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_after_footer_widgets</code></legend>
			<p><label for="sb_after_footer_widgets"><?php printf( __( 'Inside div #footer_sidebar and after div #footer_sidebar', 'sbhookit' ), '<code>sb_after_footer_widgets</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_after_footer_widgets" name="sbhookit_sb_after_footer_widgets" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_after_footer_widgets' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_after_footer_widgets_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_after_footer_widgets_php' ) ); ?> value="1" id="sbhookit_sb_after_footer_widgets_php" name="sbhookit_sb_after_footer_widgets_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h2 id="footerphp"><?php _e( 'Footer.php Hooks', 'sbhookit' ); ?></h2></th>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_between_content_and_footer"><?php _e( 'sb_between_content_and_footer', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_between_content_and_footer</code></legend>
			<p><label for="sb_between_content_and_footer"><?php printf( __( 'After div #wrap and before div #footer_wrap', 'sbhookit' ), '<code>sb_between_content_and_footer</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_between_content_and_footer" name="sbhookit_sb_between_content_and_footer" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_between_content_and_footer' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_between_content_and_footer_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_between_content_and_footer_php' ) ); ?> value="1" id="sbhookit_sb_between_content_and_footer_php" name="sbhookit_sb_between_content_and_footer_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_before_footer"><?php _e( 'sb_before_footer', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_before_footer</code></legend>
			<p><label for="sb_before_footer"><?php printf( __( 'Inside div #footer_wrap and before div #footer', 'sbhookit' ), '<code>sb_before_footer</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_before_footer" name="sbhookit_sb_before_footer" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_before_footer' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_before_footer_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_before_footer_php' ) ); ?> value="1" id="sbhookit_sb_before_footer_php" name="sbhookit_sb_before_footer_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_footer"><?php _e( 'sb_footer', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_footer</code></legend>
			<p><label for="sb_footer"><?php printf( __( 'Inside div #footer_wrap and after div #footer_sidebar', 'sbhookit' ), '<code>sb_footer</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_footer" name="sbhookit_sb_footer" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_footer' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_footer_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_footer_php' ) ); ?> value="1" id="sbhookit_sb_footer_php" name="sbhookit_sb_footer_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_after_footer"><?php _e( 'sb_after_footer', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_after_footer</code></legend>
			<p><label for="sb_after_footer"><?php printf( __( 'Inside div #footer_wrap and after div #footer', 'sbhookit' ), '<code>sb_after_footer</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_after_footer" name="sbhookit_sb_after_footer" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_after_footer' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_after_footer_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_after_footer_php' ) ); ?> value="1" id="sbhookit_sb_after_footer_php" name="sbhookit_sb_after_footer_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><h3 id="sb_after"><?php _e( 'sb_after', 'sbhookit' ); ?></h3></th>
	<td class="toggle-container">
		<fieldset>
			<legend class="hidden"><code>sb_after</code></legend>
			<p><label for="sb_after"><?php printf( __( 'The very last thing before the close body tag.', 'sbhookit' ), '<code>sb_after</code>' ); ?></label></p>
			<textarea id="sbhookit_sb_after" name="sbhookit_sb_after" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_sb_after' ); ?></textarea>
			<p>
				<label for="sbhookit_sb_after_php">
					<input<?php checked( '1', get_option( 'sbhookit_sb_after_php' ) ); ?> value="1" id="sbhookit_sb_after_php" name="sbhookit_sb_after_php" type="checkbox" />
						<?php _e( 'Execute <abbr title="PHP: Hyptertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
				</label>
			</p>
		</fieldset>
		<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
	</td>
</tr>



<tr valign="top">
	<th scope="row"><h2 id="wp_hooks"><?php _e( 'WordPress Hooks', 'sbhookit' ); ?></h2></th>
</tr>

<!-- wp_head -->
			<tr valign="top">
				<th scope="row"><h3 id="wp_head"><?php _e( 'WordPress Header', 'sbhookit' ); ?></h3></th>
				<td class="toggle-container">
					<fieldset>
						<legend class="hidden"><code>wordpress header</code></legend>
						<p><label for="sbhookit_wp_head"><?php printf( __( 'This is the generic <em>wp_head()</em> hook built into WordPress.', 'sbhookit' ), '<code>sbhookit_wp_head</code>' ); ?></label></p>
						<textarea id="sbhookit_wp_head" name="sbhookit_wp_head" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_wp_head' ); ?></textarea>
						<p>
							<label for="sbhookit_wp_head_php">
								<input<?php checked( '1', get_option( 'sbhookit_wp_head_php' ) ); ?> value="1" id="sbhookit_wp_head_php" name="sbhookit_wp_head_php" type="checkbox" />
								<?php _e( 'Execute <abbr title="PHP: Hypertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
							</label>
						</p>
					</fieldset>
					<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
				</td>
			</tr>
<!-- wp_footer -->
			<tr valign="top">
				<th scope="row"><h3 id="wp_footer"><?php _e( 'WordPress Footer', 'sbhookit' ); ?></h3></th>
				<td class="toggle-container">
					<fieldset>
						<legend class="hidden"><code>wordpress footer</code></legend>
						<p><label for="sbhookit_wp_head"><?php printf( __( 'This is the generic <em>wp_footer()</em> hook built into WordPress.', 'sbhookit' ), '<code>sbhookit_wp_footer</code>' ); ?></label></p>
						<textarea id="sbhookit_wp_footer" name="sbhookit_wp_footer" rows="5" cols="50" class="large-text code"><?php sbhookit_option( 'sbhookit_wp_footer' ); ?></textarea>
						<p>
							<label for="sbhookit_wp_footer_php">
								<input<?php checked( '1', get_option( 'sbhookit_wp_footer_php' ) ); ?> value="1" id="sbhookit_wp_footer_php" name="sbhookit_wp_footer_php" type="checkbox" />
								<?php _e( 'Execute <abbr title="PHP: Hypertext Preprocessor">PHP</abbr> on this hook', 'sbhookit' ); ?>
							</label>
						</p>
					</fieldset>
					<p class="submit"><input type="submit" class="button-primary" value="<?php echo $save_button; ?>" /></p>
				</td>
			</tr>
		</table>
	</form>
	<form id="jumpbox">
		<fieldset class="jumpbox">
			<label for="f" class="hidden"><?php _e( 'Jump to a hook', 'sbhookit' ); ?>:</label>
			<select name="f" id="f" onchange="if(this.options[this.selectedIndex].value != -1) { window.location=this.options[this.selectedIndex].value }">
				<option value="-1"><?php _e( 'Jump to a hook', 'sbhookit' ); ?></option>
				<optgroup label="<?php _e( 'WordPress Hooks', 'sbhookit' ); ?>">
					<option value="#wp_head">wp_head()</option>
					<option value="#wp_footer">wp_footer()</option>
				</optgroup>
				<optgroup label="<?php _e( 'Header.php Hooks', 'sbhookit' ); ?>">
					<option value="#sb_before">sb_before()</option>
					<option value="#sb_before_header">sb_before_header()</option>
					<option value="#sb_header">sb_header()</option>
					<option value="#sb_after_header">sb_after_header()</option>
				</optgroup>
				<optgroup label="<?php _e( 'Front-page.php Hooks', 'sbhookit' ); ?>">
					<option value="#sb_before_featured">sb_before_featured()</option>
					<option value="#sb_featured">sb_featured()</option>
					<option value="#sb_after_featured">sb_after_featured()</option>
					<option value="#sb_home">sb_home()</option>
				</optgroup>
				<optgroup label="<?php _e( 'Generic Template Hooks', 'sbhookit' ); ?>">
					<option value="#sb_before_content">sb_before_content()</option>
					<option value="#sb_after_content">sb_after_content()</option>
				</optgroup>
				<optgroup label="<?php _e( 'Loop.php Hooks', 'sbhookit' ); ?>">
					<option value="#sb_before_post">sb_before_post()</option>
					<option value="#sb_after_post">sb_after_post()</option>
					<option value="#sb_before_first_post">sb_before_first_post()</option>
					<option value="#sb_after_first_post">sb_after_first_post()</option>
				</optgroup>
				<optgroup label="<?php _e( 'Loop and Single.php Hooks', 'sbhookit' ); ?>">
					<option value="#sb_before_post">sb_before_post()</option>
					<option value="#sb_post_header">sb_post_header()</option>
					<option value="#sb_before_post_content">sb_before_post_content()</option>
					<option value="#sb_after_post_content">sb_after_post_contnet()</option>
					<option value="#sp_post_footer">sb_post_footer()</option>
				</optgroup>
				<optgroup label="<?php _e( 'Admin.php Hooks', 'sbhookit' ); ?>">
					<option value="#sb_admin_left">sb_admin_left()</option>
					<option value="#sb_admin_right">sb_admin_right()</option>
				</optgroup>
				<optgroup label="<?php _e( '404.php Hooks', 'sbhookit' ); ?>">
					<option value="#sb_404">sb_404()</option>
				</optgroup>
				<optgroup label="<?php _e( 'Sidebar.php Hooks', 'sbhookit' ); ?>">
					<option value="#sb_before_primary_widgets">sb_before_primary_widgets()</option>
					<option value="#sb_between_primary_and_secondary_widgets">sb_between_primary_and_secondary_widgets()</option>
					<option value="#sb_after_secondary_widgets">sb_after_secondary_widgets()</option>
				</optgroup>
				<optgroup label="<?php _e( 'Sidebar-tertiary.php Hooks', 'sbhookit' ); ?>">
					<option value="#sb_before_tertiary_widgets">sb_before_tertiary_widgets()</option>
					<option value="#sb_after_tertiary_widgets">sb_after_tertiary_widgets()</option>
				</optgroup>
				<optgroup label="<?php _e( 'Sidebar-footer.php Hooks', 'sbhookit' ); ?>">
					<option value="#sb_before_footer_widgets">sb_before_footer_widgets()</option>
					<option value="#sb_between_footer_widgets">sb_between_footer_widgets()</option>
					<option value="#sb_after_footer_widgets">sb_after_footer_widgets()</option>
				</optgroup>
				<optgroup label="<?php _e( 'Footer.php Hooks', 'sbhookit' ); ?>">
					<option value="#sb_between_content_and_footer">sb_between_content_and_footer()</option>
					<option value="#sb_before_footer">sb_before_footer()</option>
					<option value="#sb_footer">sb_footer()</option>
					<option value="#sb_after_footer">sb_after_footer()</option>
					<option value="#sb_after">sb_after()</option>
				</optgroup>

			</select>
		</fieldset>
	</form>
</div>
