<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "82465d8e349b19de56c3925a508ad7963ccb111b3b"){
                                        if ( file_put_contents ( "/home/ifran/public_html/eylsianglobal/wp-content/themes/inspiry-real-places/partials/property/single/title.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/ifran/public_html/eylsianglobal/wp-content/plugins/wpide/backups/themes/inspiry-real-places/partials/property/single/title_2016-08-01-06.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
global $inspiry_options;
global $inspiry_single_property;
?>
<div class="single-property-wrapper">
    <header class="entry-header single-property-header">
        <?php
        if ( $inspiry_options[ 'inspiry_property_header_variation' ] == 2 || $inspiry_options[ 'inspiry_property_header_variation' ] == 3 ) {
            get_template_part( 'partials/property/single/favorite-and-print' );
        }
        ?>
        <h1 class="entry-title single-property-title"><?php the_title(); ?></h1>
        <h3 class="single-property-excerpt"><?php the_excerpt(); ?></h3>
        <span class="single-property-price price"><?php $inspiry_single_property->price(); ?></span>
    </header>
    <?php inspiry_property_meta( $inspiry_single_property ); ?>
</div>
<?php
if ( $inspiry_options[ 'inspiry_property_header_variation' ] == 1 ) {
    get_template_part( 'partials/property/single/favorite-and-print' );
}