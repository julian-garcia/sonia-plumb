<?php get_header(); ?>
<?php if (get_post_thumbnail_id()) : ?>
  <div class="banner">
    <div class="image" style="background-image: url('<?php the_post_thumbnail_url() ?>')">
    </div>
    <h1><?php the_title(); ?></h1>
  </div>
<?php endif; ?>
<section class="section">
  <?php if (!get_post_thumbnail_id()) : ?>
    <h1 class="my-8"><?php the_title(); ?></h1>
  <?php endif; ?>
  <?php if (get_field('weekday')) {
    get_template_part('templates/content', 'contact');
  } ?>
  <?php the_content(); ?>
</section>
<?php get_footer(); ?>