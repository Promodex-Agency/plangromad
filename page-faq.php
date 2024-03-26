<?php get_header(); ?>

	<main class="page__content">
		<section class="useful-info">
			<div class="useful-info__top page__top-title">
				<h2 class="useful-info__title">
					Корисна інформація
				</h2>
			</div>
			<div class="useful-info__container">

				<?php if( have_rows('faq') ): ?>
					<?php while( have_rows('faq') ): the_row();
						$faq_name           = get_sub_field('faq_name');
						$faq_description    = get_sub_field('faq_description', true, true); ?>
						<div class="useful-info__block">
							<h3 class="useful-info__block-title">
								<?php echo $faq_name; ?>
								<button class="useful-info__more"></button>
							</h3>
							<div class="useful-info__block-answer">
								<p class="useful-info__text">
									<?php echo $faq_description; ?>
								</p>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</section>
	</main>

<?php get_footer(); ?>