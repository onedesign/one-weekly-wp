<?php get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<ol class="article-list">
<?php while (have_posts()) : the_post(); ?>
  <li class="article-list__post">
    <?php get_template_part('templates/content', get_post_type()); ?>
  </li>
<?php endwhile; ?>
</ol>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <?php get_template_part('templates/page-navigation'); ?>
<?php endif; ?>

