<?php

if ( ! function_exists('edumela_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function edumela_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'edumela' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'edumela' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'edumela' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'edumela' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'edumela' ),
                'add_new_item'       => __( 'Add New Portfolio', 'edumela' ),
                'new_item'           => __( 'New Portfolio', 'edumela' ),
                'edit_item'          => __( 'Edit Portfolio', 'edumela' ),
                'view_item'          => __( 'View Portfolio', 'edumela' ),
                'all_items'          => __( 'All Portfolio', 'edumela' ),
                'search_items'       => __( 'Search Portfolio', 'edumela' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'edumela' ),
                'not_found'          => __( 'No Portfolio found.', 'edumela' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'edumela' )
            ),

            'description'        => __( 'Description.', 'edumela' ),
            'menu_icon'          => 'dashicons-layout',
            'public'             => true,
            'show_in_menu'       => true,
            'has_archive'        => false,
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        ));

        // portfolio taxonomy
        register_taxonomy(
            'portfolio_category',
            'portfolio',
            array(
                'labels' => array(
                    'name' => __( 'Portfolio Category', 'edumela' ),
                    'add_new_item'      => __( 'Add New Category', 'edumela' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));
    }

    add_action( 'init', 'edumela_custom_post_type' );

}