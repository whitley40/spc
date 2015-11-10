<?php

//adding support

add_theme_support('menus');
add_theme_support('post-thumbnails');


//register the main menu

function register_theme_menus() {

  register_nav_menus (
    array (
        'primary-menu' => __('Primary Menu')
      )
  );

}
add_action('init', 'register_theme_menus');



//spc styling

function spc_theme_styles() {
  wp_enqueue_style('style_css', get_template_directory_uri() . '/style.css');
}

add_action( 'wp_enqueue_scripts', 'spc_theme_styles');

//spc javascript

function spc_theme_js(){

  wp_enqueue_script('functions_js', get_template_directory_uri() . '/js/functions.js', array('jquery'),'', true);


}

add_action('wp_enqueue_scripts', 'spc_theme_js');

//register some widgets

// function spc_create_widget( $name, $id, $description ) {

//   register_sidebar(array(
//     'name' => __( $name ),   
//     'id' => $id, 
//     'description' => __( $description ),
//     'before_widget' => '<div class="widget">',
//     'after_widget' => '</div>',
//     'before_title' => '<h2 class="module-heading">',
//     'after_title' => '</h2>'  
//   ));

// }

// spc_create_widget( 'Hompage Right Column', 'homepage', 'Displays on the homepage right column' );

// ------------

// control the length of the exerpt
// function saj_excerpt_length( $length ) {
//   return 25;
// }
// add_filter( 'excerpt_length', 'saj_excerpt_length', 999 );



//add in svg functionality

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');







?>





