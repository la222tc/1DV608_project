<?php


class RockPaperScissorController  
{
	public function run()
	{
		$rview = new RockPaperScissorsView();
		

		$user_item = $rview->getUserItem();
		//var_dump($user_item);
		$rpsModel = new RockPaperScissor();

		//Succesfully played
		if ($rpsModel->play($user_item)) {
			
			//Player Win
			if ($rpsModel->getPlayerWin()) {
				$rview->setPlayerWin();

			}

			//Player Tie
			else if ($rpsModel->getPlayerTie()) {
				$rview->setPlayerTie();
			}

			//Player Loss
			else{
				$rview->setPlayerLoose();
			}

			$rview->setUserItem($rpsModel->getUserItem());
			$rview->setCompItem($rpsModel->getCompItem());
			
			
				
			
		}
		else{
			$rview->setMessageBadChoise();
			$rview->response();
		}
	}
}