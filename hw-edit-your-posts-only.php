<?php
/*
Plugin Name: Edit Your post Only
Author: Hardweb.it
Plugin URI: https://hardweb.it
Version: 1.0

Description: Makes it so normal users can see only their posts and drafts from the manage posts screen.  Great for multi-user blogs where you want users to only see posts that they have created.  Wordpress already makes it so they cannot edit the posts, but still allows them to see the titles.  This can get annoying to find your posts mixed in with thousands of others.
*/

add_filter('parse_query', 'hw_edit_your_posts_only' );
function hw_edit_your_posts_only( $wp_query ) {
    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {
        if ( !current_user_can( 'level_10' ) ) {
            global $current_user;
            $wp_query->set( 'author', $current_user->ID );
        }
    }
}
?>
