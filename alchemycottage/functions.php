<?php

/**
 * Copyright (C) 2026 Alchemy Cottage
 *
 * This file is part of the Alchemy Cottage theme.
 *
 * The Alchemy Cottage theme is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */


function alchemycottage_theme_support()
{
    add_theme_support('title-tag') ;
    add_theme_support('custom-logo') ;
    add_theme_support('post-thumbnails') ;
}

add_action('after_setup_theme', 'alchemycottage_theme_support') ;


function alchemycottage_menus()
{
    $locations = array('primary' => "Header Menu Items", 'footer' => "Footer Menu Items") ;

    register_nav_menus($locations) ;
}

add_action('init', 'alchemycottage_menus') ;


function alchemycottage_register_styles()
{
    $version = wp_get_theme()->get('Version') ;

    wp_enqueue_style('alchemycottage-css', get_template_directory_uri() . "/style.css", array('alchemycottage-bootstrap-css'), $version, 'all') ;
    wp_enqueue_style('alchemycottage-bootstrap-css', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), '4.1.3', 'all') ;
}

add_action('wp_enqueue_scripts', 'alchemycottage_register_styles') ;


function alchemycottage_register_scripts()
{
    wp_enqueue_script('alchemycottage-js', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true) ;
    wp_enqueue_script('alchemycottage-bootstrap-js', get_template_directory_uri() . "/assets/js/bootstrap.bundle.min.js", array('jquery'), null, true) ;
}

add_action('wp_enqueue_scripts', 'alchemycottage_register_scripts') ;










// Individual review
function alchemycottage_review_comment( $comment, $args, $depth ) {
    ?>
    <li <?php comment_class( 'border rounded p-4 mb-3' ); ?> id="comment-<?php comment_ID(); ?>">
        <div class="d-flex justify-content-between flex-wrap">
            <h3 class="h5 mb-1"><?php echo esc_html( get_comment_author() ); ?></h3>
            <span class="text-warning" aria-label="Five out of five stars">★★★★★</span>
        </div>

        <p class="small text-muted">
            <?php echo esc_html( get_comment_date() ); ?>
        </p>

        <div class="mb-0">
            <?php comment_text(); ?>
        </div>
    </li>
    <?php
}








// Register a private post type for contact messages
add_action( 'init', function () {
    register_post_type( 'contact_message', array(
        'labels'       => array(
            'name'          => 'Messages',
            'singular_name' => 'Message',
        ),
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-email',
        'supports'     => array( 'title', 'editor' ),
        'capabilities' => array( 'create_posts' => 'do_not_allow' ),
        'map_meta_cap' => true,
    ) );
} );

// Handle the contact form for logged-in and logged-out visitors
add_action( 'admin_post_alchemy_contact', 'alchemy_handle_contact' );
add_action( 'admin_post_nopriv_alchemy_contact', 'alchemy_handle_contact' );

function alchemy_handle_contact() {
    $redirect = remove_query_arg( 'sent', wp_get_referer() ?: home_url( '/contact/' ) );

    // Security check
    if ( ! isset( $_POST['alchemy_contact_nonce'] ) ||
         ! wp_verify_nonce( $_POST['alchemy_contact_nonce'], 'alchemy_contact_form' ) ) {
        wp_safe_redirect( add_query_arg( 'sent', '0', $redirect ) );
        exit;
    }

    // Honeypot: real visitors leave this hidden field empty, bots often fill it
    if ( ! empty( $_POST['website'] ) ) {
        wp_safe_redirect( add_query_arg( 'sent', '1', $redirect ) );
        exit;
    }

    $name    = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
    $email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
    $key     = sanitize_key( $_POST['subject'] ?? '' );

    $topics = array(
        'custom-order'    => 'Custom order',
        'recipe-question' => 'Recipe question',
        'other'           => 'Something else',
    );
    $topic = $topics[ $key ] ?? 'Not specified';

    if ( ! $name || ! is_email( $email ) || ! $message ) {
        wp_safe_redirect( add_query_arg( 'sent', '0', $redirect ) );
        exit;
    }

    $content = "From: {$name} <{$email}>\nTopic: {$topic}\n\n{$message}";

    $post_id = wp_insert_post( array(
        'post_type'    => 'contact_message',
        'post_status'  => 'private',
        'post_title'   => "{$topic} from {$name}",
        'post_content' => $content,
    ) );

    if ( $post_id && ! is_wp_error( $post_id ) ) {
        wp_mail(
            get_option( 'admin_email' ),
            "New contact message: {$topic}",
            $content,
            array( "Reply-To: {$name} <{$email}>" )
        );
    }

    wp_safe_redirect( add_query_arg( 'sent', $post_id ? '1' : '0', $redirect ) );
    exit;
}













// Create Recipes admin panel settings
function alchemycottage_register_content_types() {
    register_post_type( 'recipe', array(
        'labels' => array(
            'name'          => 'Recipes',
            'singular_name' => 'Recipe',
            'add_new_item'  => 'Add New Recipe',
            'edit_item'     => 'Edit Recipe',
        ),
        'public'       => true,
        'has_archive'  => 'recipes',
	'show_in_nav_menus'	=> true,
        'rewrite'      => array( 'slug' => 'recipes' ),
        'show_in_rest' => true,
        'taxonomies'   => array( 'category' ),
        'supports'     => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'comments',
        ),
        'menu_icon'    => 'dashicons-carrot',
    ) );
}
add_action( 'init', 'alchemycottage_register_content_types' );




// Add recipe fields to the recipe editor.
add_action( 'add_meta_boxes_recipe', 'alchemycottage_add_recipe_details_box' );

function alchemycottage_add_recipe_details_box() {
    add_meta_box(
        'alchemycottage_recipe_details',
        'Recipe Details',
        'alchemycottage_render_recipe_details_box',
        'recipe',
        'normal',
        'high'
    );
}


function alchemycottage_render_recipe_details_box( $post ) {
    wp_nonce_field(
        'alchemycottage_save_recipe_details',
        'alchemycottage_recipe_details_nonce'
    );

    $fields = array(
        '_recipe_prep_time'  => array( 'Prep time', 'text' ),
        '_recipe_bake_time'  => array( 'Bake time', 'text' ),
        '_recipe_yield'      => array( 'Makes / yield', 'text' ),
        '_recipe_chill_time' => array( 'Chill time', 'text' ),
        '_recipe_total_time' => array( 'Total time', 'text' ),
        '_recipe_storage'    => array( 'Storage', 'textarea' ),
        '_recipe_bakers_note'=> array( 'Baker’s note', 'textarea' ),
        '_recipe_ingredients'=> array( 'Ingredients — one per line', 'textarea' ),
        '_recipe_method'     => array( 'Method — one step per line', 'textarea' ),
    );

    foreach ( $fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );

        echo '<p><label for="' . esc_attr( $key ) . '"><strong>'
            . esc_html( $field[0] )
            . '</strong></label><br>';

        if ( 'textarea' === $field[1] ) {
            echo '<textarea class="widefat" rows="4" id="' . esc_attr( $key )
                . '" name="' . esc_attr( $key ) . '">'
                . esc_textarea( $value )
                . '</textarea>';
        } else {
            echo '<input class="widefat" type="text" id="' . esc_attr( $key )
                . '" name="' . esc_attr( $key ) . '" value="'
                . esc_attr( $value ) . '">';
        }

        echo '</p>';
    }
}

// Save recipe admin entry creation fields.
add_action( 'save_post_recipe', 'alchemycottage_save_recipe_details', 10, 2 );

function alchemycottage_save_recipe_details( $post_id, $post ) {
    if (
        ! isset( $_POST['alchemycottage_recipe_details_nonce'] ) ||
        ! wp_verify_nonce(
            sanitize_text_field( wp_unslash( $_POST['alchemycottage_recipe_details_nonce'] ) ),
            'alchemycottage_save_recipe_details'
        )
    ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $keys = array(
        '_recipe_prep_time',
        '_recipe_bake_time',
        '_recipe_yield',
        '_recipe_chill_time',
        '_recipe_total_time',
        '_recipe_storage',
        '_recipe_bakers_note',
        '_recipe_ingredients',
        '_recipe_method',
    );

    foreach ( $keys as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta(
                $post_id,
                $key,
                sanitize_textarea_field( wp_unslash( $_POST[ $key ] ) )
            );
        }
    }
}














// Add custom fields to Products > Product data > General.
add_action( 'woocommerce_product_options_general_product_data', function () {
    woocommerce_wp_textarea_input( array(
        'id'          => '_ingredients',
        'label'       => 'Ingredients',
        'description' => 'Enter the ingredients for this product.',
        'desc_tip'    => true,
    ) );

    woocommerce_wp_textarea_input( array(
        'id'          => '_allergen_details',
        'label'       => 'Allergen details',
        'description' => 'Enter verified allergen information.',
        'desc_tip'    => true,
    ) );

    woocommerce_wp_textarea_input( array(
        'id'          => '_product_details',
        'label'       => 'Additional product details',
        'description' => 'For example, storage or preparation notes.',
        'desc_tip'    => true,
    ) );

    woocommerce_wp_text_input( array(
        'id'                => '_products_per_pack',
        'label'             => 'Items per pack',
        'type'              => 'number',
        'custom_attributes' => array( 'min' => '1', 'step' => '1' ),
        'description'       => 'For example, 6 cookies per pack. This is not inventory stock.',
        'desc_tip'          => true,
    ) );
} );

// Save the custom fields with the product.
add_action( 'woocommerce_process_product_meta', function ( $post_id ) {
    $product = wc_get_product( $post_id );

    if ( ! $product ) {
        return;
    }

    foreach ( array( '_ingredients', '_allergen_details', '_product_details' ) as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            $product->update_meta_data(
                $key,
                sanitize_textarea_field( wp_unslash( $_POST[ $key ] ) )
            );
        }
    }

    if ( isset( $_POST['_products_per_pack'] ) ) {
        $product->update_meta_data(
            '_products_per_pack',
            absint( wp_unslash( $_POST['_products_per_pack'] ) )
        );
    }

    $product->save_meta_data();
} );




// Add an optional recipe selector to the product's General tab.
add_action( 'woocommerce_product_options_general_product_data', function () {
    $recipes = get_posts( array(
        'post_type'      => 'recipe',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );

    $options = array(
        '' => '— No recipe —',
    );

    foreach ( $recipes as $recipe ) {
        $options[ $recipe->ID ] = $recipe->post_title;
    }

    woocommerce_wp_select( array(
        'id'          => '_linked_recipe_id',
        'label'       => 'Recipe page',
        'options'     => $options,
        'description' => 'Optionally select a recipe to link from this product.',
        'desc_tip'    => true,
    ) );
} );

// Save the selected recipe ID.
add_action( 'woocommerce_process_product_meta', function ( $post_id ) {
    if ( ! isset( $_POST['_linked_recipe_id'] ) ) {
        return;
    }

    $recipe_id = absint( wp_unslash( $_POST['_linked_recipe_id'] ) );

    if (
        $recipe_id &&
        'recipe' === get_post_type( $recipe_id ) &&
        'publish' === get_post_status( $recipe_id )
    ) {
        update_post_meta( $post_id, '_linked_recipe_id', $recipe_id );
    } else {
        delete_post_meta( $post_id, '_linked_recipe_id' );
    }
} );












// Custom quantity label and button CSS for 'Add to Card' on Product pages
add_action( 'woocommerce_before_add_to_cart_quantity', function () {
    global $product;

    if ( $product ) {
        printf(
            '<label class="product-quantity-label" for="quantity_%d">%s</label>',
            esc_attr( $product->get_id() ),
            esc_html__( 'Quantity', 'alchemycottage' )
        );
    }
} );

// Get rid of coupons section in Cart page
add_filter( 'woocommerce_coupons_enabled', function ( $enabled ) {
    return is_cart() ? false : $enabled;
} );
















// PHP end
?>
