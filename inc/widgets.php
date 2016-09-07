<?php
/**
 * Available Didi Custom Widgets
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Didi
 * @since Didi 1.0
 */
/*-----------------------------------------------------------------------------------*/
/* Custom Didi Widget: Promo Block
/*-----------------------------------------------------------------------------------*/
class Didi_Order_Block extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Promo Block', 'didi' ) );
		parent::__construct( false, esc_html__( 'Didi: Promo Block', 'didi' ),$widget_ops );
	}
	function widget( $args, $instance ) {
		$title = null; $text = null; $buttontext = null; $buttonlink = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['text'] ) ) { $text = $instance['text']; }
		if ( ! empty( $instance['buttontext'] ) ) { $buttontext = $instance['buttontext']; }
		if ( ! empty( $instance['buttonlink'] ) ) { $buttonlink = $instance['buttonlink']; }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3></div>'; ?>

		<div class="promo">
		<div class="clear">
			<p><?php echo esc_html( $text ); ?></p>
			<a href="<?php echo esc_url( $buttonlink ); ?>"><?php echo esc_html( $buttontext ); ?></a>
		</div>
		</div>

		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update ($new_instance, $old_instance ) {
		$instance['title'] = $new_instance['title'];
		$instance['text'] = $new_instance['text'];
		$instance['buttontext'] = $new_instance['buttontext'];
		$instance['buttonlink'] = $new_instance['buttonlink'];
		return $new_instance;
	}
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$text = isset( $instance['text'] ) ? esc_attr( $instance['text'] ) : 'The didi Book *NEW  - Fashion and other sweet things';
		$buttontext = isset( $instance['buttontext'] ) ? esc_attr( $instance['buttontext'] ) : 'Order Now';
		$buttonlink = isset( $instance['buttonlink'] ) ? esc_attr( $instance['buttonlink'] ) : 'http://yourlink.com/';
	?>
	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php esc_html_e( 'Text Part','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" value="<?php echo esc_attr( $text ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'buttontext' ); ?>"><?php esc_html_e( 'Button Text','didi' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'buttontext' ) ); ?>" value="<?php echo esc_attr( $buttontext ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'buttontext' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'buttonlink' ); ?>"><?php esc_html_e( 'Button Link','didi' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'buttonlink' ) ); ?>" value="<?php echo esc_attr( $buttonlink ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'buttonlink' ); ?>" /></p>
	<?php
	}
}
register_widget( 'Didi_Order_Block' );
/*-----------------------------------------------------------------------------------*/
/* Custom Didi Widget: Recent Posts
/*-----------------------------------------------------------------------------------*/
class Didi_Recent_Post extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Two, Three or Four Column Recent Post Widget', 'didi' ) );
		parent::__construct( false, esc_html__( 'Didi Recent Posts', 'didi' ), $widget_ops );
	}
	function widget( $args, $instance ) {
		$title = null; $postnumber = null; $category = null; $columns = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['postnumber'] ) ) { $postnumber = $instance['postnumber']; }
		if ( ! empty( $instance['columns'] ) ) { $columns = $instance['columns']; }
		if ( ! empty( $instance['category'] ) ) { $category = apply_filters( 'widget_title', $instance['category'] ); }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3></div>'; ?>
<?php
// The Query
$recent_query = new WP_Query(array (
		'post_status'	=> 'publish',
		'posts_per_page' => $postnumber,
		'ignore_sticky_posts' => 1,
		'cat' => $category,
	) );
?>
<div class="posts clearfix customwidget columns">
<?php
// The Loop
if( $recent_query->have_posts() ) : ?>
	<?php while( $recent_query->have_posts()) : $recent_query->the_post() ?>
	<div class="<?php echo esc_html( $columns ); ?> clear">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">
				<?php if ( has_post_thumbnail() ): ?>
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( ); ?>
						</a>
					</div>
				<div class="post-content">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php the_excerpt(); ?>
				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php didi_posted_on_custom(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
				</div><!-- .post-content -->
				<?php else : ?>
				<div class="post-content custom">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php the_excerpt(); ?>
				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php didi_posted_on_custom(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
				</div><!-- .post-content -->
				<?php endif; ?>
			</div>
		</article><!-- #post-## -->
	</div>
	<?php endwhile ?>
<?php endif ?>
</div>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update( $new_instance, $old_instance ) {
		$instance['title'] = $new_instance['title'];
		$instance['postnumber'] = $new_instance['postnumber'];
		$instance['columns'] = $new_instance['columns'];
		$instance['category'] = $new_instance['category'];
		return $new_instance;
	}
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '4';
		$columns = isset( $instance['columns'] ) ? esc_attr( $instance['columns'] ) : 'fourcolumn';
		$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
	?>
	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'postnumber' ); ?>"><?php esc_html_e( 'Number of posts to show:','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'postnumber' ) ); ?>" value="<?php echo esc_attr( $postnumber ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'postnumber' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'columns' ); ?>"><?php esc_html_e( 'Number of columns to show:','didi' ); ?></label>
	<select name="<?php echo $this->get_field_name( 'columns' ); ?>" id="<?php echo $this->get_field_id( 'columns' ); ?>" class="widefat">
	<?php
	$options = array(
		'fourcolumn'  => 'Four Columns',
		'threecolumn' => 'Three Columns',
		'twocolumn'   => 'Two Columns'
	);
	foreach ( $options as $class => $label ) {
	echo '<option value="' . $class . '" id="' . $option . '"', $columns == $class ? ' selected="selected"' : '', '>', $label, '</option>';
	}
	?>
	</select>
	<p><label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php esc_html_e( 'Category:', 'didi' ); ?></label></p>
	<?php
			wp_dropdown_categories( array(
				'orderby'    => 'title',
				'hide_empty' => false,
				'name'       => $this->get_field_name( 'category' ),
				'class'      => 'widefat',
				'show_option_all' => 'all categories',
				'selected'   => $category
			) );
			?>
<hr />
	<?php
	}
}
register_widget( 'Didi_Recent_Post' );

/*-----------------------------------------------------------------------------------*/
/* Custom Didi Widget: Background Image with Text Hover Effect
/*-----------------------------------------------------------------------------------*/
class Didi_Top_Effect_Block extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Background Image with Text Hover Effect', 'didi' ) );
		parent::__construct( false, esc_html__( 'Didi: Background Image with Text Hover Effect', 'didi' ),$widget_ops );
	}
	function widget( $args, $instance ) {
		$title = null; $image = null; $text = null; $buttontext = null; $buttonlink = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['image'] ) ) { $image = $instance['image']; }
		if ( ! empty( $instance['text'] ) ) { $text = $instance['text']; }
		if ( ! empty( $instance['buttontext'] ) ) { $buttontext = $instance['buttontext']; }
		if ( ! empty( $instance['buttonlink'] ) ) { $buttonlink = $instance['buttonlink']; }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3></div>'; ?>

		<div class="front-page-content">
			<?php $image_id = get_post_thumbnail_id(); ?>
			<?php $image_url = wp_get_attachment_image_src($image_id,'full');   ?>
			<div class="cd-fixed-bg cd-bg-1" style="background-image:url(<?php echo esc_url( $image ); ?>);">
				<div class="overlay"></div>
				<header class="entry-header">
					<a class="link link--kukuri" href="<?php echo esc_url( $buttonlink ); ?>" data-letters="<?php echo esc_html( $buttontext ); ?>"><?php echo esc_html( $buttontext ); ?></a>
				</header><!-- .entry-header -->
				<p><?php echo esc_html( $text ); ?></p>
			</div>
		</div><!-- .front-page-content -->
	
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update ($new_instance, $old_instance ) {
		$instance['title'] = $new_instance['title'];
		$instance['image'] = $new_instance['image'];
		$instance['buttontext'] = $new_instance['buttontext'];
		$instance['buttonlink'] = $new_instance['buttonlink'];
		$instance['text'] = $new_instance['text'];
		return $new_instance;
	}
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$image = isset( $instance['image'] ) ? esc_attr( $instance['image'] ) : 'https://www.anarieldesign.com/themedemos/didi/wp-content/uploads/2015/10/header11.jpg';
		$buttontext = isset( $instance['buttontext'] ) ? esc_attr( $instance['buttontext'] ) : 'Fashion / Style';
		$buttonlink = isset( $instance['buttonlink'] ) ? esc_attr( $instance['buttonlink'] ) : '#';
		$text = isset( $instance['text'] ) ? esc_attr( $instance['text'] ) : 'The didi Book *NEW  - Fashion and other sweet things';
	?>
	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php esc_html_e( 'Image URL','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" value="<?php echo esc_attr( $image ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'buttontext' ); ?>"><?php esc_html_e( 'Button Text','didi' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'buttontext' ) ); ?>" value="<?php echo esc_attr( $buttontext ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'buttontext' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'buttonlink' ); ?>"><?php esc_html_e( 'Button Link','didi' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'buttonlink' ) ); ?>" value="<?php echo esc_attr( $buttonlink ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'buttonlink' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php esc_html_e( 'Text Part','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" value="<?php echo esc_attr( $text ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" /></p>
	<?php
	}
}
register_widget( 'Didi_Top_Effect_Block' );
/*-----------------------------------------------------------------------------------*/
/* Custom Didi Widget: Background Image with Text 
/*-----------------------------------------------------------------------------------*/
class Didi_Top_Block extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Background Image with Text', 'didi' ) );
		parent::__construct( false, esc_html__( 'Didi: Background Image with Text', 'didi' ),$widget_ops );
	}
	function widget( $args, $instance ) {
		$title = null; $image = null; $text = null; $buttontext = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['image'] ) ) { $image = $instance['image']; }
		if ( ! empty( $instance['text'] ) ) { $text = $instance['text']; }
		if ( ! empty( $instance['buttontext'] ) ) { $buttontext = $instance['buttontext']; }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3></div>'; ?>

		<div class="front-page-content">
			<?php $image_id = get_post_thumbnail_id(); ?>
			<?php $image_url = wp_get_attachment_image_src($image_id,'full');   ?>
			<div class="cd-fixed-bg cd-bg-1" style="background-image:url(<?php echo esc_url( $image ); ?>);">
				<div class="overlay"></div>
				<div class="top-content">
					<h2><?php echo esc_html( $buttontext ); ?></h2>
					<p><?php echo esc_html( $text ); ?></p>
				</div>
			</div>
		</div><!-- .front-page-content -->
	
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update ($new_instance, $old_instance ) {
		$instance['title'] = $new_instance['title'];
		$instance['image'] = $new_instance['image'];
		$instance['buttontext'] = $new_instance['buttontext'];
		$instance['text'] = $new_instance['text'];
		return $new_instance;
	}
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$image = isset( $instance['image'] ) ? esc_attr( $instance['image'] ) : 'https://www.anarieldesign.com/themedemos/didi/wp-content/uploads/2015/10/header11.jpg';
		$buttontext = isset( $instance['buttontext'] ) ? esc_attr( $instance['buttontext'] ) : 'Fashion / Style';
		$text = isset( $instance['text'] ) ? esc_attr( $instance['text'] ) : 'The didi Book *NEW  - Fashion and other sweet things';
	?>
	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php esc_html_e( 'Image URL','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" value="<?php echo esc_attr( $image ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'buttontext' ); ?>"><?php esc_html_e( 'Heading','didi' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'buttontext' ) ); ?>" value="<?php echo esc_attr( $buttontext ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'buttontext' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php esc_html_e( 'Text Part','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" value="<?php echo esc_attr( $text ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" /></p>
	<?php
	}
}
register_widget( 'Didi_Top_Block' );
/*-----------------------------------------------------------------------------------*/
/* Custom Didi Widget: Background Image with Text and Button
/*-----------------------------------------------------------------------------------*/
class Didi_Top_Button_Block extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Background Image with Text and Button', 'didi' ) );
		parent::__construct( false, esc_html__( 'Didi: Background Image with Text and Button', 'didi' ),$widget_ops );
	}
	function widget( $args, $instance ) {
		$title = null; $image = null; $text = null; $buttontext = null; $linkurl = null; $linktext = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['image'] ) ) { $image = $instance['image']; }
		if ( ! empty( $instance['text'] ) ) { $text = $instance['text']; }
		if ( ! empty( $instance['buttontext'] ) ) { $buttontext = $instance['buttontext']; }
		if ( ! empty( $instance['linkurl'] ) ) { $linkurl = $instance['linkurl']; }
		if ( ! empty( $instance['linktext'] ) ) { $linktext = $instance['linktext']; }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3></div>'; ?>

		<div class="front-page-content">
			<?php $image_id = get_post_thumbnail_id(); ?>
			<?php $image_url = wp_get_attachment_image_src($image_id,'full');   ?>
			<div class="cd-fixed-bg cd-bg-1" style="background-image:url(<?php echo esc_url( $image ); ?>);">
				<div class="overlay"></div>
				<div class="top-content">
					<h2><?php echo esc_html( $buttontext ); ?></h2>
					<p><?php echo esc_html( $text ); ?></p>
					<a class="button" href="<?php echo esc_url( $linkurl ); ?>"><?php echo esc_html( $linktext ); ?></a>
				</div>
			</div>
		</div><!-- .front-page-content -->
	
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update ($new_instance, $old_instance ) {
		$instance['title'] = $new_instance['title'];
		$instance['image'] = $new_instance['image'];
		$instance['buttontext'] = $new_instance['buttontext'];
		$instance['text'] = $new_instance['text'];
		$instance['linkurl'] = $new_instance['linkurl'];
		$instance['linktext'] = $new_instance['linktext'];
		return $new_instance;
	}
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$image = isset( $instance['image'] ) ? esc_attr( $instance['image'] ) : 'https://www.anarieldesign.com/themedemos/didi/wp-content/uploads/2015/10/header11.jpg';
		$buttontext = isset( $instance['buttontext'] ) ? esc_attr( $instance['buttontext'] ) : 'Fashion / Style';
		$text = isset( $instance['text'] ) ? esc_attr( $instance['text'] ) : 'The didi Book *NEW  - Fashion and other sweet things';
		$linkurl = isset( $instance['linkurl'] ) ? esc_attr( $instance['linkurl'] ) : '#';
		$linktext = isset( $instance['linktext'] ) ? esc_attr( $instance['linktext'] ) : 'Download';
	?>
	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php esc_html_e( 'Image URL','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" value="<?php echo esc_attr( $image ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'buttontext' ); ?>"><?php esc_html_e( 'Heading','didi' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'buttontext' ) ); ?>" value="<?php echo esc_attr( $buttontext ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'buttontext' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php esc_html_e( 'Text Part','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" value="<?php echo esc_attr( $text ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'linkurl' ); ?>"><?php esc_html_e( 'Button Link URL','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'linkurl' ) ); ?>" value="<?php echo esc_attr( $linkurl ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'linkurl' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'linktext' ); ?>"><?php esc_html_e( 'Button Link Text','didi' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'linktext' ) ); ?>" value="<?php echo esc_attr( $linktext ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'linktext' ); ?>" /></p>
	<?php
	}
}
register_widget( 'Didi_Top_Button_Block' );