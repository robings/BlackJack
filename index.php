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
        } elseif ($j == 1) {
            $face = 'Ace';
            $cardScore = 1;
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

//deal
$playerHand = [ $deckOfCards[0], $deckOfCards[2] ];
$dealerHand = [ $deckOfCards[1], $deckOfCards[3] ];

//score
$playerHandScore = $deckOfCards[0]['score'] + $deckOfCards[2]['score'];
$dealerHandScore = $deckOfCards[1]['score'] + $deckOfCards[3]['score'];

/**
 * builds page display of results of game
 * @param $playerHandParam
 * @param $playerScoreParam
 * @param $dealerHandParam
 * @param $dealerScoreParam
 */
function buildPageDisplay($playerHandParam, $playerScoreParam, $dealerHandParam, $dealerScoreParam) {
   echo '<!DOCTYPE html>';
   echo '<html lang="en-GB">';

   echo '<head>';
    echo '<title>Mayden Academy Casino | Blackjack</title>';
    echo '<style>';
    echo '* { box-sizing: border-box; }';
    echo 'html { font-family: "Helvetica Neue", sans-serif; font-size: 16px; }';
    echo 'h1 { text-align: center; font-size: 2rem; }';
    echo 'section { background-color: #009900; width: 40%; margin: 0 auto; overflow: auto; border: 4px solid #663300; border-radius: 10px; }';
    echo 'section div { float: left; padding: 30px; width: 50%}';
    echo 'section div.winner { width: 100%; color: #CC0000; text-align: center; font-size: 1.25rem;}';
    echo 'h2 { color: #CC0000; font-size: 1.5rem; }';
    echo 'p { font-size: 0.75rem; text-align: center; ';
    echo '</style>';

    echo '</head>';

    echo '<body>';

    echo '<section>';
    echo '<h1>BlackJack</h1>';
    echo '<div class="player">';
    echo '<h2>Player</h2>';
    echo $playerHandParam[0]['face'] . '<br />';
    echo $playerHandParam[1]['face'] . '<br /><br />';
    echo 'Score: ' . $playerScoreParam;
    echo '</div>';
    echo '<div class="dealer">';
    echo '<h2>Dealer</h2>';
    echo $dealerHandParam[0]['face'] . '<br />';
    echo $dealerHandParam[1]['face'] . '<br /><br />';
    echo 'Score: ' . $dealerScoreParam;
    echo '</div>';
    echo '<div class="winner">';
    echo 'The winner is: ';
     echo whoWins($playerScoreParam , $dealerScoreParam);
    echo '</div>';

    echo '</section>';

    echo '<p>Disclaimer: This is just for practice. Mayden Academy doesn\'t really run a casino.</p>';

    echo '</body>';

    echo '</html>';
}

buildPageDisplay($playerHand, $playerHandScore, $dealerHand, $dealerHandScore);

function whoWins($playerScore, $dealerScore) {
    if ($playerScore > $dealerScore) {
        return 'Player';
    } elseif ($playerScore == $dealerScore) {
        return 'Nobody. It\'s a draw';
    } else {
        return 'Dealer';
    }
}

////remove after testing
//echo '<pre>';
//var_dump($deckOfCards);
//echo '</pre>';
//echo '<pre>';
//var_dump($playerHand, $dealerHand);
//echo '</pre>';
//echo '<br />' . $playerHandScore;
//echo '<br />' . $dealerHandScore;
////