<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package peterswedding
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

			 <!-- BEFORE CONTENT -->
			<div id="outerbeforecontent">
	            <div class="container">
	            	<div class="row">
	                <div id="beforecontent" class="twelve columns">
	                    <div id="pagetitle-container">
	                    	<h1 class="pagetitle"><?php the_title(); ?></h1>
	                    </div>
	                </div>
	                </div>
	            </div>
	        </div>
	        <!-- END BEFORE CONTENT -->

	        <!-- MAIN CONTENT -->
        <div id="outermain">
        	<div class="container">
                <div class="row">
                
                    <section id="maincontent" class="nine columns positionleft">

                            <section class="content page-content">
								<?php the_content(); ?>
                                
                                
                            </section>

                    </section>
                    
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->

			<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>
