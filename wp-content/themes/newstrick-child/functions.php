<?php

include('functions/newstrick-news-ticker-vertical-widget-temp.php');
require_once('functions/newstrick-flickr-widget.php');
require_once('functions/newstrick-one-column-category-widget.php');

function remove_widget_news_ticker_vertical(){
	remove_action('widgets_init', 'ct_v_newsticker_load_widgets');
	
}
function remove_class(){
	unregister_widget('ct_v_newsticker_Widget');
}
// Call 'remove_thematic_actions' during WP initialization
add_action('init','remove_widget_news_ticker_vertical');
add_action( 'init', 'remove_class' );

// Add our custom function to the 'thematic_header' phase
// add_action('widgets_init','fancy_theme_blogtitle', 3);

/*-----------------------------------------------------------------------------------*/
/* Get Post Meta
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'ct_get_post_meta' ) ) {
    function ct_get_post_meta($ct_postid, $ct_likes, $ct_comments, $ct_views, $ct_date, $ct_category) { ?>

        <?php if ( $ct_likes == 'true' ) { ?>
        <span class="meta-likes" title="<?php _e('Likes','color-theme-framework'); ?>">
            <?php $votes = get_post_meta( $ct_postid, "votes_count", true); 
            if ( $votes == '' ) : echo '0';
            else : echo $votes; endif;  ?>
        </span><!-- .meta-likes -->
        <?php } ?>

        <?php if ( $ct_comments == 'true' ) { ?>
        <span class="meta-comments">
            <?php comments_popup_link(__('0','color-theme-framework'),__('1','color-theme-framework'),__('%','color-theme-framework')); ?>
        </span><!-- .meta-comments -->
        <?php } ?>

        <?php if ( $ct_views == 'true' ) { ?>
        <span class="meta-views" title="<?php _e('Views','color-theme-framework'); ?>">
            <?php echo getPostViews($ct_postid); ?>
        </span><!-- .meta-views-->
        <?php } ?>

        <?php if ( $ct_date == 'true' ) { ?>
        <span class="meta-date updated" title="<?php _e('Date','color-theme-framework'); ?>">

        	<?php
        	//Working out the french date
        	if (get_locale() == 'fr_FR') {
        		
        		date_to_french();

        	}
        	else{

        		echo esc_attr( get_the_date( 'd F, Y' ) );

        	}

        	?>
        </span><!-- .meta-date-->
        <?php } ?>

        <?php if ( $ct_category == 'true' ) { ?>
        <span class="meta-category" title="<?php _e('Category','color-theme-framework'); ?>">
            <?php echo get_the_category_list(', '); ?>
        </span><!-- .meta-category-->
        <?php } ?>

<?php
    }
}

//Function that translates date to French
//Receives the format the date will be
function date_to_french(){
    //Array containing months names
    $months = array("","janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre");
    $day = get_the_date( 'd' ) ;
    $month = get_the_date('n') ;
    $year = get_the_date( 'Y' ) ;
    //Check if page is home
    if(is_home()){
        echo esc_attr( $day.' '.$months[$month] ) ;
    }
    else{
        echo esc_attr( $day.' '.$months[$month].' '.$year ) ;
    }
}