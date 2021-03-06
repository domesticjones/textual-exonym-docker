<?php
  $cta = get_field('call_to_action', 'options');
  $image = $cta['image'];
  $heading = $cta['content']['heading'];
  $paragraph = $cta['content']['paragraph'];
  if($cta):
?>
  <footer id="demo" class="footer-cta wrap">
    <div class="footer-cta-inner">
      <div class="content">
        <?php
          if($heading) { echo '<h1>' . $heading . '</h1>'; }
          if($paragraph) { echo '<p>' . $paragraph . '</p>'; }
          echo '<div class="cta-wrap">';
          echo do_shortcode('[contact-form-7 id="159" title="Call to Action"]');
            get_template_part('modules/module', 'cta-complete');
          echo '</div>';
        ?>
      </div>
      <div class="image">
        <?php
          if($image) { echo '<img src="' . $image['sizes']['medium'] . '" alt="' . $image['alt'] . '" id="contact-image" />'; }
          get_template_part('modules/module', 'contact');
        ?>
      </div>
    </div>
  </footer>
<?php endif; ?>
