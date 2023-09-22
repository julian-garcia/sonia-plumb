  </main>
  <footer class="footer">
    <div>
      <img src="<?php echo get_template_directory_uri() ?>/logo-white.png" alt="" class="logo">
      <p class="text-sm mt-4">233 Pearl St, Hartford, CT 06103</p>
      <p class="text-sm">Phone: <a href="tel:860-681-5779">860-681-5779</a></p>
      <p class="text-sm mb-0">Tax ID # 06-1304412</p>
    </div>
    <div>
      <h2>Sitemap</h2>
      <?php
        wp_nav_menu(
          array(
            'menu' => 'footer_sitemap',
            'container' => '',
            'theme_location' => 'footer_sitemap',
            'menu_class' => 'footer-menu'
          )
        );
      ?>
    </div>
    <div>
      <h2>Information</h2>
      <?php
        wp_nav_menu(
          array(
            'menu' => 'footer_info',
            'container' => '',
            'theme_location' => 'footer_info',
            'menu_class' => 'footer-menu'
          )
        );
      ?>
    </div>
    <div>
      <h2>Subscribe</h2>
      <form action="">
        <input type="text" name="" id="" placeholder="Email address">
        <button type="submit">Sign Up</button>
      </form>
      <ul class="social">
        <li>
          <a href="#" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri() ?>/icons/facebook.svg" alt="Facebook">
          </a>
        </li>
        <li>
          <a href="#" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri() ?>/icons/instagram.svg" alt="Instagram">
          </a>
        </li>
        <li>
          <a href="#" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri() ?>/icons/youtube.svg" alt="Youtube">
          </a>
        </li>
        <li>
          <a href="#" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri() ?>/icons/linkedin.svg" alt="LinkedIn">
          </a>
        </li>
      </ul>
    </div>
  </footer>
  </div>
  <?php wp_footer() ?>
  </body>
</html>
