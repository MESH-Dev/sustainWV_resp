 <?php
/*
* Template Name: Hexagon-All Page
* Description: Page template with repeating hexagon tiles for projects, organizations, and resources
*/

get_header(); ?>

<section id="content" class="interior projects nine columns">
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
				<div id="contentSecondary" class="hex-tiles four columns">
					<div id="intro" class="panel small stint wide">
							<div class="gutter">
								<p><?php the_field('intro'); ?></p>
							</div>
						</div>
				<?php } } ?>
					<div class="gutter clearfix">
						<div class="hex-rowodd">
							<?php
								$count = 1;
								$rowswitch = true;
								$args = array( 'post_type' => array('resources','project','organization'), 'posts_per_page' => -1 );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); ?>

									<div class="hex <?php echo get_post_type(get_the_ID()); ?>">
										<div class="gutter">
                      <?php if (get_post_type(get_the_ID()) == 'resources') { ?>
                        <a href="http://<?php echo get_field('resource_url'); ?>">
                      <?php } else { ?>
                        <a href="<?php the_permalink(); ?>">
                      <?php } ?>
												<h4><?php the_title(); ?></h4>
												<?php the_excerpt(); ?>
                        <?php if (get_post_type(get_the_ID()) == 'resources') { ?>
                          <a href="http://<?php echo get_field('resource_url'); ?>" class="readmore">
                        <?php } else { ?>
                          <a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
                        <?php } ?>
											</a>
										</div>
									</div>
									<?php if ($count > 0 && $count % 4 == 0) {
									    if($rowswitch == true){
										    echo '</div><div class="hex-roweven">';
										    $rowswitch = false;
									    }else if ($rowswitch == false){
										    echo '</div><div class="hex-rowodd">';
										    $rowswitch = true;
									    }
									} ?>
									<?php $count++; ?>
								<?php endwhile; ?>


					</div>
				</div>
			</div>
		</section>
	</div>

<?php get_footer(); ?>
