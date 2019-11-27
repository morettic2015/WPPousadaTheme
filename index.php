<?php get_header(); ?>
<?php $options = get_option("pousada_options"); ?>

<div class="slide-one-item home-slider owl-carousel">

    <div class="site-blocks-cover overlay" style="background-image: url(<?php echo $options['callout_background']; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" data-aos="fade">

                    <h1 class="mb-2"><?php echo $options['home_call_out_title']; ?></h1>
                    <h2 class="caption"><?php echo $options['home_call_out_description']; ?></h2>
                </div>
            </div>
        </div>
    </div>  

    <div class="site-blocks-cover overlay" style="background-image: url(<?php echo $options['callout_background1']; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" data-aos="fade">
                    <h1 class="mb-2"><?php echo $options['home_call_out_title1']; ?></h1>
                    <h2 class="caption"><?php echo $options['home_call_out_description1']; ?></h2>
                </div>
            </div>
        </div>
    </div> 

    <div class="site-blocks-cover overlay" style="background-image: url(<?php echo $options['callout_background2']; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" data-aos="fade">
                    <h1 class="mb-2"><?php echo $options['home_call_out_title2']; ?></h1>
                    <h2 class="caption"><?php echo $options['home_call_out_description2']; ?></h2>
                </div>
            </div>
        </div>
    </div> 

</div>




<div class="site-section bg-white" id="sobre">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 mb-5 mb-md-0">

                <div class="img-border">
                    <?php dynamic_sidebar('pic-about-widget-area'); ?>              
                </div>

            </div>
            <div id="sobre" class="col-md-6 ml-auto">


                <div class="section-heading text-left ">
                    <h2 class="mb-5"><?php echo $options['home_tit1']; ?></h2>
                </div>
                <p class="mb-4">
                    <?php echo $options['home_about']; ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div id="apartamentos" class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                <h2 class="mb-5"><?php echo $options['home_tit2']; ?></h2>
            </div>
        </div>
        <div class="row">
            <?php dynamic_sidebar('apto-widget-area'); ?>       
        </div>
    </div>
</div>

<div class="py-5 upcoming-events" style="background-image: url('<?php echo $options['callout_background_cta']; ?>'); background-attachment: fixed;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <center>
                    <h2 class="text-white"><?php echo $options['home_call_out_info_link']; ?></h2>
                    <a href="<?php echo $options['home_call_out_btn1_link']; ?>" class="text-white btn btn-outline-warning rounded-0 text-uppercase"><?php echo $options['home_call_out_btn1_text']; ?></a>
                </center>
            </div>

        </div>

    </div>
</div>

<div class="site-section bg-light" id="galeria">
    <div class="container" >
        <div class="row">
            <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                <h2 class="mb-5"><?php echo $options['home_tit3']; ?></h2>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-6 mx-auto text-center">
            <center>
                <?php dynamic_sidebar('gallery-widget-area'); ?>
            </center>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
