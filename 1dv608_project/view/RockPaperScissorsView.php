<?php



class RockPaperScissorsView
{

	private static $wrongChoiceOfItem = false;
	private static $playerWin = false;
	private static $playerLoose = false;
	private static $playerTie = false;
	private static $userItem;
	private static $computerItem;

	public function response()
	{
		//var_dump(self::$userItem);
		if (self::$wrongChoiceOfItem) {
			return $this->rockPaperScissors("You must choose between Rock , Paper or Scissor", self::$userItem, self::$computerItem);
		}
		else if (self::$playerWin) {
			return $this->rockPaperScissors("You WIN!", self::$userItem, self::$computerItem);
		}
		else if (self::$playerTie) {
			return $this->rockPaperScissors("It's a TIE!", self::$userItem, self::$computerItem);
		}
		else if (self::$playerLoose) {
			return $this->rockPaperScissors("You LOOSE!", self::$userItem, self::$computerItem);
		}
		return $this->rockPaperScissors("");
	}

	public function setUserItem($userItem)
	{
		self::$userItem = $userItem;
	}
	public function setCompItem($computerItem)
	{
		self::$computerItem = $computerItem;
	}
	public function setMessageBadChoise()
	{
		self::$wrongChoiceOfItem = true;
	}
	public function setPlayerWin()
	{
		self::$playerWin = true;
	}
	public function setPlayerLoose()
	{
		self::$playerLoose = true;
	}
	public function setPlayerTie()
	{
		self::$playerTie = true;
	}

	public function setMessage()
	{
		
	}
	public function rockPaperScissors($message, $playerItem = null, $computerItem = null)
	{
		$items = array(
			"rock" => '<a class="rps" href="?rock_paper_scissors-item=rock">Rock<br><img src="images/rock.jpg" width="135" heigth="135" alt="Rock"></a>',
			"paper" => '<a class="rps" href="?rock_paper_scissors-item=paper">Paper<br><img src="images/paper.jpg" width="135" heigth="135" alt="Paper"></a>',
			"scissor" => '<a class="rps" href="?rock_paper_scissors-item=scissor">Scissor<br><img src="images/scissor.jpg" width="135" heigth="135" alt="Scissor"></a>'
			);

		$ret = '';
		$ret .= '
		<a href="?loggedIN">Back</a>
				<h1>Rock Paper Scissors</h1>
		';

		$ret .= '<p class="rockPaperScissorMessage">'.$message.'</p>';
		if ($playerItem == null) {
			foreach ($items as $item => $value) {

			$ret .= ' '.$value.'';	
			}
		}
		else{
			$ret .= '<p>Your Choise</p>';
			$ret .= ''.$items[$playerItem].'';

			$ret .= '<p>Computer Choise</p>';
			$ret .= ''.$items[$computerItem].'';
			$ret .= '<a href="??rock_paper_scissors">Play Again</a>';
		}

		$ret .= '<br>';
		$ret .= '<br>';
		$ret .= '<br>';
		$ret .= '<br>';
		$ret .= '<br>';
		$ret .= '<br>';
		$ret .= '<br>';

		

			
		return $ret;
	}

	public function getUserItem()
	{
		if (isset($_GET["rock_paper_scissors-item"]) == true) {
			return $_GET["rock_paper_scissors-item"];
		}
		return false;;
	}
}
