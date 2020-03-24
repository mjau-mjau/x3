<?php

/* partials/footer.html */
class __TwigTemplate_76bfd9be1a42cb5872013f94b2c2c526c2f5589af4f3adf0516b3657b1687302 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "</main>
</div>
</div>

<footer class=\"footer\">

\t";
        // line 8
        echo "\t";
        echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('removeComments')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "footer"))), array("{{copy}}" => (((((("<p>&copy; " . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "current_year")) . " <a href=\"") . (isset($context["rootpath"]) ? $context["rootpath"] : null)) . "/\">") . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "base_url")) . "</a></p>"))))));
        echo "

\t";
        // line 12
        echo "\t<p class=\"x3-footer-link\">X3 ";
        echo call_user_func_array($this->env->getFunction('random')->getCallable(), array($this->env, array(0 => "Photo Gallery Website", 1 => "Photography Website", 2 => "Image Gallery CMS", 3 => "Website for Photographers", 4 => "Online Portfolio")));
        echo " by <a href=\"https://www.photo.gallery\">www.photo.gallery</a></p>
</footer>

";
        // line 16
        echo "<script>
var x3_settings = ";
        // line 17
        echo call_user_func_array($this->env->getFunction('jsonSettings')->getCallable(), array((isset($context["page"]) ? $context["page"] : null)));
        echo ";
var x3_page = ";
        // line 18
        echo call_user_func_array($this->env->getFunction('pageJson')->getCallable(), array((isset($context["page_title"]) ? $context["page_title"] : null), (isset($context["page_description"]) ? $context["page_description"] : null), "", $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "template_name"), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id"), (isset($context["preview_image_full"]) ? $context["preview_image_full"] : null), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink"), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path")));
        echo ";
";
        // line 19
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            // line 20
            echo "function jsFail(){
\tvar s = document.createElement('script');
\ts.type = 'text/javascript';
\ts.onload = imagevue_;
\ts.src = '";
            // line 24
            echo (isset($context["local_js"]) ? $context["local_js"] : null);
            echo "';
\tdocument.getElementsByTagName('head')[0].appendChild(s);
}
";
        }
        // line 28
        echo "</script>

";
        // line 31
        $context["custom_js_files"] = call_user_func_array($this->env->getFunction('x3_glob')->getCallable(), array("./content/custom/files/javascript/*include*.js", (("<script id=\"custom_javascript_{{index}}\" src=\"" . (isset($context["assetspath"]) ? $context["assetspath"] : null)) . "/content/custom/files/javascript/{{basename}}\"></script>")));
        // line 32
        if ((isset($context["custom_js_files"]) ? $context["custom_js_files"] : null)) {
            echo (isset($context["custom_js_files"]) ? $context["custom_js_files"] : null);
        }
        // line 33
        echo "
";
        // line 35
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "js"))))))) {
            // line 36
            echo "<script id=\"custom-javascript\">";
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "js")));
            echo "</script>
";
        }
        // line 38
        echo "
";
        // line 40
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            // line 41
            echo "
<script src=\"https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/velocity-animate@1.0.1/velocity.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/velocity-animate@1.0.1/velocity.ui.min.js\"></script>
";
            // line 45
            if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "layout") == "slideshow")) {
                echo "<script src=\"https://cdn.jsdelivr.net/npm/fotorama@4.6.4/fotorama.js\"></script>";
            }
            // line 46
            echo "<script src=\"https://cdn.jsdelivr.net/npm/string@3.3.3/dist/string.min.js\"></script>
";
        } else {
            // line 48
            echo "<script src=\"";
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/jquery/3.4.1/jquery.min.js\"></script>
<script src=\"";
            // line 49
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/velocity/1.0.1/velocity.min.js\"></script>
<script src=\"";
            // line 50
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/velocity/1.0.1/velocity.ui.min.js\"></script>
";
            // line 51
            if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "layout") == "slideshow")) {
                echo "<script src=\"";
                echo (isset($context["local_public"]) ? $context["local_public"] : null);
                echo "/vendor/fotorama/4.6.4/fotorama.js\"></script>";
            }
            // line 52
            echo "<script src=\"";
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/stringjs/3.3.3/string.min.js\"></script>
";
        }
        // line 54
        echo "
";
        // line 56
        echo "<script src=\"";
        echo (isset($context["core_js"]) ? $context["core_js"] : null);
        echo "\"";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            echo " onerror=\"jsFail()\"";
        }
        echo " onload=\"imagevue";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            echo "_";
        }
        echo "();\"></script>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "partials/footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1011 => 363,  1006 => 362,  1004 => 361,  999 => 358,  996 => 356,  974 => 351,  971 => 350,  965 => 348,  959 => 346,  956 => 345,  953 => 344,  950 => 342,  944 => 339,  937 => 336,  934 => 335,  929 => 332,  922 => 329,  916 => 327,  913 => 326,  910 => 324,  904 => 323,  898 => 321,  892 => 319,  886 => 317,  880 => 315,  874 => 313,  871 => 312,  866 => 311,  863 => 310,  857 => 306,  847 => 303,  841 => 302,  835 => 300,  829 => 298,  823 => 296,  817 => 294,  814 => 293,  809 => 292,  804 => 291,  792 => 287,  789 => 286,  786 => 285,  783 => 284,  774 => 280,  768 => 277,  765 => 276,  729 => 273,  720 => 268,  717 => 267,  712 => 266,  706 => 264,  703 => 262,  700 => 261,  697 => 259,  694 => 258,  691 => 257,  688 => 256,  685 => 254,  682 => 253,  679 => 252,  676 => 251,  673 => 250,  668 => 247,  665 => 246,  662 => 245,  659 => 243,  656 => 242,  648 => 238,  642 => 236,  639 => 235,  636 => 233,  633 => 232,  630 => 231,  624 => 230,  608 => 227,  600 => 226,  574 => 217,  564 => 214,  561 => 213,  558 => 211,  555 => 210,  546 => 209,  543 => 208,  540 => 207,  534 => 206,  529 => 205,  524 => 204,  511 => 202,  508 => 201,  505 => 200,  502 => 199,  499 => 197,  496 => 196,  493 => 194,  490 => 193,  487 => 192,  484 => 191,  481 => 190,  478 => 189,  475 => 188,  472 => 187,  469 => 186,  466 => 185,  463 => 183,  460 => 182,  457 => 181,  452 => 180,  449 => 179,  446 => 178,  443 => 177,  440 => 176,  437 => 175,  434 => 174,  431 => 172,  428 => 171,  423 => 170,  420 => 169,  417 => 167,  414 => 166,  411 => 165,  368 => 148,  350 => 144,  342 => 138,  336 => 135,  330 => 133,  310 => 125,  289 => 116,  286 => 115,  283 => 113,  280 => 112,  277 => 111,  274 => 109,  271 => 108,  268 => 107,  265 => 105,  262 => 104,  259 => 103,  256 => 102,  244 => 97,  241 => 96,  238 => 94,  235 => 93,  232 => 92,  229 => 91,  162 => 66,  159 => 65,  151 => 62,  139 => 58,  121 => 51,  118 => 50,  1002 => 316,  988 => 315,  983 => 313,  980 => 353,  976 => 310,  973 => 309,  967 => 304,  961 => 302,  958 => 301,  955 => 299,  949 => 298,  946 => 297,  941 => 338,  936 => 295,  931 => 294,  926 => 331,  921 => 292,  914 => 291,  909 => 290,  906 => 289,  900 => 285,  894 => 284,  891 => 283,  885 => 282,  882 => 281,  877 => 280,  872 => 279,  867 => 278,  862 => 277,  855 => 276,  851 => 305,  842 => 274,  839 => 272,  836 => 271,  833 => 270,  830 => 269,  827 => 268,  824 => 267,  821 => 265,  818 => 264,  813 => 261,  798 => 260,  795 => 289,  790 => 255,  787 => 254,  780 => 283,  777 => 282,  771 => 279,  766 => 250,  761 => 249,  753 => 248,  745 => 247,  739 => 246,  731 => 245,  726 => 271,  723 => 270,  721 => 242,  709 => 265,  705 => 238,  701 => 236,  698 => 235,  695 => 234,  689 => 232,  686 => 231,  683 => 230,  680 => 229,  672 => 227,  669 => 226,  666 => 225,  663 => 224,  655 => 222,  652 => 240,  649 => 220,  643 => 218,  640 => 217,  632 => 215,  629 => 214,  619 => 229,  616 => 211,  613 => 228,  610 => 208,  607 => 207,  604 => 206,  601 => 205,  598 => 204,  595 => 225,  592 => 224,  589 => 222,  586 => 221,  583 => 197,  578 => 196,  575 => 194,  570 => 216,  567 => 215,  531 => 190,  528 => 188,  525 => 187,  522 => 186,  519 => 185,  516 => 203,  513 => 183,  510 => 182,  506 => 180,  503 => 179,  500 => 178,  497 => 177,  494 => 175,  491 => 174,  488 => 173,  485 => 172,  482 => 171,  479 => 170,  476 => 169,  473 => 168,  470 => 167,  467 => 166,  464 => 165,  461 => 164,  459 => 163,  456 => 162,  453 => 161,  451 => 160,  448 => 159,  445 => 158,  442 => 156,  439 => 155,  436 => 154,  433 => 153,  430 => 151,  427 => 150,  424 => 149,  421 => 148,  418 => 147,  415 => 146,  412 => 145,  409 => 162,  406 => 161,  403 => 160,  400 => 159,  397 => 158,  394 => 157,  391 => 156,  388 => 155,  385 => 154,  382 => 153,  379 => 152,  367 => 125,  364 => 124,  361 => 147,  358 => 146,  355 => 120,  337 => 116,  325 => 131,  317 => 112,  309 => 111,  298 => 120,  290 => 108,  285 => 107,  276 => 104,  264 => 99,  261 => 98,  252 => 94,  240 => 90,  237 => 88,  234 => 87,  231 => 86,  228 => 85,  223 => 88,  220 => 87,  217 => 85,  214 => 84,  141 => 57,  138 => 56,  135 => 55,  132 => 53,  123 => 50,  112 => 47,  97 => 40,  82 => 34,  72 => 32,  384 => 151,  378 => 149,  376 => 150,  373 => 149,  370 => 126,  363 => 139,  352 => 145,  346 => 133,  340 => 117,  334 => 128,  331 => 115,  328 => 125,  322 => 130,  306 => 118,  303 => 117,  300 => 116,  297 => 114,  287 => 112,  284 => 111,  281 => 110,  269 => 105,  266 => 103,  254 => 98,  249 => 93,  246 => 92,  239 => 91,  226 => 90,  193 => 72,  190 => 71,  187 => 70,  184 => 69,  181 => 68,  178 => 70,  169 => 70,  160 => 62,  148 => 61,  145 => 60,  142 => 59,  136 => 57,  133 => 56,  111 => 49,  83 => 34,  174 => 73,  157 => 64,  154 => 63,  152 => 59,  114 => 47,  86 => 35,  60 => 22,  48 => 16,  65 => 24,  51 => 19,  42 => 14,  130 => 55,  127 => 54,  124 => 52,  120 => 49,  117 => 48,  115 => 50,  106 => 48,  103 => 44,  100 => 42,  93 => 37,  79 => 35,  76 => 33,  58 => 22,  45 => 15,  38 => 11,  90 => 40,  69 => 27,  61 => 23,  56 => 20,  44 => 15,  36 => 11,  27 => 8,  362 => 133,  359 => 137,  348 => 141,  345 => 140,  343 => 118,  339 => 137,  335 => 121,  333 => 134,  327 => 132,  324 => 114,  319 => 128,  316 => 127,  313 => 126,  307 => 124,  304 => 122,  301 => 121,  295 => 119,  292 => 117,  288 => 99,  282 => 106,  279 => 105,  273 => 102,  258 => 97,  255 => 95,  247 => 99,  243 => 91,  218 => 64,  215 => 63,  212 => 61,  189 => 54,  175 => 65,  172 => 64,  166 => 68,  163 => 64,  156 => 45,  150 => 62,  146 => 43,  140 => 41,  129 => 52,  126 => 51,  109 => 46,  63 => 21,  53 => 20,  47 => 18,  32 => 9,  22 => 3,  108 => 47,  105 => 45,  101 => 41,  98 => 45,  95 => 39,  92 => 41,  88 => 36,  85 => 35,  81 => 36,  78 => 32,  74 => 29,  71 => 29,  67 => 24,  55 => 17,  52 => 19,  49 => 18,  40 => 16,  34 => 10,  31 => 9,  29 => 8,  26 => 6,  24 => 4,  21 => 2,  278 => 108,  275 => 104,  272 => 106,  270 => 101,  267 => 100,  263 => 98,  260 => 101,  257 => 100,  253 => 101,  250 => 100,  236 => 90,  233 => 89,  230 => 69,  227 => 68,  224 => 66,  222 => 85,  219 => 83,  216 => 82,  211 => 83,  208 => 82,  205 => 81,  202 => 80,  199 => 79,  196 => 77,  194 => 76,  191 => 74,  188 => 72,  182 => 53,  179 => 68,  176 => 66,  173 => 65,  170 => 66,  167 => 64,  164 => 63,  161 => 60,  158 => 59,  155 => 63,  137 => 54,  134 => 56,  131 => 54,  128 => 52,  125 => 52,  122 => 50,  119 => 51,  116 => 34,  113 => 45,  110 => 48,  107 => 44,  102 => 46,  99 => 43,  96 => 42,  94 => 38,  91 => 37,  89 => 36,  87 => 38,  84 => 36,  80 => 33,  77 => 31,  73 => 29,  70 => 31,  68 => 27,  66 => 28,  64 => 25,  62 => 23,  59 => 24,  57 => 20,  54 => 19,  50 => 17,  46 => 16,  43 => 17,  41 => 13,  39 => 12,  37 => 10,  35 => 10,  33 => 12,  30 => 8,  28 => 7,  25 => 5,  23 => 3,  19 => 1,);
    }
}
