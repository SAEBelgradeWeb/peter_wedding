<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package peterswedding
 */
get_header(); ?>

 <!-- BEFORE CONTENT -->
		<div id="outerbeforecontent">
            <div class="container">
            	<div class="row">
                <div id="beforecontent" class="twelve columns">
                    <div id="pagetitle-container">
             <?php if ( have_posts() ) : ?>
                    	<?php
					the_archive_title( '<h1 class="pagetitle">', '</h1>' );
					the_archive_description( '<span class="pagedesc">', '</span>' );
				?>
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

                            <section class="content">

					
							<?php while ( have_posts() ) : the_post(); 

							
									$date = get_the_date('M d Y');
									$ts = strtotime($date);
								

									?>
								<article class="post">
                                    <div class="date-wrapper"> 
                                        <div class="line-date"></div>
                                        <div class="date-value"><?php echo date('d', $ts) ?></div>
                                        <div class="month-value"><?php echo date('F', $ts) ?></div>
                                    </div>
                                    <div class="postimg">
                                    	<a href="<?php the_permalink() ?>">
                                       <?php the_post_thumbnail('featured-blog', ['class' => 'frame']); ?>
                                       </a>
                                    </div>
       
                                    <div class="entry-content">
                                        <h2 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <div class="entry-utility">
                                            Posted by <a href="#"><?php the_author(); ?></a>
                                        </div>
                                       <?php the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>" class="button">Read more <span></span></a>
                                    </div>
                                   
                                    <div class="clear"></div>
                                </article>
								<?php endwhile; ?>
									<?php 


										$args = [
										'prev_next' => false

										];
									 ?>
								<div class="wp-pagenavi">
									<div class="pages">Page 1 of <?php echo $wp_query->max_num_pages ?></div><?php echo paginate_links( $args ); ?>
								</div>
								<?php else : ?>

									

								<?php endif; ?>
                               
                            </section>
                         
                    </section>
                    
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->


<?php get_footer(); ?>
