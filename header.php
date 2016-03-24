<?php header("Access-Control-Allow-Origin: *"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<link rel="stylesheet" type="text/css" href=" <?php echo get_stylesheet_uri(); ?> " />
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?>>
	<div id="headerSearch">
		<div class="container">
			<div class="gutter clearfix">
				 <?php get_search_form(); ?>
			</div>
		</div>
	</div>
	<div class="sidr-trigger">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/nav_trigger.png">
	</div>
	<div id="headerTrim">
		<div class="container">
			
				<div class="mobile mobile-logo">
					<a class="logo" href="<?php echo home_url(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png"></a>
				</div>
			
			<div class="gutter">
				<div class="top-nav">
					<div class="close">CLOSE X</div>
				<?php
					if ( has_nav_menu( 'topNav' ) ) {
						$defaults = array(
						'theme_location'  => 'topNav',
						'menu'            => 'topNav',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'menu',
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
				</div>
				<?php
				if ( has_nav_menu( 'social' ) ) {
					$defaults = array(
						'theme_location'  => 'social',
						'menu'            => 'social',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'social',
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
			</div>
		</div>
	</div>
	<div id="contentWrap" class="container">
		<div class="three columns headr">
		<header>
			<section id="sidebar">
				<a class="logo" href="<?php echo home_url(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png"></a>
				<div class="header-white">
					<div class="whitebefore">
						<img src="<?php echo get_template_directory_uri('/'); ?>/images/sidebar-whiteTop.png">
					</div>
					<div class="white">
						<?php if(is_front_page()){ ?>
							<div class="gutter">
								<h2>Sustainability<br><span class="stint subhead">Just Means</span></h2>
							</div>
							<hr>
							<div class="bottomgutter">
								<div class="scrollable" id="scrollable">
									<div class="items">
										<?php
											if(get_field('taglines'))
											{
												while(has_sub_field('taglines'))
												{
													echo '<div><span class="stint featurePhrase">' . get_sub_field('tagline') . '</span></div>';
												}
											}
										?>
									</div>
								</div>
							</div>
						<?php } else{ ?>
							<div class="gutter sidenav">
								<h3 class="sidebar">Upcoming Workshops</h3>
								<?php the_field('upcoming_workshops_sidebar', 1081); ?>
							</div>
						<?php } ?>

					</div>
					<div class="whiteafter">
						<img src="<?php echo get_template_directory_uri('/'); ?>/images/sidebar-whiteBottom.png">
					</div>
				</div>
				<div class="header-grey">
					<div class="greybefore">
						<img src="<?php echo get_template_directory_uri('/'); ?>/images/sidebar-greyTop.png">
					</div>
					<div class="grey">
						<div class="gutter">
							<div class="post">
							    <h4 class="nobold"><?php the_field('title', 23); ?></h4>

								<p><?php the_field('content', 23); ?></p>

								<?php if(get_field('link', 23)){ ?>
									<p class="stint readmore"><a target="_blank" href="http://<?php the_field('link', 23); ?>">Contact Us</a></p>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="greyafter">
						<img src="<?php echo get_template_directory_uri('/'); ?>/images/sidebar-greyBottom.png">
					</div>
				</div>
			</section>
		</header>
	</div>
