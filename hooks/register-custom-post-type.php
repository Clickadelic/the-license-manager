<?php

function license_manager_register_custom_post_type(){

$cpt_name = 'license';

// CPT Features 'title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', and 'post-formats'
$cpt_features = array('title');

$cpt_slug = 'licenses';

$labels = array(
	'name' 						=>	__('Licenses', 'the-license-manager'),
	'singular_name' 			=>	__('License', 'the-license-manager'),
	'menu_name'					=>	__('Licenses', 'the-license-manager'),
	'name_admin_bar'			=>	__('Licenses', 'the-license-manager'),
	'all_items'					=>	__('All licenses', 'the-license-manager'),
	'add_name'					=>	__('Add new license', 'the-license-manager'),
	'add_new_item'				=>	__('Add new license', 'the-license-manager'),
	'edit'						=>	__('Edit license', 'the-license-manager'),
	'edit_item'					=>	__('Edit license', 'the-license-manager'),
	'new_item'					=>	__('New license', 'the-license-manager'),
	'view'						=>	__('View licenses', 'the-license-manager'),
	'view_item'					=>	__('View license', 'the-license-manager'),
	'search_items'				=>	__('Search licenses', 'the-license-manager'),
	'parent'					=>	__('Parent license', 'the-license-manager'),
	'not_found'					=>	__('No licenses found', 'the-license-manager'),
	'not_found_in_trash'		=>	__('No licenses found in Trash', 'the-license-manager')
);

$args = array(
	'labels'				=>	$labels,
	'public'				=>	false,
	'publicly_queryable'	=>	false,
	'exclude_from_search'	=>	true,
	'show_in_nav_menus'		=>	true,
	'show_ui'				=>	true,
	'show_in_menu'			=>	true,
	'show_in_admin_bar'		=>	true,
	'menu_position'			=>	91,
	'menu_icon'				=>	'dashicons-info-outline',
	'can_export'			=>	true,
	'delete_with_user'		=>	false,
	'hierarchical'			=>	false,
	'has_archive'			=>	false,
	'query_var'				=>	true,
	'capability_type'		=>	'post',
	'map_meta_cap'			=>	true,
	'rewrite'				=>	array(
		'slug'		=> $cpt_slug,
		'with_front'=> true,
		'pages'		=> true,
		'feeds'		=> false
	),
	'supports'		=> $cpt_features
);

register_post_type($cpt_name, $args);
}

add_action('init', 'license_manager_register_custom_post_type');