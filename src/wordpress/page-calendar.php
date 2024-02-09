<?php get_header();
if (isset($_GET['year-month'])) {
  $year_month = $_GET['year-month'];
} else {
  $year_month = date("Y-m");
}
$timestamp = strtotime($year_month . '-01');
$month_end = date("Ymt", $timestamp);
$month_start = date("Ymd", $timestamp);
$prev_month = date("Y-m", strtotime("-1 month", $timestamp));
$next_month = date("Y-m", strtotime("+1 month", $timestamp));
?>
<?php
$the_query = new WP_Query(
  array(
    'post_type' => 'event',
    'post_status' => 'publish',
    'meta_query'  => array(
      array(
        'key'       => 'event_date',
        'compare'   => 'EXISTS',
        'type'      => 'DATE'
      ),
      array(
        'key' => 'event_date',
        'value'   => $month_start,
        'compare' => '>='
      ),
      array(
        'key' => 'event_date',
        'value'   => $month_end,
        'compare' => '<='
      )
    ),
    'orderby' => array('event_date' => 'DESC')
  )
); ?>
<section class="section">
  <h2 class="border-b-4 border-button-active pb-2 inline-block">
    <?php the_title(); ?>
  </h2>
  <?php the_content(); ?>
  <div class="grid grid-cols-1 md:grid-cols-[1.5fr,2fr] gap-8 items-start">
    <?php include 'Calendar.php';
    $calendar = new Calendar($year_month); ?>
    <?php if ($the_query->have_posts()) {
      while ($the_query->have_posts()) {
        $the_query->the_post();
        $dt = date("Y-m-d", strtotime(get_field('event_date')));
        $calendar->add_event(get_the_ID(), $dt);
        wp_reset_postdata();
      }
    } ?>
    <div class="relative">
      <div class="calendar-nav">
        <a class="back" href="/calendar?year-month=<?php echo $prev_month; ?>"></a>
        <a class="next" href="/calendar?year-month=<?php echo $next_month; ?>"></a>
      </div>
      <?php echo $calendar; ?>
    </div>
    <div>
      <h3 id="noEvents" class="hidden">There are no events on this date.</h3>
      <?php if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <div id="event<?php the_ID(); ?>" class="hidden mb-10 event-description">
            <h3><?php the_title(); ?></h3>
            <h4 class="text-button-active -mt-4">
              <?php $categories = get_the_category();
              if (!empty($categories)) {
                echo esc_html($categories[0]->name);
              } ?>
            </h4>
            <?php the_content(); ?>
            <a href="<?php echo get_the_permalink(get_field('stage')->ID); ?>" class="font-medium -mt-3 block">More info...</a>
            <div class="flex gap-4 my-4">
              <span class="text-button-active font-semibold">
                <?php echo get_field('venue'); ?>
              </span>
              <span><?php echo get_field('event_date'); ?></span>
            </div>
            <div class="flex gap-4 my-4">
              <span class="text-button-active font-semibold">
                <?php echo get_field('time_1'); ?>
              </span>
              <span class="text-button-active font-semibold">
                <?php echo get_field('time_2'); ?>
              </span>
            </div>
            <?php if (get_field('event_link')) : ?>
              <a href="<?php echo get_field('event_link')['url']; ?>" class="button">
                <?php echo get_field('event_link')['text']; ?>
              </a>
            <?php endif; ?>
          </div>
        <?php wp_reset_postdata();
        endwhile; ?>
      <?php else : ?>
        <h3 id="noEventsMonth">There are no events this month.</h3>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>