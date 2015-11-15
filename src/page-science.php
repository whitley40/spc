<?php
/*
  Template Name: Science
*/
?>
<?php get_header(); ?>

<?php
    $args = array(
      'post_type' => 'page'
      );
    $query = new WP_Query( $args );
    ?>


    <!-- ############ The Science Banner ############ -->
  
  <section class="content-banner science-banner section-blue">

     <div class="header-container">
      <div class="content-container">
          <h2><?php the_field('banner_title'); ?></h2>
      </div>
    </div>
    <div class="page-description">
    <div class="content-container">
    <p><q><?php the_field('banner_quote'); ?> </q> - <?php the_field('banner_quote_name'); ?></p>
    <a href="<?php the_field('banner_cta_link'); ?>" class="main-cta"><?php the_field('banner_cta'); ?><span class="icon-chevron-right"></span></a>
    </div>
    </div>

  </section>  

  <!-- ############ The Science - white  - scientific knowledge ############ -->

  <section class="science-one">
  <div class="content-container">
    <h2><?php the_field('intro_title'); ?></h2>
    <p>S<?php the_field('intro_one'); ?></p>
    </div>
  </section>

  <!-- ############ The Science -  Blue - Dr Explains ############ -->

  <section class="science-two section-blue">

  <div class="content-container">

  <img class="portal" src='<?php the_field('feature_image'); ?>' />


  <h2><?php the_field('feature_title'); ?></h2>

  <p><?php the_field('feature_one'); ?></p>

  <p><?php the_field('feature_two'); ?></p>
  

  <a href="<?php the_field('next_cta_link'); ?>" class="main-cta"><?php the_field('next_cta'); ?><span class="icon-chevron-right"></span></a>
  </div>


  </section>

  <!-- ############ The Science - white  - credentials ############ -->

  <section class="science-three">
  <div class="content-container">
  <header>
    <h2><?php the_field('credentials_title'); ?></h2>
    <img class="portal" src='<?php the_field('credentials_image'); ?>' />
    </header>
    </div>
    </section>

  <section class="science-four">
  <div class="content-container">
      <div class="split-content">
        <?php the_field('left_split'); ?>
      </div>
      <div class="split-content">
        <?php the_field('right_split'); ?>
      </div>
      </div>

  </section>





    <?php get_footer(); ?>