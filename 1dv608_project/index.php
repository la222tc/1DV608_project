<?php

//Initialize session
session_set_cookie_params(0);
session_start();
//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('view/RockPaperScissorsView.php');
require_once('view/ToDoListView.php');

require_once('model/Login.php');
require_once('model/ListOfUsers.php');
require_once('model/RegisterUser.php');
require_once('model/User.php');
require_once('model/AddToDoList.php');
require_once('model/RockPaperScissor.php');


require_once('controller/LoginController.php');
require_once('controller/RegisterUserController.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$listOfUsers = new ListOfUsers();

$login = new Login($listOfUsers);
$register = new RegisterUser();

//CREATE OBJECTS OF THE VIEWS
$v = new LoginView($login);
$dtv = new DateTimeView();
$lv = new LayoutView();
$regView = new RegisterView();
$rpsGameView = new RockPaperScissorsView();
$toDoListView = new ToDoListView();


$regController = new RegisterUserController($regView, $register, $v);
$lc = new LoginController($v, $login, $lv, $toDoListView);

$regController->startRegisterNewUser();


$lc->tryToLogin();

$lv->chooseLayout($login->isLoggedIn(), $v, $dtv, $regView, $rpsGameView, $toDoListView);

