<?php



class YahtzeeView
{
	private static $rollDice = 'YahtzeeView::RollDice';
	private static $choosePlace = 'YahtzeeView::choosePlace';
	private static $timesRolled;

	private $Ones = null;
	private $Twos = "";
	private $Threes = "";
	private $Fours = "";
	private $Fives = "";
	private $Sixes = "";
	private $Bonus = "";
	private $Upper_Score = "";
	private $Three_Of_A_Kind = "";
	private $Four_Of_A_Kind = "";
	private $Full_House = "";
	private $Small_Straight = "";
	private $Large_Straight = "";
	private $Chance = "";
	private $Yahtzee = "";
	private $Total_Score = "";

	private static $dices;

	public function response()
	{
		return $this->yahtzee(self::$dices);
	}

	public function setDicesToRoll($dices)
	{
		self::$dices = $dices;
	}

	public function userHasPressedRolledTheDice(){
		
		if (isset($_POST[self::$rollDice])){
			self::$timesRolled += 1;
			return true;
		}
		
		return false;
	}


	public function yahtzee($dices = null)
	{

		$ret = '';

		$ret .='
		<a href="?loggedIN">Back</a>
		<h1>Strict Yahtzeee</h1>
		<p>Rules: You start Collecting Ones then Twos then Threes and so on..</p>
			<form id="formPlayerYahtzee"> 
				<fieldset>
					<legend>You</legend>
					<label>Ones 			:'.$this->Ones.'</label>
					<br>
					<label>Twos 			:'.$this->Ones.'</label>
					<br>
					<label>Threes 			:'.$this->Ones.'</label>
					<br>
					<label>Fours 			:'.$this->Ones.'</label>
					<br>
					<label>Fives 			:'.$this->Ones.'</label>
					<br>
					<label>Sixes 			:'.$this->Ones.'</label>
					<br>
					<label>Bonus 			:'.$this->Ones.'</label>
					<br>
					<label>Upper-Score 		:'.$this->Ones.'</label>
					<br>
					<label>Three-Of-A-Kind 	:'.$this->Ones.'</label>
					<br>
					<label>Four-Of-A-Kind 	:'.$this->Ones.'</label>
					<br>
					<label>Full House 		:'.$this->Ones.'</label>
					<br>
					<label>Small Straight 	:'.$this->Ones.'</label>
					<br>
					<label>Large Straight 	:'.$this->Ones.'</label>
					<br>
					<label>Chance 			:'.$this->Ones.'</label>
					<br>
					<label>Yahtzee 			:'.$this->Ones.'</label>
					<br>
					<label>Total Score 		:'.$this->Ones.'</label>
				</fieldset>
			</form>
			<form id="formComputerPlayerYahtzee"> 
				<fieldset>
					<legend>Computer</legend>
					<label>Ones 			:'.$this->Ones.'</label>
					<br>
					<label>Twos 			:'.$this->Ones.'</label>
					<br>
					<label>Threes 			:'.$this->Ones.'</label>
					<br>
					<label>Fours 			:'.$this->Ones.'</label>
					<br>
					<label>Fives 			:'.$this->Ones.'</label>
					<br>
					<label>Sixes 			:'.$this->Ones.'</label>
					<br>
					<label>Bonus 			:'.$this->Ones.'</label>
					<br>
					<label>Upper-Score 		:'.$this->Ones.'</label>
					<br>
					<label>Three-Of-A-Kind 	:'.$this->Ones.'</label>
					<br>
					<label>Four-Of-A-Kind 	:'.$this->Ones.'</label>
					<br>
					<label>Full House 		:'.$this->Ones.'</label>
					<br>
					<label>Small Straight 	:'.$this->Ones.'</label>
					<br>
					<label>Large Straight 	:'.$this->Ones.'</label>
					<br>
					<label>Chance 			:'.$this->Ones.'</label>
					<br>
					<label>Yahtzee 			:'.$this->Ones.'</label>
					<br>
					<label>Total Score 		:'.$this->Ones.'</label>
				</fieldset>
			</form>';


			$ret .='
			<form method="post"> 
				<fieldset>
				<legend>Roll the Dice</legend>
				';
				if ($dices != null && self::$timesRolled != 3) {
					foreach ($dices as $dice => $value) {
						$ret .='<label>'.$value.'</label>';
						$ret .='<input type="checkbox" name="dices[]"value="'.$value.'" /><br>';
					}
				}
				if (self::$timesRolled == 3) {
					foreach ($dices as $dice => $value) {
						$ret .='<label>'.$value.'</label> <br>';
					}
					$ret .='<input type="text" value=""/>';
					
					$ret .='<input type="submit" name="'.self::$choosePlace.'"value="Choose a place" />';
					self::$timesRolled == 0;
				}
				
				$ret .='
					
					<input type="submit" name="'.self::$rollDice.'"value="Roll Dice" />
				</fieldset>
			</form>';
			var_dump(self::$timesRolled);
		return $ret;
	}

	public function getHoldedDices()
	{
		$dices = array();

		if (!empty($_POST['dices'])) {
			foreach ($_POST['dices'] as $dice) {
				array_push($dices, $dice);
			}
			return $dices;
		}
		return $dices;
	}

}


//return '
//		<a href="?loggedIN">Back</a>
//				<h1>Yahtzeee</h1>
//
//		<form action="#" method="post" > 
//				<fieldset>
//					<legend>Enter Number of Players 1-5</legend>
//					<p id="' . $this->message . '">' . $this->message . '</p>
//					<label for="' . self::$numbPlayers . '">Players :</label>
//					<input type="text" id="' . self::$numbPlayers . '" name="' . self::$numbPlayers . '" />
//					
//					<input type="submit" name="' . self::$setNumbPlayers . '" value="setNumbPlayers" />
//				</fieldset>
//			</form>
//		';