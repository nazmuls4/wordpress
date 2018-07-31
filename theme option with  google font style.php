//  theme options 



$options[]    = array(
        'name'      => 'grayhouse_typography',
        'title'     => esc_html__('Typography', 'grayhouse-crazycafe'),
        'icon'      => 'fa fa-font',
        'fields'    => array(
            array(
                'id'    => 'grayhouse_body_font',
                'type'  => 'typography',
                'title' => esc_html__('Body font', 'grayhouse-crazycafe'),
                'desc' => esc_html__('Select body google font & font weight.', 'grayhouse-crazycafe'),
                'default'   => array(
                    'family'  => 'Poppins',
                    'variant' => '400',
                    'font'    => 'google', // this is helper for output
                ),
            ),
            array(
                'id'    => 'grayhouse_body_font_families',
                'type'  => 'checkbox',
                'title' => esc_html__('Body font families', 'grayhouse-crazycafe'),
                'desc' => esc_html__('Select body font families you want to load.', 'grayhouse-crazycafe'),
                'options' => array(
                    '100' => '100',
                    '200' => '200',
                    '300' => '300',
                    '400' => '400',
                    '600' => '600',
                    '700' => '700',
                    '800' => '800',
                    '900' => '900',
                ),
                'default'  => array( '400', '600', '700' )
            ),
            array(
                'id'    => 'grayhouse_body_font_size',
                'type'  => 'select',
                'title' => esc_html__('Body font size', 'grayhouse-crazycafe'),
                'desc' => esc_html__('Select body font size.', 'grayhouse-crazycafe'),
                'options' => array(
                    '12' => '12 Pixels',
                    '13' => '13 Pixels',
                    '14' => '14 Pixels',
                    '15' => '15 Pixels',
                    '16' => '16 Pixels',
                    '17' => '17 Pixels',
                    '18' => '18 Pixels',
                ),
                'default'  => '15'
            ),
            array(
                'id'    => 'grayhouse_headding_font',
                'type'  => 'typography',
                'title' => esc_html__('Headding font', 'grayhouse-crazycafe'),
                'default'   => array(
                    'family'  => 'Poppins',
                    'variant' => '400',
                    'font'    => 'google', // this is helper for output
                ),
                'desc' => esc_html__('Select headding google font & font weight.', 'grayhouse-crazycafe'),
            ),
            array(
                'id'    => 'grayhouse_heading_font_families',
                'type'  => 'checkbox',
                'title' => esc_html__('Heading font families', 'grayhouse-crazycafe'),
                'desc' => esc_html__('Select heading font families you want to load.', 'grayhouse-crazycafe'),
                'options' => array(
                    '100' => '100',
                    '200' => '200',
                    '300' => '300',
                    '400' => '400',
                    '600' => '600',
                    '700' => '700',
                    '800' => '800',
                    '900' => '900',
                ),
                'default'  => array( '400', '600', '700' )
            ),
        )
    );







    On functions.php






    /**
 * Register custom fonts.
 */
function grayhouse_crazycafe_fonts_url() {
    $fonts_url = '';

    $grayhouse_body_font = cs_get_option('grayhouse_body_font');
    $grayhouse_headding_font = cs_get_option('grayhouse_headding_font');
    $grayhouse_body_font_families = cs_get_option('grayhouse_body_font_families');
    $grayhouse_headding_font_families = cs_get_option('grayhouse_headding_font_families');

    if(!empty($grayhouse_body_font)) {
        $grayhouse_body_font = cs_get_option('grayhouse_body_font')['family'];
    } else {
        $grayhouse_body_font = 'Poppins';
    }
    if(!empty($grayhouse_headding_font)) {
        $grayhouse_headding_font = cs_get_option('grayhouse_headding_font')['family'];
    } else {
        $grayhouse_headding_font = 'Poppins';
    }
    if(!empty($grayhouse_body_font_families)) {
        $grayhouse_body_font_families_get = cs_get_option('grayhouse_body_font_families');
        $grayhouse_body_font_families = implode(',',$grayhouse_body_font_families_get);
    } else {
        $grayhouse_body_font_families = '300,300i,400,400i,600,600i,700,700i';
    }
    if(!empty($grayhouse_headding_font_families)) {
        $grayhouse_headding_font_families_get = cs_get_option('grayhouse_headding_font_families');
        $grayhouse_headding_font_families = implode(',',$grayhouse_headding_font_families_get);
    } else {
        $grayhouse_headding_font_families = '300,300i,400,400i,600,600i,700,700i';
    }

    $font_families = array();

    $font_families[] = ''.esc_html($grayhouse_body_font).':'.esc_attr($grayhouse_body_font_families).'';

    if($grayhouse_headding_font != $grayhouse_body_font) {

    $font_families[] = ''.esc_html($grayhouse_headding_font).':'.esc_attr($grayhouse_headding_font_families).'';

    }

    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    return esc_url_raw( $fonts_url );
}









On theme-style.php







$grayhouse_body_font = cs_get_option('grayhouse_body_font');
    $grayhouse_headding_font = cs_get_option('grayhouse_headding_font');
    $grayhouse_body_font_size = cs_get_option('grayhouse_body_font_size');

    if(!empty($grayhouse_body_font)) {
        $grayhouse_body_font = cs_get_option('grayhouse_body_font')['family'];
        $grayhouse_body_font_variant = cs_get_option('grayhouse_body_font')['variant'];
    } else {
        $grayhouse_body_font = 'Poppins';
        $grayhouse_body_font_variant = '400';
    }

    if(!empty($grayhouse_headding_font)) {
        $grayhouse_headding_font = cs_get_option('grayhouse_headding_font')['family'];
        $grayhouse_headding_font_variant = cs_get_option('grayhouse_headding_font')['variant'];
    } else {
        $grayhouse_headding_font = 'Poppins';
        $grayhouse_headding_font_variant = '400';
    }

    
    wp_enqueue_style(
        'grayhouse-custom',
        get_template_directory_uri() . '/assets/css/custom.css'
    );
    
    
    $grayhouse_page_custom_css = '
        body {
            font-family: '.esc_html($grayhouse_body_font).', sans-serif;
            font-weight: '.esc_html($grayhouse_body_font_variant).'
        }
    ';

    if($grayhouse_headding_font != $grayhouse_body_font) {

    $grayhouse_page_custom_css .= '
        h1, h2, h3, h4, h5, h6 {
            font-family: '.esc_html($grayhouse_headding_font).', sans-serif;
        }
    ';

    }