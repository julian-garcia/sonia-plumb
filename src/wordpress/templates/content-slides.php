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
        <div id="hoverImage"></div>
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
<svg height="0" width="0">
  <clipPath id="blob">
  <path d="M141.529 10.2046L141.558 10.2228L141.589 10.2371C161.1 19.2518 176.53 21.389 189.492 23.1845C192.771 23.6387 195.892 24.0711 198.882 24.5874C206.286 25.8662 212.877 27.6559 219.114 31.5375C225.348 35.418 231.266 41.4128 237.277 51.1574C239.278 54.4022 241.312 57.6718 243.36 60.9642C260.687 88.8253 279.025 118.31 287.578 148.113C292.356 164.762 294.071 181.486 290.856 198.058C287.641 214.626 279.491 231.075 264.49 247.168C234.559 279.278 196.635 279.31 161.361 266.556C126.072 253.796 93.5323 228.262 74.575 209.428C68.7313 203.622 62.6155 197.983 56.5224 192.365C52.715 188.854 48.9164 185.352 45.1986 181.822C35.5156 172.628 26.3477 163.22 18.8624 152.892C3.91048 132.262 -4.34083 107.949 3.54538 74.3318C11.4229 40.7516 36.3947 18.6423 64.1982 7.96716C92.0242 -2.71662 122.569 -1.90538 141.529 10.2046Z" stroke="black" stroke-width="3" fill="none" />
</clipPath>
</svg>
<?php endif; ?>
