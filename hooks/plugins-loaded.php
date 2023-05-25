<?php

function license_manager_textdomain_init() {
    load_plugin_textdomain('the-license-manager', false, LM_PLUGIN_ROOT . '/languages');
}
add_action('plugins_loaded', 'license_manager_textdomain_init');
