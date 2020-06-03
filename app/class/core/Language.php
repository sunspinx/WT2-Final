<?php


class Language
{
    private $allowed_languages = ["sk", "en"];
    private $translate = array(
      'sk' => array(
        'invertedPendulum' => "Prevrátené kyvadlo",
        'suspension' => "Tlmič na automobile",
        'ballbeam' => "Gulička na tyči",
        'aircraftpitch' => "Náklon lietadla",
        'angle' => "Uhol",
        'position' => "Pozícia",
        'animation' => "Animácia",
        'graph' => "Graf",
        'send' => "Odoslať",
        'models' => "Modely",
        'commands' => "Príkazy",
        'api' => "API",
        'stats' => "Štatistiky",
        'tasks' => "Rozdelenie úloh",
        'task' => "Úloha",
        'information' => "Informácie",
        'creator' => "Autor",
        'webbase' => "Základná štruktúra webu",
        'design' => "Dizajn",
        'multilanguage' => "Multijazyčnosť",
        'subpage_content' => "Obsah podstránok",
        'com_web_octave' => "Komunikácia WEB <=> Octave",
        'log' => "Logovanie",
        'emailSend' => "Odosielanie na mail",
        'pdfexport' => "Export do PDF",
        'csvexport' => "Export do CSV",
        '404' => "Stránka, ktorú sa snažíte navštíviť neexistuje.",
        'type_command' => "Zadajte príkaz:",
        'output' => "Výstup:",
        'params' => "Parametre:",
        'description' => "Popis:",
        'apikey' => "Kľúč pre overenie",
        'modelname' => "Názov modelu",
        'rvalue' => 'Hodnota "R"',
        'initposition' => "Inicializačná pozícia",
        'initangle' => "Inicializačný uhol"
      ),
      'en' => array(
        'invertedPendulum' => "Inverted pendulum",
        'suspension' => "Suspension",
        'ballbeam' => "Ball beam",
        'aircraftpitch' => "Aircraft pitch",
        'angle' => "Angle",
        'position' => "Position",
        'graph' => "Graph",
        'send' => "Send",
        'models' => "Models",
        'commands' => "Commands",
        'api' => "API",
        'stats' => "Statistics",
        'tasks' => "Tasks",
        'task' => "Task",
        'information' => "Information",
        'creator' => "Author",
        'webbase' => "Basic structure of web",
        'design' => "Design",
        'multilanguage' => "Multilanguage support",
        'subpage_content' => "Content of subpages",
        'com_web_octave' => "Communication WEB <=> Octave",
        'log' => "Logging",
        'emailSend' => "Emailing",
        'pdfexport' => "Export to PDF",
        'csvexport' => "Export to CSV",
        '404' => "Page you are trying to visit does not exists.",
        'type_command' => "Enter the command:",
        'output' => "Output:",
        'params' => "Parameters:",
        'description' => "Description:",
        'apikey' => "Authentication key",
        'modelname' => "Model name",
        'rvalue' => '"R" value',
        'initposition' => "Initialization position",
        'initangle' => "Initialization angle"
      )
    );

    public function setLanguage($language) {
        if($this->isLanguageAllowed($language)) {
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

    public function translate($language, $term){
      echo $this->translate[$language][$term];
    }
}
