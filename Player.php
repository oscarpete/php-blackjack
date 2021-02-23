<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once ("Blackjack.php");
require_once ("Deck.php");


class Player
{
private array $cards = [];
private bool $lost = false;

function __construct( Deck $deck){
array_push($this->cards, $deck->drawCard(), $deck->drawCard());

}

//public methods
function hit(){

}
function surrender(){

}
function getScore(){

}
function hasLost(){

}



}

