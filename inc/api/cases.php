<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/cases', array(
        'methods' => 'GET',
        'callback' => 'getCase',
        'permission_callback' => '__return_true',
    ) );
} );

function getCase( WP_REST_Request $request ) {
    
    $query = $request->get_query_params();

    $page = get_page_by_path( $query['path'], 'OBJECT', ['cases'] );

    if (!$page) {
        return new WP_Error( 'Invalid page', 'Кейс не найден', array( 'status' => 404 ) );
    }

    $data = get_fields($page->ID);
    
    $data['content'] = $page->post_content;
    $data['title'] = $page->post_title;

    return $data;
}