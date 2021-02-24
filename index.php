<?php
//declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Player.php';
require 'Blackjack.php';
require 'Suit.php';
require 'Card.php';
require 'Deck.php';
require 'Dealer.php';

session_start();

if (!isset($_SESSION['blackjack'])) {
    $_SESSION["blackjack"] = new Blackjack();
} else {
    $game = $_SESSION['blackjack'];
}

$game = new Blackjack(); //this starts the game

$player = $game->getPlayer(); //will give us the user player
$dealer = $game->getDealer(); //will give us the dealer which is the computer
$deck = $game->getDeck(); // will get the deck
$score = $player->getScore();

if (!isset($_POST['playerAction'])) {
    echo "Game is about to start!<br/>";
} elseif ($_POST['playerAction'] == "hit") {

    $player->hit($deck);
    $player->getScore();

    if($player->youLose() == true){
        echo "The Casino Wins!!";
        }
    } elseif ($_POST["playerAction"] == "stand"){
        $dealer->hit($deck);

        if ($dealer->getScore() > 21){
            $dealer->hasLost();
            echo "Casino went beyond 21, YOU WON!!";
        } elseif ($dealer->getScore() == 21){
            echo "Casino got 21! You lose.";
        }elseif ($player->getScore() == $dealer->getScore()){
            echo "Is a DRAW, Casino wins!!!";
        } else {
            echo "Well played, you WON! another round?";
        }

    } elseif ($_POST["playerAction"] == "surrender"){
        echo "Casino Wins! better luck next time.";
    }





//    if (isset($_POST["playerAction"])) {


// here the stand



//unset($_SESSION["blackjack"]);
if (isset($_POST["playerAction"])) {
    if ($_POST["playerAction"] == "restart") {
        session_unset();
        $game = new Blackjack();
        $_SESSION['blackjack'] = $game;
        $player = $game->getPlayer();
        $dealer = $game->getDealer();
        $deck = $game->getDeck();
        $score = $player->getScore();
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blackjack</title>
    <style>
        .cartas{
            font-size: 60px;
        }
    </style>
</head>


<body>

<h2>Game Card</h2>

<div>
    <div class="cartas">The result for the Player:

        <?php
        foreach($player->getCards() AS $card) {
            echo $card->getUnicodeCharacter(true);
        }
        echo $player->getScore();

        ?>

    </div>
    <div class="cartas">The CASINO has:
        <?php
        foreach($dealer->getCards() AS $card) {
            echo $card->getUnicodeCharacter(true);
        }
        echo $dealer->getScore();

        ?>

    </div>
</div>

<form action="index.php" method="post">
    <input type="submit" name="playerAction" value="hit">
    <input type="submit" name="playerAction" value="stand">
    <input type="submit" name="playerAction" value="surrender">
    <button type="submit" name="playerAction" value="restart">Restart</button>
</form>

<div>

</div>
</body>
</html>
