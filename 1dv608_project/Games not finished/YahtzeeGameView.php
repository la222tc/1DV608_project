<?php



class YahtzeeGameView
{

	public function response()
	{
		return $this->yahtzee();
	}


	public function yahtzee()
	{
		return '
		<a href="?loggedIN">Back</a>
				<h1>Yahtzeee</h1>

		<form action="#" method="post" > 
				<fieldset>
					<legend>Enter Number of Players 1-5</legend>
					<p id="' . $this->message . '">' . $this->message . '</p>
					<label for="' . self::$numbPlayers . '">Players :</label>
					<input type="text" id="' . self::$numbPlayers . '" name="' . self::$numbPlayers . '" />
					
					<input type="submit" name="' . self::$setNumbPlayers . '" value="setNumbPlayers" />
				</fieldset>
			</form>
		';
	}

}
