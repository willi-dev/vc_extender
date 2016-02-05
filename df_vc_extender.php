<?php
/**
 * Dahz Framework
 * Class: vc_extender
 * Description: extender for visual composer wordpress plugin
 */

class vc_extender {

	/**
	 * __construct()
	 */
	function __construct() {
		add_action( 'vc_before_init', array( $this, 'df_block' ) );

		add_shortcode( 'df_block_1', array($this, 'render_df_block_1') );

		add_action( 'vc_before_init', array( $this, 'df_add_image') );

		add_shortcode('df_block_img', array($this, 'render_df_block_img') );

		if( function_exists( 'vc_manager' ) ) {
			vc_manager()->disableUpdater( true );
		}
	}

	function df_block(){
		vc_map( 
			array(
			    "name" => __("Block Grid 1", "vc_extender"), // add a name
            	"description" => __("Bar tag description text", 'vc_extender'),
            	"category" => "Block",
			    "base" => "df_block_1", // bind with our shortcode
			    "content_element" => true, // set this parameter when element will has a content
			    "is_container" => true, // set this param when you need to add a content element in this element
			    // Here starts the definition of array with parameters of our compnent
			   	
			    "params" => array(
			        array(
			            "type" => "textfield", // it will bind a textfield in WP
			            "holder" => "div",
						"class" => "",
						"heading" => __("Text", 'vc_extender'),
						"param_name" => "foo",
						"value" => __("Default params value", 'vc_extender'),
						"description" => __("Description for foo param.", 'vc_extender')
			        ),
			        array(
						"type" => "colorpicker",
						"holder" => "div",
						"class" => "",
						"heading" => __("Text color", 'vc_extender'),
						"param_name" => "color",
						"value" => '#FF0000', //Default Red color
						"description" => __("Choose text color", 'vc_extender')
		            ),
		            array(
						"type" => "textarea_html",
						"holder" => "div",
						"class" => "",
						"heading" => __("Content", 'vc_extender'),
						"param_name" => "content",
						"value" => __("<p>I am test text block. Click edit button to change this text.</p>", 'vc_extend'),
						"description" => __("Enter your content.", 'vc_extender')
					)
			    ),
			   
			) 
		);
	}

	function df_add_image() {
		vc_map(
			array(
				"name" => __("Block Add Image", "vc_extender"),
				"description" => __("Bar tag description text", 'vc_extender'),
            	"category" => "Block",
			    "base" => "df_block_img", 
			    "content_element" => true, 
			    "is_container" => true, 
			    "params" => array(
			    		array(
			    			"type" => "attach_image",
			    			"holder" => "div",
			    			"class" => "",
			    			"heading" => __("Text", "vc_extender"),
			    			"description" => __("description for attach image"), 
			    			"param_name" => "df_block_img"
			    		)
			    	)
			)
		);
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
		extract( shortcode_atts(array(
				'df_block_img' => ''
			), $atts)
		);
		$content = wpb_js_remove_wpautop($content, true);
		$output = "<div style=''><img src='{$df_block_img}'></div>";
		return $output;
	}

}

// This function provides a functionality of adding content elements into element
// class WPBakeryShortCode_SC_Slide extends WPBakeryShortCodesContainer {}

/* location: [theme directory]/core/vc_extender/df_vc_extender.php */