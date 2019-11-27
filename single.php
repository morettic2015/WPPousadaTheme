<?php
/**
 * The template for displaying all pages
 *
 */
get_header();
global $post;
?>
<div class="slide-one-item home-slider owl-carousel">

    <div class="site-blocks-cover overlay" style="height: 550px;background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" data-aos="fade">

                    <h1 class="mb-2"><?php echo get_the_title(); ?></h1>
                     <h2 class="caption"><?php echo get_the_excerpt(); ?></h2>
                </div>
            </div>
        </div>
    </div>  
</div>
<div id="apartamentos" class="site-section bg-light">
    <div class="container">
        <div class="row">
            <?php echo do_shortcode($post->post_content); ?>   
        </div>
    </div>
</div>

<?php get_footer(); ?>
