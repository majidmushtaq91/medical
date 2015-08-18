<?php


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

function my_custom_post_slider() {
	$labels = array(
		'name'               => _x( 'Slider', 'post type general name' ),
		'singular_name'      => _x( 'Product', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Product' ),
		'edit_item'          => __( 'Edit Product' ),
		'new_item'           => __( 'New Product' ),
		'all_items'          => __( 'All Slider' ),
		'view_item'          => __( 'View Slider' ),
		'search_items'       => __( 'Search Slider' ),
		'not_found'          => __( 'No products found' ),
		'not_found_in_trash' => __( 'No products found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Slider'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our slides and slider specific data',
		'public'        => true,
		'menu_position' => 30,
		'supports'      => array( 'title', 'editor', 'thumbnail'),
		'has_archive'   => true,
	);
	register_post_type( 'slider', $args );	
}
	add_action( 'init', 'my_custom_post_slider' );
		
	 
	//Define text Expert
	function excerpt($text, $chars) {
		$text = $text . " "; 
		$text = strip_tags($text); 
		$text = substr($text,0,$chars); 
		$text = substr($text,0,strrpos($text,' ')); 
		$text = $text . ""; 
	echo $text; 
	}
	
	if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_slider-option',
		'title' => 'Slider Option',
		'fields' => array (
			array (
				'key' => 'field_534c3b2022444',
				'label' => 'Add caption to slider',
				'name' => 'have_caption',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slider',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_contact-page-options',
		'title' => 'Contact Page Options',
		'fields' => array (
			array (
				'key' => 'field_53711608e8605',
				'label' => 'Show contact detail?',
				'name' => 'contact_detail',
				'type' => 'true_false',
				'instructions' => 'Contact details will be visible on contact page on your website.',
				'message' => '',
				'default_value' => 1,
			),

			array (
				'key' => 'field_53711701a1631',
				'label' => 'Show Map?',
				'name' => 'show_map',
				'type' => 'true_false',
				'instructions' => 'If yes then google map of your address will be visible on contact page.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53711608e8605',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'message' => '',
				'default_value' => 1,
			),

			array (
				'key' => 'field_537116a410ab0',
				'label' => 'Address',
				'name' => 'location',
				'type' => 'google_map',
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53711608e8605',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
			),
			array (
				'key' => 'field_5371176e384da',
				'label' => 'Phone Number',
				'name' => 'phone',
				'type' => 'text',
				'instructions' => 'Please enter phone number, or leave empty if you don\'t want to visible on contact page.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53711608e8605',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '+800 123 4500',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_537117fa0db7b',
				'label' => 'Fax',
				'name' => 'fax',
				'type' => 'text',
				'instructions' => 'Please enter your fax, or leave empty if you don\'t have.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53711608e8605',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '+800 1232 4511',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_537119487c14e',
				'label' => 'Email Address',
				'name' => 'email',
				'type' => 'text',
				'instructions' => 'Please enter email address, or leave empty if you don\'t want to visible on contact page.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53711608e8605',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 'name@domain.com',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5371237ed7c4c',
				'label' => 'Contact form title',
				'name' => 'form_title',
				'type' => 'text',
				'instructions' => 'Enter title for contact form or leave empty if you don\'t want it.',
				'default_value' => 'Contact Form',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_537123287e16b',
				'label' => 'Contact detail title',
				'name' => 'contact_detail_title',
				'type' => 'text',
				'instructions' => 'Enter title for contact detail or leave empty if you don\'t want it.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53711608e8605',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 'CONTACT DETAIL',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '7',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'featured_image',
			),
		),
		'menu_order' => 0,
	));
}


class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"my-sub-menu\">\n";
  }
}

function math($hello, $booleans) {

        //    echo $hello + $booleans ;

}

math(10, 20);

