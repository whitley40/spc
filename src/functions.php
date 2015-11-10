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



//add in svg functionality

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');





?>