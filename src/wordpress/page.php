<?php get_header(); ?>
<div class="banner">
  <div class="image"
    style="background-image: url('<?php the_post_thumbnail_url() ?>')">
  </div>
  <h1><?php the_title(); ?></h1>
</div>
<section class="section">
  <?php the_content(); ?>
</section>
<?php get_footer(); ?>
