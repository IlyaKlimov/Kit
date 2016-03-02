<?php
class Pearson {

    public function getCorrelation($v1, $v2) {
        $denom = sqrt($this->variance($v1) * $this->variance($v2));

        if($denom != 0) {
            $cor = $this->covariance($v1, $v2) / $denom;
            return $cor;
        } else {
            if ( ($this->variance($v1)==0) && ($this->variance($v2)==0) ) {
                return 1.0;
            } else {
                return 0.0;
            }
        }
    }

    private function covariance($v1, $v2) {
        $len1 = count($v1);
        $len2 = count($v2);

        if($len1 != $len2) {
            die("Arrays must have the same length : $len1, $len2");
        }

        $m1  = $this->mean($v1);
        $m2  = $this->mean($v2);
        $ans = 0.0;

        for($i=0; $i < $len1; $i++) {
            $ans += ($v1[$i]-$m1) * ($v2[$i]-$m2);
        }

        return $ans / ($len1 - 1);
    }

    private function variance($v) {
        $m   = $this->mean($v);
        $ans = 0.0;
        $len = count($v);

        for($i=0; $i < $len; $i++) {
            $ans += pow($v[$i] - $m, 2);
        }

        return $ans /($len - 1);
    }

    private function mean($v) {
        $len = count($v);
        if ($len==0){
            die("Nothing to compute! The array must have at least one element.");
        }
        return $this->mass($v) / $len;
    }

    private function mass($v) {
        $sum = 0;
        $len = count($v);
        for($i=0; $i < $len; $i++) {
            $sum += $v[$i];
        }
        return $sum;
    }

}

?>