  </main>

  <?php get_template_part('templates/content', 'newsletter'); ?>

  <footer class="footer">
    <div class="grid md:grid-cols-3 gap-4 max-w-full mx-auto lg:max-w-[1040px] h-full">
      <div class="flex flex-col justify-between gap-4">
        <a class="logo" href="/" aria-label="Sonia Plumb Dance Company - home"></a>
        <div>
          <p>
            <span>Mailing Address:</span><br>
            <span>233 Pearl Street, Ste 14</span><br>
            <span>Hartford, CT 06103</span><br>
          </p>
          <p>
            <span>Seasonal Mailing Address:</span><br>
            <span>305 Plumb Road</span><br>
            <span>Washington, VT 05675</span><br>
          </p>
          Phone: <a href="tel:8606815779">860-681-5779</a><br>
          Tax ID: 06-1304412
        </div>
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