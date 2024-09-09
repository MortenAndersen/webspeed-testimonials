<?php

// Arkiv

add_action( 'init', 'webspeed_create_posttype_testimonials' );

function webspeed_create_posttype_testimonials() {
	register_post_type(
	    'testimonials',
	    array(
	    	'labels' => array(
	    		'name' => __('Testimonials', 'websepeed-testimonials-domain'),
	    		'singular_name' => __('Testimonial', 'websepeed-testimonials-domain')
	    	),
	    	'public' => true,
	    	'exclude_from_search' => true,
			'show_in_nav_menus'   => false,
			'publicly_queryable'  => false,
			'query_var'           => false,
	    	'menu_icon' => 'dashicons-archive',
	    	'supports' => array(
	    		'title',
          'editor',
          'excerpt',
          'thumbnail',
	    		'page-attributes'
	    	),
	    	'show_in_rest' => true,
	    	'rewrite' => array(
	    		'slug' => 'testimonial'
	    	),
	    )
	);

}

function webspeed_testimonials_posttype_function() {
	webspeed_create_posttype_testimonials();
}

register_activation_hook( __FILE__, 'webspeed_testimonials_posttype_function' );
