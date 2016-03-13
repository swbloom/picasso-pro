<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>
    <header>
      <h1 class="page-header"><?php the_title(); ?></h1>
    </header>
    <div class="project-wrapper project">
      <div class="project-date">
        <?php the_field('project-date') ?>
      </div>
      <div class="project-content">
        <div class="project-feature">
          <?php $project_feature_image = get_field('project-image') ?>
          <img src="<?php echo $project_feature_image['url'] ?>" alt="<?php echo $project_feature_image['alt'] ?>" />
          <p class="caption">
            <?php the_field('project-image-caption') ?>
          </p>
        </div>
        <div class="project-description">
          <?php the_field('project-description') ?>
        </div>
      </div>
    </div>
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
  </article>
<?php endwhile; ?>
