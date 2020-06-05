<?php


class Helper
{

    public static function getLanguage() {
        $lan = new Language();
        return $lan->getLanguage();
    }

    public static function setLanguage($language = "sk") {
        $lan = new Language();
        $lan->setLanguage($language);
    }

    public static function route($url) {
        $domainUrl = "https://" . $_SERVER['SERVER_NAME'] . ':4480/final';
        header("Location: $domainUrl/$url");
        header("Connection: close");
        exit;
    }

    public static function translate($language, $term){
        $lan = new Language();
        return $lan->translate($language,$term);
    }
}
