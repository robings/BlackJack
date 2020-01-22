<?php
//blackjack aces low, picture cards 10

/** function to call the deck builder, shuffle the deck, deal, score and call function to build the html to display
 * @return string
 */
function playBlackJack() {
    $deckOfCards = buildDeck();
    //shuffle the deck
    shuffle($deckOfCards);

//    echo '<pre>';
//    var_dump($deckOfCards);
//    echo '</pre>';

    //deal
    $playerHand = [$deckOfCards[0], $deckOfCards[2]];
    $dealerHand = [$deckOfCards[1], $deckOfCards[3]];

//    echo '<pre>';
//    var_dump($playerHand, $dealerHand);
//    echo '</pre>';

    //score
    $playerHandScore = $deckOfCards[0]['score'] + $deckOfCards[2]['score'];
    $dealerHandScore = $deckOfCards[1]['score'] + $deckOfCards[3]['score'];

    return buildPageDisplay($playerHand, $playerHandScore, $dealerHand, $dealerHandScore);
}

/**
 * builds the deck of cards
 * @return array
 */
function buildDeck () {
    $deckBuild = [];
    for ($i = 1; $i < 5; $i++) {
        for ($j = 1; $j < 14; $j++) {
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
            $faceName = $face . ' of ' . $suitName;

            $deckBuild[$deckArrayKey] = ['face' => $faceName, 'score' => $cardScore];
        }
    }
    return $deckBuild;
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

/**
 * builds page display of results of game
 * @param $playerHandParam
 * @param $playerScoreParam
 * @param $dealerHandParam
 * @param $dealerScoreParam
 */
function buildPageDisplay($playerHandParam, $playerScoreParam, $dealerHandParam, $dealerScoreParam) {
    $playerHtml = '<div><h2>Player</h2>';
    $playerHtml .= '<div class="card" style="color: ' .redOrBlack($playerHandParam[0]['face']) . '">' . $playerHandParam[0]['face'] . '</div>';
    $playerHtml .= '<div class="card" style="color: ' .redOrBlack($playerHandParam[1]['face']) . '">' . $playerHandParam[1]['face'] . '</div>';
    $playerHtml .= '<div class="score"> Score: ' . $playerScoreParam . '</div></div>';

    $dealerHtml = '<div><h2>Dealer</h2>';
    $dealerHtml .= '<div class="card" style="color: ' .redOrBlack($dealerHandParam[0]['face']) . '">' . $dealerHandParam[0]['face'] . '</div>';
    $dealerHtml .= '<div class="card" style="color: ' .redOrBlack($dealerHandParam[1]['face']) . '">' . $dealerHandParam[1]['face'] . '</div>';
    $dealerHtml .= '<div class="score">Score: ' . $dealerScoreParam . '</div></div>';

    $winnerHtml = '<div class="winner">';
    $winnerHtml .= 'The winner is: ' . whoWins($playerScoreParam , $dealerScoreParam) . '</div>';

return $playerHtml . $dealerHtml . $winnerHtml;
}

function redOrBlack ($stringtoParse) {
    if (strpos($stringtoParse, 'Hearts') || strpos($stringtoParse, 'Diamonds')) {
        return '#ff0000';
    } else {
        return '#000000';
    }
}

function whoWins($playerScore, $dealerScore) {
    if ($playerScore > $dealerScore) {
        return 'Player';
    } elseif ($playerScore == $dealerScore) {
        return 'Nobody. It\'s a draw';
    } else {
        return 'Dealer';
    }
}

?>


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
     echo playBlackJack();
    ?>


 </section>

<p>Disclaimer: This is just for practice. Mayden Academy doesn&#039;t really run a casino.</p>

</body>

</html>