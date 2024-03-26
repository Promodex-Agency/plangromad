<?php
$home_services_slider = get_field( "home_services_slider" );
?>

<div class="usersSwiper__container">
	<h2 class="usersSwiper__title page-title">
		
	</h2>
	<div class="usersSwiper__action">
		<button type="button" class="usersSwiper__button usersSwiper__button--prev _icon-arrow-back"></button>
		<button type="button" class="usersSwiper__button usersSwiper__button--next _icon-arrow-back"></button>
	</div>
	<div class="usersSwiper__slider swiper">
		<div class="usersSwiper__wrapper swiper-wrapper">
            <?php
            if( $home_services_slider ) {
	            foreach( $home_services_slider as $slider ) {
		            $home_services_slider_title = $slider['home_services_slider_title'];
		            $home_services_slider_link  = $slider['home_services_slider_link'];
		            $home_services_slider_logo  = $slider['home_services_slider_logo']; ?>

                    <div class="usersSwiper__slide swiper-slide">
                        <div class="usersSwiper__logo usersSwiper__logo--1">
                            <picture><img src="<?php echo $home_services_slider_logo; ?>" alt="<?php echo $home_services_slider_title; ?>"></picture>
                        </div>
                        <p class="usersSwiper__name">
                            <?php echo $home_services_slider_title; ?>
                        </p>
                    </div>
	            <?php }
            } ?>
		</div>
	</div>
</div>