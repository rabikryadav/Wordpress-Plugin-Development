<?php 
if(!defined('ABSPATH')) exit; // Exit if accessed directly.
add_action('init','vswp_news_post');

function vswp_news_post(){

	register_post_type('news', array(
		'label' => "Global News",
		'labels'=> array(
		'name'                     => _x( 'Global News', 'News post type general name' ),
		'singular_name'            => _x( 'News', 'News post type singular name' ),
		'add_new'                  => _x( 'Add New News', 'News Post' ),
		'add_new_item'             => __( 'Add New News' ),
		'edit_item'                => __( 'Edit News' ),
		'new_item'                 => __( 'New News' ),
		'view_item'                => __( 'View News' ),
		'view_items'               => __( 'View News' ),
		'search_items'             => __( 'Search News' ),
		'not_found'                => __( 'No News found.' ),
		'not_found_in_trash'       => __( 'No News found in Trash.' ),
		'parent_item_colon'        => null,
		'all_items'                => __( 'All News' ),
		'archives'                 => __( 'News Archives' ),
		'attributes'               => __( 'News Attributes' ),
		'insert_into_item'         => __( 'Insert into News' ),
		'uploaded_to_this_item'    => __( 'Uploaded to this News' ),
		'featured_image'           => _x( 'News Featured image', 'news' ),
		'set_featured_image'       => _x( 'Set News featured image', 'news' ),
		'remove_featured_image'    => _x( 'Remove News featured image', 'news' ),
		'use_featured_image'       => _x( 'Use as news featured image', 'news' ),
		'filter_items_list'        => __( 'Filter News list' ),
		'items_list_navigation'    => __( 'News list navigation' ),
		'items_list'               => __( 'News list' ),
		'item_published'           => __( 'News published.' ),
		'item_published_privately' => __( 'News published privately.' ),
		'item_reverted_to_draft'   => __( 'News reverted to draft.' ),
		'item_scheduled'           => __( 'News scheduled.' ),
		'item_updated'             => __( 'News updated.' ),
	),
		'public'=> true,
		'description' => 'This is a Custom Post Type for News',
		'supports'=> ['title','editor','comments','custom-fields','thumbnail'],
	));

	// texonomy add

	register_taxonomy('news-categories',['news'], array(
		'labels' => array(
		'name'                       => _x( 'News Categories', 'taxonomy general name' ),
		'singular_name'              => _x( 'News Category', 'taxonomy singular name' ),
		'search_items'               => __( 'Search News Categories' ),
		'popular_items'              => null,
		'all_items'                  => __( 'All News Categories' ),
		'parent_item'                => __( 'Parent News Category' ),
		'parent_item_colon'          => __( 'Parent News Category:' ),
		'edit_item'                  => __( 'Edit News Category' ),
		'view_item'                  => __( 'View News Category' ),
		'update_item'                => __( 'Update News Category' ),
		'add_new_item'               => __( 'Add New News Category' ),
		'new_item_name'              => __( 'New News Category Name' ),
		'separate_items_with_commas' => null,
		'add_or_remove_items'        => null,
		'choose_from_most_used'      => null,
		'not_found'                  => __( 'No News categories found.' ),
		'no_terms'                   => __( 'No News categories' ),
		'items_list_navigation'      => __( 'News Categories list navigation' ),
		'items_list'                 => __( 'News Categories list' ),
		/* translators: Tab heading when selecting from the most used terms. */
		'most_used'                  => _x( 'Most News Categories Used', 'categories' ),
		'back_to_items'              => __( '&larr; Go to News Categories' ),
		),
		'hierarchical' => true,
		'public' => true
	));
}
add_filter('template_include','vswp_news_template');
function vswp_news_template($template){
	
	global $post;

	if (is_single() AND $post->post_type == 'news') {
		
		$template = plugin_dir_path(__FILE__).'../templates/vswp_news.php';
	}
	return $template;
}
?>