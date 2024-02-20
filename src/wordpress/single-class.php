<?php get_header(); ?>
<div class="banner">
  <div class="image" style="background-image: url('<?php the_post_thumbnail_url() ?>')">
  </div>
</div>
<section class="section">
  <div class="mb-10 text-[#949494]">
    <a href="/education" class="!text-[#949494]">Education</a> /
    <?php $post_categories = get_the_category();
    if ($post_categories) {
      foreach ($post_categories as $category) {
        echo '<a class="!text-[#949494]" href="/education?category=' . $category->slug . '">' . $category->name . '</a>';
      }
    } ?> /
    <?php the_title(); ?>
  </div>
  <h1 class="my-8"><?php the_title(); ?></h1>
  <?php the_content(); ?>
  <?php if (get_field('register_button_link')) : ?>
    <a href="<?php echo get_field('register_button_link'); ?>" class="button">
      <?php echo get_field('register_button_text') ?: 'Register'; ?>
    </a>
  <?php endif; ?>
  <p>
    <a href="/calendar" class="button-outline">View calendar</a>
  </p>
</section>
<?php get_footer(); ?>