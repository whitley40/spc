<?php
/*
  Template Name: Case Studies
*/
?>
<?php get_header(); ?>

<?php
    $args = array(
      'post_type' => 'page'
      );
    $query = new WP_Query( $args );
    ?>


<!-- ############ Case Studies Banner ############ -->
  
  <section class="content-banner case-studies-banner section-blue">


    <div class="header-container">
      <div class="content-container">
          <h2><?php the_field('banner_title'); ?></h2>
      </div>
    </div>
    
    <div class="page-description">
    <div class="content-container">
    <p><q><?php the_field('banner_quote'); ?></q> - <?php the_field('banner_quote_name'); ?></p>
    <a href="<?php bloginfo('url'); ?>/<?php the_field('banner_cta_link'); ?>" class="main-cta"><?php the_field('banner_cta'); ?><span class="icon-chevron-right"></span></a>
    </div>
    </div>



  </section>  

  <!-- ############ Case Studies - white  - clients ############ -->

  <section class="case-studies-one">

  <div class="content-container">

    <h2><?php the_field('intro_title'); ?></h2>
    <?php the_field('intro_one'); ?>

<p><a href="<?php the_field('intro_link_url'); ?>" target="_blank"><?php the_field('intro_link'); ?></a></p>

<h2><?php the_field('study_title'); ?></h2>

</div>

  </section>


<!--   Case studies to go in here as custom posts
 -->

<?php
    $args = array(
      'post_type' => 'case-study'
      );
    $query = new WP_Query( $args );
    ?>

    <?php if( $query->have_posts() ): while( $query->have_posts() ) : $query->the_post(); ?>

      <!-- this gets the featured image object and stores the array in a variable - its then echoed out in the background -->
      <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '', false, '' ); ?>
      <!-- get the category type for project posts -->
       <?php $project = strip_tags(get_the_term_list( $post->ID, 'project-type', '', ' ', '')); ?>

    <section class="case-studies-two section-blue">

    <!-- &.avi{
      background: url('imgs/banners/banners-testimonial-avi.jpg') $spc-red;
      background-size: cover;
      background-position: center;
      //medium screen upwards
        @include bp-medium {
          background: url('imgs/banners/banners-testimonial-avi-dt.jpg') $spc-darkblue;
          background-size: cover;
          background-position: center;
        }
    } -->
  <header class="story-head" style="background: url('<?php the_field('persons_image_mob'); ?>') center #15212d; background-size: cover;"></header>
  <header class="story-head-dt" style="background: url('<?php the_field('persons_image'); ?>') center #15212d; background-size: cover;"></header>

  <div class="case-detail">
  <div class="content-container">
    <h2><?php the_field('persons_name'); ?></h2>
    <h3><?php the_field('persons_info'); ?> <a href="<?php the_field('persons_url_link'); ?>" target="_blank">- <?php the_field('persons_url'); ?></a></h3>
    <?php the_field('persons_quote'); ?>
  </div>
  </div>

  </section>

  <?php endwhile;  endif; wp_reset_postdata(); ?>




<?php get_footer(); ?>
