<?php

    function vg_files() {	
		wp_enqueue_script('main_vg_js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
		wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Playfair+Display:300,300i,400,400i,700,700i|Monoton:100,300,400,400i,700,700i" rel="stylesheet');		
		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('vg_styles', get_theme_file_uri('/build/style-index.css'));
        wp_enqueue_style('vg_extra_styles', get_theme_file_uri('/build/index.css'));
    }
    
    add_action('wp_enqueue_scripts', 'vg_files');

	function vg_features() {
		register_nav_menu('headerMenuLocation', 'Header Menu Location');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
	}

	add_action('after_setup_theme', 'vg_features');


	function vg_post_types() {
		// Game Post Type
		register_post_type('game', array(
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'excerpt', 'custom-fields'),
			'rewrite' => array('slug' => 'games'),
			'has_archive' => true,
			'public' => true,
			'show_in_rest' => true,
			'labels' => array(
				'name' => 'Games',
				'add_new_item' => 'Add New Game',
				'edit_item' => 'Edit Game',
				'all_items' => 'All Games',
				'singular_name' => 'Game'
			),
			'menu_icon' => 'dashicons-album'
		));
		
		// Rating Post Type
		register_post_type('rating', array(
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
			'rewrite' => array('slug' => 'ratings'),
			'has_archive' => true,
			'public' => true,
			'show_in_rest' => true,
			'labels' => array(
				'name' => 'Ratings',
				'add_new_item' => 'Add New Rating',
				'edit_item' => 'Edit Rating',
				'all_items' => 'All Ratings',
				'singular_name' => 'Rating'
			),
			'menu_icon' => 'dashicons-awards'
		));
	}

	add_action('init', 'vg_post_types'); 

	// sort these ratings differently later
	function vg_adjust_queries($query) {

		if(!is_admin() AND is_post_type_archive('rating') AND is_main_query()) {
			$query->set('orderby', 'title');
			$query->set('order', 'ASC');
			$query->set('posts_per_page', -1);
		}

		if(!is_admin() AND is_post_type_archive('game') AND $query->is_main_query()) {
			$today = date('Ymd');
			$query->set('meta_key', 'release_date');
			$query->set('orderby', 'meta_value_num');
			$query->set('order', 'ASC');
			$query->set('meta_query', array(
				array(
				  'key' => 'release_date',
				  'compare' => '>=',
				  'value' => $today,
				  'type' => 'numeric'
				)
			  ));
		}
	}

	add_action('pre_get_posts', 'vg_adjust_queries');


?>