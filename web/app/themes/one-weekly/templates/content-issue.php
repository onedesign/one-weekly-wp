<article <?php post_class(); ?>>
  <header>
    <h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="post__content">
    <?php the_content(); ?>
  </div>
  <footer class="post__meta">
    <?php get_template_part('templates/issue-meta'); ?>
  </footer>
</article>
