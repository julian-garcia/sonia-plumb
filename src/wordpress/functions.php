<?php

function theme_scripts()
{
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('sonia-plumb', get_template_directory_uri() . '/assets/{index.css}', '', $version);
  wp_enqueue_script('sonia-plumb', get_template_directory_uri() . '/assets/{index.js}', '', $version, true);
}

function setup_menus()
{
  $locations = array(
    'primary' => 'Main Menu',
    'contact'  => 'Contact Menu',
  );
  register_nav_menus($locations);
}

function page_excerpt()
{
  add_post_type_support('page', 'excerpt');
}

function slide_post_type()
{
  register_post_type(
    'slide',
    array(
      'rewrite' => array('slug' => 'slide'),
      'labels' => array(
        'name' => 'Hero Slides',
        'singular_name' => 'Slide',
        'add_new_item' => 'Add New Slide',
        'edit_item' => 'Edit Slide'
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

function works_post_type()
{
  register_post_type(
    'works',
    array(
      'rewrite' => array('slug' => 'stage'),
      'labels' => array(
        'name' => 'Stage',
        'singular_name' => 'Work',
        'add_new_item' => 'Add New Work',
        'edit_item' => 'Edit Work'
      ),
      'menu_icon' => 'dashicons-portfolio',
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => true,
      'taxonomies'  => array('category'),
      'supports' => array(
        'title', 'editor', 'thumbnail', 'excerpt'
      )
    )
  );
}

function team_post_type()
{
  register_post_type(
    'team',
    array(
      'rewrite' => array('slug' => 'team'),
      'labels' => array(
        'name' => 'Team Members',
        'singular_name' => 'Team Member',
        'add_new_item' => 'Add New Team Member',
        'edit_item' => 'Edit Team Member'
      ),
      'menu_icon' => 'dashicons-groups',
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => true,
      'supports' => array(
        'title', 'editor', 'thumbnail', 'excerpt'
      )
    )
  );
}

function event_post_type()
{
  register_post_type(
    'event',
    array(
      'rewrite' => array('slug' => 'event'),
      'labels' => array(
        'name' => 'Events',
        'singular_name' => 'Event',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event'
      ),
      'menu_icon' => 'dashicons-calendar',
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => true,
      'taxonomies'  => array('category'),
      'supports' => array(
        'title', 'editor', 'thumbnail', 'excerpt'
      )
    )
  );
}

function testimonial_post_type()
{
  register_post_type(
    'testimonial',
    array(
      'rewrite' => array('slug' => 'testimonial'),
      'labels' => array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial'
      ),
      'menu_icon' => 'dashicons-format-quote',
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => true,
      'supports' => array(
        'title', 'editor'
      )
    )
  );
}

function section_shortcode($_, $content = null)
{
  $args = array(
    'content' => $content
  );
  ob_start();
  get_template_part('templates/content', 'section', $args);
  return ob_get_clean();
}

function works_shortcode()
{
  ob_start();
  get_template_part('templates/content', 'works');
  return ob_get_clean();
}

function shortcode_empty_paragraph_fix($content)
{
  $array = array(
    '<p>['    => '[',
    ']</p>'   => ']',
    ']<br />' => ']'
  );
  return strtr($content, $array);
}

add_action('wp_enqueue_scripts', 'theme_scripts');
add_action('init', 'setup_menus');
add_action('init', 'page_excerpt');
add_action('init', 'slide_post_type');
add_action('init', 'works_post_type');
add_action('init', 'team_post_type');
add_action('init', 'event_post_type');
add_action('init', 'testimonial_post_type');
add_shortcode('section', 'section_shortcode');
add_shortcode('works', 'works_shortcode');
add_theme_support('post-thumbnails');
add_filter('the_content', 'shortcode_empty_paragraph_fix');
