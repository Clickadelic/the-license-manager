<?php

function license_manager_dashboard_widgets() {
	wp_add_dashboard_widget(
		'license-manager-common',
		__('License manager', 'the-license-manager'),
		'license_manager_dashboard_widget_common'
	);
}
add_action('wp_dashboard_setup', 'license_manager_dashboard_widgets'); 

function license_manager_dashboard_widget_common() {

	if(wp_count_posts()->publish > 1){
		$current_license_count = wp_count_posts()->publish;
	} else {
		$current_license_count = 0;
	}

	$html = '<div class="main">';
		// Box 1
		$html .= '<div class="widget-box">';
			$html .= '<ul class="license-manager-widget-list">';

				// Lizenz hinzufügen
				$html .= '<li class="license license-add">';
					$html .= '<span class="dashicons dashicons-plus"></span>';
					$html .= '<a href="post-new.php?post_type=license" title="'.__('Add new licence','the-license-manager').'" target="_self">'.__('add new licence','the-license-manager').'</a>';
				$html .= '</li>';
				
				// Kategorie
				$html .= '<li class="license license-categories">';
					$html .= '<span class="dashicons dashicons-list-view"></span>';
					$html .= '<a href="edit-tags.php?taxonomy=licence-projects&post_type=license" title="'.__('Projects','the-license-manager').'" target="_self">'.__('Projects','the-license-manager').'</a>';
				$html .= '</li>';

				// Lizenz Zähler
				$html .= '<li class="license license-count">';
					$html .= '<span class="dashicons dashicons-feedback"></span>';
					$html .= '<a href="edit.php?post_type=license" title="'.__('Licenses','the-license-manager').'" target="_self">'.$current_license_count.'&nbsp;'.__('license in total','the-license-manager').'</a>';
				$html .= '</li>';

				// Lizenz Keywords
				$html .= '<li class="license license-manage-tags">';
					$html .= '<span class="dashicons dashicons-tag"></span>';
					$html .= '<a href="edit-tags.php?taxonomy=usage-tag&post_type=license" title="'.__('Usage tags','the-license-manager').'" target="_self">'.__('Usage tags','the-license-manager').'</a>';
				$html .= '</li>';

				// Options
				$html .= '<li class="license-count">';
					$html .= '<span class="dashicons dashicons-admin-generic"></span>';
					$html .= '<a href="options-general.php?page=license-manager-options" title="'.__('Go to options','the-license-manager').'" target="_self">'.__('Options','the-license-manager').'</a>';
				$html .= '</li>';
			$html .= '</ul>';
		$html .= '</div>';
	$html .= '</div>';
	echo $html;
}