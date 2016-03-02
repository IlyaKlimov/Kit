<?php
/**
* Класс для управления массивом
*/
class ArrayManager {

    public static function getFlatArray(array $arr) {
        $res = array();
        foreach ($arr as $value) {
            if (is_array($value)) {
                $res = array_merge($res, self::getFlatArray($value));
            } else {
                $res[] = $value;
            }
        }
        return $res;
    }

    public static function calcDeepArray(array &$arr) {
        $n = 1;
        $a = array_pop($arr);
        if (is_array($a))
            $n += self::calcDeepArray($a);
        return $n;
    }

    public static function changeDeepArray(array $arr, $deep, $n = 0) {
        $res = array();
        $n++;
        foreach ($arr as $value) {
            if ($deep == $n) {
               $res = array_merge($res, self::getFlatArray($value));
            } else {
               $res[] = self::changeDeepArray($value, $deep, $n);
            }
        }
        return $res;
    }

    public static function convertArrayToString(array $arr) {
        $deep = self::calcDeepArray($arr);
        if ($deep > 1)
            $arr = self::changeDeepArray($arr, 1);
        $string = implode(" ", $arr);
        return $string;
    }
}