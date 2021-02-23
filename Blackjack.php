<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Suit.php';
require 'Card.php';
require 'Deck.php';
require 'Player.php';

class Blackjack
{

    private $player;
    private $dealer;
    private $deck;

    function __construct(){
        $this->player=new Player($this->deck);
        $this->dealer=new Player($this->deck);
        $this->deck= new Deck();
        $this->deck->shuffle();
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
