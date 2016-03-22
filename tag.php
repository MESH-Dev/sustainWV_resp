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
							if ( have_posts() ) : ?>
								<div class="panel post">
									<div class="gutter">
										<h3>Posts tagged: <?php single_tag_title(); ?></h3>
									</div>
								</div>
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="panel post">
										<div class="gutter clearfix">
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<span class="metaleft">Category: <?php the_category(); ?></span>
											<span class="metaright"><?php the_tags(); ?></span>
											<div class="postcontent"><?php the_excerpt(); ?></div>
											<a class="readmore" href="<?php the_permalink(); ?>"></a>
										</div>
									</div>
							<?php endwhile; ?>
							<?php else : ?>
								<div class="panel post">
									<div class="gutter">
										<p>That tag doesn't exist. Sorry about that. Maybe you misspelled it or you could try searching for it.</p>
									</div>
								</div>
							<?php endif; ?>
						
						
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