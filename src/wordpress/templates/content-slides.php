<?php
$the_query = new WP_Query(
  array(
    'post_type' => 'slide',
    'posts_per_page' => '6'
  )
);
if ($the_query->have_posts()) : ?>
  <div class="swiper slider swiper-slides">
    <div class="swiper-wrapper">
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="swiper-slide">
          <div class="image" style="background-image: url('<?php the_post_thumbnail_url() ?>')"></div>
          <div id="hoverImage"></div>
          <div class="slide-title">
            <p class="text-xl font-bold m-0"><?php echo get_the_excerpt(); ?></p>
            <h1><?php the_title(); ?></h1>
            <?php if (get_field("slide_link")) : ?>
              <a href="<?php echo get_field("slide_link"); ?>" class="absolute w-full h-full top-0 left-0 z-30" aria-label="<?php the_title(); ?>"></a>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
  </div>
<?php endif; ?>