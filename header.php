<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package OneEngine
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
    <!-- Title
	================================================== -->
	<title><?php bloginfo('name'); ?><?php if(is_front_page()){ echo ' - ' .get_bloginfo('description');} else echo wp_title(); ?>
    </title>
    <!-- Title / End -->
    
    <!-- Meta
	================================================== -->
	<meta name="description" content="<?php echo oneengine_option( 'meta_description' );?>">
    <meta name="keywords" content="<?php echo oneengine_option( 'meta_keyword' ); ?>">
	<meta name="author" content="<?php echo oneengine_option( 'meta_author' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Meta / End -->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo oneengine_option('favicon', false, 'url'); ?>">
    <link rel="icon" type="image/png" href="<?php echo oneengine_option('favicon', false, 'url'); ?>" />
	<link rel="apple-touch-icon" href="<?php echo oneengine_option('touch_icon', false, 'url'); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo oneengine_option('touch_icon_72', false, 'url'); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo oneengine_option('touch_icon_144', false, 'url'); ?>">
    <!-- Favicons / End -->
    
    <noscript>
    	<style>
        	#portfolio_list div.item a div.hover {
				top: 0px;
				left: -100%;
				-webkit-transition: all 0.3s ease;
				-moz-transition: all 0.3s ease-in-out;
				-o-transition: all 0.3s ease-in-out;
				-ms-transition: all 0.3s ease-in-out;
				transition: all 0.3s ease-in-out;
			}
			#portfolio_list div.item a:hover div.hover{
				left: 0px;
			}
        </style>
    </noscript>
    
	<?php
    //loads comment reply JS on single posts and pages
    if ( is_single()) wp_enqueue_script( 'comment-reply' ); 
    ?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="app">

        <?php if( is_front_page() ){ ?>        
        <!-- Header
        ======================================================================== -->
        <header id="header">
            <!-- Logo
            ======================================================================== -->
            <div class="logo">
                <a href="<?php echo home_url(); ?>" title="<?php get_bloginfo( 'name' ); ?>">
                    <?php 
                        $top   = '' ;
                        $left  = '' ;
                        $width = '' ;
                        if( oneengine_option('logo_top') != '' )$top    = 'top:'.oneengine_option('logo_top').'px;' ;
                        if( oneengine_option('logo_left') != '' )$left  = 'left:'.oneengine_option('logo_left').'px;';
                        if( oneengine_option('logo_width') != '' )$width = 'width:'.oneengine_option('logo_width').'px;';
                        if( oneengine_option('custom_logo', false, 'url') !== '' ){
                            echo '<img style="'.$width.$left.$top.'" src="'. oneengine_option('custom_logo', false, 'url') .'" alt="'.get_bloginfo( 'name' ).'" class="logo-img-1"/>';
                        }else{
                    ?>
                         <img src="<?php bloginfo('stylesheet_directory'); ?>/images/kenson-logo.png" alt="<?php bloginfo( 'name' ); ?>" class="logo-img-1">
                    <?php } ?>

                    <?php 
                        $topExtra   = '' ;
                        $leftExtra  = '' ;
                        $widthExtra = '' ;
                        if( oneengine_option('extra_logo_top') != '' )$topExtra    = 'top:'.oneengine_option('extra_logo_top').'px;' ;
                        if( oneengine_option('extra_logo_left') != '' )$leftExtra  = 'left:'.oneengine_option('extra_logo_left').'px;';
                        if( oneengine_option('extra_logo_width') != '' )$widthExtra = 'width:'.oneengine_option('extra_logo_width').'px;';
                        if( oneengine_option('extra_custom_logo', false, 'url') !== '' ){
                            echo '<img style="'.$widthExtra.$leftExtra.$topExtra.'" src="'. oneengine_option('extra_custom_logo', false, 'url') .'" alt="'.get_bloginfo( 'name' ).'" class="logo-img-2"/>';
                        }else{
                    ?>
                        <div>
                             <img src="<?php bloginfo('stylesheet_directory'); ?>/images/kenson-logo-title.svg" alt="<?php bloginfo( 'name' ); ?>" class="logo-img-2">
                    <?php } ?>
                        <span>
                            <?php if( bloginfo( 'description' ) != '' ) { ?>
                                <?php bloginfo( 'description' ) ?>
                            <?php } ?>
                        </span>
                    </div>
                </a>
            </div>
             <!-- Logo / End -->

        	
            <!-- Menu
            ======================================================================== --> 
            <nav id="main-menu-top">
                  <?php
                      wp_nav_menu(array( 
                          'container' => false,
						  'container_class' => 'menu',
						  'menu_class' => 'ul-reset',
						  'menu_id'         => 'menu-res',
						  'theme_location' => 'main_nav',
						  'before' => '',
						  'after' => '',
						  'link_before' => '',
						  'link_after' => '',
						  'fallback_cb' => false,
                      ));      
                  ?>
            </nav>
            <!-- Menu / End -->





            <div class="contact">

                <div class="contact__title">Contact Us</div>
                

                <div class="contact__details">

                    <?php if(oneengine_option('phone_general') != '') {?>
                        <?php if(oneengine_option('phone_general') != '') {?>
                            <div class="phone-m">
                                <a href="tel:<?php echo oneengine_option('phone_general') ?>">
                                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/phone.svg" alt="Kenson gas and Plumbing Contact Number">
                                </a>
                            </div>
                        <?php } ?>

                        <div class="phone phone-d fx">

                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/phone.svg" alt="Kenson gas and Plumbing Contact Number">
                            <ul class="ul-reset">
                                <li>
                                    <a href="tel:<?php echo oneengine_option('phone_general') ?>"><?php echo oneengine_option('phone_general') ?></a>
                                </li>
                                <?php if(oneengine_option('extra_phone_general') != '') {?>
                                <li>
                                    <a href="tel:<?php echo oneengine_option('extra_phone_general') ?>"><span><?php echo oneengine_option('extra_phone_general') ?></span></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    
                    <?php if(oneengine_option('email_general') != '') {?>
                        <div class="contact__other">
                            <ul class="ul-reset fx -md">
                                <li>
                                    <a href="mailto:<?php echo oneengine_option('email_general') ?>">
                                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/email.svg" alt="Kenson Gas and Plumbing Contact Email">
                                    </a>
                                </li>
                                <?php if(oneengine_option('facebook') != '') {?>
                                    <li>
                                        <a href="<?php echo oneengine_option('facebook') ?>" title="Kenson Gas Facebook page" target="_blank">
                                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/facebook.png" alt="Kenson gas and plumbing facebook">
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if(oneengine_option('twitter') != '') {?>
                                    <li>
                                        <a href="<?php echo oneengine_option('twitter') ?>" title="Kenson Gas twitter page" target="_blank">
                                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/twitter.png" alt="Kenson gas and plumbing twitter">
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if(oneengine_option('instagram') != '') {?>
                                    <li>
                                        <a href="<?php echo oneengine_option('instagram') ?>" title="Kenson Gas Instagram page" target="_blank">
                                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/instagram.png" alt="Kenson gas and plumbing Instagram">
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
                
                <div class="header__footer">
                    <ul class="ul-reset fx -md">
                        <li>
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/city-guild.png" alt="Kenson gas and Plumbing City Guilds Qualified">
                        </li>
                        <li>
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/gas-safe.png" alt="Kenson gas and Plumbing Gas Safe">
                        </li>
                    </ul>
                </div>

            </div>



        </header>
    	<!-- Header / End -->

    	<?php } ?>

        <div id="content">
