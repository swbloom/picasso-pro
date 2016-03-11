
<!-- Escape the wrapper! -->
</div></div></main>

<div class="headline-marquee">
  <?php $marquee_image = get_field('marquee-image'); ?>
  <div class="headline-marquee-image" style="background-image: url(<?php echo $marquee_image['url'] ?>)" alt="<?php echo $marquee_image['alt']; ?>">

  </div>
  <div class="headline-marquee-text">
    <div class="marquee-text-innerwrapper">
      <h1>
        <?php the_field('marquee-headline') ?>
      </h1>
      <h2>
        <?php the_field('marquee-subtitle') ?>
      </h2>
      <div class="headline-marquee-caption">
        <p>
          <?php the_field('marquee-caption') ?>
        </p>
        <?php $marquee_caption_image = get_field('marquee-caption-image'); ?>
        <img src="<?php echo $marquee_caption_image['url'] ?>" alt="<?php echo $marquee_caption_image['alt']; ?>" />
      </div>
    </div>
  </div>
</div>

<!-- Quick! Back to the wrapper! -->
<div class="wrap container" role="document">
  <div class="content row">
    <main class="main">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/page', 'header'); ?>
        <?php get_template_part('templates/content', 'page'); ?>
      <?php endwhile; ?>
