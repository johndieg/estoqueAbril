<?php

/**
 * Get all cliente
 *
 * @param $args array
 *
 * @return array
 */
function test_get_all_cliente( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'id',
        'order'      => 'ASC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'cliente-all';
    $items     = wp_cache_get( $cache_key, 'wedevs' );

    if ( false === $items ) {
        $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'estoquecliente ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

        wp_cache_set( $cache_key, $items, 'wedevs' );
    }

    return $items;
}

/**
 * Fetch all cliente from database
 *
 * @return array
 */
function test_get_cliente_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'estoquecliente' );
}

/**
 * Fetch a single cliente from database
 *
 * @param int   $id
 *
 * @return array
 */
function test_get_cliente( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'estoquecliente WHERE id = %d', $id ) );
}

/**
 * Insert a new cliente
 *
 * @param array $args
 */
function test_insert_cliente( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'nome' => '',
        'email' => '',
        'telefone' => '',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'estoquecliente';

    // some basic validation
    if ( empty( $args['nome'] ) ) {
        return new WP_Error( 'no-nome', __( 'No Nome provided.', 'wedevs' ) );
    }
    if ( empty( $args['telefone'] ) ) {
        return new WP_Error( 'no-telefone', __( 'No Telefone provided.', 'wedevs' ) );
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