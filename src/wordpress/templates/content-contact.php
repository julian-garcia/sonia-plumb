<div class="grid grid-cols-[max-content_max-content] gap-x-6 gap-y-3 w-max mx-auto my-12">
  <div class="justify-self-end">
    Mon - Fri
  </div>
  <div>
    <?php echo get_field('weekday')['open']; ?> -
    <?php echo get_field('weekday')['close']; ?>
  </div>
  <div class="justify-self-end">
    Sat - Sun
  </div>
  <div>
    <?php echo get_field('weekend')['open']; ?> -
    <?php echo get_field('weekend')['close']; ?>
  </div>
</div>
<div class="grid grid-cols-[max-content_max-content] md:grid-cols-[max-content_max-content_max-content_max-content] gap-x-6 gap-y-3 w-max mx-auto my-12">
  <div class="bg-[url('../images/phone.svg')] w-8 h-8 bg-contain"></div>
  <p class="m-0">Phone<br>
    <a href="tel:<?php echo get_field('phone') ?>">
      <?php echo get_field('phone') ?>
    </a>
  </p>
  <div class="bg-[url('../images/email.svg')] w-8 h-8 bg-contain"></div>
  <p>Email<br>
    <a href="mailto:<?php echo get_field('email') ?>">
      <?php echo get_field('email') ?>
    </a>
  </p>
</div>