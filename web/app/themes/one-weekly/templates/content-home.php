<?php while (have_posts()) : the_post(); ?>

<!-- <img src="img/bg_lvl1_bottom-right.png" alt="" class="plax plax__level1 bottom-right">
<img src="img/bg_lvl1_top-left.png" alt="" class="plax plax__level1 top-left">
<img src="img/bg_lvl1_bottom-left.png" alt="" class="plax plax__level1 bottom-left">
<img src="img/bg_lvl2_top-right.png" alt="" class="plax plax__level2 top-right">
<img src="img/bg_lvl3_bottom-right.png" alt="" class="plax plax__level3 bottom-right">
<img src="img/bg_lvl3_top-left.png" alt="" class="plax plax__level3 top-left"> -->

<img src="<?php echo get_template_directory_uri(); ?>/dist/img/odc_logo.svg" alt="One Design Company" class="odc-logo odc-logo--home">

<div class="page-content">
  <?php the_content(); ?>
</div>

<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup">
  <form action="http://onedesigncompany.us3.list-manage1.com/subscribe/post?u=28ee62eb4d2a140104295da6f&amp;id=c0f3ca5d9c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

  <div class="mc-field-group">
      <!-- <label for="mce-EMAIL">Email Address </label> -->
      <input type="email" value="" name="EMAIL" placeholder="example@example.com" class="required email" id="mce-EMAIL">
      <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
  </div>
      <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
      </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
      <div style="position: absolute; left: -5000px;"><input type="text" name="b_28ee62eb4d2a140104295da6f_c0f3ca5d9c" value=""></div>
  </form>
</div>

<!--End mc_embed_signup-->
<?php endwhile; ?>