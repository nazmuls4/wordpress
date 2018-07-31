<?php 


if ( ! function_exists( '' ) ) :
/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function webmakerbd_themesold_custom_font() {
    
    $fonts_url = '';
    $fonts     = array();
    $subsets   = ':100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';

    $body_fonts = cs_get_option( 'body_fonts')['family'];
    $body_fonts .= $subsets;
    $heading_fonts = cs_get_option( 'heading_fonts')['family'];
    $heading_fonts .= $subsets;



    
    if ( 'off' !== esc_html_x( 'on', 'Roboto font: on or off', 'webmakerbd-themesold' ) ) {
        $fonts[] = $body_fonts;
    }

   
    if ( 'off' !== esc_html_x( 'on', 'Roboto font: on or off', 'webmakerbd-themesold' ) ) {
        $fonts[] = $heading_fonts;
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
endif;



function webmakerbd_themesold_fonts_script() {
    
    wp_enqueue_style( 'webmakerbd-custom-fonts', webmakerbd_themesold_custom_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'webmakerbd_themesold_fonts_script' );
















main file




if ( ! function_exists( 'prefix_fonts_url' ) ) :
/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function prefix_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = '';

    /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== esc_html_x( 'on', 'Karla font: on or off', 'textdomain' ) ) {
        $fonts[] = 'Karla';
    }

    /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== esc_html_x( 'on', 'Lato font: on or off', 'textdomain' ) ) {
        $fonts[] = 'Lato';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
endif;


/**
 * Enqueue scripts and styles.
 */
function prefix_scripts() {

    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'prefix-fonts', prefix_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'prefix_scripts' );