<div class="wrap">
    <h1><?php _e( 'Adicionar Cliente', 'wedevs' ); ?></h1>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-nome">
                    <th scope="row">
                        <label for="nome"><?php _e( 'Nome', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="nome" id="nome" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-email">
                    <th scope="row">
                        <label for="email"><?php _e( 'E-mail', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="email" id="email" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" />
                    </td>
                </tr>
                <tr class="row-telefone">
                    <th scope="row">
                        <label for="telefone"><?php _e( 'Telefone', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="telefone" id="telefone" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="0">

        <?php wp_nonce_field( 'cliente-novo' ); ?>
        <?php submit_button( __( 'Adicionar Cliente', 'wedevs' ), 'primary', 'submit_cliente' ); ?>

    </form>
</div>