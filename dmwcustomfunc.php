<?php

/*
Plugin Name: DMW Custom Functions
Plugin URI: http://digitalmyway.co.uk
Description: Just a simple plugin containing any functionality that should be kept when a theme is changed. It's all about data portability!
Version: 0.1
Author: Martin Young
Author URI: http://digitalmyway.co.uk
License: GPL2
*/

/////*****  Custom Post Type    *****/////

function dmw_cpt_init() {
  $labels = array(
    'name' => 'CPT',
    'singular_name' => 'CPT',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New CPT',
    'edit_item' => 'Edit CPT',
    'new_item' => 'New CPT',
    'all_items' => 'All CPT',
    'view_item' => 'View CPT',
    'search_items' => 'Search CPT',
    'not_found' =>  'No CPTs found',
    'not_found_in_trash' => 'No CPTs found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'CPT'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'cpt' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
  ); 

  register_post_type( 'dmwcpt', $args );
}
add_action( 'init', 'dmw_cpt_init' );


/////*****   Custom Taxonomies   *****/////

//hook into the init action and call dmw_taxonomy_init when it fires
add_action( 'init', 'dmw_taxonomy_init', 0 );

//create a 'league' taxonomy
function dmw_taxonomy_init() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Taxonomy' ),
    'singular_name' => _x( 'Taxonomy'),
    'search_items' =>  __( 'Search Taxonomies' ),
    'all_items' => __( 'All Taxonomies' ),
    'parent_item' => __( 'Parent Taxonomy' ),
    'parent_item_colon' => __( 'Parent Taxonomy:' ),
    'edit_item' => __( 'Edit Taxonomy' ), 
    'update_item' => __( 'Update Taxonomy' ),
    'add_new_item' => __( 'Add New Taxonomy' ),
    'new_item_name' => __( 'New Taxonomy Name' ),
    'menu_name' => __( 'Taxonomy' ),
  ); 	

  register_taxonomy('dmwtaxonomy','cpt'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'taxonomy' ),
  ));

}
?>