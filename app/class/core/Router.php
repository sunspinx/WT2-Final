<?php

class Router
{
    private static $mainView = "layout";
    private static $contentView = "";
    public static $lang = "";

    public static function process() {
        if (isset($_GET['p']))
            self::$contentView = $_GET['p'];
        else
            self::$contentView = 'information';
        if (preg_match('/^[a-z0-9]+$/', self::$contentView)) {
            $success = file_exists('app/view/' .self::$lang . '/' . self::$contentView . '.phtml');
            if (!$success)
                self::$contentView = 'error404';
        } else
            self::$contentView = 'error404';
    }

    public static function writeContent($type) {
        switch ($type) {
            // Rozloženie
            case "main":
                include "app/view/" . self::$mainView . ".phtml";
                break;
            // Obsah
            case "content":
                include "app/view/" . self::$lang . '/' . self::$contentView . ".phtml";
                break;
            default:
                break;
        }
    }
}