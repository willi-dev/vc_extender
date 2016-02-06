<?php
/**
 * Dahz Framework
 * df_vc_extender.php
 * Class: vc_extender
 * Description: extender for visual composer wordpress plugin
 */

define("VC_EXTENDER_CATEGORY", "by Dahz Themes");


class vc_extender {

	// $array_of_type = array();
	var $array_of_function = array();

	/**
	 * __construct()
	 */
	function __construct() {
		add_action( 'init', array( $this, 'df_block' ) );
		add_action( 'init', array( $this, 'df_add_image') );
		add_action( 'init', array( $this, 'df_posts_grid') );
	}

	function df_block(){
		vc_map( 
			array(
			    "name" => __("Block Grid 1", "vc_extender"), // add a name
            	"description" => __("Bar tag description text", 'vc_extender'),
            	"category" => VC_EXTENDER_CATEGORY,
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
            	"category" => VC_EXTENDER_CATEGORY,
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
			    			"param_name" => "image"
			    		)
			    	)
			)
		);
	}

	function df_posts_grid() {
		vc_map(
			array(
				"name" => __("Posts Grid", "vc_extender"),
				"description" => __("Display your posts in grid view", "vc_extender"),
				"category" => VC_EXTENDER_CATEGORY,
				"base" => "df_posts_grid",
				"content_element" => true,
				"is_container" => true,
				"params" => array(
						array(
							"type" => "dropdown",
							"heading" => "Style", 
							"param_name" => "style",
							"admin_label" => "style",
							"value" => array(
								"style 1" => "style 1",
								"style 2" => "style 2",
								"style 3" => "style 3"
							),
							"description" => "Changes the layouts style of the grid"
						),array(
							"type" => "dropdown",
							"heading" => "Post Source",
							"param_name" => "source",
							"value" => array(
								"Most Recent" => "most-recent",
								"By Category" => "by-category",
								"By Post ID" => "by-id",
								"By Tag" => "by-tag",
								"By Author" => "by-author"
							),
							"std" => "most-recent",
							"admin_label" => true,
							"description" => "Select the source of the posts"
						)
				)
			)
		);
	}

	
}
// shortcode vc_extender
require_once('df_vc_extender-shortcode.php');
new vc_extender_shortcode();
/* location: [theme directory]/core/vc_extender/df_vc_extender.php */