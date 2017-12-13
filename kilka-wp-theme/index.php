<?php

get_header(); ?>

<main>

		<?php
            $loop = new WP_Query( array( 'post_type' => 'projects' ) );
            $counter = 0;
            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post(); ?>

                           <div class="project">
                               <div class="projectHeader">
                                   <h3 class="projectTitle"><?php echo get_the_title(); ?></h3>
                                   <p class="projectText"><?php echo get_the_excerpt(); ?></p>
                                   <p class="projectClient"><?php echo get_post_meta( get_the_ID(), 'client', true); ?></p>
                               </div>
                               <div class="projectCarousel" id="carousel-<?php echo $counter; ?>">

                                      <?php if( class_exists('Dynamic_Featured_Image') ) {
                                           global $dynamic_featured_image;
                                           $featured_images = $dynamic_featured_image->get_featured_images( );
                                                foreach( $featured_images as $images ):
                                                    echo '<div><img src="'.$images['full'].'" alt=""></div>';
                                                endforeach;
                                       }?>







                               </div>
                           </div>

                    <?php $counter++ ?>
                <?php endwhile;

            endif;
            wp_reset_postdata();
        ?>

</main>


<?php
get_footer();
