<?php
/*
Plugin Name: Startbox Easy Hooks
Plugin URI: http://wpstudio.com
Description: This plugin allows you to insert any content into the many hooks that the Startbox provides, without editing any files! Based on Thesis OpenHook & K2 Hook Up and GPLed.
Version: 0.2.5
Author: Benjamin Bradley
Author URI: http://www.benjaminbradley.com/

/**
 * Copyright 2010 Benjamin Bradley  (email: benjaminwbradley@gmail.com)
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
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Localization.
load_plugin_textdomain('sbhookit', FALSE, dirname(__FILE__));

// Define our functions, hook/unhook all our actions.
include('functions.php');
include('actions.php');

?>