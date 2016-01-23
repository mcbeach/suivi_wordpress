<!DOCTYPE html>
<html>
  <head <?php language_attributes(); ?>>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php the_title(); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <?php wp_head(); ?>
  </head>
  <body>
    <div>
      <header>
        <?php if (is_home() || is_single()) : { ?>          <!-- *****   si on est sur la page single.php  ou home    -->
          <p><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></p>
          <p><?php bloginfo('description');} ?></p>
        <?php else : { ?>
          <h1><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></h1>
          <h2><?php bloginfo('description'); }  ?></h2>
        <?php endif; ?>
      </header> 