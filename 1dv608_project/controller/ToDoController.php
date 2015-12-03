<?php


class ToDoController {
   

	private $loginView;
   private $toDoListView;
   private $addToDoList;

	public function __construct(LoginView $loginView, ToDoListView $toDoListView){
            $this->loginView = $loginView;
            $this->toDoListView = $toDoListView;
            $this->addToDoList = new AddToDoList();
        }

   	public function run()
   	{

   		if ($this->toDoListView->userWantsToAddItem()) {

            $username = $_SESSION["username"];
            $this->addToDoList->saveItem($username, $this->toDoListView->getItemToAdd());
            
   		}
         if (strpos("$_SERVER[REQUEST_URI]", "?toDoList=delete"))
         {
             $this->addToDoList->deleteFromList($_SESSION["username"]);
             $this->toDoListView->clearSavedItems();
         }
         
         $this->toDoListView->setItem($this->addToDoList->getItems($_SESSION["username"]));
   	}

}