<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//require_once 'Suit.php';
//require_once 'Card.php';
//require_once 'Deck.php';
//require_once 'Player.php';

class Blackjack
{

    private $player;
    private $dealer;
    private $deck;

    function __construct(){
        $deck= new Deck();
        $deck->shuffle();
        $this->deck=$deck;

        $this->player= new Player($this->deck);
        $this->dealer=new Player($this->deck);
    }

    /**
     * @return mixed
     */
    public function getPlayer(): Player
    {
        return $this->player;
    }

    /**
     * @return mixed
     */
    public function getDealer() : Player
    {
        return $this->dealer;
    }

    /**
     * @return mixed
     */
    public function getDeck() : Deck
    {
        return $this->deck;
    }

}
