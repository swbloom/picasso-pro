<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1701276523428979";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>
    <header>
      <h1 class="article-title"><?php the_title(); ?></h1>
      <p class="article-date"><?php the_date(); ?></p>
      <?php if (get_field('article-author')) { ?>
        <p class="article-author">by <strong><? the_field('article-author') ?></strong></p>
      <?php } ?>
    </header>
    <div class="article-featured-image">
                    <?php $article_feature_image = get_field('article-feature-image'); ?>
                    <img src="<?php echo $article_feature_image['url'] ?>" alt="<?php echo $article_feature_image['alt'] ?>" ?>
    </div>
    <div class="article-content">
      <?php the_field('article-content') ?>
      <a class="twitter-share-button" href="https://twitter.com/intent/tweet">Tweet</a>
      <div class="fb-share-button" data-href="<?php the_permalink() ?>" data-layout="button_count"></div>
    </div>
    <hr class="rule rule--medium" />
  </article>
  <?php comments_template('/templates/comments.php'); ?>

<?php endwhile; ?>
