<?php
global $inspiry_options;
global $property_list_counter;
global $post;

$list_property = new Inspiry_Property( get_the_ID() );

/*
 * Even / Odd Class
 */
$even_odd_class = 'listing-post-odd';
if ( $property_list_counter % 2 == 0) {
    $even_odd_class = 'listing-post-even';
}

/*
 * Price title
 */
$price_title = __( 'Starting From :', 'inspiry' );
if ( !empty( $inspiry_options[ 'inspiry_property_card_price_title' ] ) ) {
    $price_title = $inspiry_options[ 'inspiry_property_card_price_title' ];
}

/*
 * Description title
 */
$desc_title = __( 'Description', 'inspiry' );
if ( !empty( $inspiry_options[ 'inspiry_property_card_desc_title' ] ) ) {
    $desc_title = $inspiry_options[ 'inspiry_property_card_desc_title' ];
}

/*
 * Button Text
 */
$button_text = __( 'View Details', 'inspiry' );
if ( !empty( $inspiry_options[ 'inspiry_property_card_button_text' ] ) ) {
    $button_text = $inspiry_options[ 'inspiry_property_card_button_text' ];
}
?>
<div class="property-listingsearch property-listing-simple property-listing-simple-1 hentry clearfix <?php //echo esc_attr( $even_odd_class ); ?>">

    <div class="property-thumbnail col-sm-4 zero-horizontal-padding">
        <?php
        /*
         * Display image gallery or thumbnail
         */
        if ( $inspiry_options[ 'inspiry_property_card_gallery' ] ) {
            inspiry_property_gallery( $list_property->get_post_ID(), intval( $inspiry_options[ 'inspiry_property_card_gallery_limit' ] ) );
        } else {
            inspiry_thumbnail();
        }
        ?>
    </div><!-- .property-thumbnail -->

    <div class="titleandmeta col-sm-8">

        <header class="entry-header product-search-header">

            <h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
    <?php
        /*
         * Description
         */
        $property_excerpt = get_inspiry_excerpt( 12 );
        if ( ! empty( $property_excerpt ) ) {
            ?>
           <!--- <h4 class="title-heading"><?php //echo esc_html( $desc_title ); ?></h4>--->
            <div class="short-desc"><p><?php echo esc_html( $property_excerpt ); ?></p></div>
            
            <?php
        }
        ?>
           <div class="property-vacant"><p><?php the_field('property_availability_type'); ?></p></div>
            <div class="price-wrapper hidden-lg">
                <span class="prefix-text"><?php echo esc_html( $price_title ); ?></span>
                <span class="price"><?php echo esc_html( $list_property->get_price_without_postfix() ); ?></span><?php
                $price_postfix = $list_property->get_price_postfix();
                if ( !empty( $price_postfix ) ) {
                    ?><span class="postfix-text"><?php echo ' ' . $price_postfix; ?></span><?php
                }
                ?>
            </div>

          
        </header>
        <div class="property-meta-listing col-sm-12">
            <ul>
                <li>  <?php
            
            $list_property_address = $list_property->get_address();
            if ( !empty( $list_property_address ) ) {
                ?><i class="fa fa-map-marker iconmaker"></i><span><?php echo esc_html( $list_property_address ); ?></span><?php
            }
            ?></li>
            
         <?php                       
        /*
         * Property meta
         */
        search_property_meta( $list_property, array( 'meta' => array( 'beds') ) );       //inspiry_property_meta( $list_property, array( 'meta' => array( 'area', 'beds', 'baths', 'garages', 'type', 'status' ) ) );
        ?> 
        
 
 <?php search_property_meta( $list_property, array( 'meta' => array( 'type') ) );?> 

               
               
                <li><div class="price-wrapper">
            <span class="prefix-text">Starting Price :  <?php //echo esc_html( $price_title ); ?></span>
            <span class="price"><?php echo esc_html( $list_property->get_price_without_postfix() ); ?></span><?php
            $price_postfix = $list_property->get_price_postfix();
            if ( !empty( $price_postfix ) ) {
                ?><span class="postfix-text"><?php echo ' ' . $price_postfix; ?></span><?php
            }
            ?>
        </div></li>
            </ul>
        </div>
        <div class="clear"></div>
       <div class="propertydescription col-md-12">
       <?php
            $content = get_the_content();
echo showBrief($content,25);
           ?>
       </div> <!-- .property-description -->
       <div class="clear"></div>
       <div class="pro-listing-search col-sm-12">
<a class="btn-default visible-md-inline-block" href="<?php the_permalink(); ?>"><?php echo esc_html( $button_text ); ?><i class="fa fa-angle-right"></i></a>
<a class="search-btn-default" href="<?php the_permalink(); ?>"><?php echo esc_html( $button_text ); ?></a>
       </div><!--.pro-listing-search--->
       

    
    </div><!-- .title-and-meta -->
</div><!-- .property-listing-simple -->