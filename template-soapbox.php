<?php
/**
 * Template Name: Soapbox
 */
?>
<!-- Escape the container for full bleed -->
</div></div></div>
<section class="soapbox-marquee">
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
</section>

<!-- Small hack, going back into the container -->
<span>
  <div class="wrap container">
    <div class="content row">
      <div class="main">
        <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>'); ?>
        <!-- <aside class="soapbox-cta">
          <h2 class="soapbox-cta-title">Talk to us!</h2>
          <p>Leave us a comment if you’d like to continue the conversation. Tweet or post to FB with the sharing icons above each post.  <a href="mailto:picassoprohub@gmail.com" class="soapbox-cta-link">Send us an email</a> if you would like to be considered as a candidate to have your own post in this space.</p>
        </aside> -->
        <?php
          $soapboxQuery = new WP_QUERY(
            array(
              'post_type' => 'soapbox-article',
              'order' => 'DESC'
              )
        ); ?>

        <section class="soapbox-wrapper">
        <?php if ( $soapboxQuery->have_posts() ) : ?>
          <?php while ( $soapboxQuery->have_posts()) : $soapboxQuery->the_post(); ?>
            <article id="<?php echo $post->post_name; ?>">
              <a href="<?php the_permalink() ?>"><h2 class="article-title"><?php the_title(); ?></h2></a>
              <div class="article-credits">
                <p class="article-date"><?php the_date(); ?> - <?php the_field('article-author'); ?></p>
              </div>
              <div class="article-featured-image">
                <?php $article_feature_image = get_field('article-feature-image'); ?>
                <img src="<?php echo $article_feature_image['url'] ?>" alt="<?php echo $article_feature_image['alt'] ?>" ?>
              </div>
              <div class="article-excerpt">
                <?php the_field('article-excerpt') ?>
              </div>
              <a href="<?php the_permalink() ?>" class="article-readmore">Read More about <?php the_title() ?></a>
            </article>
            <hr class="rule rule--thick">
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
    </div>
  </span>
  </div>
