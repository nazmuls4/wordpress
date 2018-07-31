<?php

// add fonts 

function webmakerbd_themesold_styles_method() {
    wp_enqueue_style(
        'webmakerbd-themesold-custom-style',
        get_template_directory_uri() . '/assets/css/custom-style.css'
    );

       
        $body_fonts = cs_get_option( 'body_fonts')['family'];
        $heading_fonts = cs_get_option( 'heading_fonts')['family'];

        $custom_css = '
           body {font-family: '.$body_fonts.'} 
           h1, h2, h3, h4, h5, h6{ font-family: '.$heading_fonts.'}

        ';

        wp_add_inline_style( 'webmakerbd-themesold-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'webmakerbd_themesold_styles_method' );


