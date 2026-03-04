<?php
/**
 * Plugin Name: Mill Creek Custom Post Types
 * Plugin URI: https://github.com/tschappaugh/mill-creek-bakery-wp
 * Description: Custom post types for Mill Creek Bakery
 * Version: 1.0.0
 * Author: Tony Schappaugh
 * Author URI: https://tonyschappaugh.com
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mill_creek_register_post_types() {
    register_post_type( 'bread', array(
        'labels' => array(
            'name'               => 'Breads',
            'singular_name'      => 'Bread',
            'add_new_item'       => 'Add New Bread',
            'edit_item'          => 'Edit Bread',
            'view_item'          => 'View Bread',
            'all_items'          => 'All Breads',
            'search_items'       => 'Search Breads',
            'not_found'          => 'No breads found',
        ),
        'public'              => true,
        'has_archive'         => true,
        'show_in_rest'        => true,
        'show_in_graphql'     => true,
        'graphql_single_name' => 'bread',
        'graphql_plural_name' => 'breads',
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'menu_icon'           => 'dashicons-food',
        'rewrite'             => array( 'slug' => 'breads' ),
    ) );
}
add_action( 'init', 'mill_creek_register_post_types' );

function mill_creek_register_taxonomies() {
    register_taxonomy( 'bread_category', 'bread', array(
        'labels' => array(
            'name'              => 'Bread Categories',
            'singular_name'     => 'Bread Category',
            'add_new_item'      => 'Add New Bread Category',
            'edit_item'         => 'Edit Bread Category',
            'search_items'      => 'Search Bread Categories',
            'all_items'         => 'All Bread Categories',
            'not_found'         => 'No bread categories found',
        ),
        'hierarchical'        => true,
        'public'              => true,
        'show_in_rest'        => true,
        'show_in_graphql'     => true,
        'graphql_single_name' => 'breadCategory',
        'graphql_plural_name' => 'breadCategories',
        'rewrite'             => array( 'slug' => 'bread-category' ),
    ) );
}
add_action( 'init', 'mill_creek_register_taxonomies' );