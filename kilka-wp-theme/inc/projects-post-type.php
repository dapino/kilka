<?php
if ( ! function_exists('projects_post_type') ) {

	// Register Custom Post Type
	function projects_post_type() {

		$labels = array(
			'name'                  => _x( 'Proyectos', 'Post Type General Name', 'kilka' ),
			'singular_name'         => _x( 'proyecto', 'Post Type Singular Name', 'kilka' ),
			'menu_name'             => __( 'proyectos', 'kilka' ),
			'name_admin_bar'        => __( 'proyecto', 'kilka' ),
			'archives'              => __( 'Todos los proyectos', 'kilka' ),
			'attributes'            => __( 'proyecto Attributes', 'kilka' ),
			'parent_item_colon'     => __( 'Parent proyecto:', 'kilka' ),
			'all_items'             => __( 'All proyectos', 'kilka' ),
			'add_new_item'          => __( 'Añadir nuevo proyecto', 'kilka' ),
			'add_new'               => __( 'Añadir nuevo', 'kilka' ),
			'new_item'              => __( 'Nuevo proyecto', 'kilka' ),
			'edit_item'             => __( 'Editar proyecto', 'kilka' ),
			'update_item'           => __( 'Actualizar proyecto', 'kilka' ),
			'view_item'             => __( 'Ver proyecto', 'kilka' ),
			'view_items'            => __( 'Ver proyectos', 'kilka' ),
			'search_items'          => __( 'Search proyecto', 'kilka' ),
			'not_found'             => __( 'Not found', 'kilka' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'kilka' ),
			'featured_image'        => __( 'Featured Image', 'kilka' ),
			'set_featured_image'    => __( 'Set featured image', 'kilka' ),
			'remove_featured_image' => __( 'Remove featured image', 'kilka' ),
			'use_featured_image'    => __( 'Use as featured image', 'kilka' ),
			'insert_into_item'      => __( 'Insert into project', 'kilka' ),
			'uploaded_to_this_item' => __( 'Uploaded to this proyecto', 'kilka' ),
			'items_list'            => __( 'projects list', 'kilka' ),
			'items_list_navigation' => __( 'projects list navigation', 'kilka' ),
			'filter_items_list'     => __( 'Filter proyecto list', 'kilka' ),
		);
		$args = array(
			'label'                 => __( 'project', 'kilka' ),
			'description'           => __( 'projects post type', 'kilka' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-businessman',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'projects', $args );

	}
	add_action( 'init', 'projects_post_type', 0 );
}

