<?php

function license_manager_register_custom_post_type(){

$cpt_name = 'license';

// CPT Features 'title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', and 'post-formats'
$cpt_features = array('title');

$cpt_slug = 'licenses';

$labels = array(
	'name' 						=>	__('Licences', 'the-license-manager'),
	'singular_name' 			=>	__('Licence', 'the-license-manager'),
	'menu_name'					=>	__('Licences', 'the-license-manager'),
	'name_admin_bar'			=>	__('Licences', 'the-license-manager'),
	'all_items'					=>	__('All licences', 'the-license-manager'),
	'add_name'					=>	__('Add new licence', 'the-license-manager'),
	'add_new_item'				=>	__('Add new licence', 'the-license-manager'),
	'edit'						=>	__('Edit licence', 'the-license-manager'),
	'edit_item'					=>	__('Edit licence', 'the-license-manager'),
	'new_item'					=>	__('New licence', 'the-license-manager'),
	'view'						=>	__('View licences', 'the-license-manager'),
	'view_item'					=>	__('View licence', 'the-license-manager'),
	'search_items'				=>	__('Search licences', 'the-license-manager'),
	'parent'					=>	__('Parent licence', 'the-license-manager'),
	'not_found'					=>	__('No licences found', 'the-license-manager'),
	'not_found_in_trash'		=>	__('No licences found in Trash', 'the-license-manager')
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