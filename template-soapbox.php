<?php
/**
 * Template Name: Soapbox
 */
?>
<!-- Escape the container for full bleed -->
</div></div></div>
<div class="soapbox-marquee">
  <div class="wrap container ">
    <div class="content row">
      <div class="main soapbox-marquee-innerwrapper">
        <div class="soapbox-marquee-image">
          <img src='<?= get_template_directory_uri(); ?>/dist/images/the-soapbox.png' alt='A wooden crate with the words The Soapbox emblazoned on it' />
        </div>
        <div class="soapbox-marquee-summary">
          <h1 class="soapbox-marquee-title">About this Space</h1>
          <?php the_field('soapbox-summary'); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Going back into the container -->
<div class="wrap container">
  <div class="content row">
    <div class="main">
      <?php
        $resourcesQuery = new WP_QUERY(
          array(
            'post_type' => 'resource',
            'order' => 'ASC'
            )
      ); ?>

      <hr class="rule rule--thick" />
      <!-- <section class="resources-wrapper">
      <?php if ( $resourcesQuery->have_posts() ) : ?>
        <?php while ( $resourcesQuery->have_posts()) : $resourcesQuery->the_post(); ?>
          <article class="resource" id="<?php echo $post->post_name; ?>">
            <p class="resource-category"><?php the_field('resource-category'); ?></p>
            <h2><?php the_title(); ?></h2>
            <p class="resource-dop"><?php the_field('resource-dop'); ?></p>
            <div class="resource-summary">
              <?php the_field('resource-summary');  ?>
            </div>
            <?php $resource = get_field('resource') ?>
            <a class="resource-download" download="" href="<?php echo $resource['url'] ?>">Download PDF</a>
          </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
      </section> -->
      <!-- <?php if (!have_posts()) : ?>
        <div class="alert alert-warning">
          <?php _e('Sorry, no results were found.', 'sage'); ?>
        </div>
        <?php get_search_form(); ?>
      <?php endif; ?> -->
    </div>

