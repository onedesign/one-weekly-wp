<?php
/**
 * Custom functions
 */

// custom RSS Issues feed template

remove_all_actions( 'do_feed_rss2' );
add_action( 'do_feed_rss2', 'issues_feed', 10, 1 );

function issues_feed( $for_comments ) {
    $rss_template = get_template_directory() . '/feeds/feed-issues-rss2.php';
    if( get_query_var( 'post_type' ) == 'issue' and file_exists( $rss_template ) )
        load_template( $rss_template );
    else
        do_feed_rss2( $for_comments ); // Call default function
}