<?php
  get_header();
  if(have_posts()):
    get_template_part('modules/wrap', 'start');
    echo '<article class="blog-single">';
      while(have_posts()): the_post();
?>
  <header class="blog-single-hero">
    <h1><?php the_title(); ?></h1>
    <h2><?php ex_post_meta('', ''); ?></h2>
    <?php the_post_thumbnail('large'); ?>
  </header>
  <section class="blog-single-content">
    <?php the_content(); ?>
  </section>
<?php
      endwhile;
      echo '</ul>';
    echo '</article>';
    get_template_part('modules/wrap', 'end');
  endif;
  get_footer();
?>
