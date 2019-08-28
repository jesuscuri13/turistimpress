<?php
/**
 * Plugin Name: Raiola
 * Plugin URI: 
 * Description: Raiola doesn't do nothing
 * Author: Oniric Studios Perú
 * Author URI: https://www.facebook.com/estudiosonirico/
 * License: GPL2
 */

defined ("ABSPATH") or die ("Bye Bye");

//define ("RAI_RUTA", plugin_dir_path (__FILE__));
//include_once (RAI_RUTA . "/includes/opciones.php");

/*
class Functions {
    public static $PERSONS = [
        [ "name" => "Jesús", "phone" => "980758367" ]
    ];
    public static function rai_nuevos_botones ($botones) {
        $botones[] = "fontselect";
        $botones[] = "fontsizeselect";
        $botones[] = "underline";
        return $botones;
    }
    
    public static function save_callback() {
        //$nombre = $_POST['nombre'];     /* Fijaos que las variables las recuperamos directamente de $_POST, 
        //$telefono = $_POST['telefono'];    /* con los mismos nombres que les hemos puesto en el Array de Javascript (data). 
        //$mysqli = new mysqli('mi_host', 'mi_usuario', 'mi_contraseña', 'mi_bd');     /* Conectamos con nuestra base de datos (estableced vuestros datos de conexión) 
        //$mysqli->query("INSERT INTO agenda (nombre,telefono) VALUES ('$nombre','$telefono')");   /* Insertamos los valores. 
        
        //if (!$mysqli->error) {
            echo ("Persona insertada correctamente en la agenda.");
        //} else {
        //    echo ("¡Se produjo un error!");
        //}
        die();    // Muy importante para que los resultados se devuelvan correctamente.
    }

    public static function reload_list_callback() {
        //$buttons = get_filter ( "mce_buttons_3" );
        global $wp_filters;


        foreach (self::$PERSONS as $i => $v) {
            echo ("<tr><td>" . $v["name"] . "</td><td>" . $v["phone"] . "</td></tr>");
        } // Fin del for

        echo ("<tr><td>" . json_encode ($wp_filters["mce_buttons_3"]) . "</td></tr>");
        die();
    }
}

add_filter ( "mce_buttons_3", "Functions::rai_nuevos_botones" );

add_action ( "admin_menu", "Opciones::rai_menu_administrador" );

add_action ( "wp_ajax_guardar_persona", "Functions::save_callback");
add_action ( "wp_ajax_recargar_lista", "Functions::reload_list_callback");
register_activation_hook( __FILE__, 'Opciones::install' );*/