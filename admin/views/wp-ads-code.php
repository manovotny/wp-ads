<fieldset class="wp-ads-code-widget fields">
    <ul class="items">
        <li class="item">
            <label class="label" for="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>">Description</label>
            <input id="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>" class="control" name="<?php esc_attr_e( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; ?>" />
        </li>
        <li class="item">
            <label class="label" for="<?php esc_attr_e( $this->get_field_id( 'visibility' ) ); ?>">Visibility</label>
            <select id="<?php esc_attr_e( $this->get_field_id( 'visibility' ) ); ?>" class="control" name="<?php esc_attr_e( $this->get_field_name( 'visibility' ) ); ?>">
                <option value="both" <?php selected( 'both', $visibility ) ?>>Both</option>
                <option value="desktop" <?php selected( 'desktop', $visibility ) ?>>Desktop</option>
                <option value="mobile" <?php selected( 'mobile', $visibility ) ?>>Mobile</option>
            </select>
        </li>
        <li class="item">
            <label class="label" for="<?php esc_attr_e( $this->get_field_id( 'code' ) ); ?>">Code</label>
            <textarea id="<?php esc_attr_e( $this->get_field_id( 'code' ) ); ?>" class="control" rows="10" name="<?php esc_attr_e( $this->get_field_name( 'code' ) ); ?>"><?php echo $code; ?></textarea>
        </li>
    </ul>
</fieldset>