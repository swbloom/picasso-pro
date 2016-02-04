<?php
  function display_social_media_icons() {
    $facebook = get_option('facebook') ?
      "<a href='http://www.facebook.com/" . get_option('facebook') . "'> <span class='social-icon social-icon-facebook'></a></span>"
      : null;
    $twitter = get_option('twitter') ?
      "<a href='http://www.twitter.com/" . get_option('twitter') . "'> <span class='social-icon social-icon-twitter'></a></span>"
      : null;;
    $youtube = get_option('vimeo') ?
      "<a href='http://www.vimeo.com/" . get_option('vimeo') . "'> <span class='social-icon social-icon-vimeo'></a></span>"
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

<footer class="content-info">
    <div class="container">
      <div class="copyright">
        &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name') ?> · <?php echo strtolower(get_bloginfo('description')) ?>
      </div>
      <div class="social">
        <?php display_social_media_icons() ?>
      </div>
    </div>
</footer>
