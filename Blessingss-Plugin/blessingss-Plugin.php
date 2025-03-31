<?php 

/**
 * 
 * @package blessingssPlugin
 */

 /* 
  Plugin Name: Blessingss Plugin
  Author: Blessing Ogueh
  Version: 1.0.0
  Description: This is my first plugin and i am following a tutorial by acaledd
  License: GPLv2 or later

 */

 /*
 This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
Copyright 2005-2015 Automattic, Inc.
 */


 // if ( ! defined( 'ABSPATH' ))
 // die;
 // 
defined( 'ABSPATH' ) or die( 'Hey, you can\t access this file, you silly human!' );
 


  
 class BlessingssPlugin
{

        function __construct()
        {
            add_action( 'init', array($this, 'custom_post_type' ));
        }
        
        
        function activate() {

            // generated a CPT
            $this->custom_post_type();
            // flush rewrite rules
            flush_rewrite_rules();

        }



        function deactivate() {

        // flush rewrite rules
            flush_rewrite_rules();

        }


        function uninstall() {
        // delete CPT
        //  delete - all the plugin data from the DB

        }
 

        function custom_post_type() {
            register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
        }

}

if ( class_exists( 'BlessingssPlugin' ) ) 
{
    $blessingssPlugin = new BlessingssPlugin();

 }

  // activation
  register_activation_hook( __FILE__, array( $blessingssPlugin, 'activate' ) );

   // activation
 register_deactivation_hook( __FILE__, array( $blessingssPlugin, 'deactivate' ) );


 // uninstall
 


