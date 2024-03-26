<?php
/**
 * User Registration Form
 *
 * Shows user registration form
 *
 * This template can be overridden by copying it to yourtheme/user-registration/form-registration.php.
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

/**
 * @var $form_data_array array
 * @var $form_id         int
 * @var $is_field_exists boolean
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$frontend       = UR_Frontend::instance();
$form_template  = ur_get_form_setting_by_key( $form_id, 'user_registration_form_template', 'Default' );
$custom_class   = ur_get_form_setting_by_key( $form_id, 'user_registration_form_custom_class', '' );
$redirect_url   = ur_get_form_setting_by_key( $form_id, 'user_registration_form_setting_redirect_options', '' );
$template_class = '';

if ( 'Bordered' === $form_template ) {
	$template_class = 'ur-frontend-form--bordered';

} elseif ( 'Flat' === $form_template ) {
	$template_class = 'ur-frontend-form--flat';

} elseif ( 'Rounded' === $form_template ) {
	$template_class = 'ur-frontend-form--rounded';

} elseif ( 'Rounded Edge' === $form_template ) {
	$template_class = 'ur-frontend-form--rounded ur-frontend-form--rounded-edge';
}

$custom_class = apply_filters( 'user_registration_form_custom_class', $custom_class, $form_id );

/**
 * @since 1.5.1
 */
do_action( 'user_registration_before_registration_form', $form_id );

global $wpdb;

$city               = "SELECT DISTINCT(city) FROM wp_table";
$result_city        = $wpdb->get_results($city);
$result_city        = json_decode(json_encode($result_city), true);

$area               = "SELECT DISTINCT(area) FROM wp_table";
$result_area        = $wpdb->get_results($area);
$result_area        = json_decode(json_encode($result_area), true);

$community          = "SELECT DISTINCT(community) FROM wp_table";
$result_community   = $wpdb->get_results($community);
$result_community   = json_decode(json_encode($result_community), true);
?>

    <div class='user-registration ur-frontend-form <?php echo esc_attr( $template_class ) . ' ' . esc_attr( $custom_class ); ?>' id='user-registration-form-<?php echo absint( $form_id ); ?>'>
        <form method="post" class="registration__form register" data-goto-error data-popup-message="#form-message" data-one-select data-form-id="5" data-enable-strength-password="" data-minimum-password-strength="3" data-captcha-enabled="">
            <div class="ur-form-row">
                <div class="ur-form-grid ur-grid-1">
                    <label class="registration__label" for="first_name">
                        <span>Прізвище та ім’я</span>
                        <input data-error="Обов`язково до заповнення, введіть лише буквенні значення" placeholder="Ваше прізвище та ім’я" pattern="[А-ЯІЇЄA-Z][а-яіїєa-z]+\s[А-ЯІЇЄA-Z][а-яіїєa-z]+" data-required data-validate autofocus data-id="first_name" type="text" class="input input-name input-text ur-frontend-field user-registration-valid" name="first_name" id="first_name">
                    </label>
                    <label class="registration__label" for="user_email" data-error="Введіть вірний E-mail">
                        <span>Електронна пошта</span>
                        <input data-required="email" data-validate placeholder="Введіть ваш E-mail" data-error="Обов`язково до заповнення, введіть коректне значення" data-id="user_email" type="email" class="input input-text input-email ur-frontend-field user-registration-valid" name="user_email" id="user_email">
                    </label>
                    <label class="registration__label " for="input_box_1672854396">
                        Посада
                        <input data-id="input_box_1672854396" type="text" class="input input-text ur-frontend-field user-registration-valid" name="input_box_1672854396" id="input_box_1672854396" placeholder="Ваша посада">
                    </label>
                    <label class="registration__label" for="input_phone">
                        <span>Контактний телефон</span>
                        <input type="text" data-required placeholder="+38(___)___-__-__" data-validate pattern="^\+\d{2}\(\d{3}\)\s\d{3}[-]\d{2}[-]\d{2}$" data-error="Обов`язково до заповнення, введіть коректне значення" data-id="input_phone" class="input input-tel input-text input-number ur-frontend-field user-registration-valid" name="input_phone" id="input_phone">
                    </label>
                    <label class="registration__label" for="input_city">
                        <span>Область</span>
                        <select data-id="input_city" class="input-text ur-frontend-field user-registration-valid registration__select-region" name="input_city" id="input_city" data-class-modif="region" data-scroll data-search data-required>
                            <option selected data-label>Ваша область</option>
                            <?php foreach ($result_city as $item) {
                                echo '<option value="' . $item['city'] . '">';
                                    echo $item['city'];
                                echo '</option>';
                            } ?>
                        </select>
                    </label>
                    <label id="button_area" class="registration__label" for="input_area">
                        <span>Район</span>
                        <select data-id="input_area" class="input-text ur-frontend-field user-registration-valid registration__select-district" name="input_area" id="input_area" data-class-modif="district" data-scroll data-search>
                            <option value="" selected>Ваш район</option>

                        </select>
                    </label>
                    <label class="registration__label registration__label--100" for="input_community">
                        <span>Громада</span>
                        <select data-id="input_community" class="input-text ur-frontend-field user-registration-valid registration__select-community" name="input_community" id="input_community" data-class-modif="community" data-scroll data-search>
                            <option selected value="">Ваша громада</option>

                        </select>
                    </label>
                    <label class="registration__label" for="user_pass">
                        <span>Пароль</span>
                        <input placeholder="Не менше 6 символів" data-validate autocomplete="off" minlength="6" data-required data-error="Обов`язково до заповнення, внесіть не менше 6 символів" data-id="user_pass" type="password" class="input input-text input-password ur-frontend-field user-registration-valid validate-equalTo-blur" name="user_pass" id="user_pass">
                        <button class="form__viewpass ico-eye"></button>
                    </label>
                    <label class="registration__label" for="user_confirm_password">
                        <span>Підтвердження паролю</span>
                        <input placeholder="Підтвердіть Ваш пароль" data-validate autocomplete="off" minlength="6" data-required data-error="Обов'язкове до заповнення. Повторіть пароль" data-id="user_confirm_password" type="password" class="input input-text input-password ur-frontend-field user-registration-valid" name="user_confirm_password" id="user_confirm_password">
                        <button class="form__viewpass ico-eye"></button>
                    </label>
                    <div class="registration__actions">
                        <button class="button button--green registration__btn ur-submit-button" type="submit">Зареєструватися</button>
	                    <?php do_action( 'user_registration_after_form_buttons', $form_id ); ?>
	                    <?php do_action( 'user_registration_after_submit_buttons', $form_id ); ?>
                    </div>

					<?php $enable_field_icon   = ur_get_single_post_meta( $form_id, 'user_registration_enable_field_icon' ); ?>

					<?php if ( '1' === $enable_field_icon ) { ?>
                        <input type="hidden" id="ur-form-field-icon" name="ur-field-icon" value="<?php echo esc_attr( $enable_field_icon ); ?>"/>
					<?php } ?>
                    <input type="hidden" name="ur-user-form-id" value="<?php echo absint( $form_id ); ?>"/>
                    <input type="hidden" name="ur-redirect-url" value="<?php echo esc_attr( ur_string_translation( $form_id, 'user_registration_form_setting_redirect_options', $redirect_url ) ); ?>"/>
					<?php wp_nonce_field( 'ur_frontend_form_id-' . $form_id, 'ur_frontend_form_nonce', false ); ?>

	                <?php do_action( 'user_registration_form_registration_end', $form_id ); ?>
                </div>
            </div>
        </form>

    </div>
<?php

/**
 * User registration form template.
 *
 * @since 1.0.0
 */
do_action( 'user_registration_form_registration', $form_id );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */ ?>
