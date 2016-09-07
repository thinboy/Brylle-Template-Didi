<?php
/**
 * Didi Theme Customizer
 *
 * @package Didi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function didi_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'didi_general_options', array(
		'title'             => esc_html__( 'Theme Options', 'didi' ),
		'priority'          => 32,
	) );
	/**
	* Search Bar
	*/
	$wp_customize->add_setting( 'didi_search_top', array(
		'default'           => false,
		'sanitize_callback' => 'didi_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'didi_search_top', array(
		'label'             => esc_html__( 'Hide Search Box', 'didi' ),
		'section'           => 'didi_general_options',
		'settings'          => 'didi_search_top',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );

	/* Blog Layout */
	$wp_customize->add_setting( 'didi_blog_layout', array(
		'default'           => 'sidebar-right',
		'sanitize_callback' => 'didi_sanitize_choices',
	) );
	$wp_customize->add_control( 'didi_blog_layout', array(
		'label'             => esc_html__( 'Blog Layout', 'didi' ),
		'description'       => esc_html__( 'Choose the best blog layout for your site. You can have no sidebar, change the position of the sidebar, or select a grid layout. Also applies to archive pages.', 'didi' ),
		'section'           => 'didi_general_options',
		'settings'          => 'didi_blog_layout',
		'priority'          => 3,
		'type'              => 'radio',
		'choices'           => array(
			'list'   => esc_html__( 'No Sidebar Layout', 'didi' ),
			'sidebar-right'  => esc_html__( 'Right Sidebar Layout', 'didi' ),
			'sidebar-left'  => esc_html__( 'Left Sidebar Layout', 'didi' ),
			'grid-two'  => esc_html__( 'Two Column Grid Layout', 'didi' ),
			'grid-two-sidebar'  => esc_html__( 'Two Column Grid Layout with Sidebar', 'didi' ),
			'grid-three'  => esc_html__( 'Three Column Grid Layout', 'didi' ),
		)
	) );

	/* Post Display */
	$wp_customize->add_setting( 'didi_post_type', array(
		'default'           => 'full-lenght',
		'sanitize_callback' => 'didi_sanitize_choices',
	) );
	$wp_customize->add_control( 'didi_post_type', array(
		'label'             => esc_html__( 'Post Display', 'didi' ),
		'section'           => 'didi_general_options',
		'settings'          => 'didi_post_type',
		'priority'          => 14,
		'type'              => 'radio',
		'choices'           => array(
			'full-lenght'   => esc_html__( 'Full Length', 'didi' ),
			'excerpt-lenght'  => esc_html__( 'Excerpt', 'didi' ),
		)
	) );

	/* Post Settings */
	$wp_customize->add_setting( 'didi_post_footer', array(
		'default'           => false,
		'sanitize_callback' => 'didi_sanitize_checkbox',
	) );
	$wp_customize->add_control('didi_post_footer', array(
				'label'      => esc_html__( 'Hide post author and date from posts.', 'didi' ),
				'section'    => 'didi_general_options',
				'settings'   => 'didi_post_footer',
				'type'		 => 'checkbox',
				'priority'	 => 15
		) );

	$wp_customize->add_setting( 'didi_author_bio', array(
		'default'           => false,
		'sanitize_callback' => 'didi_sanitize_checkbox',
	) );
	$wp_customize->add_control('didi_author_bio', array(
				'label'      => esc_html__( 'Hide author bio ("published by" box).', 'didi' ),
				'section'    => 'didi_general_options',
				'settings'   => 'didi_author_bio',
				'type'		 => 'checkbox',
				'priority'	 => 16
		) );

/**
	* Shop Sidebar
	*/
	$wp_customize->add_section( 'didi_shop_section' , array(
	  'title'       => esc_html__( 'WooCommerce Options', 'didi' ),
	  'priority'    => 33,
	  'description' => esc_html__( 'Hide sidebar on main and single product page', 'didi' )
	) );
	$wp_customize->add_setting( 'didi_shop_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'didi_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'didi_shop_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on main product page', 'didi' ),
		'section'           => 'didi_shop_section',
		'settings'          => 'didi_shop_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );
	$wp_customize->add_setting( 'didi_shop_single_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'didi_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'didi_shop_single_sidebar', array(
		'label'             => esc_html__( 'Check this box if you want to hide sidebar on single product page', 'didi' ),
		'section'           => 'didi_shop_section',
		'settings'          => 'didi_shop_single_sidebar',
		'type'		        => 'checkbox',
		'priority'          => 2,
	) );


/* Adds the individual sections for custom logo*/
	$wp_customize->add_section( 'didi_logo_section' , array(
	  'title'       => esc_html__( 'Logo', 'didi' ),
	  'priority'    => 28,
	  'description' => esc_html__( 'Upload your logo image', 'didi' )
	) );
	$wp_customize->add_setting( 'didi_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'didi_logo', array(
		'label'    => esc_html__( 'Logo', 'didi' ),
		'section'  => 'didi_logo_section',
		'settings' => 'didi_logo',
	) ) );
	
/**
* Custom CSS
*/
	$wp_customize->add_section( 'didi_custom_css_section' , array(
   		'title'    => esc_html__( 'Custom CSS', 'didi' ),
   		'description'=> 'Add your custom CSS which will overwrite the theme CSS',
   		'priority'   => 34,
	) );

	/* Custom CSS*/
	$wp_customize->add_setting( 'didi_custom_css', array(
		'default'           => '',
		'sanitize_callback' => 'didi_sanitize_text',
	) );
	$wp_customize->add_control( 'didi_custom_css', array(
		'label'             => esc_html__( 'Custom CSS', 'didi' ),
		'section'           => 'didi_custom_css_section',
		'settings'          => 'didi_custom_css',
		'type'		        => 'textarea',
		'priority'          => 1,
	) );
/**
* Custom Colors
*/
	$wp_customize->add_section( 'didi_new_section_color_general' , array(
   		'title'      => esc_html__( 'Custom Colors', 'didi' ),
   		'description'=> '',
   		'priority'   => 35,
	) );

	/* Colors General */
	$wp_customize->add_setting( 'didi_yellow_colors', array(
		'default'           => '#fee85d',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'didi_yellow_colors', array(
		'label'             => esc_html__( 'All Elements with Yellow Color', 'didi' ),
		'section'           => 'didi_new_section_color_general',
		'settings'          => 'didi_yellow_colors',
		'priority'          => 1,
	) ) );

	$wp_customize->add_setting( 'didi_black_colors', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'didi_black_colors', array(
		'label'             => esc_html__( 'All Elements with Black Color', 'didi' ),
		'section'           => 'didi_new_section_color_general',
		'settings'          => 'didi_black_colors',
		'priority'          => 2,
	) ) );
	$wp_customize->add_setting( 'didi_white_colors', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'didi_white_colors', array(
		'label'             => esc_html__( 'All Text Elements with White Color', 'didi' ),
		'section'           => 'didi_new_section_color_general',
		'settings'          => 'didi_white_colors',
		'priority'          => 3,
	) ) );
	
	/**
* Adds the individual sections for footer
*/
	$wp_customize->add_section( 'didi_copyright_section' , array(
		'title'    => esc_html__( 'Copyright Settings', 'didi' ),
		'description' => esc_html__( 'This is a settings section.', 'didi' ),
		'priority'   => 302,
	) );

	$wp_customize->add_setting( 'didi_copyright', array(
		'default'           => esc_html__( 'Didi Theme by Anariel Design. All rights reserved', 'didi' ),
		'sanitize_callback' => 'didi_sanitize_text',
	) );
	$wp_customize->add_control( 'didi_copyright', array(
		'label'             => esc_html__( 'Copyright text', 'didi' ),
		'section'           => 'didi_copyright_section',
		'settings'          => 'didi_copyright',
		'type'		        => 'text',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'hide_copyright', array(
		'sanitize_callback' => 'didi_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'hide_copyright', array(
		'label'             => esc_html__( 'Hide copyright text', 'didi' ),
		'section'           => 'didi_copyright_section',
		'settings'          => 'hide_copyright',
		'type'		        => 'checkbox',
		'priority'          => 1,
	) );
		/***** Register Custom Controls *****/

	class Didi_Upgrade extends WP_Customize_Control {
		public function render_content() {  ?>
			<p class="didi-upgrade-thumb">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
			</p>
			<p class="textfield didi-upgrade-text">
				<a href="<?php echo esc_url('http://www.anarieldesign.com/documentation/didi/'); ?>" target="_blank" class="button button-secondary">
					<?php esc_html_e('Visit Documentation', 'didi'); ?>
				</a>
			</p>
			<p class="customize-control-title didi-upgrade-title">
				<a href="<?php echo esc_url('https://www.youtube.com/watch?v=ZSU7cHTduBs'); ?>" class="button button-secondary" target="_blank">
					<?php esc_html_e('Video Presentation', 'didi'); ?>
				</a>
			</p>
			<p class="didi-upgrade-button">
				<a href="http://www.anarieldesign.com/themes/" target="_blank" class="button button-secondary">
					<?php esc_html_e('More Themes by Anariel Design', 'didi'); ?>
				</a>
			</p><?php
		}
	}

	/***** Add Sections *****/

	$wp_customize->add_section('didi_upgrade', array(
		'title' => esc_html__('Theme Info', 'didi'),
		'priority' => 600
	) );

	/***** Add Settings *****/

	$wp_customize->add_setting('didi_options[premium_version_upgrade]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	) );

	/***** Add Controls *****/

	$wp_customize->add_control(new Didi_Upgrade($wp_customize, 'premium_version_upgrade', array(
		'section' => 'didi_upgrade',
		'settings' => 'didi_options[premium_version_upgrade]',
		'priority' => 1
	) ) );
}
add_action( 'customize_register', 'didi_customize_register' );

/**
 * Sanitization
 */
//Checkboxes
function didi_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Integers
function didi_sanitize_int( $input ) {
	if( is_numeric( $input ) ) {
		return intval( $input );
	}
}
//Text
function didi_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}
//Radio Buttons and Select Lists
function didi_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

//Sanitize the dropdown pages.
function didi_sanitize_dropdown_pages( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function didi_customize_preview_js() {
	wp_enqueue_script( 'didi_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20150908', true );
}
add_action( 'customize_preview_init', 'didi_customize_preview_js' );
function didi_customizer_js() {
	wp_enqueue_script('didi-customizer', get_template_directory_uri() . '/js/didi-customizer.js', array(), '1.0.0', true);
	wp_localize_script('didi-customizer', 'didi_links', array(
		'title'	=> esc_html__('Theme Related Links:', 'didi'),
		'themeURL' => esc_url('http://www.anarieldesign.com/themes/fashion-blog-wordpress-theme/'),
		'themeLabel' => esc_html__('Theme Info Page', 'didi'),
		'docsURL' => esc_url('http://www.anarieldesign.com/documentation/didi/'),
		'docsLabel'	=> esc_html__('Theme Documentation', 'didi'),
		'rateURL' => esc_url('https://www.youtube.com/watch?v=ZSU7cHTduBs'),
		'rateLabel'	=> esc_html__('Video Presentation', 'didi'),
	));
}
add_action('customize_controls_enqueue_scripts', 'didi_customizer_js');