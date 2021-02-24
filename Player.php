<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Player
{
    private array $cards = [];
    private bool $lost = false;

    public function __construct(Deck $deck)
    {
        array_push($this->cards, $deck->drawCard(), $deck->drawCard());

    }


//public methods
function hit(Deck $deck)
{

    array_push($this->cards, $deck->drawCard());

//        var_dump($deck);
    if ($this->getScore() > 21) {
        $this->hasLost();
    }

}

function surrender()
{

}


function getScore()
{
    $result = 0;
    foreach ($this->cards as $card) {
        $result += $card->getValue(); //
    }
    return $result;

}

function hasLost()
{
    $this->lost = true;
}


function youLose()
{
    return $this->lost;
}


function getCards()
{
    return $this->cards;
}
}
