<?php
/*
  Template Name: Benefits
*/
?>
<?php get_header(); ?>

<?php
    $args = array(
      'post_type' => 'page'
      );
    $query = new WP_Query( $args );
    ?>


    <!-- ############ Benefits Banner ############ -->
  
  <section class="content-banner benefits-banner section-blue">

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

  <!-- ############ Benefits - white  - sustainable success ############ -->

  <section class="benefits-one">
  <div class="content-container">
    <h2><?php the_field('intro_title'); ?></h2>
    <p><?php the_field('intro_one'); ?></p>
    </div>
  </section>

  <!-- ############ Benefits -  Blue - Help ############ -->

  <section class="benefits-two section-blue">

  <div class="content-container">

  <h2><?php the_field('list_intro'); ?></h2>
  <ul class="split">
    <div class="split-list">
    <?php the_field('list_left'); ?>
    </div>
    <div class="split-list">
    <?php the_field('list_right'); ?>
    </div>
  </ul>

  <a href="<?php the_field('next_cta_link'); ?>" class="main-cta"><?php the_field('next_cta'); ?><span class="icon-chevron-right"></span></a>

  </div>


  </section>

  <!-- ############ Benefits - white  - quote ############ -->

  <section class="benefits-three">

    <p class="quote"><q><?php the_field('quote'); ?></q> - <?php the_field('quote_name'); ?></p>

  </section>


<?php get_footer(); ?>