<?php
/**
 * Custom template tags for this theme.
 * @package paraswift
 */



if ( ! function_exists( 'paraswift_posted_on' ) ) :

function paraswift_posted_on(){?>
    <div class="paraswift_post_nav">
		<div class="paraswift-post_meta">
			<a href="<?php echo get_month_link(get_post_time('Y'),get_post_time('m')); ?>">
			<i class="fa fa-calendar"></i> <?php echo get_the_date('M j, Y'); ?> </a>
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
			<i class="fa fa-user"></i> <?php _e('Posted by:&nbsp;','paraswift'); ?> <?php the_author(); ?></a>
			<a href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?> </a>
		</div>
				
	</div>
<?php }  endif;

if ( ! function_exists( 'paraswift_footer' ) ) :
function paraswift_footer() {
	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list( esc_html__( ', ', 'paraswift' ) );
		if ( $categories_list && paraswift_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'paraswift' ) . '</span>', $categories_list );
		}
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'paraswift' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'paraswift' ) . '</span>', $tags_list );
		}
	}
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'paraswift' ), esc_html__( '1 Comment', 'paraswift' ), esc_html__( '% Comments', 'paraswift' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			esc_html__( 'Edit %s', 'paraswift' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
} endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'paraswift_categorized_blog' ) ) :
function paraswift_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'paraswift_categories' ) ) ) {
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );

		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'paraswift_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		return true;
	} else {
		return false;
	}
} endif;
/**
 * Flush out the transients used in paraswift_categorized_blog.
 */
if ( ! function_exists( 'paraswift_category_transient_flusher' ) ) :
function paraswift_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	delete_transient( 'paraswift_categories' );
}
endif;

add_action( 'edit_category', 'paraswift_category_transient_flusher' );
add_action( 'save_post',     'paraswift_category_transient_flusher' );

if ( ! function_exists( 'paraswift_excerpt_length' ) ) :
function paraswift_excerpt_length( $length ) {
   return 25;
} endif;
add_filter( 'excerpt_length', 'paraswift_excerpt_length', 999 );

if ( ! function_exists( 'paraswift_excerpt_more' ) ) :
function paraswift_excerpt_more($more) {
   global $post;
   return '<a class="more-link" href="'. get_permalink($post->ID) . '"><br /><div class="paraswift-btn continue-reading">'. __('Read More', 'paraswift') .'</div></a>';
} endif;

add_filter('excerpt_more', 'paraswift_excerpt_more');

if ( ! function_exists( 'paraswift_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since paraswift 1.0.3
 */
function paraswift_post_nav() {
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
	<nav class="navigation post-navigation" role="navigation">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'paraswift' ); ?></h3>
		<div class="nav-links">
			<?php
			if ( is_attachment() ) :
				previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>%title', 'paraswift' ) );
			else :
				previous_post_link( '<div class="paraswift-previous"> %link</div>', __( '<span class="meta-nav"><i class="fa fa-angle-double-left"></i></span>%title', 'paraswift' ) );
				next_post_link( '<div class="paraswift-next"> %link</div>', __( '<span class="meta-nav"><i class="fa fa-angle-double-right"></i></span>%title', 'paraswift' ) );
			endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if(!function_exists( 'paraswift_post_link' )) :
function paraswift_post_link() { ?>
<div class="paraswift-blog_pagination">					
				<?php if(get_previous_posts_link() ): ?>
				<span class="paraswift-paginate-left"><?php previous_posts_link(); ?></span>
				<?php endif; ?>					
				<?php if ( get_next_posts_link() ): ?>
				<span class="paraswift-paginate-right"><?php next_posts_link(); ?></span>
				<?php endif; ?>
			</div>
<?php }  endif; 


if ( ! function_exists( 'paraswift_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since paraswift 1.0.8
 */
function paraswift_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;