<?php

/***** Theme Info Page *****/

if (!function_exists('didi_theme_info_page')) {
	function didi_theme_info_page() {
		add_theme_page(esc_html__('Welcome to Didi', 'didi'), esc_html__('Theme Info', 'didi'), 'edit_theme_options', 'blog', 'didi_display_theme_page');
	}
}
add_action('admin_menu', 'didi_theme_info_page');

if (!function_exists('didi_display_theme_page')) {
	function didi_display_theme_page() {
		$theme_data = wp_get_theme(); ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to %1s %2s', 'didi'), $theme_data->Name, $theme_data->Version); ?>
			</h1>

			<p>
				<a href="<?php echo esc_url('http://www.anarieldesign.com/themes/fashion-blog-wordpress-theme/'); ?>" target="_blank" class="button button-primary">
					<?php esc_html_e('Find more about Didi', 'didi'); ?>
				</a>
			</p>
		<div class="ad-row clearfix">
			<div class="ad-col-1-2">
				<div class="section">
					<div class="theme-description">
						<?php echo $theme_data->Description; ?>
					</div>
				</div>
			</div>
			<div class="ad-col-1-2">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_html_e('Theme Screenshot', 'didi'); ?>" />
			</div></div>
			<hr>
			<div id="getting-started" class="bg">
				<h3>
					<?php printf(esc_html__('Getting Started with %s', 'didi'), $theme_data->Name); ?>
				</h3>
				<div class="ad-row clearfix">
						<div class="section documentation">
							<h4>
								<?php esc_html_e('Theme Documentation', 'didi'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Please check the documentation to get better overview of how the theme is structured.', 'didi'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/documentation/didi/'); ?>" target="_blank" class="button button-primary">
									<?php esc_html_e('Visit Documentation', 'didi'); ?>
								</a>
							</p>
						</div>
						<div class="section options">
							<h4>
								<?php esc_html_e('Theme Options', 'didi'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Click "Customize" to open the Customizer. Didi has implemented Customizer and added some useful options to help you style theme background, color elements, upload image logo, to choose different blog layouts and a lot more.',  'didi'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary">
									<?php esc_html_e('Customize', 'didi'); ?>
								</a>
							</p>
						</div>
						<div class="section video">
							<h4>
								<?php esc_html_e('Didi Video Presentation', 'didi'); ?>
							</h4>
							<p>
								<a href="<?php echo esc_url('https://www.youtube.com/watch?v=ZSU7cHTduBs'); ?>" class="button button-primary" target="_blank">
									<?php esc_html_e('Video Presentation', 'didi'); ?>
								</a>
							</p>
						</div>
						<div class="section recommend clear">
							<h4>
								<?php esc_html_e('Recommended Plugins', 'didi'); ?>
							</h4>
							<p class="center"><?php esc_html_e('Plugins listed are not mandatory for theme to work! Install only the ones you need for your website!', 'didi'); ?></p>
							<!-- Give -->
							<div class="didi-tab-pane-half didi-tab-pane-first-half">

							<!-- WooCommerce -->
							<p><strong><?php esc_html_e( 'WooCommerce', 'didi' ); ?></strong></p>
							<p><?php esc_html_e( 'An e-commerce toolkit that helps you sell anything. Beautifully.', 'didi' ); ?></p>

							<?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) { ?>

							<p><span class="didi-w-activated button"><?php esc_html_e( 'Already activated', 'didi' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=woocommerce' ), 'install-plugin_woocommerce' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install WooCommerce', 'didi' ); ?></a></p>

							<?php
							}

							?>
							<!-- Jetpack -->
							<p><strong><?php esc_html_e( 'Jetpack', 'didi' ); ?></strong></p>
							<p><?php esc_html_e( 'Bring the power of the WordPress.com cloud to your self-hosted WordPress. Jetpack enables you to connect your blog to a WordPress.com account to use the powerful features normally only available to WordPress.com users.

', 'didi' ); ?></p>

							<?php if ( is_plugin_active( 'jetpack/jetpack.php' ) ) { ?>

							<p><span class="didi-activated button"><?php esc_html_e( 'Already activated', 'didi' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=jetpack' ), 'install-plugin_jetpack' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Jetpack', 'didi' ); ?></a></p>

							<?php
							}

							?>
							<!-- Page Builder by SiteOrigin -->
							<p><strong><?php esc_html_e( 'Page Builder by SiteOrigin', 'didi' ); ?></strong></p>
							<p><?php esc_html_e( 'A drag and drop, responsive page builder that simplifies building your website.', 'didi' ); ?></p>

							<?php if ( is_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) ) { ?>

							<p><span class="didi-activated button"><?php esc_html_e( 'Already activated', 'didi' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=siteorigin-panels' ), 'install-plugin_siteorigin-panels' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Page Builder by SiteOrigin', 'didi' ); ?></a></p>

							<?php
							}

							?>

							<!-- SiteOrigin Widgets Bundle -->
							<p><strong><?php esc_html_e( 'SiteOrigin Widgets Bundle', 'didi' ); ?></strong></p>
							<p><?php esc_html_e( 'A collection of all widgets, neatly bundled into a single plugin.', 'didi' ); ?></p>

							<?php if ( is_plugin_active( 'so-widgets-bundle/so-widgets-bundle.php' ) ) { ?>

							<p><span class="didi-activated button"><?php esc_html_e( 'Already activated', 'didi' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=so-widgets-bundle' ), 'install-plugin_so-widgets-bundle' ) ); ?>" class="button button-primary"><?php esc_html_e( 'SiteOrigin Widgets Bundle', 'didi' ); ?></a></p>

							<?php
							}

							?>
							</div>

							<div class="didi-tab-pane-half">

							<!-- Instagram Widget -->
							<p><strong><?php esc_html_e( 'Instagram widget by WPZOOM', 'didi' ); ?></strong></p>
							<p><?php esc_html_e( 'Fully customisable and responsive Instagram timeline widget for WordPress', 'didi' ); ?></p>

							<?php if ( is_plugin_active( 'instagram-widget-by-wpzoom/instagram-widget-by-wpzoom.php' ) ) { ?>

							<p><span class="didi-activated button"><?php esc_html_e( 'Already activated', 'didi' ); ?></span></p>

							<?php
							}
							else { ?>

							<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=instagram-widget-by-wpzoom' ), 'install-plugin_instagram-widget-by-wpzoom' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Instagram widget by WPZOOM', 'didi' ); ?></a></p>

							<?php
							}

							?>
							<!-- Premium Soliloquy Slider -->
							<p><strong><?php esc_html_e( 'Premium Soliloquy Slider', 'didi' ); ?></strong></p>

							<?php if ( is_plugin_active( 'soliloquy/soliloquy.php' ) ) { ?>

							<p><span class="didi-activated button"><?php esc_html_e( 'Already activated', 'didi' ); ?></span></p>

							<?php
							}
							else { ?>

							<p class="bg2"><?php esc_html_e( 'Plugin & license key can be found inside the plugins folder within the main folder you downloaded', 'didi' ); ?></p>

							<?php
							}
							?>
							<!-- Custom Google Fonts Plugin -->
							<p><strong><?php esc_html_e( 'Custom Google Fonts Plugin', 'didi' ); ?></strong></p>

							<?php if ( is_plugin_active( 'AnarielDesign-GoogleFonts/ad_gfp.php' ) ) { ?>

							<p><span class="didi-activated button"><?php esc_html_e( 'Already activated', 'didi' ); ?></span></p>

							<?php
							}
							else { ?>

							<p class="bg2"><?php esc_html_e( 'Plugin can be found inside the plugins folder within the main folder you downloaded', 'didi' ); ?></p>

							<?php
							}
							?>
							</div>
						</div>
						<div class="clear"></div>
						<div class="section bg1">
							<h3>
								<?php esc_html_e('More Themes by Anariel Design', 'didi'); ?>
							</h3>
							<p class="about">
								<?php printf(esc_html__('Build Your Dream WordPress Site with Premium Niche Themes for Bloggers & Charities',  'didi'), $theme_data->Name); ?>
							</p>
							<a target="_blank" href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>"><img src="http://www.anarieldesign.com/themedemos/marketimages/anarieldesign-themes.jpg" alt="<?php esc_html_e('Theme Screenshot', 'didi'); ?>" /></a>
							<p>
								<a target="_blank" href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>" class="button button-primary advertising">
									<?php esc_html_e('More Themes', 'didi'); ?>
								</a>
							</p>
						</div>
					</div>
			</div>
			<hr>
			<div id="theme-author">
				<p>
					<?php printf(esc_html__('%1s is proudly brought to you by %2s. %3s: %4s.', 'didi'), $theme_data->Name, '<a target="_blank" href="http://www.anarieldesign.com/" title="Anariel Design">Anariel Design</a>', $theme_data->Name, '<a target="_blank" href="http://www.anarieldesign.com/themes/fashion-blog-wordpress-theme/" title="Didi Theme Demo">' . esc_html__('Theme Demo', 'didi') . '</a>'); ?>
				</p>
			</div>
		</div><?php
	}
}

?>