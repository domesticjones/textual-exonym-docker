<?php
  $heading = get_field('founders_heading');
  if(have_rows('founders')):
    echo '<section id="founders" class="module-founders"><div class="wrap">';
    echo '<h1 class="founders-heading">' . $heading . '</h1>';
    echo '<ul class="founders-list">';
    while(have_rows('founders')): the_row();
      $photo = get_sub_field('photo');
      $founder = get_sub_field('founder');
      $bio = get_sub_field('bio');
?>
  <li class="founder">
    <div class="founder-photo">
      <span class="founder-picture" style="background-image: url(<?php echo $photo['sizes']['thumbnail-medium']; ?>)">
        <?php echo wp_get_attachment_image($photo['ID'], 'thumbnail-medium'); ?>
      </span>
      <a href="<?php echo $founder['linkedin']['url']; ?>" target="<?php echo $founder['linkedin']['target']; ?>" class="founder-linkedin">
        <span><?php echo $founder['linkedin']['title']; ?></span>
      </a>
    </div>
    <div class="founder-info">
      <h2 class="founder-name"><?php echo $founder['name']; ?></h2>
      <p class="founder-bio"><?php echo $bio; ?></p>
    </div>
  </li>
<?php
    endwhile;
    echo '</ul></div></section>';
  endif;
?>
