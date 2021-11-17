<?php
if('http://localhost/wp/alpha' == site_url()) {
	define('VERSION', time());
} else {
	define('VERSION', wp_get_theme()->get('Version'));
}
function alpha_disable_gutenberg_editor()
{
	return false;
}
add_filter("use_block_editor_for_post_type", "alpha_disable_gutenberg_editor");

function alpha_theme_setup() {
	load_theme_textdomain('alpha');
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
	register_nav_menu( 'topmennu', __("Header Menu") );
	register_nav_menu( 'footer-menu', __("Footer Menu") );
}
add_action('after_setup_theme', 'alpha_theme_setup');
function alpha_theme_scripts() {
	wp_enqueue_style('alpha_style', get_stylesheet_uri(), null, VERSION);
	wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
	wp_enqueue_style('featherlight', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css');
	wp_enqueue_script('featherlight-js', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js', array('jquery'), '1.0.0', false);
	wp_enqueue_script('alpha-js', get_theme_file_uri("assets/js/main.js"), array('jquery', 'featherlight-js'), VERSION , false);
}
add_action('wp_enqueue_scripts', 'alpha_theme_scripts');

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
}
add_action('wp_head', 'alpha_page_inline_style', 11);