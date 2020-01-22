<?php
//blackjack aces low, picture cards 10

$deckOfCards = [];

//build the deck
for ($i = 1; $i < 5; $i ++) {
    for ($j = 1; $j < 14; $j ++) {
        //determine suit
        if ($i == 1) {
            $suitName = 'Hearts';
        } elseif ($i == 2) {
            $suitName = 'Clubs';
        } elseif ($i == 3) {
            $suitName = 'Diamonds';
        } elseif ($i == 4) {
            $suitName = 'Spades';
        } else {
            echo 'opps there isn\'t a fifth suit';
        }

        //what if face is a picture card?
        if ($j > 10) {
            $face = determinePictureFace ($j);
            $cardScore = 10;
        } else {
            $face = $j;
            $cardScore = $j;
        }

        $deckArrayKey = $suitName . $j;
        $faceName = $face. ' of ' . $suitName;

        $deckOfCards[$deckArrayKey] = ['face' => $faceName, 'score' => $cardScore];

    }





}

function determinePictureFace ($pictureFaceNo) {
    if ($pictureFaceNo == 11) {
        return 'Jack';
    } elseif ($pictureFaceNo == 12) {
        return 'Queen';
    } elseif ($pictureFaceNo == 13) {
        return 'King';
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