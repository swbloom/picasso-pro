<?php
/**
 * Template Name: Archives
 */
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php
  $resourcesQuery = new WP_QUERY(
    array(
      'post_type' => 'resource',
      'order' => 'ASC'
      )
); ?>
<section class="summary archives-summary">
  <?php the_field('archives-summary'); ?>
</section>
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


