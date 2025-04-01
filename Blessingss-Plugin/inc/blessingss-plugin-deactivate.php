<?php
 /**
  * @package AlecadddPlugin
  */

 class BlessingssPluginDeactivate{

     public static function deactivate() {
        
        flush_rewrite_rules();
     }
}