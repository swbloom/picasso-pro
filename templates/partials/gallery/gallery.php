<hr class="rule rule--medium" />
  <div class="gallery">
    <div class="gallery-title">
      Image Gallery
    </div>

    <?php

    $images = get_field('image-gallery');

    if( $images ): ?>
        <ul class="gallery-images">
            <?php foreach( $images as $image ): ?>
                <li>
                    <a href="<?php echo $image['url']; ?>">
                         <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </a>
                    <p><?php echo $image['caption']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
  </div>
