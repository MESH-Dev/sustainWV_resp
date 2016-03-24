<?php
//Branding
function SI_branding() {
    wp_enqueue_style('SI-theme', get_template_directory_uri() . '/css/login.css');
}
add_action('login_enqueue_scripts', 'SI_branding');
function SI_editor_styles() {
    add_editor_style( 'css/editor.css' );
}
add_action( 'init', 'SI_editor_styles' );
//Scripts
function loadup_scripts()
{
    if (!is_admin()) {
        wp_deregister_script('jquery'); // Deregister WordPress jQuery
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js' ); // Google CDN jQuery
        wp_enqueue_script('jquery'); // Enqueue it!


        wp_register_script('sidr', get_template_directory_uri() . '/js/jquery.sidr.js');
        wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.js');
        //wp_register_script('jqtools', 'http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js');
        wp_register_script('custom', get_template_directory_uri() . '/js/custom.js');


        wp_enqueue_style('sidr-bare', get_template_directory_uri() . '/css/jquery.sidr.bare.css');
        
        
        wp_enqueue_script('sidr');
        wp_enqueue_script('modernizr');
        //wp_enqueue_script('jqtools');
        wp_enqueue_script('custom');
    }
}
add_action('init', 'loadup_scripts');

add_image_size('banner', 1000, '', true);

//Nav
register_nav_menus( array(
	'topNav' => 'Top Trim Navigation',
	'social' => 'Social Navigation in Header and Footer',
	'mainNav' => 'Main Navigation',
) );
//Widgets
function sustain_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer - About'),
		'id' => 'footerabout',
		'description'   => 'About phrasing in footer',
		'before_widget' =>'',
		'after_widget' => '',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer - Newsletter'),
		'id' => 'footernewsletter',
		'description'   => 'Get the Newsletter section in footer',
		'before_widget' =>'',
		'after_widget' => '',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'sustain_widgets_init' );
//Projects post type
function projects_cpt() {
	$labels = array(
		'name'               => _x( 'Impacts', 'post type general name' ),
		'singular_name'      => _x( 'Impact', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Impact' ),
		'edit_item'          => __( 'Edit Impact' ),
		'new_item'           => __( 'New Impact' ),
		'all_items'          => __( 'All Impacts' ),
		'view_item'          => __( 'View Impact' ),
		'search_items'       => __( 'Search Impacts' ),
		'not_found'          => __( 'No Impacts found' ),
		'not_found_in_trash' => __( 'No Impacts found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Impact'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds impacts and impact specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor','excerpt' ),
		'has_archive'   => false,
	);
	register_post_type( 'project', $args );
}
add_action( 'init', 'projects_cpt' );
//Organizations post type
function network_cpt() {
	$labels = array(
		'name'               => _x( 'Network', 'post type general name' ),
		'singular_name'      => _x( 'Network', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Network' ),
		'edit_item'          => __( 'Edit Network' ),
		'new_item'           => __( 'New Network' ),
		'all_items'          => __( 'All Network' ),
		'view_item'          => __( 'View Network' ),
		'search_items'       => __( 'Search Network' ),
		'not_found'          => __( 'No Network found' ),
		'not_found_in_trash' => __( 'No Network found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Network'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Network specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor','excerpt' ),
		'has_archive'   => false,
	);
	register_post_type( 'organization', $args );
}
add_action( 'init', 'network_cpt' );
//Resources post type
function resources_cpt() {
	$labels = array(
		'name'               => _x( 'Resources', 'post type general name' ),
		'singular_name'      => _x( 'Resource', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Resource' ),
		'edit_item'          => __( 'Edit Resource' ),
		'new_item'           => __( 'New Resource' ),
		'all_items'          => __( 'All Resources' ),
		'view_item'          => __( 'View Resources' ),
		'search_items'       => __( 'Search Resources' ),
		'not_found'          => __( 'No Resources found' ),
		'not_found_in_trash' => __( 'No Resources found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Resources'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Resources and Resource specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'excerpt' ),
		'has_archive'   => false,
	);
	register_post_type( 'resources', $args );
}
add_action( 'init', 'resources_cpt' );
//Resources Taxonomy
function register_Resource_tax() {
  $labels = array(
    'name'          => _x( 'Resource', 'taxonomy general name' ),
    'singular_name'     => _x( 'Resource', 'taxonomy singular name' ),
    'add_new'         => _x( 'Add New Resource', 'Resource'),
    'add_new_item'      => __( 'Add New Resource' ),
    'edit_item'       => __( 'Edit Resource' ),
    'new_item'        => __( 'New Resource' ),
    'view_item'       => __( 'View Resource' ),
    'search_items'      => __( 'Search Resource' ),
    'not_found'       => __( 'No Resource found' ),
    'not_found_in_trash'  => __( 'No Resource found in Trash' ),
  );
  $pages = array('resources');
  $args = array(
    'labels'      => $labels,
    'singular_label'  => __('Resource'),
    'public'      => true,
    'show_ui'       => true,
    'hierarchical'    => true,
    'show_tagcloud'   => false,
    'show_in_nav_menus' => true,
    'rewrite'       => array('slug' => 'Resource', 'with_front' => false ),
   );
  register_taxonomy('Resource', $pages, $args);
}
add_action('init', 'register_Resource_tax');
//Impact Taxonomy
function register_Impact_tax() {
  $labels = array(
    'name'          => _x( 'Impacts', 'taxonomy general name' ),
    'singular_name'     => _x( 'Impact', 'taxonomy singular name' ),
    'add_new'         => _x( 'Add New Impact', 'Impact'),
    'add_new_item'      => __( 'Add New Impact' ),
    'edit_item'       => __( 'Edit Impact' ),
    'new_item'        => __( 'New Impact' ),
    'view_item'       => __( 'View Impact' ),
    'search_items'      => __( 'Search Impact' ),
    'not_found'       => __( 'No Impacts found' ),
    'not_found_in_trash'  => __( 'No Impacts found in Trash' ),
  );
  $pages = array('project');
  $args = array(
    'labels'      => $labels,
    'singular_label'  => __('Impact'),
    'public'      => true,
    'show_ui'       => true,
    'hierarchical'    => true,
    'show_tagcloud'   => false,
    'show_in_nav_menus' => true,
    'rewrite'       => array('slug' => 'Impacts', 'with_front' => false ),
   );
  register_taxonomy('Impact', $pages, $args);
}
add_action('init', 'register_Impact_tax');
//Topics Taxonomy
function register_topics_tax() {
  $labels = array(
    'name'          => _x( 'Topics', 'taxonomy general name' ),
    'singular_name'     => _x( 'Topic', 'taxonomy singular name' ),
    'add_new'         => _x( 'Add New Topic', 'Resource'),
    'add_new_item'      => __( 'Add New Topic' ),
    'edit_item'       => __( 'Edit Topic' ),
    'new_item'        => __( 'New Topic' ),
    'view_item'       => __( 'View Topics' ),
    'search_items'      => __( 'Search Topics' ),
    'not_found'       => __( 'No Topics found' ),
    'not_found_in_trash'  => __( 'No Topics found in Trash' ),
  );
  $pages = array('project','organization','resources');
  $args = array(
    'labels'      => $labels,
    'singular_label'  => __('Topic'),
    'public'      => true,
    'show_ui'       => true,
    'hierarchical'    => true,
    'show_tagcloud'   => false,
    'show_in_nav_menus' => true,
    'rewrite'       => array('slug' => 'Topic', 'with_front' => false ),
   );
  register_taxonomy('topic', $pages, $args);
}
add_action('init', 'register_topics_tax');
//Theme Support
function sustain_theme_supports() {
    add_editor_style( 'css/editor.css' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'init', 'sustain_theme_supports' );
function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}
//Image sizes
add_image_size( 'featured', 772, 330, true );
//Blog Sidebar
register_sidebar(array(
  'name' => __( 'Blog Sidebar' ),
  'id' => 'blog-sidebar',
  'description' => __( 'Widgets in this area will be shown on the right-hand side in the blog posts and archives.' ),
  'before_title' => '<h3 class="sidebar">',
  'after_title' => '</h3>',
  'before_widget' => '<div class="widget %2$s panel sidebar"><div class="gutter clearfix">',
  'after_widget'  => '</div></div>',
));
?>
