<?php get_header();
get_template_part(
  'templates/content',
  'listing',
  array(
    'post_type' => 'class',
    'categories'  => ['class', 'workshop', 'classroom', 'contextual-dance'],
    'default_category' => 'workshop',
    'form_url' => '/education',
    'read_more' => ['Learn more', 'Learn more', 'Bring us to your classroom', 'Contact us']
  )
); ?>
<?php the_content(); ?>
<?php get_footer(); ?>
