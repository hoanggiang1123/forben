<?php 

class Ben_Related_Post_And_Slider_Opt{
	public function __construct(){
		add_action('add_meta_boxes', array($this,'create'), 10,2);
		add_action('save_post', array($this,'kc_save_espisode'));
	}

	public function create(){
		add_meta_box('releate_post_and_slider_fields', 'Related Post And Slider Opt' , array($this,'display'), 'post', 'side', 'high');
	}

	public function display(){
        global $post;
        $related_post_fields = get_post_meta($post->ID, 'related_post_fields', true);
        $slider_shortcode_fields = get_post_meta($post->ID, 'slider_shortcode_fields',true);
        
        wp_nonce_field('releate_post_and_slider_fields', 'releate_post_and_slider_fields');
        ?>
        
        <div class="realted-post">
            <div class="select-related">
                <div class="related-title">
                    <h4>Hiển Thị Tin Liên Quan</h4>
                </div>
                <div class="related-opt">
                    <input type="radio" name="related_post_fields" value="yes" <?php echo ($related_post_fields == 'yes' ? 'checked':'');?>> <span style="margin-right:20px;">Yes</span>
                    <input type="radio" name="related_post_fields" value="no" <?php echo ($related_post_fields == 'no' ? 'checked':'');?>> <span>No</span>
                </div>
            </div>
            <div class="slider-shortcode">
                <div class="slider-title">
                    <h4>Hiển Thị Slider</h4>
                </div>
                <div class="slider-shortcode-text">
                    <input type="text" name="slider_shortcode_fields" placeholder="Nhập mã Shortcode" value="<?php echo ( $slider_shortcode_fields != '' ? $slider_shortcode_fields: '');?>">
                </div>
            </div>
        </div>
    <?php
	}

	public function kc_save_espisode($post_id){
		if (!isset($_POST['releate_post_and_slider_fields']) || !wp_verify_nonce($_POST['releate_post_and_slider_fields'], 'releate_post_and_slider_fields')) return;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if (!current_user_can('edit_post', $post_id)) return;

        $related_post_fields = $_POST['related_post_fields'];

        update_post_meta($post_id,'related_post_fields',$related_post_fields);

        $value = get_post_meta($post->ID, 'slider_shortcode_fields',true);
        $slider_shortcode_fields = $_POST['slider_shortcode_fields'];
        if($slider_shortcode_fields != '') {
            update_post_meta($post_id,'slider_shortcode_fields',$slider_shortcode_fields);
        } else {
            delete_post_meta($post_id,'slider_shortcode_fields', $value);
        }

	}

}