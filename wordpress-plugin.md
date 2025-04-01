# wordpress plugins

the plugin series is more like the theme development of wordpress

in every plugins there is an index.php and you have to leave it blank. that is where all unauthorize access will go back to.

in your plugins folder there must be a file that will have thesame name as the folder which will be the name of the plugins.

inside the plugin file you write the plugin name and every other information like the comment information that is on the style.css in building a theme. but before that you will write a *comment* and the *comment* will be in this format.
```
/**
 * 
 * @package Blessingplugins
 */
```
then follow by this
```
 /* 
  Plugin Name: Blessing Plugins
  Author: Blessing Ogueh
  Version: 1.0.0
  Description: This is my first plugin and i am following a tutorial by acaledd
 */
```

the first step is to creat a security
```
if ( ! defined( 'ABSPATH' )) {
     die;
}
```
the code check if absolute path is define in the plugin and if its not define, the code exit.

```
 class AlecadddPlugin
 {
     function __construct(string $string) {
         echo $string;
     }
    }
 if ( class_exists( 'AlecadddPlugin' ) ){
    $alecadddPlugin = new AlecadddPlugin( 'Alecaddd Plugin initialized!' );
 }

```
the code above check if the class exist. if it exist, the class can be initialize if not it wont be initialize.
secondly i want to note that the construct method is call when a class is initialize but every other method has to be called first by using the arrow key
'->'.

every plugin must have three methods which are activate, deactivate and unistall
this three function are responsible for the three name above.
### Function for activating and deactivating a plugin
```
 // activation
 register_activation_hook( __FILE__, array( $alecadddPlugin, 'activate' ) );
 // deactivation
 register_deactivation_hook( __FILE___ array( $alecadddPlugin, 'deactivate' ) );
 // uninstall
 ```
 this function handle the deactivation and the activation code
 the function takes two parameter. first the the instance of the classs that the activate function is written and then the function itself
 __FILE___ this means that the hook will only work on this file
 
 ### Adding the 'add_action' to a plugin
 because the plugin method is written in a class, the way of writing is different
 and is written in an array.

 inside the class you have to write a construtive function to call your custom function.
 and to call a custom function we use the $this keyword because its inside the same class

 this is the customer function
 ```
  function custom_post_type() {
    register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
}
 ```
 and this is the construction function
 ```
   function _construct() {
        add_action( 'init', array( $this, 'custom_post_type' ));
    }
 ```

flush_rewrite_rules() 
The function flush_rewrite_rules() is used in WordPress to refresh the URL structure (permalinks) when custom post types, taxonomies, or rewrite rules are modified. This ensures that new URLs work correctly without returning 404 errors.

```
/*
// Clear Database stored data
$books = get_posts( array( 'post_type' => 'book', 'numberposts' => -1 ) );

foreach( $books as $book ) {

   wp_delete_post( $book->ID, true );
}
*/
//Access the database via SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book' " );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );

```
the above code are the two ways to clear data from the  database in wordpress
the second one allow you to use sql injection

# Enqueuing Style
```
  function enqueue() {
            // enqueue all our scripts
            wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ));
        }
```
the code above is for enqueuing css in wordpress plugin. if it was to enqueue css in theme (mypluginstyle) would have been (get_template_directory_uri()).
```function register_admin_style() {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue') );
        }
```
this function will help call the equeue function when the admin_enqueue_scripts is called


```/assets/mystyle.css``` this  indicate a folder and the file.
after this you will have to call it on the enqueue method in another method of the class or a constructor function. that is a function that will call the add_action

```function register() {
    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue
                                                                  ) );
}```
when you create a new instance, this is the function that is being called. if we change 'admin_enqueue_scripts' to 'wp_enqueue_scripts' the styling will be for the main page not the admin

### Static Function in OOP
    static function allow you to use a function without initializing it.
    **Construction** function are call during initialization.
    **other function or method** are called after initialization.

if we are using a normal method in a class we using this.

```function register_admin_style() {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue') );
        }
```
since a static function does not wait for initialization, we use the name of the class instead of the $this variable