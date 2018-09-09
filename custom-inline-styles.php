<?php 




// add custom style

function webmakerbd_theme_styles_method() {
        wp_enqueue_style(
            'webmakerbd-theme-custom-style',
            get_template_directory_uri() . '/assets/css/custom-style.css'
        );

         $body_font_color = cs_get_option('body_font_color');
         $theme_color = cs_get_option('theme_color');
         $sec_theme_color = cs_get_option('sec_theme_color');
         $breadcum_verly = cs_get_option('breadcum_verly');
         $preloader_color = cs_get_option('preloader_color');
         $preloader_spin_color = cs_get_option('preloader_spin_color');
         $body_bg = cs_get_option('body_bg');
         $background_size = cs_get_option('background_size');
         $background_reapeat = cs_get_option('background_reapeat');
         $background_attachment = cs_get_option('background_attachment');
         $enable_color_options = cs_get_option('enable_color_options');
         $box_layout_switcher = cs_get_option('box_layout_switcher');
         $footer_color = cs_get_option('footer_color');
         $footer_text_color = cs_get_option('footer_text_color');
         $footer_heading_color = cs_get_option('footer_heading_color');


         $body_image_array = wp_get_attachment_image_src( $body_bg, 'large');

         
         
               $custom_css = '
                 body { color: '.$body_font_color.';}
                 .main-menu ul li.client-btn a, .slider-btn a.filled, .common-title-area h2::after, .common-title-area h2::before, .about-box-icon-table-cell i.fa, .about-box-content .about-box-link:hover, .service-box-wrapper:hover .service-box-icon, .webmakerbd-common-button a, .choose-box-wrapper:hover .choose-box-icon-table-cell i.fa, .webmakerbd_testimonial_list .owl-controls .owl-dots div, .pricing-btn a, .footer-top-subscribe, div.menu-service-container ul li.current-menu-item, div.menu-service-container ul li:hover, .cta-rest .wpb_wrapper, div.menu-service-container ul li.current-menu-item, .project-row-shorting-list li::after, .blog-item article .read_more, button, input[type="button"], input[type="submit"], .nav-links a, .comment-list li .reply a { background-color: '.$theme_color.';}
                 .slider-btn a.filled, .about-box-wrapper:hover , .about-box-content .about-box-link, .service-box-wrapper:hover .service-box-icon, .service-box-wrapper:hover .service-box-content, div.menu-service-container ul, div.menu-service-container ul li, div.menu-service-container ul li:hover, .serrvice-single-content-of-analysis ul li::before , div.menu-service-container ul li.current-menu-item, button, input[type="button"], input[type="submit"]{ border-color: '.$theme_color.';}
                 .client-meta p span a, .pricing-box-icon-table-cell i.fa, .serrvice-single-content-of-analysis ul li::before, .member-icons ul li a, .project-row-shorting-list li.active, .blog-item article .entry-meta a, .blog-item article .entry-footer a, .breadcum-navxt a { color: '.$theme_color.';}
                 .pricing-box-content:hover { box-shadow: 0px 0px 10px '.$theme_color.';} 


                 .es_button input[type="button"], .breadcum-area-bottom, .contact-list-area .wpb_wrapper {background: '.$sec_theme_color.'}
                  .breadcum-title h1 {color: '.$sec_theme_color.'}
                  .es_button input[type="button"] {border-color: '.$sec_theme_color.'}



                  .breadcum-area-bottom-overlay { background: '.$breadcum_verly.';}

                  .preloader-wrapper .spinner .double-bounce1 {
                      background: '.$preloader_spin_color.';
                    }
                  .preloader-wrapper {
                    background: '.$preloader_color.';
                  }

                

              ';




          if ($box_layout_switcher == true) {
            $custom_css .='
              body {

                background-image: url('.$body_image_array[0].');
                background-size: '.$background_size.';
                background-attachment: '.$background_attachment.';
                background-repeat:'.$background_reapeat.';

              }

            ';
          }

          if (!empty($footer_color)) {
            $custom_css .='
              .footer-area {
                background: '.$footer_color.';
              }

            ';
          }
          if (!empty($footer_text_color)) {
            $custom_css .='
              .footer-sidebar-content, .footer-sidebar-content a, .site-logo.footer-logo p, .footer-bottom p{color:'.$footer_text_color.';}

            ';
          }
          if (!empty($footer_heading_color)) {
            $custom_css .='
              .site-logo.footer-logo h1 a, .footer-sidebar-content .widget-title{color:'.$footer_heading_color.';}

            ';
          }

        wp_add_inline_style( 'webmakerbd-theme-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'webmakerbd_theme_styles_method' ); 
