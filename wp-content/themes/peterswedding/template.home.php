<?php 
/*
* Template Name: Home Page
*/
get_header();

?>

        <!-- SLIDER -->
<div id="outerslider">
    <div class="container">
    <div class="row">
    <div id="slidercontainer" class="twelve columns">
    
        <section id="slider">
            <div id="slideritems" class="flexslider">
                <ul class="slides">

<?php

$args = array(
    'post_type' => 'slider'
);

// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
    
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
    ?>
    

        <li>
            <?php the_post_thumbnail('slider'); ?>
            <div class="flex-caption">
                <h1><?php the_title(); ?></h1>
                <?php the_excerpt(); ?>
            </div>
        </li>
    <?php
    }
    
} else {
    echo "No posts";
}
/* Restore original Post Data */
wp_reset_postdata();


?>


                </ul>
                <img src="<?php echo get_template_directory_uri() ?>/images/slider-shadow.png" alt="" />
            </div>
        </section>
        
    </div>
    </div>
    </div>
</div>
        <!-- END SLIDER -->

<!-- MAIN CONTENT -->
        <div id="outermain">
            <div class="container">
                <div class="row">
                    <section id="maincontent" class="twelve columns">
                    
                        <section class="content">
                        
                            <div class="highlight-content">
                               <h1><?php the_field('homepage_title', 'option') ?></h1>
                            </div>
                            <div id="featured" class="row">
                                <?php 
                                dynamic_sidebar('homepage-w');

                                 ?>
                             </div>


                                
                            <div class="separator"></div>
                            
                            <div class="row">

                            <?php 


                            $args = array (
                                'post_type' => 'page',
                                'post__in' => array(70, 74),
                                'order' => 'ASC'
                            );

                            // The Query
                            $query = new WP_Query( $args );

                            // The Loop
                            if ( $query->have_posts() ) {
                                while ( $query->have_posts() ) {
                                    $query->the_post();
                                ?>
                                <div class="one_half columns">
                                    <div class="frame10 circle">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                    </a>
                                    </div>
                                    <div class="indentleft">
                                    <h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h3>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="button">Read more <span></span></a>
                                    </div>
                                </div>

                            <?php
                                }
                            } else {
                                // no posts found
                            }

                            // Restore original Post Data
                            wp_reset_postdata();


                             ?>

                            </div> 
                             
                            
                        </section>
                    
                    </section>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->

<?php 

get_footer();
 ?>