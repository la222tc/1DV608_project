<?php


class RockPaperScissor
{

	private $userWin = false;
	private $userTie = false;
	private $userItem;
	private $comp_item;

	public function play($user_item)
	{
		$userWin = false;

		$items = array('rock', 'paper', 'scissor');

		$this->userItem = $user_item;
		//var_dump($userItem);

		$this->comp_item = $items[rand(0, 2)];

		//echo $comp_item;
		if (in_array($this->userItem, $items) == false) {
			return false;
		}

		//Rock > Scissor
		//Paper > Rock
		//Scissor > Paper

		if ($this->userItem == 'scissor' && $this->comp_item == 'paper' ||
			$this->userItem == 'paper' && $this->comp_item == 'rock' ||
			$this->userItem == 'rock' && $this->comp_item == 'scissor') 
		{
			
			$this->userWin = true;
		}
		else if ($this->userItem == $this->comp_item ) 
		{
			$this->userTie = true;
		}

		
		return true;
	}
	public function getUserItem()
	{
		return $this->userItem;
	}

	public function getCompItem()
	{
		return $this->comp_item;
	}

	public function getPlayerWin()
	{
		if ($this->userWin) {
			return true;
		}
		return false;
	}
	public function getPlayerTie()
	{
		if ($this->userTie) {
			return true;
		}
		return false;
	}
}