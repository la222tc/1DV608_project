<?php



class ToDoListView
{
	private static $toDoItem = 'ToDoListView::toDoItem';
	private static $addItem = 'ToDoListView::addItem';
	private static $sessionItems = "Hej";
	private $items;


	public function response() {
		return $this->toDoList($this->items);
	}

	public function setItem($item)
	{
		$this->items = $item;
	}

	public function markAsDone()
	{
		if (isset($_POST[self::$toDoItem]))
		{
			return trim($_POST[self::$toDoItem]);
		}
		
		return "";
	}
	public function toDoList($items)
	{
		$ret = "";

		$ret .= '
		<a href="?loggedIN">Back</a>
		
		<div class="list">
			<h1 class="header">To Do</h1>

			<ul class="items">';
			$ret .= ' <a href="?toDoList=delete" class="delete-button">Clear list</a></li>';
		if ($items != null) {

			foreach ($items as $item) {

				if ($_GET['toDoList'] === $item) {
					$this->addItemToDone($item);
				}
				if ($this->checkIfItemDone($item)) {
					$ret .= '<li><span name="'.$item.'" class="item done">'.$item.'</span>';
				}
				else
				{
					$ret .= '<li><span name="'.$item.'" class="item">'.$item.'</span>';
					$ret .= '<a href="?toDoList='.$item.'" name="'.$item.'" class="done-button">Mark as Done</a> ';
					
				}
			}
		}
		

		$ret .= '

			<form class="item-add" action="?toDoList" method="post">
			<input type="text" name="'.self::$toDoItem.'" placeholder="Type a new item here." class="input" autocomplete="off" required>
			<input type="submit" name="'.self::$addItem.'"value="Add" class="toDosubmit">
			</form>

		</div>

		';
		return $ret;
	}

	public function checkIfItemDone($item)
	{
		if (isset($_SESSION[self::$sessionItems])) {
			$items = unserialize($_SESSION[self::$sessionItems]);
			if ($items == null) {
				return false;
			}

			foreach ($items as $storedItem) {
				if ($storedItem === $item) {
					return true;
				}
			}
		}
		return false;
		
	}

	public function addItemToDone($item)
	{
		if(isset($_SESSION[self::$sessionItems])){
			$items = unserialize($_SESSION[self::$sessionItems]);
		}
		else{
			$items = array();
		}
		$items[] = $item;

		$_SESSION[self::$sessionItems] = serialize($items);
	}
	public function getItemToAdd()
	{
		if (isset($_POST[self::$toDoItem]))
		{
			return trim($_POST[self::$toDoItem]);
		}
		
		return "";
	}
	public function userWantsToAddItem()
	{
		return isset($_POST[self::$addItem]);
	}

	public function clearSavedItems()
	{
		if (isset($_SESSION[self::$sessionItems])) {
			unset($_SESSION[self::$sessionItems]);
		}
	}

}