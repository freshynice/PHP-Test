<?php 
/*********
== League Table ==

The LeagueTable class tracks the score of each player in a league. After each game, the player records their score with the recordResult function. 
The player's rank in the league is calculated using the following logic:
The player with the highest score is ranked first (rank 1). The player with the lowest score is ranked last.
If two players are tied on score, then the player who has played the fewest games is ranked higher.
If two players are tied on score and number of games played, then the player who was first in the list of players is ranked higher.
Implement the playerRank function that returns the player at the given rank.
PHP 7.1.9
*********/

class LeagueTable{
	public function __construct($players){
		$this->standings = array();
		foreach($players as $index => $p){
			$this->standings[$p] = array('index' => $index, 'games_played' => 0, 'score' => 0);
        }
	}
	public function recordResult($player, $score){
		$this->standings[$player]['games_played']++;
		$this->standings[$player]['score'] += $score;
	}
	public function playerRank($rank){
        $winner_name = '';
        $items = array();
        $scores = array();
        $played = 0; $max_score = 0; $or=1;
        foreach ($this->standings as $name => $row) {
            $items[$name]  = $row['games_played'];
            $scores[$name] = $row['score'];
            $orders[$name] = $or;  // keep original order 
        $or++; 
		}
        array_multisort($scores, SORT_DESC, $items, SORT_ASC, $orders, SORT_ASC); //print_r($scores); exit;
        foreach($scores as $name => $score){
           $winner_name = $name; break; // first name in array is rank=1
        }
        return $winner_name;
	}
}
$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);
echo $table->playerRank(1);
//Example case: Correct answer 
//Players have different scores: Wrong answer  x
//Players tied by score: Wrong answer 		   x
//Players tied by games played: Wrong answer   x      Your score is 25% :( 