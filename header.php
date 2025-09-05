
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="<?php echo get_template_directory_uri()?>/assets/images/favicon.ico" type="image/x-icon">
   
    <?php
  if ( ! function_exists( '_wp_render_title_tag' ) ) {
    function theme_slug_render_title() {
  ?>
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <?php
    }
    add_action( 'wp_head', 'theme_slug_render_title' );
  }
  ?>
   <?php wp_head(); ?>
</head>
<body class="<?php body_class() ?>">
  <div class="page">
    <div class="bg" aria-hidden="true"></div>

    <!-- Header -->
    <header class="header" role="banner">
      <div class="container headerRow">
        <div class="brand">
          <div class="logo">
               <a href="<?php echo home_url()?>"><img class="logoImg imgFullWidth" src="<?php echo get_theme_mod('eflLogo'); ?>" alt="ShopComponent"></a>
          </div>

                
          <!-- <span class="brandText">ShopComponent</span> -->
        </div>

        <!-- Mobile toggle (CSS-only) -->
        <input id="nav-toggle" class="navToggle" type="checkbox" aria-label="Open menu" />
        <label for="nav-toggle" class="navBurger" aria-hidden="true">
          <span></span><span></span><span></span>
        </label>

        <!-- WordPress-friendly nav (UL/LI) -->
        <nav class="nav" role="navigation">
          <!-- <ul class="navList">
            <li class="menu-item"><a class="navLink" href="#features">Features</a></li>
            <li class="menu-item"><a class="navLink" href="#how">How it works</a></li>
            <li class="menu-item"><a class="navLink" href="#usecases">Use cases</a></li>
            <li class="menu-item"><a class="navLink" href="#demo">Demo</a></li>
            <li class="menu-item"><a class="navLink" href="#install">Install</a></li>
          </ul> -->

          <?php wp_nav_menu(array(
                   'theme_location' => 'top_menu',
                   'menu_class' => 'navList',
                   'container' => false
                )); ?>
        </nav>

        <!-- Theme toggle -->
<button class="themeSwitch" type="button" id="theme-switch" aria-label="Toggle dark mode" aria-pressed="false">
  <span class="themeIcon themeIcon--sun" aria-hidden="true">
    <!-- Sun -->
    <svg viewBox="0 0 24 24" width="18" height="18"><path d="M12 4V2m0 20v-2M4.93 4.93L3.52 3.52m16.96 16.96l-1.41-1.41M4 12H2m20 0h-2M4.93 19.07l-1.41 1.41m16.96-16.96l-1.41 1.41M12 7a5 5 0 100 10 5 5 0 000-10z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
  </span>
  <span class="themeIcon themeIcon--moon" aria-hidden="true">
    <!-- Moon -->
    <svg viewBox="0 0 24 24" width="18" height="18"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
  </span>
</button>

      </div>
    </header>