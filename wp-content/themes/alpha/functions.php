<?php
if('http://localhost/wp/alpha' == site_url()) {
	define('VERSION', time());
} else {
	define('VERSION', wp_get_theme()->get('Version'));
}
// require once files
if (class_exists( 'Attachments' ) ) {
	require_once('lib/attachments.php');
}

require_once get_theme_file_path('inc/tgm.php');
require_once get_theme_file_path('inc/acf-mb.php');
require_once get_theme_file_path('inc/cmb2-mb.php');


function alpha_disable_gutenberg_editor()
{
	return false;
}
add_filter("use_block_editor_for_post_type", "alpha_disable_gutenberg_editor");
function alpha_theme_setup() {
	load_theme_textdomain('alpha');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-background');
	add_theme_support( 'html5', array( 'search-form' ) );
	add_theme_support('title-tag');
	add_theme_support('dashicons');
	add_theme_support('post-formats', array(
		'image',
		'quote',
		'video',
		'audio',
		'gallery',
		'link',
	));
	$custom_logo_args = array(
		'height' => '100',
		'width' => '100',
		'flex-height' => true,
		'flex-width' => true
	);
	add_theme_support('custom-logo', $custom_logo_args);
	$header_text_style = array(
		'header-text' => true,
		'default-text-color' => '#222'
	);
	add_theme_support('custom-header', $header_text_style);
	register_nav_menu( 'topmennu', __("Header Menu") );
	register_nav_menu( 'footer-menu', __("Footer Menu") );

	// custom image size
	add_image_size( 'alpha-square', 400, 400, true);
}
add_action('after_setup_theme', 'alpha_theme_setup');
if(!function_exists("alpha_theme_scripts")) {
	function alpha_theme_scripts() {
		wp_enqueue_style('alpha-style', get_stylesheet_uri(), null, VERSION);
		wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
		wp_enqueue_style( 'tiny-slider', get_theme_file_uri('assets/css/tiny-slider.css'), 'null' , time(), false );
		wp_enqueue_style('featherlight', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css');
		wp_enqueue_script('tiny-slider',  get_theme_file_uri('assets/js/tiny-slider.js'), array('jquery'), time(), true);
		wp_enqueue_script('featherlight-js', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js', array('jquery'), '1.0.0', false);
		wp_enqueue_script('alpha-js', get_theme_file_uri("assets/js/main.js"), array('jquery', 'featherlight-js'), VERSION , false);
	}
	add_action('wp_enqueue_scripts', 'alpha_theme_scripts');
}


function alpha_register_sidebar() {
	/**
	 * Creates a sidebar
	 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	 */
	register_sidebar( array(
        'name' => __( 'Blog Sidebar', 'alpha' ),
        'id' => 'blog-sidebar',
        'description' => __( 'Blog Sidebar', 'alpha' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 	register_sidebar( array(
        'name' => __( 'Footer Left', 'alpha' ),
        'id' => 'footer-left',
        'description' => __( 'Footer Left Sidebar', 'alpha' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '',
        'after_title' => '',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer Right', 'alpha' ),
        'id' => 'footer-right',
        'description' => __( 'Footer Right Sidebar', 'alpha' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '',
        'after_title' => '',
    ) );
 
	
}
add_action('widgets_init', 'alpha_register_sidebar');


// set password into excerpt
function alpha_locked_excerpt($content) {
	if(!post_password_required()) {
		return $content;
	} else {
		echo get_the_password_form();
	}
}
add_filter('the_excerpt', 'alpha_locked_excerpt');
// remove passord protected title extra text
function alpha_protected_title_format($title) {
	return '%s';
}
add_filter('protected_title_format', 'alpha_protected_title_format');
function alpha_nav_menu_css_class($classes, $obj) {
	$classes[] = 'list-inline-item';
	return $classes;
}
add_filter('nav_menu_css_class', 'alpha_nav_menu_css_class', 10, 2);

function alpha_page_inline_style() {
	if(is_page()) {
		$image = get_the_post_thumbnail_url(null, 'large');
	?>
	<style>
		.page-header {
			background-image: url($image);
		}
	</style>
	<?php }
	if(is_front_page()) {
		if(current_theme_supports('custom-header')) {?>
			<style>
				.header {
					background-image: url(<?php header_image(); ?>);
				}
				.header .heading, .tagline {
					color: #<?php echo get_header_textcolor(); ?>
				}
			</style>
			<?php
				if(!display_header_text()) {?>
					<style>
						.heading {
							display: none;
						}
					</style>
				<?php }
			?>
		<?php }
	}
}
add_action('wp_head', 'alpha_page_inline_style', 11);
// add or remove class in body_class
function alpha_body_class($classes) {
	unset($classes[array_search("first-class", $classes)]);
    unset($classes[array_search("second-class", $classes)]);
    $classes[] = "newclass";
    return $classes;
}
add_filter('body_class', 'alpha_body_class');
// add or remove class in post_class
function alpha_post_class($classes){
    unset($classes[array_search("format-audio", $classes)]);
    return $classes;
}
add_filter("post_class","alpha_post_class");

function alpha_tag_style() {?>
	<style>
		.tag-space {
			padding-top: 100px;
			padding-bottom: 100px;
		}
	</style>
<?php }
add_filter('wp_head', 'alpha_tag_style');

// search result text highlight
function alpha_highlight_search_results($text){
    if(is_search()){
        $pattern = '/('. join('|', explode(' ', get_search_query())).')/i';
        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}
add_filter('the_content', 'alpha_highlight_search_results');
add_filter('the_excerpt', 'alpha_highlight_search_results');
add_filter('the_title', 'alpha_highlight_search_results');
// remove default image srcset
function alpha_wp_calculate_image_srcset() {
	return null;
}
add_filter('wp_calculate_image_srcset', 'alpha_wp_calculate_image_srcset');
// add_filter('wp_calculate_image_srcset', '__return_null');

// modify main wordpress query
function alpha_modify_main_query($wpq) {
	if(is_home() && $wpq->is_main_query()) {
		// $wpq->set("post__not_in", array(140));
		$wpq->set("tag__not_in", array(15));
	}
}
add_action('pre_get_posts', 'alpha_modify_main_query');

// hide acf from admin panel
// add_filter('acf/settings/show_admin', '__return_false');


// cmb2 condition on image post formate
function alpha_admin_assets( $hook ) {
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    if ( "post.php" == $hook ) {
        $post_format = get_post_format($post_id);
        wp_enqueue_script( "admin-js", get_theme_file_uri( "/assets/js/admin.js" ), array( "jquery" ), VERSION, true );
        wp_localize_script("admin-js","alpha_pf",array("format"=>$post_format));
    }
}

add_action( "admin_enqueue_scripts", "alpha_admin_assets" );