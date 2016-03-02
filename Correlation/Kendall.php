<?php

class Kendall {

    public function getCorrelation($x, $y) {

        $c = 0;
        $d = 0;
        $t = 0;

        $num = count($x);
        $r = range(0, $num - 1);

        for($i=0; $i<$num-1; $i++) {
            for($j=$i+1; $j<$num; $j++) {

                $X = $x[$r[$i]] - $x[$r[$j]];
                $Y = $y[$r[$i]] - $y[$r[$j]];
                $s = $X * $Y;

                if ($s) {
                    $c++;
                    $d++;
                    if ($s > 0) {
                        $t++;
                    } elseif ($s < 0) {
                        $t--;
                    }
                } else {
                    if ($X) {
                        $c++;
                    } elseif ($Y) {
                        $d++;
                    }
                }
            }
        }

        $sqrt = sqrt($c * $d);

        if ($t == 0 OR $sqrt == 0) {
            $cor = 0;
        } else {
            $cor = $t / $sqrt;
        }

        return $cor;
    }

}
?>