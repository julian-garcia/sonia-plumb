<?php
$the_query = new WP_Query(
  array(
    'post_type' => 'timeline',
    'post_status' => 'publish',
    'posts_per_page' => '-1',
    'order'   => 'ASC',
  )
);
if ($the_query->have_posts()) : ?>
  <section class="section">
    <h2 class="m-0">History</h2>
    <div class="float-right">
      <span id="timelineBack" class="timeline-nav timeline-nav-back"></span>
      <span id="timelineNext" class="timeline-nav timeline-nav-next"></span>
    </div>
    <div class="timeline">
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="timeline-event">
          <div class="timeline-text"><?php echo get_the_content(); ?></div>
          <div class="timeline-point"></div>
          <h3 class="timeline-year"><?php the_title(); ?></h3>
          <div></div>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>