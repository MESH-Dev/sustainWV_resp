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
						$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$s = get_query_var('s');
						query_posts("s=$s&cat=-8,-14&paged=$page");
					if ( have_posts() ) : ?>
						<div class="panel post">
							<div class="gutter">
								<h3><?php printf( __( 'Search Results for %s' ), '<span class="italic">' . get_search_query() . '</span>'); ?></h3>
							</div>
						</div>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="panel post">
										<div class="gutter clearfix">
											<h3><?php the_title(); ?></h3>
											<?php the_excerpt(); ?>
											<a class="readmore" href="<?php the_permalink(); ?>"></a>
										</div>
									</div>
					<?php endwhile; ?>
					<?php else : ?>
						<div class="panel post">
							<div class="gutter">
								<h3><?php printf( __( 'No Results for %s' ), '<span>' . get_search_query() . '</span>'); ?></h3>
								<p>No results found. Try searching again or checking the navigation to the left and top.</p>
							</div>
						</div>
					<?php endif; ?>
						
						
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