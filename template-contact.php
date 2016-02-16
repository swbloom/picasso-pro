<?php
/**
 * Template Name: Contact Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<div class="contact-wrapper">
  <div class="contact-groups">
  <?php if (have_rows('contact-groups')):

    while( have_rows('contact-groups') ) : the_row();

      $group_name = get_sub_field('group-name');
      $group_description = get_sub_field('group-description');

      ?>
      <div class="contact-group">
        <h2 class="contact-group-header"><?php echo $group_name ?></h2>
        <div class="contact-group-body"><?php echo $group_description ?></div>
      </div>
    <?php endwhile; ?>
  <?php endif ?>
  </div>
  <div class="contact-image">
    <?php $feature_image = get_field('feature-image') ?>
    <img src="<?php echo $feature_image['url'] ?>" alt="<?php echo $feature_image['alt'] ?>" />
  </div>
</div>
