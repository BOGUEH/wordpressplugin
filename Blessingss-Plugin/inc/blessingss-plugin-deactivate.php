<?php
/**
 * 
 * @package blessingssPlugin
 */

 class BlessingssPluginDeactivate{

     public static function deactivate() {
        
        flush_rewrite_rules();
     }
}