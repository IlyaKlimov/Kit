<?php

class String {

    /**
    * Замена всех несимвольных и нечисловых знаков на пробелы.
    * Удаление двойных и боковых пробелов.
    * @param string $str Строка для обработки.
    * @return string
    */
    public static function clear($str) {
        if (!empty($str)) {
            $str = preg_replace("#[^A-Za-zА-Яа-я0-9]#ui", ' ', $str);
            $str = preg_replace("#\s\s+#is", " ", $str);
            $str = trim($str);
        }
        return $str;
    }


    /**
    * Приведение строки к плоскому виду.
    * Замена переносов строк и табуляции на пробел.
    * @param string $str Строка для обработки.
    * @return string
    */
    public static function getTextLine($str) {
        if (!empty($str)) {
            $str = str_replace(array("\n", "\r", "\t"), " ", $str);
            $str = preg_replace(array("/ +>/", "/< +/"), array('>', '<'), $str);
            $str = preg_replace("#\s\s+#", " ", $str);
            $str = trim($str);
        }
        return $str;
    }


    /**
    * Преобразование строки к массиву слов.
    * Можно задать атрибут $letters, что бы управлять регистром букв (верхний, нижний, оригинал).
    * @param string $str Строка для обработки.
    * @param string $letters Регистр букв.
    * @return array
    */
    public static function getWordArray($str, $letters = "original") {
        $arr = array();

        if (!empty($str)) {
            $str = self::clear($str);
            $str = self::getTextLine($str);

            if ($letters == "lower") {
                $str = mb_strtolower($str);
            } elseif ($letters == "upper") {
                $str = mb_strtoupper($str);
            }

            $arr = explode(" ", $str);
        }

        return $arr;
    }


    /**
    * Преобразование массива слов к базовой форме.
    * @param array $arr Массив слов.
    * @param Morphy $Morphy Класс библиотеки phpmorphy
    * @return array
    */
    public static function getBaseWordArray(array $arr, $Morphy) {
        $baseword = array();
        if (!empty($arr)) {
            foreach ($arr as $word) {
                $baseform = $Morphy->lemmatize($word);
                if (!empty($baseform)) {
                    $baseword[] = $baseform[0]; // Берем первое слово
                } else {
                    $baseword[] = $word;
                }
            }
        }
        return $baseword;
    }

}




