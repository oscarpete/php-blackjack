<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


class Dealer extends Player
{
    public function hit(Deck $deck)
    {
        while ($this->getScore() < 15)
            parent::hit($deck);
    }
}