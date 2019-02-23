<?php
	get_header();
	if(have_posts()): while(have_posts()): the_post();
		get_template_part('modules/wrap', 'start');
			get_template_part('modules/module', 'hero');
			get_template_part('modules/module', 'features');
			get_template_part('modules/module', 'stats');
			get_template_part('modules/module', 'pricing');
		get_template_part('modules/wrap', 'end');
	endwhile; endif;
	get_footer();
?>
