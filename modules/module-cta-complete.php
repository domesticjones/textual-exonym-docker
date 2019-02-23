<section class="cta-followup">
  <?php
  if(have_rows('followup_steps', 'options')):
    echo '<ul class="cta-followup-steps">';
    $count = 0;
    while(have_rows('followup_steps', 'options')): the_row(); $count++
    ?>
<li class="cta-followup-step">
  <span class="number<?php if(get_sub_field('done')) { echo ' complete'; } ?>"><?php echo $count; ?></span>
  <p class="step">
    <strong><?php the_sub_field('step'); ?></strong>
    <em><?php if(get_sub_field('done')) { echo 'Complete'; } else { echo 'Pending'; } ?></em>
  </p>
</li>
<?php
    endwhile;
    echo '</ul>';
  endif;
?>
<a href="#contact" class="button button-dark button-cta-contact">Send Textual a Message</a>
</section>
