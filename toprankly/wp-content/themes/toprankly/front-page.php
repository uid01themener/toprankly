<?php


//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
   
    'menu-primary',
    'menu-secondary',
    'site-inner',
    'footer-widgets',
    'footer'
) );






add_action( 'genesis_meta', 'trl_home_genesis_meta' );
function trl_home_genesis_meta(){
    // force full width
    add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
    remove_action( 'genesis_loop', 'genesis_do_loop' );
    add_action( 'genesis_loop', 'trl_loop' );
}

 
 
add_action( 'genesis_header', 'sbwp_home_top',10);
function sbwp_home_top() {
      genesis_widget_area( 'home-top', array(
      		 'before' => '<div class="home-widget home-top"><div class="wrap">',
       		'after' => '</div></div>',
    		 ) );
    		 }


function trl_loop(){	
	
	
  genesis_widget_area( 'home-middle-1', array(
      		 'before' => '<div class="home-widget home-middle home-middle-1 odd"><div class="wrap">',
       		 'after' => '</div></div>',
    		 ) );

    	genesis_widget_area( 'home-middle-2', array(
      		 'before' => '<div class="home-widget home-middle home-middle-2 even"><div class="wrap">',
       		'after' => '</div></div>',
    		 ) );

       genesis_widget_area( 'home-middle-3', array(
      		 'before' => '<div class="home-widget home-middle home-middle-3  odd"><div class="wrap">',
       		'after' => '</div></div>',
    		 ) );
       genesis_widget_area( 'home-middle-4', array(
      		 'before' => '<div class="home-widget home-middle home-middle-4  even"><div class="wrap">',
       		'after' => '</div></div>',
    		 ) );
    		 
     genesis_widget_area( 'home-middle-5', array(
      		 'before' => '<div class="home-widget home-middle home-middle-5  odd"><div class="wrap">',
       		'after' => '</div></div>',
    		 ) );
	
	genesis_widget_area( 'home-middle-6', array(
      		 'before' => '<div class="home-widget home-middle home-middle-6  even"><div class="wrap">',
       		'after' => '</div></div>',
    		 ) );
	
	genesis_widget_area( 'home-middle-7', array(
      		 'before' => '<div class="home-widget home-middle home-middle-7  odd"><div class="wrap">',
       		'after' => '</div></div>',
    		 ) );
          
 }

 add_action('genesis_footer','trl_footer_before',5);
 function trl_footer_before(){
     genesis_widget_area( 'home-bottom', array(
      		 'before' => '<div class="home-widget home-bottom"><div class="wrap">',
       		'after' => '</div></div>',
    		 ) );

}

genesis();
