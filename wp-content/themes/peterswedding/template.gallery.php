<?php 
/*
* Template Name: Gallery
*
*/
get_header(); ?>

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

                            <section class="content">

								
<?php 

							// WP_Query arguments
							$args = array (
								'post_type' => 'gallery'
							);

							// The Query
							$query = new WP_Query( $args );

							// The Loop
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();
									$date = get_the_date('M d Y');
									$ts = strtotime($date);
								

									?>
								<article class="post">
                                    <div class="date-wrapper"> 
                                        <div class="line-date"></div>
                                        <div class="date-value"><?php echo date('d', $ts) ?></div>
                                        <div class="month-value"><?php echo date('F', $ts) ?></div>
                                    </div>
                                    <div id="gallery" class="row">

                                    <?php 
                                        $images = get_field('gallery');
                                        foreach ($images as $image) {
                                            //var_dump($image);
                                          ?>
                                         <div class="one_fifth columns">
                                            <a class="image frame" href="<?php echo $image['sizes']['featured-blog'] ?>" data-rel="prettyPhoto[mixed]">
                                            <span class="rollover"></span>
                                            <span class="zoom"></span>
                                            <img alt="" src="<?php echo $image['sizes']['featured-blog'] ?>" />
                                            </a>
                                        </div>

                                          <?php
                                        }

                                     ?>
                                       
                                        
                                        <div class="clear"></div>
                                        <div class="entry-content">
                                            <h2 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                                           <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                   
                                    <div class="clear"></div>
                                </article>

									<?php
								}
							} else {
								// no posts found
							}

							// Restore original Post Data
							wp_reset_postdata();
 ?>
                                
								    <?php 


                                        $args = [
                                        'prev_next' => false,
                                        'total' => $query->max_num_pages

                                        ];
                                     ?>
                                <div class="wp-pagenavi">
                                    <div class="pages">Page 1 of <?php echo $query->max_num_pages ?></div><?php echo paginate_links( $args ); ?>
                                </div>
                            </section>
                         
                    </section>
                    
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
<?php get_footer(); ?>