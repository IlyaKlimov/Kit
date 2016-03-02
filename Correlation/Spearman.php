<?php
class Spearman {

    private function rank($array) {
        $temp = $array;
        rsort($temp);

        $rank = array();
        $freq = array_count_values($temp);

        foreach($array as $v) {
            $key = array_search($v, $temp);
            $key++;
            if($freq[$v] > 1) {
                $rank[] = array_sum(range($key, $key + $freq[$v] - 1) ) / $freq[$v];
            } else {
                $rank[] = $key;
            }
        }

        return $rank;
    }

    public function getCorrelation($array1, $array2) {
        $d_square = array_map(
            function ($x, $y) {
                return pow(($y-$x), 2);
            },
            $this->rank($array1),
            $this->rank($array2)
        );

        $n = count($array1);

        $result = 1 - (6 * (array_sum($d_square)) / ($n * (pow($n, 2) - 1) ) );

        return $result;
    }
}


?>