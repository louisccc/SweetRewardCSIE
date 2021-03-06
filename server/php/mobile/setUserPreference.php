<?php
require_once("../db.php");
$db = DB::getInstance(Config::read('db.host'), Config::read('db.basename'), Config::read('db.user'), Config::read('db.password'));
if(isset($_GET['token']) && isset($_GET['temperature_threshold']) && isset($_GET["light_threshold"]) && isset($_GET["micro_threshold"])){
    $token = $_GET['token'];
    $user_id = $db->getUserIdByToken($token);
    $temp = $_GET["temperature_threshold"];
    $light = $_GET["light_threshold"];
    $micro = $_GET["micro_threshold"];
    if($user_id != null){
        $result = $db->setUserPreference($user_id, $temp, $light, $micro);
    }
}
?>
