<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Didi
 */

get_header(); ?>

	<?php if( 'list' == get_theme_mod( 'didi_blog_layout' ) ) : ?>
	<div id="primary" class="content-area list-layout">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					 get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php elseif( 'sidebar-left' == get_theme_mod( 'didi_blog_layout' ) ) : ?>
	<div class="one-third">
		<?php get_sidebar(); ?>
	</div><!-- .one_third -->
	<div class="two-third lastcolumn">
		<div id="primary" class="content-area sidebar-right-layout">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						 get_template_part( 'template-parts/content-default', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .two_third -->

	<?php elseif( 'grid-two' == get_theme_mod( 'didi_blog_layout' ) ) : ?>
	<div id="primary" class="content-area sidebar-right-layout grid clear">
		<main id="main" class="site-main" role="main">
			<div class="posts customwidget columns clearfix">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							 get_template_part( 'template-parts/content-grid-two', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

			</div><!-- .posts -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="content-area sidebar-right-layout">
		<div class="site-main" role="main">
			<?php the_posts_navigation(); ?>
		</div><!-- #main -->
	</div><!-- #primary -->

	<?php elseif( 'grid-two-sidebar' == get_theme_mod( 'didi_blog_layout' ) ) : ?>
	<div class="two-third">
		<div id="primary" class="content-area sidebar-right-layout grid clear">
			<main id="main" class="site-main" role="main">
				<div class="posts customwidget columns clearfix">

					<?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								 get_template_part( 'template-parts/content-grid-two', get_post_format() );
							?>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>

				</div><!-- .posts -->
			</main><!-- #main -->
		</div><!-- #primary -->
	<div class="content-area sidebar-right-layout">
		<div class="site-main" role="main">
			<?php the_posts_navigation(); ?>
		</div><!-- #main -->
	</div><!-- #primary -->
	</div><!-- .two_third -->
	<div class="one-third lastcolumn">
		<?php get_sidebar(); ?>
	</div><!-- .one_third -->

	<?php elseif( 'grid-three' == get_theme_mod( 'didi_blog_layout' ) ) : ?>
	<div id="primary" class="content-area sidebar-right-layout grid clear">
		<main id="main" class="site-main" role="main">
			<div class="posts customwidget columns clearfix">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							 get_template_part( 'template-parts/content-grid-three', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

			</div><!-- .posts -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="content-area sidebar-right-layout">
		<div class="site-main" role="main">
			<?php the_posts_navigation(); ?>
		</div><!-- #main -->
	</div><!-- #primary -->
	<?php else: ?>
	<div class="two-third">
		<div id="primary" class="content-area sidebar-right-layout">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						 get_template_part( 'template-parts/content-default', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .two_third -->
	<div class="one-third lastcolumn">
		<?php get_sidebar(); ?>
	</div><!-- .one_third -->
	<?php endif; ?>

<?php get_footer(); ?>