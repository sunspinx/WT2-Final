<?php
session_start();
mb_internal_encoding("UTF-8");

// Import základných tried pre fungovanie webu
require_once 'app/class/core/Asset.php';
require_once 'app/class/core/Router.php';
require_once 'app/class/core/Db.php';
require_once 'app/class/core/Language.php';
require_once 'app/class/core/Medoo.php';
require_once 'app/class/core/Fpdf.php';
require_once 'app/class/core/tfpdf.php';
require_once 'app/class/Helper.php';

include_once('config.php');


/**
 * Načíta danú triedu
 *
 * @param $class string Názov triedy
 */
function autoLoadClass($class)
{
    require_once "app/class/" . $class . ".php";
}

Db::connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);

require_once 'vendor/autoload.php';
// Nastavenie jazyka
if(!isset($_COOKIE['language'])) {
    Helper::setLanguage();
    header("Refresh:0");
}
// Nastavanie priecinka pre assety (js/css etc.)
Asset::setRootDir("/final/public");
// Spracovanie URL a nastavenie pohladu
Router::$lang = Helper::getLanguage();
Router::process();
// Vypis hlavneho pohladu
Router::writeContent("main");
