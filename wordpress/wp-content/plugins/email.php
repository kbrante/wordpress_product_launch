<?php

/*

Plugin Name: keiko-email

Description: Get and show emails

Author: keiko

Version: 0.1

*/

/* This line makes sure the plugin is used by Wordpress and not directly */

defined('ABSPATH') or die('Fin');

add_action('admin_menu', 'keiko_email_menu');

function keiko_email_menu() {

  add_menu_page('List of Emails', 'Emails', 'manage_options', 'menu-keiko-emails', 'keiko_email');

}

function keiko_email() {

    global $wpdb;

    $users = $wpdb->get_results("SELECT email,`first_name`,options FROM `wp-email`" );

    if ( $users ){

        echo "liste des emails"."</br>";

        foreach ( $users as $user ){

             echo $user->first_name."</br>";
             echo $user->email."</br>";
             echo $user->options."</br>";

        }

    }
}
