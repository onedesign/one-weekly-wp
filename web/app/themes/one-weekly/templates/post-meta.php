<div class="meta">
  <time class="meta__postdate" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date('M. n, Y'); ?></time>
  <p class="meta__author author vcard"><?php echo __('by', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
  <p class="meta__categories"><?php echo __('in', 'roots'); ?> <?php the_category(','); ?></p>
  <a href="<?php the_permalink(); ?>" class="permalink">★</a>
</div>
