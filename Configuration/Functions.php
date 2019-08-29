<?php
namespace Impress\Configuration;
defined ("PRESSPATH") or die ("Forbidden access to this script");

use Impress\Pages\Tools;
class Functions {
    public static $InstallPrefix = "imp_";
    private static function runAllClasses ($classes) {
        $config = []; $i = 0; $message = ""; $error = false; $length = count ($classes);

        try {
            for (; $i < $length; $i++) {
                if (class_exists ($classes[$i])) {
                    list($msg, $cfg, $error) = (new $classes[$i]())->run();
                    if ($error != null) {
                        $message .= $classes[$i] . " throws an error: " . $error . "\n";
                        break;
                    } else {
                        $message .= $classes[$i] . " r with a message: " . $msg . "\n";
                        $config = array_merge ($config, $cfg);
                    }
                    
                }
            }
        } catch (Exception $ex) {
            $message .= $classes[$i] . " throws an error: " . $ex->message() . "\n";
            $error = true;
        }
        return [ $config, $message, $error ];
    }
    public static function install () {

        // Install configuration
        $filename = PRESSPATH . "/installed.php"; // archivo que especifica que ha sido instalado exitosamente
        
        /*if (is_file ($filename))
            return;
        */
        $classes = [ "Impress\Configuration\Tables" ];
        list ($config, $message, $error) = self::runAllClasses ($classes);
        
        $config["message"] = $message;

        // create installed.php file
        if ($error) {
            $config["error"] = "true";
        }
        $config_str = "";
        foreach ($config as $k => $v) {
            $config_str .= "\tpublic static $" . $k . ' = "' . addslashes($v) . "\";\n";
        }
        $content = "<?php\nnamespace Impress;\ndefined (\"ABSPATH\") or die (\"Bye Bye\");\n" 
            . "class InstallConfigurations { \n" . $config_str . "}";
        $file = fopen ($filename, "w+b");
        fwrite ($file, $content);
        fclose ($file);
        
    }
    public static function uninstall () {
        $filename = PRESSPATH . "/installed.php"; // archivo que especifica que ha sido instalado exitosamente
        $classes = [ "Impress\Configuration\TablesDelete" ];
        list ($config, $message, $error) = self::runAllClasses ($classes);

        $config["message"] = $message;

        // create installed.php file
        if ($error) {
            $config["error"] = "true";
        }
        $config_str = "";
        foreach ($config as $k => $v) {
            $config_str .= "\tpublic static $" . $k . ' = "' . addslashes($v) . "\";\n";
        }
        $content = "<?php\nnamespace Impress;\ndefined (\"ABSPATH\") or die (\"Bye Bye\");\n" 
            . "class InstallConfigurations { \n" . $config_str . "}";
        $file = fopen ($filename, "w+b");
        fwrite ($file, $content);
        fclose ($file);
    }

    public static function scripts () {
        
        register_activation_hook(PRESSFILE, 'Impress\Configuration\Functions::install' );
        register_deactivation_hook(PRESSFILE, 'Impress\Configuration\Functions::uninstall' );
        //Load angular
        add_menu_page (Tools::get()->title, Tools::get()->menu,
            "manage_options", Tools::get()->slug);

        wp_enqueue_script('angularjs', plugins_url ('node_modules/angular/angular.min.js', PRESSFILE));
        wp_enqueue_script('scripts', plugins_url ('public/js/main.js', PRESSFILE), ['angularjs']);

        wp_localize_script ('scripts', 'localized', ['partials' => plugins_url ('public/', PRESSFILE)]);

    }
}