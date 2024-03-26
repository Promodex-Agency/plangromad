<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ankback
 */

get_header(); ?>

	<main class="page__content">
		<section class="home" id="home">
			<?php echo get_template_part( 'template-parts/home/home-banner' ); ?>
		</section>

		<section class="benefits">
			<?php echo get_template_part( 'template-parts/home/home-benefits' ); ?>
		</section>

		<section class="howFill howFill__container">
			<?php echo get_template_part( 'template-parts/home/home-information' ); ?>
		</section>

		<section class="usersSwiper" id="users">
			<?php echo get_template_part( 'template-parts/home/home-services' ); ?>
		</section>
	</main>

<?php get_footer();