<?php
/**
 * Twenty Twenty Child functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/* ADD PARENT THEME STYLE TO THE NEW CHILD THEME */

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/* HIDE ADMIN BAR - EDITOR ROLE */

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
    if (current_user_can('editor')) {
      show_admin_bar(false);
    }
}
