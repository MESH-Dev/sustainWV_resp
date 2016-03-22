<?php include_once('sidebar-bg.gif');?>
 <footer id="footer">
		<div class="container">
			<div class="gutter clearfix">
				<?php
					if ( has_nav_menu( 'mainNav' ) ) {
						$defaults = array(
						'theme_location'  => 'mainNav',
						'menu'            => 'mainNav',
						'container'       => 'nav',
						'container_class' => 'two columns', //col1
						'container_id'    => 'col1',
						'menu_class'      => 'menu oswald clearfix',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					);	wp_nav_menu( $defaults ); } ?>
				<nav id="col2" class="two columns"> <!-- col -->
					<?php
					if ( has_nav_menu( 'topNav' ) ) {
						$defaults = array(
						'theme_location'  => 'topNav',
						'menu'            => 'topNav',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'menu stint',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					);	wp_nav_menu( $defaults ); } ?>
				</nav>
				<div id="col3" class="two columns"> <!-- col -->
					<?php dynamic_sidebar('footerabout'); ?>
				</div>
				<div id="col4" class="two columns"> <!-- col -->
					<?php dynamic_sidebar('footernewsletter'); ?>
				</div>
				<div id="col5" class='two columns'> 
					<h4>Connect</h4>
					<?php
						if ( has_nav_menu( 'social' ) ) {
							$defaults = array(
								'theme_location'  => 'social',
								'menu'            => 'social',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'social two columns',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 0,
								'walker'          => ''
							);	wp_nav_menu( $defaults ); } ?>


              <a href="http://www.bridgevalley.edu/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/bv-logo.png" class="footer-logo" /></a>

				</div>
			</div>
		</div>
		<div id="footerSearch">
		<div class="container">
			<div class="gutter clearfix">
				 <?php get_search_form(); ?>
			</div>
		</div>
	</div>
	</footer>

<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66206223-2', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
