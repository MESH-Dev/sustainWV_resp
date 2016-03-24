<?php get_header(); ?>

<section id="content" class="nine columns interior">
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
				<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<div id="contentPrimary" class="sidebar eight columns">
					<div class="gutter">									
						
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
					</div>
				</div>
				<div id="contentSecondary" class="sidebar four columns">
					<div class="gutter">
						<?php if(get_field('sidebar')): ?>
							<?php while(has_sub_field('sidebar')): ?>
								<div class="panel sidebar">
									<div class="gutter">
										<h3 class="sidebar"><?php the_sub_field('title'); ?></h3>
										<?php the_sub_field('content'); ?>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
				<?php } } ?>
			</div>
		</section>
	</div>

<?php get_footer(); ?>