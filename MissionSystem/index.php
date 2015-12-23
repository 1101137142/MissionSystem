<?php

require_once './Event.php';
$Event=new Event($_GET, $_POST);


$MODEL="Model";
require_once $MODEL.'/Model.php';

$VIEW="View";
require_once $VIEW."/KSmarty.php";


$CONTROLLER="Controller";
require_once $CONTROLLER.'/Controller.php';
$Controller=new Controller($Event);
$Controller->doAction();


$smarty = new KSmarty();
$smarty->display("NavBar.tpl");



?>

