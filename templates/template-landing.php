 <?php
/*
* Template Name: Landing Page
* Description: Page template with repeating hexagon panels
*/

get_header(); ?>

<section id="content" class="interior landing nine columns">
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
				<div id="contentPrimary" class="<?php if(get_field('sidebar_active')){echo 'sidebar';}else{echo '';}?>">
					<div class="gutter">									
						
						<div id="intro" class="panel small stint wide">
							<div class="gutter">
								<p><?php the_field('intro'); ?></p>
							</div>
						</div>
						<div id="core">
							<div class="whitebar"></div>
							<div class="gutter">
							<?php if(get_field('panels')): ?>
							<?php while(has_sub_field('panels')): ?>
								<div class="entry third">
									<div class="heading">
										<img src="<?php echo the_sub_field('panel_header'); ?>" />
									</div>
									<div class="panel">
										<div class="gutter">
											<?php 
												$iconImage = get_sub_field('title_icon');
												if(!empty($iconImage)){
													echo '<img class="icon" src="'.$iconImage.'" />';
												}
											?>
											<h3 <?php if(!empty($iconImage)){
													echo 'class="icon"';
												} ?>><?php the_sub_field('panel_title'); ?></h3>
											<p><?php the_sub_field('panel_content'); ?></p>
										</div>
									</div>
									<div class="blackbar"></div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php } } ?>
			</div>
		</section>
	</div>

<?php get_footer(); ?>