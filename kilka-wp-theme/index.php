<?php

get_header(); ?>

<main class="wrapper" id="diseno">
    <section class="projects">
		<?php
            $loop = new WP_Query( array( 'post_type' => 'projects' ) );
            $counter = 0;
            if ( $loop->have_posts() ) :
                while ( $loop->have_posts() ) : $loop->the_post(); ?>

                   <div class="project">
                       <div class="projectHeader">
                           <h3 class="projectTitle"><?php echo get_the_title(); ?></h3>
                           <p class="projectText"><?php echo get_the_excerpt(); ?></p>
                           <p class="projectText"><?php echo get_post_meta( get_the_ID(), 'prize', true); ?></p>
                           <p class="projectClient"><?php echo get_post_meta( get_the_ID(), 'client', true); ?></p>
                       </div>
                       <div class="projectContent">
                            <div class="dragInitialization">
                               <img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/drag-left.svg" alt="Arrastra hacia tu izquierda">
                            </div>
                            <div id="carouselCont-<?php echo $counter; ?>" class="carouselCont">
                                <div id="carousel-<?php echo $counter; ?>" class="touchcarousel carousel-gallery">
                                    <ul class="touchcarousel-container">

                                          <?php if( class_exists('Dynamic_Featured_Image') ) {
                                               global $dynamic_featured_image;
                                               $featured_images = $dynamic_featured_image->get_featured_images( );
                                                    foreach( $featured_images as $images ):
                                                    //print_r ($images);
                                                        echo ' <li class="touchcarousel-item">' . wp_get_attachment_image($images['attachment_id'], 'full') . ' </li>';
                                                    endforeach;
                                           }?>

                                     </ul>
                                    </div>
                                </div>
                           </div>
                       </div>
                   </div>

                    <?php $counter++ ?>
                <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
        </section>

        <?php $the_query = new WP_Query( 'page_id=2' ); ?>

        <?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
               <?php the_content(); ?>
         <?php endwhile;?>

</main>


<?php
get_footer();
