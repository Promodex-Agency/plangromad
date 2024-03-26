<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ankback
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>
<div class="wrapper">
    <header class="header" id="header">
        <div class="header__container">
            <div class="header__actions">
                <button class="header__main button active" type="button">
                    <a href="/">
                        Головна
                    </a>
                </button>
                </button>
                <button class="header__useful button" type="button">
                    <a href="/faq">
                        Корисне
                    </a>
                </button>
                </button>
                <button class="header__personalCab button" type="button">
	                <?php
	                if ( is_user_logged_in() ) {
		                echo '<a href="/my-account">';
	                } else {
		                echo '<a href="/authorization">';
	                }
	                ?>
                        Кабінет
                    </a>
                </button>
            </div>
            <div class="header__right">
                <label class="header__visually">
                    <a class="header__visually--btn bvi-open" href="javascript:void(0);"></a>
                    <a class="header__visually-link bvi-open" href="javascript:void(0);">Версія для слабозорих</a>
                </label>
                <label class="header__contact-us">
                    <button class="header__contact-us--btn"></button>
                    <span class="header__contact-us-link">Зв’язатися з нами</span>
                </label>
            </div>
        </div>
    </header>