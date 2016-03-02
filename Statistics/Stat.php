<?php

class Stat {

    private static function getAvg($data) {
        return array_sum($data) / count($data);
    }

    private static function getMedian($data) {
        $num = count($data);
        sort($data);
        $mid_index = floor($num/2) - 1;
        if($num&1) {
            $res = $data[$mid_index + 1];
        } else {
            $res = ($data[$mid_index] + $data[$mid_index + 1]) / 2;
        }
        return $res;
    }

    private static function getMode($data) {
        $data = array_map(function($var) {
            return (string) $var;
        }, $data);
        $data = array_count_values($data);
        arsort($data);
        $res = key($data);
        return (float) $res;
    }

    private static function getVariance($data) {
        $res = 0;
        $num = count($data);
        if ($num != 1) {
            $f = array_map(create_function('$x', 'return pow($x - ' . self::getAvg($data) . ', 2);'), $data);
            $res = array_sum($f) / ($num - 1);
        }
        return $res;
    }

    private static function getStd($data) {
        $var = self::getVariance($data);
        $res = sqrt($var);
        return $res;
    }

    public static function calc($name, $data) {
        $res = 0;
        if (!empty($data)) {
            switch ($name) {
                case 'Num':
                    $res = count($data);
                    break;
                case 'Min':
                    $res = min($data);
                    break;
                case 'Max':
                    $res = max($data);
                    break;
                case 'Range':
                    $res = max($data) - min($data);
                    break;
                case 'Sum':
                    $res = array_sum($data);
                    break;
                case 'Avg':
                    $res = self::getAvg($data);
                    break;
                case 'Median':
                    $res = self::getMedian($data);
                    break;
                case 'Mode':
                    $res = self::getMode($data);
                    break;
                case 'Var':
                    $res = self::getVariance($data);
                    break;
                case 'Std':
                    $res = self::getStd($data);
                    break;
            }
        }
        return $res;
    }

    public static function getStat($name, $data) {
        $res = array();
        $key = key($data);
        if (is_array($data[$key])) {
            foreach ($data as $value) {
                $res[] = self::getStat($name, $value);
            }
        } else {
            $res = self::calc($name, $data);
        }
        return $res;
    }

}


