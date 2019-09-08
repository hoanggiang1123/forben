<?php

class Category_Meta {

    public function __construct()
    {
        add_action( 'category_add_form_fields', array ( $this, 'taxonomy_add_form_fields' ), 10, 2 );
        add_action( 'created_category', array ( $this, 'save_category_fields' ), 10, 2 );
        add_action( 'category_edit_form_fields', array ( $this, 'update_category_fields' ), 10, 2 );
        add_action( 'edited_category', array ( $this, 'updated_category_fields' ), 10, 2 );
    }

    public function taxonomy_add_form_fields() {
        ?>
            <div class="form-field">
                <label for="category_slider_shortcode"><?php _e( 'Slider ShortCode', 'bentheme' ); ?></label>
                <input type="text" name="category_slider_shortcode" id="category_slider_shortcode" value="">
                <p class="description"><?php _e( 'Nhập Slider ShortCode','bentheme' ); ?></p>
            </div>
        <?php
    }

    public function save_category_fields($term_id, $tt_id ) {
        $shortcode = $_POST['category_slider_shortcode'];
        $val = get_term_meta($term_id, 'category_slider_shortcode', true);
        if($shortcode != '') {
            add_term_meta( $term_id, 'category_slider_shortcode', $shortcode, true );
        } else {
            if($val != '') {
                delete_term_meta($term_id, 'category_slider_shortcode',$val);
            }
        }
    }

    public function update_category_fields($term, $taxonomy) {
        $category_slider_shortcode = get_term_meta($term ->term_id,'category_slider_shortcode',true);
        ?>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="category_slider_shortcode"><?php _e( 'Slider ShortCode', 'bentheme' ); ?></label></th>
                    <td>
                        <input type="text" name="category_slider_shortcode" id="category_slider_shortcode" value="<?php 
                        echo ($category_slider_shortcode ? esc_attr( $category_slider_shortcode ) : ''); ?>">
                        <p class="description"><?php _e( 'Nhập Slider ShortCode','bentheme'); ?></p>
                    </td>
            </tr>
        <?php
    }

    public function updated_category_fields($term_id, $tt_id) {

        $shortcode = $_POST['category_slider_shortcode'];
        $val = get_term_meta($term_id, 'category_slider_shortcode', true);
        if($shortcode != '') {
            add_term_meta( $term_id, 'category_slider_shortcode', $shortcode, true );
        } else {
            if($val != '') {
                delete_term_meta($term_id, 'category_slider_shortcode',$val);
            }
        }
    }

}