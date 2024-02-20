<?php
get_header();
get_template_part(
  'templates/content',
  'listing',
  array(
    'post_type' => 'team',
    'categories'  => ['staff', 'dancer', 'artistic-team', 'board'],
    'default_category' => 'staff',
    'form_url' => '/our-team',
    'read_more' => ['Read full bio', 'Read full bio', 'Read full bio', 'Read full bio']
  )
); ?>
<section class="section text-center">
  <a href="/contact" class="button !bg-[#272727]">Join the team</a>
</section>
<section>
  <?php the_content(); ?>
</section>
<?php get_footer(); ?>