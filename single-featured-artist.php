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
  <?php if( get_field('video-title') ): ?>
    <hr class="rule rule--medium" />
    <div class="video">
      <div class="video-title">
        <?php the_field('video-title') ?> <span class="video-details">[<?php the_field('video-year') ?>] <?php the_field('video-length') ?></span>
      </div>
      <div class="video-links">
        <?php if( get_field('video-link-open') ): ?>
          <a href="#" data-href="https://<?php the_field('video-link-open'); ?>" class="video-link">Watch: with Open Captions</a>
        <?php endif; ?>
        <?php if( get_field('video-audio-open') ): ?>
          <a href="#" data-href="https://<?php the_field('video-audio-open'); ?>" class="video-link">Watch: with Audio Description and Open Captions</a>
        <?php endif; ?>
        <div class="video-player">
          <iframe class="video" src="https://<?php the_field('video-audio-open'); ?>" width="100%" height="565" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
      </div>
    </div>
  <?php endif; ?>
<?php endwhile; ?>
