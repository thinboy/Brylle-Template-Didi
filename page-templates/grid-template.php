<?php
/**
 * Template Name: Grid Template
 * The template for displaying a grid page.
 *
 * @package Didi
 */

get_header(); ?>

	<div id="primary" class="content-area gridpage">
		<main id="main" class="site-main" role="main">
			<div class="main-content">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'template-parts/content', 'page' );

				// End the loop.
				endwhile;
				?>
				<div class="columns customwidget clear">
						<?php
							$child_pages = new WP_Query( array(
								'post_type'      => 'page',
								'orderby'        => 'menu_order',
								'order'          => 'ASC',
								'post_parent'    => $post->ID,
								'posts_per_page' => 999,
								'no_found_rows'  => true,
							) );
							while ( $child_pages->have_posts() ) : $child_pages->the_post();
								 get_template_part( 'template-parts/content', 'grid-page' );
							endwhile;
							wp_reset_postdata();
						?>
					</div><!-- .child-pages -->

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

			</div><!-- .main-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>