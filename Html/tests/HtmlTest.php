<?php

include __DIR__.'\..\Html.php';
include __DIR__.'\..\..\_vendors\simple_html_dom.php';

class HtmlTest extends PHPUnit_Framework_TestCase {

    /**
    * @dataProvider providerIsHtml
    */
    public function testIsHtml($atr, $res) {
        $this->assertEquals($res, Html::isHtml($atr));
    }

    public function providerIsHtml() {

        foreach (['html', 'body', 'div', 'table', 'HTML', 'BODY', 'DIV', 'TABLE', 'Html', 'Body', 'Div', 'Table'] as $tag) {
            $arr[] = ['<'.$tag, TRUE];
            $arr[] = [$tag." is a simple string!", FALSE];
        }

        return $arr;
    }

    public function testPrepareHtml() {

        $html =
            'Этого текста здесь быть не должно!<html lang="en">
                <head>
                    <meta charset="utf-8">
                    <title>Title</title>
                    <script>
                        function popup() {
                            document.getElementById().innerHTML = "";
                        }
                    </script>
                </head>
                <body>
                    <!-- Комментарий -->
                    <button class="test">Button</button>
                    <button>Button</button>
                    <noindex>Не индексировать!</noindex>
                    <noscript><script type="text/javascript">
                        document.write ();
                        for (i=1; i<6; i++) {
                            document.writeln();
                            for (j=1; j<6; j++) document.write();
                                document.writeln();
                        }
                        document.write();
                    </script></noscript>
                    <h1>Text      H1</h1>
                    &nbsp; &ensp; &emsp; &thinsp; &zwj; &zwnj; &lsaquo; &rsaquo; &laquo; &raquo; &sbquo; &lsquo; &rsquo; &bdquo; &ldquo; &rdquo; &quot; &prime; &Prime; &mdash; &ndash; &hellip; &iexcl; &iquest; &larr; &rarr; &uarr; &darr; &lArr; &rArr; &uArr; &dArr; &harr; &hArr; &crarr; &bull; &middot; &sdot; &lowast; &clubs; &diams; &hearts; &spades; &loz; &times; &divide; &frasl; &minus; &plusmn; &lt; &gt; &le; &ge; &asymp; &cong; &equiv; &ne; &deg; &frac12; &frac14; &frac34; &sup1; &sup2; &sup3; &amp; &sim; &and; &or; &not; &alefsym; &ang; &cap; &cup; &sub; &sube; &sup; &supe; &ni; &isin; &notin; &nsub; &exist; &fnof; &forall; &infin; &int; &lowast; &micro; &nabla; &part; &perp; &prod; &prop; &radic; &sdot; &sum; &empty; &oplus; &otimes; &there4; &lang; &rang; &lceil; &lfloor; &rceil; &rfloor; &curren; &cent; &euro; &pound; &yen; &copy; &trade; &reg; &sect; &brvbar; &dagger; &Dagger; &image; &real; &weierp; &oline; &ordf; &ordm; &para; &permil; &shy; &lrm;‎ &rlm;‏ &Alpha; &alpha; &Beta; &beta; &Gamma; &gamma; &Delta; &delta; &Epsilon; &epsilon; &Zeta; &zeta; &Eta; &eta; &Theta; &theta; &thetasym; &Iota; &iota; &Kappa; &kappa; &Lambda; &lambda; &Mu; &mu; &Nu; &nu; &Xi; &xi; &Omicron; &omicron; &Pi; &pi; &piv; &Rho; &rho; &Sigma; &sigma; &sigmaf; &Tau; &tau; &Upsilon; &upsilon; &upsih; &Phi; &phi; &Chi; &chi; &Psi; &psi; &Omega; &omega; &acute; &cedil; &circ; &macr; &middot; &tilde; &uml; &Aacute; &aacute; &Acirc; &acirc; &AElig; &aelig; &Agrave; &agrave; &Aring; &aring; &Atilde; &atilde; &Auml; &auml; &Ccedil; &ccedil; &Eacute; &eacute; &Ecirc; &ecirc; &Egrave; &egrave; &ETH; &eth; &Euml; &euml; &Iacute; &iacute; &Icirc; &icirc; &Igrave; &igrave; &Iuml; &iuml; &Ntilde; &ntilde; &Oacute; &oacute; &Ocirc; &ocirc; &OElig; &oelig; &Ograve; &ograve; &Oslash; &oslash; &Otilde; &otilde; &Ouml; &ouml; &Scaron; &scaron; &szlig; &THORN; &thorn; &Uacute; &uacute; &Ucirc; &ucirc; &Ugrave; &ugrave; &Uuml; &uuml; &Yacute; &yacute; &Yuml; &yuml;
                    <canvas id="smile" width="200" height="200">
                        <p>Error!</p>
                    </canvas>
                    <iframe src="banner.html" width="468" height="60" align="left">
                        Error!
                    </iframe>
                    <noembed>noembed error</noembed>
                    <noframes>noframes error</noframes>
                    <select size="3" name="hero">
                        <option disabled>select option</option>
                        <option value="t1" selected>select option</option>
                        <option value="t2">select option</option>
                        <option value="t3">select option</option>
                        <option value="t4">select option</option>
                    </select>
                    <video width="400" height="300" controls="controls">
                       <source src="video/duel.ogv" type=\'video/ogg; codecs="theora, vorbis"\'>
                       <source src="video/duel.mp4" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\'>
                       <source src="video/duel.webm" type=\'video/webm; codecs="vp8, vorbis"\'>
                       Video
                    </video>
                </body>
            </html>
            И этого тоже!';

        $actual = Html::prepareHtml($html, ["head", "comments", "button", "noindex", "script", "noscript", "canvas", "iframe", "noembed", "noframes", "select", "video"]);
        $actual = preg_replace("#(\s)|(\n)#", "", $actual);

        $res = '<!DOCTYPEhtmlPUBLIC"-//W3C//DTDXHTML1.0Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><htmllang="en"xmlns="http://www.w3.org/1999/xhtml"xml:lang="en"><head><title></title></head><body><h1>TextH1</h1></body></html>';
        $this->assertEquals($res, $actual);

    }

    /**
    * @dataProvider providerGetTag
    */
    public function testGetTag($tag, $atr, $type, $res) {
        $html =
            '<html lang="en">
                <head>
                    <meta charset="utf-8">
                    <title>title</title>
                    <meta name="keywords" content="keywords" />
                    <meta name="description" content="description" />
                    <script>
                        function popup() {
                            document.getElementById().innerHTML = "";
                        }
                    </script>
                </head>
                <body>
                    <h1>h1</h1>
                    <h1>h1_2</h1>

                    <h2>h2</h2>
                    <h2>h2_2</h2>

                    <h3>h3</h3>
                    <h3>h3_2</h3>

                    <h4>h4</h4>
                    <h4>h4_2</h4>

                    <h5>h5</h5>
                    <h5>h5_2</h5>

                    <h6>h6</h6>
                    <h6>h6_2</h6>

                    <a href="">a</a>
                    <a href="" class="atr">a+class</a>
                    Text <a href="">a+text</a> text <a href="" class="atr">a+class+text</a> text text.

                    <a href="" title="a[title]">a</a>
                    <a href="" class="atr" title="a+class[title]">a+class</a>
                    Text <a href="" title="a+text[title]">a+text</a> text <a href="" class="atr" title="a+class+text[title]">a+class+text</a> text text.

                    Text <b>b</b> text.
                    Text <b>b_1</b> text <b>b_2</b> text.

                    Text <big>big</big> text.
                    Text <big>big_1</big> text <big>big_2</big> text.

                    Text <em>em</em> text.
                    Text <em>em_1</em> text <em>em_2</em> text.

                    Text <s>s</s> text.
                    Text <s>s_1</s> text <s>s_2</s> text.

                    Text <small>small</small> text.
                    Text <small>small_1</small> text <small>small_2</small> text.

                    Text <strong>strong</strong> text.
                    Text <strong>strong_1</strong> text <strong>strong_2</strong> text.

                    Text <u>u</u> text.
                    Text <u>u_1</u> text <u>u_2</u> text.

                    Text <i>i</i> text.
                    Text <i>i_1</i> text <i>i_2</i> text.


                    <ul>
                        <li>li_1</li>
                        <li>li_2</li>
                    </ul>

                    <table>
                        <thead>
                            <th>th_1</th>
                            <th>th_2</th>
                        </thead>
                        <tbody>
                            <td>td_1</td>
                            <td>td_2</td>
                        </tbody>
                    </table>

                    <h1><a href="">h1 a</a></h1>
                    <h1><a href="" class="">h1 a+class</a></h1>

                    <img src="" alt="img[alt]_1">
                    <img src="" alt="img[alt]_2">


                </body>
            </html>';

        $this->assertEquals($res, Html::getTag($html, $tag, $atr, $type));
    }

    public function providerGetTag() {

        foreach (['string', 'array'] as $type) {
            if ($type == 'string') {
                $res = ' title';
            } elseif ($type == 'array') {
                $res = ['title'];
            }
            $arr[] = ['title', 'plaintext', $type, $res];
        }

        foreach (['string', 'array'] as $type) {
            if ($type == 'string') {
                $res = ' h1 h1_2 h1 a h1 a+class';
            } elseif ($type == 'array') {
                $res = ['h1', 'h1_2', 'h1 a', 'h1 a+class'];
            }
            $arr[] = ['h1', 'plaintext', $type, $res];
        }

        foreach (['h2', 'h3', 'h4', 'h5', 'h6'] as $tag) {
            foreach (['string', 'array'] as $type) {
                if ($type == 'string') {
                    $res = ' '.$tag.' '.$tag.'_2';
                } elseif ($type == 'array') {
                    $res = [$tag, $tag.'_2'];
                }
                $arr[] = [$tag, 'plaintext', $type, $res];
            }
        }

        foreach (['string', 'array'] as $type) {
            if ($type == 'string') {
                $res = ' a a+class a+text a+class+text a a+class a+text a+class+text h1 a h1 a+class';
            } elseif ($type == 'array') {
                $res = ['a', 'a+class', 'a+text', 'a+class+text', 'a', 'a+class', 'a+text', 'a+class+text', 'h1 a', 'h1 a+class'];
            }
            $arr[] = ['a', 'plaintext', $type, $res];
        }

        foreach (['b', 'big', 'em', 'i', 's', 'small', 'strong', 'u',] as $tag) {
            foreach (['string', 'array'] as $type) {
                if ($type == 'string') {
                    $res = ' '.$tag.' '.$tag.'_1 '.$tag.'_2';
                } elseif ($type == 'array') {
                    $res = [$tag, $tag.'_1', $tag.'_2'];
                }
                $arr[] = [$tag, 'plaintext', $type, $res];
            }
        }

        foreach (['th', 'td'] as $tag) {
            foreach (['string', 'array'] as $type) {
                if ($type == 'string') {
                    $res = ' '.$tag.'_1 '.$tag.'_2';
                } elseif ($type == 'array') {
                    $res = [$tag.'_1', $tag.'_2'];
                }
                $arr[] = [$tag, 'plaintext', $type, $res];
            }
        }

        foreach (['string', 'array'] as $type) {
            if ($type == 'string') {
                $res = ' h1 a h1 a+class';
            } elseif ($type == 'array') {
                $res = ['h1 a', 'h1 a+class'];
            }
            $arr[] = ['h1 a', 'plaintext', $type, $res];
        }

        foreach (['string', 'array'] as $type) {
            if ($type == 'string') {
                $res = ' a[title] a+class[title] a+text[title] a+class+text[title]';
            } elseif ($type == 'array') {
                $res = ['a[title]', 'a+class[title]', 'a+text[title]', 'a+class+text[title]'];
            }
            $arr[] = ['a[title]', 'title', $type, $res];
        }

        foreach (['keywords', 'description'] as $name) {
            $tag = 'meta[name='.$name.']';
            foreach (['string', 'array'] as $type) {
                if ($type == 'string') {
                    $res = ' '.$name;
                } elseif ($type == 'array') {
                    $res = [$name];
                }
                $arr[] = [$tag, 'name', $type, $res];
            }
        }

        foreach (['string', 'array'] as $type) {
            if ($type == 'string') {
                $res = ' img[alt]_1 img[alt]_2';
            } elseif ($type == 'array') {
                $res = ['img[alt]_1', 'img[alt]_2'];
            }
            $arr[] = ['img[alt]', 'alt', $type, $res];
        }

        return $arr;
    }

    public function testGetPassages() {

        $html = file_get_contents(__DIR__."/data/html_for_passages.html");
        $res = json_decode(file_get_contents(__DIR__."/data/passages.json"), TRUE);

        $this->assertEquals($res, Html::getPassages($html));
    }

}





?>