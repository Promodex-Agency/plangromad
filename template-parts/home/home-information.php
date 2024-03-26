<?php
$home_information_title         = get_field( "home_information_title" );
$home_information_description   = get_field( "home_information_description", false, false );
?>

<div class="howFill__block">
	<div class="howFill__content">
		<h2 class="howFill__title page-title">
			<?php echo $home_information_title; ?>
		</h2>
		<p class="howFill__info">
			<?php echo $home_information_description; ?>
		</p>
		<button class="howFill__btn button button--green">
            <?php
            if ( is_user_logged_in() ) {
                echo '<a href="/my-account">';
            } else {
                echo '<a href="/registration">';
            }
            ?>
                Детальніше</a>
		</button>
	</div>
	<div class="howFill__image"><picture><source srcset="<?php echo get_stylesheet_directory_uri(); ?>/img/howToFill.webp" type="image/webp"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/howToFill.png" alt="як заповнювати Image"></picture></div>
</div>