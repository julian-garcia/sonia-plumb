<?php get_header();
get_template_part(
  'templates/content',
  'listing',
  array(
    'post_type' => 'class',
    'categories'  => ['class', 'workshop', 'classroom'],
    'default_category' => 'classroom',
    'form_url' => '/education',
    'read_more' => 'Bring us to your classroom'
  )
); ?>
<?php the_content(); ?>
<?php get_footer(); ?>
