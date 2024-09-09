<?php
/*
Plugin Name: Webspeed Testimonials
Version: 1.0
Plugin URI: https://www.hjemmesider.dk
Description: Testimonials. Requirements: Advanced Custom Fields PRO
Author: Morten Andersen
Text Domain: websepeed-testimonials-domain
Author URI: https://www.hjemmesider.dk
*/

if( class_exists('ACF') ) {
	require_once ('filer/posttype.php');
	require_once ('filer/acf.php');
  require_once ('filer/testimonials-admin.php');
	require_once ('filer/shortcode-testimonials.php');
  require_once ('filer/shortcode-testimonials-excerpt.php');
}