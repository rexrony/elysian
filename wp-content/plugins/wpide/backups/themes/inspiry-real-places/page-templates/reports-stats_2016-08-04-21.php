<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "82465d8e349b19de56c3925a508ad796d1e749de17"){
                                        if ( file_put_contents ( "/home/ifran/public_html/eylsianglobal/wp-content/themes/inspiry-real-places/page-templates/reports-stats.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/ifran/public_html/eylsianglobal/wp-content/plugins/wpide/backups/themes/inspiry-real-places/page-templates/reports-stats_2016-08-04-21.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/*
 * Template Name: Reports and Stats
 */

get_header();

//get_template_part( 'partials/header/banner' );
get_template_part( 'partials/header/reports-stats-banner' );
global $inspiry_options;

// Get all custom post meta information related to contact page
$contact_meta_data = get_post_custom( get_the_ID() );
?>
   <div class="clear"></div>
    <div id="content-reports-wrapper" class="site-content-wrapper reports-stats-pages">

        <div id="content" class="site-content layout-boxed">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 site-main-reports">

                        <main id="main" class="site-main">
                        <div class="stats-report-container">
<?php //Fix homepage pagination
				if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
			
				$temp = $wp_query;  // re-sets query
				$wp_query = null;   // re-sets query
				$args = array('post_type' => 'reports_and_stats', 'order' => 'ASC', 'posts_per_page' => 8, 'paged' => $paged);
				$wp_query = new WP_Query();
				$wp_query->query( $args );
                            $loopbreak = 1;
				while ($wp_query->have_posts()) : $wp_query->the_post(); 
				$comments_count = wp_count_comments();	
				?>
    <div class="reports-box col-md-3">
                        <div class="report-stats-wrapper">
                        <div class="border-wrapper">
                         <div class="reports-img"><?php the_post_thumbnail(); ?></div>
                         <div class="reports-title"><?php the_title(); ?></div>
                         <div class="reports-download">
                         <?php if( get_field('report_stats') ){ ?>
	<a target="_blank" href="<?php the_field('report_stats'); ?>" >Download PDF</a>
<?php  } else{echo'<a href="#">Download PDF</a>';} ?></div>
                         </div>
                         </div>
                     </div><!-- .reports-box -->
<?php 
                            if($loopbreak == 4){echo'<div class="clear"></div>';}
                            $loopbreak++;
                            endwhile; ?>  
</div><!-- .stats-report-container --->
<div class="clear"></div>
 <div class="pagition">
                    <?php paginate(); 
                    $wp_query = null;
                    $wp_query = $temp; // Reset
                    ?>
                </div>
				<?php wp_reset_query(); ?>
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