<?php
  if(have_rows('features')):
    echo '<ul id="features" class="features-large">';
    while(have_rows('features')): the_row();
      $content = get_sub_field('content');
      $images = get_sub_field('images');
      $heading = $content['heading'];
      $headingSub = $content['sub_heading'];
      $paragraph = $content['paragraph'];
      $cta = $content['call_to_action'];
      $icon = $images['icon'];
      $image = $images['background'];
?>
  <li class="feature-large">
    <div class="content">
      <?php
        if($heading || $headingSub) { echo '<h1 class="feature-large-heading">'; }
          if($heading) { echo '<span class="heading">' . $heading . '</span>'; }
          if($headingSub) { echo '<span class="heading-sub">' . $headingSub . '</span>'; }
        if($heading || $headingSub) { echo '</h1>'; }
        if($paragraph) { echo '<p>' . $paragraph . '</p>'; }
        if($cta) { echo '<a href="' . $cta['url'] . '" target="' . $cta['target'] . '" class="button button-outline feature-cta">' . $cta['title'] . '</a>'; }
      ?>
    </div>
    <div class="image" style="backgorund-image: url(<?php echo $image['sizes']['medium']; ?>)">
      <?php
        if($image) { echo '<div class="featured-background" style="background-image: url(' . $image['sizes']['small'] . ');"><span>' . $image['alt'] . '</span></div>'; }
        if($icon) { echo '<span class="featured-icon"><img src="' . $icon['sizes']['small'] . '" alt="' . $icon['alt'] . '" /></span>'; }
      ?>
    </div>
  </li>
<?php
    endwhile;
    echo '</ul>';
  endif;
  if(have_rows('features_list')):
    echo '<section class="features-list">';
    while(have_rows('features_list')): the_row();
      $heading = get_sub_field('heading');
      if(have_rows('featured_item')):
        echo '<ul class="feature-row">';
        echo '<li class="feature-row-heading"><h2>' . $heading . '</h2"></li>';
        while(have_rows('featured_item')): the_row();
          $icon = get_sub_field('icon');
          $heading = get_sub_field('heading');
          $description = get_sub_field('description');
?>
  <li class="featured-list-single">
    <?php
      if($icon) { echo '<span class="featured-icon"><img src="' . $icon['sizes']['small'] . '" alt="' . $icon['alt'] . '" /></span>'; }
      if($heading) { echo '<h3>' . $heading . '</h3>'; }
      if($description) { echo '<p>' . $description . '</p>'; }
    ?>
  </li>
<?php
        endwhile;
        echo '</ul>';
      endif;
    endwhile;
    echo '</section>';
  endif;
