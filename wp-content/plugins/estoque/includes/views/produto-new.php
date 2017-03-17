<div class="wrap">
    <h1><?php _e( 'Produtos', 'wedevs' ); ?></h1>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-nome">
                    <th scope="row">
                        <label for="nome"><?php _e( 'Poduto', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="nome" id="nome" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-descricao">
                    <th scope="row">
                        <label for="descricao"><?php _e( 'Descrição', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <textarea name="descricao" id="descricao"placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" rows="5" cols="30" required="required"></textarea>
                    </td>
                </tr>
                <tr class="row-preco">
                    <th scope="row">
                        <label for="preco"><?php _e( 'Preço', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="preco" id="preco" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="0">

        <?php wp_nonce_field( 'produto-new' ); ?>
        <?php submit_button( __( 'Adicionar Produtos', 'wedevs' ), 'primary', 'submit_produto' ); ?>

    </form>
</div>