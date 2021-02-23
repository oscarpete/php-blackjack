<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


class Dealer extends Player
{



    function hit(Deck $deck){
    do{
        parent::hit($deck);
    }
    while($this->getScore() <=15);



    }



}