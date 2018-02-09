<?php
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
    <?php /*?><?php inspiry_property_meta( $inspiry_single_property ); ?><?php */?>
    <?php inspiry_property_meta( $inspiry_single_property, array( 'meta' => array( 'beds', 'location', 'type'  ) ) );?>
</div>
<?php
if ( $inspiry_options[ 'inspiry_property_header_variation' ] == 1 ) {
    get_template_part( 'partials/property/single/favorite-and-print' );
}