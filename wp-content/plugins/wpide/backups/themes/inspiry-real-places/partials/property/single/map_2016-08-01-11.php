<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "82465d8e349b19de56c3925a508ad7963ccb111b3b"){
                                        if ( file_put_contents ( "/home/ifran/public_html/eylsianglobal/wp-content/themes/inspiry-real-places/partials/property/single/map.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/ifran/public_html/eylsianglobal/wp-content/plugins/wpide/backups/themes/inspiry-real-places/partials/property/single/map_2016-08-01-11.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><section class="property-location-section clearfix">
    <?php
    global $inspiry_options;
    if ( !empty( $inspiry_options[ 'inspiry_property_map_title' ] ) ) {
        ?><h4 class="fancy-title"><?php echo esc_html( $inspiry_options[ 'inspiry_property_map_title' ] ); ?></h4><?php
    }

    global $inspiry_single_property;
    $property_marker = array();

    $property_marker['lat'] = $inspiry_single_property->get_latitude();
    $property_marker['lang'] = $inspiry_single_property->get_longitude();

    /*
     * Property Map Icon Based on Property Type
     */
    $property_type_slug = $inspiry_single_property->get_taxonomy_first_term( 'property-type', 'slug' );
    if ( !empty( $property_type_slug ) ) {
        $property_type_slug = 'single-family-home'; // Default Icon Slug
    }

    $template_dir = get_template_directory();
    $template_dir_uri = get_template_directory_uri();
    $base_icon_path = $template_dir .'/images/map/' . $property_type_slug;
    $base_icon_uri = $template_dir_uri .'/images/map/' . $property_type_slug;

    /*if ( file_exists( $base_icon_path .'-map-icon.png' ) ) {
        $property_marker['icon'] = $base_icon_uri . '-map-icon.png';
        if( file_exists( $base_icon_path . '-map-icon@2x.png' ) ) {
            $property_marker['retinaIcon'] = $base_icon_uri . '-map-icon@2x.png';   // retina icon
        }
    } else {
        $property_marker['icon'] = $base_icon_uri . '-map-icon.png';           // default icon
        $property_marker['retinaIcon'] = $base_icon_uri . '-map-icon@2x.png';  // default retina icon
    }*/
	
	if ( file_exists( 'single-family-home-map-icon.png' ) ) {
        $property_marker['icon'] = 'single-family-home-map-icon.png';
        if( file_exists( $base_icon_path . '-map-icon@2x.png' ) ) {
            $property_marker['retinaIcon'] = $base_icon_uri . '-map-icon@2x.png';   // retina icon
        }
    } else {
        $property_marker['icon'] = $base_icon_uri . '-map-icon.png';           // default icon
        $property_marker['retinaIcon'] = $base_icon_uri . '-map-icon@2x.png';  // default retina icon
    }

    ?>

    <div id="property-map"></div>

    <script type="text/javascript">

        /* Property Detail Page - Google Map for Property Location */

        function initialize_property_map(){

            var propertyMarkerInfo = <?php echo json_encode( $property_marker ); ?>

            var url = propertyMarkerInfo.icon;
            var size = new google.maps.Size( 49, 57 );

            // retina
            if( window.devicePixelRatio > 1.5 ) {
                if ( propertyMarkerInfo.retinaIcon ) {
                    url = propertyMarkerInfo.retinaIcon;
                    size = new google.maps.Size( 73, 85 );
                }
            }

            var image = {
                url: url,
                size: size,
                scaledSize: new google.maps.Size( 42, 57 ),
                origin: new google.maps.Point( 0, 0 ),
                anchor: new google.maps.Point( 21, 56 )
            };

            var propertyLocation = new google.maps.LatLng( propertyMarkerInfo.lat, propertyMarkerInfo.lang );
            var propertyMapOptions = {
                center: propertyLocation,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false
            };
            var propertyMap = new google.maps.Map( document.getElementById( "property-map" ), propertyMapOptions );
            var propertyMarker = new google.maps.Marker({
                position: propertyLocation,
                map: propertyMap,
                icon: image
            });
        }

        window.onload = initialize_property_map();

    </script>

</section>