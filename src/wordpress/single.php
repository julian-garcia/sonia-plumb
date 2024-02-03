<?php get_header(); ?>
<section class="section">
  <h1 class="my-8"><?php the_title(); ?></h1>
  <?php if (get_field("position")) : ?>
    <p class="text-[#949494]"><?php echo get_field("position"); ?></p>
  <?php endif; ?>
  <?php the_content(); ?>
</section>
<?php get_footer(); ?>