<section class="module-stats">
<?php
  $photo = get_field('stats_photo');
  echo '<div class="stats-photo"><img src="' . $photo['sizes']['medium'] . '" alt="' . $photo['alt'] . '" /></div>';
  if(have_rows('stats')):
    echo '<div class="stats-data">';
    while(have_rows('stats')): the_row();
      if(get_row_layout() == 'large_stats') {
        if(have_rows('stats_rows')):
          echo '<ul class="stats-large">';
          while(have_rows('stats_rows')): the_row();
            $fill = get_sub_field('fill_percent');
            $number = get_sub_field('display_number');
            $metric = get_sub_field('display_metric');
?>
  <li class="stat-large">
    <div class="stat-large-pie">
      <svg viewBox="0 0 36 36" class="stat-pie">
        <path class="stat-pie-track"
          d="M18 2.0845
            a 15.9155 15.9155 0 1 0 0 31.831
            a 15.9155 15.9155 0 1 0 0 -31.831"
        />
        <path class="stat-pie-fill animate-on-enter animate-on-leave"
          stroke-dasharray="<?php echo $fill; ?>, 100"
          d="M18 2.0845
            a 15.9155 15.9155 0 1 0 0 31.831
            a 15.9155 15.9155 0 1 0 0 -31.831"
        />
        <text x="17" y="21.35" class="stat-pie-figure"><?php echo $number; ?></text>
        <text x="22.5" y="17.15" class="stat-pie-figure-metric"><?php echo $metric; ?></text>
      </svg>
    </div>
    <div class="stat-large-text">
      <?php
      if(have_rows('data_lines')):
        while(have_rows('data_lines')): the_row();
          $size = get_sub_field('size');
          $text = get_sub_field('text');
          echo '<div class="stat-large-line stat-large-line-size-' . $size . '">' . $text . '</div>';
        endwhile;
      endif;
      ?>
    </div>
  </li>
<?php
          endwhile;
          echo '</ul>';
        endif;
      } elseif(get_row_layout() == 'compact_stats') {
        if(have_rows('stats_columns')):
          echo '<ul class="stats-compact">';
          while(have_rows('stats_columns')): the_row();
            $fill = get_sub_field('fill_percent');
            $number = get_sub_field('display_number');
            $metric = get_sub_field('display_metric');
            $name = get_sub_field('stat_name');
?>
  <li class="stat-compact">
    <div class="stat-compact-pie">
      <svg viewBox="0 0 36 36" class="stat-pie">
        <path class="stat-pie-track"
          d="M18 2.0845
            a 15.9155 15.9155 0 1 0 0 31.831
            a 15.9155 15.9155 0 1 0 0 -31.831"
        />
        <path class="stat-pie-fill animate-on-enter animate-on-leave"
          stroke-dasharray="<?php echo $fill; ?>, 100"
          d="M18 2.0845
            a 15.9155 15.9155 0 1 0 0 31.831
            a 15.9155 15.9155 0 1 0 0 -31.831"
        />
        <text x="17" y="21.35" class="stat-pie-figure"><?php echo $number; ?></text>
        <text x="22" y="17.35" class="stat-pie-figure-metric"><?php echo $metric; ?></text>
      </svg>
    </div>
    <div class="stat-compact-text"><?php echo $name; ?></div>
  </li>
<?php
          endwhile;
          echo '</ul>';
        endif;
      } elseif(get_row_layout() == 'paragraph') {
        echo '<p class="stats-paragraph">' . get_sub_field('text') . '</p>';
      } elseif(get_row_layout() == 'sources') {
        $count = count(get_sub_field('source_list'));
        $plural = 'Source: ';
        $sources = [];
        if($count > 1) {
          $plural = 'Sources: ';
        }
        if(have_rows('source_list')):
          echo '<p class="stats-sources">' . $plural;
          while(have_rows('source_list')): the_row();
            $link = get_sub_field('link');
            $linkBuild = '<a href="' . $link['url'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>';
            array_push($sources, $linkBuild);
          endwhile;
          echo implode(', ', $sources);
          echo '</p>';
        endif;
      }
    endwhile;
    echo '</div>';
  endif;
?>
</section>
