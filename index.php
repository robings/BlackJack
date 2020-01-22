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

/**
 * function to determine picture card face
 * @param $pictureFaceNo
 * @return string
 */
function determinePictureFace ($pictureFaceNo) {
    if ($pictureFaceNo == 11) {
        return 'Jack';
    } elseif ($pictureFaceNo == 12) {
        return 'Queen';
    } elseif ($pictureFaceNo == 13) {
        return 'King';
    }
}

//shuffle the deck
shuffle($deckOfCards);

//var_dump($deckOfCards);

//deal
$playerHand = [ $deckOfCards[0], $deckOfCards[2] ];
$dealerHand = [ $deckOfCards[1], $deckOfCards[3] ];

//remove after testing
echo '<pre>';
var_dump($playerHand, $dealerHand);
echo '</pre>';
//

$playerHandScore = $deckOfCards[0]['score'] + $deckOfCards[2]['score'];
$dealerHandScore = $deckOfCards[1]['score'] + $deckOfCards[3]['score'];

//remove after testing
echo '<br />' . $playerHandScore;
echo '<br />' . $dealerHandScore;
//

function buildPageDisplay($playerHandParam, $playerScoreParam, $dealerHandParam, $dealerScoreParam) {
    echo '<style>';
    echo '* { box-sizing: border-box; }';
    echo 'h1 { color: #ff0000; text-align: center; }';
    echo 'section { width: 80%; margin: 0 auto; overflow: auto; }';
    echo 'section div { float: left; padding: 30; width: 50%}';
    echo '</style>';

    echo '<h1>BlackJack</h1>';

    echo '<section>';
    echo '<div class="player">';
    echo '<h2>Player</h2>';
    echo $playerHandParam[0]['face'] . '<br />';
    echo $playerHandParam[1]['face'] . '<br />';
    echo '</div>';
    echo '<div class="dealer">';
    echo '<h2>Dealer</h2>';
    echo $dealerHandParam[0]['face'] . '<br />';
    echo $dealerHandParam[1]['face'] . '<br />';
    echo '</div>';
    echo '</section>';


}

buildPageDisplay($playerHand, $playerHandScore, $dealerHand, $dealerHandScore);