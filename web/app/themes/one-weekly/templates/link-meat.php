<header>
  <?php if(get_field('article_link')): ?>
    <h2 class="post__title post__title--link"><a href="<?php the_field('article_link'); ?>"><?php the_title(); ?></a></h2>
  <?php else: ?>
    <h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php endif; ?>
</header>
<div class="post__content">
  <?php the_content(); ?>
</div>