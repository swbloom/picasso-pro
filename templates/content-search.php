<article <?php post_class(); ?>>
  <header class="page-header">
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" class="home-link"><?php the_title(); ?></a></h1>
    <?php if (get_post_type() === 'post') { get_template_part('templates/entry-meta'); } ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
