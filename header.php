<!DOCTYPE html>
<?php $options = get_option("pousada_options"); //var_dump($options);?>
<html lang="en">
    <head>
        <title><?php echo get_bloginfo('name'); ?> | <?php echo get_bloginfo('description'); ?> </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/icomoon/style.css">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/flaticon/font/flaticon.css">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/aos.css">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
        <?php wp_head(); ?>
    </head>
    <body>

        <div class="site-wrap">

            <div class="site-mobile-menu">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div> <!-- .site-mobile-menu -->


            <div class="site-navbar-wrap js-site-navbar bg-white">

                <div class="container">
                    <div class="site-navbar bg-light">
                        <div class="py-1">
                            <div class="row align-items-center">
                                <div class="col-2">

                                    <a href="<?php echo get_site_url(); ?>">
                                        <?php
                                        if (empty($options['callout_logo_site'])) {
                                            echo '<h2 class="mb-0 site-logo">';
                                            echo get_bloginfo('name');
                                            echo ' </h2>';
                                        } else {
                                            
                                            
                                            $lgWidth = empty($options['home_logo_width'])?"170":$options['home_logo_width'];
                                            echo "<img style='margin:10px!important' width='$lgWidth' src='" . $options['callout_logo_site'] . "'/>";
                                        };
                                        ;
                                        ?>
                                    </a>

                                </div>
                                <div class="col-10">
                                    <nav class="site-navigation text-right" role="navigation">
                                        <div class="container">

                                            <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                                            <ul class="site-menu js-clone-nav d-none d-lg-block">

                                                <?php
                                                $menu = wp_get_nav_menu_object("primary-menu");
                                                $menu_items = wp_get_nav_menu_items($menu->term_id);
                                                foreach ($menu_items as $it) {
                                                    echo "<li ><a  href='" . $it->url . "'>" . $it->title . "</a></li>\n";
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>