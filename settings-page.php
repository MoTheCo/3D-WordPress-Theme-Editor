<div class="wrap">
    <h1>3D Theme Editor</h1>
    <form method="post" action="options.php">
        <?php settings_fields('custom_threejs_texts_options_group'); ?>
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Seitentitle</th>
            <td><input type="text" name="threejs_main_title" value="<?php echo esc_attr(get_option('threejs_main_title')); ?>" /></td>
            </tr>
             
            <tr valign="top">
            <th scope="row">Feld 1 Title</th>
            <td><input type="text" name="threejs_field1_title" value="<?php echo esc_attr(get_option('threejs_field1_title')); ?>" /></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Feld 2 Title</th>
            <td><input type="text" name="threejs_field2_title" value="<?php echo esc_attr(get_option('threejs_field2_title')); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Feld 3 Title</th>
            <td><input type="text" name="threejs_field3_title" value="<?php echo esc_attr(get_option('threejs_field3_title')); ?>" /></td>
            </tr>

        <tr valign="top">
            <th scope="row">Iframe title-1</th>
            <td><input type="text" name="threejs_iframe1_title" value="<?php echo esc_attr(get_option('threejs_iframe1_title')); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Iframe title-2</th>
            <td><input type="text" name="threejs_iframe2_title" value="<?php echo esc_attr(get_option('threejs_iframe2_title')); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Iframe title-3</th>
            <td><input type="text" name="threejs_iframe3_title" value="<?php echo esc_attr(get_option('threejs_iframe3_title')); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Iframe URL-1</th>
            <td><input type="text" name="threejs_iframe1_url" value="<?php echo esc_attr(get_option('threejs_iframe1_url')); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Iframe URL-2</th>
            <td><input type="text" name="threejs_iframe2_url" value="<?php echo esc_attr(get_option('threejs_iframe2_url')); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Iframe URL-3</th>
            <td><input type="text" name="threejs_iframe3_url" value="<?php echo esc_attr(get_option('threejs_iframe3_url')); ?>" /></td>
            </tr>
        </table>
        
        <?php submit_button(); ?>
    </form>
</div>
