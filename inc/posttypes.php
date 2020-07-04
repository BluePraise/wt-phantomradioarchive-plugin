<?php
/**
 * Register a new "Radio Post" post type.
 *
 * Called from phantomradio.php.
 *
 * @package  phantomradio
 * @link     https://developer.wordpress.org/plugins/post-types/registering-custom-post-types/
 */


/**
 * Register a custom post type called "Phantom Radio Post".
 *
 * @see get_post_type_labels() for label keys.
 */
 function phantomradio_cpt_init() {
    $labels = array(
        'name'                  => _x( 'Phantom Radio Posts', 'Post type general name', 'phantomradio' ),
        'singular_name'         => _x( 'Phantom Radio Post', 'Post type singular name', 'phantomradio' ),
        'menu_name'             => _x( 'Radio Posts', 'Admin Menu text', 'phantomradio' ),
        'name_admin_bar'        => _x( 'Radio Post', 'Add New on Toolbar', 'phantomradio' ),
        'add_new'               => __( 'Add New', 'phantomradio' ),
        'add_new_item'          => __( 'Add New Radio Post', 'phantomradio' ),
        'new_item'              => __( 'New Radio Post', 'phantomradio' ),
        'edit_item'             => __( 'Edit Radio Post', 'phantomradio' ),
        'view_item'             => __( 'View Radio Post', 'phantomradio' ),
        'all_items'             => __( 'All Phantom Radio Posts', 'phantomradio' ),
        'search_items'          => __( 'Search Phantom Radio Posts', 'phantomradio' ),
        'parent_item_colon'     => __( 'Parent Radio Posts:', 'phantomradio' ),
        'not_found'             => __( 'No Radio Posts found.', 'phantomradio' ),
        'not_found_in_trash'    => __( 'No Radio Posts found in Trash.', 'phantomradio' ),
        'featured_image'        => _x( 'Radio Post Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'phantomradio' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'phantomradio' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'phantomradio' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'phantomradio' ),
        'archives'              => _x( 'Radio Post archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'phantomradio' ),
        'insert_into_item'      => _x( 'Insert into Radio Post', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'phantomradio' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Radio Post', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'phantomradio' ),
        'filter_items_list'     => _x( 'Filter Radio Posts list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'phantomradio' ),
        'items_list_navigation' => _x( 'Radio Posts list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'phantomradio' ),
        'items_list'            => _x( 'Radio Posts list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'phantomradio' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'radioposts' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-exerpt-view',
        'show_in_rest'       => true,
        'rest_base'          => 'radioposts',
        'supports'           => array( 'title', 'editor', 'author' ),
        'map_meta_cap'       => true,
    );

    register_post_type( 'Phantom Radio Post', $args );
}

add_action( 'init', 'phantomradio_cpt_init' );


function phantomradio_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry,
    // when you add a post of this CPT.
    phantomradio_cpt_init();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}