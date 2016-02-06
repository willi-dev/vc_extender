<?php
/**
 * Dahz Framework
 * df_vc_extender-shortcode.php
 * Class: vc_extender_shortcode
 * Description: class for render vc extender shortcode
 */
class vc_extender_shortcode {

	function __construct() {

		add_shortcode( 'df_block_1', array($this, 'render_df_block_1') );

		add_shortcode('df_block_img', array($this, 'render_df_block_img') );

	}

	public function render_df_block_1( $atts, $content = null ){
		extract( shortcode_atts(array(
				'foo' => 'something in the way',
				'color' => '#FF0000'
			), $atts) 
		);
		$content = wpb_js_remove_wpautop($content, true); 

		$output = "<div style='background-color: {$color};' data-foo='{$foo}'>{$content}</div>";
		return $output;
	}

	public function render_df_block_img( $atts, $content = null ) {
		$atts = vc_map_get_attributes( 'df_block_img', $atts );
		extract( $atts );
			$img_id = preg_replace('/[^\d]/', '', $image);
		$img_size = "full";
		$atts = array('class' => 'img-responsive center-block');

		$img = wp_get_attachment_image($img_id, $img_size, false, $atts);
		// print_r($atts);
		$output = '<div class="row"><div class="col-md-6">'.$img.'</div></div>';
		return $output;
	}

}