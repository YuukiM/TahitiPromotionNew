<?php

//add_theme_support( 'post-thumbnails' );

register_nav_menu('mainmenu', 'メインメニュー');

/* Visual Editor CSS */
add_editor_style('editor-style.css');
function custom_editor_settings( $initArray ){
    $initArray['block_formats'] = "見出し2=h2; 見出し3=h3; 見出し4=h4; 見出し5=h5; 段落=p; グループ=div;";
    return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );

/* More */
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
 
function ps_get_root_page( $cur_post, $cnt = 0 ) {
	if ( $cnt > 100 ) { return false; }
	$cnt++;
	if ( $cur_post->post_parent == 0 ) {
		$root_page = $cur_post;
	} else {
		$root_page = ps_get_root_page( get_post( $cur_post->post_parent ), $cnt );
	}
	return $root_page;
}


/* Get the first image of each post */

function first_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];

	if(empty($first_img)){ //Defines a default image
		$first_img = get_bloginfo('template_url')."/img/no-image.png";
	}
	return $first_img;
}

/* Artist category */

function artist_category(){
	$category = get_field("category", get_the_ID());
	//echo $category;
	if($category == "dancerJP"){
		echo "日本人ダンサー";
	}if($category == "dancerTA"){
		echo "現地ダンサー";
	}elseif($category == "musician"){
		echo "ミュージシャン";
	}elseif($category == "group"){
		echo "グループ";
	}elseif($category == "mc"){
		echo "MC";
	}
	//return $catTitle;
}

/* Main Visual */
function main_visual(){
	$id = get_the_id();
	$mainVisual = get_field("mainVisual", $id);
	$pageTitle = get_the_title($id);
	if ($mainVisual) {
		echo "<h1 class=\"titleWithBG\">";
		echo "<img src='" . $mainVisual . "'>";
		echo "</h1>";
	} else {
		$ancestors = get_ancestors($id, "page");
		if ($ancestors[0]) {
			$mainVisual = get_field("mainVisual", $ancestors[0]);
			echo "<h1 class=\"titleWithBG\">";
			echo "<img src='" . $mainVisual . "'>";
			echo "</h1>";
		} else {
			echo "<h1 class=\"title col-xs-12\">" . $pageTitle . "</h1>";
		}
	}
}

/* main menu class */
add_filter( 'nav_menu_css_class', 'my_nav_menu_css_class', 10, 2 );
function my_nav_menu_css_class( $classes, $item ) {
	if ( 'page' == $item->object ) {
		$page = get_page_by_title( $item->title );
		$classes[] = $page->post_name;
	} else if ( 'category' == $item->object ) {
		$cat = get_category( get_cat_ID ( $item->title ) );
		$classes[] = $cat->slug;
	}
	return $classes;
}



/* Sidebar nav */