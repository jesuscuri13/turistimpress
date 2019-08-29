<?php
namespace Impress\Configuration;

class Tables implements IConfiguration {
    private $installPrefix = "imp_";
    /* Mysqli tables */
    public function __construct () {
        
        $this->tables = [
            "CREATE TABLE `{$this->installPrefix}category` (
                `id_category` int(11) NOT NULL AUTO_INCREMENT,
                `name_category` varchar(100) NOT NULL,
                PRIMARY KEY (`id_category`)
            );" 
            , "CREATE TABLE `{$this->installPrefix}item` (
                `id_item` int(11) NOT NULL AUTO_INCREMENT,
                `id_category` int (11) NOT NULL,
                `title_item` varchar(250) NOT NULL,
                `notes_item` varchar(2500) NOT NULL,
                `price_item` decimal(10,2) NOT NULL,
                `photos_item` varchar(330) NOT NULL,
                PRIMARY KEY (`id_item`),
                CONSTRAINT FK_CategoryItem FOREIGN KEY (`id_category`) REFERENCES `{$this->installPrefix}category`(`id_category`)
            );"
            , "CREATE TABLE `{$this->installPrefix}trip` (
                `id_trip` int(11) NOT NULL AUTO_INCREMENT,
                `status_trip` ENUM('published', 'unpublished') NOT NULL,
                `price_trip` decimal(10,2) NOT NULL,
                `description_trip` varchar(500) NOT NULL,
                `timeformat_trip` ENUM('default', '24h', '12h') NOT NULL,
                `visibility_trip` ENUM('private','public') NOT NULL,
                `startdate_trip` DATE NOT NULL,
                PRIMARY KEY (`id_trip`)
            );",
            "CREATE TABLE `{$this->installPrefix}day` (
                `id_day` int(11) NOT NULL AUTO_INCREMENT,
                `id_trip` int(11) NOT NULL,
                `relative_day` int(11) NOT NULL, 
                PRIMARY KEY (`id_day`),
                CONSTRAINT FK_TripDay FOREIGN KEY (`id_trip`) REFERENCES `{$this->installPrefix}trip`(`id_trip`)
            );",
            "CREATE TABLE `{$this->installPrefix}day_item` (
                `id_day_item` int(11) NOT NULL AUTO_INCREMENT,
                `id_day` int(11) NOT NULL,
                `id_item` int(11) NOT NULL,
                `relative_day_item` int(11) NOT NULL,
                PRIMARY KEY (`id_day_item`),
                CONSTRAINT FK_DayDay_Item FOREIGN KEY (`id_day`) REFERENCES `{$this->installPrefix}day`(`id_day`),
                CONSTRAINT FK_ItemDay_Item FOREIGN KEY (`id_item`) REFERENCES `{$this->installPrefix}item`(`id_item`)
            );"
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