<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/user-registration/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion UserRegistration will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.wpeverest.com/user-registration/template-structure/
 * @author  WPEverest
 * @package UserRegistration/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

ur_print_notices();
ur_print_notice( __( 'Password reset email has been sent.', 'user-registration' ) );
?>

<p><?php echo esc_html( apply_filters( 'user_registration_lost_password_message', esc_html__( 'A password reset email has been sent to the email address on file for your account, but may take several minutes to show up in your inbox. Please wait at least 10 minutes before attempting another reset.', 'user-registration' ) ) ); ?></p>

<section class="registration page__content">
    <div class="registration__img"></div>
    <div class="page__container">
        <div class="registration__content">
            <h2 class="registration__password-title">Відновлення паролю</h2>
            <h3 class="registration__password-subtitle">Посилання на відновлення пароля відправлено на вказану ел. пошту</h3>
            <p class="registration__label registration__label--mb8" for="user-email">
                Електронна пошта
            </p>
            <p class="registration__email">Maxtat333@gmail.com</p>
            <div class="registration__bottom">
                <button class="button button--green" type="button"><a href="index.html">Повернутися на ГОЛОВНУ</a></button>
            </div>
        </div>
    </div>
</section>