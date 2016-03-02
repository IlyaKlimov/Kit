<?php

include __DIR__.'\..\String.php';

class StringTest extends PHPUnit_Framework_TestCase {

    /**
    * @dataProvider providerIsHtml
    */
    public function testClear($str, $res) {
        $this->assertEquals($res, String::clear($str));
    }

    public function providerIsHtml() {
        $res = "In computer and machine based telecommunications terminology a character is a unit of Information that roughly corresponds to a grapheme grapheme like unit or symbol such as in an Alphabet or syllabary in the written form of a NL";
        return [
            [
                "In~computer`and!machine@based#telecommunications terminology%a^character&is*a(unit)of_Information+that\"roughly№corresponds;to:a?grapheme{grapheme}like[unit]or\symbol|such/as>in<an.Alphabet,or'syllabary in    the written  form  of a NL",
                $res
            ],
            [
                "In ~ computer ` and ! machine @ based # telecommunications $ terminology % a ^ character & is * a ( unit ) of _ Information + that \" roughly № corresponds ; to : a ? grapheme { grapheme } like [ unit ] or \ symbol | such / as > in < an . Alphabet , or ' syllabary   in    the written  form  of a NL",
                $res
            ],
            [
                "In  ~   computer  `   and  !   machine  @   based  #   telecommunications  $   terminology  %   a  ^   character  &   is  *   a  (   unit  )   of  _   Information  +   that  \"   roughly  №   corresponds  ;   to  :   a  ?   grapheme  {   grapheme  }   like  [   unit  ]   or  \   symbol  |   such  /   as  >   in  <   an  .   Alphabet  ,   or  '   syllabary      in    the written  form  of a NL",
                $res
            ],
        ];
    }

    public function testGetTextLine() {
        $str = "Word word \n word word \r word. Word \t - word word. Word\nword word\t word word\rword!";
        $res = "Word word word word word. Word - word word. Word word word word word word!";
        $this->assertEquals($res, String::getTextLine($str));
    }

    /**
    * @dataProvider providerGetWordArray
    */
    public function testGetWordArray($str, $letters, $res) {
        $this->assertEquals($res, String::getWordArray($str, $letters));
    }

    public function providerGetWordArray() {
        return [
            [
                "One Two Three Four Five Six Seven Eight Nine!",
                "original",
                ["One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"]
            ],
            [
                "one two three four five six seven eight nine!",
                "original",
                ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine"]
            ],
            [
                "ONE TWO THREE FOUR FIVE SIX SEVEN EIGHT NINE!",
                "original",
                ["ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX", "SEVEN", "EIGHT", "NINE"]
            ],

            [
                "One Two Three Four Five Six Seven Eight Nine!",
                "lower",
                ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine"]
            ],
            [
                "one two three four five six seven eight nine!",
                "lower",
                ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine"]
            ],
            [
                "ONE TWO THREE FOUR FIVE SIX SEVEN EIGHT NINE!",
                "lower",
                ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine"]
            ],

            [
                "One Two Three Four Five Six Seven Eight Nine!",
                "upper",
                ["ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX", "SEVEN", "EIGHT", "NINE"]
            ],
            [
                "one two three four five six seven eight nine!",
                "upper",
                ["ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX", "SEVEN", "EIGHT", "NINE"]
            ],
            [
                "ONE TWO THREE FOUR FIVE SIX SEVEN EIGHT NINE!",
                "upper",
                ["ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX", "SEVEN", "EIGHT", "NINE"]
            ],
        ];
    }


}



?>