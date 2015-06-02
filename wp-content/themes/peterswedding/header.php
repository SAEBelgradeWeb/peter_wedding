<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package peterswedding
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">




<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
   

<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico" />



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="bodychild">
	
	<div id="outercontainer">
    	
        <!-- HEADER -->
        <div id="outerheader">
        	<div class="shadow-l"></div>
            <div class="shadow-r"></div>
        	<div class="container">
            
            <header id="top">
            	<div class="row">
                    <div id="logo" class="twelve columns">
                    	<span class="desc"><?php 
                    	echo bloginfo('description');

                    	 ?></span>
                        <a href="index.html"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="row">
                    <section id="navigation" class="twelve columns">
                        
                        	<?php 
                        	$args = [
                        		'container' => 'nav',
                        		'container_id' => 'nav-wrap',
                        		'menu_class' => 'sf-menu',
                        		'menu_id' => 'topnav'
                        	];

                        	wp_nav_menu($args);

                        	 ?>
                    </section>
                </div>
                <div class="clear"></div>
            </header>
            
            </div>
        </div>
        <!-- END HEADER -->