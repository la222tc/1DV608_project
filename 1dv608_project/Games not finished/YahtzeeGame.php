<?php


class YahtzeeGame
{
	private static $startingDices = 5;
	private $holdedDices;
	private $rollDices;
	private static $timesRolled;

	public function rollTheDice()
	{
		return $this->rollDices(self::$startingDices - sizeof($this->holdedDices));
	}

	public function setHoldedDices($holdedDices)
	{
		//var_dump($holdedDices);
		$this->holdedDices = $holdedDices;
	}

	public function addToTimesRolled()
	{
		self::$timesRolled += 1;
	}

	public function getTimesRolled()
	{
		return self::$timesRolled;
	}

	public function getHoldedDices()
	{
		return $this->holdedDices;
	}
	public function rollDices($numbOfDices)
	{
		$dice = array();

		//$max = sizeof($dice);
		for ($i=0; $i < $numbOfDices; $i++) { 
			$dice[$i] = rand(1, 6);
			
		}
		$this->setRolledDices($dice);
            return $this->rollDices;
	}

	public function setRolledDices($dice)
	{
		$tempDices = array();

		//$max = sizeof($dice);
		for ($i=0; $i < sizeof($dice); $i++) { 
			$tempDices[$i] = $dice[$i];
		}
		for ($i=0; $i <sizeof($this->holdedDices) ; $i++) { 
			array_push($tempDices, $this->holdedDices[$i]);
		}

		$this->rollDices = $tempDices;

	}
	public function validateNumberOfPlayers($numbOfPlayers)
	{
		if (is_numeric($numbOfPlayers) && $numbOfPlayers > 0
			&& $numbOfPlayers < 6) {
			return true;
		}
		else{
			$yahtzeeView = new YahtzeeView();
			$yahtzeeView->setNumPlayerMessage();
			return false;
		}
	}
}