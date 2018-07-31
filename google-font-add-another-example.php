<?php

$frozen_body_font_get = cs_get_option('frozen_body_font');
$frozen_heading_font_get = cs_get_option('frozen_headding_font');

function frozen_crazycafe_body_gf_url() {
    $font_url = '';
    $frozen_body_font_get = cs_get_option('frozen_body_font');
    if(array_key_exists('family', $frozen_body_font_get)) {
        $frozen_body_font_get_family = $frozen_body_font_get['family'];
    } else {
        $frozen_body_font_get_family = 'Titillium Web';
    }
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'frozen-crazycafe' ) ) {
        $font_url = add_query_arg( 'family', urlencode( ''.$frozen_body_font_get_family.':300,300i,400,400i,700,700i,900,900i&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

if($frozen_heading_font_get['family'] == $frozen_body_font_get['family']) {} else {
    function frozen_crazycafe_heading_gf_url() {
        $font_url = '';
        $frozen_heading_font_get = cs_get_option('frozen_headding_font');
        if(array_key_exists('family', $frozen_heading_font_get)) {
            $frozen_heading_font_get_family = $frozen_body_font_get['family'];
        } else {
            $frozen_heading_font_get_family = 'Titillium Web';
        }
        
        /*
        Translators: If there are characters in your language that are not supported
        by chosen font(s), translate this to 'off'. Do not translate into your own language.
         */
        
        if ( 'off' !== _x( 'on', 'Google font: on or off', 'frozen-crazycafe' ) ) {
            $font_url = add_query_arg( 'family', urlencode( ''.$frozen_heading_font_get['family'].':300,300i,400,400i,700,700i,900,900i&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
        }
        return $font_url;
    }    
}

function frozen_crazycafe_options_gf() {
    wp_enqueue_style( 'frozen-crazycafe-custom-google-fonts', frozen_crazycafe_body_gf_url(), array(), '1.0.0' );
    
    $frozen_body_font_get = cs_get_option('frozen_body_font');
    $frozen_heading_font_get = cs_get_option('frozen_headding_font');
    if($frozen_heading_font_get['family'] == $frozen_body_font_get['family']) {} else {
        wp_enqueue_style( 'frozen-crazycafe-google-heading-fonts', frozen_crazycafe_heading_gf_url(), array(), '1.0.0' );
    }
}
add_action( 'wp_enqueue_scripts', 'frozen_crazycafe_options_gf' );  