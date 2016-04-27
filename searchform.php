<?php
/**
 * default search form
 */
?>
<div class="mobile-hidden">
<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
      <label for="search-input"><img src="<?php echo get_template_directory_uri() ?>/assets/images/magnifyingglass.png" alt="Click here to search" class="magnifying-glass"></label>
        <input type="search" placeholder="<?php echo esc_attr( 'Search the Site', 'presentation' ); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
        <input class="screen-reader-text" type="submit" id="search-submit" value="Search" />
    </div>
</form>
</div>
<div class="desktop-hidden">
<form role="search" method="get" id="search-form-mobile" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
      <label for="search-input" class="mobile-search"><img src="<?php echo get_template_directory_uri() ?>/assets/images/magnifyingglass.png" alt="Click here to search" class="magnifying-glass"></label>
        <input type="search" name="s" id="search-input-mobile" value="<?php echo esc_attr( get_search_query() ); ?>" />
        <input class="screen-reader-text" type="submit" id="search-submit" value="Search" />
    </div>
</form>
</div>
