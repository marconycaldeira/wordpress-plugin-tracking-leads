<div class="wrap">
    <h1>Optima Tracking Lead</h1>

    <form method="post" action="options.php">
        <?php settings_fields('my-cool-plugin-settings-group'); ?>
        <?php do_settings_sections('my-cool-plugin-settings-group'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Parâmetro de URL da campanha</th>
                <td><input type="text" name="otl_url_parameter" value="<?php echo esc_attr(get_option('otl_url_parameter')); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row">ID do input a ser populado</th>
                <td><input type="text" name="otl_id_input_hidden" value="<?php echo esc_attr(get_option('otl_id_input_hidden')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Slug das páginas contendo os formulários</th>
                <td><input type="text" name="otl_slug_pages_to_be_apply" value="<?php echo esc_attr(get_option('otl_slug_pages_to_be_apply')); ?>" /> <br />
                <small>Digite os Slugs's separando-os por vírgula</small>    
            </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>