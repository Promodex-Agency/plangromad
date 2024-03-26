<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/user-registration/myaccount/form-login.php.
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
 * @version 1.4.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$form_template  = get_option( 'user_registration_login_options_form_template', 'default' );
$template_class = '';

if ( 'bordered' === $form_template ) {
	$template_class = 'ur-frontend-form--bordered';

} elseif ( 'flat' === $form_template ) {
	$template_class = 'ur-frontend-form--flat';

} elseif ( 'rounded' === $form_template ) {
	$template_class = 'ur-frontend-form--rounded';

} elseif ( 'rounded_edge' === $form_template ) {
	$template_class = 'ur-frontend-form--rounded ur-frontend-form--rounded-edge';
}

$labels       = array(
	'username'           => get_option( 'user_registration_label_username_or_email', __( 'Username or email address', 'user-registration' ) ),
	'password'           => get_option( 'user_registration_label_password', __( 'Password', 'user-registration' ) ),
	'remember_me'        => get_option( 'user_registration_label_remember_me', __( 'Remember me', 'user-registration' ) ),
	'login'              => get_option( 'user_registration_label_login', __( 'Login', 'user-registration' ) ),
	'lost_your_password' => get_option( 'user_registration_label_lost_your_password', __( 'Lost your password?', 'user-registration' ) ),
);
$placeholders = array(
	'username' => get_option( 'user_registration_placeholder_username_or_email', '' ),
	'password' => get_option( 'user_registration_placeholder_password', '' ),
);
$hide_labels  = 'yes' === get_option( 'user_registration_login_options_hide_labels', 'no' );

$enable_ajax = 'yes' === get_option( 'ur_login_ajax_submission', 'no' );

$enable_field_icon = 'yes' === get_option( 'user_registration_pro_general_setting_login_form', 'no' );

$login_title = 'yes' === get_option( 'user_registration_login_title', 'no' );

$login_title = 'yes' === get_option( 'user_registration_login_title', 'no' );

?>

<?php apply_filters( 'user_registration_login_form_before_notice', ur_print_notices() ); ?>

<?php do_action( 'user_registration_before_customer_login_form' ); ?>

<div class="ur-frontend-form login <?php echo esc_attr( $template_class ); ?>" id="ur-frontend-form">

    <form class="user-registration-form user-registration-form-login login registration__form" method="post" data-goto-error>
        <div class="ur-form-row">
            <div class="ur-form-grid">
	            <?php do_action( 'user_registration_login_form_start' ); ?>

                <label class="registration__label" for="username">
                    <span>Електронна пошта</span>
                    <input class="user-registration-Input user-registration-Input--text input-text input" id="username" name="username" type="text" data-required="email" placeholder="Введіть ваш E-mail" autocomplete="on" data-validate data-error="Обов`язково до заповнення, введіть коректне значення">
                </label>
                <label class="registration__label" for="password">
                    <span>Пароль</span>
                    <input class="user-registration-Input user-registration-Input--text input-text input" data-error="Обов`язково до заповнення, введіть коректне значення" data-validate id="password" name="password" type="password" placeholder="Ваш пароль" autocomplete="off" minlength="6" data-required>
                    <div class="form__viewpass ico-eye"></div>
                  </label>
                <span class="registration__link">Якщо немаєте аккаунту<a href="/registration">зареєструйтеся</a></span>
                <div class="registration__bottom">
	                <?php do_action( 'user_registration_login_form' ); ?>

                    <input type="hidden" name="redirect" value="/my-account" />

	                <?php wp_nonce_field( 'user-registration-login', 'user-registration-login-nonce' ); ?>
                    <input type="submit" class="user-registration-Button button button--green _p40 user-registration-Button " name="login" value="Вхід" />
                    <a class="registration__password-recovery" href="<?php echo esc_url( wp_lostpassword_url() ); ?>">Забули пароль? Відновити</a>

	                <?php do_action( 'user_registration_login_form_end' ); ?>
                </div>
            </div>
        </div>
    </form>



</div>

<?php do_action( 'user_registration_after_login_form' ); ?>
