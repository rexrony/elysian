<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel='stylesheet prefetch' href='<?php bloginfo('template_url'); ?>/fonts/stylesheet.css'> 
    <link href='https://fonts.googleapis.com/css?family=Tinos:400,700' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
     $("#es_txt_email_pg").attr("placeholder", "age").blur();
     document.getElementById("es_txt_email_pg").placeholder = "Type name here..";
    </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67407277-3', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body <?php body_class(); ?>>
<div class="home-header">
    <?php
    global $inspiry_options;

    /*
     * Page loader
     */
    if ( $inspiry_options[ 'inspiry_page_loader' ] == '1' ) {
        $page_loader_gif = get_template_directory_uri() . '/images/page-loader-img.gif';
        if ( !empty( $inspiry_options['inspiry_page_loader_gif']['url'] ) ) {
            $page_loader_gif = $inspiry_options['inspiry_page_loader_gif']['url'];
        }
        ?>
        <div class="page-loader">
            <img class="page-loader-img" src="<?php echo esc_url( $page_loader_gif ); ?>" alt="Loading..."/>
        </div>
        <?php
    }
    ?>

    <div id="mobile-header" class="mobile-header hidden-md hidden-lg">
        <?php get_template_part( 'partials/header/contact-number' ); ?>
        <div class="mobile-header-nav hide">
            <div class="mobile-header-nav-wrapper">
                <?php
                get_template_part( 'partials/header/user-nav' );
                get_template_part( 'partials/header/social-networks' );
                ?>
            </div>
        </div>
    </div>

    <?php

    if ( $inspiry_options[ 'inspiry_header_variation' ] == '1' ) {
        get_template_part( 'partials/header/variation-one' );
    } elseif($inspiry_options[ 'inspiry_header_variation' ] == '2') {
        get_template_part( 'partials/header/variation-two' );
    } else {
        get_template_part( 'partials/header/variation-three' );
    }
    ?>
<?php /*?><section class="advance-search main-advance-search">
    <div class="container">
        <?php
        if ( !empty( $inspiry_options['inspiry_home_search_form_title'] ) ) {
            ?><h3 class="search-title"><?php echo esc_html( $inspiry_options['inspiry_home_search_form_title'] ); ?></h3><?php
        }

        get_template_part( 'partials/search/form' );
        ?>
    </div>
    <!-- .container -->
</section><?php */?><!-- .advance-search -->