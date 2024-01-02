<?php
$the_query = new WP_Query(
  array(
    'post_type' => 'slide',
    'posts_per_page' => '6'
  )
);
if ( $the_query->have_posts() ) : ?>
<div class="swiper slider swiper-slides">
  <div class="swiper-wrapper">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="swiper-slide">
        <div class="image" style="background-image: url('<?php the_post_thumbnail_url() ?>')"></div>
        <div class="slide-title">
          <div>
            <?php if (get_field( "slide_link" )): ?>
              <a href="<?php the_field( "slide_link" ); ?>" class="button">
                <?php the_field( "slide_text" ); ?>
              </a>
            <?php endif; ?>
            <h1><?php the_title(); ?></h1>
          </div>
          <h4><?php echo get_the_excerpt(); ?></h4>
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
