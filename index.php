<?php
//blackjack aces low, picture cards 10

$deckOfCards = [];

//build the deck
for ($i=1; $i<5; $i++) {
    for ($j=1; $j<14; $j++) {
        if ($i==1) {
            $faceName="Hearts";
        } elseif ($i==2) {
            $faceName="Clubs";
        }
    }





}



//$deckOfCards = [
//    'heart1' => [
//    'face' => 'Ace of Hearts',
//    'score' => 1
//    ],
//    'heart2' => [
//        'face' => 'Two of Hearts',
//        'score' => 2
//    ],
//    'heart3' => [
//        'face' => 'Three of Hearts',
//        'score' => 3
//    ]
//];
//
//$deckOfCards['heart4'] = [ 'face' => 'Four of Hearts', 'score' => 4 ];

//shuffle($deckOfCards);

var_dump($deckOfCards);