  </main>
  <footer class="footer">
    <div class="grid md:grid-cols-3 gap-4 max-w-full mx-auto lg:max-w-[1040px] h-full">
      <div class="flex flex-col justify-between gap-4">
        <a class="logo" href="/" aria-label="Sonia Plumb Dance Company - home"></a>
        <p class="m-0 md:-mt-4">40 Broad Street,<br> Suite 602</p>
        <p class="m-0 md:-mt-8">Pearl Street, Ste 14,<br>Hartford, CT 06103</p>
        <p class="m-0 text-sm hidden md:block">
          Copyright © Sonia Plumb Dance Company <?php echo date('Y'); ?>
        </p>
      </div>
      <?php
      wp_nav_menu(
        array(
          'menu' => 'footer',
          'container' => '',
          'theme_location' => 'footer',
          'menu_class' => "menu-footer"
        )
      );
      ?>
      <div class="flex content-end flex-wrap gap-3 md:justify-self-end">
        <a href="https://www.facebook.com/soniaplumbdance" class="bg-[url('../images/facebook.svg')] social-link" target="_blank" aria-label="Sonia Plumb Dance Company - Facebook"></a>
        <a href="https://twitter.com/SoniaPlumbDance" class="bg-[url('../images/twitter.svg')] social-link" target="_blank" aria-label="Sonia Plumb Dance Company - Twitter"></a>
        <a href="https://www.instagram.com/soniaplumbdance" class="bg-[url('../images/instagram.svg')] social-link" target="_blank" aria-label="Sonia Plumb Dance Company - Instagram"></a>
        <a href="https://www.youtube.com/@soniaplumbdance" class="bg-[url('../images/youtube.svg')] social-link" target="_blank" aria-label="Sonia Plumb Dance Company - Youtube"></a>
      </div>
    </div>
    <p class="text-sm block md:hidden mt-4">
      Copyright © Sonia Plumb Dance Company <?php echo date('Y'); ?>
    </p>
  </footer>
  </div>
  <?php wp_footer() ?>
  </body>

  </html>