<?php

function license_manager_columns_head($defaults) {
    $defaults['expiry_date'] = __('Expiry date', 'the-license-manager');
    return $defaults;
}
add_filter('manage_licenses_posts_columns', 'license_manager_columns_head');

function licence_manager_columns_content($column_name, $post_ID) {
    if ($column_name == 'expiry_date') {
        $expiry_date = get_post_meta(get_the_ID(), 'expiry_date', false);
        echo $expiry_date[0];
    }
}
add_action('manage_licenses_posts_custom_column', 'license_manager_columns_content', 10, 2);