 <?php
	// Our include
	define('WP_USE_THEMES', false);
	require_once('../../../../wp-load.php');

	//Get variable from AJAX POST
	$ajaxFilter = $_POST['ajaxFilter'];
	$topicFilter = $_POST['topicFilter'];
	$cptFilter = $_POST['cptFilter'];

	//Create array for other CPTs
	if($cptFilter == 'project'){
		$othercpt = array('organization', 'resources');
	}elseif($cptFilter == 'organization'){
		$othercpt = array('project', 'resources');
	}elseif($cptFilter == 'resources'){
		$othercpt = array('organization', 'project');
	}

	//Determine if filter is being reset
	if($ajaxFilter == 'reset'){
		$ajaxFilter = '';
	}
	echo '<div class="hexWrap-primary"><div class="hex-rowodd first">';
	$count = 1;
	$rowswitch = true;
	$args = array(
		'post_type' => $cptFilter,
		'posts_per_page' => -1,
		'impact' => $ajaxFilter,
		'topic' => $topicFilter
	);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		//if ($count > 1){echo '<div class="rowodd">';}
		if(get_post_type() == 'resources'){ ?>
		<!-- <div class="hex-rowodd"> -->
			<div class="hex <?php echo $count; ?>">
				<div class="gutter">
					<a href="http://<?php echo get_field('resource_url'); ?>" target="_blank">
						<h4><?php the_title(); ?></h4>
						<p><?php the_excerpt(); ?></p>
						<a href="http://<?php echo get_field('resource_url'); ?>" class="readmore" target="_blank">Read More</a>
					</a>
				</div>
			</div>
		<?php }else{ ?>
		<!-- <div class="hex-rowodd"> -->
			<div class="hex <?php echo $count; ?>">
				<div class="gutter">
					<a href="<?php the_permalink(); ?>">
						<h4><?php the_title(); ?></h4>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
					</a>
				</div>
			</div>

		<?php
		}if ($count > 1 && $count % 4 == 0) {
		    if($rowswitch == true){
			    echo '</div><div class="hex-roweven">';
			    $rowswitch = false;
		    }else if ($rowswitch == false){
			    echo '</div><div class="hex-rowodd">';
			    $rowswitch = true;
		    }
		}$count++; endwhile; echo '</div></div>';

		if($topicFilter != ''){
		$args = array(
			'post_type' => $othercpt,
			'posts_per_page' => -1,
			'topic' => $topicFilter
			 );
		$loop = new WP_Query( $args );
		$count = 1;
		$rowswitch = true;
		if($loop->post_count > 0){
		$term = get_term_by('slug', $topicFilter, 'topic');
		echo "<div id='hexWrap-secondary'><h3>Other Entries with Topic: ".$term->name."</h3><div class='hex-rowodd'>";
		while ( $loop->have_posts() ) : $loop->the_post(); if(get_post_type() == 'resources'){ ?>
			<div class="hex">
				<div class="gutter">
					<a href="http://<?php echo get_field('resource_url'); ?>" target="_blank">
						<h4><?php the_title(); ?></h4>
						<p><?php the_excerpt(); ?></p>
						<a href="http://<?php echo get_field('resource_url'); ?>" class="readmore" target="_blank">Read More</a>
					</a>
				</div>
			</div>
		<?php }else{ ?>
			<div class="hex">
				<div class="gutter">
					<a href="<?php the_permalink(); ?>">
						<h4><?php the_title(); ?></h4>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
					</a>
				</div>
			</div>
		<?php
		} if ($count > 0 && $count % 4 == 0) {
			    if($rowswitch == true){
				    echo '</div><div class="hex-roweven">';
				    $rowswitch = false;
			    }else if ($rowswitch == false){
				    echo '</div><div class="hex-rowodd">';
				    $rowswitch = true;
			    }
			}  $count++; endwhile; echo '</div>';}
	} ?>