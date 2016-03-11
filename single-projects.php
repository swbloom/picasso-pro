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
    <hr class="rule rule--medium" />
    <div class="video">
      <div class="video-title">
        <?php the_field('video-title') ?> (<?php the_field('video-year') ?>) <?php the_field('video-length') ?>
      </div>
      <div class="video-links">
        <?php if( get_field('video-link-open') ): ?>
          <p>Video Link with Open Captions: <?php the_field('video-link-open'); ?></p>
        <?php endif; ?>
        <?php if( get_field('video-audio-open') ): ?>
          <p>Video Link with Open Captions: <?php the_field('video-audio-open'); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </article>
<?php endwhile; ?>
