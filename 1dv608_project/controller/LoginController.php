<?php



require_once('controller/RockPaperScissorController.php');
require_once('controller/ToDoController.php');

class LoginController {
   

    	private $loginView;
        private $loginModel;
        private $layoutView;
        private $toDoListView;


  		public function __construct(LoginView $loginView, Login $loginModel, 
            LayoutView $layoutView, ToDoListView $toDoListView)
        {
            $this->loginView = $loginView;
            $this->loginModel = $loginModel;
            $this->layoutView = $layoutView;
            $this->toDoListView = $toDoListView;
        }



        public function tryToLogin(){

            if ($this->loginView->userWantsToLogin() && !$this->loginModel->isLoggedIn()) {
                $userNameInput = $this->loginView->getUsername();
                $passwordNameInput = $this->loginView->getPassword();

                if ($this->loginModel->validateLogin($userNameInput, $passwordNameInput)) {
                    $this->loginView->setLoginSucceeded();
                    $this->loginModel->setUserNameSession($userNameInput);
                }
                else{
                    $this->loginView->setLoginFailed();
                }
                

            }
            else if($this->loginView->userWantsToLogout() && $this->loginModel->isLoggedIn()){
                $this->loginModel->logout();
                $this->loginView->setUserLogout();

            }
            else if($this->loginModel->isLoggedIn()){

                    if ($this->layoutView->checkUrlIfUserPressedRockPaperScissors()) {
                        $rpsCtrl = new RockPaperScissorController();
                        $rpsCtrl->run();
                    }
 //                   else if ($this->layoutView->checkUrlIfUserPressedYahtzee()) {
   //                     $yCtrl = new YahtzeeController($this->yView);
     //                   $yCtrl->run();
       //             }
                    else if ($this->layoutView->checkUrlIfUserPressedToDoList()) {
                        $toDo = new ToDoController($this->loginView, $this->toDoListView);
                        $toDo->run();
                    }
            }



	}

}