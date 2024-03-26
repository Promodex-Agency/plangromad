<?php get_header();
global $wpdb;

$city                   = get_user_meta( get_current_user_id(), 'user_registration_input_city', true );
$area                   = get_user_meta( get_current_user_id(), 'user_registration_input_area', true );
$community              = get_user_meta( get_current_user_id(), 'user_registration_input_community', true );

$getDovidnik            = "SELECT * FROM wp_dovidnik WHERE city_nv = '" . $city . "' AND area_nv = '" . $area . "' AND community_nv = '" . $community . "'";
$result                 = $wpdb->get_results($getDovidnik);
$result                 = json_decode(json_encode($result), true);

$getDovidnikTrueTable   = "SELECT * FROM wp_dovidnik2 WHERE code = '" . $result[0]['katottg'] . "' AND historical = 'true'";
$resultTableTrue        = $wpdb->get_results($getDovidnikTrueTable);
$resultTableTrue        = json_decode(json_encode($resultTableTrue), true);

$getDovidnikFalseTable  = "SELECT * FROM wp_dovidnik2 WHERE code = '" . $result[0]['katottg'] . "' AND historical = 'false'";
$resultTableFalse       = $wpdb->get_results($getDovidnikFalseTable);
$resultTableFalse       = json_decode(json_encode($resultTableFalse), true);

$user_fields = get_fields( 'user_' . get_current_user_id() );

$progress = get_field( 'progress', 'user_' . get_current_user_id() );
//'UA05020030000031457'
$gromagexclude=array('UA12080050000062712','UA12100070000011492', 'UA12120070000057518', 'UA12140210000089021', 'UA12140310000078816', 'UA21100230000083101', 'UA23040110000019947', 'UA23060070000082704', 'UA23080070000068953', 'UA32080170000086616', 'UA32100130000093505', 'UA48060150000071713', 'UA51040010000016896', 'UA51080030000048246', 'UA51100270000073549', 'UA51100310000010196', 'UA56040110000061997', 'UA63120270000028556', 'UA73040130000087963', 'UA74080130000060606', 'UA74100390000073425');
?>

    <main class="page__content questionnare-block__container">
        <section class="questionnare-block">
            <a class="edit-account__come-back" href="/my-account">
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
                                <li class="questionnare-block__info-tab _tab-active <?php if (!empty($user_fields['document_type'])) { echo '_tab-save'; } ?>" data-tab="1"> <!--1-->
                                    Вид містобудівної документації
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['name_territorial_hulk'])) { echo '_tab-save'; } ?>" data-tab="2"> <!--2-->
                                    Назва територіальної громади
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['area_territory_hulk'])) { echo '_tab-save'; } ?>" data-tab="3"> <!--3-->
                                    Площа території проєктування
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['deputy_comprehensive_plan'])) { echo '_tab-save'; } ?>" data-tab="4"> <!--4-->
                                    Замовник комплексного плану
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['substava_decomposition'])) { echo '_tab-save'; } ?>" data-tab="5"> <!--5-->
                                    Підстава для проєктування
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['lines_split'])) { echo '_tab-save'; } ?>" data-tab="6"> <!--6-->
                                    Строк розроблення
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['implementation_years1'])) { echo '_tab-save'; } ?>" data-tab="7"> <!--7-->
                                    Роки реалізації
                                </li>
<!--                                <li style="display: none;" class="questionnare-block__info-tab --><?php //if (!empty($user_fields['normative_acts'])) { echo '_tab-save'; } ?><!--" data-tab="8">-->
<!--                                    Нормативні акти-->
<!--                                </li>-->
                            </ul>
                        </div>
                        <div class="questionnare-block__section">
                            <h4 class="questionnare-block__section-title">
                                Перелік населених пунктів, об’єктів і територій
                            </h4>
                            <ul class="questionnare-block__info">
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['general_plan_administrative_center_area'])) { echo '_tab-save'; } ?>" data-tab="8"> <!--8-->
                                    Генеральний план адмінцентру
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['development_planning_decisions'])) { echo '_tab-save'; } ?>" data-tab="9"> <!--9-->
                                    Генеральні плани історичних населених місць
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['development_detailed_plans_territories']) or !empty($user_fields['development_empty'])) { echo '_tab-save'; } ?>" data-tab="10"> <!--10-->
                                    Планувальні рішення генеральних планів
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['development_detailed_plans_territories_second'])) { echo '_tab-save'; } ?>" data-tab="11"> <!--11-->
                                    Планувальні рішення детальних планів
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['development_detailed_plans_territories_second'])) { echo '_tab-save'; } ?>" data-tab="12"> <!--12-->
                                    Перелік проєктних рішень
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['formation_land_plots'])) { echo '_tab-save'; } ?>" data-tab="13"> <!--13-->
                                    Землеустрій та землекористування
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['entering_land_information'])) { echo '_tab-save'; } ?>" data-tab="14"> <!--14-->
                                    Формування та реєстрація земельних ділянок
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['land_use_restrictions'])) { echo '_tab-save'; } ?>" data-tab="15"> <!--15-->
                                    Обмеження у використанні земель
                                </li>
                            </ul>
                        </div>
                        <div class="questionnare-block__section">
                            <h4 class="questionnare-block__section-title">
                                Вихідні дані
                            </h4>
                            <ul class="questionnare-block__info">
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['list_raw_data'])) { echo '_tab-save'; } ?>" data-tab="16"> <!--16-->
                                    Перелік вихідних даних
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['information_about_cartographic_basis'])) { echo '_tab-save'; } ?>" data-tab="17"> <!--17-->
                                    Відомості про картографічну основу
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['state_regional_interests'])) { echo '_tab-save'; } ?>" data-tab="18"> <!--18-->
                                    Державні та регіональні інтереси
                                </li>
                            </ul>
                        </div>
                        <div class="questionnare-block__section">
                            <h4 class="questionnare-block__section-title">
                                Графічні матеріали
                            </h4>
                            <ul class="questionnare-block__info">
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['stages_developing_comprehensive_plan'])) { echo '_tab-save'; } ?>" data-tab="19"> <!--19-->
                                    Основні графічні матеріали
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['list_additional_sections_graphic_materials'])) { echo '_tab-save'; } ?>" data-tab="20"> <!--21-->
                                    Додаткові текстові та графічні матеріали
                                </li>
                            </ul>
                        </div>
                        <div class="questionnare-block__section">
                            <h4 class="questionnare-block__section-title">
                                Передача результатів розроблення комплексного плану
                            </h4>
                            <ul class="questionnare-block__info">
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['legal_regime_exercise_property_rights'])) { echo '_tab-save'; } ?>" data-tab="21"> <!--22-->
                                    Правовий режим здійснення майнових прав
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['number_paper_copies'])) { echo '_tab-save'; } ?>" data-tab="22"> <!--23-->
                                    Кількість паперових примірників
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['number_electronic_copies'])) { echo '_tab-save'; } ?>" data-tab="23"> <!--24-->
                                    Кількість електронних примірників
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['format-type-rad'])) { echo '_tab-save'; } ?>" data-tab="24"> <!--25-->
                                    Формат електронних документів
                                </li>
                            </ul>
                        </div>
                        <div class="questionnare-block__section">
                            <h4 class="questionnare-block__section-title">
                                Додаткові вимоги та індикатори
                            </h4>
                            <ul class="questionnare-block__info">
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['additional_requirements'])) { echo '_tab-save'; } ?>" data-tab="25"> <!--26-->
                                    Додаткові вимоги
                                </li>
                                <li class="questionnare-block__info-tab <?php if (!empty($user_fields['indicators_territory_development'])) { echo '_tab-save'; } ?>" data-tab="26"> <!--27-->
                                    Індикатори розвитку території
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <form id="form_question" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?php echo get_current_user_id(); ?>">
                    <div class="questionnare-block__explanation">
                        <div class="questionnaire__progress questionnaire__progress--block">
                            <div class="questionnaire__progress-info">
                                <p class="questionnaire__progress-value-name">Ваша форма заповнена на:</p>
                                <p class="questionnaire__progress-value"><?php if($progress) { echo round($progress); echo '%'; } else { echo '0%'; } ?></p>
                            </div>
                            <progress class="questionnaire__progress-bar" id="file" max="100" value="<?php if($progress) { echo $progress; } else { echo '0'; } ?>" name="questionnaire__progress-bar"></progress>
                        </div>
                        <div class="questionnare-block__tabs-body" data-tabs-body>
                            <div class="tabs-body tabs-body--active" data-tabcontent="1">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Вид містобудівної документації</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('вид_документації', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="document_type"
                                        id="document_type"
                                        placeholder="Внесіть відомості щодо виду містобудівної документації розробка якої необхідна"
                                        required
                                ><?php if (!empty($user_fields['document_type'])) { echo $user_fields['document_type']; } else { ?><?php if(in_array($result['0']['katottg'],$gromagexclude)){  ?>Генеральний план <?php echo $result[0]['admincentr']; ?> <?php echo $result[0]['community_rv']; ?> <?php echo $result[0]['area_rv']; ?> <?php echo $result[0]['city_rv']; ?><?php }else{ ?>Комплексний план просторового розвитку території <?php echo $result[0]['community_rv']; ?> <?php echo $result[0]['area_rv']; ?> <?php echo $result[0]['city_rv']; ?> (Комплексний план). <?php } ?><?php } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="2">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Назва території розроблення містобудівної документації</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
										    <?php the_field('назва_територіальної_громади', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="name_territorial_hulk"
                                        id="name_territorial_hulk"
                                        placeholder="Внесіть відомості щодо назви територіальної громади для якої планується розроблення комплексного плану просторового розвитку території територіальної громади"
                                        required
                                ><?php if (!empty($user_fields['name_territorial_hulk'])) { echo $user_fields['name_territorial_hulk']; } else { echo $result[0]['community_nv'].' '; echo $result[0]['area_nv'].' '; echo $result[0]['city_nv'].' '; ?> код КАТОТТГ <?php echo $result[0]['katottg']; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="3">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Площа території проєктування</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('площа_території_громади', 'option'); ?>
                                        </span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <div class="tabs-body__squareBlock">
                                    <label class="registration__label edit-account__label" for="user-community">
                                        Площа, га
                                       <input type="number" onkeydown="func(event)" onchange="func2(this)" step="0.0001" class="input tabs-body__input" name="area_territory_hulk" id="area_territory_hulk" value="<?php if (!empty($user_fields['area_territory_hulk'])) { echo str_replace(',','.',trim($user_fields['area_territory_hulk'])); } else {  echo str_replace(',','.',trim(($result[0]['plosha']))); } ?>">
                                    </label>
                                </div>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="4">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Замовник розроблення містобудівної документації</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('замовник_комплексного_плану', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="deputy_comprehensive_plan"
                                        id="deputy_comprehensive_plan"
                                        placeholder="Внесіть відомості про субєкта (замовника) комплексного плану просторового розвитку території територіальної громади"
                                        required
                                ><?php if (!empty($user_fields['deputy_comprehensive_plan'])) { echo $user_fields['deputy_comprehensive_plan']; } else { echo $result[0]['legal_nv']; ?>, код ЄДРПОУ <?php echo $result[0]['edrpou']; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="5">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Підстава для проєктування</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('підстава_розроблення', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>

                                <div class="select__square">
                                    <div>
                                        <label class="">
                                            <span>Рішення №</span>
                                            <input style="width: 495px;" class="tabs-body__input" type="text" name="substava_decomposition" value="<?php if (isset($user_fields['substava_decomposition'])) { echo $user_fields['substava_decomposition']; } ?>">
                                        </label>
                                        <label class="">
                                            <span>Дата</span>
                                            <input type="date" id="decomposition_date" name="decomposition_date" value="<?php if (!empty($user_fields['decomposition_date'])) { echo $user_fields['decomposition_date']; } ?>" min="2023-01-01" max="2999-12-31">
                                            <input type="text" id="substava_decomposition_date" name="substava_decomposition_date" value="<?php if (!empty($user_fields['substava_decomposition_date'])) { echo $user_fields['substava_decomposition_date']; } ?>" min="2023-01-01" max="2999-12-31" hidden>
                                        </label>
                                    </div>
                                </div>

                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="6">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Строк розроблення містобудівної документації</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('строк_розроблення', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="lines_split" id="lines_split"
                                        placeholder="Зазначте строк розроблення комплексного плану території громади та вставте посилання на календарний план реаізації комплексного плану опублікований на веб-сайті громади (за наявності)."
                                        required
                                ><?php if (isset($user_fields['lines_split'])) { echo $user_fields['lines_split']; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="7">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Роки реалізації короткострокового, середньострокового періодів та довгострокової перспективи з урахуванням тривалості всіх погоджувальних процедур</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('роки_реалізації', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <div class="tabs-body__squareBlock">
                                    Рік реалізації короткострокового періоду
                                    <select <?php if (isset($user_fields['implementation_years1'])) { ?>  data-setted="<?php echo $user_fields['implementation_years1']; ?>" <?php  } ?> name="implementation_years1" id="implementation_years1" class="tabs-body__textarea" style="height: 35px;" required>
                                        <option value="2024" >2024</option>
                                        <option value="2025" >2025</option>
                                        <option value="2026" >2026</option>
                                        <option value="2027" >2027</option>
                                        <option value="2028" >2028</option>
                                        <option value="2029" >2029</option>

                                    </select>
                                    <script>
                                        let slN1 = [...document.querySelectorAll('#implementation_years1 option')];
                                        slN1.forEach((opt) => {
                                            let optVal = opt.value;
                                            if (optVal === opt.closest('select').dataset.setted) {
                                                opt.selected = 'selected';
                                            }
                                        })

                                    </script>


<!--                                    <input type="number" min="2023" minlength="40" maxlength="4" class="tabs-body__input tabs-body__textarea" name="implementation_years1" id="implementation_years1" style="height: 35px;" value="--><?php //if (isset($user_fields['implementation_years1'])) { echo $user_fields['implementation_years1']; } ?><!--" required>-->
                                    Рік реалізації середньострокового періоду

                                    <select <?php if (isset($user_fields['implementation_years2'])) { ?>  data-setted="<?php echo $user_fields['implementation_years2']; ?>" <?php  } ?> name="implementation_years2" id="implementation_years2" class="tabs-body__textarea" style="height: 35px;" required>
                                        <option value="2030" >2030</option>
                                        <option value="2031" >2031</option>
                                        <option value="2032" >2032</option>
                                        <option value="2033" >2033</option>
                                        <option value="2034" >2034</option>

                                    </select>

                                    <script>
                                        let slN2 = [...document.querySelectorAll('#implementation_years2 option')];
                                        slN2.forEach((opt) => {
                                            let optVal = opt.value;
                                            if (optVal === opt.closest('select').dataset.setted) {
                                                opt.selected = 'selected';
                                            }
                                        })

                                    </script>
<!--                                    <input type="number" min="2023" minlength="40" maxlength="4" class="tabs-body__input tabs-body__textarea" name="implementation_years2" id="implementation_years2" style="height: 35px;" value="--><?php //if (isset($user_fields['implementation_years2'])) { echo $user_fields['implementation_years2']; } ?><!--" required>-->
                                    Рік реалізації довгострокової перспективи
                                    <select <?php if (isset($user_fields['implementation_years3'])) { ?>  data-setted="<?php echo $user_fields['implementation_years3']; ?>" <?php  } ?> name="implementation_years3" id="implementation_years3" class="tabs-body__textarea" style="height: 35px;" required>
                                        <option value="2035" >2035</option>
                                        <option value="2036" >2036</option>
                                        <option value="2037" >2037</option>
                                        <option value="2038" >2038</option>
                                        <option value="2039" >2039</option>
                                        <option value="2040" >2040</option>
                                        <option value="2041" >2041</option>
                                        <option value="2042" >2042</option>
                                        <option value="2043" >2043</option>
                                        <option value="2044" >2044</option>
                                        <option value="2045" >2045</option>
                                        <option value="2046" >2046</option>
                                        <option value="2047" >2047</option>
                                        <option value="2048" >2048</option>
                                        <option value="2049" >2049</option>
                                        <option value="2050" >2050</option>
                                        <option value="2051" >2051</option>
                                        <option value="2052" >2052</option>
                                        <option value="2053" >2053</option>
                                        <option value="2054" >2054</option>
                                        <option value="2055" >2055</option>
                                        <option value="2056" >2056</option>
                                        <option value="2057" >2057</option>
                                        <option value="2058" >2058</option>
                                        <option value="2059" >2059</option>
                                        <option value="2060" >2060</option>
                                        <option value="2061" >2061</option>
                                        <option value="2062" >2062</option>
                                        <option value="2063" >2063</option>
                                        <option value="2064" >2064</option>
                                        <option value="2065" >2065</option>
                                        <option value="2066" >2066</option>
                                        <option value="2067" >2067</option>
                                        <option value="2068" >2068</option>
                                        <option value="2069" >2069</option>
                                        <option value="2070" >2070</option>
                                        <option value="2071" >2071</option>
                                        <option value="2072" >2072</option>
                                        <option value="2073" >2073</option>
                                        <option value="2074" >2074</option>
                                        <option value="2075" >2075</option>
                                        <option value="2076" >2076</option>
                                        <option value="2077" >2077</option>
                                        <option value="2078" >2078</option>
                                        <option value="2079" >2079</option>
                                        <option value="2080" >2080</option>
                                        <option value="2081" >2081</option>
                                        <option value="2082" >2082</option>
                                        <option value="2083" >2083</option>
                                        <option value="2084" >2084</option>
                                        <option value="2085" >2085</option>


                                    </select>
                                    <script>
                                        let slN3 = [...document.querySelectorAll('#implementation_years3 option')];
                                        slN3.forEach((opt) => {
                                            let optVal = opt.value;
                                            if (optVal === opt.closest('select').dataset.setted) {
                                                opt.selected = 'selected';
                                            }
                                        })

                                    </script>
<!--                                    <input type="number" min="2023" minlength="40" maxlength="4" class="tabs-body__input tabs-body__textarea" name="implementation_years3" id="implementation_years3" style="height: 35px;" value="--><?php //if (isset($user_fields['implementation_years3'])) { echo $user_fields['implementation_years3']; } ?><!--" required>-->
                                </div>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
<!--                            <div class="tabs-body" data-tabcontent="8">-->
<!--                                <div class="tabs-body__top">-->
<!--                                    <h5 class="tabs-body__title">Основні нормативно-правові акти та нормативні документи, що регулюють порядок розроблення Комплексного плану</h5>-->
<!--                                    <div class="tabs-body__tooltip-label">-->
<!--                                        <div role="tooltip" class="tabs-body__tooltip">-->
<!--										<span class="tabs-body__infoMessage">-->
<!--                                            --><?php //the_field('нормативні_акти', 'option'); ?>
<!--										</span>-->
<!--                                        </div>-->
<!--                                        <span class="span">Інформація</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <textarea-->
<!--                                        class="tabs-body__textarea"-->
<!--                                        name="normative_acts"-->
<!--                                        id="normative_acts"-->
<!--                                        placeholder="Зазначне нормативно-правові акти які регулюють порядок розроблення комплексного плану просторового розивтку території територіальних громад"-->
<!--                                        required-->
<!--                                >-->
<!---  Закон України від «Про регулювання містобудівної діяльності».-->
<!---  Закон України від «Про внесення змін до деяких законодавчих актів України щодо планування використання земель».-->
<!---  Закон України «Про Державний земельний кадастр».-->
<!---  Постанова КМУ від 17.10.2012 № 1051 «Про затвердження Порядку ведення Державного земельного кадастру».-->
<!---  Постанова КМУ від 09.06.2021 р. № 632 «Про затвердження Порядку визначення формату електронних документів комплексного плану просторового розвитку території територіальної громади, генерального плану населеного пункту, детального плану території».-->
<!---  Постанова КМУ від 2.06.2021 р. № 654 «Про затвердження Класифікації обмежень у використанні земель, що можуть встановлюватися комплексним планом просторового розвитку території територіальної громади, генеральним планом населеного пункту, детальним планом території».-->
<!---  Постанова КМУ № 926  від 1 вересня 2021 року "Про затвердження Порядку розроблення, оновлення, внесення змін та затвердження містобудівної документації."-->
<!---  Наказ  Мінрегіону № 56 від 22.02.2022 "Про затвердження структури Бази геоданих містобудівної документації на місцевому рівні"-->
<!--                                </textarea>-->
<!--                                <div class="tabs-body__actions">-->
<!--                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>-->
<!--                                    <button type="submit" class="button button--green _p20 tabs-body__prev">-->
<!--                                        ПОПЕРЕДНІЙ ПУНКТ-->
<!--                                        <span class="tabs-body__btn-prev"></span>-->
<!--                                    </button>-->
<!--                                    <button type="submit" class="button button--green _p20 tabs-body__next">-->
<!--                                        НАСТУПНИЙ ПУНКТ-->
<!--                                        <span class="tabs-body__btn-next"></span>-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="tabs-body" data-tabcontent="8">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">
                                        Генеральний план адміністративного центру громади
                                    </h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('адміністративний_центр', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <div class="list__fieldsToFillS">
                                    <div class="select__square" data-squarevalue="<?php echo $result[0]['admincentr']; ?>">
                                        <input type="hidden" name="general_plan_administrative_center_city" value="<?php echo $result[0]['admincentr']; ?>">
                                        <span><?php echo $result[0]['admincentr']; ?></span>
                                        <div>
                                            <label>
                                                <span>Площа, га</span>
                                                <input class="tabs-body__input" type="number" onkeydown="func(event)" onchange="func2(this)" step="0.0001"  name="general_plan_administrative_center_area" data-square1="<?php echo $result[0]['admincentr']; ?>" value="<?php if (isset($user_fields['general_plan_administrative_center_area'])) { echo $user_fields['general_plan_administrative_center_area']; } ?>">
                                            </label>
                                            <label class="select__square-textarea">
                                                <span>Перелік проєктних рішень</span>
                                                <textarea class="square__text" name="general_plan_administrative_center_text" placeholder="Вкажіть перелік об'єктів щодо яких замовникам видано вихідні дані відповідно до статті 29 Закону України 'Про регулювання містобудівної діяльності'" data-square2="<?php echo $result[0]['admincentr']; ?>"><?php if (isset($user_fields['general_plan_administrative_center_text'])) { echo $user_fields['general_plan_administrative_center_text']; } ?></textarea>
                                            </label>
                                        </div>

                                    </div>

                                </div>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="9">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Генеральні плани населених пунктів, що входять до Списку історичних населених місць України</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
										    <?php the_field('розроблення_генеральних_планів', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <label class="list-of-settlements">
                                    <p>Населений пункт<span>*</span></p>
                                    <?php
                                    if (!empty($resultTableTrue)) { ?>
                                    <select class="list__select" name="form" data-class-modif="list" multiple data-checkbox data-required data-scroll data-pseudo-label="Населений пункт" data-tags="list">
                                            <?php foreach ($resultTableTrue as $city) {
                                                echo '<option value="' . $city['settlement'] . '">' . $city['settlement'] . '</option>';
                                            } ?>
                                    </select>
                                    <?php } else {
                                        echo 'Історичних населених місць не виявлено';
                                    } ?>
                                </label>
                                <?php
                                $rows_first = get_field('development_planning_decisions', 'user_' . get_current_user_id());
                                if( $rows_first ) {
                                    $i_second = 1;
                                    echo '<div class="select__multiList" data-list="list">';
                                        foreach( $rows_first as $row ) {
                                            $development_planning_decisions_city = $row['development_planning_decisions_city'];
                                            $development_planning_decisions_area = $row['development_planning_decisions_area'];
                                            $development_planning_decisions_text = $row['development_planning_decisions_text']; ?>
                                            <span role="button" data-select-id="<?php echo $i_second; ?>" data-value="<?php echo $development_planning_decisions_city; ?>" class="_select-tag">
                                                <?php echo $development_planning_decisions_city; ?>
                                                <input type="hidden" name="form" value="<?php echo $development_planning_decisions_city; ?>">
                                            </span>
                                        <?php $i_second++; }
                                    echo '</div>';
                                }
                                
                                if( $rows_first ) {
                                    echo '<div class="list__fieldsToFill" style="padding-top: 30px;">';
                                    foreach( $rows_first as $row ) {
                                        $development_planning_decisions_city = $row['development_planning_decisions_city'];
                                        $development_planning_decisions_area = $row['development_planning_decisions_area'];
                                        $development_planning_decisions_text = $row['development_planning_decisions_text']; ?>

                                        <div name="city_plans" class="select__square" data-squarevalue="<?php echo $development_planning_decisions_city; ?>">
                                            <span><?php echo $development_planning_decisions_city; ?></span>
                                            <div>
                                                <label class="">
                                                    <span>Площа, га</span>
                                                    <input class="tabs-body__input" type="number" onkeydown="func(event)" onchange="func2(this)" step="0.0001" name="city_area" value="<?php echo $development_planning_decisions_area; ?>" data-square1="<?php echo $development_planning_decisions_city; ?>">
                                                </label>
                                                <label class="select__square-textarea">
                                                    <span>Перелік проєктних рішень</span>
                                                    <textarea class="square__text" name="city_text" placeholder="Вкажіть перелік об'єктів щодо яких замовникам видано вихідні дані відповідно до статті 29 Закону України 'Про регулювання містобудівної діяльності'" data-square2="<?php echo $development_planning_decisions_city; ?>"><?php echo $development_planning_decisions_text; ?></textarea>
                                                </label>
                                            </div>
                                        </div>
                                    <?php }
                                    echo '</div>';
                                } else { ?>
                                    <div class="select__multiList" data-list="list"></div>
                                    <div class="list__fieldsToFill"></div>
                                <?php } ?>


                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="10">
                                <?php $rowst = get_field('development_detailed_plans_territories', 'user_' . get_current_user_id()); ?>
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Перелік та площі населених пунктів, щодо яких передбачається розроблення планувальних рішень генеральних планів</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('розроблення_планувальних_рішень', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <label class="list-of-settlements">
                                    <p>Населений пункт<span>*</span></p>
                                        <?php
                                        if (!empty($resultTableFalse)) { ?>
                                            <select class="list__select2" name="form_second" data-class-modif="list2" multiple data-checkbox data-required data-scroll data-pseudo-label="Населений пункт" data-tags2="list2">
                                                <?php foreach ($resultTableFalse as $city) {
                                                    echo '<option value="' . $city['settlement'] . '">' . $city['settlement'] . '</option>';
                                                } ?>
                                            </select>
                                        <?php } else { ?>
                                              <input name="development_empty" type="hidden" value="Населених пунктів для розроблення планувальних рішень генпланів не виявлено ">
                                            Населених пунктів для розроблення планувальних рішень генпланів не виявлено             
                                        <?php  }  ?>

                                    </select>
                                </label>
                                <?php
                                if( $rowst ) {
                                    $i = 1;
                                    echo '<div class="select__multiList2" data-list2="list2">';
                                        foreach( $rowst as $row ) {
                                            $development_detailed_plans_territories_city = $row['development_detailed_plans_territories_city'];
                                            $development_detailed_plans_territories_area = $row['development_detailed_plans_territories_area'];
                                            $development_detailed_plans_territories_text = $row['development_detailed_plans_territories_text']; ?>

                                            <span role="button" data-select-id="<?php echo $i; ?>" data-value="<?php echo $development_detailed_plans_territories_city; ?>" class="_select-tag">
                                                <?php echo $development_detailed_plans_territories_city; ?>
                                                <input type="hidden" name="form_second" value="<?php echo $development_detailed_plans_territories_city; ?>">
                                            </span>

                                        <?php $i++; }
                                    echo '</div>';
                                }

                                if( $rowst ) {
                                    echo '<div class="list__fieldsToFill2" style="padding-top: 30px;">';
                                        foreach( $rowst as $row ) {
                                            $development_detailed_plans_territories_city = $row['development_detailed_plans_territories_city'];
                                            $development_detailed_plans_territories_area = $row['development_detailed_plans_territories_area'];
                                            $development_detailed_plans_territories_text = $row['development_detailed_plans_territories_text']; ?>

                                            <div name="city_plans_2" class="select__square" data-squarevalue="<?php echo $development_detailed_plans_territories_city; ?>">
                                                <span><?php echo $development_detailed_plans_territories_city; ?></span>
                                                <div>
                                                    <label class="">
                                                        <span>Площа, га</span>
                                                        <input class="tabs-body__input" type="number" onkeydown="func(event)" onchange="func2(this)" step="0.0001" name="city_area_2" value="<?php echo $development_detailed_plans_territories_area; ?>" data-square1="<?php echo $development_detailed_plans_territories_city; ?>">
                                                    </label>
                                                    <label class="select__square-textarea">
                                                        <span>Перелік проєктних рішень</span>
                                                        <textarea class="square__text" name="city_text_2"  placeholder="Вкажіть перелік об'єктів щодо яких замовникам видано вихідні дані відповідно до статті 29 Закону України 'Про регулювання містобудівної діяльності'" data-square2="<?php echo $development_detailed_plans_territories_city; ?>"><?php echo $development_detailed_plans_territories_text; ?></textarea>
                                                    </label>
                                                </div>
                                            </div>

                                        <?php }
                                    echo '</div>';
                                } else { ?>
                                    <div class="select__multiList2" data-list2="list2"></div>
                                    <div class="list__fieldsToFill2"></div>
                                <?php } ?>


                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="11">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Перелік та опис територій, щодо яких передбачається розроблення планувальних рішень детальних планів територій в межах населених пунктів</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('розроблення_детальних_планів_територій', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                    class="tabs-body__textarea"
                                    name="development_detailed_plans_territories_second"
                                    id="development_detailed_plans_territories_second"
                                    placeholder="Вкажіть інформацію (опис) про територію щодо яких планується розроблення детальних планів територій"
                                    required
                                ><?php if (isset($user_fields['development_detailed_plans_territories_second'])) { echo $user_fields['development_detailed_plans_territories_second']; } ?></textarea>

                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Перелік та опис територій, щодо яких передбачається розроблення планувальних рішень детальних планів територій за межами населених пунктів</h5>

                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="development_detailed_plans_territories_second2"
                                        id="development_detailed_plans_territories_second2"
                                        placeholder="Вкажіть інформацію (опис) про територію щодо яких планується розроблення детальних планів територій"
                                        required
                                ><?php if (isset($user_fields['development_detailed_plans_territories_second2'])) { echo $user_fields['development_detailed_plans_territories_second2']; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>

                            <div class="tabs-body" data-tabcontent="12">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Перелік проєктних рішень, які необхідно передбачити під час розроблення містобудівної документації</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            Проєктні рішення мають відповідати положенням концепції інтегрованого розвитку території територіальної громади, а за її відсутності – врахувати матеріали громадських обговорень з формування завдання на розроблення комплексного плану
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                    class="tabs-body__textarea"
                                    name="change_project_solutions"
                                    id="change_project_solutions"
                                    placeholder="Проєктні рішення мають відповідати положенням концепції інтегрованого розвитку території територіальної громади, а за її відсутності – врахувати матеріали громадських обговорень з формування завдання на розроблення комплексного плану"
                                    required
                                ><?php if (isset($user_fields['change_project_solutions'])) { echo $user_fields['change_project_solutions']; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="13">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Землеустрій та землекористування</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('формування_земельних_ділянок', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea class="tabs-body__textarea tabs-body__textarea" name="formation_land_plots" id="formation_land_plots" placeholder="Зазначте землевпорядні заходи, в тому числі перелік заявок/потреб відповідно до перспективного використання земель." required><?php if (isset($user_fields['formation_land_plots'])) { echo $user_fields['formation_land_plots']; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="14">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Перелік земельних ділянок, що підлягають формуванню та реєстрації (у разі необхідності)</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('внесення_до_дзк_відомостей', 'option'); ?>
                                        </span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <h5 class="tabs-body__title">
                                    Кількість та площа земельних ділянок, які формуються за результатами розроблення планувальних рішень детальних планів територій, відомості про які підлягають внесенню до Державного земельного кадастру
                                </h5>
                                <textarea class="tabs-body__textarea" name="entering_land_information" id="entering_land_information" placeholder="Зазначте орієнтовну кількість та площу земельних ділянок, щодо яких передбачається формування та реєстрація" required><?php if (isset($user_fields['entering_land_information'])) { echo $user_fields['entering_land_information']; } ?></textarea>

                                <h5 class="tabs-body__title">
                                    Реєстрація земельних ділянок, права власності на які посвідчено до 2004 року та відомості про які не внесені до Державного земельного кадастру
                                </h5>
                                <textarea class="tabs-body__textarea" name="entering_land_information_second" id="entering_land_information" placeholder="Зазначте кількість та площу земельних ділянок які підлягають реєстрації, права власності на які посвідчено до 2004 року та відомості про які не внесено до Державного земельного кадастру." required><?php if (isset($user_fields['entering_land_information_second'])) { echo $user_fields['entering_land_information_second']; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="15">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Обмеження у використанні земель (територій), визначені комплексним планом, які підлягають внесенню до Державного земельного кадастру</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('обмеження_у_використанні_земель', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="land_use_restrictions"
                                        id="land_use_restrictions"
                                        placeholder="Внесіть відомості про обмеження у використанні земель (територій), визначені комплексним планом, які підлягають внесенню до Державного земельного кадастру"
                                        required>Обмеження у використанні земель визначаються відповідно до постанови Кабінету Міністрів України «Про затвердження Класифікації обмежень у використанні земель, що можуть встановлюватися комплексним планом просторового розвитку території територіальної громади, генеральним планом населеного пункту, детальним планом території».</textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="16">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Перелік наявних вихідних даних</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
										    <?php the_field('перелік_вихідних_даних', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="list_raw_data"
                                        id="list_raw_data"
                                        required
                                        placeholder="Внесіть відомості про наявні вихідні дані які будуть надані Замовником Виконавцю для розроблення комплексного плану"
                                >Відповідно до вимог постанови  Кабінету Міністрів України «Про затвердження Порядку розроблення, оновлення, внесення змін та затвердження містобудівної документації»</textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="17">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Відомості про картографічну основу</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
										    <?php the_field('відомості_про_картографічну_основу', 'option'); ?>
                                        </span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="information_about_cartographic_basis"
                                        id="information_about_cartographic_basis"
                                        placeholder="Внесіть відомості про наявну у замовника картографічну основу яка використовуватиметься для розроблення комплексного плану просторового розвитку території"
                                        required
                                ><?php if (isset($user_fields['information_about_cartographic_basis'])) { echo $user_fields['information_about_cartographic_basis']; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="18">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Вимоги щодо врахування державних та регіональних інтересів</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
										    <?php the_field('державні_та_регіональні_інтереси', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                    class="tabs-body__textarea"
                                    name="state_regional_interests"
                                    id="state_regional_interests"
                                    placeholder="Зазначте реквізити документу (листа) який містить відомості щодо врахування державних, регіональних інтересів, які необхідно враховувати при розробленні комплексного плану просторового розвитку території громади"
                                    required
                                ><?php if (isset($user_fields['state_regional_interests'])) { echo $user_fields['state_regional_interests']; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="19">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Графічні матеріали</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('етапи_розроблення_комплексного_плану', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="stages_developing_comprehensive_plan"
                                        id="stages_developing_comprehensive_plan"
                                        required
                                        placeholder="Перелік графічних матеріалів, що розробляються у складі комплексного плану визначається відповідно до таблиці 5.1 ДБН Б.1.1-14:2021"
                                ><?php if (!empty($user_fields['stages_developing_comprehensive_plan'])) { echo $user_fields['stages_developing_comprehensive_plan']; } else {
echo 'Перелік графічних матеріалів містобудівної документації:
1) схема розташування території розроблення містобудівної документації в системі розселення;
2) збірний план земельних ділянок, наданих та не наданих у власність чи користування (крім детального плану території);
3) ландшафтний план (для комплексного плану);
4) план функціонального зонування території;
5) план існуючого використання території та схема існуючих обмежень у використанні земель;
6) проектний план та схема проектних обмежень у використанні земель;
7) схема транспортної мобільності та інфраструктури;
8) схема інженерного забезпечення території;
9) схема інженерної підготовки та благоустрою території (для детального плану території - схема інженерної підготовки, благоустрою території та вертикального планування);
10) план розподілу земель за категоріями, власниками і користувачами та план розподілу земель за угіддями з відображенням наявних обмежень (обтяжень) (крім детального плану території);
11) план земельних ділянок, сформованих за результатами розроблення містобудівної документації, відомості про які підлягають внесенню до Державного земельного кадастру;
12) план земельних ділянок, право власності на які посвідчено до 2004 року та відомості про які не внесено до Державного земельного кадастру;
13) план обмежень у використанні земель, відомості про які підлягають внесенню до Державного земельного кадастру на підставі розробленої містобудівної документації;
14) схема інженерно-технічних заходів цивільного захисту;
15) інші схеми, передбачені завданням, а також такі, що деталізують прийняті проектні рішення.'; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="20">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Перелік додаткових текстових та графічних матеріалів або додаткові вимоги до змісту текстових чи графічних матеріалів, передбачені Замовником</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
										    <?php the_field('перелік_додаткових_розділів_та_графічних_матеріалів', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="list_additional_sections_graphic_materials"
                                        id="list_additional_sections_graphic_materials"
                                        required
                                        placeholder="Зазначте перелік додаткових розділів та графічних матеріалів, додаткові вимоги до змісту окремих розділів чи графічних матеріалів комплексного плану просторового розвитку території територіальних громад"
                                >
Комплексний план виконати у відповідності до Постанови КМУ від 01.09.2021 № 926 «Про затвердження порядку розроблення, оновлення, внесення змін та затвердження містобудівної документації». Розділ «Інженерно-технічні заходи цивільного захисту» на особливий період та мирний час розробляють як окремий документ за окремим завданням до ДБН В.1.2-4 та ДБН Б.1.1-5.
Здійснити стратегічну екологічну оцінку та скласти Звіт про стратегічну екологічну оцінку у процесі розроблення документу державного планування
                            </textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="21">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Правовий режим здійснення майнових прав на містобудівну документацію після передачі її замовнику</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('правовий_режим_здійснення_майнових_прав', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="legal_regime_exercise_property_rights"
                                        id="legal_regime_exercise_property_rights"
                                        required
                                        placeholder="Зазначте правовий режим здійснення майнових прав на містобудівну документацію після передачі її замовнику"
                                >Майнові права на містобудівну документацію належать замовнику.</textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="22">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Кількість паперових примірників</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('кількість_паперових_примірників', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea class="tabs-body__textarea" name="number_paper_copies" id="number_paper_copies" required> <?php  if (!empty($user_fields['number_paper_copies'])) { echo $user_fields['number_paper_copies']; } else { echo 'Паперових примірників: ';  ?><?php } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="23">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Кількість електронних примірників</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('кількість_електронних_примірників', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea class="tabs-body__textarea" name="number_electronic_copies" id="number_electronic_copies" placeholder="Кількість електронних примірників, кожен з яких передається на окремому USB флеш-накопичувачі:" required><?php if (!empty($user_fields['number_electronic_copies'])) { echo $user_fields['number_electronic_copies']; }else{ echo 'Кількість електронних примірників, кожен з яких передається на окремому USB флеш-накопичувачі:';}  ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="24">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Вимоги до формату передачі даних Замовнику за результатами розроблення комплексного плану</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('формат_передачі_даних', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>

                                <div class="format-type-txt">
                                    <p class="tabs-body__title">Текстові документи надаються у форматі .pdf. Оберіть формат електронних документів містобудівної документації:</p>

                                    <div class="format-type-radios">

                                        <div class="format-type__single-radio">
                                            <label for="format-type-rad1"></label>
                                            <input type="radio" name="format-type-rad" id="format-type-rad1" value="gdb" <?php if($user_fields['format-type-rad']=='gdb') echo 'checked';?> >
                                            <span>Формат gdb</span>
                                        </div>
                                        <div class="format-type__single-radio">
                                            <label for="format-type-rad2"></label>
                                            <input type="radio" name="format-type-rad" id="format-type-rad2" value="geojson" <?php if($user_fields['format-type-rad']=='geojson') echo 'checked';?>>
                                            <span>Формат geojson</span>
                                        </div>
                                        <div class="format-type__single-radio">
                                            <label for="format-type-rad3"></label>
                                            <input type="radio" name="format-type-rad" id="format-type-rad3" value="gdb, geojson" <?php if($user_fields['format-type-rad']=='gdb, geojson') echo 'checked';?>>
                                            <span>Формат gdb та geojson</span>
                                        </div>
                                    </div>
                                </div>


<!--                                <textarea-->
<!--                                        class="tabs-body__textarea"-->
<!--                                        name="data_transfer_format"-->
<!--                                        id="data_transfer_format"-->
<!--                                        placeholder="Вкажіть вимоги до формату передачі даних замовнику за результатами розроблення комплексного плану просторового розвитку території територільних громад"-->
<!--                                        required-->
<!--                                >Геопросторові дані щодо об'єктів комплексного плану створюються із застосуванням геоінформаційного програмного забезпечення у формі бази геоданих відповідно до Наказу Мінрегіону № 56 від 22.02.2022 "Про затвердження структури Бази геоданих містобудівної документації на місцевому рівні" та оформлюються як графічні матеріали документації у вигляді цифрових карт та векторних зображень.-->
<!--Електронний документ має відповідати вимогам постанови  Кабінету Міністрів України від 9 червня 2021 р. № 632 “Про затвердження Порядку визначення формату електронних документів комплексного плану просторового розвитку території територіальної громади, генерального плану населеного пункту, детального плану території”.-->
<!--Геопросторові дані комплексного плану вносяться до бази геоданих Державного земельного та містобудівного кадастру у відповідності до вимог чинного законодавства.-->
<!--</textarea>-->
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="25">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Додаткові вимоги до комплексного плану</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('додаткові_вимоги', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="additional_requirements"
                                        id="additional_requirements"
                                        placeholder="Вкажіть додаткові вимоги до комплексного плану просторового розвитку території територільних громад"
                                        required
                                ><?php if (isset($user_fields['additional_requirements'])) { echo $user_fields['additional_requirements']; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                    <button type="submit" class="button button--green _p20 tabs-body__next">
                                        НАСТУПНИЙ ПУНКТ
                                        <span class="tabs-body__btn-next"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="tabs-body" data-tabcontent="26">
                                <div class="tabs-body__top">
                                    <h5 class="tabs-body__title">Перелік індикаторів розвитку</h5>
                                    <div class="tabs-body__tooltip-label">
                                        <div role="tooltip" class="tabs-body__tooltip">
										<span class="tabs-body__infoMessage">
                                            <?php the_field('індикатори_розвитку_території', 'option'); ?>
										</span>
                                        </div>
                                        <span class="span">Інформація</span>
                                    </div>
                                </div>
                                <textarea
                                        class="tabs-body__textarea"
                                        name="indicators_territory_development"
                                        id="indicators_territory_development"
                                        placeholder="Вкажіть індикатори розвитку території для відстеження прогресу реалізації комплексного плану просторового розвитку території територільних громад "
                                        required
                                ><?php if (isset($user_fields['indicators_territory_development'])) { echo $user_fields['indicators_territory_development']; } ?></textarea>
                                <div class="tabs-body__actions">
                                    <button type="submit" class="button tabs-body__btn-save _p20">ЗБЕРЕГТИ</button>
                                    <button type="submit" class="button button--green _p20 tabs-body__prev">
                                        ПОПЕРЕДНІЙ ПУНКТ
                                        <span class="tabs-body__btn-prev"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script>
        function func(e) {
            if(!/\d/.test(e.key) && e.code !=='NumpadDecimal' && e.key !== 'Backspace' && e.key !=='.') {
                e.preventDefault();
            }
        };
        function func2(e) {
            if (e.value.indexOf(".") != '-1') {
                if(e.value.indexOf(".") === 0) {
                    e.value = '0' + e.value;
                }
                e.value=e.value.replace( /^([^\.]*\.)|\./g, '$1').substring(0, e.value.indexOf(".") + 5);
            }
        }
    </script>

<?php get_footer();