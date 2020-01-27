<?php

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
 * @param int $pictureFaceNo
 * @return string
 */
function determinePictureFace (int $pictureFaceNo): string {
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
    $playerHtml .= '<div class="card" style="color: ' .redOrBlack($playerHandParam[0]['face']) . '">';
    $playerHtml .= cardBuilder($playerHandParam[0]['face'], $playerScoreParam[0]['score']) . '</div>';
    $playerHtml .= '<div class="card" style="color: ' .redOrBlack($playerHandParam[1]['face']) . '">';
    $playerHtml .= cardBuilder($playerHandParam[1]['face'], $playerHandParam[1]['score']) . '</div>';
    $playerHtml .= '<div class="score"> Score: ' . $playerScoreParam . '</div></div>';

    $dealerHtml = '<div><h2>Dealer</h2>';
    $dealerHtml .= '<div class="card" style="color: ' .redOrBlack($dealerHandParam[0]['face']) . '">';
    $dealerHtml .= cardBuilder( $dealerHandParam[0]['face'], $dealerHandParam[0]['score']) . '</div>';
    $dealerHtml .= '<div class="card" style="color: ' .redOrBlack($dealerHandParam[1]['face']) . '">';
    $dealerHtml .= cardBuilder( $dealerHandParam[1]['face'],  $dealerHandParam[1]['score']) . '</div>';
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

function cardBuilder ($cardToProcess, $score) {
    //hearts &9829;
//clubs &9827;
//diamonds &9830;
//spades &9824;
    if (strpos($cardToProcess, 'Hearts')) {
        $suitChrCode = '&#9829;';
    } elseif (strpos($cardToProcess, 'Clubs')) {
        $suitChrCode = '&#9827;';
    } elseif (strpos($cardToProcess, 'Diamonds')) {
        $suitChrCode = '&#9830;';
    } elseif (strpos($cardToProcess, 'Spades')) {
        $suitChrCode = '&#9824';
    }
    return $cardToProcess . '<br /><br />' . $suitChrCode;

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