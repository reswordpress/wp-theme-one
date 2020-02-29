<?php
/**
 * Template Name: Page - Home
 *
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="page-wrapper">
	<div id="content">

		<section class="block cover" style="background-image: url('<?php if(get_field('cover_image')) {
					$cover_image = get_field('cover_image')["url"];
					echo esc_url($cover_image);
					}
				?>')">

			<div class="text-center">
				<h1><?php the_field('cover_heading'); ?></h1>
				<h4><?php the_field('cover_tagline'); ?></h4>
			</div>
		</section>


		<section class="block">
			<div class="container">
				<div class="header text-center">
					<i class="fa fa-briefcase" aria-hidden="true"></i>
					<h2><?php esc_html_e('Services','understrap'); ?></h2>
					<div class="separator"></div>
					<p class="description">
						<?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas maximus, arcu at placerat semper, turpis
						libero bibendum nibh, ac ultrices neque leo id tortor. Nullam viverra ut lectus eu porttitor. Suspendisse vel
						porta metus.', 'understrap'); ?>
					</p>
				</div>
				<div class="row">
					<?php
						// Custom WP query query
						$args_query = array(
							'post_type' => array('service'),
							'posts_per_page' => 3,
							'order' => 'ASC',
							'orderby' => 'date',
						);

						$query = new WP_Query( $args_query );

						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								echo '<div class="col-md-4 mb-3 panel service-card">';
								get_template_part( 'loop-templates/content', 'service-card' );
								echo '</div>';
							}
						} else {

						}

						wp_reset_postdata();
					?>
				</div>
			</div>
		</section>


		<?php
		if(get_field('about')) {
		?>
		<section>
			<div class="container-fluid">
				<div class="row flex-column-reverse flex-lg-row">
					<div class="col-md-6 block flex-center">
						<div class="mw-sm">
							<div class="header">
								<h2><?php esc_html_e( 'About', 'understrap' ); ?></h2>
								<div class="separator"></div>
							</div>
							<?php the_field('about'); ?>
						</div>
					</div>
					<?php
					if(get_field('about-image')) {
					$about_image = get_field('about-image');
					echo '<div class="col-md-6 p-0 flex-center"><img class="img-fluid" src="'. $about_image["url"] .'" alt="'. $about_image["alt"] .'"></div>';
					}
					?>
				</div>
			</div>
		</section>
		<?php
		}
		?>


		<section id="testimonials" class="block bg-primary">
			<div class="container">
				<div class="header text-center">
					<i class="fa fa-comments" aria-hidden="true"></i>
					<h2><?php esc_html_e('Testimonials','understrap'); ?></h2>
					<div class="separator"></div>
					<p class="description">
						<?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas maximus, arcu at placerat semper, turpis
						libero bibendum nibh, ac ultrices neque leo id tortor. Nullam viverra ut lectus eu porttitor. Suspendisse vel
						porta metus.', 'understrap'); ?>
					</p>
				</div>
				<div class="owl-carousel">
					<?php
						// Custom WP query query
						$args_query = array(
							'post_type' => array('testimonial'),
							'posts_per_page' => 6,
							'orderby' => 'date',
						);

						$query = new WP_Query( $args_query );

						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								echo '<div class="mb-3 testimonial">';
								get_template_part( 'loop-templates/content-testimonial' );
								echo '</div>';
							}
						} else {

						}

						wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>