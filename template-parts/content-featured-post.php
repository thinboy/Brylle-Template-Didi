<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package WordPress
 * @subpackage Didi
 * @since Didi 1.0
 */
?>

	<div class="fourcolumn clear">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( ); ?>
						</a>
					</div>
				<?php } ?>
				<div class="featured-content">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<div class="category">
					<?php the_category(' '); ?>
				</div>
				</div>
			</div>
		</article><!-- #post-## -->
	</div><!-- .fourcolumn -->