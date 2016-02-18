<?php
/**
 * Dahz Framework
 * df_vc_extender.php
 * Class: df_vc_extender
 * Description: extender for visual composer wordpress plugin
 */

require_once('df_vc_extender-shortcode.php');

define("VC_EXTENDER_CATEGORY", "by Dahz Themes");
define("VC_EXTENDER_GROUP_GENERAL", "General");
define("VC_EXTENDER_GROUP_FILTER", "Filter");

class df_vc_extender {

	private $params_map = array();
	private $params_block = array();
	private $extender_shortcode;

	/**
	 * __construct()
	 */
	function __construct() {
		// set param of vc_map()
		$this->df_set_params_map();
		
		add_action( 'init', array( $this, 'df_mapping_block') );
		
		add_action( 'vc_after_init', array( $this, 'df_disable_frontend_link') );

		$extender_shortcode = new df_vc_extender_shortcode( $this->params_map );

	}

	/**
	 * df_disable_frontend_link
	 * @param - 
	 * @return -
	 */
	function df_disable_frontend_link(){
		vc_disable_frontend();
	}

	/**
	 * df_set_params_map()
	 * function for set params of vc_map() function 
	 */
	function df_set_params_map(){
		$this->params_map = array(
				"df block 1" => array(
									"name" => "posts block 1",
									"description" => "description for posts block 1",
									"base" => "df_posts_block_1",
									"params" => $this->df_set_params_block("post_block")
								),
				"df_block 2" => array(
									"name" => "posts block 2",
									"description" => "description for posts block 2",
									"base" => "df_posts_block_2",
									"params" => $this->df_set_params_block("post_block")
								),
				"df block 3" => array(
									"name" => "posts block 3",
									"description" => "description for posts block 3",
									"base" => "df_posts_block_3",
									"params" => $this->df_set_params_block("post_block")
								),
				"df block 4" => array(
									"name" => "posts block 4",
									"description" => "description for posts block 4",
									"base" => "df_posts_block_4",
									"params" => $this->df_set_params_block("post_block")
								),
				"df author box" => array(
									"name" => "Authors Box",
									"description" => "Display Authors",
									"base" => "df_authors_box",
									"params" => $this->df_set_params_block("authors_box")
								),
				"df audio embed" => array(
									"name" => "Audio",
									"description" => "Embed Audio (ex: from soundcloud.com)",
									"base" => "df_audio_embed",
									"params" => $this->df_set_params_block("audio_embed")
								),
				"df video post" => array(
									"name" => "Video Post Format",
									"description" => "Video from video post format",
									"base" => "df_video_post",
									"params" => $this->df_set_params_block("video_post")
								)
				
				); // end of array

	}

	/**
	 * df_mapping_block()
	 * function for create block using vc_map()
	 */
	function df_mapping_block(){
		// loop $params_map, call vc_map() 
		foreach ($this->params_map as $aom) {
			extract($aom);
			$this->df_vc_map_block($name, $description, $base, $params);
		}
	}

	/**
	 * df_vc_map_block()
	 * @param $name_block
	 * @param $desc_block
	 * @param $base_block
	 * @param $params
	 * function call for vc_map()
	 */
	function df_vc_map_block($name_block, $desc_block, $base_block, $params){
		vc_map(
			array(
				"name" => __($name_block, "df_vc_extender"),
				"description" => __($desc_block, "df_vc_extender"),
				"category" => VC_EXTENDER_CATEGORY,
				"base" => $base_block,
				"content_element" => true,
				"params" => $params
			)
		);
	}

	/**
	 * df_render_categories()	
	 * @return list checkboxes of categories
	 */
	function df_render_categories(){
		$blog_categories = get_categories();
		$out = array();
		foreach($blog_categories as $category) {
			$out[$category->name] = $category->cat_ID;
		}
		return $out;
	}


	/**
	 * df_set_params_block()
	 * @param $block_type
	 * function for set params of "params" vc_map()
	 */
	function df_set_params_block($block_type){
		if( ($block_type == 'post_block') || ($block_type == 'video_post') ){
			$this->params_block = array(
							array(
								"type" => "textfield",
								"heading" => "Custom Title", 
								"value" => "Block Title",
								"param_name" => "title",
								"admin_label" => true,
								"description" => "Optional, a title for this block",
								"group" => VC_EXTENDER_GROUP_GENERAL
							),
							array(
								"type" => "textfield",
								"heading" => "Title Url",
								"param_name" => "title_url",
								"admin_label" => true,
								"description" => "Optional, a custom url when block title is clicked",
								"group" => VC_EXTENDER_GROUP_GENERAL
							),
							array(
								"type" => "colorpicker",
								"heading" => "Title Text Color",
								"param_name" => "title_text_color",
								"admin_label" => true,
								"description" => "Optional, choose custom text color for block title",
								"group" => VC_EXTENDER_GROUP_GENERAL
							),
							array(
								"type" => "colorpicker",
								"heading" => "Title Background Color",
								"param_name" => "title_bg_color",
								"admin_label" => true,
								"description" => "Optional, choose custom background color for block title",
								"group" => VC_EXTENDER_GROUP_GENERAL
							),
							array(
								"type" => "textfield",
								"heading" => "Limit Post Number",
								"param_name" => "limit_post_number",
								"admin_label" => true,
								"value" => 5, // default value
								"description" => "If empty, number of posts will be the number from Wordpress Settings -> Reading",
								"group" => VC_EXTENDER_GROUP_GENERAL
							),
							array(
								"type" => "textfield",
								"heading" => "Offset",
								"param_name" => "offset",
								"admin_label" => true,
								"value" => '', // default value
								"description" => "You can offset your post with the number of posts entered in this setting",
								"group" => VC_EXTENDER_GROUP_GENERAL
							),
							array(
								"type" => "dropdown",
								"heading" => "Post Source",
								"param_name" => "source",
								"value" => array(
									"Most Recent" => "most-recent",
									"By Category" => "by-category",
									"By Post ID" => "by-post-id",
									"By Tag" => "by-tag",
									"By Author" => "by-author"
								),
								"std" => "most-recent",
								"admin_label" => true,
								"description" => "Select the source of the posts",
								"group" => VC_EXTENDER_GROUP_FILTER
							),
							// checkboxes categories filter
							array(
								"type" => "checkbox",
								"heading" => "Posts Categories",
								"param_name" => "categories",
								"value" => $this->df_render_categories(),
								"description" => "Which categories would you like to show?",
								"dependency" => array("element" => "source", "value" => array('by-category')),
								"group" => VC_EXTENDER_GROUP_FILTER
							),
							// textfield Post IDs filter
							array(
								"type" => "textfield",
								"heading" => "Post IDs",
								"param_name" => "post_ids",
								"description" => "Enter the post IDs you would like to display (separated by comma)",
								"dependency" => array("element" => "source", "value" => array('by-post-id')),
								"group" => VC_EXTENDER_GROUP_FILTER
							),
							// textfield Tag slug filter
							array(
								"type" => "textfield",
								"heading" => "Tag Slugs",
								"param_name" => "tag_slugs",
								"description" => "Enter the tag slugs you would like to display (separated by comma)", 
								"dependency" => array("element" => "source", "value" => array('by-tag')),
								"group" => VC_EXTENDER_GROUP_FILTER
							),
							// textfield Author IDs filter
							array(
								"type" => "textfield",
								"heading" => "Author IDs",
								"param_name" => "author_ids",
								"description" => "Enter the Author IDs you would like to display (separated by comma)",
								"dependency" => array("element" => "source", "value" => array('by-author')),
								"group" => VC_EXTENDER_GROUP_FILTER
							),
							array(
								"type" => "dropdown",
								"heading" => "Sort Order",
								"param_name" => "sort_order",
								"value" => array(
										"Latest" => "sort-latest",
										"Random Posts Today" => "sort-random-today",
										"Random Posts from Last 7 day" => "sort-random-7day",
										"Alphabetical" => "sort-alphabetical",
										"Popular" => "sort-popular"
									),
								"std" => "sort-latest",
								"admin_label" => true,
								"description" => "Select Sort Order",
								"group" => VC_EXTENDER_GROUP_FILTER
							)
					);
		}else if( $block_type == 'authors_box' ){
			$this->params_block = array(
							array(
								"type" => "textfield",
								"heading" => "Custom Title", 
								"value" => "Block Title",
								"param_name" => "title",
								"admin_label" => true,
								"description" => "Optional, a title for this block"
							),
							array(
								"type" => "textfield",
								"heading" => "Title Url",
								"param_name" => "title_url",
								"admin_label" => true,
								"description" => "Optional, a custom url when block title is clicked"
							),
							array(
								"type" => "dropdown",
								"heading" => "Sort by",
								"param_name" => "sort",
								"value" => array(
									"Sort by Name" => "by-name",
									"Sort by Post Count" => "by-post-count"
								),
								"std" => "by-name",
								"admin_label" => true,
								"description" => "Sorting Author"
							),
							array(
								"type" => "textfield",
								"heading" => "Exclude Authors",
								"param_name" => "exclude_author_ids",
								"description" => "Enter the Author IDs you would like to exclude (separated by comma)"
							),
							array(
								"type" => "textfield",
								"heading" => "Include Authors",
								"param_name" => "include_author_ids",
								"description" => "Enter the Author IDs you would like to include (separated by comma) (do not use with exclude)"
							),
							array(
								"type" => "colorpicker",
								"heading" => "Title Text Color",
								"param_name" => "title_text_color",
								"admin_label" => true,
								"description" => "Optional, choose custom text color for block title"
							),
							array(
								"type" => "colorpicker",
								"heading" => "Title Background Color",
								"param_name" => "title_bg_color",
								"admin_label" => true,
								"description" => "Optional, choose custom background color for block title"
							),

					);
		}/*else if( $block_type == "video_post" ){
			$this->params_block = array(
							array(
								"type" => "textfield",
								"heading" => "Custom Title", 
								"param_name" => "title",
								"value" => "Block Title",
								"admin_label" => true,
								"description" => "Optional, a title for this block"
							),
							array(
								"type" => "dropdown",
								"heading" => "Source",
								"param_name" => "source",
								"value" => array(
									"Youtube" => "youtube",
									"Vimeo" => "vimeo"
								),
								"std" => "youtube",
								"admin_label" => true,
								"description" => "Video source"
							),
							array(
								"type" => "textfield",
								"heading" => "Youtube URL",
								"param_name" => "youtube_url",
								"description" => "Enter Youtube URL Video (ex: https://www.youtube.com/watch?v=94venkIkodU)",
								"dependency" => array("element" => "source", "value" => array('youtube')),
							),
							array(
								"type" => "textfield",
								"heading" => "Vimeo URL",
								"param_name" => "vimeo_url",
								"description" => "Enter Vimeo URL Video (ex: https://vimeo.com/38416914)",
								"dependency" => array("element" => "source", "value" => array('vimeo')),
							),
							array(
								"type" => "colorpicker",
								"heading" => "Title Text Color",
								"param_name" => "title_text_color",
								"admin_label" => true,
								"description" => "Optional, choose custom text color for block title"
							),
							array(
								"type" => "colorpicker",
								"heading" => "Title Background Color",
								"param_name" => "title_bg_color",
								"admin_label" => true,
								"description" => "Optional, choose custom background color for block title"
							)

					);
		}*/else if( $block_type == "audio_embed" ){
			$this->params_block = array(
							array(
								"type" => "textfield",
								"heading" => "Custom Title", 
								"param_name" => "title",
								"value" => "Block Title",
								"admin_label" => true,
								"description" => "Optional, a title for this block"
							),
							array(
								"type" => "textfield",
								"heading" => "Audio URL",
								"admin_label" => true,
								"param_name" => "audio_url",
								"description" => "Enter URL Audio (ex: https://soundcloud.com/alice_noise/deltaapokalips)"
							),
							array(
								"type" => "colorpicker",
								"heading" => "Title Text Color",
								"param_name" => "title_text_color",
								"admin_label" => true,
								"description" => "Optional, choose custom text color for block title"
							),
							array(
								"type" => "colorpicker",
								"heading" => "Title Background Color",
								"param_name" => "title_bg_color",
								"admin_label" => true,
								"description" => "Optional, choose custom background color for block title"
							)
					);
		}
		return $this->params_block;
	}

}

new df_vc_extender();

/* file location: [theme directory]/inc/vc_extender/df_vc_extender.php */