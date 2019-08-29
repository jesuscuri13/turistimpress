<?php
/**
 * Plugin Name: A Turist Impress
 * Plugin URI: 
 * Description: A wordpress plugin for design turistic itineraries
 * Author: Oniric Studios Perú
 * Author URI: https://www.facebook.com/estudiosonirico/
 * License: MIT
 */

defined ("ABSPATH") or die ("Forbidden access to this script");  

define ("PRESSPATH", plugin_dir_path (__FILE__));
define ("PRESSFILE", __FILE__);

include ("autoload.php");

Impress\Configuration\Functions::scripts();
//Impress\Configuration\Ajax::scripts();
/*

add_filter ( "mce_buttons_3", "Functions::rai_nuevos_botones" );

add_action ( "admin_menu", "Opciones::rai_menu_administrador" );

add_action ( "wp_ajax_guardar_persona", "Functions::save_callback");
add_action ( "wp_ajax_recargar_lista", "Functions::reload_list_callback");
register_activation_hook( __FILE__, 'Opciones::install' );*/