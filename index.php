<?php
  $blog = get_option('page_for_posts');
  get_header();
  if(have_posts()):
    get_template_part('modules/wrap', 'start');
    $title = get_field('blog_heading', $blog);
    $description = get_field('blog_description', $blog);
    $background = get_field('blog_heading_image', $blog);
    echo '<section class="blog-index">';
      echo '<header class="blog-index-hero" style="background-image: url(' . $background['sizes']['large'] . ');"><h1>' . $title . '</h1><p>' . $description . '</p></header>';
      echo '<ul class="blog-index-wrap">';
      while(have_posts()): the_post();
?>
<li class="blog-index-single">
  <a href="<?php the_permalink(); ?>" class="blog-index-single-image" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>)">
    <?php the_post_thumbnail('medium'); ?>
  </a>
  <div class="blog-index-single-data">
    <h2><?php the_title(); ?></h2>
    <h3><?php ex_post_meta('', ''); ?></h3>
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="button button-outline feature-cta">Read Article</a>
  </div>
</li>
<?php
      endwhile;
      echo '</ul>';
    echo '</section>';
    get_template_part('modules/wrap', 'end');
  endif;
  get_footer();
?>
