<?php
//blackjack aces low, picture cards 10

$deckOfCards = [
    'heart1' => [
    'face' => 'Ace of Hearts',
    'score' => 1
    ],
    'heart2' => [
        'face' => 'Two of Hearts',
        'score' => 2
    ],
    'heart3' => [
        'face' => 'Three of Hearts',
        'score' => 3
    ]
];

$deckOfCards['heart4'] = [ 'face' => 'Four of Hearts', 'score' => 4 ];

var_dump($deckOfCards);
echo '<br /><br />';
    shuffle($deckOfCards);

var_dump($deckOfCards);