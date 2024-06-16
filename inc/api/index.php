<?php
add_filter( 'rest_url_prefix', function() {
    return 'v1';
} );

require_once get_template_directory() . '/inc/api/page.php';
require_once get_template_directory() . '/inc/api/cases.php';
require_once get_template_directory() . '/inc/api/order.php';
require_once get_template_directory() . '/inc/api/titova.php';