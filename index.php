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
            $face = determinePictureFace($j);
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
?>

//html
<!DOCTYPE html>
<html lang="en-GB">

<head>
<title>Mayden Academy Casino | Blackjack</title>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="styles.css">


</head>

<body>

<section>
<h1>BlackJack</h1>
    <?php

    ?>


 </section>

<p>Disclaimer: This is just for practice. Mayden Academy doesn&#039;t really run a casino.</p>

</body>

</html>