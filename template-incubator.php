<?php
/**
 * Template Name: Incubator
 */
?>
<?php get_template_part('templates/page', 'header'); ?>
<?php
  $incubatorQuery = new WP_QUERY(
    array(
      'post_type' => 'incubator',
      'order' => 'ASC'
      )
); ?>
<section class="summary incubator-summary">
  <?php the_field('incubator-summary'); ?>
</section>
<hr class="rule rule--thick" />
<section class="incubator-wrapper">
<?php if ( $incubatorQuery->have_posts() ) : ?>
  <?php while ( $incubatorQuery->have_posts()) : $incubatorQuery->the_post(); ?>
    <article class="incubator-project">
      <h2 class="incubator-project-title"><?php the_title(); ?></h2>
      <div class="incubator-project-content">
        <?php the_field('incubator-project-description'); ?>
      </div>
      <div class="incubator-project-image">
        <?php $incubator_feature_image = get_field('incubator-feature-image'); ?>

        <img src="<?php echo $incubator_feature_image['url'] ?>" alt="<?php echo $incubator_feature_image['alt'] ?>" />
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
  <?php wp_reset_postdata(); ?>
<?php endif; ?>
</section>
<!-- <?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?> -->


