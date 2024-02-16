<?php

function theme_scripts()
{
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('sonia-plumb', get_template_directory_uri() . '/assets/{index.css}', '', $version);
  wp_enqueue_script('polyfill', 'https://polyfill.io/v3/polyfill.min.js', '', $version, true);
  wp_enqueue_script('sonia-plumb', get_template_directory_uri() . '/assets/{index.js}', '', $version, true);
}

function setup_menus()
{
  $locations = array(
    'primary' => 'Main Menu',
    'contact'  => 'Contact Menu',
    'footer'  => 'Footer Menu',
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
        'add_new' => 'Add New Work',
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

function class_post_type()
{
  register_post_type(
    'class',
    array(
      'rewrite' => array('slug' => 'class'),
      'labels' => array(
        'name' => 'Classes',
        'singular_name' => 'Class',
        'add_new' => 'Add New Class',
        'add_new_item' => 'Add New Class',
        'edit_item' => 'Edit Class'
      ),
      'menu_icon' => 'dashicons-welcome-learn-more
      ',
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
        'add_new' => 'Add New Team Member',
        'add_new_item' => 'Add New Team Member',
        'edit_item' => 'Edit Team Member'
      ),
      'menu_icon' => 'dashicons-groups',
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => true,
      'taxonomies' => array('category'),
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
        'add_new' => 'Add New Event',
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
        'add_new' => 'Add New Testimonial',
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

function timeline_post_type()
{
  register_post_type(
    'timeline',
    array(
      'rewrite' => array('slug' => 'timeline'),
      'labels' => array(
        'name' => 'Timeline Event',
        'singular_name' => 'Timeline Event',
        'add_new' => 'Add New Timeline Event',
        'add_new_item' => 'Add New Timeline Event',
        'edit_item' => 'Edit Timeline Event'
      ),
      'menu_icon' => 'dashicons-ellipsis',
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => true,
      'supports' => array(
        'title', 'editor'
      )
    )
  );
}

function partnership_post_type()
{
  register_post_type(
    'partnership',
    array(
      'rewrite' => array('slug' => 'partnership'),
      'labels' => array(
        'name' => 'Partnership',
        'singular_name' => 'Partnership',
        'add_new' => 'Add New Partnership',
        'add_new_item' => 'Add New Partnership',
        'edit_item' => 'Edit Partnership'
      ),
      'menu_icon' => 'dashicons-networking',
      'public' => true,
      'has_archive' => false,
      'show_in_rest' => true,
      'supports' => array(
        'title', 'editor'
      )
    )
  );
}

function section_shortcode($_atts, $content = null)
{
  $defaults = array(
    'class_name' => '',
  );
  $atts = shortcode_atts($defaults, $_atts);
  $args = array(
    'content' => $content,
    'class_name' => $atts['class_name']
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

function social_shortcode()
{
  ob_start();
  get_template_part('templates/content', 'social');
  return ob_get_clean();
}

function timeline_shortcode()
{
  ob_start();
  get_template_part('templates/content', 'timeline');
  return ob_get_clean();
}

function partnerships_shortcode()
{
  ob_start();
  get_template_part(
    'templates/content',
    'listing',
    array(
      'post_type' => 'partnership',
      'form_url' => '/partnerships',
      'default_category' => '',
      'categories'  => [],
      'posts_page' => 5
    )
  );
  return ob_get_clean();
}

function events_shortcode($_atts)
{
  $defaults = array(
    'future' => '',
  );
  $atts = shortcode_atts($defaults, $_atts);
  ob_start();
  get_template_part(
    'templates/content',
    'events',
    array(
      'future' => $atts['future']
    )
  );
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
add_action('init', 'timeline_post_type');
add_action('init', 'class_post_type');
add_action('init', 'partnership_post_type');
add_shortcode('section', 'section_shortcode');
add_shortcode('works', 'works_shortcode');
add_shortcode('social', 'social_shortcode');
add_shortcode('timeline', 'timeline_shortcode');
add_shortcode('partnerships', 'partnerships_shortcode');
add_shortcode('events', 'events_shortcode');
add_theme_support('post-thumbnails');
add_filter('the_content', 'shortcode_empty_paragraph_fix');
