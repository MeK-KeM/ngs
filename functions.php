<?php
/* 1. CONSTANTS */
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'CSS', THEMEROOT . '/css' );
define( 'JS', THEMEROOT . '/js' );
define( 'IMG', THEMEROOT . '/img' );

/* 2. ACF options page */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();  
}
if (function_exists('acf_set_options_page_menu')){
  acf_set_options_page_menu('Theme Name');
}

/* 3. Menu walker */
require_once('bs4navwalker.php');
register_nav_menus( array(
  'headermenu' => 'Header Menu',
) );

/* 4. Styles and scripts */
function theme_scripts() {
  wp_enqueue_style( 'add-css', CSS . '/add.css' );

  wp_enqueue_script( 'scripts', JS . '/main.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/* 5. Additional functions */
//comments_template();
add_theme_support('post-thumbnails');
add_image_size( 'blog', 389, 347, true );

/*Cut posts*/
function do_excerpt($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if (count($words) > $word_limit)
  array_pop($words);
  echo implode(' ', $words).' ...';
}

// excerpt length 20 words
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Hide Posts
function remove_menus(){
  remove_menu_page( 'edit-comments.php' ); 
  //remove_menu_page( 'edit.php' ); 
}
add_action( 'admin_menu', 'remove_menus' );

// SVG support
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// ACF Google Map API Key
function my_acf_init() {
    acf_update_setting('google_api_key', 'xxx');
}
add_action('acf/init', 'my_acf_init');