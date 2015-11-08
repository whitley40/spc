<?php
/*
  Template Name: Training
*/
?>
<?php get_header(); ?>

<?php
    $args = array(
      'post_type' => 'page'
      );
    $query = new WP_Query( $args );
    ?>


<!-- ############ Training Banner ############ -->
  
  <section class="content-banner training-banner section-blue">

    <div class="header-container">
      <div class="content-container">
          <h2><?php the_field('banner_title'); ?></h2>
      </div>
    </div>
    <div class="page-description">
     <div class="content-container">
    <p><q>“<?php the_field('banner_quote'); ?></q> - by <?php the_field('banner_quote_name'); ?></p>
    <a href="<?php bloginfo('url'); ?>/<?php the_field('banner_cta_link'); ?>" class="main-cta"><?php the_field('banner_cta'); ?><span class="icon-chevron-right"></span></a>
    </div>
    </div>

  </section>  

  <!-- ############ Training - white  - success margins ############ -->

  <section class="training-one">

   <div class="content-container">

    <h2><?php the_field('intro_title'); ?></h2>
    <p><?php the_field('intro_one'); ?></p>
    <p><?php the_field('intro_two'); ?></p>

    </div>

  </section>

  <!-- ############ Training -  Blue - Help ############ -->

  <section class="training-two section-blue">

   <div class="content-container">


<div class="video">
      <video controls>
        <source src="<?php the_field('video_link'); ?>" type="video/mp4">
      </video>
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

  <!-- ############ Training - white  - quote ############ -->

  <section class="training-three">

    <p class="quote"><q><?php the_field('quote'); ?></q> - <?php the_field('quote_name'); ?></p>

  </section>







<?php get_footer(); ?>