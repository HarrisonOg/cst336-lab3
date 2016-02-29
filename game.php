<?php
$card = ["image" => "",
            "score" => "",
            "suit" => "",
            "rank" => ""];
            
    
    $player1 = ["imageName" => "<img src=\"assets/pic1.jpg\" width=\"46\" height=\"46\">",
              "name" => $_POST["p1"]];
    $player2 = ["imageName" => "<img src=\"assets/pic2.jpg\" width=\"46\" height=\"46\">",
              "name" => $_POST["p2"]];
    $player3 = ["imageName" => "<img src=\"assets/pic3.jpg\" width=\"46\" height=\"46\">",
              "name" => $_POST["p3"]];
    $player4 = ["imageName" => "<img src=\"assets/pic4.jpg\" width=\"46\" height=\"46\">",
              "name" => $_POST["p4"]];
              
    $table = [$player1,$player2,$player3,$player4];
    
    $hand = ["player" => null,
            "cards" => []];
            
    $game = ["location", $table, 
            "hands" => []];

$deck = array();
	for ($i=0; $i < 52; $i++){
		$deck [] = $i;
	}
		shuffle($deck);
		
	$points = array (0,0,0,0,0,0);
	$people = array();
		for ($i=1; $i <= 4; $i++){
			$players[] = $i;
		}
	//save players game
	$hands = array();
	//save players hands
	$winner = array("", "", "", "");
	//to save the string of who wins
	
	function startGame() {
		
		for ($i=0; $i <= 4; $i++){
			getHand($i);
		} 
		getWinner();
		
		drawGame();
	}
	
	
function getHand($player){
	global $deck;
	global $points;
	global $hands;
	$amount = rand(5,10);
	
	for ($i = 0; $i < $amount; $i++){
		if ($points[$player] >= 42){
			break;
		}
		else if ($points[$player] <= 36){
			
		$lastCard = array_pop($deck); //pops the last card to be used
		
		$suitArray = array("clubs", "diamonds", "hearts", "spades");//these are the folders of the suits
		
		$number = (($lastCard % 13) + 1);//selects the card from the deck
		
		$value = $number;
		
		if ($number == 11 ||$number == 12||$number == 13){
			$value = 10;
		}
		
		if ($number == 1 && $points[$player] == 10){
			$value = 11;
		}
		
		$points[$player] += $value;
		
		$temp = "<img src= 'cards/" .$suitArray[floor($lastCard / 13)] . "/" . $number . ".png'/>";
		array_push($hands, $temp);//adds to the array
		}
	}
	
	array_push($hands, "0");
}

function getWinner() {
	global $points;
	global $hands;
	global $winner;
	
	$temp = "";
	
	$nameArray = array("Player1", "Player2", "Player3", "Player4");
	
	$max = 0;//starts at zero
	$index = 0;
	
	for ($i=0; $i<=4; $i++){
		if ($points[$i] <= 42 && $points[$i]>$max)//gets the highest winning hand
		{
			$max = $points[$i];
			$index = $i;
		}
	}
	if ($max != 0) //if there id a winner store name of which player
	{
		$temp .= $nameArray[$index]. "Wins!!!";
		$winner[$index]=$temp;
	}
	else{
		$temp .= "No winner";
		$winner[4]=$temp;
	}
}

function drawGame(){
	global $points;
	global $hands;
	global $winner;
	global $players;
	
	$k = 0;
	echo "<table border = 1>";
	echo "<tr>";
	echo "<td id='colTitle'>";
	echo "Players";
	echo "</td>";
	for ($i=0; $i<6; $i++){
		echo "<td id = 'colTitle'>";
		$temp = "Cards" .($i+1);
		echo $temp;
		echo "</td>";
	}
	
	echo "<td id='colTitle'>";
	echo "Points";
	echo "</td>";
	echo "<td id='colTitle'>";
	echo "Winner?";
	echo "</td>";
	echo "</tr>";
	for ($i=0; $i<4; $i++)//prints the person, hands score, winner quote
	{
		echo "<tr>";
		echo "<td>";
   	 	echo $people[$i];
   	 	echo "</td>";
   	 	
   	 	for ($j=0; $j<5; $j++)//populates 5 columns with cards or blank space
   	 	{
   	 		while ($hands[$k]!="0"){
   	 			echo "<td>";
   	 			echo $hands[$k];
   	 			echo "</td>";
   	 			//prints the hand of the person
   	 			$k++;
   	 			$j++;
   	 		}
   	 		if ($j<5)
   	 		{
   	 			echo "<td>";
   	 
   			 	echo "</td>";
   	 		}
   	 	}
   	 	$k++;
   	 	echo "<td>";
   		echo $points[$i];
   		echo "</td>";
   		echo "<td>";
   		echo $winner[$i];
   	 	echo "</td>";
   		echo "</tr>";
	}
	echo "</table>";
	
}

  $card = ["image" => "",
           "score" => "",
           "suit" => "",
           "rank" => ""];
          
  
           
  //indexed array         
  /*$deck = [];
  $deck[] = ["value" => "",
            "suit" => "",
            "rank" => ""];
            
  $heartSuit = ["directory" => "assets/card/hearts",
                "name" => "Hearts"];
  $clubSuit = ["directory" => "assets/card/clubs",
                "name" => "Clubs"];
  $diamondSuit = ["directory" => "assets/card/diamonds",
                "name" => "Diamonds"];
  $spadeSuit = ["directory" => "assets/card/spades",
                "name" => "Spades"];

  $player1 = ["imageName" => "",
            "name" => ""];
            
  $player2 = ["imageName" => "",
            "name" => ""];          
            
  $table = [$player1, $player2];
  //$table => ["position1" => "$player1",
            "position2" => "$player2"];
  
  $hand = ["player" => null,
          "cards" => [],
          "score" => ""];
  
  $game = ["location" => $table,
          "hands" => []];
  */
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Index</title>
  <link rel="stylesheet" type="css" href="css/main.css">
</head>


<body>

</body>
</html><?php
    startGame();
?>
<html>
<head>
</head>
<body>

</body>
</html>