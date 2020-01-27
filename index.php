<?php

require 'functions.php';
//blackjack aces low, picture cards 10

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
     echo buildPageDisplay($playerHand, $playerHandScore, $dealerHand, $dealerHandScore);;
    ?>


 </section>

<p>Disclaimer: This is just for practice. Mayden Academy doesn&#039;t really run a casino.</p>

</body>

</html>