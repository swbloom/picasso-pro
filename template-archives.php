<?php
/**
 * Template Name: Archives
 */
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php
  $projectsQuery = new WP_QUERY(
    array(
      'post_type' => 'projects',
      'order' => 'ASC'
      )
); ?>
<section class="summary archives-summary">
  <?php the_field('archives-summary'); ?>
</section>
<section class="card-wrapper">
<?php if ( $projectsQuery->have_posts() ) : ?>
  <?php while ( $projectsQuery->have_posts()) : $projectsQuery->the_post(); ?>
    <article class="card" id="<?php echo $post->post_name; ?>">
      <p class="card-category">Projects</p>
      <h2 class="post-title"><?php the_title(); ?></h2>
      <p class="card-dop"><?php the_field('project-date'); ?></p>
      <div class="card-summary">
        <?php the_field('project-description');  ?>
      </div>
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


