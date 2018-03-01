<?php
    // This function registers the Events custom post type for the WordPress Dashboard. register_post_type is a WordPress helper method that allows you to customize the post type. This file is inside the mu-plugins folder rather than the theme folder so that the user will not lose their custom post content if they switch to another theme.
    function university_post_types() {

        // Event Post Type
        register_post_type('event', array(
            'supports' => array('title', 'editor', 'excerpt'),
            'rewrite' => array('slug' => 'events'),
            'has_archive' => true,
            'public' => true,
            'menu_icon' => 'dashicons-calendar',
            'labels' => array(
                'name' => 'Events',
                'add_new_item' => 'Add New Event',
                'edit_item' => 'Edit Event',
                'all_items' => 'All Events',
                'singular_name' => 'Event'
                )
            )
        );

        // Program Post Type
        register_post_type('program', array(
            'supports' => array('title', 'editor'),
            'rewrite' => array('slug' => 'programs'),
            'has_archive' => true,
            'public' => true,
            'menu_icon' => 'dashicons-awards',
            'labels' => array(
                'name' => 'Programs',
                'add_new_item' => 'Add New Program',
                'edit_item' => 'Edit Program',
                'all_items' => 'All Programs',
                'singular_name' => 'Program'
                )
            )
        );
    }

    add_action('init', 'university_post_types');
?>