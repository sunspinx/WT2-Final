<?php
session_start();
mb_internal_encoding("UTF-8");
ini_set('display_errors', 1); // Pri produkcii vypnut
error_reporting(E_ERROR | E_WARNING | E_PARSE); // Pri produkcii vypnut


// Import základných tried pre fungovanie webu
require_once 'app/class/core/Asset.php';
require_once 'app/class/core/Router.php';
require_once 'app/class/core/Db.php';
require_once 'app/class/core/Language.php';
require_once 'app/class/Helper.php';

/**
 * Načíta danú triedu
 *
 * @param $class string Názov triedy
 */
function autoLoadClass($class)
{
    require_once "app/class/" . $class . ".php";
}

include_once('config.php');
try {
    Db::connect(HOSTNAME, DBNAME, USERNAME, PASSWORD);
}
catch(PDOException $e) {
    echo($e->getMessage());
}

// Nastavenie jazyka
if(!isset($_COOKIE['language']))
    Helper::setLanguage();
// Nastavanie priecinka pre assety (js/css etc.)
Asset::setRootDir("/final/public");
// Spracovanie URL a nastavenie pohladu
Router::$lang = Helper::getLanguage();
Router::process();
// Vypis hlavneho pohladu
Router::writeContent("main");