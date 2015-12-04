<?php


class LayoutView {

  public function render($isLoggedIn, $view, DateTimeView $dtv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Project</title>
          <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
          <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet" type="text/css">
          <link rel="stylesheet" type="text/css" href="css/main.css" >
        </head>
        <body>
          <h1 class="projectH">Project</h1>
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $view->response() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }
  public function checkUrlIfUserPressedNewUser()
  {
    if(strpos("$_SERVER[REQUEST_URI]", "?register")){
      return true;
    }
    else {
      return false;
    }
  }
  public function checkUrlIfUserIsLoggedIN()
  {
    if(strpos("$_SERVER[REQUEST_URI]", "?loggedIN")){
      return true;
    }
    else {
      return false;
    }
  }

  public function checkUrlIfUserPressedRockPaperScissors()
  {
    if(strpos("$_SERVER[REQUEST_URI]", "?rock_paper_scissors")){
      return true;
    }
    else {
      return false;
    }
  }

  public function checkUrlIfUserPressedYahtzee()
  {
    if(strpos("$_SERVER[REQUEST_URI]", "?yahtzee")){
      return true;
    }
    else {
      return false;
    }
  }
  public function checkUrlIfUserPressedToDoList()
  {
    if(strpos("$_SERVER[REQUEST_URI]", "?toDoList")){
      return true;
    }
    else {
      return false;
    }
  }

  public function chooseLayout($isLoggedIn, LoginView $loginView, DateTimeView $dtv, RegisterView $regView,
                                RockPaperScissorsView $rpsGameView, ToDoListView $toDoListView)
  {
    if ($this->checkUrlIfUserPressedRockPaperScissors()) {
          $this->render($isLoggedIn, $rpsGameView, $dtv);
        }
    else if($this->checkUrlIfUserPressedToDoList()){
      $this->render($isLoggedIn, $toDoListView, $dtv);
    }
    else{
      if ($this->checkUrlIfUserIsLoggedIN()){
          $this->render($isLoggedIn, $loginView, $dtv); 
       }
    else{
      if ($loginView->newUserCreated){
        $this->render($isLoggedIn, $loginView, $dtv); 
    }
    else{
      if ($this->checkUrlIfUserPressedNewUser()) {

      $this->render($isLoggedIn, $regView, $dtv);
      }
      else{
      $this->render($isLoggedIn, $loginView, $dtv); 
      }
    }

      
    }
    }
  }
}
