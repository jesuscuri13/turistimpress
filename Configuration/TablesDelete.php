<?php
namespace Impress\Configuration;

class TablesDelete implements IConfiguration {
    private $installPrefix = "imp_";
    /* Mysqli tables */
    public function __construct () {
        
        $this->tables = [
              "DROP TABLE IF EXISTS `{$this->installPrefix}day_item`"
            , "DROP TABLE IF EXISTS `{$this->installPrefix}day`"
            , "DROP TABLE IF EXISTS `{$this->installPrefix}item`" 
            , "DROP TABLE IF EXISTS `{$this->installPrefix}category`"
            , "DROP TABLE IF EXISTS `{$this->installPrefix}trip`"
        ];
    }

    public function run () {
        global $wpdb;
        $error = false;
        $mysqlError = "";
        for ($i = 0; $i < count($this->tables) ; $i++) {
            if ($wpdb->query ($this->tables[$i]) === false) {
                $mysqlError = "Mysql Error: " . $this->tables[$i] . " [$i] " . " " .$wpdb->last_error;
                $error = true;
                break;
            } else {  }
        }
        
        if ($error) {
            return ["", [ "Prefix" => $this->installPrefix ], $mysqlError];
        } else {
            return ["", [ ], null];
        }
        
    }
}