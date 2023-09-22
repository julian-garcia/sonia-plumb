<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php the_title(); ?>">
  <title><?php the_title(); ?></title>
  <?php wp_head() ?>
</head>
<body class="body <?php echo is_front_page() ? 'home' : '' ?>">
  <div class="container">
  <header class="header">
    <?php
      wp_nav_menu(
        array(
          'menu' => 'primary',
          'container' => '',
          'theme_location' => 'primary',
          'menu_class' => 'menu'
        )
      );
    ?>
  </header>
  <div class="sidebar"></div>
  <main class="content">

