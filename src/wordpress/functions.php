<?php

function theme_scripts() {
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('sonia-plumb', get_template_directory_uri() . '/assets/{index.css}' , '', $version);
  // wp_enqueue_script('sonia-plumb', get_template_directory_uri() . '/assets/main.js', '', $version, true);
}

function setup_menus() {
  $locations = array(
    'primary' => 'Main Menu',
    'footer_sitemap'  => 'Footer Menu Sitemap',
    'footer_info'  => 'Footer Menu Info',
  );
  register_nav_menus($locations);
}

function page_excerpt() {
  add_post_type_support( 'page', 'excerpt' );
}

add_action('wp_enqueue_scripts', 'theme_scripts');
add_action( 'init', 'setup_menus' );
add_action( 'init', 'page_excerpt' );
add_theme_support( 'post-thumbnails' );
