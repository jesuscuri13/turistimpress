<?php
namespace Impress\Configuration;
defined ("PRESSPATH") or die ("Forbidden access to this script");

class Ajax {
    public static function call ($controller) {
        $namespace = "Impress\\Controllers\\";
        $code = 200;
        $error = "";
        try {
            if (class_exists ($controller)) {
                
            } else {
                throw new Exception ("The class doesn't exists");
            }

        } catch (Exception $ex) {
            echo json_encode ([ "error" => $ex->getMessage() ]);
        }
        
    }
    public static function callItems() {
        echo "lasdj";
    }
    public static function scripts () {
        // 
        add_action ( "wp_ajax_items", "Impress\\Configuration\\Ajax::callItems");

    }

}