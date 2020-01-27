<?php

require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class FunctionTests extends TestCase {
  //unit tests for determinePictureFace

    public function testdeterminePictureFaceSuccessJack() {
      $expected = 'Jack';
      $input = 11;
      $case = determinePictureFace($input);
      $this->assertEquals($expected, $case);
  }
    public function testdeterminePictureFaceSuccessQueen() {
        $expected = 'Queen';
        $input = 12;
        $case = determinePictureFace($input);
        $this->assertEquals($expected, $case);
    }
    public function testdeterminePictureFaceSuccessKing() {
        $expected = 'King';
        $input = 13;
        $case = determinePictureFace($input);
        $this->assertEquals($expected, $case);
    }
    public function testdeterminePictureFaceFailure() {
        $this->expectException(TypeError::class);
        $input = 5;
        $case = determinePictureFace($input);
    }

    public function testdeterminePictureFaceMalformed() {
      $this->expectException(TypeError::class);
      $input = [];
      $case = determinePictureFace($input);
    }

    //unit tests for redOrBlack
    public function testredOrBlackSuccessHearts() {
        $expected = '#ff0000';
        $input = '3 of Hearts';
        $case = redOrBlack($input);
        $this->assertEquals($expected, $case);
    }
    public function testredOrBlackSuccessDiamonds() {
        $expected = '#ff0000';
        $input = '5 of Diamonds';
        $case = redOrBlack($input);
        $this->assertEquals($expected, $case);
    }
    public function testredOrBlackSuccessClubs() {
        $expected = '#000000';
        $input = 'King of Clubs';
        $case = redOrBlack($input);
        $this->assertEquals($expected, $case);
    }
    public function testredOrBlackSuccessSpades() {
        $expected = '#000000';
        $input = '10 of Spades';
        $case = redOrBlack($input);
        $this->assertEquals($expected, $case);
    }

    public function testredOrBlackFailure() {
        $expected = '#000000';
        $input = 'the king of everything';
        $case = redOrBlack($input);
        $this->assertEquals($expected, $case);
    }

    public function testredOrBlackMalformed() {
        $this->expectException(TypeError::class);
        $input = [];
        $case = redOrBlack($input);
    }

    //unit tests for whoWins function
    public function testwhoWinsSuccessPlayer() {
        $expected = 'Player';
        $firstInput = 18;
        $secondInput = 5;
        $case = whoWins($firstInput, $secondInput);
        $this->assertEquals($expected, $case);
    }
    public function testwhoWinsSuccessDealer() {
        $expected = 'Dealer';
        $firstInput = 12;
        $secondInput = 20;
        $case = whoWins($firstInput, $secondInput);
        $this->assertEquals($expected, $case);
    }
    public function testwhoWinsSuccessDraw() {
        $expected = 'Nobody. It\'s a draw';
        $firstInput = 12;
        $secondInput = 12;
        $case = whoWins($firstInput, $secondInput);
        $this->assertEquals($expected, $case);
    }
    public function testwhoWinsSuccessminus() {
        $expected = 'Dealer';
        $firstInput = -3;
        $secondInput = -1;
        $case = whoWins($firstInput, $secondInput);
        $this->assertEquals($expected, $case);
    }
    public function testwhoWindsMalformed() {
        $this->expectException(TypeError::class);
        $firstInput = [];
        $secondInput = 4;
        $case = redOrBlack($firstInput, $secondInput);
    }

    //unit test for determineSuit function
    public function testdetermineSuitHearts() {
        $expected = 'Hearts';
        $input = 1;
        $case = determineSuit($input);
        $this->assertEquals($expected, $case);
    }
}