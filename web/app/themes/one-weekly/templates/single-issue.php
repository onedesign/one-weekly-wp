<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="page-title"><?php the_title(); ?></h1>
    </header>
    <div class="post-content">
      <?php the_content(); ?>
      <?php if(have_rows('section')): ?>
        <?php while(have_rows('section')) : the_row(); ?>
          <section class="section">
            <h2 class="section__title"><?php the_sub_field('title'); ?></h3>
            <?php
              $posts = get_sub_field('posts');
              if( $posts ): ?>
              <ul class="section__posts article-list">
              <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>
                  <li class="article-list__post">
                    <?php get_template_part('templates/link-meat'); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
              <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
          </section>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
