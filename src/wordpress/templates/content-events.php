<?php
$meta_query = array(array(
  'key' => 'event_date',
  'value'   => date('Ymd'),
  'compare' => '<'
));
if ($args['future'] == 'true') {
  $meta_query = array(array(
    'key' => 'event_date',
    'value'   => date('Ymd'),
    'compare' => '>='
  ));
}
$the_query = new WP_Query(
  array(
    'post_type' => 'event',
    'post_status' => 'publish',
    'meta_query'  => $meta_query,
  )
);
if ($the_query->have_posts()) : ?>
  <div class="swiper events <?php echo $args['future'] == 'true' ? 'future' : 'past' ?>">
    <div class="swiper-pagination"></div>
    <div class="swiper-wrapper">
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="swiper-slide">
          <a href="<?php echo get_the_permalink(get_field('stage')->ID); ?>" class="font-medium text-2xl block mb-4"><?php the_title(); ?></a>
          <p><?php echo get_the_excerpt(); ?></p>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
<?php endif; ?>