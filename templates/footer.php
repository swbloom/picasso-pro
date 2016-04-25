<?php
  function display_social_media_icons() {
    $facebook = get_theme_mod('picassopro_facebook_url') ?
      "<a href='http://www.facebook.com/" . get_theme_mod('picassopro_facebook_url') . "'><span class='social-icon social-icon-facebook'><p class='screen-reader-text'>Facebook Icon</p></a></span>"
      : null;
    $twitter = get_theme_mod('picassopro_twitter_handle') ?
      "<a href='http://www.twitter.com/" . get_theme_mod('picassopro_twitter_handle') . "'> <span class='social-icon social-icon-twitter'><p class='screen-reader-text'>Twitter Icon</p></a></span>"
      : null;;
    $youtube = get_theme_mod('picassopro_vimeo_url') ?
      "<a href='http://www.vimeo.com/" . get_theme_mod('picassopro_vimeo_url') . "'> <span class='social-icon social-icon-vimeo'><p class='screen-reader-text'>Vimeo Icon</p></a></span>"
      : null;

?>

    <?php
      echo $facebook;
      echo $twitter;
      echo $youtube;
    ?>
    </div>
<?php
  }
?>

<footer class="content-info" id="footer">
    <div class="container">
      <div class="copyright">
        &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name') ?> · <?php echo strtolower(get_bloginfo('description')) ?>
      </div>
      <div class="social">
        <?php display_social_media_icons() ?>
      </div>
    </div>
</footer>
