<?php
$home_banner_title          = get_field( "home_banner_title" );
$home_banner_description    = get_field( "home_banner_description", false , false );
?>

<div class="home__container">
	<div class="home__infoBlock">
		<h1 class="home__title">
			<?php echo $home_banner_title; ?>
		</h1>
		<p class="home__info">
			<?php echo $home_banner_description; ?>
		</p>
		<button class="home__btn button button--green _p50">
			<?php
			if ( is_user_logged_in() ) {
				echo '<a href="/my-account">';
			} else {
				echo '<a href="/authorization">';
			}
			?>
				Почати
			</a>
		</button>
	</div>
</div>