<?php

//Looping through each of the 4suits, then each of the 13 Ranks.
//$newDeck is an associative array where the KEY = concat of Rank + Suit
//and their VALUE = 13 cardVal
/**
 * Creates a new deck of 52 cards by looping through each of the 4suits, then each of the 13 Ranks.
 *
 * @return $newDeck is an associative array where the KEY = concat of Rank + Suit and VALUE = 13 cardVal
 */
function createDeck() {
    $suits = ['C', 'D', 'H', 'S'];
    $ranks = [2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K', 'A'];
    $cardVal = [2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10, 11];
    for ($s = 0; $s < count($suits); $s++) {
        for ($r = 0; $r < count($ranks); $r++) {
            $newDeck[$ranks[$r] . $suits[$s]] += $cardVal[$r];
        }
    }
    return $newDeck;
}


/**
 * Pick 4 random cards for both players from the deck of 52 cards
 *
 * @param $deckofCards Array Deck of 52 Cards
 *
 * @return $fourCards Array Four Random cards selected
 * @return string if the number of Array values passed into the function is anything other than 52 elements
 */
function selectFourCards($deckofCards) {
    if(count($deckofCards) == 52) {
        return $fourCards = array_rand($deckofCards, 4);
    } else {
        return 'Not correct number of cards';
    }
}


/**
 * value the 2 cards in each player's hand
 *
 * @param $fullDeck Array Deck of 52 Cards (this is an associative array where the elements value are the cards score)
 * @param $hand Array 2 Cards for each players hand
 *
 * @return $handValue Int Score of each player's hand
 */
function valueCards ($fullDeck, $hand):int {
        $card1Val = $fullDeck[$hand[0]];
        $card2Val = $fullDeck[$hand[1]];
        if ($card1Val + $card2Val == 22) {
            $handValue = 12;
        } else {
            $handValue = $card1Val + $card2Val;
        }
        return $handValue;
}


/**
 * selects a winner from the scores of 2 players
 *
 * @param $teamAscore Int Team A score
 * @param $teamBscore Int Team B score
 *
 * @return $handValue Int Score of each player's hand
 */
function declareWinner($teamAscore, $teamBscore) {
    if ($teamAscore > $teamBscore) {
        return 'Player 1 Wins';
    } elseif ($teamAscore < $teamBscore) {
        return 'Player 2 Wins';
    } else {
        return 'Its a draw !';
    }
}


function playTheGame () {
    $Deck1 = createDeck();
    $selectedCards = selectFourCards($Deck1);
    $player1Cards = array_splice($selectedCards, 2);
    $player2Cards = array_diff($selectedCards, $player1Cards);
    $player1Points = valueCards($Deck1, $player1Cards);
    $player2Points = valueCards($Deck1, $player2Cards);
    return declareWinner($player1Points, $player2Points);
}

echo playTheGame();

?>
