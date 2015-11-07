<!doctype html>

<html class="no-js" lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="Simpson Performance Consulting, Dr Duncan Simpson" />
  <meta name="keywords" content="Sports, Consultant, Performance" />
  <meta name="description" content="Simpson Performance Consulting (SPC) works exclusively with high-end performers and teams who want to be the best in their field, be that sport or business." />
  <meta name="google-site-verification" content="" />
  <meta name="Copyright" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/imgs/spc-fav.png" />  
  <title><?php wp_title(); ?></title>
  <link href="https://fontastic.s3.amazonaws.com/hzTWcwQEtJUKbecWL3w6K4/icons.css" rel="stylesheet">
  <?php wp_head(); ?>

</head>

<body <?php body_class( $class ); ?>>

<!-- top button -->
<a class="spc-top icon-arrow-up"><span>Top</span></a>

  <!-- header and navigation -->

  <header class="nav-bar">

  <div class="content-container">

  <h1 class="hidden"><a class="nav-logo" href="<?php bloginfo('url'); ?>">Simpson Performance Consulting</a></h1>

  <nav class="nav-social social-home">
        <ul>
          <li><a class="icon-twitter" href="#" target="_blank"><span>Twitter</span></a></li>
          <li><a class="icon-facebook" href="#" target="_blank"><span>Facebook</span></a></li>
          <li><a class="icon-vimeo" href="#" target="_blank"><span>Vimeo</span></a></li>
          <li><a class="icon-youtube-alt" href="#" target="_blank"><span>Youtube</span></a></li>
        </ul>
      </nav>

    <a class="menu icon-list" ontouchend="this.onclick=fix"><span>Show Menu</span></a>

    <div class="nav-container">

      <nav class="nav-social">
        <ul>
          <li><a class="icon-twitter" href="#" target="_blank"><span>Twitter</span></a></li>
          <li><a class="icon-facebook" href="#" target="_blank"><span>Facebook</span></a></li>
          <li><a class="icon-vimeo" href="#" target="_blank"><span>Vimeo</span></a></li>
          <li><a class="icon-youtube-alt" href="#" target="_blank"><span>Youtube</span></a></li>
        </ul>
      </nav>

       <nav class="nav-main">
       <?php
        $defaults = array(
          'container' => false,
          'theme_location' => 'primary-menu',
          'menu_class' => '',
          'menu_id' => ''
          );

        wp_nav_menu( $defaults );
      ?>
      </nav>

    </div>

    </div>

  </header>

<!-- // end header and navigation  -->
