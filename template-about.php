<?php
/**
 * Template Name: About Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
<?php endwhile; ?>

<div class="about-wrapper">
  <!-- About Summary -->
  <div class="about-summary">
    <?php the_field('about-summary') ?>
  </div>
  <!-- About Feature Image -->
  <div class="about-feature">
    <?php $feature_image = get_field('about-feature-image') ?>
    <img src="<?php echo $feature_image['url'] ?>" alt="<?php echo $feature_image['alt'] ?>" />
  </div>
</div>
<!-- Temporarily Escape the Container -->
</div></div></div>

<!-- Mission Statement -->
<div class="mission">
  <div class="mission-wrapper">
    <h2 class="mission-title"><?php the_field('mission-statement-title') ?></h2>
    <div class="mission-description"><?php the_field('mission-statement-description') ?></div>
  </div>
</div>

<!-- Quick! Back to the container! -->
<div class="wrap container">
  <div class="content row">
    <div class ="main">

<!-- Site Makers -->
      <div class="site-makers">
        <h2>Site Makers</h2>
        <?php if (have_rows('site-makers')):

          while( have_rows('site-makers') ) : the_row();

            $maker_role = get_sub_field('maker-role');
            $maker_name = get_sub_field('maker-name');

            ?>
              <p><?php echo $maker_role ?>: <?php echo $maker_name ?></p>
          <?php endwhile; ?>
        <?php endif ?>
      </div>
  </div>
