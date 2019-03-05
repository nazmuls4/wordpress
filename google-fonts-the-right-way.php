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