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
    'posts_per_page' => -1,
    'meta_query'  => array(
      array(
        'key'       => 'event_date',
        'compare'   => 'EXISTS',
        'type'      => 'DATE'
      ),
      'time' => array(
        'key' => 'time_1',
        'compare' => 'EXISTS',
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
    'orderby' => array('event_date' => 'ASC', 'time' => 'ASC')
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
    <?php
    while ($the_query->have_posts()) {
      $the_query->the_post();
      $dt = date("Y-m-d", strtotime(get_field('event_date')));
      $calendar->add_event(get_the_ID(), $dt);
      wp_reset_postdata();
    }
    ?>
    <div class="relative">
      <div class="calendar-nav">
        <a class="back" href="/calendar?year-month=<?php echo $prev_month; ?>" aria-label="Last month"></a>
        <a class="next" href="/calendar?year-month=<?php echo $next_month; ?>" aria-label="Next month"></a>
      </div>
      <?php echo $calendar; ?>
    </div>
    <div>
      <?php if ($the_query->have_posts()) : ?>
        <div class="custom-select">
          <button class="select-button" role="combobox" aria-label="select button" aria-haspopup="listbox" aria-expanded="false" aria-controls="selectDropdown" id="selectButton">
            <span class="selected-value" id="selectedValue">Filter</span>
            <span class="select-arrow" id="selectArrow"></span>
          </button>
          <ul class="select-dropdown" role="listbox" id="selectDropdown">
            <?php
            $terms = [];
            if ($the_query->have_posts()) {
              while ($the_query->have_posts()) {
                $the_query->the_post();
                $get_terms = get_the_terms(get_the_ID(), 'category');
                if ($get_terms) {
                  foreach ($get_terms as $term) {
                    $terms[] = array('name' => $term->name, 'id' => $term->term_id);
                  }
                }
                wp_reset_postdata();
              }
            } ?>
            <li class="select-option" role="option">
              <input type="radio" id="All events" name="event-category" value="all" />
              <label for="All events">All events</label>
            </li>
            <?php if ($terms) : ?>
              <?php foreach (array_unique($terms, SORT_REGULAR) as $term) : ?>
                <li class="select-option" role="option">
                  <input type="radio" id="<?php echo $term['name']; ?>" name="event-category" value="<?php echo $term['id']; ?>" />
                  <label for="<?php echo $term['name']; ?>">
                    <?php echo $term['name']; ?>
                  </label>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div>
      <?php endif; ?>
      <h3 id="noEvents" class="hidden">There are no events on this date.</h3>
      <?php if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <div id="event<?php the_ID(); ?>" data-event-category="<?php echo get_the_category() ? get_the_category()[0]->term_id : ''; ?>" class="hidden mb-10 event-description">
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
              <?php if (get_field('venue_link')) : ?>
                <a class="font-semibold" href="<?php echo get_field('venue_link'); ?>" target="_blank">
                  <?php echo get_field('venue'); ?>
                </a>
              <?php else : ?>
                <span class="font-semibold">
                  <?php echo get_field('venue'); ?>
                </span>
              <?php endif; ?>
              <div>
                <span><?php echo get_field('event_date'); ?></span>
                <?php if (get_field('event_end_date')) : ?>
                  <span>- <?php echo get_field('event_end_date'); ?></span>
                <?php endif; ?>
              </div>
            </div>
            <div class="flex gap-4 my-4">
              <span class="text-button-active font-semibold">
                <?php echo get_field('time_1'); ?>
              </span>
              <span class="text-button-active font-semibold">
                <?php echo get_field('time_2'); ?>
              </span>
            </div>
            <?php if (get_field('event_link')['url']) : ?>
              <a href="<?php echo get_field('event_link')['url']; ?>" class="button">
                <?php echo get_field('event_link')['text'] ? get_field('event_link')['text'] : 'RSVP'; ?>
              </a>
            <?php else : ?>
              <a href="/contact" class="button">
                <?php echo get_field('event_link')['text'] ? get_field('event_link')['text'] : 'RSVP'; ?>
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