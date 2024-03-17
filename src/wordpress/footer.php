  </main>

  <div class="newsletter-signup-toggle" id="signUp"></div>
  <form action="https://soniaplumbdance.us14.list-manage.com/subscribe/post?u=632044e07457a0112046a12c0&amp;id=4d779dee73&amp;v_id=4492&amp;f_id=003bb4e0f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletter-signup" target="_blank">
    <h2 class="text-xl mb-4">Our Newsletter</h2>
    <div class="mc-field-group mb-4">
      <input type="email" name="EMAIL" id="mce-EMAIL" value="" placeholder="Email address" autocomplete="email" required />
    </div>
    <input type="hidden" name="tags" value="40168472,40168476,40168480,40168484,40168488,40168492,40168496,40168500">
    <div id="mce-responses" class="clear">
      <div class="response" id="mce-error-response" style="display: none;"></div>
      <div class="response" id="mce-success-response" style="display: none;"></div>
    </div>
    <div aria-hidden="true" style="position: absolute; left: -5000px;"><input type="text" name="b_632044e07457a0112046a12c0_4d779dee73" tabindex="-1" value=""></div>
    <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Sign Up">
  </form>

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
