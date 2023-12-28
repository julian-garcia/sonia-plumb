<?php

function theme_scripts() {
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('sonia-plumb', get_template_directory_uri() . '/assets/{index.css}' , '', $version);
  wp_enqueue_script('sonia-plumb', get_template_directory_uri() . '/assets/{index.js}', '', $version, true);
}

function setup_menus() {
  $locations = array(
    'primary' => 'Main Menu',
    'contact'  => 'Contact Menu',
  );
  register_nav_menus($locations);
}

function page_excerpt() {
  add_post_type_support( 'page', 'excerpt' );
}

function performance_post_type() {
  register_post_type('performance',
    array(
      'rewrite' => array('slug' => 'performance'),
      'labels' => array(
        'name' => 'Performances',
        'singular_name' => 'Performance',
        'add_new_item' => 'Add New Performance',
        'edit_item' => 'Edit Performance'
      ),
      'menu_icon' => 'dashicons-megaphone',
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => false,
      'supports' => array(
        'title', 'editor', 'thumbnail', 'excerpt'
      )
    )
  );
}

function works_post_type() {
  register_post_type('works',
    array(
      'rewrite' => array('slug' => 'works'),
      'labels' => array(
        'name' => 'Works',
        'singular_name' => 'Work',
        'add_new_item' => 'Add New Work',
        'edit_item' => 'Edit Work'
      ),
      'menu_icon' => 'dashicons-portfolio',
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => false,
      'supports' => array(
        'title', 'editor', 'thumbnail', 'excerpt'
      )
    )
  );
}

function section_shortcode($atts, $content = null) {
  $default = array(
    'align' => 'left',
  );
  $a = shortcode_atts($default, $atts);
  $args = array(
    'align' => $a['align'],
    'content' => $content
  );
  ob_start();
  get_template_part('templates/content', 'section', $args);
  return ob_get_clean();
}

function works_shortcode() {
  ob_start();
  get_template_part('templates/content', 'works');
  return ob_get_clean();
}

function shortcode_empty_paragraph_fix( $content ) {
  $array = array(
    '<p>['    => '[',
    ']</p>'   => ']',
    ']<br />' => ']'
  );
  return strtr( $content, $array );
}

add_action('wp_enqueue_scripts', 'theme_scripts');
add_action( 'init', 'setup_menus' );
add_action( 'init', 'page_excerpt' );
add_action( 'init', 'performance_post_type' );
add_action( 'init', 'works_post_type' );
add_shortcode('section', 'section_shortcode');
add_shortcode('works', 'works_shortcode');
add_theme_support( 'post-thumbnails' );
add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );

