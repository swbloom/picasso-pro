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
  <?php if( get_field('image-gallery')): ?>
    <?php get_template_part( 'templates/partials/gallery/gallery'); ?>
  <?php endif; ?>
  <?php if( get_field('video-title') ): ?>
    <hr class="rule rule--medium" />
    <div class="video">
      <div class="video-title">
        <?php the_field('video-title') ?> <span class="video-details">[<?php the_field('video-year') ?>] <?php the_field('video-length') ?></span>
      </div>
      <div class="video-links">
        <?php if( get_field('video-link-open') ): ?>
          <div class="video-link-container">
            <img src="<?php echo get_template_directory_uri() ?>/dist/images/icon-camera.png" alt="a small image of a camera" />
            <a href="#" data-id="0" data-href="https://<?php the_field('video-link-open'); ?>" class="video-link">Watch: with Open Captions</a>
          </div>
        <?php endif; ?>
        <?php if( get_field('video-audio-open') ): ?>
          <div class="video-link-container">
            <img src="<?php echo get_template_directory_uri() ?>/dist/images/icon-camera.png" alt="a small image of a camera" />
            <a href="#" data-id="0" data-href="https://<?php the_field('video-audio-open'); ?>" class="video-link">Watch: with Audio Description and Open Captions</a>
          </div>
        <?php endif; ?>
        <div class="video-description">
          <?php the_field('video-description') ?>
        </div>
        <div class="video-player">
          <iframe class="video" id="video-0" src="https://<?php the_field('video-audio-open'); ?>" width="100%" height="565" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
      </div>
    </div>
        <?php endif; ?>
        <?php
        // check if the repeater field has rows of data
        if( have_rows('additional-videos') ):
          $i = 1;
          // loop through the rows of data
            while ( have_rows('additional-videos') ) : the_row(); ?>
              <?php if( get_field('video-title') ): ?>
                <hr class="rule rule--medium" />
                <div class="video">
                  <div class="video-title">
                    <?php the_sub_field('video-title') ?> <span class="video-details">[<?php the_sub_field('video-year') ?>] <?php the_sub_field('video-length') ?></span>
                  </div>
                  <div class="video-links">
                    <?php if( get_sub_field('video-link-open') ): ?>
                      <div class="video-link-container">
                        <img src="<?php echo get_template_directory_uri() ?>/dist/images/icon-camera.png" alt="a small image of a camera" />
                        <a href="#" data-href="https://<?php the_sub_field('video-link-open'); ?>" data-id="<?php echo $i ?>" class="video-link">Watch: with Open Captions</a>
                      </div>
                    <?php endif; ?>
                    <?php if( get_sub_field('video-audio-open') ): ?>
                      <div class="video-link-container">
                        <img src="<?php echo get_template_directory_uri() ?>/dist/images/icon-camera.png" alt="a small image of a camera" />
                        <a href="#" data-href="https://<?php the_sub_field('video-audio-open'); ?>" data-id="<?php echo $i ?>" class="video-link">Watch: with Audio Description and Open Captions</a>
                      </div>
                    <?php endif; ?>
                    <div class="video-description">
                      <p><?php the_sub_field('video-description') ?></p>
                    </div>
                    <div class="video-player">
                      <iframe class="video" id="<?php echo "video-" . $i ?>" src="https://<?php the_sub_field('video-audio-open'); ?>" width="100%" height="565" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              <?php endif;
                $i++;

            endwhile;

        else :

            // no rows found

        endif;

        ?>
      <?php endwhile; ?>
