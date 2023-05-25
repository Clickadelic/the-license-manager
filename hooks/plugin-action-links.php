<?php

function license_manager_action_links($links) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=license-manager-options')).'">'.__('Options','the-license-manager').'</a>';
   return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'license_manager_action_links');