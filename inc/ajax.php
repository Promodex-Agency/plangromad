<?php
/**
 * Ajax functions
 *
 * @package ankback
 */

add_action( 'wp_ajax_register_ajax', 'register_ajax' );
add_action( 'wp_ajax_nopriv_register_ajax', 'register_ajax' );
function register_ajax() {
    global $wpdb;

    if($_POST['region']) {
        $area               = "SELECT DISTINCT(area) FROM wp_table WHERE city = '" . $_POST['region'] . "'";
        $result_area        = $wpdb->get_results($area);
        $result_area        = json_decode(json_encode($result_area), true);

        echo json_encode($result_area);
    } elseif ($_POST['area']) {
        $community          = "SELECT DISTINCT(community) FROM wp_table WHERE area = '" . $_POST['area'] . "'";
        $result_community   = $wpdb->get_results($community);
        $result_community   = json_decode(json_encode($result_community), true);

        echo json_encode($result_community);
    }

    wp_die();
}

add_action( 'wp_ajax_form_question', 'form_question' );
add_action( 'wp_ajax_nopriv_form_question', 'form_question' );
function form_question() {
    $value_f = array();
    $value_s = array();

    $development_planning_decisions_array = array();
    $development_detailed_plans_territories_array = array();

    $id = $_POST['data'][0]['value'];

    update_field('progress', $_POST['progrress'], 'user_' . $id);

    foreach ($_POST['data'] as $data) {
        if ($data['name'] =='form') {
            $value_f['development_planning_decisions'][] = array(
                'development_planning_decisions_city' => $data['value']
            );
        }

        if ($data['name'] == 'city_area') {
            $value_f['development_planning_decisions'][] = array(
                'development_planning_decisions_area' => $data['value']
            );
        }

        if ($data['name'] == 'city_text') {
            $value_f['development_planning_decisions'][] = array(
                'development_planning_decisions_text' => $data['value']
            );
        }



        if ($data['name'] =='form_second') {
            $value_s['development_detailed_plans_territories'][] = array(
                'development_detailed_plans_territories_city' => $data['value']
            );
        }

        if ($data['name'] == 'city_area_2') {
            $value_s['development_detailed_plans_territories'][] = array(
                'development_detailed_plans_territories_area' => $data['value']
            );
        }

        if ($data['name'] == 'city_text_2') {
            $value_s['development_detailed_plans_territories'][] = array(
                'development_detailed_plans_territories_text' => $data['value']
            );
        }

        update_field($data['name'], $data['value'], 'user_' . $id);
    }

    foreach ($value_f['development_planning_decisions'] as $development_planning_decisions) {
        if($development_planning_decisions['development_planning_decisions_city']) {
            $development_planning_decisions_array['development_planning_decisions_city'][] = $development_planning_decisions['development_planning_decisions_city'];
        }

        if($development_planning_decisions['development_planning_decisions_area']) {
            $development_planning_decisions_array['development_planning_decisions_area'][] = $development_planning_decisions['development_planning_decisions_area'];
        }

        if($development_planning_decisions['development_planning_decisions_text']) {
            $development_planning_decisions_array['development_planning_decisions_text'][] = $development_planning_decisions['development_planning_decisions_text'];
        }
    }

    $valueCityS = array();
    foreach ($development_planning_decisions_array['development_planning_decisions_city'] as $item) {
        $valueCityS[] = array(
            'development_planning_decisions_city' => $item
        );
    }
    update_field('development_planning_decisions', $valueCityS, 'user_' . $id);

    $valueAreaS = array();
    foreach ($development_planning_decisions_array['development_planning_decisions_area'] as $item) {
        $valueAreaS[] = array(
            'development_planning_decisions_area' => $item
        );
    }
    update_field('development_planning_decisions', $valueAreaS, 'user_' . $id);

    $valueTextS = array();
    foreach ($development_planning_decisions_array['development_planning_decisions_text'] as $item) {
        $valueTextS[] = array(
            'development_planning_decisions_text' => $item
        );
    }
    update_field('development_planning_decisions', $valueTextS, 'user_' . $id);


    foreach ($value_s['development_detailed_plans_territories'] as $development_detailed_plans_territories) {
        if($development_detailed_plans_territories['development_detailed_plans_territories_city']) {
            $development_detailed_plans_territories_array['development_detailed_plans_territories_city'][] = $development_detailed_plans_territories['development_detailed_plans_territories_city'];
        }

        if($development_detailed_plans_territories['development_detailed_plans_territories_area']) {
            $development_detailed_plans_territories_array['development_detailed_plans_territories_area'][] = $development_detailed_plans_territories['development_detailed_plans_territories_area'];
        }

        if($development_detailed_plans_territories['development_detailed_plans_territories_text']) {
            $development_detailed_plans_territories_array['development_detailed_plans_territories_text'][] = $development_detailed_plans_territories['development_detailed_plans_territories_text'];
        }
    }

    print_r($development_detailed_plans_territories_array);

    $valueCity = array();
    foreach ($development_detailed_plans_territories_array['development_detailed_plans_territories_city'] as $item) {
        $valueCity[] = array(
            'development_detailed_plans_territories_city' => $item
        );
    }
    update_field('development_detailed_plans_territories', $valueCity, 'user_' . $id);

    $valueArea = array();
    foreach ($development_detailed_plans_territories_array['development_detailed_plans_territories_area'] as $item) {
        $valueArea[] = array(
            'development_detailed_plans_territories_area' => $item
        );
    }
    update_field('development_detailed_plans_territories', $valueArea, 'user_' . $id);

    $valueText = array();
    foreach ($development_detailed_plans_territories_array['development_detailed_plans_territories_text'] as $item) {
        $valueText[] = array(
            'development_detailed_plans_territories_text' => $item
        );
    }
    update_field('development_detailed_plans_territories', $valueText, 'user_' . $id);

    wp_die();
}

add_action( 'wp_ajax_upload_file', 'upload_file' );
add_action( 'wp_ajax_nopriv_upload_file', 'upload_file' );
function upload_file() {
    foreach ($_FILES as $file) {
        $upload = wp_upload_bits($file["name"], null, file_get_contents($file["tmp_name"]));

        $attachment = array(
            'post_mime_type'    => $upload['type'],
            'post_title'        => $file["name"],
            'post_content'      => '',
            'post_status'       => 'inherit'
        );

        $attachmentid=wp_insert_attachment( $attachment, $upload['file']);

        if($_POST['id']!='document') {
            update_field($_POST['id'], $attachmentid, 'user_' . $_POST['user_id']);
        }
    }

    wp_die();
}

add_action( 'wp_ajax_remove_documents', 'remove_documents' );
add_action( 'wp_ajax_nopriv_remove_documents', 'remove_documents' );
function remove_documents() {
    $id = $_POST['data'];

    $attachments = get_posts( array(
        'post_type'         => 'attachment',
        'author'            => $id,
        'posts_per_page'    => '-1'
    ));
    if ($attachments) {
        foreach ($attachments as $attachment){
            $attachmentID = $attachment->ID;
            $attachment_path = get_attached_file( $attachmentID);

            wp_delete_attachment($attachmentID, true);
            unlink($attachment_path);
        }
    }

    wp_die();
}

add_action( 'wp_ajax_remove_file', 'remove_file' );
add_action( 'wp_ajax_nopriv_remove_file', 'remove_file' );
function remove_file() {
    $user_id = $_POST['data'];
    $file_id = $_POST['data_id'];

    $attachments = get_posts( array(
        'post_type'         => 'attachment',
        'author'            => $user_id,
        'posts_per_page'    => '-1'
    ));
    if ($attachments) {
        foreach ($attachments as $attachment) {
            $attachment_path = get_attached_file($file_id);
            wp_delete_attachment($file_id, true);
            unlink($attachment_path);
        }
    }

    wp_die();
}

add_action( 'wp_ajax_remove_questionnaire', 'remove_questionnaire' );
add_action( 'wp_ajax_nopriv_remove_questionnaire', 'remove_questionnaire' );
function remove_questionnaire() {
    $id = $_POST['data'];

    update_field('progress', '0', 'user_' . $id);
    update_field('document_type', '', 'user_' . $id);
    update_field('name_territorial_hulk', '', 'user_' . $id);
    update_field('area_territory_hulk', '', 'user_' . $id);
    update_field('deputy_comprehensive_plan', '', 'user_' . $id);
    update_field('substava_decomposition', '', 'user_' . $id);
    update_field('lines_split', '', 'user_' . $id);
    update_field('implementation_years1', '', 'user_' . $id);
    update_field('implementation_years2', '', 'user_' . $id);
    update_field('implementation_years3', '', 'user_' . $id);
    update_field('normative_acts', '', 'user_' . $id);
    update_field('administrative_center1', '', 'user_' . $id);
    update_field('administrative_center', '', 'user_' . $id);
    update_field('formation_land_plots', '', 'user_' . $id);
    update_field('entering_land_information', '', 'user_' . $id);
    update_field('land_use_restrictions', '', 'user_' . $id);
    update_field('list_raw_data', '', 'user_' . $id);
    update_field('state_regional_interests', '', 'user_' . $id);
    update_field('information_about_cartographic_basis', '', 'user_' . $id);
    update_field('stages_developing_comprehensive_plan', '', 'user_' . $id);
    update_field('requirements_formation_electronic_document', '', 'user_' . $id);
    update_field('list_additional_sections_graphic_materials', '', 'user_' . $id);
    update_field('legal_regime_exercise_property_rights', '', 'user_' . $id);
    update_field('number_paper_copies', '', 'user_' . $id);
    update_field('number_electronic_copies', '', 'user_' . $id);
    update_field('data_transfer_format', '', 'user_' . $id);
    update_field('additional_requirements', '', 'user_' . $id);
    update_field('indicators_territory_development', '', 'user_' . $id);
    update_field('development_empty', '', 'user_' . $id);
    update_field('general_plan_administrative_center_area', '', 'user_' . $id);
    update_field('development_planning_decisions_city', '', 'user_' . $id);
    update_field('development_planning_decisions_area', '', 'user_' . $id);
    update_field('development_planning_decisions_text', '', 'user_' . $id);
    update_field('development_planning_decisions', '', 'user_' . $id);
    update_field('development_detailed_plans_territories_city', '', 'user_' . $id);
    update_field('development_detailed_plans_territories_area', '', 'user_' . $id);
    update_field('development_detailed_plans_territories_text', '', 'user_' . $id);
    update_field('development_detailed_plans_territories_second', '', 'user_' . $id);
    update_field('development_detailed_plans_territories_second2', '', 'user_' . $id);
    update_field('change_project_solutions', '', 'user_' . $id);
    update_field('development_detailed_plans_territories', '', 'user_' . $id);
    update_field('general_plan_administrative_center_text', '', 'user_' . $id);
    update_field('entering_land_information_second', '', 'user_' . $id);
    update_field('decomposition_date', '', 'user_' . $id);
    update_field('format-type-rad', '', 'user_' . $id);



    wp_die();
}

add_action( 'wp_ajax_send_form', 'send_form' );
add_action( 'wp_ajax_nopriv_send_form', 'send_form' );
function send_form() {
    $fullName   = $_POST['data'][0]['value'];
    $phone      = $_POST['data'][1]['value'];
    $email      = $_POST['data'][2]['value'];
    $message    = $_POST['data'][3]['value'];

    if ( strlen( $fullName ) === 0 ) {
        $validation_messages[] = 'Error';

        wp_send_json_error(array(
            'status' => 'error',
            'name' => 'FullName',
            'message' => 'Обов`язково до заповнення, введіть лише буквенні значення'
        ));

        wp_die();
    }

    if ( strlen( $phone ) === 0 ) {
        $validation_messages[] = 'Error';

        wp_send_json_error(array(
            'status' => 'error',
            'name' => 'Phone',
            'message' => 'Обов`язково до заповнення, введіть коректне значення'
        ));

        wp_die();
    }

    if ( empty( $validation_messages ) ) {

        $mail    = get_option( 'admin_email' );
        $subject = 'Нове повідомлення від ' . $fullName;
        $message = $message . ' - Електронна адреса клієнта: ' . $email . ' <br> Телефон клієнта: ' . $phone;

        wp_mail( $mail, $subject, $message );

        wp_send_json_success(array(
            'status' => 'success',
            'name' => 'success',
            'message' => 'Send'
        ));

        wp_die();
    }
}