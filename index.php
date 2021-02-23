
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

if (isset($_SESSION['blackjack'])) {
    $_SESSION['blackjack'] = new Blackjack();
}

$game = new Blackjack();

if (isset($_POST['action'])) {
    echo "Game started!<br/>";
    var_dump($_POST);

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
</head>

<h2>Game Card</h2>
<body>
<form action="index.php" method="post">
    <input type="submit" name="action" value="hit">
    <input type="submit" name="action" value="stand">
    <input type="submit" name="action" value="surrender">
</form>
</body>
</html>
