<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "82465d8e349b19de56c3925a508ad796358f11c7e9"){
                                        if ( file_put_contents ( "/home/ifran/public_html/eylsianglobal/wp-content/themes/inspiry-real-places/page-templates/properties-list.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/ifran/public_html/eylsianglobal/wp-content/plugins/wpide/backups/themes/inspiry-real-places/page-templates/properties-list_2016-08-01-16.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/*
 * Template Name: Properties List - Full Width
 */

get_header('inside');

/*
 * Google Map or Banner
 */
$display_google_map = get_post_meta( get_the_ID(), 'inspiry_display_google_map', true );

if ( $display_google_map ) {
    get_template_part( 'partials/header/map' );
} else {
    get_template_part( 'partials/header/map' );
}

?>
    <div id="content-wrapper" class="site-content-wrapper site-pages">

        <div id="content" class="site-content layout-boxed">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 site-main-content">

                        <main id="main" class="site-main">
							
                            <?php
                            global $paged;
                            if ( is_front_page() ) {
                                $paged = ( get_query_var('page') ) ? get_query_var( 'page' ) : 1;
                            }

                            $properties_list_arg = array(
                                'post_type'         => 'property',
                                'paged'             => $paged,
                            );

                            // Apply properties filter
                            $properties_list_arg = apply_filters( 'inspiry_properties_filter', $properties_list_arg );

                            // Apply sorting filter
                            $properties_list_arg = apply_filters( 'inspiry_sort_properties', $properties_list_arg );

                            $properties_list_query = new WP_Query( $properties_list_arg );

                            /*
                             * Found properties heading and sorting controls
                             */
                            global $found_properties;
                            $found_properties = $properties_list_query->found_posts;
                            get_template_part( 'partials/property/templates/listing-control' );

							?>
                            <div class="main-property-wrapper">
                            <?php
                            /*
                             * Properties List
                             */
                            if ( $properties_list_query->have_posts() ) :

                                global $property_list_counter;
                                $property_list_counter = 1;

                                while ( $properties_list_query->have_posts() ) :

                                    $properties_list_query->the_post();

                                    // display property in list layout
                                    get_template_part( 'partials/property/templates/property-for-list' );

                                    $property_list_counter++;

                                endwhile;
								?>
                                </div>
                                <?php
                                inspiry_pagination( $properties_list_query );

                                wp_reset_postdata();

                            endif;
                            ?>
							
                        </main>
                        <!-- .site-main -->

                    </div>
                    <!-- .site-main-content -->

                </div>
                <!-- .row -->

            </div>
            <!-- .container -->

        </div>
        <!-- .site-content -->

    </div><!-- .site-content-wrapper -->

<?php
get_footer();
?>