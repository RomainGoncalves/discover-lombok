<!DOCTYPE html>

<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

<?php global $data; ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>	

</head>

<body <?php body_class('body-class'); ?>>

    <?php 
        // Load custom background image from Theme Options
        global $wp_query;
        if( is_home() ) {
            $postid = get_option('page_for_posts');
        } elseif( is_search() || is_404() ) {
            $postid = 0;
        } else {
            $postid = $wp_query->post->ID;
        }
        
        // Get the unique background image for page
        $bg_img = get_post_meta($postid, 'ct_mb_background_image', true);
        $src = wp_get_attachment_image_src( $bg_img, 'full' );
        $bg_img = $src[0];        
        
        if( empty($bg_img) ) { 
            // Background image not defined, fallback to default background
            $bg_pos = stripslashes ( $data['ct_default_bg_position'] );
            if ( $bg_pos == 'Full Screen' ) {
                $bg_pos = 'full';
            }
            
            // Get the fullscreen background image for page
            if( $bg_pos == 'full' ) {
                $bg_img = stripslashes ( $data['ct_default_bg_image'] );
                if( !empty($bg_img) ) {

                    if ( is_search() ) { $ct_page_title = 'Search'; }
                    else if ( is_404() ) { $ct_page_title = 'Error 404'; }
                    else { $ct_page_title = $wp_query->post->post_title; }
                
                    echo '<img id="bg-stretch" src="' . $bg_img . '" alt="' . $ct_page_title . '" />';
                }
            }
        } else {
            // else get the unique background image for page
            $bg_pos = get_post_meta($postid, 'ct_mb_background_position', true);            

            if( $bg_pos == 'full' ) {
                $ct_page_title = $wp_query->post->post_title;
                
                echo '<img id="bg-stretch" src="' . $bg_img . '" alt="' . $ct_page_title . '" />';
            }
        }
    ?>

<?php

$blogid = get_current_blog_id();

if($blogid != 1){
?>
<!-- Start Top Content -->
<div id="header" itemscope itemtype="http://schema.org/WPHeader" >

<!-- START TOP BLOCK -->
<?php
$top_block_style = stripslashes( $data['ct_top_block_style'] );
$type_menu = stripslashes( $data['ct_type_menu'] ); 

      if ( $top_block_style == 'Boxed' ) : ?>
    <div>
      <div id="top-block-bg" class="container border-1px bottom-shadow">
    
    <?php else : ?>
    <div id="top-block-bg" class="border-1px bottom-shadow" style="border-left: 0;border-right: 0;">
      <div id="top-block-bg-boxed" class="container">
    <?php endif; ?>

    <?php 
    // Flat menu
    if ($type_menu == 'Flat') : ?>
        <div class="row-fluid">
          <div class="span3 logo-block">
		    <div id="logo">
		  	  <?php $logo_type = stripslashes( $data['ct_type_logo'] );  			
				if ( $logo_type == "image" ) { 
				  if ( is_front_page() ) { ?>
    				<h1><a href="<?php echo home_url(); ?>"><img src="<?php echo stripslashes( $data['ct_logo_upload'] ) ?>" alt="" /></a></h1>
				  <?php } else { ?>
					<a href="<?php echo home_url(); ?>"><img src="<?php echo stripslashes( $data['ct_logo_upload'] ) ?>" alt="" /></a>
				 <?php }
				 }	
				 
				 if ( $logo_type == "text" ) : ?>
				   <h1 class="text-logo"><a href="<?php echo home_url(); ?>"><?php echo stripslashes( $data['ct_logo_text'] ); ?></a></h1>
					<span class="logo-slogan"><?php echo stripslashes( $data['ct_logo_slogan'] ); ?></span>
				 <?php endif; ?>
		    </div> <!-- #logo -->
    	  </div><!-- /span3 -->

		  <div class="span9">
		    <div class="navigation">
		      <div id="menu">
		  	    <?php if ( has_nav_menu('main_menu') ) wp_nav_menu( array('theme_location' => 'main_menu', 'menu_class' => 'sf-menu-flat')); ?>
		      </div> <!-- /menu -->
		    </div>  <!-- /navigation -->
          </div><!-- /span9 -->
        </div><!-- /row-fluid -->

    <?php 
    // Drop-Down menu
    elseif ($type_menu == 'Drop-Down') : ?>

        <div class="row-fluid">
          <div class="span3 logo-block">
            <div id="logo">
              <?php $logo_type = stripslashes( $data['ct_type_logo'] );             
                if ( $logo_type == "image" ) { 
                  if ( is_front_page() ) { ?>
                    <h1><a href="<?php echo home_url(); ?>"><img src="<?php echo stripslashes( $data['ct_logo_upload'] ) ?>" alt="" /></a></h1>
                  <?php } else { ?>
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo stripslashes( $data['ct_logo_upload'] ) ?>" alt="" /></a>
                 <?php }
                 }  
                 
                 if ( $logo_type == "text" ) : ?>
                   <h1 class="text-logo"><a href="<?php echo home_url(); ?>"><?php echo stripslashes( $data['ct_logo_text'] ); ?></a></h1>
                    <span class="logo-slogan"><?php echo stripslashes( $data['ct_logo_slogan'] ); ?></span>
                 <?php endif; ?>
            </div> <!-- #logo -->
          </div><!-- /span3 -->

          <div class="span9">
            <div class="banner">
              <?php
              $banner_upload = stripslashes( $data['ct_banner_upload'] );
              $banner_code = stripslashes( $data['ct_banner_code'] );
              $show_top_banner = stripslashes( $data['ct_top_banner'] );
            
              if ( $banner_upload != '' && $show_top_banner == 'Upload' ) { ?>
                <a target="_blank" href="<?php echo stripslashes( $data['ct_banner_link'] ); ?>"><img src="<?php echo stripslashes( $data['ct_banner_upload'] ) ?>" alt="" /></a>
              <?php } else if ( $banner_code != '' && $show_top_banner == 'Code' ) { echo $banner_code; } ?>
            </div><!-- .banner -->
          </div><!-- /span9 -->
        </div><!-- /row-fluid -->

  <div id="mainmenu-block-bg">
    <div class="container">
        <div class="row-fluid">
          <div class="span12">
            <div class="navigation">
              <div id="menu" class="ct-dropdown-menu border-1px bottom-shadow">
                <?php if ( has_nav_menu('main_menu') ) wp_nav_menu( array('theme_location' => 'main_menu', 'menu_class' => 'sf-menu')); ?>
              </div> <!-- /menu -->
            </div>  <!-- /navigation -->
          </div><!-- /span9 -->
        </div><!-- /row-fluid -->
    </div> <!-- container -->
  </div> <!-- mainmenu-block-bg --> 
  
    <?php endif; ?>

	  </div><!-- /container -->      
    </div><!-- /top-block-bg -->	
    <!-- END TOP BLOCK -->

  </div> <!-- #header -->

<?php 
  }//End if blogid != 1
?>