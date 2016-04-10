
<!-- Escape the wrapper! -->
</div></div></main>

<div class="headline-marquee" id="content-main">
  <?php

  $images = get_field('marquee-images');
  $rand = array_rand($images, 1);

  ?>

  <div class="headline-marquee-image" style="background-image: url(<?php echo $images[$rand]['url'] ?>)" alt="<?php echo $images[$rand]['alt']; ?>">
    <span class="screen-reader-text"><?php echo $images[$rand]['alt']; ?></span>
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
          <a href="https://vimeo.com/158112085">
          <img src="<?php echo $marquee_caption_image['url'] ?>" alt="<?php echo $marquee_caption_image['alt']; ?>" />
          </a>
        </div>
        </a>
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
          <a href="<?php the_permalink() ?>">
            <div class="home-project-image">
              <?php $project_feature_image = get_field('project-image') ?>
              <img src="<?php echo $project_feature_image['url'] ?>" alt="<?php echo $project_feature_image['alt'] ?>" />
            </div>
          </a>
          <div class="home-project-details">
            <p class="home-project-category">Archive</p>
            <a href="<?php the_permalink(); ?>" class="home-project-title"><?php the_title(); ?></a>
            <p class="home-project-length">[<?php the_field('video-year') ?>] <?php the_field('video-length') ?></p>
            <div class="home-project-description">
              <?php the_field('project-short-description');  ?>
            </div>
            <div class="video-links">
              <?php if( get_field('video-link-open') ): ?>
                <?php $permalink = substr(get_permalink(), 0, -1); ?>
                <div class="video-link-container">
                  <img src="<?php echo get_template_directory_uri() ?>/dist/images/icon-camera.png" alt="a small image of a camera" />
                  <a href="<?php echo $permalink ?>#video?open_captions" class="video-link">Watch <?php the_title() ?> with Open Captions</a>
                </div>
              <?php endif; ?>
              <?php if( get_field('video-audio-open') ): ?>
                <div class="video-link-container">
                  <img src="<?php echo get_template_directory_uri() ?>/dist/images/icon-camera.png" alt="a small image of a camera" />
                  <a href="<?php the_permalink(); ?>#video?audio_description" data-href="https://<?php the_field('video-audio-open'); ?>" class="video-link">Watch <?php the_title() ?> with Audio Description and Open Captions</a>
                </div>
              <?php endif; ?>
              <a href="/archive" class="home-link">View more from the Archive</a>
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
                $featured_image = get_field('resource-feature-image');
               break;

              case 'projects':
                $featured_image = get_field('project-image');
               break;

              case 'incubator':
                $incubator_post = true;
                $featured_image = get_field('incubator-feature-image');
               break;

              case 'soapbox':
                $featured_image = get_field('article-feature-image');
              break;

            }

          ?>
          <?php $post_type = get_post_type_object( get_post_type($post) ); ?>
          <?php if ($post_type->name == 'resource') { ?>
            <?php $resource = get_field('resource') ?>
              <a download="" href="<?php echo $resource['url'] ?>">
          <?php } else if ($post_type->name == 'incubator') { ?>
              <a href="./incubator">
          <?php } else { ?>
              <a href"<?php the_permalink() ?>">
          <?php } ?>
          <div class="feature-content-image" style="background-image: url('<?php echo $featured_image['url'] ?>')">
          </div>
          <p class="feature-content-category" />
          <?php echo $post_type->label ; ?>
          </p>
          <p class="feature-content-title"><?php the_title(); ?></p>
          
            <!-- <a download="" href="<?php echo $resource['url'] ?>" class="feature-content-link">Download Resource</a> -->
            <!-- <a href="<?php the_permalink(); ?>" class="feature-content-link">Read More </a> -->
          <?php endif; ?>
          </a>
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
                $featured_image = get_field('resource-feature-image');
               break;

              case 'projects':
                $featured_image = get_field('project-image');
               break;

              case 'incubator':
                $incubator_post = true;
                $featured_image = get_field('incubator-feature-image');
               break;

              case 'soapbox':
                $featured_image = get_field('article-feature-image');
              break;

            }

          ?>
          <?php $post_type = get_post_type_object( get_post_type($post) ); ?>
          <?php if ($post_type->name == 'resource') { ?>
            <?php $resource = get_field('resource') ?>
              <a download="" href="<?php echo $resource['url'] ?>">
          <?php } else if ($post_type->name == 'incubator') { ?>
              <a href="./incubator">
          <?php } else { ?>
              <a href"<?php the_permalink() ?>">
          <?php } ?>
          <div class="feature-content-image" style="background-image: url('<?php echo $featured_image['url'] ?>')">
          </div>
          <p class="feature-content-category" />
          <?php echo $post_type->label ; ?>
          </p>
          <p class="feature-content-title"><?php the_title(); ?></p>
          <?php if ($post_type->name == 'resource') { ?>
            <?php $resource = get_field('resource') ?>
            <!-- <a download="" href="<?php echo $resource['url'] ?>" class="feature-content-link">Download Resource "<?php the_title() ?>"</a> -->
          <?php } else { ?>
            <!-- <a href="<?php the_permalink(); ?>" class="feature-content-link">Read More about <?php the_title() ?></a> -->
          <?php } ?>
          <?php endif; ?>
          </a>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
          </a>
        </div>
        <div class="featured-content-3">
          <a href="<?php the_permalink() ?>">

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
                $featured_image = get_field('resource-feature-image');
               break;

              case 'projects':
                $featured_image = get_field('project-image');
               break;

              case 'incubator':
                $incubator_post = true;
                $featured_image = get_field('incubator-feature-image');
               break;

              case 'soapbox':
                $featured_image = get_field('article-feature-image');
              break;

            }

          ?>
          <?php $post_type = get_post_type_object( get_post_type($post) ); ?>
          <?php if ($post_type->name == 'resource') { ?>
            <?php $resource = get_field('resource') ?>
              <a download="" href="<?php echo $resource['url'] ?>">
          <?php } else if ($post_type->name == 'incubator') { ?>
              <a href="./incubator">
          <?php } else { ?>
              <a href"<?php the_permalink() ?>">
          <?php } ?>
          <div class="feature-content-image" style="background-image: url('<?php echo $featured_image['url'] ?>')">
          </div>
          <p class="feature-content-category" />
          <?php echo $post_type->label ; ?>
          </p>
          <p class="feature-content-title"><?php the_title(); ?></p>
          <?php if ($post_type->name == 'resource') { ?>
            <?php $resource = get_field('resource') ?>
            <!-- <a download="" href="<?php echo $resource['url'] ?>" class="feature-content-link">Download Resource "<?php the_title() ?>"</a> -->
          <?php } else { ?>
            <!-- <a href="<?php the_permalink(); ?>" class="feature-content-link">Read More about <?php the_title() ?></a> -->
          <?php } ?>
          <?php endif; ?>
          </a>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        </div>
      </div>
      <hr class="rule rule--thick" />
      <div class="featured-content-4">
        <?php

        $featured_content_4 = get_field('featured-content-4');

        if( $featured_content_4 ):
          // override $post
          $post = $featured_content_4;
          setup_postdata( $post );

          $post_type = get_post_type($post);

          switch ($post_type) {
            case 'featured-artist':
              $featured_image = get_field('artist-headshot');
              $excerpt = get_field('featured-artists-summary');
             break;

            case 'soapbox-article':
              $featured_image = get_field('article-feature-image');
              $excerpt = get_field('article-excerpt');
             break;

            case 'resource':
              // currently no feature image for resources
              $excerpt = get_field('resource-summary');
             break;

            case 'projects':
              $featured_image = get_field('project-image');
              $excerpt = get_field('project-short-description');
             break;

            case 'incubator':
              $incubator_post = true;
              $featured_image = get_field('incubator-feature-image');
              $excerpt = get_field('incubator-project-description');
             break;

            case 'soapbox':
              $featured_image = get_field('article-feature-image');
              $excerpt = get_field('soapbox-summary');
            break;

          }

        ?>
        <?php $excerpt = (strlen($excerpt) > 800) ? substr($excerpt,0,800).'...' : $excerpt; ?>
        <div class="column">
          <p class="feature-content-category" />
          <?php $post_type = get_post_type_object( get_post_type($post) );
          echo $post_type->label ; ?>
          </p>
          <p class="feature-content-title"><?php the_title(); ?></p>
          <div class="feature-content-description"><?php echo $excerpt ?></div>
          <?php if ($post_type->name == 'resource') { ?>
            <?php $resource = get_field('resource') ?>
            <a download="" href="<?php echo $resource['url'] ?>" class="feature-content-link">Download Resource</a>
          <?php } else if ($post_type->name == 'incubator') { ?>
            <a href="./incubator" class="feature-content-link">Read More about <?php the_title() ?></a>
          <?php } else { ?>
            <a href="<?php the_permalink() ?>" class="feature-content-link">Read More about <?php the_title() ?></a>
          <?php } ?>
        </div>
        <div class="column">
          <div class="feature-content-image" style="background-image: url('<?php echo $featured_image['url'] ?>')">
          </div>
        </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      </div>

