<?php
get_header();
get_template_part(
  'templates/content',
  'listing',
  array(
    'post_type' => 'team',
    'categories'  => ['dancer', 'artistic-team'],
    'default_category' => 'dancer',
    'form_url' => '/our-team',
    'read_more' => 'Read full bio'
  )
); ?>
<section class="section text-center">
  <a href="/contact" class="button !bg-[#272727]">Join the team</a>
</section>
<section>
  <?php the_content(); ?>
</section>
<?php get_footer(); ?>