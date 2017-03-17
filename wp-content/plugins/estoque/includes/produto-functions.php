<?php

/**
 * Get all produto
 *
 * @param $args array
 *
 * @return array
 */
function test_get_all_produto( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'id',
        'order'      => 'ASC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'produto-all';
    $items     = wp_cache_get( $cache_key, 'wedevs' );

    if ( false === $items ) {
        $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'estoqueproduto ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

        wp_cache_set( $cache_key, $items, 'wedevs' );
    }

    return $items;
}

/**
 * Fetch all produto from database
 *
 * @return array
 */
function test_get_produto_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'estoqueproduto' );
}

/**
 * Fetch a single produto from database
 *
 * @param int   $id
 *
 * @return array
 */
function test_get_produto( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'estoqueproduto WHERE id = %d', $id ) );
}

/**
 * Insert a new produto
 *
 * @param array $args
 */
function test_insert_produto( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'nome' => '',
        'descricao' => '',
        'preco' => '',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'estoqueproduto';

    // some basic validation
    if ( empty( $args['nome'] ) ) {
        return new WP_Error( 'no-nome', __( 'No Poduto provided.', 'wedevs' ) );
    }
    if ( empty( $args['descricao'] ) ) {
        return new WP_Error( 'no-descricao', __( 'No Descrição provided.', 'wedevs' ) );
    }
    if ( empty( $args['preco'] ) ) {
        return new WP_Error( 'no-preco', __( 'No Preço provided.', 'wedevs' ) );
    }

    // remove row id to determine if new or update
    $row_id = (int) $args['id'];
    unset( $args['id'] );

    if ( ! $row_id ) {

        $args['date'] = current_time( 'mysql' );

        // insert a new
        if ( $wpdb->insert( $table_name, $args ) ) {
            return $wpdb->insert_id;
        }

    } else {

        // do update method here
        if ( $wpdb->update( $table_name, $args, array( 'id' => $row_id ) ) ) {
            return $row_id;
        }
    }

    return false;
}