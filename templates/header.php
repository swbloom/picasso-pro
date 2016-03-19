<header class="banner">
  <?php get_template_part( 'templates/partials/sizer/sizer'); ?>
  <div class="container">
      <p class='screen-reader-text'> <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></p>
      <div class='site-logo'>
        <?php if( get_theme_mod( 'picassopro_logo') ) : ?>
          <img src='<?php echo esc_url( get_theme_mod( 'picassopro_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
        <?php else: ?>
          <h1 class="site-logo__fallback"><?php echo get_bloginfo('name'); ?></h1>
        <?php endif; ?>
       </div>
  </div>
  <div class="desktop-hidden">
    <div class="menubar-mobile">
      <button id="toggle-nav"><i class="fa fa-bars"></i>
      <p>Menu</p>
      </button>
    </div>
  </div>
  <nav class="nav-primary">
    <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
    endif;
    ?>
  </nav>
  <?php get_theme_mod('picassopro_searchbar') ? get_search_form() : null ?>
</header>

