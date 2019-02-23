<?php get_template_part('modules/module-cta', 'demo'); ?>
		</div>
		<footer id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
			<div class="wrap">
				<div class="footer-column first">
					<img src="<?php ex_logo('primary', 'light'); ?>" alt="Logo for <?php ex_brand('legal'); ?>" />
					<p class="copyright">&copy; <?php echo date('Y '); ex_brand('legal'); ?></p>
					<?php wp_nav_menu(array(
						'container' => 'ul',                    // enter '' to remove nav container
						'menu' => __('Legal', 'exonym'),	      // nav name
						'menu_class' => 'footer-nav',    // adding custom nav class
						'theme_location' => 'legal-menu',		  // where it's located in the theme
						'before' => '',							            // before the menu
						'after' => '',							            // after the menu
						'link_before' => '',					          // before each link
						'link_after' => '',						          // after each link
						'depth' => 1,							              // limit the depth of the nav
						'fallback_cb' => ''						          // fallback function
					)); ?>
				</div>
				<div class="footer-column">
					<nav class="nav-footer" role="navigation">
						<?php wp_nav_menu(array(
							'container' => 'ul',                    // enter '' to remove nav container
							'menu' => __('Footer', 'exonym'),	      // nav name
							'menu_class' => 'nav footer-nav cf',    // adding custom nav class
							'theme_location' => 'footer-menu',		  // where it's located in the theme
							'before' => '',							            // before the menu
							'after' => '',							            // after the menu
							'link_before' => '',					          // before each link
							'link_after' => '',						          // after each link
							'depth' => 1,							              // limit the depth of the nav
							'fallback_cb' => ''						          // fallback function
						)); ?>
					</nav>
				</div>
				<div class="footer-column">
					<ul class="nav-footer-secondary">
						<li><a href="<?php ex_clientportal('url'); ?>" target="<?php ex_clientportal('target'); ?>"><?php ex_clientportal('title'); ?></a></li>
						<li><a href="#contact">Submit Enquiry</a></li>
						<li><a href="#demo">Request Demo</a></li>
					</ul>
				</div>
				<div class="footer-column last">
					<a href="<?php ex_clientportal('url'); ?>" target="<?php ex_clientportal('target'); ?>" class="button button-dark button-portal-footer"><?php ex_clientportal('title'); ?></a>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
