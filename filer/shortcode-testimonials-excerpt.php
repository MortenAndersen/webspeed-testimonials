<?php

/* -------------------------------------- */
/* -------------------------------------- */
add_shortcode('testimonials-excerpt', 'webspeed_testimonials_excerpt');
function webspeed_testimonials_excerpt($atts) {
	global $post;
	ob_start();

	// define attributes and their defaults
	extract(shortcode_atts(array('grid' => '3', 'gap' => '0', 'class' => 'no-class', 'number'  => '1', 'offset' => '0'), $atts));

	require get_parent_theme_file_path('/inc/grid-gap.php');

/* -------------------------------------- */

	$loop = new WP_Query(array(
		'post_type' => 'testimonials',
		'order' => 'ASC',
		'posts_per_page' => $number,
    'offset' => $offset,
	)
	);

/* -------------------------------------- */
if ( get_field('testimonials_oversigt', 'option') ) {
  $side = get_permalink(get_field('testimonials_oversigt', 'option'));
} else {
  $side ='/';
}

	if ($loop->have_posts()) {
      echo '<div class="grid testimonial-excerpt' . $grid_class . $gap_class . $class . '">';
      while ($loop->have_posts()): $loop->the_post();
        echo '<div class="testimonial-excerpt_item">';
          echo '<div class="excerpt">';
            the_excerpt();
          echo '</div>';
          echo '<a href="' . $side . '/#id-' . get_the_ID() . '">Læs mere</a>';
        echo '</div>';
      endwhile;
      echo '</div>';
		wp_reset_query();
  }


	$myvariable = ob_get_clean();
	return $myvariable;
}
