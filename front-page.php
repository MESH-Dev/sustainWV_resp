<?php get_header(); ?>

<?php //truly the home page ?>
<section id="content" class="nine columns">
			<div class="gutter clearfix shaun">
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
						<?php if(has_post_thumbnail()){ ?>
							<div id="feature">
								<div class="caption">
									<?php the_post_thumbnail_caption(); ?>
								</div>
								<?php echo get_the_post_thumbnail(null, 'banner'); ?>
							</div>
						<?php } ?>
						<div id="callouts">
							<div class="row">
							<?php
								if(get_field('callout_boxes'))
									{
										$counter = 0;
										while(has_sub_field('callout_boxes'))
										{ ?>
											<div class="four columns callout_container <?php if($counter == 0){ //onethird 
													echo 'first';
												}else if($counter == 2){
													echo 'last';
												} ?>">
												<a href="http://<?php echo get_sub_field('callout_link'); ?>">
													<div class="gutter">
														<span class="title"><?php echo get_sub_field('callout_heading'); ?></span>
														<p><?php echo get_sub_field('callout_details'); ?></p>
													</div>
												</a>
											</div>
										<?php $counter++; ?>
									<?php } } ?>
							</div>
						</div>
					</div>
				</div>
				<div id="contentSecondary" class="hex-tiles home">
					<?php if(get_field('seemore') ){ ?>
						<a href="http://<?php the_field('seemore'); ?>"><div class="seemore">See More Here</div></a>
					<?php } ?>
					<div class="gutter clearfix">
						<h2>Sustainable WV Resources</h2>
						<div class="hex-rowodd">
							<?php
								$args = array( 'post_type' => 'resources',
											 'posts_per_page' => 3 );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<div data-rollover="<?php echo the_field('hex_image'); ?>" class="checker hex <?php echo get_post_type(get_the_ID()); ?>">
										<div class="gutter">
											<a href="http://<?php echo get_field('resource_url'); ?>">
												<h4><?php the_title(); ?></h4>
												<?php the_excerpt(); ?>
												<a href="http://<?php echo get_field('resource_url'); ?>" class="readmore">Contact Us</a>
											</a>
										</div>
									</div>
								<?php endwhile; wp_reset_query();?>
						</div>

						<div class="hex-roweven">
							<?php
								$args = array( 'post_type' => 'resources',
											 'posts_per_page' => 3, 'offset' => 3 );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<div data-rollover="<?php echo the_field('hex_image'); ?>" class="checker hex <?php echo get_post_type(get_the_ID()); ?>">
										<div class="gutter">
											<a href="http://<?php echo get_field('resource_url'); ?>">
												<h4><?php the_title(); ?></h4>
												<?php the_excerpt(); ?>
												<a href="http://<?php echo get_field('resource_url'); ?>" class="readmore">Read More</a>
											</a>
										</div>
									</div>
								<?php endwhile; wp_reset_query();?>
						</div>

						<div class="hex-rowodd">
							<?php
								$args = array( 'post_type' => 'resources',
											 'posts_per_page' => 3, 'offset' => 6 );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<div data-rollover="<?php echo the_field('hex_image'); ?>" class="checker hex <?php echo get_post_type(get_the_ID()); ?>">
										<div class="gutter">
											<a href="http://<?php echo get_field('resource_url'); ?>">
												<h4><?php the_title(); ?></h4>
												<?php the_excerpt(); ?>
												<a href="http://<?php echo get_field('resource_url'); ?>" class="readmore">Read More</a>
											</a>
										</div>
									</div>
								<?php endwhile; wp_reset_query();?>
						</div>

						<div class="hex-roweven last">
							<?php
								$args = array( 'post_type' => 'resources',
											 'posts_per_page' => 1, 'offset' => 9 );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<div data-rollover="<?php echo the_field('hex_image'); ?>" class="checker hex <?php echo get_post_type(get_the_ID()); ?>">
										<div class="gutter">
											<a href="http://<?php echo get_field('resource_url'); ?>">
												<h4><?php the_title(); ?></h4>
												<?php the_excerpt(); ?>
												<a href="http://<?php echo get_field('resource_url'); ?>" class="readmore">Read More</a>
											</a>
										</div>
									</div>
								<?php endwhile; wp_reset_query();?>
						</div>





					</div>
				</div>
			</div>
		</section>
	</div>

<?php get_footer(); ?>
