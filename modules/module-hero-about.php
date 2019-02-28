<?php
  if(have_rows('about_hero')):
    $photo = get_field('about_hero_image');
    echo '<section id="about" class="module-hero-about">';
    echo '<div class="hero-about-photo" style="background-image: url(' . $photo['sizes']['large'] . ')">' . wp_get_attachment_image($photo['ID'], 'large') . '</div>';
    echo '<div class="hero-about-content">';
    while(have_rows('about_hero')): the_row();
      if(get_row_layout() == 'heading') {
        echo '<h1 class="hero-about-heading hero-about-item">' . get_sub_field('about_heading') . '</h1>';
      } elseif(get_row_layout() == 'paragraph') {
        echo '<p class="hero-about-paragraph hero-about-item">' . get_sub_field('about_paragraph') . '</p>';
      } elseif(get_row_layout() == 'quote') {
        $quote = get_sub_field('about_quote');
        $info = $quote['info'];
        $cite = '';
        if($info['name']) {
          $cite = '&#126; ' . $info['name'];
          if($info['position']) {
            $cite .= ', ' . $info['position'];
          }
        }
        echo '<blockquote class="hero-about-quote hero-about-item"><q>' . $quote['quote'] . '</q><cite>' . $cite . '</cite></blockquote>';
      }
    endwhile;
    echo '</div></section>';
  endif;
?>
