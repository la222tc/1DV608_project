<?php

require_once('model/YahtzeePlayer.php');
require_once('model/YahtzeeGame.php');

class YahtzeeController  
{

	private $yView;

	public function __construct(YahtzeeView $yView){
    	$this->yView = $yView;
	}

	public function run()
	{
		//$yahtzeeView = new YahtzeeView();
		$yahtzeeGame = new YahtzeeGame();
		$playGame = true;
		
		do {
			//echo"hej";
			if ($this->yView->userHasPressedRolledTheDice()) {
				$rollTheDice = $yahtzeeGame->rollTheDice();
				$this->yView->setDicesToRoll($rollTheDice);
				//self::$diceroll += 1;
				
				$holdedDices = $this->yView->getHoldedDices();
				$yahtzeeGame->setHoldedDices($holdedDices);

				$rollTheDice2 = $yahtzeeGame->rollTheDice();
				$this->yView->setDicesToRoll($rollTheDice2);
				
				$yahtzeeGame->addToTimesRolled();
				//var_dump($rollTheDice2);
				$times = $yahtzeeGame->getTimesRolled();
				echo $times;
//				$rollTheDice2 = $yahtzeeGame->rollTheDice();
//				$yahtzeeView->setDicesToRoll($rollTheDice2);
//				$diceroll++;
//				if ($diceroll == 3) {
//					$playGame = false;
//				}
				//echo "Roll";
			}

			$playGame = false;
		} while ($playGame);
	}
}