<?php
  get_header();
  if(have_posts()):
    get_template_part('modules/wrap', 'start');
    echo '<article class="blog-single">';
      while(have_posts()): the_post();
      $author = get_the_author_meta('ID');
      $authorName = get_the_author_meta('display_name');
      $authorNameFirst = get_the_author_meta('first_name');
      $authorPhoto = get_field('photo', 'user_' . $author);
      $authorLinkedin = get_field('linkedin', 'user_' . $author);
      $authorBio = get_field('author_bio', 'user_' . $author);
?>
  <header class="blog-single-hero">
    <h1><?php the_title(); ?></h1>
    <h2><?php ex_post_meta('', ''); ?></h2>
  </header>
  <section class="blog-single-content wrap">
    <div class="body">
      <?php the_content(); ?>
    </div>
    <?php if(has_post_thumbnail()): ?>
      <aside class="sidebar">
        <?php the_post_thumbnail('medium'); ?>
        <?php if(function_exists('ADDTOANY_SHARE_SAVE_KIT')) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
      </aside>
    <?php endif; ?>
  </section>
  <footer class="blog-single-author">
    <?php if($authorPhoto): ?>
      <div class="blog-single-author-image">
        <img src="<?php echo $authorPhoto['sizes']['small']; ?>" />
        <?php if($authorLinkedin) { echo '<a href="' . $authorLinkedin . '" target="_blank">LinkedIn</a>'; } ?>
      </div>
    <?php endif; ?>
    <div class="blog-single-author-bio">
      <h3><span>About the Author</span><?php echo $authorName; ?></h3>
      <?php echo $authorBio; ?>
    </div>
  </footer>
<?php
      endwhile;
      echo '</ul>';
    echo '</article>';
    get_template_part('modules/wrap', 'end');
  endif;
  get_footer();
?>
