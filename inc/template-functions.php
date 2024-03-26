<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ankback
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ankback_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ankback_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ankback_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ankback_pingback_header' );

add_action( 'init', 'process_post' );

function process_post() {

    if( isset( $_GET['download'] ) and get_current_user_id() ) {
        $zip = new ZipArchive();
        $zip_name = 'my_archive.zip';
        if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
            exit("Failed to create archive");
        }

        $args = array(
            'author' => get_current_user_id(),
            'post_type' => 'attachment',
            'post_status' => 'inheret'
        );
        $query = new WP_Query( $args );

        if ( $query->have_posts() ) while ( $query->have_posts() ) {
            $query->the_post();
            $file_urls[]=wp_get_attachment_url( get_the_ID() , false );
        }
        wp_reset_postdata();



        // Download each file and add it to the archive
        foreach ($file_urls as $file_url) {
            $file_contents = file_get_contents($file_url);
            $file_name = basename($file_url);
            $zip->addFromString($file_name, $file_contents);
        }

        // Close the ZIP archive
        $zip->close();

        // Download the ZIP archive
        header("Content-Type: application/zip");
        header("Content-Disposition: attachment; filename=$zip_name");
        header("Content-Length: " . filesize($zip_name));
        readfile($zip_name);

        // Delete the ZIP archive
        unlink($zip_name);

    }
}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Підказки для форми',
        'menu_title'    => 'Підказки',
        'menu_slug'     => 'question-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}

function logout_redirect765($user_id){
    unset($_COOKIE['msg']);
}
add_action('wp_logout','logout_redirect765');