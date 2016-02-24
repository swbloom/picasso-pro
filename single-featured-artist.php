<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>
    <header>
      <h1 class="page-header"><?php the_title(); ?></h1>
    </header>
    <div class="entry-wrapper">
      <div class="entry-feature-image entry-feature-image--float-right">
        <?php $artist_headshot = get_field('artist-headshot') ?>
        <img src="<?php echo $artist_headshot['url'] ?>" alt="<?php echo $artist_headshot['alt'] ?>" />
      </div>
      <div class="entry-content">
        <?php the_field('artist-long-description') ?>
      </div>
      <div class="entry-full-width-image">
        <?php $artist_feature_image = get_field('artist-feature-image') ?>
        <img src="<?php echo $artist_feature_image['url'] ?>" alt="<?php echo $artist_headshot['alt'] ?>" />
      </div>
    </div>
  </article>
<?php endwhile; ?>
