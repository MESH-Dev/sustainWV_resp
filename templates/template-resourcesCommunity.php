 <?php
/*
* Template Name: Resources Page - Community
* Description: Page template with repeating hexagon tiles for projects
*/

get_header(); ?>
<section id="content" class="interior projects">
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
				<div id="contentSecondary" class="hex-tiles">
					<div id="intro" class="panel small stint wide">
							<div class="gutter">
								<p><?php the_field('intro'); ?></p>
							</div>
						</div>
				<?php } } ?>
					<div class="gutter clearfix">
						<div id="topicsList">
							<select id="topics" data-cpt="resources" class="resources">
								<option value=""> -- Select a Topic --</option>
								<?php $terms = get_terms('topic','orderby=count&hide_empty=0');
									  $count = count($terms);
									  if($count > 0){
										  foreach($terms as $term){
										  	echo '<option value="'.$term->slug.'">'.$term->name.'</option>';
										  }
									  } ?>
							</select>
						</div>
						<div id="filterList">
	            			<ul id="filters" class="resources" data-cpt="resources">
	            				<li><a data-filter="">All</a></li>
	            				<?php
	            					$terms = get_terms('Resource', 'orderby=date&hide_empty=0');
		            				$count = count($terms);
		            				if($count > 0){
		            					foreach($terms as $term){
			            					echo '<li><a ';
			            					if($term->slug == 'community'){
				            					echo 'class="active" ';
			            					}
			            					echo 'data-filter="'.$term->slug.'">'.$term->name.'</a></li>';
			            				}
		            				}
	            				?>
	            			</ul>
	            		</div>
	            		<div id="hexWrap">
						<div class="hex-rowodd">
							<?php
								$count = 1;
								$rowswitch = true;
								$args = array( 'post_type' => 'resources', 'posts_per_page' => -1, 'resource' => 'community' );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); ?>

									<div class="hex">
										<div class="gutter">
											<a href="http://<?php echo get_field('resource_url'); ?>" target="_blank">
												<h4><?php the_title(); ?></h4>
												<p><?php the_excerpt(); ?></p>
												<a href="http://<?php echo get_field('resource_url'); ?>" class="readmore" target="_blank">Read More</a>
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
			</div>
		</section>
	</div>

<?php get_footer(); ?>