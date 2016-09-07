<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////
function didi_customizer_css() {
	?>
	<style type="text/css">
		.search-toggle, 
		.single .posted-on time.entry-date.published, .entry-content a.button, .promo a, .button, .custom .promo a, .top .soliloquy-container.soliloquy-theme-karisma .soliloquy-controls-direction a:hover, 
		.top .soliloquy-container.soliloquy-theme-karisma .soliloquy-controls-auto-item a:hover, #main .soliloquy-container.soliloquy-theme-karisma .soliloquy-controls-direction a:hover,  #main .soliloquy-container.soliloquy-theme-karisma .soliloquy-controls-auto-item a:hover,
		#page .soliloquy-container.soliloquy-theme-karisma .soliloquy-controls-direction a:hover, #page .soliloquy-container.soliloquy-theme-karisma .soliloquy-controls-auto-item a:hover, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, 
        .woocommerce div.product span.price, .widget_search .search-submit { background:<?php echo get_theme_mod( 'didi_yellow_colors' ); ?>; }
		.woocommerce span.onsale, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .ui-slider .ui-slider-range { background-color:<?php echo get_theme_mod( 'didi_yellow_colors' ); ?>; }
		.woocommerce .woocommerce-message, .woocommerce .woocommerce-info { border-top-color:<?php echo get_theme_mod( 'didi_yellow_colors' ); ?>; }
		.social-navigation a:hover, .social-navigation a:hover:before, span.color, .link--kukuri:hover, .link--kukuri::before, .woocommerce .woocommerce-message:before, .woocommerce .woocommerce-info:before, .woocommerce .star-rating span:before { color:<?php echo get_theme_mod( 'didi_yellow_colors' ); ?>; }
		@media screen and ( min-width: 45em ) {
			.search-toggle { background:<?php echo get_theme_mod( 'didi_yellow_colors' ); ?>; }
			.main-navigation > div > ul { border-top-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
			.main-navigation > div > ul { border-bottom-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
			.single .entry-footer span { border-right-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
			.social-block { background:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		}
		@media screen and ( min-width: 55em ) {
		.grid .byline, .grid .comments-link { border-right-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		}
		@media screen and ( min-width: 70em ) {
		.comment .comment-metadata span.comment-author { border-bottom-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		.entry-meta.default span.author.vcard, .entry-meta.default span.comments-link { border-right-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		}
		
		body, button, input, select, textarea, button, input[type="button"], input[type="reset"], input[type="submit"], #main #infinite-handle span, input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"],
		.search-box input[type="search"], .error404 input[type="search"], input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, textarea, textarea:focus, .search-toggle:before, a, a:visited,
		a:hover, a:focus, a:active, #secondary .widget-title, .entry-content a.button, .promo a, .button, .custom .promo a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, 
        .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce span.onsale, .woocommerce-checkout #payment div.payment_box,
		.woocommerce .woocommerce-breadcrumb a, .woocommerce .woocommerce-breadcrumb { color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		hr, .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content { background-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		.site-footer, .social-block, .entry-content a.button:hover, .promo, .promo a:hover, .button:hover, .overlay, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, 
        .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .widget_search .search-submit:hover, .widget_search .search-submit:focus { background:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		tbody, th, .site td, textarea, textarea:focus, .author-info, .tagcloud a, #secondary .widget-title, .sticky, .widget_didi_recent_post .post-content, .jetpack_subscription_widget form, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, 
        .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce-checkout #payment, .woocommerce .quantity .qty,
		.woocommerce .woocommerce-ordering select, .woocommerce-cart table.cart td.actions .coupon .input-text, nav.woocommerce-breadcrumb a, .woocommerce .shop_table td, .woocommerce .shop_table th  { border-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		form.search-form, .single .entry-footer, .blog .entry-meta, .archive .entry-meta, .single .entry-meta, .search .entry-meta, .blog .grid .entry-meta, .archive .grid .entry-meta, .blog .entry-meta span.posted-on,.archive .entry-meta span.posted-on,.single .entry-meta span.posted-on,
        .search .entry-meta span.posted-on, .custom .promo, .widgetized-content .widget-title, .customwidget .posted-on, .custom .widget-title, .woocommerce-checkout #payment ul.payment_methods, .list-layout .entry-content a:hover, .sidebar-right-layout .entry-title a:hover { border-bottom-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		.custom .promo, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce .content div.product .woocommerce-tabs ul.tabs li, .woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total { border-top-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		.woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce .content div.product .woocommerce-tabs ul.tabs li { border-left-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		.woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce .content div.product .woocommerce-tabs ul.tabs li { border-right-color:<?php echo get_theme_mod( 'didi_black_colors' ); ?>; }
		input[type="text"], input[type="email"], input[type="url"], input[type="password"], button, input[type="button"], input[type="reset"], input[type="submit"] { box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 2px 0; }
		input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="button"], input[type="reset"], input[type="submit"] { -webkit-box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 2px 0; }
		input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="button"], input[type="reset"], input[type="submit"] { -moz-box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 2px 0; }
	    .list-layout .entry-content a.more-link:hover, .blog .grid .entry-content a.more-link:hover { box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 1px 0; }
		.list-layout .entry-content a.more-link:hover, .blog .grid .entry-content a.more-link:hover { -webkit-box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 1px 0; }
		i.list-layout .entry-content a.more-link:hover, .blog .grid .entry-content a.more-link:hover { -moz-box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 1px 0; }
		button:hover,input[type="button"]:hover,input[type="reset"]:hover,input[type="submit"]:hover,input[type="text"]:hover, input[type="email"]:hover, input[type="url"]:hover, input[type="password"]:hover, input[type="search"]:hover, .list-layout .entry-content a.more-link:hover, .blog .grid .entry-content a.more-link:hover { -moz-box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 4px 0; } 
		button:hover,input[type="button"]:hover,input[type="reset"]:hover,input[type="submit"]:hover,input[type="text"]:hover, input[type="email"]:hover, input[type="url"]:hover, input[type="password"]:hover, input[type="search"]:hover, .list-layout .entry-content a.more-link:hover, .blog .grid .entry-content a.more-link:hover { -webkit-box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 4px 0; } 
		button:hover,input[type="button"]:hover,input[type="reset"]:hover,input[type="submit"]:hover,input[type="text"]:hover, input[type="email"]:hover, input[type="url"]:hover, input[type="password"]:hover, input[type="search"]:hover, .list-layout .entry-content a.more-link:hover, .blog .grid .entry-content a.more-link:hover { box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 4px 0; } 
		button:focus,input[type="button"]:focus,input[type="reset"]:focus,input[type="submit"]:focus,input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus { -moz-box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 4px 0; } 
		button:focus,input[type="button"]:focus,input[type="reset"]:focus,input[type="submit"]:focus,input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus { -webkit-box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 4px 0; } 
		button:focus,input[type="button"]:focus,input[type="reset"]:focus,input[type="submit"]:focus,input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus { box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 4px 0; }
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active:before, .woocommerce div.product .woocommerce-tabs ul.tabs li:before,.woocommerce div.product .woocommerce-tabs ul.tabs li:after,.woocommerce div.product .woocommerce-tabs ul.tabs li.active:after { box-shadow:<?php echo get_theme_mod( 'didi_black_colors' ); ?> 0 0 0; }
		
		.search-box-wrapper, .footer-widgets.clear, .widget_didi_recent_post .post-content, .link--kukuri::after, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, 
        .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce .woocommerce-ordering select { background:<?php echo get_theme_mod( 'didi_white_colors' ); ?>; }
		.social-navigation a, .social-navigation a:before, .social-navigation a:before:visited, .entry-content a.button:hover, .promo, .promo a:hover, .button:hover, .front-page-content p, .front-page-content h2, .link, .link:visited, 
		.link--kukuri, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, 
        .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover { color:<?php echo get_theme_mod( 'didi_white_colors' ); ?>; }
		
		<?php if(get_theme_mod( 'didi_custom_css' )) : ?>
		<?php echo wp_kses( get_theme_mod( 'didi_custom_css' ), '' ); ?>
		<?php endif; ?>
		
		<?php if(get_theme_mod( 'didi_shop_sidebar' )) : ?>
		.archive.woocommerce #secondary {
			display: none;
		}
		.archive.woocommerce div#container {
			width: 100%;
			float: none;
			margin-right: 0;
		}
		<?php endif; ?>
		
		<?php if(get_theme_mod( 'didi_shop_single_sidebar' )) : ?>
		.single.woocommerce #secondary {
			display: none;
		}
		.single.woocommerce div#container {
			width: 100%;
			float: none;
			margin-right: 0;
		}
		<?php endif; ?>

	</style>
	<?php
}
add_action( 'wp_head', 'didi_customizer_css' );
?>