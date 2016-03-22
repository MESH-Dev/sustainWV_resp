<?php get_header(); ?>

<section id="content" class="interior">
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

									<div class="panel post blogpost">
										<div class="gutter clearfix">
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="featimg">
												<?php the_post_thumbnail('large'); ?>
											</div>
											<span class="metaleft"><?php the_category(); ?></span>
											<span class="metaright"><?php the_tags(); ?></span>
											<div class="postcontent"><?php the_excerpt(); ?></div>
											<a class="readmore" href="<?php the_permalink(); ?>"></a>
										</div>
									</div>

						<?php } } ?>


					</div>
				</div>
				<div id="contentSecondary">
					<div class="gutter">
						<?php dynamic_sidebar('blog-sidebar'); ?>
					</div>
				</div>
			</div>
		</section>
	</div>

<?php get_footer(); ?>