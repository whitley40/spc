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



   <!-- ############ Contact- white  - message ############ -->

  <section class="contact-two">

  <h2>Details</h2>

  <div class="contacts">

      <a href="mailto:info@simpsonperformanceconsulting.com" target="_blank" class="link-icon"><span class="icon-email-envelope"></span> <span>info@simpsonperformanceconsulting.com</span></a>
        <a  href="tel:786-540-4772" target="_blank" class="link-icon"><span class="icon-mobile"></span><span>786-540-4SPC</span></a>
        <a  href="http://www.twitter.com/SportPsychDunc" target="_blank" class="link-icon"><span class="icon-twitter"></span> <span>twitter.com/SportPsychDunc</span></a>

</div>

  <h2>Pricing</h2>

  <p>Pricing – each performance plan is individualized and based on your specific needs.</p><p>We are committed to providing valuable services to our clients. </p>

<p><a href="#">Please contact SPC for pricing.</a></p>



  </section>

  </div>


  </section>
<!-- //// end contact wrap  -->


<?php get_footer(); ?>