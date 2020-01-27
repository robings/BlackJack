<?php

require '../functions.php';

use PHPUnit\Framework\TestCase;

class FunctionTests extends TestCase {
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
//    public function testdeterminePictureFaceFailure() {
//        $expected = NULL;
//        $input = 5;
//        $case = determinePictureFace($input);
//        $this->assertEquals($expected, $case);
//    }

    public function testdeterminePictureFaceMalformed() {
      $this->expectException(TypeError::class);
      $input = [];
      $case = determinePictureFace($input);
    }
}