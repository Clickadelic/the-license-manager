<?php

function license_manager_register_admin_scripts() {
	global $pagenow, $typenow;
	
	$dir = plugin_dir_url( __DIR__ );

    wp_register_style(
        'license-manager-backend-style',
		$dir . '/assets/css/license-manager.css'
    );
    wp_register_style(
        'license-manager-bootstrap-datetime-picker-min-style',
        $dir . '/assets/css/bootstrap-datetime-picker.min.css'
    );
    wp_register_script(
        'license-manager-clipboard-min-script',
        $dir . '/assets/js/clipboard.min.js',
        array('jquery'),
        NULL,
        true
    );
    wp_register_script(
        'moment-de-locale',
        $dir . '/assets/js/moment-de.js',
        array('jquery'),
        NULL,
        true
    );
    wp_register_script(
        'moment-js-min-script',
        $dir . '/assets/js/moment.min.js',
        array('jquery'),
        NULL,
        true
    );
    wp_register_script(
        'license-manager-bootstrap-datetime-picker-min-script',
        $dir . '/assets/js/bootstrap-datetime-picker.min.js',
        array('jquery'),
        NULL,
        true
    );
    wp_register_script(
        'license-manager-popper-min-script',
        $dir . '/assets/js/popper.min.js',
        array('jquery'),
        NULL,
        true
    );
    wp_register_script(
        'license-manager-bootstrap-min-script',
        $dir . '/assets/js/bootstrap.min.js',
        array('jquery'),
        NULL,
        true
    );
    wp_register_script(
        'license-manager-backend-script',
        $dir . '/assets/js/license-manager.js',
        array('jquery'),
        NULL,
        true
    );

    if($pagenow === 'index.php') {
        wp_enqueue_style('license-manager-backend-style');
    }

	if(($pagenow === 'post.php' ||
        $pagenow === 'post-new.php' ||
        $pagenow === 'edit.php') && $typenow === 'license') {
        wp_enqueue_media();
        wp_enqueue_style('license-manager-backend-style');
        wp_enqueue_style('license-manager-bootstrap-datetime-picker-min-style');
        wp_enqueue_script('license-manager-clipboard-min-script');
        wp_enqueue_script('moment-js-min-script');
        wp_enqueue_script('moment-de-locale');
        wp_enqueue_script('license-manager-bootstrap-datetime-picker-min-script');
        wp_enqueue_script('license-manager-popper-min-script');
        wp_enqueue_script('license-manager-bootstrap-min-script');
        wp_enqueue_script('license-manager-backend-script');
	}

    if($pagenow === 'options-general.php' && $_GET['page'] === 'license-manager-options') {
        wp_enqueue_media();
        wp_enqueue_style('license-manager-backend-style');
        wp_enqueue_script('license-manager-popper-min-script');
        wp_enqueue_script('license-manager-bootstrap-min-script');
        wp_enqueue_script('license-manager-backend-script');
		
        wp_localize_script('license-manager-backend-script', 'licence_manager_obj',
            array(
                'title' => __('Logo upload', 'the-license-manager'),
                'button' => __('Use this file', 'the-license-manager'),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
    }
}
add_action('admin_enqueue_scripts', 'license_manager_register_admin_scripts', 10, 1);
