<?php

require_once('controller/RockPaperScissorController.php');
require_once('controller/YahtzeeController.php');
require_once('model/RockPaperScissor.php');

class GameController
{
	private $loginView;


	public function __construct(LoginView $loginView){
    $this->loginView = $loginView;
    }
	public function run()
	{
		$lw = new LayoutView();
		$rpsView = new RockPaperScissorsView();
		
		if ($lw->checkUrlIfUserPressedRockPaperScissors()) {
			echo "string";

			//$rps = new RockPaperScissor();
			
			//$items = $rps->getItems();

			//$rpsView->setItems($items);
			
		}
		else if ($lw->checkUrlIfUserPressedYahtzee()) {
			echo "yahtzee";
			var_dump($lw->checkUrlIfUserPressedYahtzee());
			//$rps = new RockPaperScissor();
			
			//$items = $rps->getItems();

			//$rpsView->setItems($items);
			
		}
		//echo "string";
            
       

		
	}
}