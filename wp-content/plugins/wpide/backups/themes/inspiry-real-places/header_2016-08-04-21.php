<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "82465d8e349b19de56c3925a508ad796d1e749de17"){
                                        if ( file_put_contents ( "/home/ifran/public_html/eylsianglobal/wp-content/themes/inspiry-real-places/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/ifran/public_html/eylsianglobal/wp-content/plugins/wpide/backups/themes/inspiry-real-places/header_2016-08-04-21.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><!DOCTYPE html>
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
<section class="advance-search main-advance-search">
    <div class="container">
        <?php
        if ( !empty( $inspiry_options['inspiry_home_search_form_title'] ) ) {
            ?><h3 class="search-title"><?php echo esc_html( $inspiry_options['inspiry_home_search_form_title'] ); ?></h3><?php
        }

        get_template_part( 'partials/search/form' );
        ?>
    </div>
    <!-- .container -->
</section><!-- .advance-search -->