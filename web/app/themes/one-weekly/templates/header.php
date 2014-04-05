<header class="site-header" role="banner">
  <div class="row">
    <?php if(!is_front_page()): ?>
      <a class="brand" href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/odc_logo.svg" alt="<?php bloginfo('name'); ?>" class="odc-logo"></a>
    <?php endif; ?>
  </div>
  <nav class="main-nav" role="navigation">
    <div class="row">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav site-nav'));
        endif;
      ?>
    </div>
  </nav>
</header>