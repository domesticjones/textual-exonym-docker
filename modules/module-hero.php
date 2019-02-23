<?php
  $images = get_field('hero_images');
  $randHero = $images[array_rand($images)];
  $bgImage = wp_get_attachment_image_src($randHero['background']['ID'], 'jumbo');
  $bgDevice = wp_get_attachment_image_src($randHero['device']['ID'], 'large');
  if($images):
    $tagline = get_field('hero_tagline');
    $heading = get_field('hero_heading');
    $content = get_field('hero_content');
?>
  <header class="module-hero">
    <div class="hero-background" style="background-image: url(<?php echo $bgImage[0]; ?>);"><span>Image of user on a mobile device</span></div>
    <div class="hero-content">
      <h1 class="hero-heading">
        <?php
          if($tagline) { echo '<span class="tagline">' . $tagline . '</span>'; }
          if($heading) { echo '<span class="heading">' . $heading . '</span>'; }
        ?>
      </h1>
      <?php
        if($content) { echo '<div class="content">' . $content . '</div>'; }
        echo '<div class="cta-wrap">';
        echo do_shortcode('[contact-form-7 id="160" title="Call to Action (Hero)"]');
          get_template_part('modules/module', 'cta-complete');
        echo '</div>';
      ?>
    </div>
    <div class="hero-device">
      <?php if($bgDevice) { echo '<img src="' . $bgDevice[0] . '" alt="Textual Shop By Text mock up" />'; } ?>
    </div>
  </header>
<?php endif; ?>
