<?php
$the_query = new WP_Query(
  array(
    'post_type' => 'works',
    'posts_per_page' => '6'
  )
);
if ($the_query->have_posts()) : ?>
  <div class="swiper slider swiper-works">
    <div class="swiper-wrapper">
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="swiper-slide card">
          <div class="works-text flex flex-col">
            <h3><?php the_title(); ?></h3>
            <p class="flex-grow"><?php echo get_the_excerpt(); ?></p>
            <?php if (get_field("works_link")) : ?>
              <a href="<?php echo get_field("works_link"); ?>" class="button-outline w-max z-10">
                <?php echo get_field("works_text"); ?>
              </a>
            <?php endif; ?>
          </div>
          <div class="works-image" style="background-image: url('<?php the_post_thumbnail_url() ?>')"></div>
          <a class="absolute w-full h-full" href="<?php the_permalink(); ?>"></a>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php endwhile; ?>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
  </div>
<?php endif; ?>