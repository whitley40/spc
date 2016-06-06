<?php
/*
  Template Name: Home Page
*/
  ?>
  <?php get_header(); ?>

  <?php
  $args = array(
    'post_type' => 'page'
    );
  $query = new WP_Query( $args );
  ?>


  <!-- ############ Homepage Banner ############ -->
  
  <section class="homepage-banner section-blue">

    <div class="content-container">

    <h1><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/imgs/SPC-logo.svg" /><span>Simpson Performance Consulting</span></a></h1>
    <h2><?php the_field('banner_title'); ?></h2>
    <p><?php the_field('banner_intro'); ?></p>
    <a href="<?php the_field('banner_cta_link'); ?>" class="main-cta"><?php the_field('banner_cta'); ?><span class="icon-chevron-right"></span></a>

    </div>

  </section>  

  <!-- ############ Contact Bar ############ -->
  
  <section class="contact-bar contact-home-bar section-blue">

  <div class="content-container">

    <a href="mailto:info@simpsonperformanceconsulting.com" class="link-icon"><span class="icon-email-envelope"></span><span class="big-email">info@simpsonperformanceconsulting.com</span></a>
    <a  href="tel:786-540-4772" class="link-icon"><span class="icon-mobile"></span>786-540-4SPC</a>

    <nav class="nav-social hidden">
      <ul>
        <li><a class="tw" href="#" target="_blank"><span>Twitter</span></a></li>
        <li><a class="fb" href="#" target="_blank"><span>Facebook</span></a></li>
        <li><a class="vm" href="#" target="_blank"><span>Vimeo</span></a></li>
        <li><a class="yt" href="#" target="_blank"><span>Youtube</span></a></li>
      </ul>
    </nav>

    </div>

  </section>

  <!-- ############ Homepage Section One ############ -->

  <section class="homepage-one">

  <div class="content-container">

    <img class="portal" src='<?php the_field('home_one_image'); ?>' />
    <h2><?php the_field('home_one_title'); ?></h2>
    <p><?php the_field('home_one_intro'); ?></p>
    <a href="<?php bloginfo('url'); ?>/<?php the_field('home_one_link'); ?>" class="main-cta"><?php the_field('home_one_cta'); ?><span class="icon-chevron-right"></span></a>

    </div>

  </section>









<?php get_footer(); ?>