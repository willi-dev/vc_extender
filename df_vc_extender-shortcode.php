<?php
/**
 * Dahz Framework
 * df_vc_extender-shortcode.php
 * Class: vc_extender_shortcode
 * Description: class for render vc extender shortcode
 */

class df_vc_extender_shortcode {

	// private $array_map_shortcode = array();
	/**
	 * __construct()
	 */
	function __construct() {
		if(!function_exists('vc_map_get_attributes')){
			return;
		}else{
			// add_shortcode( 'df_block_1', array($this, 'render_df_block_1') );
			// add_shortcode( 'df_block_img', array($this, 'render_df_block_img') );

			add_shortcode('df_posts_block_1', array($this, 'df_posts_block_1'));
		}
	}

	function df_posts_block_1( $atts, $content = null ){
		$atts = vc_map_get_attributes( 'df_posts_block_1', $atts );
		extract( $atts );

		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1
		);
		// if offset not null
		if( $offset ){
			$args = wp_parse_args(
				array(
					'offset' => $offset
				)
			, $args);
		}

		if( $source == 'most-recent' ){ // if source most-recent
			$args = wp_parse_args(
				array(
					'posts_per_page' => $limit_post_number
				)
			, $args);
		}else if( $source == 'by-category' ){ // if source by-category
			if(!empty($categories)){
				$cats = explode(',',$categories);
				$args = wp_parse_args(
					array(
						'posts_per_page' => $limit_post_number, 
						'category__in' => $cats
					)
				, $args);
			}
		}else if( $source == 'by-post-id' ){ // if source by-post-id
			$posts = explode(',', $post_ids);

			$args = wp_parse_args(
				array(
					'post__in' => $posts,
					'posts_per_page' => $limit_post_number,
					'orderby' => 'post__in'
				)
			, $args);
		}else if( $source == 'by-tag' ){ // if source by-tag
			$tags = explode(',', $tag_slugs);

			$args = wp_parse_args(
				array(
					'posts_per_page' => $limit_post_number,
					'tag_slug__in' => $tags
				)
			, $args);
		}else if( $source == 'by-author' ){ // if source by-author
			$authors = explode(',', $author_ids);

			$args = wp_parse_args(
				array(
					'posts_per_page' => $limit_post_number,
					'author__in' => $authors
				)
			, $args);
		}

		$posts = query_posts( $args );

		ob_start();

		if( have_posts() ) { ?>
			
			<div class="row posts">
				
				<?php 
				while( have_posts() ) : the_post(); 

				// content here

				endwhile;
				?>

			</div>

		<?php
		}
		$out = ob_get_contents();
		if (ob_get_contents()) ob_end_clean();
		wp_reset_query();
		wp_reset_postdata();

		return $out;
	}

	// public function render_df_block_1( $atts, $content = null ){
	// 	extract( shortcode_atts(array(
	// 			'foo' => 'something in the way',
	// 			'color' => '#FF0000'
	// 		), $atts) 
	// 	);
	// 	$content = wpb_js_remove_wpautop($content, true); 

	// 	$output = "<div style='background-color: {$color};' data-foo='{$foo}'>{$content}</div>";
	// 	return $output;
	// }

	// public function render_df_block_img( $atts, $content = null ) {
	// 	// pindahkan ke __construct() ?
	// 	// if(!function_exists('vc_map_get_attributes')){
	// 	// 	return;
	// 	// } 

	// 	$atts = vc_map_get_attributes( 'df_block_img', $atts );
	// 	extract( $atts );
	// 		$img_id = preg_replace('/[^\d]/', '', $image);
	// 	$img_size = "full";
	// 	$atts = array('class' => 'img-responsive center-block');

	// 	$img = wp_get_attachment_image($img_id, $img_size, false, $atts);
	// 	// print_r($atts);
	// 	$output = '<div class="row"><div class="col-md-6">'.$img.'</div></div>';
	// 	return $output;
	// }

}