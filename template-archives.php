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
    <article class="card card--has-columns card--full-bleed" id="<?php echo $post->post_name; ?>">
      <div class="card-column card-column--projects card-column--two-thirds">
        <p class="card-category">Projects</p>
        <h2 class="card-title"><?php the_title(); ?></h2>
        <p class="card-dop"><?php the_field('project-date'); ?></p>
        <div class="card-summary">
        <?php the_field('project-short-description');  ?>
        </div>
        <a class="card-download" href="<?php the_permalink() ?>">Read more and watch</a>
      </div>
      <?php $project_image = get_field('project-image'); ?>
      <div class="card-column card-column--one-third card-column--has-image" style="background-image: url(<?php echo $project_image['url'] ?>)">
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


