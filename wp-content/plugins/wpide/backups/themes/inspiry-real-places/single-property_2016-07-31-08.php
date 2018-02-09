<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "82465d8e349b19de56c3925a508ad796cacded8ab6"){
                                        if ( file_put_contents ( "/home/ifran/public_html/eylsianglobal/wp-content/themes/inspiry-real-places/single-property.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/ifran/public_html/eylsianglobal/wp-content/plugins/wpide/backups/themes/inspiry-real-places/single-property_2016-07-31-08.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/*
 * Single property page
 */
get_header('inside');

get_template_part( 'partials/header/banner' );

/*
global $inspiry_options;

// Flag for gallery images in case of 3rd variation
global $gallery_images_exists;
$gallery_images_exists = false;


// For Demo Purposes
if ( isset( $_GET['variation'] ) ) {
    $inspiry_options[ 'inspiry_property_header_variation' ] = intval( $_GET['variation'] );
}


 * Slider for 3rd variation
 
if ( $inspiry_options[ 'inspiry_property_header_variation' ] == 3 ) {
    get_template_part( 'partials/property/single/slider-3' );
}
*/
?>

<div class="property-detail-search">
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
</div>
    <div id="content-wrapper" class="site-content-wrapper site-pages">

        <div id="content" class="site-content layout-boxed">

            <div class="container">

                <div class="container-property-single clearfix">

                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) :
                            the_post();

                            global $inspiry_single_property;
                            $inspiry_single_property = new Inspiry_Property( get_the_ID() );

                            /*
                             * Property header variation one
                             */
                            if ( $inspiry_options[ 'inspiry_property_header_variation' ] == 1 ) {
                                ?>
                                <div class="col-lg-8 zero-horizontal-padding property-slider-wrapper">
                                    <?php
                                    /*
                                     * Slider one
                                     */
                                    get_template_part( 'partials/property/single/slider' );
                                    ?>
                                </div>

                                <div class="col-lg-4 zero-horizontal-padding property-title-wrapper">
                                    <?php
                                    /*
                                     * Title
                                     */
                                    get_template_part( 'partials/property/single/title' );
                                    ?>
                                </div>
                                <?php
                            }

                            ?>
                            <div class="col-md-8 site-main-content property-single-content">

                                <main id="main" class="site-main">

                                    <article class="hentry clearfix">
                                        <?php
                                        /*
                                         * Property header variation two
                                         */
                                        if ( $inspiry_options[ 'inspiry_property_header_variation' ] == 2 ) {
                                            /*
                                             * Slider Two
                                             */
                                            get_template_part( 'partials/property/single/slider-2' );
                                        }


                                        /*
                                         * For 3rd variation
                                         */
                                        if ( $inspiry_options[ 'inspiry_property_header_variation' ] == 3 ) {
                                            if ( $gallery_images_exists ) {
                                                // for print
                                                if ( has_post_thumbnail() ) {
                                                    echo '<div id="property-featured-image" class="only-for-print">';
                                                    the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive' ) );
                                                    echo '</div>';
                                                }
                                            } else {
                                                inspiry_standard_thumbnail( 'post-thumbnail' );
                                            }
                                        }


                                        if ( $inspiry_options[ 'inspiry_property_header_variation' ] == 2 || $inspiry_options[ 'inspiry_property_header_variation' ] == 3 ) {
                                            /*
                                             * Title
                                             */
                                            get_template_part( 'partials/property/single/title' );
                                        }


                                        /*
                                         * Content - contains description, additional details, features and video
                                         */
                                        get_template_part( 'partials/property/single/content' );
                                        ?>
                                    </article>
                                    <?php
                                    /*
                                     * Map
                                     */
                                    if ( $inspiry_options[ 'inspiry_property_map' ] ) {
                                        $address = $inspiry_single_property->get_address();
                                        $location = $inspiry_single_property->get_location();
                                        if ( !empty( $address ) && !empty( $location ) ) {
                                            get_template_part( 'partials/property/single/map' );
                                        }
                                    }

                                    /*
                                     * Attachments
                                     */
                                    if ( $inspiry_options[ 'inspiry_property_attachments' ] ) {
                                        get_template_part( 'partials/property/single/attachments' );
                                    }

                                    /*
                                     * Share this property
                                     */
                                    if ( $inspiry_options[ 'inspiry_property_share' ] ) {
                                        get_template_part( 'partials/property/single/share' );
                                    }

                                    /*
                                     * Children Properties
                                     */
                                    if ( $inspiry_options[ 'inspiry_children_properties' ] ) {
                                        get_template_part( 'partials/property/single/children' );
                                    }

                                    /*
                                     * Comments
                                     */
                                    if ( $inspiry_options[ 'inspiry_property_comments' ] ) {
                                        if ( comments_open() || '0' != get_comments_number() ) :
                                            comments_template();
                                        endif;
                                    }
                                    ?>
                                </main>
                                <!-- .site-main -->

                            </div>
                            <!-- .site-main-content -->
                            <?php

                        endwhile;
                    endif;
                    ?>

                    <div class="col-md-4 zero-horizontal-padding">

                        <aside class="sidebar sidebar-property-detail">
                            <?php
                            /*
                             * Agent / Author Information
                             */
                            if ( $inspiry_options['inspiry_property_agent'] ) {
                                get_template_part ( 'partials/property/single/agent-widget' );
                            }

                            /*
                             * Similar Properties
                             */
                            if ( $inspiry_options['inspiry_similar_properties'] ) {
                                get_template_part( 'partials/property/single/similar-properties' );
                            }

                            /*
                             * Remaining Sidebar
                             */
                            if ( is_active_sidebar( 'property-sidebar' ) ) {
                                dynamic_sidebar( 'property-sidebar' );
                            }
                            ?>
                        </aside><!-- .sidebar -->

                    </div>
                    <!-- .site-sidebar-content -->

                </div>
                <!-- .container-property-single -->

            </div>
            <!-- .container -->

        </div>
        <!-- .site-content -->

    </div><!-- .site-content-wrapper -->

<?php
get_footer();