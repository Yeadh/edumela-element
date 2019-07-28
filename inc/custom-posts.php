<?php

if ( ! function_exists('edumela_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function edumela_custom_post_type() {

        //event
        register_post_type(
            'event', array(
            'labels'                 => array(
                'name'               => _x( 'event', 'post type general name', 'edumela' ),
                'singular_name'      => _x( 'event', 'post type singular name', 'edumela' ),
                'menu_name'          => _x( 'event', 'admin menu', 'edumela' ),
                'name_admin_bar'     => _x( 'event', 'add new on admin bar', 'edumela' ),
                'add_new'            => _x( 'Add New', 'event', 'edumela' ),
                'add_new_item'       => __( 'Add New event', 'edumela' ),
                'new_item'           => __( 'New event', 'edumela' ),
                'edit_item'          => __( 'Edit event', 'edumela' ),
                'view_item'          => __( 'View event', 'edumela' ),
                'all_items'          => __( 'All event', 'edumela' ),
                'search_items'       => __( 'Search event', 'edumela' ),
                'parent_item_colon'  => __( 'Parent event:', 'edumela' ),
                'not_found'          => __( 'No event found.', 'edumela' ),
                'not_found_in_trash' => __( 'No event found in Trash.', 'edumela' )
            ),

            'description'        => __( 'Description.', 'edumela' ),
            'menu_icon'          => 'dashicons-layout',
            'public'             => true,
            'show_in_menu'       => true,
            'has_archive'        => false,
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' => 'event' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        ));
    }

    add_action( 'init', 'edumela_custom_post_type' );

}