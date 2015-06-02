<?php
/**
 * peterswedding functions and definitions
 *
 * @package peterswedding
 */

if ( ! function_exists( 'peterswedding_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function peterswedding_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on peterswedding, use a find and replace
	 * to change 'peterswedding' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'peterswedding', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'peterswedding' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'peterswedding_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_image_size( 'slider', 1156, 407, true ); // (cropped)
	add_image_size( 'featured-blog', 400, 244, true ); // (cropped)
}
endif; // peterswedding_setup
add_action( 'after_setup_theme', 'peterswedding_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function peterswedding_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'peterswedding_content_width', 640 );
}
add_action( 'after_setup_theme', 'peterswedding_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function peterswedding_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Widgets', 'peterswedding' ),
		'id'            => 'homepage-w',
		'description'   => 'Widgets on homepage bellow the slider',
		'before_widget' => '<div class="one_third columns"><img src="'. get_template_directory_uri().'/images/icons/icon5.png" alt="" />',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'peterswedding' ),
		'id'            => 'sidebar',
		'description'   => 'Widgets on sidebar',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>' 
	) );
}
add_action( 'widgets_init', 'peterswedding_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function peterswedding_scripts() {

	wp_enqueue_style( 'peterswedding-style', get_stylesheet_uri() );
	wp_enqueue_style('font1', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700');
	wp_enqueue_style('font2', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700');

	wp_enqueue_style('inner', get_template_directory_uri() . "/styles/inner.css");
	wp_enqueue_style('style', get_template_directory_uri() . "/styles/style.css");
	wp_enqueue_style('layout', get_template_directory_uri() . "/styles/layout.css");
	wp_enqueue_style('flexslider', get_template_directory_uri() . "/styles/flexslider.css");
	wp_enqueue_style('color', get_template_directory_uri() . "/styles/color.css");
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() . "/styles/prettyPhoto.css");

	wp_enqueue_script( 'peterswedding-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'peterswedding-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );


	wp_enqueue_script('jquery');
	wp_enqueue_script('hover-intent', get_template_directory_uri() . "/js/hoverIntent.js", 'jquery', '1.0', true );
	wp_enqueue_script('superfish', get_template_directory_uri() . "/js/superfish.js", 'jquery', '1.0', true );
	wp_enqueue_script('supersubs', get_template_directory_uri() . "/js/supersubs.js", 'jquery', '1.0', true );
	wp_enqueue_script('tinynav', get_template_directory_uri() . "/js/tinynav.min.js", 'jquery', '1.0', true );
	wp_enqueue_script('custom', get_template_directory_uri() . "/js/custom.js", 'jquery', '1.0', true );
	wp_enqueue_script('flexslider', get_template_directory_uri() . "/js/jquery.flexslider-min.js", 'jquery', '1.0', true );
	wp_enqueue_script('main', get_template_directory_uri() . "/js/main.js", 'jquery', '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'peterswedding_scripts' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';




function register_post_types() {





	$labels = array(
		'name'               => _x( 'Slides', 'post type general name', 'peterswedding' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', 'peterswedding' ),
		'menu_name'          => _x( 'Slider', 'admin menu', 'peterswedding' ),
		'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'peterswedding' ),
		'add_new'            => _x( 'Add New', 'slide', 'peterswedding' ),
		'add_new_item'       => __( 'Add New Slide', 'peterswedding' ),
		'new_item'           => __( 'New Slide', 'peterswedding' ),
		'edit_item'          => __( 'Edit Slide', 'peterswedding' ),
		'view_item'          => __( 'View Slide', 'peterswedding' ),
		'all_items'          => __( 'All Slides', 'peterswedding' ),
		'search_items'       => __( 'Search Slides', 'peterswedding' ),
		'parent_item_colon'  => __( 'Parent Slides:', 'peterswedding' ),
		'not_found'          => __( 'No slides found.', 'peterswedding' ),
		'not_found_in_trash' => __( 'No slides found in Trash.', 'peterswedding' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title',  'thumbnail', 'excerpt' )
	);


    register_post_type( 'slider', $args );

    $labels = array(
		'name'               => _x( 'Gallery', 'post type general name', 'peterswedding' ),
		'singular_name'      => _x( 'Gallery', 'post type singular name', 'peterswedding' ),
		'menu_name'          => _x( 'Gallery', 'admin menu', 'peterswedding' ),
		'name_admin_bar'     => _x( 'Gallery', 'add new on admin bar', 'peterswedding' ),
		'add_new'            => _x( 'Add New', 'slide', 'peterswedding' ),
		'add_new_item'       => __( 'Add New Entry', 'peterswedding' ),
		'new_item'           => __( 'New Entry', 'peterswedding' ),
		'edit_item'          => __( 'Edit Entry', 'peterswedding' ),
		'view_item'          => __( 'View Entry', 'peterswedding' ),
		'all_items'          => __( 'All Entries', 'peterswedding' ),
		'search_items'       => __( 'Search Entries', 'peterswedding' ),
		'parent_item_colon'  => __( 'Parent Entries:', 'peterswedding' ),
		'not_found'          => __( 'No entries found.', 'peterswedding' ),
		'not_found_in_trash' => __( 'No entries found in Trash.', 'peterswedding' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title',  'editor', 'thumbnail', 'excerpt' ),
		'taxonomies' 			=> array('category', 'post_tag')
	);


    register_post_type( 'gallery', $args );




}
add_action( 'init', 'register_post_types' );



function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');




function get_avatar_url_2($get_avatar){
	
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}


function custom_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; 
   ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <?php if ($comment->comment_approved == '0') : ?>
      <em><?php _e('Your comment is awaiting moderation.') ?></em>
   <?php 
   else: 
   	?>
   		<li>
            <div class="comment-body">
            	<div class="comment-arrow"></div>
                <div class="avatar-img circle"><?php echo get_avatar($comment, 32) ?></div>
                <cite class="fn"><?php comment_author(); ?></cite>
                <span class="tdate"> - <?php comment_date() ?></span> &nbsp;/&nbsp; <span class="reply"><a href="#">Reply</a></span>
                <div class="commenttext">
                    <p><?php comment_text(); ?></p>
                </div>
            </div>
        </li>
   <?php    
   endif;

   echo "</li>";

}



function separator_func( $atts ){
	return "<div class='separator'></div>";
}
add_shortcode( 'separator', 'separator_func' );


 // init process for registering our button
 add_action('init', 'wpse72394_shortcode_button_init');
 function wpse72394_shortcode_button_init() {

      //Abort early if the user will never see TinyMCE
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;

      //Add a callback to regiser our tinymce plugin   
      add_filter("mce_external_plugins", "wpse72394_register_tinymce_plugin"); 

      // Add a callback to add our button to the TinyMCE toolbar
      add_filter('mce_buttons', 'wpse72394_add_tinymce_button');
}


//This callback registers our plug-in
function wpse72394_register_tinymce_plugin($plugin_array) {
    $plugin_array['wpse72394_button'] =  get_template_directory_uri() .'/js/shortcode.js';
    return $plugin_array;
}

//This callback adds our button to the toolbar
function wpse72394_add_tinymce_button($buttons) {
            //Add the button ID to the $button array
    $buttons[] = "wpse72394_button";
    return $buttons;
}



