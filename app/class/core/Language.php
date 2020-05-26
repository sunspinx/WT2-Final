<?php


class Language
{
    private $allowed_languages = ["sk", "en"];

    public function setLanguage($language) {
        if($this->isLanguageAllowed($language)) {
            echo('hi');
            setcookie('language', $language, time() + (86400 * 30 * 365), "/");
            return;
        }
        $this->setLanguage($this->allowed_languages[0]);
    }

    public function getLanguage() {
        if(isset($_COOKIE['language']) && $this->isLanguageAllowed($_COOKIE['language']))
            return $_COOKIE['language'];
        $this->setLanguage($this->allowed_languages[0]);
        return $this->allowed_languages[0];
    }

    private function isLanguageAllowed($language) {
        if(in_array($language, $this->allowed_languages))
            return true;
        return false;
    }
}