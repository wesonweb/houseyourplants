<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hyp_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- Google tag (gtag.js) -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-7KNVY0VWRT"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-7KNVY0VWRT');
  </script> -->

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'vanilla'); ?></a>
    <div class="heading-container">
      <header id="masthead" class="site-header clearfix container" role="banner">
        <div class="site-branding clearfix">
          <h1><a href="<?php bloginfo('url'); ?>" id="logo"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-purple-v13.svg" class="logo" width="180" height="180" alt="houseyourplants logo"></a></h1>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation clearfix ">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('View Menu', 'update'); ?></button>
          <?php
          wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'menu_class'        => 'clearfix',
            'walker'         => new Clean_Walker_Nav
          ));
          ?>
        </nav><!-- #site-navigation -->
      </header><!-- #masthead -->
    </div><!-- end heading container -->

    <div id="content" class="site-content clearfix">
