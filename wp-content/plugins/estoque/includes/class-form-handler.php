<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form' ) );
    }

    /**
     * Handle the produto new and edit form
     *
     * @return void
     */
    public function handle_form() {
        if ( ! isset( $_POST['submit_produto'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'produto-new' ) ) {
            die( __( 'Are you cheating?', 'wedevs' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'wedevs' ) );
        }

        $errors   = array();
        $page_url = admin_url( 'admin.php?page=produto' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;

        $nome = isset( $_POST['nome'] ) ? sanitize_text_field( $_POST['nome'] ) : '';
        $descricao = isset( $_POST['descricao'] ) ? wp_kses_post( $_POST['descricao'] ) : '';
        $preco = isset( $_POST['preco'] ) ? sanitize_text_field( $_POST['preco'] ) : '';

        // some basic validation
        if ( ! $nome ) {
            $errors[] = __( 'Error: Poduto is required', 'wedevs' );
        }

        if ( ! $descricao ) {
            $errors[] = __( 'Error: Descrição is required', 'wedevs' );
        }

        if ( ! $preco ) {
            $errors[] = __( 'Error: Preço is required', 'wedevs' );
        }

        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            wp_safe_redirect( $redirect_to );
            exit;
        }

        $fields = array(
            'nome' => $nome,
            'descricao' => $descricao,
            'preco' => $preco,
        );

        // New or edit?
        if ( ! $field_id ) {

            $insert_id = test_insert_produto( $fields );

        } else {

            $fields['id'] = $field_id;

            $insert_id = test_insert_produto( $fields );
        }

        if ( is_wp_error( $insert_id ) ) {
            $redirect_to = add_query_arg( array( 'message' => 'error' ), $page_url );
        } else {
            $redirect_to = add_query_arg( array( 'message' => 'success' ), $page_url );
        }

        wp_safe_redirect( $redirect_to );
        exit;
    }
}

new Form_Handler();