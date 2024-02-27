<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php the_title(); ?>">
  <title><?php if (is_front_page()) {
            the_title();
          } else {
            echo  get_bloginfo('name') . " | " . get_the_title();
          } ?></title>
  <?php wp_head();
  $postType = get_post_type();
  $pageSlug = get_post_field('post_name');
  $feature = get_post_thumbnail_id() ? '' : ' no-feature';
  ?>
</head>

<body class="body <?php echo is_front_page() ? 'home' : "$postType $feature $pageSlug"; ?>">
  <div class="container">
    <a class="logo" href="/" aria-label="Sonia Plumb Dance Company - home"></a>
    <?php
    wp_nav_menu(
      array(
        'menu' => 'primary',
        'container' => '',
        'theme_location' => 'primary',
        'menu_class' => "menu menu-navigation",
        'menu_id' => "mainMenu"
      )
    );
    ?>
    <?php
    wp_nav_menu(
      array(
        'menu' => 'contact',
        'container' => '',
        'theme_location' => 'contact',
        'menu_class' => "menu menu-contact"
      )
    );
    ?>
    <div class="toggle" id="menuToggle"></div>
    <main class="content">