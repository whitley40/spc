<?php
/*
  Template Name: Contact
*/
?>
<?php get_header(); ?>

<?php
    $args = array(
      'post_type' => 'page'
      );
    $query = new WP_Query( $args );
    ?>

 <!-- ############ Contact Banner ############ -->

  <section class="content-banner contact-banner section-blue">

    <div class="page-description">
    <div class="content-container">
      <h2>Contact</h2>
      </div>
    </div>

  </section>  

  <section class="contact-cols">

  <div class="content-container">

  <!-- ############ Contact- white  - message ############ -->

  <section class="contact-one">

  <h2>How can we help?</h2>

  <?php the_field('contact_form'); ?>

  </section>

   <!-- ############ Contact- white  - message ############ -->

  <section class="contact-two">

  <h2>Details</h2>

  <div class="contacts">

      <a href="mailto:info@simpsonperformanceconsulting.com" class="link-icon"><span class="icon-email-envelope"></span> <span>info@simpsonperformanceconsulting.com</span></a>
        <a  href="tel:+1-800-555-5555" class="link-icon"><span class="icon-mobile"></span> <span>+1 800 555 5555</span></a>
        <a  href="http://www.twitter.com" class="link-icon"><span class="icon-twitter"></span> <span>twitter.com/spc</span></a>
        <a  href="http://www.facebook.com" class="link-icon"><span class="icon-facebook"></span> <span>facebook.com/spc</span></a>
        <a  href="http://www.vimeo.com" class="link-icon"><span class="icon-vimeo"></span> <span>vimeo.com/spc</span></a>
        <a  href="http://www.youtube.com" class="link-icon"><span class="icon-youtube-alt"></span> <span>youtube.com/spc</span></a>

</div>

  <h2>Pricing</h2>

  <p>Pricing – each performance plan is individualized and based on your specific needs. We are committed to providing valuable services to our clients. </p>

<p><a href="#">Please contact SPC for pricing.</a></p>



  </section>

  </div>


  </section>
<!-- //// end contact wrap  -->


<?php get_footer(); ?>