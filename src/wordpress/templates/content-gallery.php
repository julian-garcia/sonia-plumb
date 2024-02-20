<?php if (get_field("gallery_image_1")) :
?>
  <section class="section">
    <hr>
    <h2 class="mb-0">Gallery</h2>
    <div class="swiper slider swiper-gallery">
      <div class="swiper-wrapper">
        <?php for ($i = 1; $i <= 5; $i++) :
          $image = get_field("gallery_image_$i");
          if ($image) {
            $url = $image['url'];
            $medium = $image['sizes']['large'];
          }
        ?>
          <?php if ($url) : ?>
            <div class="swiper-slide gallery-image" data-image="<?php echo esc_url($url); ?>" style="background-image:url('<?php echo esc_url($medium); ?>')">
            </div>
          <?php endif; ?>
        <?php endfor; ?>
      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-scrollbar"></div>
    </div>
    <div class="modal">
      <div class="modal-image"></div>
    </div>
  </section>
<?php endif; ?>