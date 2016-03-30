<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>
    <header>
      <h1 class="article-title"><?php the_title(); ?></h1>
      <p class="article-date"><?php the_date(); ?></p>
    </header>
    <div class="article-featured-image">
                    <?php $article_feature_image = get_field('article-feature-image'); ?>
                    <img src="<?php echo $article_feature_image['url'] ?>" alt="<?php echo $article_feature_image['alt'] ?>" ?>
    </div>
    <div class="article-content">
      <?php the_field('article-content') ?>
    </div>
    <hr class="rule rule--medium" />
  </article>
  <?php comments_template('/templates/comments.php'); ?>

<?php endwhile; ?>
