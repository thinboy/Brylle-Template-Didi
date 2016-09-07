<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Didi
 */

?>
		<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>

		<div class="site-footer" role="complementary">
			<div class="footer-widgets clear">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="widget-area">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div><!-- .widget-area -->
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="widget-area">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div><!-- .widget-area -->
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="widget-area">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div><!-- .widget-area -->
				<?php endif; ?>
			</div><!-- .footer-widgets -->
		</div><!-- .site-footer -->
		<?php endif; ?>
		<footer id="colophon" class="site-info" role="contentinfo">
			<?php if( get_theme_mod( 'hide_copyright' ) == '') { ?>
				<?php
					/**
					* Fires before the Maisha footer text for footer customization.
					*
					* @since Maisha 1.0
					*/
					do_action( 'didi_credits' );
				?>
				<?php esc_attr_e('&copy;', 'didi'); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> <?php echo esc_textarea ( get_theme_mod( 'didi_copyright', 'didi Theme by Anariel Design.' ) ); ?> </a>
			<?php } // end if ?>
		</footer><!-- .site-info -->
	</div><!-- .page -->
</div><!-- .footer -->
<?php wp_footer(); ?>
</body>
</html>