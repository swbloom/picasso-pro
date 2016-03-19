<?php
/**
 * Template Name: Resources
 */
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php
  $resourcesQuery = new WP_QUERY(
    array(
      'post_type' => 'resource',
      'order' => 'DESC'
      )
); ?>
<section class="summary resources-summary">
  <?php the_field('resources-summary'); ?>
</section>
<section class="card-wrapper">
<?php if ( $resourcesQuery->have_posts() ) : ?>
  <?php while ( $resourcesQuery->have_posts()) : $resourcesQuery->the_post(); ?>
    <article class="card card--resource" id="<?php echo $post->post_name; ?>">
      <p class="card-category"><?php the_field('resource-category'); ?></p>
      <h2 class="card-title"><?php the_title(); ?></h2>
      <p class="card-dop"><?php the_field('resource-dop'); ?></p>
      <div class="card-summary">
        <?php the_field('resource-summary');  ?>
      </div>
      <?php $resource = get_field('resource') ?>
      <a class="card-download" download="" href="<?php echo $resource['url'] ?>">Download PDF</a>
    </article>
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


