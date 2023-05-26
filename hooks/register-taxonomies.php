<?php

function license_manager_register_license_projects() {

	$cpt_name = 'license';
	$cpt_slug = 'license-projects';

	$labels = array(
		'name'						=>	__('Projects', 'the-license-manager'),
		'singular_name'				=>	__('Project', 'the-license-manager'),
		'search_items'				=>	__('Search projects', 'the-license-manager'),
		'popular_items'				=>	__('Popular projects', 'the-license-manager'),
		'all_items'					=>	__('All projects', 'the-license-manager'),
		'parent_item'				=>	null,
		'parent_item_colon'			=>	null,
		'edit_item'					=>	__('Edit project', 'the-license-manager'),
		'update_item'				=>	__('Update project', 'the-license-manager'),
		'add_new_item'				=>	__('Add New project', 'the-license-manager'),
		'new_item_name'				=>	__('New project','the-license-manager'),
		'separate_items_with_commas'=>	__('Separate projects', 'the-license-manager'),
		'add_or_remove_items'		=>	__('Add or remove projects', 'the-license-manager'),
		'choose_from_most_used'		=>	__('Choose from most used projects', 'the-license-manager'),
		'not_found'					=>	__('No projects found', 'the-license-manager'),
		'not_found__in_trash'		=>	__('No projects found in trash', 'the-license-manager'),
		'menu_name'					=>	__('Projects', 'the-license-manager')
	);	

	$args = array(
		'hierarchical'				=>	true,
		'labels'					=>	$labels,
		'show_ui'					=>	true,
		'show_admin_column'			=>	true,
		'update_count_callback'		=>	'_update_post_term_count',
		'query_var'					=>	true,
		'rewrite'					=> array(
			'slug'	=> 	$cpt_slug
		)
	);

	register_taxonomy($cpt_slug, $cpt_name, $args);
}
add_action('init', 'license_manager_register_license_projects');

function license_manager_register_taxonomy_usage_tag() {
	$cpt_name = 'license';
	$cpt_slug = 'usage-tag';

	$labels = array(
		'name'						=>	__('Usage tags', 'the-license-manager'),
		'singular_name'				=>	__('Usage tag', 'the-license-manager'),
		'search_items'				=>	__('Search usage tags', 'the-license-manager'),
		'popular_items'				=>	__('Popular usage tags', 'the-license-manager'),
		'all_items'					=>	__('All usage tags', 'the-license-manager'),
		'parent_item'				=>	null,
		'parent_item_colon'			=>	null,
		'edit_item'					=>	__('Edit usage tags','the-license-manager'),
		'update_item'				=>	__('Update usage tags', 'the-license-manager'),
		'add_new_item'				=>	__('Add New usage tags', 'the-license-manager'),
		'new_item_name'				=>	__('New usage tags', 'the-license-manager'),
		'separate_items_with_commas'=>	__('Separate usage tags', 'the-license-manager'),
		'add_or_remove_items'		=>	__('Add or remove usage tags', 'the-license-manager'),
		'choose_from_most_used'		=>	__('Choose from most used usage tags', 'the-license-manager'),
		'not_found'					=>	__('No usage tags found', 'the-license-manager'),
		'menu_name'					=>	__('Usage tags', 'the-license-manager')
	);

	$args = array(
		'hierarchical'				=>	false,
		'labels'					=>	$labels,
		'show_ui'					=>	true,
		'show_admin_column'			=>	true,
		'update_count_callback'		=>	'_update_post_term_count',
		'query_var'					=>	true,
		'rewrite'					=> array(
			'slug'	=> 	$cpt_slug
		)
	);
	register_taxonomy($cpt_slug, $cpt_name, $args);
}
add_action('init', 'license_manager_register_taxonomy_usage_tag');