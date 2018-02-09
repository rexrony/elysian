<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "82465d8e349b19de56c3925a508ad796358f11c7e9"){
                                        if ( file_put_contents ( "/home/ifran/public_html/eylsianglobal/wp-content/themes/inspiry-real-places/page-templates/properties-search.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/ifran/public_html/eylsianglobal/wp-content/plugins/wpide/backups/themes/inspiry-real-places/page-templates/properties-search_2016-08-01-16.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/*
 * Template Name: Properties Search
 */

get_header('inside');

?>
<div class="property-search-header">
<?php
/*
 * Google Map or Banner
 */
global $inspiry_options;
if ( $inspiry_options[ 'inspiry_search_module_below_header' ] == 'google-map' ) {
    // Image Banner
    get_template_part( 'partials/header/map' );
} else {
    // Image Banner
    get_template_part( 'partials/header/banner' );
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
</div>

    <div id="content-wrapper" class="site-content-wrapper site-pages">

        <div id="content" class="site-content layout-boxed">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 site-main-content">

                        <main id="main" class="site-main">
                            <?php
                            global $inspiry_options;

                            if ( $inspiry_options[ 'inspiry_home_search' ] && ( $inspiry_options[ 'inspiry_header_variation' ] != '1' ) ) {
                                get_template_part( 'partials/home/search' );
                                echo '<br/><br/>';
                            }


                            // Number of properties to display
                            $number_of_properties = intval( $inspiry_options[ 'inspiry_search_properties_number' ] );
                            if ( !$number_of_properties ) {
                                $number_of_properties = 6;
                            }

                            // Current Page
                            global $paged;
                            if ( is_front_page() ) {
                                $paged = ( get_query_var('page') ) ? get_query_var( 'page' ) : 1;
                            }

                            // Basic query arguments
                            $properties_search_arg = array(
                                'post_type'         => 'property',
                                'posts_per_page'    => $number_of_properties,
                                'paged'             => $paged,
                            );

                            // Apply search filter
                            $properties_search_arg = apply_filters( 'inspiry_property_search', $properties_search_arg );

                            // Apply sorting filter
                            $properties_search_arg = apply_filters( 'inspiry_sort_properties', $properties_search_arg );

                            // Create custom query
                            $properties_search_query = new WP_Query( $properties_search_arg );

                            /*
                             * Found properties heading and sorting controls
                             */
                            global $found_properties;
                            $found_properties = $properties_search_query->found_posts;
                            get_template_part( 'partials/property/templates/listing-control' );

                            /*
                             * Properties
                             */
                            if ( $properties_search_query->have_posts() ) :

                                global $property_list_counter;
                                $property_list_counter = 1;

                                $search_layout = $inspiry_options[ 'inspiry_search_layout' ];
                                if ( $search_layout == 'grid' ) {
                                    echo '<div class="row">';
                                }

                                while ( $properties_search_query->have_posts() ) :

                                    $properties_search_query->the_post();

                                    if ( $search_layout == 'grid' ) {
                                        // display property in grid layout
                                        get_template_part( 'partials/property/templates/property-for-grid' );
                                    } else {
                                        // display property in list layout
                                        get_template_part( 'partials/property/templates/property-for-list' );
                                    }

                                    $property_list_counter++;

                                endwhile;

                                if ( $search_layout == 'grid' ) {
                                    echo '</div>';
                                }

                                inspiry_pagination( $properties_search_query );

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

