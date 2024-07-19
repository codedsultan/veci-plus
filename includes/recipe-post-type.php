<?php

/**
 * Register a custom post type called "recipe".
 *
 * @see get_post_type_labels() for label keys.
 */

 function vp_recipe_post_type() {
	$labels = array(
		'name'                  => _x( 'Recipes', 'Post type general name', 'veci-plus' ),
		'singular_name'         => _x( 'Recipe', 'Post type singular name', 'veci-plus' ),
		'menu_name'             => _x( 'Recipes', 'Admin Menu text', 'veci-plus' ),
		'name_admin_bar'        => _x( 'Recipe', 'Add New on Toolbar', 'veci-plus' ),
		'add_new'               => __( 'Add New', 'veci-plus' ),
		'add_new_item'          => __( 'Add New Recipe', 'veci-plus' ),
		'new_item'              => __( 'New Recipe', 'veci-plus' ),
		'edit_item'             => __( 'Edit Recipe', 'veci-plus' ),
		'view_item'             => __( 'View Recipe', 'veci-plus' ),
		'all_items'             => __( 'All Recipes', 'veci-plus' ),
		'search_items'          => __( 'Search Recipes', 'veci-plus' ),
		'parent_item_colon'     => __( 'Parent Recipes:', 'veci-plus' ),
		'not_found'             => __( 'No recipes found.', 'veci-plus' ),
		'not_found_in_trash'    => __( 'No recipes found in Trash.', 'veci-plus' ),
		'featured_image'        => _x( 'Recipe Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'veci-plus' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'veci-plus' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'veci-plus' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'veci-plus' ),
		'archives'              => _x( 'Recipe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'veci-plus' ),
		'insert_into_item'      => _x( 'Insert into recipe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'veci-plus' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this recipe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'veci-plus' ),
		'filter_items_list'     => _x( 'Filter recipes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'veci-plus' ),
		'items_list_navigation' => _x( 'Recipes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'veci-plus' ),
		'items_list'            => _x( 'Recipes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'veci-plus' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true, // means ?recipe=pizza could be ?anything=pizza
		'rewrite'            => array( 'slug' => 'recipe' ), //url path /recipe/pizza
		'capability_type'    => 'post', // inherit post capabilities
		'has_archive'        => true,
		'hierarchical'       => false, // 
		'menu_position'      => 20, //null, // position in dashboard
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ), //editor features
        'show_in_rest'       => true, //enable wordpress rest-api route,
        'description'        => __( 'A Custom Recipe Post Type', 'veci-plus' ),
        'taxonomies'         => ['category','post_tag'] //support category and tags
	);

	register_post_type( 'recipe', $args );
    // register custom taxonomy
    register_taxonomy( 'cuisine', 'recipe' , [
        'label' => __('Cuisine', 'veci-plus'),
        'rewrite' => ['slug' => 'cuisine'],
        'show_in_rest' => true
    ]);
    // register term meta
    register_term_meta('cuisine', 'more_info_url',[
        'type' => 'string' ,//for the url
        'description' => __('A URL for more information on a cuisine', 'veci-plus'),
        'single' => true,
        'show_in_rest' => true,
        'default' => '#'
    ]);
    
}
