<?php
  if(have_rows('pricing', 'options')):
    echo '<ul id="plans" class="module-pricing">';
    while(have_rows('pricing', 'options')): the_row();
      $plan = get_sub_field('plan');
      $info = get_sub_field('info');
?>
  <li class="pricing-single">
    <?php
      if($plan['name']) { echo '<h1 class="name">' . $plan['name'] . '</h1>'; }
      if($plan['subscribers']) {
        echo '<h2 class="subscribers">' . number_format($plan['subscribers']) . '<span>' . $info['labels']['subscribers_label'] . '</span></h2>';
      } else {
        echo '<h2 class="subscribers">Unlimited' . '<span>' . $info['labels']['subscribers_label'] . '</span></h2>';
      }
      if($plan['icon']) { echo '<div class="icon"><span><img src="' . $plan['icon']['sizes']['small'] . '" alt="" /></span></div>'; }
      if($plan['messages'] || $info['labels']['messages_label']) {
        $messages = '';
        if($plan['messages']) {
          $messages = number_format($plan['messages']);
        } else {
          $messages = 'Unlimited';
        }
        echo '<h3 class="messages">' . $messages . ' Messages<span>(' . $info['labels']['messages_label'] . ')</span></h3>';
      }
      if($info['features']) {
        echo '<ul class="features">';
        foreach($info['features'] as $feature) {
          echo '<li><p><strong>' . $feature['name'] . '</strong>' . $feature['description'] . '</p></li>';
        }
        echo '</ul>';
      }
      if($info['labels']['price_type'] == 'link') {
        $link = $info['labels']['pricing_link'];
        echo '<a href="' . $link['url'] . '" target="' . $link['target'] . '" class="button button-dark pricing-button">' . $link['title'] . '</a>';
      } elseif($info['labels']['price_type'] == 'price' && is_user_logged_in()) {
        echo '<em>This option is not configured yet.</em>';
      }
      if($info['labels']['disclaimer']) {
        echo '<p class="disclaimer">' . $info['labels']['disclaimer'] . '</p>';
      }
    ?>
  </li>
<?php
    endwhile;
    echo '</ul>';
  endif;
?>
