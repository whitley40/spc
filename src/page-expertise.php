<?php
/*
  Template Name: Areas of Expertise
*/
?>
<?php get_header(); ?>

<?php
    $args = array(
      'post_type' => 'page'
      );
    $query = new WP_Query( $args );
    ?>

     <!-- ############ Areas of Interest Banner ############ -->
  
  <section class="content-banner aoe-banner section-blue">
    <div class="header-container">
      <div class="content-container">
          <h2><?php the_field('banner_title'); ?></h2>
      </div>
    </div>
    <div class="page-description">
    <div class="content-container">
    <p><q><?php the_field('banner_quote'); ?></q> - by <?php the_field('banner_quote_name'); ?></p>
    <a href="<?php the_field('banner_cta_link'); ?>" class="main-cta"><?php the_field('banner_cta'); ?><span class="icon-chevron-right"></span></a>
    </div>
    </div>

  </section>  

  <!-- ############ Areas of Interest - white  - success margins ############ -->

  <section class="aoi-one">

  <div class="content-container">

    <h2><?php the_field('intro_title'); ?></h2>
    <p><?php the_field('intro_one'); ?></p>
    <p class="quote"><q><?php the_field('intro_quote'); ?></q> - <?php the_field('intro_quote_name'); ?></p>
    <p><?php the_field('intro_three'); ?></p>
    <p><?php the_field('intro_four'); ?></p>
    </div>

  </section>

  <!-- ############ Areas of Interest -  Blue - Help ############ -->

  <section class="aoe-two section-blue">

  <div class="content-container">


<div class="portal-collection">
  <img class="portal" src='<?php the_field('image_one'); ?>' />
  <img class="portal" src='<?php the_field('image_two'); ?>' />
  <img class="portal" src='<?php the_field('image_three'); ?>' />
  </div>

  <h2><?php the_field('list_intro'); ?></h2>
  <ul class="split">
    <div class="split-list">
    <?php the_field('list_left'); ?>
    </div>
    <div class="split-list">
    <?php the_field('list_right'); ?>
    </div>
  </ul>

  <a href="<?php bloginfo('url'); ?>/<?php the_field('next_cta_link'); ?>" class="main-cta"><?php the_field('next_cta'); ?><span class="icon-chevron-right"></span></a>

  </div>


  </section>

  <!-- ############ Contact Bar ############ -->


  <?php get_footer(); ?>