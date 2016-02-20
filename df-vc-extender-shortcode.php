<?php
/**
 * Dahz Framework
 * df_vc_extender-shortcode.php
 * Class: vc_extender_shortcode
 * Description: class for render vc extender shortcode
 */

class DF_VC_Extender_Shortcode {

	/**
	 * __construct()
	 */
	function __construct( $array_map ) {
		if(!function_exists( 'vc_map_get_attributes' )){
			return;
		}else{
			$array_map_block = $array_map;

			foreach ( $array_map_block as $amb) {
				extract( $amb );
				add_shortcode( $base, array( $this , $base ) );
			}
		}
	}

	/**
	 * df_posts_block_1
	 * render shortcode output to frontend for posts block 1
	 */
	function df_posts_block_1( $atts, $content = null ){
		$atts = vc_map_get_attributes( 'df_posts_block_1', $atts );
		extract($atts);
		$args = $this->df_vc_atts_to_args( $atts, $sort_order );
		$posts = new WP_Query( $args );

		ob_start();
		
		$title_text_color = ( isset($title_text_color) ) ? $title_text_color : ''; 
		( $title == 'Block Title' ) ? $title = '' : $title ;
		?>
		<div class="df-vc-title-block" style="color:<?php echo $title_text_color;?> ;">
			<?php echo $title;?>
		</div>
		<?php
		if( $posts->have_posts() ) { ?>
		<div class="row posts">
		<?php while( $posts->have_posts() ) : $posts->the_post(); ?>
				<div class="col-md-3">
					<?php if (has_post_thumbnail() ) { ?>
						<figure class="df-post-thumbnail">
							<a href="<?php the_permalink();?>" title="<?php the_title();?>" rel="bookmark">
								<?php the_post_thumbnail('post-thumbnail', array('itemprop' => 'image', 'class' => 'img-responsive')); ?>
							</a>
						</figure>
					<?php } ?>	
						<header class="post-title entry-header">
							<?php the_title('<h5 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h5>'); ?>
						</header>
						<!-- <div class="post-content entry-content small">
							<?php //echo the_content(); ?>
						</div> -->
				</div>
				
			<?php endwhile;?>
		</div>	
		<?php
		}
		$out = ob_get_contents();
		if (ob_get_contents()) ob_end_clean();
		wp_reset_query();
		wp_reset_postdata();
		return $out;
	}

	/**
	 * df_posts_block_2
	 * render shortcode output to frontend for posts block 2
	 */
	function df_posts_block_2( $atts, $content = null ){
		$atts = vc_map_get_attributes( 'df_posts_block_2', $atts );
		extract($atts);
		$args = $this->df_vc_atts_to_args( $atts, $sort_order );
		// $posts = query_posts( $args );
		$posts = new WP_Query( $args );

		ob_start();
		
		$title_text_color = ( isset($title_text_color) ) ? $title_text_color : ''; 
		( $title == 'Block Title' ) ? $title = '' : $title ;
		?>
		<div class="df-vc-title-block" style="color:<?php echo $title_text_color;?> ;">
			<?php echo $title;?>
		</div>
		<?php
		if( $posts->have_posts() ) { ?>
		<div class="row posts">
		<?php while( $posts->have_posts() ) : $posts->the_post(); ?>
				<div class="col-md-3">
					<?php if (has_post_thumbnail() ) { ?>
						<figure class="df-post-thumbnail">
							<a href="<?php the_permalink();?>" title="<?php the_title();?>" rel="bookmark">
								<?php the_post_thumbnail('post-thumbnail', array('itemprop' => 'image', 'class' => 'img-responsive')); ?>
							</a>
						</figure>
					<?php } ?>	
						<header class="post-title entry-header">
							<?php the_title('<h5 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h5>'); ?>
						</header>
						<!-- <div class="post-content entry-content small">
							<?php //echo the_content(); ?>
						</div> -->
				</div>
				
			<?php endwhile;?>
		</div>	
		<?php
		}
		$out = ob_get_contents();
		if (ob_get_contents()) ob_end_clean();
		wp_reset_query();
		wp_reset_postdata();
		return $out;
	}

	/**
	 * df_posts_block_3
	 * render shortcode output to frontend for posts block 3
	 */
	function df_posts_block_3( $atts, $content = null ){
		$atts = vc_map_get_attributes( 'df_posts_block_3', $atts );
		extract($atts);
		$args = $this->df_vc_atts_to_args( $atts, $sort_order );
		// $posts = query_posts( $args );
		$posts = new WP_Query( $args );

		ob_start();
		
		$title_text_color = ( isset($title_text_color) ) ? $title_text_color : ''; 
		( $title == 'Block Title' ) ? $title = '' : $title ;
		?>
		<div class="df-vc-title-block" style="color:<?php echo $title_text_color;?> ;">
			<?php echo $title;?>
		</div>
		<?php
		if( $posts->have_posts() ) { ?>
		<div class="row posts">
		<?php while( $posts->have_posts() ) : $posts->the_post(); ?>
				<div class="col-md-3">
					<?php if (has_post_thumbnail() ) { ?>
						<figure class="df-post-thumbnail">
							<a href="<?php the_permalink();?>" title="<?php the_title();?>" rel="bookmark">
								<?php the_post_thumbnail('post-thumbnail', array('itemprop' => 'image', 'class' => 'img-responsive')); ?>
							</a>
						</figure>
					<?php } ?>	
						<header class="post-title entry-header">
							<?php the_title('<h5 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h5>'); ?>
						</header>
						<!-- <div class="post-content entry-content small">
							<?php //echo the_content(); ?>
						</div> -->
				</div>
				
			<?php endwhile;?>
		</div>	
		<?php
		}
		$out = ob_get_contents();
		if (ob_get_contents()) ob_end_clean();
		wp_reset_query();
		wp_reset_postdata();
		return $out;
	}

	/**
	 * df_posts_block_4
	 * render shortcode output to frontend for posts block 4
	 */
	function df_posts_block_4( $atts, $content = null ){
		$atts = vc_map_get_attributes( 'df_posts_block_4', $atts );
		extract($atts);
		$args = $this->df_vc_atts_to_args( $atts, $sort_order );
		// $posts = query_posts( $args );
		$posts = new WP_Query( $args );

		ob_start();
		
		$title_text_color = ( isset($title_text_color) ) ? $title_text_color : ''; 
		( $title == 'Block Title' ) ? $title = '' : $title ;
		?>
		<div class="df-vc-title-block" style="color:<?php echo $title_text_color;?> ;">
			<?php echo $title;?>
		</div>
		<?php
		if( $posts->have_posts() ) { ?>
		<div class="row posts">
		<?php while( $posts->have_posts() ) : $posts->the_post(); ?>
				<div class="col-md-3">
					<?php if (has_post_thumbnail() ) { ?>
						<figure class="df-post-thumbnail">
							<a href="<?php the_permalink();?>" title="<?php the_title();?>" rel="bookmark">
								<?php the_post_thumbnail('post-thumbnail', array('itemprop' => 'image', 'class' => 'img-responsive')); ?>
							</a>
						</figure>
					<?php } ?>	
						<header class="post-title entry-header">
							<?php the_title('<h5 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h5>'); ?>
						</header>
						<!-- <div class="post-content entry-content small">
							<?php //echo the_content(); ?>
						</div> -->
				</div>
				
			<?php endwhile;?>
		</div>	
		<?php
		}
		$out = ob_get_contents();
		if (ob_get_contents()) ob_end_clean();
		wp_reset_query();
		wp_reset_postdata();
		return $out;
	}

	/**
	 * df_authors_box
	 * render shortcode output to frontend for posts block 4
	 */
	function df_authors_box( $atts, $content = null ){
		$atts = vc_map_get_attributes( 'df_authors_box', $atts );
		extract( $atts );

		// set default params
		$args = array(
				'order' => 'ASC',
				'optioncount' => true,
				'exclude_admin' => false,
				'html' => true,
				'style' => 'none'
			);
		if( $sort == 'by-name' ){
			$args = wp_parse_args(
				array(
					'orderby' => 'name'
				)
			, $args);
		}else{
			$args = wp_parse_args(
				array(
					'orderby' => 'post_count'
				)
			, $args);
		}
		if( !empty($exclude_author_ids) ){
			$ex = explode(',', $exclude_author_ids);

			$args = wp_parse_args(
				array(
					'exclude' => $ex
				)
			, $args);
		}else if( !empty($include_author_ids) ){
			$in = explode(',', $include_author_ids);

			$args = wp_parse_args(
				array(
					'include' => $in
				)
			, $args);
		}
		ob_start();
		
		$title_text_color = ( isset($title_text_color) ) ? $title_text_color : '';

		?>
		
		<div class="df-vc-title-block" style="color:<?php echo $title_text_color;?> ;">
			<?php echo $title;?>
		</div>
		<?php
			$authors = wp_list_authors( $args );
			print_r($authors);
		$out = ob_get_contents();

		if (ob_get_contents()) ob_end_clean();
		wp_reset_query();
		wp_reset_postdata();

		return $out;
	}

	/**
	 * df_video_embed
	 * render shortcode output to frontend for video content
	 */
	function df_video_post( $atts, $content = null ){
		$atts = vc_map_get_attributes( 'df_video_post', $atts );
		extract( $atts );
		$post_format = 'post-format-video';

		$args = $this->df_vc_atts_to_args( $atts, $sort_order );

		// tax_query params for get only video post format 
		$args = wp_parse_args(
			array(
				'tax_query' => array(
						array(
							'taxonomy' => 'post_format',
							'field' => 'slug',
							'terms' => array( $post_format )
						)
					)
			)
		, $args);

		// $posts = query_posts( $args );
		$posts = new WP_Query( $args );
		$vid = '';

		ob_start();

		$title_text_color = ( isset($title_text_color) ) ? $title_text_color : '';
		( $title == 'Block Title' ) ? $title = '' : $title ;
		?>

		<div class="df-vc-title-block" style="color:<?php echo $title_text_color;?> ;">
			<?php echo $title;?>
		</div>

		<?php
		if( $posts->have_posts() ) { ?>
		<div class="row posts">

		<?php while( $posts->have_posts() ) : $posts->the_post();

			$content = apply_filters( 'the_content', get_the_content() ) ;
			// print_r($content);

    		$embeds = get_media_embedded_in_content( $content ); // contain iframe output video
    		// print_r($embeds);

    		// extract first url
    		// $reg = preg_match('|^\s*(https?://[^\s"]+)\s*$|im', get_the_content(), $matches);
    		// $vid_url = $matches[0];
    		// end here
		?>
				<div class="col-md-3">
				 	<?php //echo $vid_url;?>

				 	<?php // echo $embeds[0];?>
					
					<div class="embed-responsive embed-responsive-4by3">
				 	<?php echo $embeds[0];?>
				 	</div>
					<?php if (has_post_thumbnail() ) { ?>
						<figure class="df-post-thumbnail">
							<a href="<?php the_permalink();?>" title="<?php the_title();?>" rel="bookmark">
								<?php the_post_thumbnail('post-thumbnail', array('itemprop' => 'image', 'class' => 'img-responsive')); ?>
							</a>
						</figure>
					<?php } ?>	
						<header class="post-title entry-header">
							<?php the_title('<h5 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h5>'); ?>
						</header>
						<!-- <div class="post-content entry-content small">
							<?php //echo the_content(); ?>
						</div> -->
				</div>
				
				
			<?php endwhile;?>
		</div>	
		<?php
		}
		$out = ob_get_contents();

		if( ob_get_contents() ) ob_get_clean();

		return $out;

		// $url = '';
		// if( $source == 'youtube' ){
		// 	if( !empty($youtube_url) ) {
		// 		$url = $youtube_url;
		// 	}
		// }else{
		// 	if( !empty($vimeo_url) ){
		// 		$url = $vimeo_url;
		// 	}
		// }

		// $output_embed = wp_oembed_get($url);
	}

	/**
	 * df_audio_embed
	 * render shortcode output to frontend for audio embed content
	 */
	function df_audio_embed( $atts, $content = null ){
		$atts = vc_map_get_attributes( 'df_audio_embed', $atts );
		extract( $atts );

		$url = $audio_url;

		$output_embed = wp_oembed_get($url);

		ob_start();
		$title_text_color = ( isset($title_text_color) ) ? $title_text_color : '';
		( $title == 'Block Title' ) ? $title = '' : $title ;
		?>
		
		<div class="df-vc-title-block" style="color:<?php echo $title_text_color;?> ;">
			<?php echo $title;?>
		</div>

		<div class="">
			<?php echo $output_embed; ?>
		</div>
		<?php

		$out = ob_get_contents();

		if( ob_get_contents() ) ob_get_clean();

		return $out;
	}
	/**
	 * df_vc_atts_to_args
	 * @param $atts
	 * @return $args
	 */
	function df_vc_atts_to_args( $atts, $sort_order='' ){
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

		// if sort order set
		if( $sort_order != '' ){
			if( $sort_order == 'sort-random-today' ){
				$args = wp_parse_args( $this->df_date_query( $sort_order ), $args );

			}else if( $sort_order == 'sort-random-7day' ){
				$args = wp_parse_args( $this->df_date_query( $sort_order ), $args );

			}else if( $sort_order == 'sort-alphabetical' ){
				$args = wp_parse_args( $this->df_alphabetical_query( $sort_order ) , $args);

			}else if( $sort_order == 'sort-popular' ){
				$args = wp_parse_args( $this->df_popular_query( $sort_order ) , $args );
			}
		}
		return $args;
	}

	/**
	 * df_date_query
	 * @param $args
	 * @param $sort_type
	 * @return $args
	 */
	function df_date_query( $sort_type ){
		if( $sort_type == 'sort-random-today'){

			$today = getdate();

			$args = array(
					'orderby' => 'rand',
					'date_query' => array(
							array(
								'year' => $today['year'],
								'month' => $today['mon'],
								'day' => $today['mday']
							)
						)
				);
		}else if( $sort_type == 'sort-random-7day' ){
			$week = date( 'W' );
			$year = date( 'Y' );

			$args = array(
					'orderby' => 'rand',
					'date_query' => array(
							array(
								'year' => $year,
								'week' => $week
							)
						)
				);
		}

		return $args;
	}

	/**
	 * df_alphabetical_query
	 * @param $args
	 * @param $sort_type
	 * @return $args
	 */
	function df_alphabetical_query( $sort_type ){
		if( $sort_type == 'sort-alphabetical' ){
			$args = array(
					'order' => 'ASC',
					'orderby' => 'title'
				);
		}
		return $args;
	}

	/**
	 * df_popular_query
	 * @param $args
	 * @param $sort_type
	 * @return $args
	 */
	function df_popular_query( $sort_type ){
		if(  $sort_type == 'sort-popular' ){
			$args = array(
					'order' => 'DESC',
					'orderby' => 'comment_count'
				);
		}
		return $args;
	}
}
/* file location: [theme directory]/inc/df-core/df-vc-extender/df-vc-extender-shortcode.php */