<?php
/**
 * The template for displaying all single posts.
 *
 * @package peterswedding
 */


get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php 

									$date = get_the_date('M d Y');
									$ts = strtotime($date);

				 ?>
			 <!-- BEFORE CONTENT -->
			<div id="outerbeforecontent">
	            <div class="container">
	            	<div class="row">
	                <div id="beforecontent" class="twelve columns">
	                    <div id="pagetitle-container">
	                    	<h1 class="pagetitle"><?php the_title(); ?></h1>
	                    	<span class="pagedesc">Posted by <?php the_author_posts_link(); ?></span>
	                    </div>
	                </div>
	                </div>
	            </div>
	        </div>
	        <!-- END BEFORE CONTENT -->

	       <div id="outermain">
        	<div class="container">
                <div class="row">
                
                    <section id="maincontent" class="nine columns positionleft">

                            <section class="content">

								<article class="post">
                                    <div class="date-wrapper"> 
                                        <div class="line-date"></div>
                                        <div class="date-value"><?php echo date('d', $ts) ?></div>
                                        <div class="month-value"><?php echo date('F', $ts) ?></div>
                                    </div>
       
                                    <div class="entry-content">
                                       <?php the_content() ?>

                                    </div>
                                   
                                    <div class="clear"></div>
                                </article>
                                
                                <h3>About Author <?php echo get_the_author_meta('ID') ?></h3>
                                <div class="author">
                                    <div class="avatar circle"><img src="<?php echo get_avatar_url_2(get_avatar( get_the_author_meta( 'ID' ), 62 )); ?>" class=""></div>
                                    <cite class="fn"><?php the_author_meta('full_name') ?></cite>
                                    <p><?php the_author_meta('description') ?></p>
                                </div>
                                
								<section id="comment">
                                <?php comments_template(); ?>
                                  </section>

                            </section>
                         
                    </section>
                    
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->

			<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>

