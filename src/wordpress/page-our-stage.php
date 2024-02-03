<?php get_header();
get_template_part(
  'templates/content',
  'listing',
  array(
    'post_type' => 'works',
    'categories'  => ['current', 'work-in-progress', 'repertory'],
    'default_category' => 'repertory',
    'form_url' => '/our-stage',
    'read_more' => 'Learn more'
  )
); ?>
<?php the_content(); ?>
<?php get_footer(); ?>
