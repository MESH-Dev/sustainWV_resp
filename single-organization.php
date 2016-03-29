<?php get_header(); ?>
<section id="content" class="interior nine columns">
			<div class="gutter clearfix">
				<nav>
					<?php
					if ( has_nav_menu( 'mainNav' ) ) {
						$defaults = array(
						'theme_location'  => 'mainNav',
						'menu'            => 'mainNav',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'topNav clearfix',
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
					<div class="crossbar"></div>
				</nav>
				<div id="contentPrimary">
					<div class="gutter">
						<?php
							if ( have_posts() ) {
								while ( have_posts() ) {
									the_post(); ?>

									<h2 class="col"><?php the_title(); ?></h2>
									<div id="intro" class="panel small stint">
										<div class="gutter">
											<p><?php the_field('intro'); ?></p>
										</div>
									</div>
									<div id="core" class="panel small">
										<div class="gutter">
											<?php the_content(); ?>
										</div>
									</div>

								<?php } } ?>



					</div>
				</div>
				<div id="contentSecondary">
					<div class="gutter">

					</div>
				</div>
			</div>
		</section>
	</div>

<?php get_footer(); ?>