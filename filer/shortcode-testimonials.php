<?php

/* -------------------------------------- */
/* -------------------------------------- */
add_shortcode('testimonials', 'webspeed_testimonials');
function webspeed_testimonials($atts) {
	global $post;
	ob_start();

	// define attributes and their defaults
	extract(shortcode_atts(array('grid' => '1', 'gap' => '0', 'class' => 'no-class'), $atts));

	require get_parent_theme_file_path('/inc/grid-gap.php');

/* -------------------------------------- */

	$loop = new WP_Query(array(
		'post_type' => 'testimonials',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => -1,
	)
	);

/* -------------------------------------- */

	if ($loop->have_posts()) {
    echo '<div class="grid' . $grid_class . $gap_class . $class . '">';
		while ($loop->have_posts()): $loop->the_post();
      echo '<div id="id-' . get_the_id() . '" class="testimonial">';
      web_img();
        the_content();
        echo '<div class="testimonial-navn">';
          
          echo '<strong>' . get_the_title() . '</strong><br />';

          if( get_field('titel') && get_field('organisation') ) {
            echo get_field('organisation');
            echo ' - (<em>' . get_field('titel') . '</em>)';
          } elseif(get_field('organisation')) {
            the_field('organisation');
          }
         
          
          web_edit_link();
        echo '</div>';
      echo '</div>';
		endwhile;
    echo '</div>';
		wp_reset_query();
  }


	$myvariable = ob_get_clean();
	return $myvariable;
}
/* -------------------------------------- */
/* -------------------------------------- */