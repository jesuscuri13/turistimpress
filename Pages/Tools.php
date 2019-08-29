<?php
namespace Impress\Pages;
defined ("PRESSPATH") or die ("Forbidden access to this script");

class Tools {
    private static $INSTANCE = null;
    public function get() {
        if (self::$INSTANCE == null) {
            self::$INSTANCE = new self();
        }
        return self::$INSTANCE;
    }
    private function __construct () {
        $this->menu = "Turist Impress Tools";
        $this->title = "Turist Impress Tools";
        $this->capability = "manage_options";
        $this->slug = PRESSPATH . "/public/index.php";
    }
}