<?php
/**
 * This file includes the theme functions.
 *
 * @package Natural Lite
 * @since Natural Lite 1.0
 */

/*
-----------------------------------------------------------------------------------------------------
Theme Setup
-----------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'natural_lite_setup' ) ) :

	function natural_lite_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'natural-lite' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add title tag.
		add_theme_support( 'title-tag' );

		// Enable support for wide alignment class for Gutenberg blocks.
		add_theme_support( 'align-wide' );

		// Enable selective refresh for Widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'natural-lite-featured-large', 2400, 1800, true ); // Large Featured Image.
		add_image_size( 'natural-lite-featured-medium', 1800, 1200, true ); // Medium Featured Image.
		add_image_size( 'natural-lite-featured-small', 640, 640 ); // Small Featured Image.

		// Create Menus.
		register_nav_menus( array(
			'header-menu' => esc_html__( 'Header Menu', 'natural-lite' ),
			'social-menu' => esc_html__( 'Social Menu', 'natural-lite' ),
		));

		/*
		* Enable support for custom logo.
		*/
		add_theme_support( 'custom-logo', array(
			'height'      => 180,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title' ),
		) );

		/*
		* Enable support for custom header.
		*/
		register_default_headers( array(
			'default' => array(
				'url'           => get_template_directory_uri() . '/images/default-header.jpg',
				'thumbnail_url' => get_template_directory_uri() . '/images/default-header.jpg',
				'description'   => esc_html__( 'Default Custom Header', 'natural-lite' ),
			),
		));
		$defaults = array(
			'width'         => 1600,
			'height'        => 480,
			'default-image' => get_template_directory_uri() . '/images/default-header.jpg',
			'flex-height'   => true,
			'flex-width'    => true,
			'header-text'   => false,
			'uploads'       => true,
		);
		add_theme_support( 'custom-header', $defaults );

		/*
		* Enable support for custom background.
		*/
		$defaults = array(
			'default-color'          => '827768',
			'default-image'          => get_template_directory_uri() . '/images/default-pattern.png',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-background', $defaults );

		/*
		* Enable support for HTML5 output.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

	}

endif; // End natural_lite_setup.
add_action( 'after_setup_theme', 'natural_lite_setup' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Support and Upgrade Link
-------------------------------------------------------------------------------------------------------
*/

function natural_lite_support_link() {
	global $submenu;
	$menu_link               = esc_url( 'https://organicthemes.com/support/' );
	$submenu['themes.php'][] = array( __( 'Theme Support', 'natural-lite' ), 'manage_options', $menu_link, '', 1 );
}
add_action( 'admin_menu', 'natural_lite_support_link' );

function natural_lite_upgrade_link() {
	global $submenu;
	$upgrade_link            = esc_url( 'https://organicthemes.com/theme/natural-theme/?utm_source=lite_upgrade' );
	$submenu['themes.php'][] = array( __( 'Theme Upgrade', 'natural-lite' ), 'manage_options', $upgrade_link );
}
add_action( 'admin_menu', 'natural_lite_upgrade_link' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Notice
-------------------------------------------------------------------------------------------------------
*/

/** Function natural_lite_admin_notice_follow */
function natural_lite_admin_notice_follow() {
	if ( ! PAnD::is_admin_notice_active( 'notice-natural-lite-follow-30' ) ) {
		return;
	}
	?>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=246727095428680";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<script>window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
		t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);

		t._e = [];
		t.ready = function(f) {
			t._e.push(f);
		};

		return t;
	}(document, "script", "twitter-wjs"));</script>

	<div data-dismissible="notice-natural-lite-follow-30" class="notice updated is-dismissible">

		<p><?php printf( __( 'Thanks for choosing the Natural Lite theme! Enter your email to receive important updates and information from <a href="%1$s" target="_blank">Organic Themes</a>.', 'natural-lite' ), 'https://organicthemes.com' ); ?></p>

		<div class="follows" style="overflow: hidden; margin-bottom: 12px;">

			<div id="mc_embed_signup" class="clear" style="float: left;">
				<form style="margin:0px;" action="//organicthemes.us1.list-manage.com/subscribe/post?u=7cf6b005868eab70f031dc806&amp;id=c3cce2fac0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>
						<div class="mc-field-group" style="float: left;">
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
						</div>
						<div style="float: left; margin-left: 6px;"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7cf6b005868eab70f031dc806_c3cce2fac0" tabindex="-1" value=""></div>
					</div>
				</form>
			</div>

			<div class="social-links" style="float: left; margin-left: 24px; margin-top: 4px;">
				<div class="fb-like" style="float: left;" data-href="https://www.facebook.com/OrganicThemes/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
				<div class="twitter-follow" style="float: left; margin-left: 6px;"><a class="twitter-follow-button" href="https://twitter.com/OrganicThemes" data-show-count="false">Follow @OrganicThemes</a></div>
			</div>

		</div>

	</div>

	<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
	<?php
}

if ( ! function_exists( 'natural_lite_admin_notice_help' ) ) {

	/** Function natural_lite_admin_notice_help */
	function natural_lite_admin_notice_help() {
		if ( ! PAnD::is_admin_notice_active( 'notice-natural-lite-help-forever' ) ) {
			return;
		}
		?>

		<div data-dismissible="notice-natural-lite-help-forever" class="notice updated is-dismissible">

			<p><?php printf( wp_kses_post( 'Thanks for choosing an <b>Organic Theme</b>! View our <a href="%1$s" target="_blank">Theme Documentation</a> and <a href="%2$s" target="_blank">Support Forums</a> for help getting started.', 'natural-lite' ), 'https://organicthemes.com/documentation/', 'https://organicthemes.com/forums/forum/theme-support/' ); ?></p>

		</div>

		<?php
	}
}

if ( ! function_exists( 'natural_lite_admin_notice_blocks' ) ) {

	/** Function natural_lite_admin_notice_blocks */
	function natural_lite_admin_notice_blocks() {
		if ( ! PAnD::is_admin_notice_active( 'notice-natural-lite-blocks-30' ) ) {
			return;
		}
		?>

		<div data-dismissible="notice-natural-lite-blocks-30" class="notice updated is-dismissible">

			<p><?php printf( wp_kses_post( 'Introducing <b>12 New Blocks</b> for the WordPress block editor. Easily add content slideshows, testimonials, toggles, portfolios and more on any page! <a href="%1$s" target="_blank">Learn More</a> ', 'natural-lite' ), 'https://organicthemes.com/blocks/' ); ?></p>

		</div>

		<?php
	}
}

add_action( 'admin_init', array( 'PAnD', 'init' ) );
// add_action( 'admin_notices', 'natural_lite_admin_notice_follow', 10 );
add_action( 'admin_notices', 'natural_lite_admin_notice_help', 10 );
add_action( 'admin_notices', 'natural_lite_admin_notice_blocks', 10 );

require get_template_directory() . '/includes/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php';

/*
-------------------------------------------------------------------------------------------------------
Category ID to Name
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'natural_lite_cat_id_to_name' ) ) {

	/**
	 * Changes category IDs to names.
	 *
	 * @param array $id IDs for categories.
	 * @return array
	 */
	function natural_lite_cat_id_to_name( $id ) {
		$cat = get_category( $id );
		if ( is_wp_error( $cat ) ) {
			return false; }
		return $cat->cat_name;
	}
}

/*
------------------------------------------------------------------------------------------------------
Pagination Fix For Home Page Query
------------------------------------------------------------------------------------------------------
*/

function natural_lite_home_post_count_queries( $news ) {
	if ( ! is_admin() && $news->is_main_query() ) {
		if ( is_page_template( 'template-home.php' ) ) {
			$news->set( 'posts_per_page', 1 );
		}
	}
}
add_action( 'pre_get_posts', 'natural_lite_home_post_count_queries' );

/*
-------------------------------------------------------------------------------------------------------
Register Scripts
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'natural_lite_enqueue_scripts' ) ) {

	function natural_lite_enqueue_scripts() {

		// Enqueue Styles.
		wp_enqueue_style( 'natural-style', get_stylesheet_uri(), '', '1.0' );
		wp_enqueue_style( 'natural-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'natural-style' ), '1.0' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( 'natural-style' ), '1.0' );

		// Resgister Scripts.
		wp_register_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0', true );

		// Enqueue Scripts.
		wp_enqueue_script( 'natural-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'jquery-fitvids' ), '1.0', true );

		// Load Flexslider on front page and slideshow page template.
		if ( is_page_template( 'template-home.php' ) ) {
			wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '1.0', true );
		}

		// Load single scripts only on single pages.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'natural_lite_enqueue_scripts' );

}

if ( ! function_exists( 'natural_lite_enqueue_admin_scripts' ) ) {

	/** Function natural_lite_enqueue_admin_scripts */
	function natural_lite_enqueue_admin_scripts( $hook ) {
		if ( 'themes.php' !== $hook ) {
			return;
		}
		wp_enqueue_script( 'natural-custom-admin', get_template_directory_uri() . '/js/jquery.custom.admin.js', array( 'jquery' ), '1.0', true );
	}
	add_action( 'admin_enqueue_scripts', 'natural_lite_enqueue_admin_scripts' );

}

/*
-------------------------------------------------------------------------------------------------------
	Gutenberg Editor Styles
-------------------------------------------------------------------------------------------------------
*/

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function natural_lite_gutenberg_styles() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style(
		'natural-lite-gutenberg',
		get_theme_file_uri( '/css/gutenberg.css' ),
		false,
		'1.0',
		'all'
	);
	wp_enqueue_style(
		'font-awesome',
		get_template_directory_uri() . '/css/font-awesome.css',
		array( 'natural-lite-gutenberg' ),
		'1.0'
	);
}
add_action( 'enqueue_block_editor_assets', 'natural_lite_gutenberg_styles' );

/*
-------------------------------------------------------------------------------------------------------
Register Sidebars
-------------------------------------------------------------------------------------------------------
*/

/** Function natural_lite_widgets_init */
function natural_lite_widgets_init() {

	register_sidebar(array(
		'name'          => esc_html__( 'Default Sidebar', 'natural-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	));
	register_sidebar(array(
		'name'          => esc_html__( 'Left Sidebar', 'natural-lite' ),
		'id'            => 'left-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	));
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Widgets', 'natural-lite' ),
		'id'            => 'footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="footer-widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	));

}
add_action( 'widgets_init', 'natural_lite_widgets_init' );

/*
----------------------------------------------------------------------------------------------------
Content Width
----------------------------------------------------------------------------------------------------
*/

if ( ! isset( $content_width ) ) {
	$content_width = 760;
}

/**
 * Adjust content_width value based on the presence of widgets
 */
function natural_lite_content_width() {
	if ( is_singular() && ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 1180;
	}
}
add_action( 'template_redirect', 'natural_lite_content_width' );

/*
-------------------------------------------------------------------------------------------------------
Comments Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'natural_lite_comment' ) ) {

	/**
	 * Setup our comments for the theme.
	 *
	 * @param array $comment IDs for categories.
	 * @param array $args Comment arguments.
	 * @param array $depth Level of replies.
	 */
	function natural_lite_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) :
			case 'pingback':
			case 'trackback':
				?>
		<li class="post pingback">
			<p><?php esc_html_e( 'Pingback:', 'natural-lite' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'natural-lite' ), '<span class="edit-link">', '</span>' ); ?></p>
				<?php
				break;
			default:
				?>
			<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">

				<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
					<footer class="comment-meta">
						<div class="comment-author vcard">
							<?php
								$avatar_size = 48;
							if ( '0' !== $comment->comment_parent ) {
								$avatar_size = 36;
							}
								echo get_avatar( $comment, $avatar_size );
							?>
							<span class="comment-name"><?php echo wp_kses_post( get_comment_author_link() ); ?></span><br />
							<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
								<time pubdate="pubdate" datetime="<?php echo esc_html( get_comment_time( 'c' ) ); ?>">
									<?php echo esc_html( get_comment_date() ); ?>, <?php echo esc_html( get_comment_time() ); ?>
								</time>
							</a>
							<br />
						</div><!-- END .comment-author .vcard -->
					</footer>

					<div class="comment-content">
						<?php if ( '0' === $comment->comment_approved ) : ?>
						<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'natural-lite' ); ?></em>
						<br />
					<?php endif; ?>
						<?php comment_text(); ?>
						<div class="reply">
						<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									'reply_text' => esc_html__( 'Reply', 'natural-lite' ),
									'depth'      => $depth,
									'max_depth'  => $args['max_depth'],
								)
							)
						);
						?>
						</div><!-- .reply -->
						<?php edit_comment_link( esc_html__( 'Edit', 'natural-lite' ), '<span class="edit-link">', '</span>' ); ?>
					</div>

				</article><!-- #comment-## -->

				<?php
		endswitch;
	}
} // Ends check for natural_lite_comment().

/*
-------------------------------------------------------------------------------------------------------
Custom Excerpt Length
-------------------------------------------------------------------------------------------------------
*/

function natural_lite_excerpt_length( $length ) {
	return 44;
}
add_filter( 'excerpt_length', 'natural_lite_excerpt_length', 999 );

function natural_lite_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'natural_lite_excerpt_more' );

/*
-------------------------------------------------------------------------------------------------------
Custom Excerpt
-------------------------------------------------------------------------------------------------------
*/

function natural_lite_excerpt( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( ' ', $excerpt ) . '...';
	} else {
		$excerpt = implode( ' ', $excerpt );
	}
	$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );
	return $excerpt;
}

function natural_lite_content( $limit ) {
	$content = explode( ' ', get_the_content(), $limit );
	if ( count( $content ) >= $limit ) {
		array_pop( $content );
		$content = implode( ' ', $content ) . '...';
	} else {
		$content = implode( ' ', $content );
	}
	$content = preg_replace( '/[.+]/', '', $content );
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	return $content;
}

/*
-------------------------------------------------------------------------------------------------------
Pagination Function
-------------------------------------------------------------------------------------------------------
*/

function natural_lite_get_pagination_links() {
	global $wp_query;
	$big = 999999999;
	echo wp_kses_post( paginate_links( array(
		'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'    => '?paged=%#%',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'prev_text' => esc_html__( '&laquo;', 'natural-lite' ),
		'next_text' => esc_html__( '&raquo;', 'natural-lite' ),
		'total'     => $wp_query->max_num_pages,
	) ) );
}

/*
-------------------------------------------------------------------------------------------------------
Custom Page Links
-------------------------------------------------------------------------------------------------------
*/

function natural_lite_wp_link_pages_args_prevnext_add( $args ) {
	global $page, $numpages, $more, $pagenow;

	if ( ! $args['next_or_number'] == 'next_and_number' ) {
		return $args; }

	$args['next_or_number'] = 'number'; // Keep numbering for the main part.
	if ( ! $more ) {
		return $args; }

	if ( $page - 1 ) { // There is a previous page.
		$args['before'] .= _wp_link_page( $page - 1 )
			. $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>'; }

	if ( $page < $numpages ) { // There is a next page.
		$args['after'] = _wp_link_page( $page + 1 )
			. $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
			. $args['after']; }

	return $args;
}

add_filter( 'wp_link_pages_args', 'natural_lite_wp_link_pages_args_prevnext_add' );

/*
-------------------------------------------------------------------------------------------------------
Body Class
-------------------------------------------------------------------------------------------------------
*/

function natural_lite_body_class( $classes ) {

	$header_image = get_header_image();

	if ( ! empty( $header_image ) ) {
		$classes[] = 'natural-header-active';
	} else {
		$classes[] = 'natural-header-inactive';
	}

	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'template-full.php' ) ) {
		$classes[] = 'natural-sidebar-active';
	} else {
		$classes[] = 'natural-sidebar-inactive';
	}

	if ( is_page_template( 'template-full.php' ) ) {
		$classes[] = 'natural-full-template'; }

	if ( empty( $header_image ) ) {
		$classes[] = 'natural-header-inactive'; }

	if ( is_singular() ) {
		$classes[] = 'natural-singular'; }

	if ( is_active_sidebar( 'right-sidebar' ) ) {
		$classes[] = 'natural-right-sidebar'; }

	if ( '' != get_theme_mod( 'background_image' ) ) {
		// This class will render when a background image is set
		// regardless of whether the user has set a color as well.
		$classes[] = 'natural-background-image';
	} elseif ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ), true ) ) {
		// This class will render when a background color is set
		// but no image is set. In the case the content text will
		// Adjust relative to the background color.
		$classes[] = 'natural-relative-text';
	}

	return $classes;
}
add_action( 'body_class', 'natural_lite_body_class' );

/*
-------------------------------------------------------------------------------------------------------
First Featured Video
-------------------------------------------------------------------------------------------------------
*/

function natural_lite_first_embed_media() {
	global $post, $posts;
	$first_vid = '';
	$content   = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
	$embeds    = get_media_embedded_in_content( $content );

	if ( ! empty( $embeds ) ) {
		foreach ( $embeds as $embed ) {
			if ( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) ) {
				return $embed;
			}
		}
	} else {
		return false;
	}
}

/*
-----------------------------------------------------------------------------------------------------//
Includes
-------------------------------------------------------------------------------------------------------
*/

require_once get_template_directory() . '/customizer/customizer.php';
require_once get_template_directory() . '/includes/typefaces.php';
require_once get_template_directory() . '/includes/plugin-activation.php';
require_once get_template_directory() . '/includes/plugin-activation-class.php';
