<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Didi
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'didi' ); ?></a>
<div class="full-size alternative">
	<div class="site">
		<?php if ( get_header_image() ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="" class="custom-header">
			</a>
		<?php endif; // End header image check. ?>
			<div class="primarymenu clear alternative">
				<div class="hfeed">
					<div class="site-branding">
						<header id="masthead" class="site-header" role="banner">
							<?php if ( get_theme_mod( 'didi_logo' ) ) : ?>
								<div class="site-logo">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'didi_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
								</div><!-- .site-logo -->
								<?php endif; ?>
								<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php endif;
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; ?></p>
							<?php endif; ?>
						</header>
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'didi' ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</div><!-- .site-brandindg -->
			</div><!-- .hfeed -->
		</div><!-- .primarymenu -->
	</div><!-- .site -->
</div><!-- .full -->
	<?php if ( has_nav_menu( 'social' ) ) : ?>
	<div class="social-block">
		<nav id="social-navigation" class="social-navigation" role="navigation">
			<?php
				// Social links navigation menu.
				wp_nav_menu( array(
					'theme_location' => 'social',
					'depth'		  => 1,
					'link_before'	=> '<span class="screen-reader-text">',
					'link_after'	 => '</span>',
				) );
			?>
		</nav><!-- .social-navigation -->
		<?php if( ! get_theme_mod( 'didi_search_top' ) ) : ?>
			<div class="search-toggle">
				<a href="#search-container" class="screen-reader-text" aria-expanded="false" aria-controls="search-container"><?php esc_html_e( 'Search', 'didi' ); ?></a>
			</div>
			<div id="search-container" class="search-box-wrapper hide">
				<div class="search-box">
					<?php get_search_form(); ?>
				</div>
			</div>
		<?php endif; ?>
	</div><!-- .social-block -->
	<?php else: ?>
	<?php if( ! get_theme_mod( 'didi_search_top' ) ) : ?>
	<div class="social-block search-block">
		<div class="search-toggle custom">
			<a href="#search-container" class="screen-reader-text" aria-expanded="false" aria-controls="search-container"><?php esc_html_e( 'Search', 'didi' ); ?></a>
		</div>
		<div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php endif; ?>

	<div id="page" class="hfeed site">
		<div id="content" class="site-content">