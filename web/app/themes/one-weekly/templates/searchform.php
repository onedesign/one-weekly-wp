<form role="search" method="get" class="site-search" action="<?php echo home_url('/'); ?>">
  <div class="site-search__input-group">
    <label class="site-search__label"><?php _e('Search for:', 'roots'); ?></label>
    <input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="site-search__search-field" placeholder="<?php _e('Search', 'roots'); ?>">
    <button type="submit" class="site-search__submit btn btn-default"><?php _e('Search', 'roots'); ?></button>
  </div>
</form>
