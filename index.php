<?php
/**
 * Index file, default fallback file will handle posts plural pages (main blog index, search, category, tag).
 * Simple contextual heading and loop list of posts.
 */

get_header();
do_action( 'worksfront_blog_top' );

// Initialized variables for date groupings.
$date_group = '';
$day_group  = '';
$count      = 0;
// Handle looping through blog posts.
if ( have_posts() ) : ?>

	<div class="indexed-posts-container">
		<?php while ( have_posts() ) : the_post(); // phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace ?>

			<?php
			$new_date = get_the_date( 'YM' );
			if ( $new_date !== $date_group ) :
				?>
				<?php $date_group = $new_date; ?>
				<div class="date-group-container">
					<span class="date-month"> <?php echo get_the_date( 'F' ); ?> </span>
					<span class="date-year"> <?php echo '[' . get_the_date( 'Y' ) . ']'; ?> </span>
				</div>
			<?php endif; ?>
				
			<div class="indexed-post-container">
				<div class="day"> 
					<?php
					$new_day = get_the_date( 'd' );
					if ( $new_day !== $day_group ) {
						echo get_the_date( 'dS' );
						$day_group = $new_day;
					}
					?>
				</div>

				<a class="post-title" href=<?php echo esc_attr( the_permalink() ); ?>> <?php the_title(); ?> </a>
				<!-- <?php worksfront_terms( 'categories' ); ?> -->
				<!-- <?php worksfront_terms( 'tags' ); ?> -->
			</div>
		<?php endwhile; ?>

		<?php the_posts_pagination(); ?>
	</div>

<?php else : ?>
<div>Nothing here.</div>
<?php endif; ?>

<?php get_footer(); ?>
