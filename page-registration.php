<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ankback
 */

get_header();
?>
<section class="registration page__content">
	<div class="registration__img"></div>
	<div class="page__container">
		<div class="registration__content">
            <div class="registration__top">
                <h1 class="registration__title">Реєстрація</h1>
                <span class="registration__link">Ви вже маєте обліковий запис?<a href="/authorization">Увійдіть</a></span>
            </div>
			<?php
            while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
            ?>
		</div>
	</div>
</section>
<div class="footer-hidden" style="display: none;">
	<?php get_footer(); ?>
</div>