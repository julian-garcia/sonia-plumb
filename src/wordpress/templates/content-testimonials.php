<?php
$the_query = new WP_Query(
  array(
    'post_type' => 'testimonial',
    'post_status' => 'publish',
    'meta_query'  => array(
      array(
        'key' => 'stage',
        'value'   => get_the_ID(),
        'compare' => '='
      )
    ),
  )
);
if ($the_query->have_posts()) : ?>
  <div class="swiper slider testimonials">
    <div class="swiper-wrapper">
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="swiper-slide">
          <h4 class="quote">
            <?php echo wp_strip_all_tags(get_the_content()); ?>
          </h4>
          <p class="author"><?php the_title(); ?></p>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php endwhile; ?>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
  </div>
  <hr>
<?php endif; ?>