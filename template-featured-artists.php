<?php
/**
 * Template Name: Featured Artists
 */
?>
<?php get_template_part('templates/page', 'header'); ?>
<section class="summary featured-artists-summary">
  <?php the_field('featured-artists-summary'); ?>
</section>
<hr class="rule rule--thick" />
<?php

$current_featured_artist = get_field('current-featured-artist');

if( $current_featured_artist ):

  // override $post
  $post = $current_featured_artist;
  setup_postdata( $post );

  ?>
    <div class="featured-artist">
      <h2 class="featured-artist-name">
        <?php the_title(); ?>
      </h2>
      <div class="featured-artist-columns">
        <div class="featured-artist-column featured-artist-column--two-thirds">
          <div class="featured-artist-description">
            <?php the_field('artist-short-description'); ?>
            <a href="<?php the_permalink() ?>" class="permalink">Read More about <?php the_title(); ?></a>
          </div>
        </div>
        <div class="featured-artist-column featured-artist-column--one-third">
          <div class="featured-artist-headshot">
            <?php $artist_headshot = get_field('artist-headshot'); ?>
            <img src="<?php echo $artist_headshot['url'] ?>" alt="<?php echo $artist_headshot['alt'] ?>" ?>
          </div>
        </div>
      </div>
    </div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
  <?php
    $current_featured_artist_id = get_field('current-featured-artist', $post->ID);
    $featuredArtistsQuery = new WP_QUERY(
      array(
        'post_type' => 'featured-artist',
        'order' => 'DESC',
        'post__not_in' => array($current_featured_artist_id->ID),
        )
  ); ?>
  <?php if ($featuredArtistsQuery->found_posts > 0): ?>
  <hr class="rule rule--thick" />
  <div class="past-artists">
  <h3 class="past-artists-title">Past Featured Artists</h4>
  <div class="past-artist-carousel">
    <?php if ( $featuredArtistsQuery->have_posts() ) : ?>
      <?php while ( $featuredArtistsQuery->have_posts()) : $featuredArtistsQuery->the_post(); ?>
        <div class="past-artist">
          <?php $past_artist_headshot = get_field('artist-headshot'); ?>
          <div class="past-artist-headshot" style="background-image: url(<?php echo $past_artist_headshot['url']; ?>)">
          </div>
          <div class="past-artist-title">
            <?php echo $post->post_title; ?>
          </div>
          <div class="past-artist-link">
            <a href="<?php the_permalink() ?>" class="permalink">Read More about <?php the_title() ?></a>
          </div>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
<?php endif ?>

</div>

