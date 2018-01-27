<?php
/**
 * top rankly.
 *

 *
 * @package toprankly
 * @author  themener
 * @link    http://www.themener.com
 */

add_action( 'genesis_meta', 'genesis_load_stylesheet' );



// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'toprankly_localization_setup' );
function toprankly_localization_setup(){
	load_child_theme_textdomain( 'toprankly', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add WooCommerce support.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the required WooCommerce styles and Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Add the Genesis Connect WooCommerce notice.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'toprankly' );
define( 'CHILD_THEME_URL', 'http://www.themner.com/' );
define( 'CHILD_THEME_VERSION', '2.3.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'toprankly_enqueue_scripts_styles' );
function toprankly_enqueue_scripts_styles() {

	wp_enqueue_style( 'genesis-sample-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700|Open+Sans:300,300i,400,600,600i,700,800', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );
	
	wp_enqueue_style( 'toprankly-fonts', '//use.typekit.net/bhi1xuj.css', array(), CHILD_THEME_VERSION );
	
	wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'toprankly-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'toprankly-responsive-menu',
		'genesis_responsive_menu',
		toprankly_responsive_menu_settings()
	);
	
	add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 5 );
	
	 
 

}

// Define our responsive menu settings.
function toprankly_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'genesis-sample' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'genesis-sample' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);


	return $settings;

}

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 135,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 4-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 4 );

// Add Image Sizes.
add_image_size( 'featured-image', 960, 500, TRUE );
add_image_size( 'post-hero-image', 1800, 500, TRUE );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array( 'primary' => __( 'After Header Menu', 'toprankly' ), 'secondary' => __( 'Footer Menu', 'tpl' ) ) );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'toprankly_secondary_menu_args' );
function toprankly_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'toprankly_author_box_gravatar' );
function toprankly_author_box_gravatar( $size ) {
	return 90;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'toprankly_comments_gravatar' );
function toprankly_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}


//custom header 

//remove initial header functions
 
remove_action( 'genesis_header', 'genesis_do_header' );
add_action( 'genesis_header', 'tpl_genesis_do_header' );
function tpl_genesis_do_header(){

      global $wp_registered_sidebars;
      	
      	genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'site-nav',
	) );
      
     	genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'wrap',
	) );
      
        genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'title-area',
	) );
	do_action( 'genesis_site_title' );
	do_action( 'genesis_site_description' );
	
	genesis_markup( array(
		'close'    => '</div>',
		'context' => 'title-area',
	) );
	
	if ( ( isset( $wp_registered_sidebars['header-right'] ) && is_active_sidebar( 'header-right' ) ) || has_action( 'genesis_header_right' ) ) {
	      genesis_markup( array(
			'open'    => '<div %s>' . genesis_sidebar_title( 'header-right' ),
			'context' => 'header-widget-area',
		) );
			do_action( 'genesis_header_right' );
			add_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
			add_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
			dynamic_sidebar( 'header-right' );
			remove_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
			remove_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
		
		genesis_markup( array(
			'close'   => '</div>',
			'context' => 'header-widget-area',
		) );
	}
	
	genesis_markup( array(
		'close'    => '</div>',
		'context' => 'wrap',
	) );
	
	genesis_markup( array(
		'close'    => '</div>',
		'context' => 'site-nav',
	) );
}


/** #widget area
* --------------------------------------------------------------------*/
 // home top widget area
			genesis_register_sidebar( array(
				'id' => 'home-top',
				'name' => __( 'Home Top Widget', 'trl' ),
				'description' => __( 'Home Top Widget Area', 'trl' ),
			) );
			// home middile 1
			genesis_register_sidebar( array(
				'id' => 'home-middle-1',
				'name' => __( 'Home Middle Widget 1', 'trl' ),
				'description' => __( 'Home Middle Widget 1', 'trl' ),
			) );

			// home middile 2
			genesis_register_sidebar( array(
				'id' => 'home-middle-2',
				'name' => __( 'Home Middle Widget 2', 'trl' ),
				'description' => __( 'Home Middle Widget 2', 'trl' ),
			) );

			// home middile 3
			genesis_register_sidebar( array(
				'id' => 'home-middle-3',
				'name' => __( 'Home Middle Widget 3', 'trl' ),
				'description' => __( 'Home Middle Widget 3', 'trl' ),
			) );

			// home middile 4
			genesis_register_sidebar( array(
				'id' => 'home-middle-4',
				'name' => __( 'Home Middle Widget 4', 'trl' ),
				'description' => __( 'Home Middle Widget 4', 'trl' ),
			) );

			// home middile 5
			genesis_register_sidebar( array(
				'id' => 'home-middle-5',
				'name' => __( 'Home Middle Widget 5', 'trl' ),
				'description' => __( 'Home Middle Widget 5', 'trl' ),
			) );

			// home middile 6
			genesis_register_sidebar( array(
				'id' => 'home-middle-6',
				'name' => __( 'Home Middle Widget 6', 'trl' ),
				'description' => __( 'Home Middle Widget 6', 'trl' ),
			) );

			// home middile 7
			genesis_register_sidebar( array(
				'id' => 'home-middle-7',
				'name' => __( 'Home Middle Widget 7', 'trl' ),
				'description' => __( 'Home Middle Widget 7', 'trl' ),
			) );


			// home bottom widget area
			genesis_register_sidebar( array(
				'id' => 'home-bottom',
				'name' => __( 'Home Bottom Widget', 'trl' ),
				'description' => __( 'Home Bottom Widget Area', 'trl' ),
			) );








// adding wrap class
add_action('genesis_site_title','tpl_before_site_title',9);
function tpl_before_site_title(){
   echo '<div class="wrap-extra"> </div>';
}

 
 // show the sub heading 

remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );


add_action( 'genesis_entry_header', 'genesis_post_meta', 5 );
add_action( 'genesis_entry_header', 'genesis_post_info', 12 );


remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
//add_action( 'genesis_entry_header', 'genesis_do_post_image',1 );

 

 
 // Change footer credit
 add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
function sp_footer_creds_filter( $creds ) {
	$creds = 'Copyright[footer_copyright] &middot; <a href="http://www.toprankly.com">toprankly.com</a>. All rights reserved.';
	return $creds;
}





add_filter( 'excerpt_length', 'sp_excerpt_length' );
function sp_excerpt_length( $length ) {
	return 0; // pull first 50 words
}

add_filter( 'the_excerpt', 'sp_read_more_link' );
function sp_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '"> Continue Reading </a>';
}


//* Customize the post meta function
add_filter( 'genesis_post_meta', 'sp_post_meta_filter' );
function sp_post_meta_filter($post_meta) {
        $post_meta = '[post_categories before=""]';
	return $post_meta;
 }


remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );


add_action( 'genesis_entry_header', 'genesis_post_meta', 5 );
add_action( 'genesis_entry_header', 'genesis_post_info', 12 );


remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image',1 );

 

 
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
function custom_override_checkout_fields( $fields ) {
  
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);
  
    
    unset($fields['billing']['billing_city']);
    return $fields;
}

//add header after

add_action('genesis_after_header','tpl_header_after',10);
function tpl_header_after(){

    $pages= array('home', 'services', 'the-link-audit', 'link-building-packages-for-seo', 'full-time-link-builder', 'contact', 'praises', 'about');
     
    if (is_page( $pages)){     
          remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
	      remove_action( 'genesis_entry_header', 'genesis_do_post_title' );		 
	      remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
          genesis_entry_header_markup_open();
                 echo '<div class="wrap">';
	                    genesis_do_post_title();
	             echo '</div>';
	      genesis_entry_header_markup_close();
   
     }   
        
 }

//remove auto generate p tag
function remove_the_wpautop_function() {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
}

add_action( 'after_setup_theme', 'remove_the_wpautop_function' );


// Make featured image on posts as hero image .

// header after
add_action('genesis_after_header','xponent_header_after',10);

function xponent_header_after(){

	if (is_single()) {
	
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );		 
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );			
       		genesis_entry_header_markup_open();
        	echo '<div class="wrap">';
	   		genesis_do_post_title();
	 	echo '</div>';
		genesis_entry_header_markup_close();  
	}  
        
 }
 
 function xponent_post_header_image_style() {

        if (is_single()) {
      	   $img = genesis_get_image(array( 'format' => 'url') );
           echo " <style>
                .single .entry-header {
                        background-image: url({$img});
                        background-size:cover;
                     }
                     </style>";
        
       }
    
}
add_action( 'wp_head', 'xponent_post_header_image_style' );
  