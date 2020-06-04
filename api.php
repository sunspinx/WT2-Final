<?php
session_start();
mb_internal_encoding("UTF-8");

// Import základných tried pre fungovanie webu
require_once 'app/class/core/Asset.php';
require_once 'app/class/core/Router.php';
require_once 'app/class/core/Db.php';
require_once 'app/class/core/Language.php';
require_once 'app/class/Helper.php';
require_once 'app/class/Model.php';

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

// Nastavenie jazyka
if(!isset($_COOKIE['language']))
    Helper::setLanguage();
// Nastavanie priecinka pre assety (js/css etc.)
Asset::setRootDir("/final/public");
// Spracovanie URL a nastavenie pohladu
Router::$lang = Helper::getLanguage();

$models = ["invertedpendulum", "suspension", "ballbeam", "aircraftpitch"];

if(!empty($_GET)) {
    header('Content-type:application/json;charset=utf-8');
    if(!isset($_GET['key']) || $_GET['key'] != API_KEY) {
        http_response_code(401);
        echo json_encode([
            'message' => 'Invalid key entered.',
        ]);
        return;
    }
    if(!(isset($_GET['model']) && in_array($_GET['model'], $models))) {
        http_response_code(422);
        echo json_encode([
            'message' => 'Invalid model entered.',
        ]);
        return;
    }
    if($_GET['model'] == "invertedpendulum") {
        if(!(isset($_GET['r']))) {
            http_response_code(422);
            echo json_encode([
                'message' => 'Not all parameters were set.',
            ]);
            return;
        }
        $poss = '[0;0;0;0]';
        if(isset($_GET['position']) && !empty($_GET['position'])) {
            $poss = $_GET['position'];
        }
        $out = ltrim(shell_exec('octave --no-gui --quiet --eval "pkg load control;'. Model::getInvertedPendulum($_GET['r'], $poss) .'"'));
        $arr = preg_split("/\\r\\n|\\r|\\n/", trim(explode("------", $out)[0]));
        $arr2 = preg_split("/\\r\\n|\\r|\\n/", trim(explode("------", $out)[1]));
        $arr3 = preg_split("/\\r\\n|\\r|\\n/", trim(explode("------", $out)[2]));
        $init = 0.0;
        $pos = [];
        $angle = [];
        $continue = '['. (float)trim($arr3[0]).';'.(float)trim($arr3[1]).';'.(float)trim($arr3[2]).';'.(float)trim($arr3[3]).']';

        for($i = 0; $i < sizeof($arr); $i++) {
            $pos[] = [
                'y' => (float)trim($arr[$i]),
                'x' => $init
            ];
            $angle[] = [
                'y' => (float)trim($arr2[$i]),
                'x' => $init,
            ];
            $init += 0.05;
        }

        http_response_code(200);
        echo json_encode([
            'position' => $pos,
            'angle' => $angle,
            'continue' => $continue,
        ]);
        return;
    }
    else if($_GET['model'] == "suspension") {
        if(!isset($_GET['wheel']) || !(isset($_GET['car'])) || !(isset($_GET['r']))) {
            http_response_code(422);
            echo json_encode([
                'message' => 'Not all parameters were set.',
            ]);
            return;
        }
        $out = trim(shell_exec("octave --no-gui --quiet shell/kyvadlo.txt {$_GET['r']} {$_GET['angle']} {$_GET['position']}"));
        $arr = preg_split("/\\r\\n|\\r|\\n/", trim(explode("ANGLE", $out)[0]));
        $arr2 = preg_split("/\\r\\n|\\r|\\n/", trim(explode("ANGLE", $out)[1]));
        $init = 0.0;
        $pos = [];
        $angle = [];
        for($i = 0; $i < sizeof($arr); $i++) {
            $pos[] = [
                'y' => (float)trim($arr[$i]),
                'x' => $init
            ];
            $angle[] = [
                'y' => (float)trim($arr2[$i]),
                'x' => $init,
            ];
            $init += 0.05;
        }
        http_response_code(200);
        echo json_encode([
            'position' => $pos,
            'angle' => $angle,
        ]);
        return;
    }
    else if($_GET['model'] == "ballbeam") {
        if(!isset($_GET['angle']) || !(isset($_GET['position'])) || !(isset($_GET['r']))) {
            http_response_code(422);
            echo json_encode([
                'message' => 'Not all parameters were set.',
            ]);
            return;
        }
        $out = trim(shell_exec("octave --no-gui --quiet shell/kyvadlo.txt {$_GET['r']} {$_GET['angle']} {$_GET['position']}"));
        $arr = preg_split("/\\r\\n|\\r|\\n/", trim(explode("ANGLE", $out)[0]));
        $arr2 = preg_split("/\\r\\n|\\r|\\n/", trim(explode("ANGLE", $out)[1]));
        $init = 0.0;
        $pos = [];
        $angle = [];
        for($i = 0; $i < sizeof($arr); $i++) {
            $pos[] = [
                'y' => (float)trim($arr[$i]),
                'x' => $init
            ];
            $angle[] = [
                'y' => (float)trim($arr2[$i]),
                'x' => $init,
            ];
            $init += 0.05;
        }
        http_response_code(200);
        echo json_encode([
            'position' => $pos,
            'angle' => $angle,
        ]);
        return;
    }
    else if($_GET['model'] == "aircraftpitch") {
        if(!isset($_GET['angle']) || !(isset($_GET['position'])) || !(isset($_GET['r']))) {
            http_response_code(422);
            echo json_encode([
                'message' => 'Not all parameters were set.',
            ]);
            return;
        }
        $out = trim(shell_exec("octave --no-gui --quiet shell/kyvadlo.txt {$_GET['r']} {$_GET['angle']} {$_GET['position']}"));
        $arr = preg_split("/\\r\\n|\\r|\\n/", trim(explode("ANGLE", $out)[0]));
        $arr2 = preg_split("/\\r\\n|\\r|\\n/", trim(explode("ANGLE", $out)[1]));
        $init = 0.0;
        $pos = [];
        $angle = [];
        for($i = 0; $i < sizeof($arr); $i++) {
            $pos[] = [
                'y' => (float)trim($arr[$i]),
                'x' => $init
            ];
            $angle[] = [
                'y' => (float)trim($arr2[$i]),
                'x' => $init,
            ];
            $init += 0.05;
        }
        http_response_code(200);
        echo json_encode([
            'position' => $pos,
            'angle' => $angle,
        ]);
        return;
    }
}
else {
    http_response_code(401);
}