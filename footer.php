<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ankback
 */

?>
        <footer class="footer">
            <div class="footer__container">
                <div class="footer__content">
                    <p class="footer__explanation">
                        Портал розроблений завдяки підтримці американського народу, наданій через Агентство США з міжнародного розвитку (USAID) у рамках Програми USAID з аграрного і сільського розвитку (АГРО), яка виконується компанією Chemonics International. Думка авторів не обов’язково є офіційною точкою зору USAID чи Уряду СШA.
                    </p>
                    <div class="footer__actions">
                        <span class="footer__partner footer__partner--1">
                            <img class="footer__partner-img" src="<?php echo get_template_directory_uri(); ?>/img/usaid.svg" alt="usaid logo">
                        </span>
                        <span class="footer__partner footer__partner--2">
                            <img class="footer__partner-img" src="<?php echo get_template_directory_uri(); ?>/img/chemonics.svg" alt="chemonics logo">
                        </span>
                    </div>
                </div>
                <div class="footer__bottom">
                    <a href="/privacy-policy">Політика конфіденційності</a>
                    <!-- <a href="https://promodex.agency/" class="footer__dev">Розробка</a> -->
                </div>
            </div>
        </footer>
    </div>


    <style>
        .error-dop-mess {
             visibility: hidden;
             z-index: 100;
-webkit-backdrop-filter: blur(5px);backdrop-filter: blur(5px);
             -webkit-transform: translate(50%, -450%);
             -moz-transform: translate(50%, -450%);
             -ms-transform: translate(50%, -450%);
             -o-transform: translate(50%, -450%);
             transform: translate(50%, -450%);
             top: 50%;
             position: fixed;
             right: 50%;
             width: 350px;
             border-radius: 10px;
             padding: 20px;
             background: #f3f3f3;
             color: red;
             -webkit-box-shadow: 0 0 9px 3px rgba(18, 18, 18, 0.18);-moz-box-shadow: 0 0 9px 3px rgba(18, 18, 18, 0.18);box-shadow: 0 0 9px 3px rgba(18, 18, 18, 0.18);
             -webkit-transition: all 0.6s ease-in-out;-o-transition: all 0.6s ease-in-out;-moz-transition: all 0.6s ease-in-out;transition: all 0.6s ease-in-out;
        }
        .error-dop-mess.vis {
            visibility: visible;
            -webkit-transform: translate(50%, -50%);
                         -moz-transform: translate(50%, -50%);
                         -ms-transform: translate(50%, -50%);
                         -o-transform: translate(50%, -50%);
                         transform: translate(50%, -50%);
        }
            .error-dop-mess {
                font-size: 13px;
                 line-height: 17px;
                 width: 310px;
            }
        .cls-dop {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 10px;
            cursor: pointer;
            height: 10px;
        }

        .cls-dop span {
            display: inline-block;
            width: 100%;
            height: 2px;
            background: #d2948f;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%) rotate(45deg);
            -moz-transform: translate(-50%, -50%) rotate(45deg);
            -ms-transform: translate(-50%, -50%) rotate(45deg);
            -o-transform: translate(-50%, -50%) rotate(45deg);
            transform: translate(-50%, -50%) rotate(45deg);
        }
        .cls-dop span:nth-child(2) {
           -webkit-transform: translate(-50%, -50%) rotate(-45deg);
           -moz-transform: translate(-50%, -50%) rotate(-45deg);
           -ms-transform: translate(-50%, -50%) rotate(-45deg);
           -o-transform: translate(-50%, -50%) rotate(-45deg);
           transform: translate(-50%, -50%) rotate(-45deg);
        }
        @media screen and (max-width: 820px) {
            .error-dop-mess {
                top: 130px;
                left: 15px;
                right: 15px;
                width: auto;
            }
        }
    </style>
    <div class="error-dop-mess">
        <div class="cls-dop">
            <span></span>
            <span></span>
        </div>
        <p>Сума площ населених пунктів не може перевищувати площу громади!</p>

    </div>
    <script>
            let btnClsDop = document.querySelector('.error-dop-mess .cls-dop');

            btnClsDop.addEventListener('click', () => {
                btnClsDop.closest('.error-dop-mess').classList.remove('vis');
            });

        </script>

<div class="msg-btn-clicker"></div>


    <div id="form-message" aria-hidden="true" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close"></button>
                <div class="popup__succesfull"></div>
                <div class="popup__text">
                    Реєстрація пройшла успішно
                </div>
            </div>
        </div>
    </div>

    <div id="save" aria-hidden="true" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close"></button>
                <div class="popup__succesfull"></div>
                <div class="popup__text">
                    Зміни успішно збережені
                </div>
            </div>
        </div>
    </div>

    <div id="editDocument" aria-hidden="true" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close"></button>
                <div class="popup__text">
                    Пітвердити видалення всіх завантажених документів?
                </div>
                <button data-close type="button" class="popup__okDoc button button--green _p40">Ок</button>
            </div>
        </div>
    </div>

    <div id="editQuestionnare" aria-hidden="true" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close"></button>
                <div class="popup__text">
                    Пітвердити очищення форми?
                </div>
                <button data-close type="button" class="popup__okForm popup__ok edit-form button button--green _p40">Ок</button>
            </div>
        </div>
    </div>

    <div id="contactUs" aria-hidden="false" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close"></button>
                <div class="popup__text">
                    Залиште повідомлення
                </div>
                <form class="contact-us__form" data-dev data-goto-error data-popup-message="#form-message">
                    <label class="registration__label w100" for="user-name">
                        <span>Прізвище та ім’я</span>
                        <input class="input input-name" id="nameContact-us" name="full_name" type="text" data-error="Обов`язково до заповнення, введіть лише буквенні значення" placeholder="Ваше прізвище та ім’я" pattern="[А-ЯІЇЄA-Z][а-яіїєa-z]+\s[А-ЯІЇЄA-Z][а-яіїєa-z]+" data-required data-validate autofocus>
                        <div class="error_form form__error"></div>
                    </label>
                    <label class="registration__label w100" for="user-tel">
                        <span>Номер телефону</span>
                        <input class="input input-tel" id="telContact-us" name="phone" type="tel" data-required placeholder="+38(___)___-__-__" data-validate pattern="^\+\d{2}\(\d{3}\)\s\d{3}[-]\d{2}[-]\d{2}$" data-error="Обов`язково до заповнення, введіть коректне значення">
                        <div class="error_form form__error"></div>
                    </label>
                    <label class="registration__label w100" for="user-email">
                        Електронна пошта
                        <input class="input" id="emailContact-us" name="email" type="email" placeholder="Введіть ваш E-mail" autocomplete="on">
                    </label>
                    <textarea class="popup__textarea" name="messageContact-us" id="" placeholder="Повідомлення"></textarea>
                    <button type="submit" class="popup__submit contact-us button button--green _fw">
                        відправити
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div id="sent-message" aria-hidden="true" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close"></button>
                <div class="popup__succesfull"></div>
                <div class="popup__text">
                    Повідомлення успішно надіслано!
                </div>
                <span class="popup__subtext">
                    Ми відповімо вам найближчим часом. Дякуємо за запит.
                </span>
            </div>
        </div>
    </div>

    <div id="thankYou" aria-hidden="true" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close"></button>
                <div class="popup__text">
                    Пітвердити очищення форми?
                </div>
                <button data-close type="button" class="popup__ok edit-form button button--green _p40">Ок</button>
            </div>
        </div>
    </div>

    <div id="errorEmail" aria-hidden="true" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <button data-close type="button" class="popup__close"></button>
                <div class="popup__text">
                    Такий E-mail вже існує
                </div>
                <button data-close type="button" class="popup__okFormError popup__ok edit-form button button--green _p40">Ок</button>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
    <script>
        function resetCommunity () {
            console.log('click 2');
            $('.select_community select').find('option').remove();
            $('.select_community .select__options').find('button').remove();
            $('.select_community .select__value input').attr('placeholder', 'Ваша громада');
        }
    </script>


<?php

if(get_current_user_id() and get_the_ID()==7){
    $user_fields = get_fields( 'user_' . get_current_user_id() );
    if(!$user_fields['document1'] or !$user_fields['document2'] or !$user_fields['document3'] ){ ?>

        <div id="msg" aria-hidden="true" class="popup">
            <div class="popup__wrapper">
                <div class="popup__content">
                    <button data-close type="button" class="popup__close"></button>
                    <div class="popup__text">
                        Шановні користувачі!
                    </div>

                    <div class="error_doc"><?php echo get_field('документи_помилка','option'); ?></div>

                </div>
            </div>
        </div>


        <script>

            function getCookie(name) {
                var dc = document.cookie;
                var prefix = name + "=";
                var begin = dc.indexOf("; " + prefix);
                if (begin == -1) {
                    begin = dc.indexOf(prefix);
                    if (begin != 0) return null;
                }
                else
                {
                    begin += 2;
                    var end = document.cookie.indexOf(";", begin);
                    if (end == -1) {
                    end = dc.length;
                    }
                }
                // because unescape has been deprecated, replaced with decodeURI
                //return unescape(dc.substring(begin + prefix.length, end));
                return decodeURI(dc.substring(begin + prefix.length, end));
            }



            modules_flsModules = {};

            let mustFilledDocs = [...document.querySelectorAll('.must-be-docs .questionnaire__add-document')];

            function checkAllFilledDocs() {

                    if (mustFilledDocs.length) {
                        var myCookie = getCookie("msg");

                        if (myCookie == null) {
                                    if (document.cookie === "msg=1") {

                                    } else {
                                        if (document.querySelectorAll('.questionnaire__add-document--add').length === 3) {

                                        } else {
                                            document.querySelector(".msg-btn-clicker").click();
                                            document.cookie = "msg=1";
                                        }

                                    }
                                } else {
                        console.log('2');
                            // do cookie exists stuff
                        }
                     }
            }
            checkAllFilledDocs();
            // modules_flsModules.popup.open("#msg");
        </script>

    <?php } } ?>




</body>
</html>