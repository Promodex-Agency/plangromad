<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/user-registration/myaccount/form-lost-password.php.
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

ur_print_notices(); ?>

<div class="ur-frontend-form login" id="ur-frontend-form">
    <section class="registration page__content">
        <div class="registration__img"></div>
        <div class="page__container">
            <div class="registration__content">
                <h2 class="registration__password-title">Відновлення паролю</h2>
                <h3 class="registration__password-subtitle">Вкажіть вашу email-адресу і ми надішлемо посилання для відновлення паролю:</h3>
                <form method="post" class="password-recovery__form user-registration-ResetPassword lost_reset_password" data-dev data-goto-error>
                    <label class="registration__label" for="user-email">
                        <span>Електронна пошта</span>
                        <input class="user-registration-Input user-registration-Input--text input-text input" name="user_login" id="user_login" type="email" data-required="email" placeholder="Введіть ваш E-mail" data-validate data-error="Обов`язково до заповнення, внесіть коректне значення">
                    </label>
                    <div class="registration__bottom">
                        <?php do_action( 'user_registration_lostpassword_form' ); ?>

                        <p class="user-registration-form-row form-row">
                            <input type="hidden" name="ur_reset_password" value="true" />
                            <input type="submit" class="user-registration-Button button button--green _p40" value="<?php esc_attr_e( 'НАДІСЛАТИ КОД', 'user-registration' ); ?>" />
                        </p>

                        <a class="registration__password-recovery" href="/authorization">Згадали пароль?</a>

                        <?php wp_nonce_field( 'lost_password' ); ?>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
