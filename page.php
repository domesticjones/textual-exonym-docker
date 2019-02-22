<?php
	get_header();
	if(have_posts()): while(have_posts()): the_post();
		get_template_part('modules/wrap', 'start');
			get_template_part('modules/module', 'hero');
		get_template_part('modules/wrap', 'end');
	endwhile; endif;
	get_footer();
?>
