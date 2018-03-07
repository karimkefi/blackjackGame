<?php

use PHPUnit\Framework\TestCase;

require('../blackjack.php');

class StackTest extends TestCase
{
    //success
    public function testdeclareWinnerSuccessDraw ()
    {
        $expected = 'Its a draw !';
        $inputA = 21;
        $inputB = 21;
        $case = declareWinner($inputA, $inputB);
        $this->assertEquals($case, $expected);
    }

    //success
    public function testdeclareWinnerSuccessPlayer2()
    {
        $expected = 'Player 2 Wins';
        $inputA = 5;
        $inputB = 21;
        $case = declareWinner($inputA, $inputB);
        $this->assertEquals($case, $expected);
    }

    //failure
    public function testdeclareWinnerFailure()
    {
        $expected = 'Player 2 Wins';
        $inputA = '5';
        $inputB = '21';
        $case = declareWinner($inputA, $inputB);
        $this->assertEquals($case, $expected);
    }



    //success
    public function testselectFourCardsSuccessEqual4()
    {
        $expected = 4;
        $inputA = [ '1A', '2A', '3A', '4A', '5A', '6A', '7A', '8A', '9A', '10A', '11A', '12A', '13A',
                    '1A', '2A', '3A', '4A', '5A', '6A', '7A', '8A', '9A', '10A', '11A', '12A', '13A',
                    '1A', '2A', '3A', '4A', '5A', '6A', '7A', '8A', '9A', '10A', '11A', '12A', '13A',
                    '1A', '2A', '3A', '4A', '5A', '6A', '7A', '8A', '9A', '10A', '11A', '12A', '13A',
                    ];
        $case = count(selectFourCards($inputA));
        $this->assertEquals($case, $expected);
    }

    //failure
    public function testselectFourCardsFailureLess3()
    {
        $expected = 'Not correct number of cards';
        $inputA = ['f', 'a', 'C3'];
        $case = selectFourCards($inputA);
        $this->assertEquals($case, $expected);
    }

    //failure
    public function testselectFourCardsFailureLess53()
    {
        $expected = 'Not correct number of cards';
        $inputA = [ '1A', '2A', '3A', '4A', '5A', '6A', '7A', '8A', '9A', '10A', '11A', '12A', '13A',
                    '1A', '2A', '3A', '4A', '5A', '6A', '7A', '8A', '9A', '10A', '11A', '12A', '13A',
                    '1A', '2A', '3A', '4A', '5A', '6A', '7A', '8A', '9A', '10A', '11A', '12A', '13A',
                    '1A', '2A', '3A', '4A', '5A', '6A', '7A', '8A', '9A', '10A', '11A', '12A', '13A', 'XX'
        ];
        $case = selectFourCards($inputA);
        $this->assertEquals($case, $expected);
    }

    //Malformed
    public function testselectFourCardsFailureLessString()
    {
        $inputA = 'Bob';
        $this->expectException($case, $expected);
        selectFourCards($inputA);
    }


