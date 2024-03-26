<?php
$home_services = get_field( "home_services" );
?>

<div class="benefits__container">
	<h2 class="benefits__title page-title">Переваги сервісу</h2>
	<div class="benefits__content">


		<?php
		if( $home_services ) {
            $count = 1;
			foreach( $home_services as $service ) {
				$home_services_title        = $service['home_services_title'];
				$home_services_description  = strip_tags($service['home_services_description']); ?>
                <div class="benefits__block">
                    <div class="benefits__img _icon-<?php echo $count; ?>"></div>
                    <h4 class="benefits__block-title"><?php echo $home_services_title; ?></h4>
                    <p class="benefits__text"><?php echo $home_services_description; ?></p>
                </div>
			<?php $count++; }
		} ?>
	</div>
</div>