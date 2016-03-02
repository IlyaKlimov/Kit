<?php

class Html {

    public static function delEscape(&$html) {
        $escape = array(
            "#\n#" => " ",
            "#\t#" => " ",
            "#\r#" => " ",
            "#  +#" => " "
        );

        if (!empty($html)) {
            $html = preg_replace(array_keys($escape), array_values($escape), $html);
        }

        return $html;
    }

    public static function delEntity(&$html) {
        $entity = array(
            "#[&]nbsp[;]#isS" => " ",
            "#[&]ensp[;]#isS" => "",
            "#[&]emsp[;]#isS" => "",
            "#[&]thinsp[;]#isS" => "",
            "#[&]zwj[;]#isS" =>  "",
            "#[&]zwnj[;]#isS" => "",
            "#[&]lsaquo[;]#isS" => "",
            "#[&]rsaquo[;]#isS" => "",
            "#[&]laquo[;]#isS" =>  "",
            "#[&]raquo[;]#isS" =>  "",
            "#[&]sbquo[;]#isS" =>  "",
            "#[&]lsquo[;]#isS" =>  "",
            "#[&]rsquo[;]#isS" =>  "",
            "#[&]bdquo[;]#isS" =>  "",
            "#[&]ldquo[;]#isS" =>  "",
            "#[&]rdquo[;]#isS" =>  "",
            "#[&]quot[;]#isS" => "",
            "#[&]prime[;]#isS" =>  "",
            "#[&]Prime[;]#isS" =>  "",
            "#[&]mdash[;]#isS" =>  "",
            "#[&]ndash[;]#isS" =>  "",
            "#[&]hellip[;]#isS" => "",
            "#[&]iexcl[;]#isS" =>  "",
            "#[&]iquest[;]#isS" => "",
            "#[&]larr[;]#isS" => "",
            "#[&]rarr[;]#isS" => "",
            "#[&]uarr[;]#isS" => "",
            "#[&]darr[;]#isS" => "",
            "#[&]lArr[;]#isS" => "",
            "#[&]rArr[;]#isS" => "",
            "#[&]uArr[;]#isS" => "",
            "#[&]dArr[;]#isS" => "",
            "#[&]harr[;]#isS" => "",
            "#[&]hArr[;]#isS" => "",
            "#[&]crarr[;]#isS" =>  "",
            "#[&]bull[;]#isS" => "",
            "#[&]middot[;]#isS" => "",
            "#[&]sdot[;]#isS" => "",
            "#[&]lowast[;]#isS" => "",
            "#[&]clubs[;]#isS" =>  "",
            "#[&]diams[;]#isS" =>  "",
            "#[&]hearts[;]#isS" => "",
            "#[&]spades[;]#isS" => "",
            "#[&]loz[;]#isS" =>  "",
            "#[&]times[;]#isS" =>  "",
            "#[&]divide[;]#isS" => "",
            "#[&]frasl[;]#isS" =>  "",
            "#[&]minus[;]#isS" =>  "",
            "#[&]plusmn[;]#isS" => "",
            "#[&]lt[;]#isS" => "",
            "#[&]gt[;]#isS" => "",
            "#[&]le[;]#isS" => "",
            "#[&]ge[;]#isS" => "",
            "#[&]asymp[;]#isS" =>  "",
            "#[&]cong[;]#isS" => "",
            "#[&]equiv[;]#isS" =>  "",
            "#[&]ne[;]#isS" => "",
            "#[&]deg[;]#isS" =>  "",
            "#[&]frac12[;]#isS" => "",
            "#[&]frac14[;]#isS" => "",
            "#[&]frac34[;]#isS" => "",
            "#[&]sup1[;]#isS" => "",
            "#[&]sup2[;]#isS" => "",
            "#[&]sup3[;]#isS" => "",
            "#[&]amp[;]#isS" =>  "",
            "#[&]sim[;]#isS" =>  "",
            "#[&]and[;]#isS" =>  "",
            "#[&]or[;]#isS" => "",
            "#[&]not[;]#isS" =>  "",
            "#[&]alefsym[;]#isS" =>  "",
            "#[&]ang[;]#isS" =>  "",
            "#[&]cap[;]#isS" =>  "",
            "#[&]cup[;]#isS" =>  "",
            "#[&]sub[;]#isS" =>  "",
            "#[&]sube[;]#isS" => "",
            "#[&]sup[;]#isS" =>  "",
            "#[&]supe[;]#isS" => "",
            "#[&]ni[;]#isS" => "",
            "#[&]isin[;]#isS" => "",
            "#[&]notin[;]#isS" =>  "",
            "#[&]nsub[;]#isS" => "",
            "#[&]exist[;]#isS" =>  "",
            "#[&]fnof[;]#isS" => "",
            "#[&]forall[;]#isS" => "",
            "#[&]infin[;]#isS" =>  "",
            "#[&]int[;]#isS" =>  "",
            "#[&]lowast[;]#isS" => "",
            "#[&]micro[;]#isS" =>  "",
            "#[&]nabla[;]#isS" =>  "",
            "#[&]part[;]#isS" => "",
            "#[&]perp[;]#isS" => "",
            "#[&]prod[;]#isS" => "",
            "#[&]prop[;]#isS" => "",
            "#[&]radic[;]#isS" =>  "",
            "#[&]sdot[;]#isS" => "",
            "#[&]sum[;]#isS" =>  "",
            "#[&]empty[;]#isS" =>  "",
            "#[&]oplus[;]#isS" =>  "",
            "#[&]otimes[;]#isS" => "",
            "#[&]there4[;]#isS" => "",
            "#[&]lang[;]#isS" => "",
            "#[&]rang[;]#isS" => "",
            "#[&]lceil[;]#isS" =>  "",
            "#[&]lfloor[;]#isS" => "",
            "#[&]rceil[;]#isS" =>  "",
            "#[&]rfloor[;]#isS" => "",
            "#[&]curren[;]#isS" => "",
            "#[&]cent[;]#isS" => "",
            "#[&]euro[;]#isS" => "",
            "#[&]pound[;]#isS" =>  "",
            "#[&]yen[;]#isS" =>  "",
            "#[&]copy[;]#isS" => "",
            "#[&]trade[;]#isS" =>  "",
            "#[&]reg[;]#isS" =>  "",
            "#[&]sect[;]#isS" => "",
            "#[&]brvbar[;]#isS" => "",
            "#[&]dagger[;]#isS" => "",
            "#[&]Dagger[;]#isS" => "",
            "#[&]image[;]#isS" =>  "",
            "#[&]real[;]#isS" => "",
            "#[&]weierp[;]#isS" => "",
            "#[&]oline[;]#isS" =>  "",
            "#[&]ordf[;]#isS" => "",
            "#[&]ordm[;]#isS" => "",
            "#[&]para[;]#isS" => "",
            "#[&]permil[;]#isS" => "",
            "#[&]shy[;]#isS" =>  "",
            "#[&]lrm[;]‎#isS" => "",
            "#[&]rlm[;]‏#isS" => "",
            "#[&]Alpha[;]#isS" =>  "",
            "#[&]alpha[;]#isS" =>  "",
            "#[&]Beta[;]#isS" => "",
            "#[&]beta[;]#isS" => "",
            "#[&]Gamma[;]#isS" =>  "",
            "#[&]gamma[;]#isS" =>  "",
            "#[&]Delta[;]#isS" =>  "",
            "#[&]delta[;]#isS" =>  "",
            "#[&]Epsilon[;]#isS" =>  "",
            "#[&]epsilon[;]#isS" =>  "",
            "#[&]Zeta[;]#isS" => "",
            "#[&]zeta[;]#isS" => "",
            "#[&]Eta[;]#isS" =>  "",
            "#[&]eta[;]#isS" =>  "",
            "#[&]Theta[;]#isS" =>  "",
            "#[&]theta[;]#isS" =>  "",
            "#[&]thetasym[;]#isS" => "",
            "#[&]Iota[;]#isS" => "",
            "#[&]iota[;]#isS" => "",
            "#[&]Kappa[;]#isS" =>  "",
            "#[&]kappa[;]#isS" =>  "",
            "#[&]Lambda[;]#isS" => "",
            "#[&]lambda[;]#isS" => "",
            "#[&]Mu[;]#isS" => "",
            "#[&]mu[;]#isS" => "",
            "#[&]Nu[;]#isS" => "",
            "#[&]nu[;]#isS" => "",
            "#[&]Xi[;]#isS" => "",
            "#[&]xi[;]#isS" => "",
            "#[&]Omicron[;]#isS" =>  "",
            "#[&]omicron[;]#isS" =>  "",
            "#[&]Pi[;]#isS" => "",
            "#[&]pi[;]#isS" => "",
            "#[&]piv[;]#isS" =>  "",
            "#[&]Rho[;]#isS" =>  "",
            "#[&]rho[;]#isS" =>  "",
            "#[&]Sigma[;]#isS" =>  "",
            "#[&]sigma[;]#isS" =>  "",
            "#[&]sigmaf[;]#isS" => "",
            "#[&]Tau[;]#isS" =>  "",
            "#[&]tau[;]#isS" =>  "",
            "#[&]Upsilon[;]#isS" =>  "",
            "#[&]upsilon[;]#isS" =>  "",
            "#[&]upsih[;]#isS" =>  "",
            "#[&]Phi[;]#isS" =>  "",
            "#[&]phi[;]#isS" =>  "",
            "#[&]Chi[;]#isS" =>  "",
            "#[&]chi[;]#isS" =>  "",
            "#[&]Psi[;]#isS" =>  "",
            "#[&]psi[;]#isS" =>  "",
            "#[&]Omega[;]#isS" =>  "",
            "#[&]omega[;]#isS" =>  "",
            "#[&]acute[;]#isS" =>  "",
            "#[&]cedil[;]#isS" =>  "",
            "#[&]circ[;]#isS" => "",
            "#[&]macr[;]#isS" => "",
            "#[&]middot[;]#isS" => "",
            "#[&]tilde[;]#isS" =>  "",
            "#[&]uml[;]#isS" =>  "",
            "#[&]Aacute[;]#isS" => "",
            "#[&]aacute[;]#isS" => "",
            "#[&]Acirc[;]#isS" =>  "",
            "#[&]acirc[;]#isS" =>  "",
            "#[&]AElig[;]#isS" =>  "",
            "#[&]aelig[;]#isS" =>  "",
            "#[&]Agrave[;]#isS" => "",
            "#[&]agrave[;]#isS" => "",
            "#[&]Aring[;]#isS" =>  "",
            "#[&]aring[;]#isS" =>  "",
            "#[&]Atilde[;]#isS" => "",
            "#[&]atilde[;]#isS" => "",
            "#[&]Auml[;]#isS" => "",
            "#[&]auml[;]#isS" => "",
            "#[&]Ccedil[;]#isS" => "",
            "#[&]ccedil[;]#isS" => "",
            "#[&]Eacute[;]#isS" => "",
            "#[&]eacute[;]#isS" => "",
            "#[&]Ecirc[;]#isS" =>  "",
            "#[&]ecirc[;]#isS" =>  "",
            "#[&]Egrave[;]#isS" => "",
            "#[&]egrave[;]#isS" => "",
            "#[&]ETH[;]#isS" =>  "",
            "#[&]eth[;]#isS" =>  "",
            "#[&]Euml[;]#isS" => "",
            "#[&]euml[;]#isS" => "",
            "#[&]Iacute[;]#isS" => "",
            "#[&]iacute[;]#isS" => "",
            "#[&]Icirc[;]#isS" =>  "",
            "#[&]icirc[;]#isS" =>  "",
            "#[&]Igrave[;]#isS" => "",
            "#[&]igrave[;]#isS" => "",
            "#[&]Iuml[;]#isS" => "",
            "#[&]iuml[;]#isS" => "",
            "#[&]Ntilde[;]#isS" => "",
            "#[&]ntilde[;]#isS" => "",
            "#[&]Oacute[;]#isS" => "",
            "#[&]oacute[;]#isS" => "",
            "#[&]Ocirc[;]#isS" =>  "",
            "#[&]ocirc[;]#isS" =>  "",
            "#[&]OElig[;]#isS" =>  "",
            "#[&]oelig[;]#isS" =>  "",
            "#[&]Ograve[;]#isS" => "",
            "#[&]ograve[;]#isS" => "",
            "#[&]Oslash[;]#isS" => "",
            "#[&]oslash[;]#isS" => "",
            "#[&]Otilde[;]#isS" => "",
            "#[&]otilde[;]#isS" => "",
            "#[&]Ouml[;]#isS" => "",
            "#[&]ouml[;]#isS" => "",
            "#[&]Scaron[;]#isS" => "",
            "#[&]scaron[;]#isS" => "",
            "#[&]szlig[;]#isS" =>  "",
            "#[&]THORN[;]#isS" =>  "",
            "#[&]thorn[;]#isS" =>  "",
            "#[&]Uacute[;]#isS" => "",
            "#[&]uacute[;]#isS" => "",
            "#[&]Ucirc[;]#isS" =>  "",
            "#[&]ucirc[;]#isS" =>  "",
            "#[&]Ugrave[;]#isS" => "",
            "#[&]ugrave[;]#isS" => "",
            "#[&]Uuml[;]#isS" => "",
            "#[&]uuml[;]#isS" => "",
            "#[&]Yacute[;]#isS" => "",
            "#[&]yacute[;]#isS" => "",
            "#[&]Yuml[;]#isS" => "",
            "#[&]yuml[;]#isS" => ""
        );

        if (!empty($html)) {
            $html = preg_replace(array_keys($entity), array_values($entity), $html);
        }

        return $html;
    }

    public static function delTags(&$html, $tag) {

        $pattern = array(
            "head" => "#<head.*?head>#",
            "script" => "#<script.*?>.*?</script>#isS",
            "noscript" => "#<noscript>.*?</noscript>#isS",
            "comments" => "#<!.*?->#is",
            "noindex" => "#<noindex.*?>.*?</noindex>#isS",
            "style" => "#<style.*?style>#isS",
            "button" => "#<button.*?>.*?</button>#isS",
            "canvas" => "#<canvas.*?>.*?</canvas>#isS",
            "iframe" => "#<iframe.*?>.*?</iframe>#isS",
            "noembed" => "#<noembed.*?>.*?</noembed>#isS",
            "noframes" => "#<noframes.*?>.*?</noframes>#isS",
            "select" => "#<select.*?>.*?</select>#isS",
            "video" => "#<video.*?>.*?</video>#isS",
        );

        if (!empty($tag)) {
            foreach ($tag as $value) {
                if (isset($pattern[$value])) {
                    $delete[$pattern[$value]] = "";
                }
            }
            $html = preg_replace(array_keys($delete), array_values($delete), $html);
        }

        return $html;
    }

    public static function delAllBeforeAndAfterHtmlTags(&$html) {
        $pattern = array(
            "#.*?(<html.*?>)#isS" => "$1",
            "#(</html>).*#isS" => "$1"
        );
        $html = preg_replace(array_keys($pattern), array_values($pattern), $html);
    }

   public static function prepareHtml($html, array $tags_for_remove = array()) {
        self::delEntity($html);
        self::delEscape($html);
        self::delAllBeforeAndAfterHtmlTags($html); // А что если блаблабла<html>....<html> ???
        self::delTags($html, $tags_for_remove);

        $tidy = new tidy;
        $tidy->parseString($html, array('indent' => TRUE, 'output-xhtml' => TRUE, 'wrap' => 200), 'utf8');
        $tidy->cleanRepair();

        $html = $tidy;
        $html = trim($html);

        return $html;
    }

    public static function getPassages($html) {
        $passage = array();
        self::delEntity($html);
        self::delEscape($html);
        self::delAllBeforeAndAfterHtmlTags($html);
        self::delTags($html, ['head', 'script', 'noscript', 'comments', 'noindex', 'button', 'canvas', 'iframe', 'noembed', 'noframes', 'select', 'video', 'style']);
        $html = preg_replace("#(<(?:p|div|table|td|th|tr|li|ol|ul|h1|h2|h3|h4|h5|h6).*?>)#i", "\n$1", $html);
        $html = preg_replace("#(<\/(?:p|div|table|td|th|tr|li|ol|ul|h1|h2|h3|h4|h5|h6)[^>]*>)#i", "$1\n", $html);
        $arr = explode("\n", $html);
        foreach ($arr as &$str) {
            $str = strip_tags($str);
            self::delEscape($str);
            $str = trim($str);
            if (!empty($str)) {
                $passage[] = $str;
            }
        }
        return $passage;
    }

    public static function getTag($html, $tag, $attr, $type) {
        if ($type == 'array')
            $res = array();
        elseif ($type == 'string')
            $res = "";
        $html = str_get_html($html);
        if ($html) {
            foreach($html->find($tag) as $element) {
                $text = trim($element->$attr);
                if (!empty($text)) {
                    if ($type == 'array') {
                        $res[] = $text;
                    } elseif ($type == 'string') {
                        $res .= " ".$text;
                    }
                }
            }
        }

        return $res;
    }

    public static function isHtml($html) {
        $arr = Array('<html', '<body', '<div', '<table', '<HTML', '<BODY', '<DIV', '<TABLE', '<Html', '<Body', '<Div', '<Table');
        $html = strtolower($html);
        foreach($arr as $str)
            if(strpos($html, $str)!==FALSE)
                return TRUE;
        return FALSE;
    }

}



