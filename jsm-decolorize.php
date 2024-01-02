<?php
/*
 * Plugin Name: JSM Decolorize Menu Icons
 * Text Domain: jsm-decolorize
 * Domain Path: /languages
 * Plugin URI: https://surniaulula.com/extend/plugins/jsm-decolorize/
 * Assets URI: https://jsmoriss.github.io/jsm-decolorize/assets/
 * Author: JS Morisset
 * Author URI: https://surniaulula.com/
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Description: A simple plugin to decolorize the colorful admin menu icons added by some plugins.
 * Requires PHP: 7.2.34
 * Requires At Least: 5.5
 * Tested Up To: 6.4.2
 * Version: 1.0.0
 *
 * Version Numbering: {major}.{minor}.{bugfix}[-{stage}.{level}]
 *
 *      {major}         Major structural code changes and/or incompatible API changes (ie. breaking changes).
 *      {minor}         New functionality was added or improved in a backwards-compatible manner.
 *      {bugfix}        Backwards-compatible bug fixes or small improvements.
 *      {stage}.{level} Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).
 *
 * Copyright 2017-2024 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {

	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'JsmDecolorize' ) ) {

	class JsmDecolorize {

		private static $instance = null;	// JsmDecolorize class object.

		public function __construct() {

			if ( is_admin() ) {

				add_action( 'admin_enqueue_scripts', array( __CLASS__, 'admin_menu_inline_style' ) );
			}
		}

		public static function &get_instance() {

			if ( null === self::$instance ) {

				self::$instance = new self;
			}

			return self::$instance;
		}

		public static function admin_menu_inline_style() {

			$custom_css = '#adminmenu li.menu-top a img { -webkit-filter:grayscale(100%); filter:grayscale(100%); }';

			wp_add_inline_style( 'admin-menu', $custom_css );
		}
	}

	JsmDecolorize::get_instance();
}
