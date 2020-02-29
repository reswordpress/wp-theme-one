<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('testimonial'); ?> id="post-<?php the_ID(); ?>">


	<div class="row mb-5">

		<?php
			if(get_field('photo')) {
			$photo = get_field('photo');
			echo '<div class="col-md-12 col-lg-4 col-xl-3"><div class="photo" style="background-image: url('.$photo["url"].')"></div></div>';
			}
		?>

		<div class="col">
			<div class="entry-content">
				<q><?php the_field('testimonial'); ?></q>

				<?php
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
							'after'  => '</div>',
						)
					);
				?>

			</div><!-- .entry-content -->

			<footer class="entry-footer">

				<?php
				the_title('<h4>', '</h4>');
				?>
				<div><?php the_field('about'); ?></div>

			</footer><!-- .entry-footer -->
		</div>
	</div>

</article><!-- #post-## -->