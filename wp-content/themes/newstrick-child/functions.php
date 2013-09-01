<?php

include('functions/newstrick-news-ticker-vertical-widget-temp.php');

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