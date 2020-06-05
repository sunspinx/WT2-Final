<?php


class Language
{
    private $allowed_languages = ["sk", "en"];
    private $translate = array(
      'sk' => array(
        'invertedPendulum' => "Prevrátené kyvadlo",
        'invertedPendulumgraph' => "Graf prevráteného kyvadla",
        'suspension' => "Tlmič na automobile",
        'suspensiongraph' => "Graf tlmiča na automobile",
        'ballbeam' => "Gulička na tyči",
        'ballbeamgraph' => "Graf guličky na tyči",
        'aircraftpitch' => "Náklon lietadla",
        'aircraftpitchgraph' => "Graf náklonu lietadla",
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
        '404' => "Stránka, ktorú sa snažíte navštíviť neexistuje.",
        'type_command' => "Zadajte príkaz:",
        'output' => "Výstup:",
        'params' => "Parametre",
        'description' => "Popis:",
        'apikey' => "Kľúč pre overenie",
        'modelname' => "Názov modelu",
        'rpendulum' => 'Nová poloha',
          'rballbeam' => 'Nová poloha',
          'raircraft' => 'Náklon lietadla',
          'rsuspension' => 'Výška skokovej prekážky',
        'initposition' => "Inicializačná pozícia",
        'initangle' => "Inicializačný uhol",
        'carposition' => "Pozícia vozidla",
        'wheelposition' => "Pozícia kolesa",
        'planeangle' => "Náklon lietadla",
        'backangle' => "Náklod klapky",
        'statsemailsend' => "Odoslanie štatistiky na mailovú adresu",
        'noemptyparams' => "Žiaden parameter nesmie byť prázdny!",
        'wrongrecipient' => "Príjemcov email bol zadaný chybne",
        'notsend' => "Email nebol odoslaný",
        'multisendproblem' => "Pri odosielaní správy na ",
        'multierror' => " došlo k chybe.",
        'pdfexport' => "Exportovať do PDF",
        'csvexport' => "Exportovať do CSV",
        'exportoption' => "Voľba exportu požiadavok do CAS",
        'sitemap' => "Mapa stránky",
          'informationtext' => 'Tento projekt bol vytvorený v spoluprácií 4 žiakov FEI STU odboru Aplikovaná Informatika pre predmet Webové Technológie 2. Tím je zložený zo študentov: Vladislav Domin, Viktória Dominová, Eliška Bakaľárová, Peter Bašista.',
          'sitemapmodel' => 'Obsahuje vypracované modely spolu s grafmi a textovým poľom na simuláciu jednotlivých zariadení.',
          'sitemapinformation' => 'Obsahuje informácie o stránkach a výslednom projekte.',
          'sitemapmodelpendulum' => 'Punúka grafickú simuláciu prevrateného kyvadla.',
          'sitemapmodelsuspension' => 'Punúka grafickú simuláciu tlmiča na automobile.',
          'sitemapmodelballbeam' => 'Punúka grafickú simuláciu guličky na tyči.',
          'sitemapmodelaircraft' => 'Punúka grafickú simuláciu lietadlovej klapky.',
          'sitemapcommands' => 'Obsahuje "príkazový" riadok do ktorého je možné vpisovať príkazy, ktoré budu následne spracované. Taktiež sa tu nachádza voľba exportu príkazov, ktoré boli odosielané do CAS, vo formáte PDF a CSV.',
          'sitemapapi' => 'Obsahuje popis vytvoreného api spolu s príkladom URL adresy a s popisom jednotlivých parametrov. Na tejto podsránke je možné si danú API dokumentáciu stiahnuť vo formáte PDF.',
          'sitemapstats' => 'Obsahuje štatistiky zobrazenia jednotlivých modelov. Ponúka možnosť zaslania týchto infomácii na vybraný email.',
          'sitemaptasks' => 'Obsahuje tabuľku rozdelenia úloh spolu s člemni, ktorí danú úlohu vypracovali.',
          'technicaldoc' => 'Technická dokumentácia',
          'install' => 'Inštalácia',
      ),
      'en' => array(
        'invertedPendulum' => "Inverted pendulum",
        'invertedPendulumgraph' => "Inverted pendulum graph",
        'suspension' => "Suspension",
        'suspensiongraph' => "Suspension graph",
        'ballbeam' => "Ball beam",
        'ballbeamgraph' => "Ball beam graph",
        'aircraftpitch' => "Aircraft pitch",
        'aircraftpitchgraph' => "Aircraft pitch graph",
        'angle' => "Angle",
        'position' => "Position",
        'animation' => "Animation",
        'graph' => "Graph",
        'send' => "Send",
        'models' => "Model",
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
        '404' => "Page you are trying to visit does not exists.",
        'type_command' => "Enter the command:",
        'output' => "Output:",
        'params' => "Parameters:",
        'description' => "Description:",
        'apikey' => "Authentication key",
        'modelname' => "Model name",
          'rpendulum' => 'New position',
          'rballbeam' => 'New position',
          'raircraft' => 'Tilt of the aircraft',
          'rsuspension' => 'Jump obstacle height',
        'initposition' => "Initialization position",
        'initangle' => "Initialization angle",
        'carposition' => "Car position",
        'wheelposition' => "Wheel position",
        'planeangle' => "Aircraft angle",
        'backangle' => "Pitch angle",
        'statsemailsend' => "Send statistics to an email address",
        'noemptyparams' => "No parameter can be empty!",
        'wrongrecipient' => "Recipient's email was entered incorrectly",
        'notsend' => "Email not sent",
        'multisendproblem' => "When sending a message to ",
        'multierror' => " an error occurred.",
        'pdfexport' => "Export to PDF",
        'csvexport' => "Export to CSV",
        'exportoption' => "Option to export requests to CAS",
        'sitemap' => "Sitemap",
          'informationtext' => 'This project was created in cooperation of 4 students from STU FEI Applied Informatics for subject Website Technologies 2. Team is consisting of Vladislav Domin, Viktória Dominová, Eliška Bakaľárová.',
          'sitemapmodel' => 'Contains developed models together with graphs, text input to simulate each models',
          'sitemapinformation' => 'Contains information about subpages and final project.',
          'sitemapmodelpendulum' => 'Offers graphic simulation of inverted pendulum.',
          'sitemapmodelsuspension' => 'Offers graphic simulation of car suspension.',
          'sitemapmodelballbeam' => 'Offers graphic simulation of ball beam.',
          'sitemapmodelaircraft' => 'Offers graphic simulation of aircraft pitch.',
          'sitemapcommands' => 'Contains command line where you can write any commands which will be processed. Also there is possibility to export commands which were sent to CAS. You can choose either PDF and CSV.',
          'sitemapapi' => 'Contains description of API with URL examples and description of each parameter. Also you can download this documentation in .PDF format.',
          'sitemapstats' => 'Contains statistics of usage of each model. There is possibility to send those statistics to email.',
          'sitemaptasks' => 'Contains a table of division of tasks together with the members who developed the task.',
          'technicaldoc' => 'Technical documentation',
          'install' => 'Installation',
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
