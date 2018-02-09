<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "82465d8e349b19de56c3925a508ad796cacded8ab6"){
                                        if ( file_put_contents ( "/home/ifran/public_html/eylsianglobal/wp-content/themes/inspiry-real-places/partials/home/slider-two.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/ifran/public_html/eylsianglobal/wp-content/plugins/wpide/backups/themes/inspiry-real-places/partials/home/slider-two_2016-07-31-06.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/*
 * Homepage properties slider two
 */

global $inspiry_options;
$number_of_slides = intval( $inspiry_options[ 'inspiry_home_slides_number' ] );
if( !$number_of_slides ) {
    $number_of_slides = 3;
}

$slider_args = array(
    'post_type' => 'property',
    'posts_per_page' => $number_of_slides,
    'meta_query' => array(
        array(
            'key' => 'REAL_HOMES_add_in_slider',
            'value' => 'yes',
            'compare' => 'LIKE',
        )
    )
);

$slider_query = new WP_Query( apply_filters( 'inspiry_slider_two_query_args', $slider_args ) );

if ( $slider_query->have_posts() ) {
?>
<div class="homepage-slider slider-variation-two flexslider slider-loader">
    <ul class="slides">
    <?php
    while ( $slider_query->have_posts() ) {

        $slider_query->the_post();

        $slider_property = new Inspiry_Property( get_the_ID() );

        $slider_image = $slider_property->get_slider_image();

        if ( !empty( $slider_image ) ) {
            ?>
            <li>
                <div class="slide-overlay hidden-xs hidden-sm container">
                    <div class="slide-inner-container">

                        <div class="slide-header">
                            <h3 class="slide-entry-title entry-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_inspiry_custom_excerpt( get_the_title(), 6 ); ?></a>
                            </h3>
                        </div>
                        
                            <h3 class="slide-entry-address">
                                <?php
								/*
								 * Address
								 */
								$list_property_address = $slider_property->get_address();
								if ( !empty( $list_property_address ) ) {
									?><p class="property-address visible-lg"><?php echo esc_html( $list_property_address ); ?></p><?php
								}
								?>
                            </h3>

                        <div class="meta-item-half hidden-md">
                           <?php /*?> <?php inspiry_property_meta( $slider_property, apply_filters( 'inspiry_slider_two_meta', array( 'meta' => array( 'area', 'beds', 'baths', 'garages', 'type' ) ) ) ); ?><?php */?>
                            <?php inspiry_property_meta( $slider_property, apply_filters( 'inspiry_slider_two_meta', array( 'meta' => array( 'area', 'beds' ) ) ) ); ?>
                        </div>
						<div class="price-and-status">
                                <span class="price"><?php $slider_property->price(); ?></span>
                                <?php /*?><?php
                                $first_status_term = $slider_property->get_taxonomy_first_term( 'property-status', 'all' );
                                if ( $first_status_term ) {
                                    ?>
                                    <a href="<?php echo esc_url( get_term_link( $first_status_term ) ); ?>">
                                        <span class="property-status-tag"><?php echo esc_html( $first_status_term->name ); ?></span>
                                    </a>
                                    <?php
                                }
                                ?><?php */?>
						</div>
                        <?php
                        if ( !empty( $inspiry_options[ 'inspiry_slide_button_text' ] ) ) {
                            ?><a class="btn-default btn-orange hidden-md" href="<?php the_permalink(); ?>"><?php echo esc_html( $inspiry_options[ 'inspiry_slide_button_text' ] ); ?><!--<i class="fa fa-angle-right"></i>--></a><?php
                        }
                        ?>
                        
                    </div>
                </div>

                <?php /*?><a href="<?php the_permalink(); ?>"><?php */?>
                    <img src="<?php echo esc_url( $slider_image ); ?>" alt="<?php the_title(); ?>" />
                <?php /*?></a><?php */?>

            </li>
        <?php
        }
    }
    ?>
    </ul>
</div>
<?php
} else {
    get_template_part( 'partials/header/banner' );
}