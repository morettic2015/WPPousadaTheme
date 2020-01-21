<?php

/**
 * Functions and definitions
 *
 */
/*
 * Let WordPress manage the document title.
 */
add_theme_support('title-tag');

/*
 * Enable support for Post Thumbnails on posts and pages.
 */
add_theme_support('post-thumbnails');

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
));

/**
 * Include primary navigation menu
 */
function theme_nav_init() {
    register_nav_menus(array(
        'menu-1' => 'Primary Menu',
    ));
}

add_action('init', 'theme_nav_init');

/**
 * Register widget area.
 *
 */
function theme_widgets_init() {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar-1',
        'description' => 'Add widgets',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/scripts.min.js');
}

add_action('wp_enqueue_scripts', 'theme_scripts');

function theme_create_post_custom_post() {
    register_post_type('custom_post',
            array(
                'labels' => array(
                    'name' => __('Custom Post', 'theme'),
                ),
                'public' => true,
                'hierarchical' => true,
                'supports' => array(
                    'title',
                    'editor',
                    'excerpt',
                    'custom-fields',
                    'thumbnail',
                ),
                'taxonomies' => array(
                    'post_tag',
                    'category',
                )
    ));
}

add_action('init', 'theme_create_post_custom_post'); // Add our work type

function tutsplus_widgets_init() {

// First footer widget area, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Galeria de imagens', 'tutsplus'),
        'id' => 'gallery-widget-area',
        'description' => __('The first footer widget area', 'tutsplus'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Apartamentos', 'tutsplus'),
        'id' => 'apto-widget-area',
        'description' => __('The first footer widget area', 'tutsplus'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Imagem sobre a pousada', 'tutsplus'),
        'id' => 'pic-about-widget-area',
        'description' => __('The first footer widget area', 'tutsplus'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Sobre a pousada', 'tutsplus'),
        'id' => 'about-widget-area',
        'description' => __('The first footer widget area', 'tutsplus'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Rodapé área 1', 'tutsplus'),
        'id' => 'first-footer-widget-area',
        'description' => __('The first footer widget area', 'tutsplus'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

// Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Rodapé área 2', 'tutsplus'),
        'id' => 'second-footer-widget-area',
        'description' => __('The second footer widget area', 'tutsplus'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

// Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Rodapé Área 3', 'tutsplus'),
        'id' => 'third-footer-widget-area',
        'description' => __('The third footer widget area', 'tutsplus'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

// Fourth Footer Widget Area, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Rodapé Área 4', 'tutsplus'),
        'id' => 'fourth-footer-widget-area',
        'description' => __('The fourth footer widget area', 'tutsplus'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

// Register sidebars by running tutsplus_widgets_init() on the widgets_init hook.
add_action('widgets_init', 'tutsplus_widgets_init');

function pousada_callout_customizer($wp_customize) {

//Home call out

    $wp_customize->add_panel('pousada__homecallout_setting', array(
        'priority' => 600,
        'capability' => 'edit_theme_options',
        'title' => __('Theme config', 'pousada_'),
    ));

    $wp_customize->add_section(
            'callout_section_settings',
            array(
                'title' => __('Slider', 'pousada_'),
                'panel' => 'pousada__homecallout_setting',)
    );

    $wp_customize->add_setting('pousada_options[callout_logo_site]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pousada_options[callout_logo_site]', array(
                'label' => __('Site logo', 'pousada_'),
                'section' => 'callout_section_settings',
                'settings' => 'pousada_options[callout_logo_site]',
    )));
    
    $wp_customize->add_setting(
            'pousada_options[home_logo_width]',
            array(
                'default' => __('170', 'pousada_'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control('pousada_options[home_logo_width]', array(
        'label' => __('Logo Width', 'pousada_'),
        'section' => 'callout_section_settings',
        'type' => 'number',));
    
//Hide Home callout Section

    $wp_customize->add_setting(
            'pousada_options[home_call_out_area_enabled]',
            array(
                'default' => '',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'pousada_options[home_call_out_area_enabled]',
            array(
                'label' => __('Hide callout section from homepage', 'pousada_'),
                'section' => 'callout_section_settings',
                'type' => 'checkbox',
            )
    );

// add section to manage callout
    $wp_customize->add_setting(
            'pousada_options[home_call_out_title]',
            array(
                'default' => __('Want to say hey or find out more?', 'pousada_'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control('pousada_options[home_call_out_title]', array(
        'label' => __('Title', 'pousada_'),
        'section' => 'callout_section_settings',
        'type' => 'text',));


    $wp_customize->add_setting(
            'pousada_options[home_call_out_description]',
            array(
                'default' => 'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control('pousada_options[home_call_out_description]', array(
        'label' => __('Description', 'pousada_'),
        'section' => 'callout_section_settings',
        'type' => 'text',));

    //
//Callout Background image
    /* logo option */
    $wp_customize->add_setting('pousada_options[callout_background]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pousada_options[callout_background]', array(
                'label' => __('Background Image', 'pousada_'),
                'section' => 'callout_section_settings',
                'settings' => 'pousada_options[callout_background]',
    )));
    // add section to manage callout
    $wp_customize->add_setting(
            'pousada_options[home_call_out_title1]',
            array(
                'default' => __('Want to say hey or find out more?', 'pousada_'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control('pousada_options[home_call_out_title1]', array(
        'label' => __('Title', 'pousada_'),
        'section' => 'callout_section_settings',
        'type' => 'text',));

    $wp_customize->add_setting(
            'pousada_options[home_call_out_description1]',
            array(
                'default' => 'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control('pousada_options[home_call_out_description1]', array(
        'label' => __('Description', 'pousada_'),
        'section' => 'callout_section_settings',
        'type' => 'text',));

    //
//Callout Background image
    /* logo option */
    $wp_customize->add_setting('pousada_options[callout_background1]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pousada_options[callout_background1]', array(
                'label' => __('Background Image', 'pousada_'),
                'section' => 'callout_section_settings',
                'settings' => 'pousada_options[callout_background1]',
    )));
    // add section to manage callout
    $wp_customize->add_setting(
            'pousada_options[home_call_out_title2]',
            array(
                'default' => __('Want to say hey or find out more?', 'pousada_'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control('pousada_options[home_call_out_title2]', array(
        'label' => __('Title', 'pousada_'),
        'section' => 'callout_section_settings',
        'type' => 'text',));

    $wp_customize->add_setting(
            'pousada_options[home_call_out_description2]',
            array(
                'default' => 'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control('pousada_options[home_call_out_description2]', array(
        'label' => __('Description', 'pousada_'),
        'section' => 'callout_section_settings',
        'type' => 'text',));

    //
//Callout Background image
    /* logo option */
    $wp_customize->add_setting('pousada_options[callout_background2]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pousada_options[callout_background2]', array(
                'label' => __('Background Image', 'pousada_'),
                'section' => 'callout_section_settings',
                'settings' => 'pousada_options[callout_background2]',
    )));
    $wp_customize->add_setting(
            'pousada_options[home_about]',
            array(
                'default' => 'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control('pousada_options[home_about]', array(
        'label' => __('About home', 'pousada_'),
        'section' => 'callout_section_settings',
        'type' => 'text',));


    $wp_customize->add_setting(
            'pousada_options[home_tit1]',
            array(
                'default' => 'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control('pousada_options[home_tit1]', array(
        'label' => __('Title about', 'pousada_'),
        'section' => 'callout_section_settings',
        'type' => 'text',));

    $wp_customize->add_setting(
            'pousada_options[home_tit2]',
            array(
                'default' => 'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control('pousada_options[home_tit2]', array(
        'label' => __('Title apartments', 'pousada_'),
        'section' => 'callout_section_settings',
        'type' => 'text',));

    $wp_customize->add_setting(
            'pousada_options[home_tit3]',
            array(
                'default' => 'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control('pousada_options[home_tit3]', array(
        'label' => __('Title gallery', 'pousada_'),
        'section' => 'callout_section_settings',
        'type' => 'text',));


//Purchase Now button
    $wp_customize->add_section(
            'callout_purchase_now_settings',
            array(
                'title' => __('CTA Settings', 'pousada_'),
                'panel' => 'pousada__homecallout_setting',)
    );

    $wp_customize->add_setting(
            'pousada_options[home_call_out_btn1_text]',
            array(
                'default' => __('Purchase Now', 'pousada_'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );

    $wp_customize->add_control(
            'pousada_options[home_call_out_btn1_text]',
            array(
                'label' => __('Button Text', 'pousada_'),
                'section' => 'callout_purchase_now_settings',
                'type' => 'text',
    ));



    /* $wp_customize->add_section(
      'callout_get_in_touch_settings',
      array(
      'title' => __('Button two', 'pousada_'),
      'description' => '',
      'panel' => 'pousada__homecallout_setting',)
      ); */
    $wp_customize->add_setting(
            'pousada_options[home_call_out_btn1_link]',
            array(
                'default' => '#',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                'type' => 'option',
    ));

    $wp_customize->add_control(
            'pousada_options[home_call_out_btn1_link]',
            array(
                'label' => __('Button Link', 'pousada_'),
                'section' => 'callout_purchase_now_settings',
                'type' => 'text',
    ));

    $wp_customize->add_setting(
            'pousada_options[home_call_out_info_link]',
            array(
                'default' => '#',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                'type' => 'option',
    ));

    /* logo option */
    $wp_customize->add_setting('pousada_options[callout_background_cta]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pousada_options[callout_background_cta]', array(
                'label' => __('Background Image', 'pousada_'),
                'section' => 'callout_purchase_now_settings',
                'settings' => 'pousada_options[callout_background_cta]',
    )));


    $wp_customize->add_control(
            'pousada_options[home_call_out_info_link]',
            array(
                'label' => __('Description', 'pousada_'),
                'section' => 'callout_purchase_now_settings',
                'type' => 'text',
    ));

    $wp_customize->add_setting(
            'pousada_options[home_call_out_btn1_link_target]',
            array('capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                'type' => 'option',
    ));

    $wp_customize->add_control(
            'pousada_options[home_call_out_btn1_link_target]',
            array(
                'type' => 'checkbox',
                'label' => __('Open link in new tab', 'pousada_'),
                'section' => 'callout_purchase_now_settings',
            )
    );



    $wp_customize->add_setting(
            'pousada_options[home_whats_title]',
            array(
                'default' => __('Purchase Now', 'pousada_'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );

    $wp_customize->add_control(
            'pousada_options[home_whats_title]',
            array(
                'label' => __('Whats title', 'pousada_'),
                'section' => 'callout_purchase_now_settings',
                'type' => 'text',
    ));
    
   

    //Whatsapp title
    /*  $wp_customize->add_setting(
      'pousada_options[home_whats_exc]',
      array(
      'default' => __('LIttle desc', 'pousada_'),
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'pousada__callout_sanitize_html',
      'type' => 'option',
      )
      );

      $wp_customize->add_control(
      'pousada_options[home_whats_exc]',
      array(
      'label' => __('Whats intro...', 'pousada_'),
      'section' => 'callout_purchase_now_settings',
      'type' => 'text',
      )); */

    //Whatsapp title
    $wp_customize->add_setting(
            'pousada_options[home_whats_msg]',
            array(
                'default' => __('whats_msg', 'pousada_'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );

    $wp_customize->add_control(
            'pousada_options[home_whats_msg]',
            array(
                'label' => __('Whats message', 'pousada_'),
                'section' => 'callout_purchase_now_settings',
                'type' => 'text',
    ));

    //Whatsapp title
    $wp_customize->add_setting(
            'pousada_options[home_whats_nr]',
            array(
                'default' => __('5548996004929', 'pousada_'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );

    $wp_customize->add_control(
            'pousada_options[home_whats_nr]',
            array(
                'label' => __('Whats number', 'pousada_'),
                'section' => 'callout_purchase_now_settings',
                'type' => 'number',
    ));


// documentation area
    $wp_customize->add_setting(
            'pousada_options[home_call_out_btn2_text]',
            array(
                'default' => __('Get in Touch', 'pousada_'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );
    
     $wp_customize->add_setting(
            'pousada_options[whats_enabled]',
            array(
                'default' => __('Purchase Now', 'pousada_'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'pousada__callout_sanitize_html',
                'type' => 'option',
            )
    );

    $wp_customize->add_control(
            'pousada_options[whats_enabled]',
            array(
                'label' => __('Whatsapp button visible??', 'pousada_'),
                'section' => 'callout_purchase_now_settings',
                'type' => 'checkbox',
    ));
    
    function pousada__callout_sanitize_html($input) {
        return force_balance_tags($input);
    }

}

add_action('customize_register', 'pousada_callout_customizer');
/**
 * a:23:{s:19:"home_call_out_title";s:28:"Venha desfrutar do paraíso!";s:25:"home_call_out_description";s:33:"De frente para a Ilha do Campeche";s:20:"home_call_out_title1";s:24:"Excelente localização!";s:26:"home_call_out_description1";s:51:"Apartamentos a 50m da maravilhosa Praia do Campeche";s:26:"home_call_out_description2";s:18:"Sua casa na praia!";s:10:"home_about";s:468:"A Pousada Praia Campeche está localizada em um dos mais belos pontos turísticos de Florianópolis, a Praia do Campeche, no sul da Ilha, a apenas 50 metros do mar. <br />A  Pousada Praia Campeche possui (08) apartamentos de um dormitório, mais (02) apartamentos de dois dormitórios, e (05) suítes.<br />Hospede-se em nossa pousada e desfrute os seus melhores dias na Ilha da Magia em um lugar aconchegante e especial, cercado por paisagens naturais incomparáveis.";s:9:"home_tit1";s:9:"A Pousada";s:9:"home_tit2";s:12:"Apartamentos";s:9:"home_tit3";s:18:"Galeria de Imagens";s:20:"home_call_out_title2";s:19:"Hospede-se conosco!";s:17:"callout_logo_site";s:95:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/Logo-Pousada-escuro.png";s:18:"callout_background";s:100:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/praia-e-ilha-do-campeche.jpg";s:19:"callout_background1";s:94:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/praia-do-campeche2.jpg";s:19:"callout_background2";s:90:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/fachada-1115-1.jpg";s:15:"home_logo_width";s:3:"170";s:14:"home_whats_msg";s:34:"Quero fazer uma reserva na pousada";s:23:"home_call_out_btn1_link";s:57:"https://pousadapraiacampeche.com.br/tarifario-e-reservas/";s:22:"callout_background_cta";s:94:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/fachada-lateral222.jpg";s:23:"home_call_out_info_link";s:66:"Pacotes de Réveillon e Carnaval em até 3x no cartão de crédito";s:16:"home_whats_title";s:7:"Reserve";s:13:"home_whats_nr";s:13:"5548999724135";s:23:"home_call_out_btn1_text";s:8:"Consulte";s:13:"whats_enabled";s:0:"";}
 * a:23:{s:19:"home_call_out_title";s:28:"Venha desfrutar do paraíso!";s:25:"home_call_out_description";s:33:"De frente para a Ilha do Campeche";s:20:"home_call_out_title1";s:24:"Excelente localização!";s:26:"home_call_out_description1";s:51:"Apartamentos a 50m da maravilhosa Praia do Campeche";s:26:"home_call_out_description2";s:18:"Sua casa na praia!";s:10:"home_about";s:468:"A Pousada Praia Campeche está localizada em um dos mais belos pontos turísticos de Florianópolis, a Praia do Campeche, no sul da Ilha, a apenas 50 metros do mar. <br />A  Pousada Praia Campeche possui (08) apartamentos de um dormitório, mais (02) apartamentos de dois dormitórios, e (05) suítes.<br />Hospede-se em nossa pousada e desfrute os seus melhores dias na Ilha da Magia em um lugar aconchegante e especial, cercado por paisagens naturais incomparáveis.";s:9:"home_tit1";s:9:"A Pousada";s:9:"home_tit2";s:12:"Apartamentos";s:9:"home_tit3";s:18:"Galeria de Imagens";s:20:"home_call_out_title2";s:19:"Hospede-se conosco!";s:17:"callout_logo_site";s:95:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/Logo-Pousada-escuro.png";s:18:"callout_background";s:100:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/praia-e-ilha-do-campeche.jpg";s:19:"callout_background1";s:94:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/praia-do-campeche2.jpg";s:19:"callout_background2";s:90:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/fachada-1115-1.jpg";s:15:"home_logo_width";s:3:"170";s:14:"home_whats_msg";s:34:"Quero fazer uma reserva na pousada";s:23:"home_call_out_btn1_link";s:57:"https://pousadapraiacampeche.com.br/tarifario-e-reservas/";s:22:"callout_background_cta";s:94:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/fachada-lateral222.jpg";s:23:"home_call_out_info_link";s:66:"Pacotes de Réveillon e Carnaval em até 3x no cartão de crédito";s:16:"home_whats_title";s:7:"Reserve";s:13:"home_whats_nr";s:13:"5548999724135";s:23:"home_call_out_btn1_text";s:8:"Consulte";s:13:"whats_enabled";s:1:"1";}
 * a:24:{s:19:"home_call_out_title";s:28:"Venha desfrutar do paraíso!";s:25:"home_call_out_description";s:33:"De frente para a Ilha do Campeche";s:20:"home_call_out_title1";s:24:"Excelente localização!";s:26:"home_call_out_description1";s:51:"Apartamentos a 50m da maravilhosa Praia do Campeche";s:26:"home_call_out_description2";s:18:"Sua casa na praia!";s:10:"home_about";s:468:"A Pousada Praia Campeche está localizada em um dos mais belos pontos turísticos de Florianópolis, a Praia do Campeche, no sul da Ilha, a apenas 50 metros do mar. <br />A  Pousada Praia Campeche possui (08) apartamentos de um dormitório, mais (02) apartamentos de dois dormitórios, e (05) suítes.<br />Hospede-se em nossa pousada e desfrute os seus melhores dias na Ilha da Magia em um lugar aconchegante e especial, cercado por paisagens naturais incomparáveis.";s:9:"home_tit1";s:9:"A Pousada";s:9:"home_tit2";s:12:"Apartamentos";s:9:"home_tit3";s:18:"Galeria de Imagens";s:20:"home_call_out_title2";s:19:"Hospede-se conosco!";s:17:"callout_logo_site";s:95:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/Logo-Pousada-escuro.png";s:18:"callout_background";s:100:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/praia-e-ilha-do-campeche.jpg";s:19:"callout_background1";s:94:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/praia-do-campeche2.jpg";s:19:"callout_background2";s:90:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/fachada-1115-1.jpg";s:15:"home_logo_width";s:3:"170";s:14:"home_whats_msg";s:34:"Quero fazer uma reserva na pousada";s:23:"home_call_out_btn1_link";s:57:"https://pousadapraiacampeche.com.br/tarifario-e-reservas/";s:22:"callout_background_cta";s:94:"https://pousadapraiacampeche.com.br/wp-content/uploads/sites/22/2019/12/fachada-lateral222.jpg";s:23:"home_call_out_info_link";s:66:"Pacotes de Réveillon e Carnaval em até 3x no cartão de crédito";s:16:"home_whats_title";s:7:"Reserve";s:13:"home_whats_nr";s:13:"5548999724135";s:23:"home_call_out_btn1_text";s:8:"Consulte";s:13:"whats_enabled";s:0:"";s:30:"home_call_out_btn1_link_target";s:1:"1";}
 */