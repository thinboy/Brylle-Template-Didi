<?php
/**
 * didi functions and definitions
 *
 * @package Didi
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) )
	$content_width = 740; /* pixels */

/**
 * Adjusts content_width value for full-width page and grid page.
 */
if ( ! function_exists( 'didi_content_width' ) ) :

function didi_content_width() {
	global $content_width;
	if ( is_page_template( 'page-templates/grid-template.php' )
	|| is_page_template( 'page-templates/fullwidth-template.php' ))
		$content_width = 1088;
}
add_action( 'template_redirect', 'didi_content_width' );

endif; // if ! function_exists( 'didi_content_width' )

if ( ! function_exists( 'didi_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function didi_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on didi, use a find and replace
	 * to change 'didi' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'didi', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Activate support for featured images
	add_theme_support( 'post-thumbnails' );

	add_filter( 'excerpt_more', 'didi_continue_reading_link' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/* Add support for editor styles */
	add_editor_style( array( 'editor-style.css', didi_fonts_url() ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'didi' ),
		'social'  => esc_html__( 'Social Menu', 'didi' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'didi_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );
}
endif; // didi_setup
add_action( 'after_setup_theme', 'didi_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function didi_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'didi' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page First Block', 'didi' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Second Block', 'didi' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Third Block', 'didi' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 1', 'didi' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 2', 'didi' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 3', 'didi' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'didi_widgets_init' );

if ( ! function_exists( 'didi_fonts_url' ) ) :
/**
 * Define Google Fonts
 */
function didi_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Roboto, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$josefin = esc_html_x( 'on', 'Josefin Sans: on or off', 'didi' );

	/* Translators: If there are characters in your language that are not
	* supported by Pacifico, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$inconsolata = esc_html_x( 'on', 'Inconsolata font: on or off', 'didi' );

	if ( 'off' !== $josefin || 'off' !== $open ) {
		$font_families = array();

		if ( 'off' !== $josefin ) {
			$font_families[] = 'Josefin Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic';
		}

		if ( 'off' !== $inconsolata ) {
			$font_families[] = 'Inconsolata:400,700';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function didi_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'didi-fonts', didi_fonts_url(), array(), null );

	wp_enqueue_style( 'didi-style', get_stylesheet_uri() );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );
	
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '3.0.2' );

	wp_enqueue_script( 'didi-search', get_template_directory_uri() . '/js/search.js', array( 'jquery' ), '1.0', true );

	$layout = get_theme_mod( 'didi_blog_layout' );
	if ( is_page_template( 'page-templates/main-template.php' )) {
		wp_enqueue_script( 'didi-grid', get_template_directory_uri() . '/js/grid.js', array( 'jquery', 'masonry' ), '', true );
	}
	
	$layout = get_theme_mod( 'didi_blog_layout' );
	if (( $layout === 'grid-two' ||  $layout === 'grid-three' ||  $layout === 'grid-two-sidebar' ) ) {
		wp_enqueue_script( 'didi-grid', get_template_directory_uri() . '/js/grid-custom.js', array( 'jquery', 'masonry' ), '', true );
	}

	wp_enqueue_script( 'didi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'didi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'didi_scripts' );
if (!function_exists('didi_admin_scripts')) {
	function didi_admin_scripts($hook) {
			wp_enqueue_style('didi-admin', get_template_directory_uri() . '/admin/admin.css');
	}
}
add_action('admin_enqueue_scripts', 'didi_admin_scripts');
/*
 * Filters the Categories archive widget to add a span around the post count
 */

function didi_cat_count_span( $links ) {
	$links = str_replace( '</a> (', '</a><span class="post-count">(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return $links;
}
add_filter( 'wp_list_categories', 'didi_cat_count_span' );

/*
 * Add a span around the post count in the Archives widget
 */

function didi_archive_count_span( $links ) {
  $links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">(', $links );
  $links = str_replace( ')', ')</span>', $links );
  return $links;
}
add_filter( 'get_archives_link', 'didi_archive_count_span' );

if ( ! function_exists( 'didi_continue_reading_link' ) ) :
/**
 * Returns an ellipsis and "Continue reading" plus off-screen title link for excerpts
 */
function didi_continue_reading_link() {
	return '<a class="more-link" href="'. esc_url( get_permalink() ) . '">' . sprintf( wp_kses_post( __( 'Continue reading <span class="screen-reader-text">%1$s</span> <span class="meta-nav" aria-hidden="true">&rarr;</span>', 'didi' ) ), esc_attr( strip_tags( get_the_title() ) ) ) . '</a>';
}
endif; // didi_continue_reading_link
/**
 * Sets the post excerpt length.
 */
function get_excerpt($count){
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
  $excerpt = $excerpt.'...<a class="more-link" href="'. esc_url( get_permalink() ) . '">' . sprintf( wp_kses_post( esc_html__( 'Continue reading &rarr;', 'didi' ) ) ) . '</a>';
  return $excerpt;
}
/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function didi_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= didi_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'didi_custom_excerpt_more' );
add_filter('the_excerpt', 'do_shortcode');
/*
 * Custom comments display to move Reply link,
 * used in comments.php
 */
function didi_comments( $comment, $args, $depth ) {
?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-metadata">
						<span class="comment-author vcard">
							<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>

							<?php printf( '<b class="fn">%s</b>', get_comment_author_link() ); ?>
						</span>
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( '<span class="comment-date">%1$s</span><span class="comment-time screen-reader-text">%2$s</span>', get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply">',
							'after'     => '</span>'
						) ) );
						?>
						<?php edit_comment_link( esc_html__( 'Edit', 'didi' ), '<span class="edit-link">', '</span>' ); ?>

					</div><!-- .comment-metadata -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'didi' ); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

			</article><!-- .comment-body -->
<?php
}
/***** Include Admin *****/

if (is_admin()) {
	require_once('admin/admin.php');
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Widgets compatibility file.
 */
require get_template_directory() . '/inc/widgets.php';
/**
 * Load Styles.
 *
 * @since lolipop 1.0
 */
require( get_template_directory() . '/inc/didi_customizer_style.php' );

/**
 * WooCommerce
 *
 * Unhook sidebar
 */
add_theme_support( 'woocommerce' );
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 40;' ), 20 );