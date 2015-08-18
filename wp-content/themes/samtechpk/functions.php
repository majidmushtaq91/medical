<?php

//function custom_rewrite_basic() {
//	add_rewrite_rule('^sample-page/([0-9]+)/?', 'index.php?page_id=$matches[1]', 'top');
//}
//add_action('init', 'custom_rewrite_basic');



function custom_rewrite_tag() {
	add_rewrite_tag('%website_page%', '([^&]+)');
}
add_action('init', 'custom_rewrite_tag', 10, 0);

function custom_rewrite_rule() {
	  add_rewrite_rule('^nutrition/([^/]*)/([^/]*)/?','index.php?page_id=13&website_page=$matches[1]','top');
  }
add_action('init', 'custom_rewrite_rule', 10, 0);



	#Includes libs
	include (TEMPLATEPATH . '/theme-options.php' );
	include_once('libraries/acf.php');
	
	//define( 'ACF_LITE', true );

	#Sidebar

	if ( function_exists('register_sidebars') ) {
		register_sidebar( array(
						'name' => 'Sidebar',
						'Description' => 'Description',
						'before_widget' => '<div id="%1$s">',
						'after_widget' => '</div>',
						'before_title' => '<h2>',
						'after_title' => '</h2>')
						);

		
		#Social
		register_sidebar( array(
						'name' => 'Social',
						'Description' => 'Description',
						'before_widget' => '<div id="%1$s">',
						'after_widget' => '</div>',
						'before_title' => '<h2>',
						'after_title' => '</h2>')
						);

	}
	#Menu
	
	if (function_exists('register_nav_menus')) {
		register_nav_menus(
			array(
				'top_nav' => 'Main Menu'
			)
		);
	}
	
	
	function wpb_first_and_last_menu_class($items) 
	{
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
	}
	add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');



	//POST Type
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
	
	// add post-formats to post_type 'page'
	add_post_type_support( 'page', 'post-formats' );

	// add post-formats to post_type 'my_custom_post_type'
	add_post_type_support( 'my_custom_post_type', 'post-formats' );
	
	
	// Body Class Function
	function body_classes() {

	    global $post;

		// echo some of these things
	    if (is_category()) { echo "page_category"." "; }
	    elseif (is_search()) { echo "page_search"." "; }
	    elseif (is_tag()) { echo "page_tag"." "; }
	    elseif (is_home()) { echo "page_home"." "; }
	    elseif (is_404()) { echo "page_404"." "; }

	    // echo page_(page name)
	    if( is_page()) {
	        $pn = $post->post_name;
	        echo "page_".$pn." ";
	    }

	    // echo parent_(parent name)
	    $post_parent = get_post($post->post_parent);
	    $parentSlug = $post_parent->post_name;
	    
	    if ( is_page() && $post->post_parent ) {
	            echo "parent_".$parentSlug." ";
	    }

	    // echo template_(template name)
	    $temp = get_page_template();
	    if ( $temp != null ) {
	        $path = pathinfo($temp);
	        $tmp = $path['filename'] . "." . $path['extension'];
	        $tn= str_replace(".php", "", $tmp);
	        echo "template_".$tn;
	    }
	}


	// Add RSS links to <head> section
	automatic_feed_links();
	


	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }

    add_action('init', 'removeHeadLinks');

    remove_action('wp_head', 'wp_generator');
	
	//Thumbnails Functions
	add_theme_support( 'post-thumbnails' );

	//add_image_size( 'small-featured', 300, 9999 ); // image 300px wide
	//add_image_size( 'small-cropped', 200, 200, true ); // 200px height/width
	add_image_size( 'slider-cropped', 960, 409, true ); // Creates a cropped new image 200px height/width
	
	//Custom Post Type



class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"my-sub-menu\">\n";
  }
}


function file_downloader($link){

    require_once( ABSPATH . 'wp-admin/includes/admin.php' );
    #require_once(ABSPATH . 'wp-admin/includes/file.php');
    #require_once(ABSPATH . 'wp-admin/includes/media.php');
    $url = $link; // Input a .zip URL here
    $tmp = download_url( $link );
    $file_array = array(
        'name' => basename( $url ),
        'tmp_name' => $tmp
    );

    #print_r($file_array);exit;

    // Check for download errors
    if ( is_wp_error( $tmp ) ) {
        @unlink( $file_array[ 'tmp_name' ] );
        return $tmp;
    }

    $id = media_handle_sideload( $file_array, 13 );
    // Check for handle sideload errors.
    if ( is_wp_error( $id ) ) {
        @unlink( $file_array['tmp_name'] );
        return $id;
    }

    $attachment_url = wp_get_attachment_url( $id );

    return $attachment_url;

}
if($_GET['api'] == 1) {
    print_r(file_downloader($_GET['file_link'] ));exit;
}
#
