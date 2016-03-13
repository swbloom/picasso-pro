
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
      <?php

      $project_featured = get_field('home-project-featured');

      if( $project_featured ):
        // override $post
        $post = $project_featured;
        setup_postdata( $post );

      ?>
        <div class="home-project">
          <div class="home-project-image">
            <?php $project_feature_image = get_field('project-image') ?>
            <img src="<?php echo $project_feature_image['url'] ?>" alt="<?php echo $project_feature_image['alt'] ?>" />
          </div>
          <div class="home-project-details">
            <p class="home-project-category">Archive</p>
            <a href="<?php the_permalink(); ?>" class="home-project-title"><?php the_title(); ?></a>
            <p class="home-project-length">[<?php the_field('video-year') ?>] <?php the_field('video-length') ?></p>
            <div class="home-project-description">
              <?php the_field('project-short-description');  ?>
            </div>
            <div class="video-links">
              <?php if( get_field('video-link-open') ): ?>
                <a href="#" data-href="https://<?php the_field('video-link-open'); ?>" class="video-link">Watch: with Open Captions</a>
              <?php endif; ?>
              <?php if( get_field('video-audio-open') ): ?>
                <a href="#" data-href="https://<?php the_field('video-audio-open'); ?>" class="video-link">Watch: with Audio Description and Open Captions</a>
              <?php endif; ?>
              <a href="/archives" class="home-link">View more from the Archive</a>
            </div>
          </div>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        </div>
      <?php endif; ?>
      <hr class="rule rule--thick" />
      <div class="featured-content">
        <div class="featured-content-1">
          <?php

          $featured_content_1 = get_field('featured-content-1');

          if( $featured_content_1 ):
            // override $post
            $post = $featured_content_1;
            setup_postdata( $post );

            $post_type = get_post_type($post);

            switch ($post_type) {
              case 'featured-artist':
                $featured_image = get_field('artist-headshot');
               break;

              case 'soapbox-article':
                $featured_image = get_field('article-feature-image');
               break;

              case 'resource':
                // currently no feature image for resources
               break;

              case 'projects':
                $featured_image = get_field('project-image');
               break;

              case 'incubator':
                $featured_image = get_field('incubator-feature-image');
               break;

              case 'soapbox':
                $featured_image = get_field('article-feature-image');
              break;

            }

          ?>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <?php endif; ?>
          <img src="<?php echo $featured_image['url'] ?>" />
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        </div>
        <div class="featured-content-2">
          <?php

          $featured_content_2 = get_field('featured-content-2');

          if( $featured_content_2 ):
            // override $post
            $post = $featured_content_2;
            setup_postdata( $post );

            $post_type = get_post_type($post);

            switch ($post_type) {
              case 'featured-artist':
                $featured_image = get_field('artist-headshot');
               break;

              case 'soapbox-article':
                $featured_image = get_field('article-feature-image');
               break;

              case 'resource':
                // currently no feature image for resources
               break;

              case 'projects':
                $featured_image = get_field('project-image');
               break;

              case 'incubator':
                $featured_image = get_field('incubator-feature-image');
               break;

              case 'soapbox':
                $featured_image = get_field('article-feature-image');
              break;

            }

          ?>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <img src="<?php echo $featured_image['url'] ?>" />
          <?php endif; ?>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        </div>
        <div class="featured-content-3">
          <?php

          $featured_content_3 = get_field('featured-content-3');

          if( $featured_content_3 ):
            // override $post
            $post = $featured_content_3;
            setup_postdata( $post );

            $post_type = get_post_type($post);

            switch ($post_type) {
              case 'featured-artist':
                $featured_image = get_field('artist-headshot');
               break;

              case 'soapbox-article':
                $featured_image = get_field('article-feature-image');
               break;

              case 'resource':
                // currently no feature image for resources
               break;

              case 'projects':
                $featured_image = get_field('project-image');
               break;

              case 'incubator':
                $featured_image = get_field('incubator-feature-image');
               break;

              case 'soapbox':
                $featured_image = get_field('article-feature-image');
              break;

            }

          ?>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <img src="<?php echo $featured_image['url'] ?>" />
          <?php endif; ?>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        </div>
      </div>
