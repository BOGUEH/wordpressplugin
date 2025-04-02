<?php
/**
 * 
 * @package blessingssPlugin
 */
 class BlessingssPluginActivate{

     public static function Activate() {

        flush_rewrite_rules();
     }
}