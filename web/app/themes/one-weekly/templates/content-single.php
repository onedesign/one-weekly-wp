<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="post-title"><?php the_title(); ?></h1>
    </header>
    <div class="post-content">
      <?php the_content(); ?>
    </div>
    <footer class="post__meta">
      <?php get_template_part('templates/post-meta'); ?>
    </footer>
  </article>
  <nav>
    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
  </nav>

<?php endwhile; ?>
