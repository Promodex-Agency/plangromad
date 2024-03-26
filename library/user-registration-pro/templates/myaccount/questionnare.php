<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/user-registration/myaccount/form-edit-profile.php.
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
	exit;
}
?>

<section class="questionnare-block">
	<a class="edit-account__come-back" href="account.html">
		<button class="button-circle edit-account__back _icon-arrow-back"></button>
		Повернутися в кабінет
	</a>
	<div class="questionnare-block__content" data-tabs>
		<div class="questionnare-block__structure">
			<h3 class="questionnare-block__title">Структура форми</h3>
			<button class="questionnare-block__selectSection button button--green w100">Виберіть розділ</button>
			<div class="questionnare-block__sections" data-tabs-titles>
				<button class="questionnare-block__close"></button>
				<div class="questionnare-block__section">
					<h4 class="questionnare-block__section-title questionnare-block__section-title--open">
						Загальні відомості
					</h4>
					<ul class="questionnare-block__info questionnare-block__info--open">
						<li class="questionnare-block__info-tab _tab-active" data-tab="1">
							Вид документації
						</li>
						<li class="questionnare-block__info-tab" data-tab="2">
							Назва території розроблення Комплексного плану
						</li>
						<li class="questionnare-block__info-tab" data-tab="3">
							Площа території громади
						</li>
						<li class="questionnare-block__info-tab" data-tab="4">
							Адміністративний центр
						</li>
					</ul>
				</div>
				<div class="questionnare-block__section">
					<h4 class="questionnare-block__section-title">
						Умови замовлення комплексного плану
					</h4>
					<ul class="questionnare-block__info">
						<li class="questionnare-block__info-tab" data-tab="5">
							Замовник Комплексного плану
						</li>
						<li class="questionnare-block__info-tab" data-tab="6">
							Підстава для розроблення комплексного плану
						</li>
						<li class="questionnare-block__info-tab" data-tab="7">
							Дата завершення розроблення комплексного плану території громади
						</li>
					</ul>
				</div>
				<div class="questionnare-block__section">
					<h4 class="questionnare-block__section-title">
						Перелік населених пунктів, об’єктів і територій
					</h4>
					<ul class="questionnare-block__info">
						<li class="questionnare-block__info-tab" data-tab="8">
							Перелік та площі населених пунктів щодо яких передбачається розроблення або коригування генеральних планів
						</li>
						<li class="questionnare-block__info-tab" data-tab="9">
							Перелік та площі населених пунктів, щодо яких передбачається розроблення планувальних рішень генеральних планів
						</li>
						<li class="questionnare-block__info-tab" data-tab="10">
							Перелік та площі об’єктів та опис територій розроблення детальних планів територій
						</li>
					</ul>
				</div>
				<div class="questionnare-block__section">
					<h4 class="questionnare-block__section-title">
						Вимоги до створення комплексного плану
					</h4>
					<ul class="questionnare-block__info">
						<li class="questionnare-block__info-tab" data-tab="11">
							Вимоги до формування електронного документу Комплексного плану
						</li>
						<li class="questionnare-block__info-tab" data-tab="12">
							Вимоги до бази даних містобудівного кадастру
						</li>
						<li class="questionnare-block__info-tab" data-tab="13">
							Перелік додаткових розділів та графічних матеріалів
						</li>
						<li class="questionnare-block__info-tab" data-tab="14">
							Кількість примірників
						</li>
						<li class="questionnare-block__info-tab" data-tab="15">
							Додаткові вимоги
						</li>
					</ul>
				</div>
				<div class="questionnare-block__section">
					<h4 class="questionnare-block__section-title">
						Вихідні дані для розроблення комплексного плану
					</h4>
					<ul class="questionnare-block__info">
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
					</ul>
				</div>
				<div class="questionnare-block__section">
					<h4 class="questionnare-block__section-title">
						Етапи розроблення комплексного плану
					</h4>
					<ul class="questionnare-block__info">
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
					</ul>
				</div>
				<div class="questionnare-block__section">
					<h4 class="questionnare-block__section-title">
						Внесення відомостей в Державний земельний кадастр
					</h4>
					<ul class="questionnare-block__info">
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
					</ul>
				</div>
				<div class="questionnare-block__section">
					<h4 class="questionnare-block__section-title">
						Нормативні документи
					</h4>
					<ul class="questionnare-block__info">
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
						<li class="questionnare-block__info-tab"></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="questionnare-block__explanation">
			<div class="questionnaire__progress questionnaire__progress--block">
				<div class="questionnaire__progress-info">
					<p class="questionnaire__progress-value-name">Ваша форма заповнена на:</p>
					<p class="questionnaire__progress-value">20%</p>
				</div>
				<progress class="questionnaire__progress-bar" id="file" max="100" value="20"></progress>
			</div>
			<div class="questionnare-block__tabs-body" data-tabs-body>
				<div class="tabs-body tabs-body--active" data-tabcontent="1">
					<div class="tabs-body__top">
						<h5 class="tabs-body__title">Вид документації</h5>
						<div class="tabs-body__tooltip-label">
							<div role="tooltip" class="tabs-body__tooltip">
											<span class="tabs-body__infoMessage">
												Управління цим сайтом https://1plus1.ua/ (далі – «Сайт») здійснюється ТОВ «ТЕЛЕРАДІОКОМПАНІЯ «СТУДІЯ 1+1»», код ЄДРПОУ 23729809, юридичною особою, яка зареєстрована і діє відповідно до вимог законодавства України (далі - «Компанія»).
												Компанія з великою повагою ставиться до конфіденційної (персональної) інформації всіх без винятку осіб, які відвідали Сайт, а також тих, хто користується наданими Сайтом сервісами; в зв'язку з чим, Компанія прагне захищати конфіденційність персональних даних (відомостей чи сукупність відомостей про фізичну особу, яка ідентифікована або може бути конкретно ідентифікована), тим самим створивши і забезпечивши максимально комфортні умови використання сервісів Сайту кожному користувачеві
											</span>
							</div>
							<span>Інформація</span>
						</div>
					</div>
					<form action="">
									<textarea class="tabs-body__textarea" name="Вид документації" id="" autofocus required>Геопросторові дані щодо об’єктів комплексного плану створюються із застосуванням геоінформаційного програмного забезпечення у формі бази геоданих та оформлюються як графічні матеріали документації у вигляді цифрових карт та векторних зображень. Електронний документ має відповідати вимогам постанови Кабінету Міністрів України від 9 червня 2021 р. № 632 “Про затвердження Порядку визначення формату електронних документів комплексного плану просторового розвитку території територіальної громади, генерального плану населеного пункту, детального плану території”. Геопросторові дані комплексного плану вносяться до бази геоданих Державного земельного та містобудівного кадастру у відповідності до вимог чинного законодавства
                  </textarea>
					</form>
					<div class="tabs-body__actions">
						<button type="submit" class="button tabs-body__btn-save _p40">ЗБЕРЕГТИ</button>
						<button type="submit" class="button button--green _p40 tabs-body__next">
							НАСТУПНИЙ ПУНКТ
							<span class="tabs-body__btn-next"></span>
						</button>
					</div>
				</div>
				<div class="tabs-body" data-tabcontent="2">
					<div class="tabs-body__top">
						<h5 class="tabs-body__title">Дата завершення розроблення комплексного плану території громади</h5>
						<div class="tabs-body__tooltip-label">
							<div role="tooltip" class="tabs-body__tooltip">
											<span class="tabs-body__infoMessage">
												Управління цим сайтом https://1plus1.ua/ (далі – «Сайт») здійснюється ТОВ «ТЕЛЕРАДІОКОМПАНІЯ «СТУДІЯ 1+1»», код ЄДРПОУ 23729809, юридичною особою, яка зареєстрована і діє відповідно до вимог законодавства України (далі - «Компанія»).
												Компанія з великою повагою ставиться до конфіденційної (персональної) інформації всіх без винятку осіб, які відвідали Сайт, а також тих, хто користується наданими Сайтом сервісами; в зв'язку з чим, Компанія прагне захищати конфіденційність персональних даних (відомостей чи сукупність відомостей про фізичну особу, яка ідентифікована або може бути конкретно ідентифікована), тим самим створивши і забезпечивши максимально комфортні умови використання сервісів Сайту кожному користувачеві
											</span>
							</div>
							<span>Інформація</span>
						</div>
					</div>
					<form action="">
						<label class="tabs-body__label--date" for="endDate">
							Дата
							<input class="input" id="endDate" type="date" value="2023-01-04" max="2023-12-31">
						</label>
					</form>
					<div class="tabs-body__actions">
						<button type="submit" class="button tabs-body__btn-save _p40">ЗБЕРЕГТИ</button>
						<button type="submit" class="button button--green _p40 tabs-body__next">
							НАСТУПНИЙ ПУНКТ
							<span class="tabs-body__btn-next"></span>
						</button>
					</div>
				</div>
				<div class="tabs-body" data-tabcontent="3">
					<div class="tabs-body__top">
						<h5 class="tabs-body__title">Перелік та площі населених пунктів, щодо яких передбачається розроблення та коригування генеральних планів</h5>
						<div class="tabs-body__tooltip-label">
							<div role="tooltip" class="tabs-body__tooltip">
											<span class="tabs-body__infoMessage">
												Управління цим сайтом https://1plus1.ua/ (далі – «Сайт») здійснюється ТОВ «ТЕЛЕРАДІОКОМПАНІЯ «СТУДІЯ 1+1»», код ЄДРПОУ 23729809, юридичною особою, яка зареєстрована і діє відповідно до вимог законодавства України (далі - «Компанія»).
												Компанія з великою повагою ставиться до конфіденційної (персональної) інформації всіх без винятку осіб, які відвідали Сайт, а також тих, хто користується наданими Сайтом сервісами; в зв'язку з чим, Компанія прагне захищати конфіденційність персональних даних (відомостей чи сукупність відомостей про фізичну особу, яка ідентифікована або може бути конкретно ідентифікована), тим самим створивши і забезпечивши максимально комфортні умови використання сервісів Сайту кожному користувачеві
											</span>
							</div>
							<span>Інформація</span>
						</div>
					</div>
					<form action="">
						<div class="tabs-body__squareBlock">
							<label class="registration__label edit-account__label" for="user-community">
								Населений пункт
								<input class="input input--readonly" type="text" id="user-community" value="Київська міська територіальна громада" readonly>
							</label>
							<label class="registration__label edit-account__label" for="user-community">
								Площа, км2
								<input class="input" type="number" id="user-population" value="44000">
							</label>
						</div>
						<label for="" class="registration__label w100">
							Додаткові відомості
							<textarea class="tabs-body__textarea" name="" id="" placeholder="Заповнити інформацію" required></textarea>
						</label>
					</form>
					<div class="tabs-body__actions">
						<button type="submit" class="button tabs-body__btn-save _p40">ЗБЕРЕГТИ</button>
						<button type="submit" class="button button--green _p40 tabs-body__next">
							НАСТУПНИЙ ПУНКТ
							<span class="tabs-body__btn-next"></span>
						</button>
					</div>
				</div>
				<div class="tabs-body" data-tabcontent="4">
					<div class="tabs-body__top">
						<h5 class="tabs-body__title">Вид документації</h5>
						<div class="tabs-body__tooltip-label">
							<div role="tooltip" class="tabs-body__tooltip">
											<span class="tabs-body__infoMessage">
												Управління цим сайтом https://1plus1.ua/ (далі – «Сайт») здійснюється ТОВ «ТЕЛЕРАДІОКОМПАНІЯ «СТУДІЯ 1+1»», код ЄДРПОУ 23729809, юридичною особою, яка зареєстрована і діє відповідно до вимог законодавства України (далі - «Компанія»).
												Компанія з великою повагою ставиться до конфіденційної (персональної) інформації всіх без винятку осіб, які відвідали Сайт, а також тих, хто користується наданими Сайтом сервісами; в зв'язку з чим, Компанія прагне захищати конфіденційність персональних даних (відомостей чи сукупність відомостей про фізичну особу, яка ідентифікована або може бути конкретно ідентифікована), тим самим створивши і забезпечивши максимально комфортні умови використання сервісів Сайту кожному користувачеві
											</span>
							</div>
							<span>Інформація</span>
						</div>
					</div>
					<form action="">
									<textarea class="tabs-body__textarea" name="Вид документації" id="" autofocus required>Геопросторові дані щодо об’єктів комплексного плану створюються із застосуванням геоінформаційного програмного забезпечення у формі бази геоданих та оформлюються як графічні матеріали документації у вигляді цифрових карт та векторних зображень. Електронний документ має відповідати вимогам постанови Кабінету Міністрів України від 9 червня 2021 р. № 632 “Про затвердження Порядку визначення формату електронних документів комплексного плану просторового розвитку території територіальної громади, генерального плану населеного пункту, детального плану території”. Геопросторові дані комплексного плану вносяться до бази геоданих Державного земельного та містобудівного кадастру у відповідності до вимог чинного законодавства
                  </textarea>
					</form>
					<div class="tabs-body__actions">
						<button type="submit" class="button tabs-body__btn-save _p40">ЗБЕРЕГТИ</button>
						<button type="submit" class="button button--green _p40 tabs-body__next">
							НАСТУПНИЙ ПУНКТ
							<span class="tabs-body__btn-next"></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
