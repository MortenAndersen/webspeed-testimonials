<?php
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Testimonials Indstillinger',
        'menu_title'    => 'Testimonials settings',
        'menu_slug'     => 'testimonials',
        'capability'    => 'edit_posts',
       
    ));
    
}
