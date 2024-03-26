<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/user-registration/myaccount/dashboard.php.
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
	exit; // Exit if accessed directly
}

require get_template_directory() . '/library/phpword/vendor/autoload.php';

global $wpdb;

$user_fields = get_fields( 'user_' . get_current_user_id() );

$first_name = ucfirst( get_user_meta( get_current_user_id(), 'first_name', true ) );
$last_name  = ucfirst( get_user_meta( get_current_user_id(), 'last_name', true ) );
$full_name  = $first_name . ' ' . $last_name;

$phone = get_user_meta( get_current_user_id(), 'user_registration_input_phone', true );
$community = get_user_meta( get_current_user_id(), 'user_registration_input_community', true );
$position = get_user_meta( get_current_user_id(), 'user_registration_input_box_1672854396', true );

$territorial_community_nv = get_user_meta( get_current_user_id(), 'user_registration_input_community', true );
$name_area_nv = get_user_meta(get_current_user_id(), 'user_registration_input_area', true );
$name_region_nv = get_user_meta( get_current_user_id(), 'user_registration_input_city', true );

$getDovidnik  = "SELECT * FROM wp_dovidnik WHERE city_nv = '" . $name_region_nv . "' AND area_nv = '" . $name_area_nv . "' AND community_nv = '" . $territorial_community_nv . "'";
$result       = $wpdb->get_results($getDovidnik);
$result       = json_decode(json_encode($result), true);

$territorial_community = $result[0]['city_rv'];
$name_area = $result[0]['area_rv'];
$name_region = $result[0]['community_rv'];
$name_admincentr= $result[0]['admincentr'];

//$territorial_community = mb_strtoupper($territorial_community);
//$name_area = mb_strtoupper($name_area);
//$name_region = mb_strtoupper($name_region);

$progress = get_field( 'progress', 'user_' . get_current_user_id() );

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$_doc = new \PhpOffice\PhpWord\TemplateProcessor('анкета.docx');

$_doc->setValue('document_type', $user_fields['document_type']);
$_doc->setValue('name_territorial_hulk', $user_fields['name_territorial_hulk']);
$_doc->setValue('area_territory_hulk', $user_fields['area_territory_hulk']);
$_doc->setValue('deputy_comprehensive_plan', $user_fields['deputy_comprehensive_plan']);
$_doc->setValue('substava_decomposition', $user_fields['substava_decomposition']);
if( $user_fields['substava_decomposition_date']=='undefined' or $user_fields['substava_decomposition_date']=='NaN.NaN.NaN') {
    $user_fields['substava_decomposition_date']='';
}
$_doc->setValue('substava_decomposition_date', $user_fields['substava_decomposition_date']);

$_doc->setValue('lines_split', $user_fields['lines_split']);
$_doc->setValue('implementation_years1', $user_fields['implementation_years1']);
$_doc->setValue('implementation_years2', $user_fields['implementation_years2']);
$_doc->setValue('implementation_years3', $user_fields['implementation_years3']);
$_doc->setValue('normative_acts', $user_fields['normative_acts']);
$_doc->setValue('administrative_center', $user_fields['administrative_center']);
$_doc->setValue('administrative_center1', $user_fields['administrative_center1']);
$_doc->setValue('development_planning_decisions', $user_fields['development_planning_decisions']);
$_doc->setValue('development_detailed_plans_territories', $user_fields['development_detailed_plans_territories']);
$_doc->setValue('development_detailed_plans_territories_second', $user_fields['development_detailed_plans_territories_second']);
$_doc->setValue('development_detailed_plans_territories_second2', $user_fields['development_detailed_plans_territories_second2']);
$_doc->setValue('formation_land_plots', $user_fields['formation_land_plots']);
$_doc->setValue('entering_land_information', $user_fields['entering_land_information']);
$_doc->setValue('entering_land_information_second', $user_fields['entering_land_information_second']);
$_doc->setValue('land_use_restrictions', $user_fields['land_use_restrictions']);
$_doc->setValue('list_raw_data', $user_fields['list_raw_data']);
$_doc->setValue('state_regional_interests', $user_fields['state_regional_interests']);
$_doc->setValue('information_about_cartographic_basis', $user_fields['information_about_cartographic_basis']);
$_doc->setValue('stages_developing_comprehensive_plan', $user_fields['stages_developing_comprehensive_plan']);
$_doc->setValue('requirements_formation_electronic_document', $user_fields['requirements_formation_electronic_document']);
$_doc->setValue('list_additional_sections_graphic_materials', $user_fields['list_additional_sections_graphic_materials']);
$_doc->setValue('legal_regime_exercise_property_rights', $user_fields['legal_regime_exercise_property_rights']);
$_doc->setValue('number_paper_copies', $user_fields['number_paper_copies']);
$_doc->setValue('number_electronic_copies', $user_fields['number_electronic_copies']);
$_doc->setValue('indicators_territory_development', $user_fields['indicators_territory_development']);

$_doc->setValue('additional_requirements', $user_fields['additional_requirements']);
$_doc->setValue('data_transfer_format', 'Текстові документи надаються у форматі .pdf. Формат електронних документів містобудівної документації: '.$user_fields['format-type-rad']);


$_doc->setValue('territorial_community', $territorial_community);
$_doc->setValue('name_area', $name_area);
$_doc->setValue('name_region', $name_region);
$_doc->setValue('name_admincentr', $name_admincentr);
$gromagexclude=array('UA12080050000062712','UA12100070000011492', 'UA12120070000057518', 'UA12140210000089021', 'UA12140310000078816', 'UA21100230000083101', 'UA23040110000019947', 'UA23060070000082704', 'UA23080070000068953', 'UA32080170000086616', 'UA32100130000093505', 'UA48060150000071713', 'UA51040010000016896', 'UA51080030000048246', 'UA51100270000073549', 'UA51100310000010196', 'UA56040110000061997', 'UA63120270000028556', 'UA73040130000087963', 'UA74080130000060606', 'UA74100390000073425');

if(in_array($result['0']['katottg'],$gromagexclude)) {
    $subtitle = 'на розроблення генерального плану '. $name_admincentr . ' ' . $name_region . ' ' . $name_area . ' ' . $territorial_community;
}else {
    $subtitle = 'на розроблення комплексного плану просторового розвитку території ' . $name_region . ' ' . $name_area . ' ' . $territorial_community;
}
$_doc->setValue('subtitle', $subtitle);





$_doc->setValue('change_project_solutions', $user_fields['change_project_solutions']);

$_doc->setValue('general_plan_administrative_center_city', $user_fields['general_plan_administrative_center_city']);
$_doc->setValue('general_plan_administrative_center_area', $user_fields['general_plan_administrative_center_area']);
$_doc->setValue('general_plan_administrative_center_text', $user_fields['general_plan_administrative_center_text']);

$textS = '';
foreach ($user_fields['development_planning_decisions'] as $value) {
    $textS .= 'Населенний пункт: ' . $value['development_planning_decisions_city'] . '<br>';
    $textS .= 'Площа, га: ' . $value['development_planning_decisions_area'] . '<br>';
    $textS .= 'Перелік проєктних рішень: ' . $value['development_planning_decisions_text'] . '<br><br>';
}
$textS = str_replace("<br>", '</w:t><w:br/><w:t>', $textS);
$_doc->setValue('development_planning', $textS);


$text = '';
foreach ($user_fields['development_detailed_plans_territories'] as $value) {
    $text .= 'Населенний пункт: ' . $value['development_detailed_plans_territories_city'] . '<br>';
    $text .= 'Площа, га: ' . $value['development_detailed_plans_territories_area'] . '<br>';
    $text .= 'Перелік проєктних рішень: ' . $value['development_detailed_plans_territories_text'] . '<br><br>';
}
$text = str_replace("<br>", '</w:t><w:br/><w:t>', $text);
$_doc->setValue('development_detailed', $text);

$dir = 'anketa/';
$file = str_replace("/","-", "Проєкт завдання КППРТГ №".get_current_user_id()).".docx";
$_doc->saveAs($dir.$file);
?>

<section class="account page__content">
    <div class="page__container account__content">
        <div class="account__profile profile">
            <div class="profile__top">
                <h5 class="profile__title">Профіль користувача</h5>
                <a class="profile__edit-label" href="<?php echo esc_url( ur_get_endpoint_url( 'edit-profile' ) ); ?>">
                    <button type="button" class="profile__edit profile__edit--green _icon-edit"></button>
                    Редагувати
                </a>
            </div>
            <div class="profile__content">
                <div class="profile__foto _icon-user"></div>
                <p class="profile__name">
                    <?php printf(
                        __( '%1$s', 'user-registration' ),
                        esc_html( $full_name )
                    ); ?>
                </p>
                <div class="profile__info-block">
                    <div class="profile__info">
                        <p class="profile__info-title">
                            Територіальна громада
                        </p>
                        <p class="profile__info-data">
                            <?php echo $community; ?>
                        </p>
                    </div>
                    <div class="profile__info">
                        <p class="profile__info-title">
                            Електронна пошта
                        </p>
                        <p class="profile__info-data">
                            <?php echo $current_user->user_email; ?>
                        </p>
                    </div>
                    <div class="profile__info">
                        <p class="profile__info-title">
                            Контактний телефон
                        </p>
                        <p class="profile__info-data">
                            <?php echo $phone; ?>
                        </p>
                    </div>
                    <div class="profile__info">
                        <p class="profile__info-title">
                            Посада
                        </p>
                        <p class="profile__info-data">
                            <?php echo $position; ?>
                        </p>
                    </div>
                    <div class="profile__exit">
                        <button class="profile__exit-btn"><a href="<?php echo ur_logout_url(); ?>">Вихід з особистого кабінету</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="account__questionnaire questionnaire">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo get_current_user_id(); ?>">
            <div class="questionnaire__top">
                <h5 class="profile__title">Онлайн-форма</h5>
                <div class="profile__actions">
                    <a href="/<?php echo $dir.$file; ?>">
                        <div class="questionnaire__download-label">
                            <button type="button" class="profile__edit _icon-download"></button>
                            Завантажити
                        </div>
                    </a>
                    <div class="questionnaire__bin-label questionnaire__bin-label--anketa">
                        <button type="button" class="profile__edit _icon-bin" data-popup="#editQuestionnare"></button>
                        Очистити
                    </div>
                </div>
                <div class="questionnaire__about-form">
                    <div class="questionnaire__progress">
                        <div class="questionnaire__progress-info">
                            <p class="questionnaire__progress-value-name">Ваша форма заповнена на:</p>
                            <p class="questionnaire__progress-value"><?php if($progress) { echo round($progress); echo '%'; } else { echo '0%'; } ?></p>
                        </div>
                        <progress class="questionnaire__progress-bar" id="file" max="100" value="<?php if($progress) { echo $progress; } else { echo '0'; } ?>"></progress>
                    </div>
                    <button type="button" class="questionnaire__btn button button--green"><a href="/questionnare">Заповнити форму</a></button>
                </div>
            </div>
            <div class="questionnaire__document">
                <h5 class="profile__title">Документи</h5>
                <div class="profile__actions">
                    <div class="questionnaire__download-label documents_download">
                        <button type="button" class="profile__edit _icon-download"></button>
                        Завантажити
                    </div>
                    <div class="questionnaire__bin-label questionnaire__bin-label--documents">
                        <button type="button" class="profile__edit _icon-bin" data-popup="#editDocument"></button>
                        Очистити
                    </div>

                </div>
                <div class="questionnaire__document-block must-be-docs">
                    <p class="profile__subtitle">Обов'язкові документи</p>
                    <?php
                    $documents=array('document1','document2','document3');

                    foreach($documents as $val){
                        if($user_fields[$val]){
                            $arrayexclude[]=$user_fields[$val]['ID'];
                                $args = array(
                                    'author' => get_current_user_id(),
                                    'post__in' => $user_fields[$val],
                                    'post_type' => 'attachment',
                                    'post_status' => 'inheret'
                                );
                                $query = new WP_Query( $args );

                                if ( $query->have_posts() ) while ( $query->have_posts() ) {
                                    $query->the_post(); $type = get_post_mime_type(); ?>
                                    <div class="questionnaire__add-document questionnaire__add-document--add <?php if($type == 'image/png') { echo 'png'; } elseif ($type == 'text/csv') { echo 'csv'; } elseif ($type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') { echo 'docx'; } elseif ($type == 'application/pdf') { echo 'pdf'; } elseif ($type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') { echo 'xlsx'; } elseif ($type == 'image/jpeg') { echo 'jpeg'; } ?>">
                                        <button class="questionnaire__btn-edit"></button>
                                        <div class="editDocument">
                                            <a href="<?php echo wp_get_attachment_url( get_the_ID() , false ); ?>" download="<?php echo get_the_title(); ?>"><button class="document-option">Завантажити документ</button></a>
                                            <button class="document-option removeFile" data-id="<?php echo get_the_ID(); ?>">Видалити документ</button>
                                        </div>
                                        <span class="document-title"><?php echo get_the_title(); ?></span>
                                    </div>
                                <?php }

                                wp_reset_postdata();
                        }else{
                            ?>
                            <div class="questionnaire__add-document ">
                                <div class="editDocument">
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="docs-line">


                    <label class="questionnaire__add-document <?php if($user_fields['document1']){ echo 'oppacitybtn'; }?>">
<!--                        --><?php //if(!$user_fields['document1']){ ?>
                        <input class="questionnaire__input-file" name="document1" type="file"  id="document1">
<!--                        --><?php //} ?>
                        <span class="questionnaire__btn-add button-circle">+</span>
                        Рішення про розроблення комплексного плану
                    </label>
                    <label class="questionnaire__add-document <?php if($user_fields['document2']){ echo 'oppacitybtn'; }?>" >
<!--                        --><?php //if(!$user_fields['document2']){ ?>
                        <input class="questionnaire__input-file" name="document2" type="file"  id="document2">
<!--                        --><?php //} ?>
                        <span class="questionnaire__btn-add button-circle">+</span>
                        Протокол громадського обговорення
                    </label>
                    <label class="questionnaire__add-document <?php if($user_fields['document3']){ echo 'oppacitybtn'; }?>">
<!--                        --><?php //if(!$user_fields['document3']){ ?>
                            <input class="questionnaire__input-file" name="document3" type="file"  id="document3">
<!--                        --><?php //} ?>
                        <span class="questionnaire__btn-add button-circle">+</span>
                        Рішення про створення робочої групи
                    </label>
                    </div>


                </div>


                <div class="others-docs-line">

                    <div class="questionnaire__document-block">
                        <p class="profile__subtitle">Інші документи</p>
                        <?php
                        $args = array(
                            'author' => get_current_user_id(),
                            'post_type' => 'attachment',
                            'post__not_in' => $arrayexclude,
                            'post_status' => 'inheret'
                        );
                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ) while ( $query->have_posts() ) {
                            $query->the_post(); $type = get_post_mime_type(); ?>
                            <div class="questionnaire__add-document questionnaire__add-document--add <?php if($type == 'image/png') { echo 'png'; } elseif ($type == 'text/csv') { echo 'csv'; } elseif ($type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') { echo 'docx'; } elseif ($type == 'application/pdf') { echo 'pdf'; } elseif ($type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') { echo 'xlsx'; } elseif ($type == 'image/jpeg') { echo 'jpeg'; } ?>">
                                <button class="questionnaire__btn-edit"></button>
                                <div class="editDocument">
                                    <a href="<?php echo wp_get_attachment_url( get_the_ID() , false ); ?>" download="<?php echo get_the_title(); ?>"><button class="document-option">Завантажити документ</button></a>
                                    <button class="document-option removeFile" data-id="<?php echo get_the_ID(); ?>">Видалити документ</button>
                                </div>
                                <span class="document-title"><?php echo get_the_title(); ?></span>
                            </div>
                        <?php }

                        wp_reset_postdata(); ?>
                        <div class="docs-line">
                            <label class="questionnaire__add-document">
                                <input class="questionnaire__input-file" name="document" type="file" multiple id="document">
                                <span class="questionnaire__btn-add button-circle">+</span>
                                Додати документ
                            </label>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>