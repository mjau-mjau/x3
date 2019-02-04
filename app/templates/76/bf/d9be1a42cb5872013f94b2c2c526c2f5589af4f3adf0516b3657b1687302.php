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
            echo "<script src=\"https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/velocity-animate@1.0.1/velocity.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/velocity-animate@1.0.1/velocity.ui.min.js\"></script>
";
            // line 44
            if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "layout") == "slideshow")) {
                echo "<script src=\"https://cdn.jsdelivr.net/npm/fotorama@4.6.4/fotorama.js\"></script>";
            }
            // line 45
            echo "<script src=\"https://cdn.jsdelivr.net/npm/string@3.3.3/dist/string.min.js\"></script>
";
        } else {
            // line 47
            echo "<script src=\"";
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/jquery/3.3.1/jquery.min.js\"></script>
<script src=\"";
            // line 48
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/velocity/1.0.1/velocity.min.js\"></script>
<script src=\"";
            // line 49
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/velocity/1.0.1/velocity.ui.min.js\"></script>
";
            // line 50
            if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "layout") == "slideshow")) {
                echo "<script src=\"";
                echo (isset($context["local_public"]) ? $context["local_public"] : null);
                echo "/vendor/fotorama/4.6.4/fotorama.js\"></script>";
            }
            // line 51
            echo "<script src=\"";
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/stringjs/3.3.3/string.min.js\"></script>
";
        }
        // line 53
        echo "
";
        // line 55
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
        return array (  72 => 32,  1013 => 364,  1008 => 363,  1006 => 362,  1001 => 359,  998 => 357,  982 => 354,  952 => 343,  943 => 339,  939 => 337,  928 => 332,  924 => 330,  918 => 328,  915 => 327,  912 => 325,  888 => 318,  876 => 314,  873 => 313,  868 => 312,  865 => 311,  859 => 307,  853 => 306,  849 => 304,  843 => 303,  837 => 301,  831 => 299,  825 => 297,  819 => 295,  816 => 294,  811 => 293,  806 => 292,  797 => 290,  794 => 288,  791 => 287,  788 => 286,  785 => 285,  782 => 284,  779 => 283,  776 => 281,  773 => 280,  770 => 278,  767 => 277,  728 => 272,  725 => 271,  722 => 269,  719 => 268,  714 => 267,  711 => 266,  708 => 265,  702 => 262,  699 => 260,  696 => 259,  693 => 258,  690 => 257,  687 => 255,  684 => 254,  681 => 253,  679 => 252,  676 => 251,  673 => 250,  668 => 247,  665 => 246,  662 => 245,  659 => 243,  656 => 242,  648 => 238,  642 => 236,  639 => 235,  636 => 233,  633 => 232,  630 => 231,  624 => 230,  608 => 227,  600 => 226,  574 => 217,  564 => 214,  561 => 213,  558 => 211,  555 => 210,  546 => 209,  543 => 208,  540 => 207,  534 => 206,  529 => 205,  524 => 204,  511 => 202,  508 => 201,  505 => 200,  502 => 199,  499 => 197,  496 => 196,  493 => 194,  490 => 193,  487 => 192,  484 => 191,  481 => 190,  478 => 189,  475 => 188,  472 => 187,  469 => 186,  466 => 185,  463 => 183,  460 => 182,  457 => 181,  452 => 180,  449 => 179,  446 => 178,  443 => 177,  440 => 176,  437 => 175,  434 => 174,  431 => 172,  428 => 171,  423 => 170,  420 => 169,  417 => 167,  414 => 166,  411 => 165,  368 => 148,  350 => 144,  348 => 141,  345 => 140,  342 => 138,  336 => 135,  333 => 134,  330 => 133,  327 => 132,  313 => 126,  310 => 125,  307 => 124,  301 => 121,  295 => 119,  292 => 117,  289 => 116,  286 => 115,  283 => 113,  280 => 112,  277 => 111,  274 => 109,  271 => 108,  268 => 107,  265 => 105,  262 => 104,  259 => 103,  256 => 102,  247 => 99,  244 => 97,  241 => 96,  238 => 94,  235 => 93,  232 => 92,  229 => 91,  151 => 62,  139 => 58,  1002 => 315,  988 => 314,  983 => 312,  980 => 311,  976 => 352,  973 => 351,  967 => 349,  961 => 347,  958 => 346,  955 => 345,  949 => 297,  946 => 340,  941 => 295,  936 => 336,  931 => 333,  926 => 292,  921 => 291,  914 => 290,  909 => 289,  906 => 324,  900 => 322,  894 => 320,  891 => 282,  885 => 281,  882 => 316,  877 => 279,  872 => 278,  867 => 277,  862 => 276,  855 => 275,  851 => 274,  842 => 273,  839 => 271,  836 => 270,  833 => 269,  830 => 268,  827 => 267,  824 => 266,  821 => 264,  818 => 263,  813 => 260,  798 => 259,  795 => 257,  790 => 254,  787 => 253,  780 => 252,  777 => 251,  771 => 250,  766 => 249,  761 => 248,  753 => 247,  745 => 246,  739 => 245,  731 => 274,  726 => 243,  723 => 242,  721 => 241,  709 => 238,  705 => 263,  701 => 235,  698 => 234,  695 => 233,  689 => 231,  686 => 230,  683 => 229,  680 => 228,  672 => 226,  669 => 225,  666 => 224,  663 => 223,  655 => 221,  652 => 240,  649 => 219,  643 => 217,  640 => 216,  632 => 214,  629 => 213,  619 => 229,  616 => 210,  613 => 228,  610 => 207,  607 => 206,  604 => 205,  601 => 204,  598 => 203,  595 => 225,  592 => 224,  589 => 222,  586 => 221,  583 => 196,  578 => 195,  575 => 193,  570 => 216,  567 => 215,  531 => 189,  528 => 187,  525 => 186,  522 => 185,  519 => 184,  516 => 203,  513 => 182,  510 => 181,  506 => 179,  503 => 178,  500 => 177,  497 => 176,  494 => 174,  491 => 173,  488 => 172,  485 => 171,  482 => 170,  479 => 169,  476 => 168,  473 => 167,  470 => 166,  467 => 165,  464 => 164,  461 => 163,  459 => 162,  456 => 161,  453 => 160,  451 => 159,  448 => 158,  445 => 157,  442 => 155,  439 => 154,  436 => 153,  433 => 152,  430 => 150,  427 => 149,  424 => 148,  421 => 147,  418 => 146,  415 => 145,  412 => 144,  409 => 162,  406 => 161,  403 => 160,  400 => 159,  397 => 158,  394 => 157,  391 => 156,  388 => 155,  385 => 154,  382 => 153,  379 => 152,  367 => 124,  364 => 123,  361 => 147,  358 => 146,  355 => 119,  337 => 115,  325 => 131,  317 => 111,  304 => 122,  298 => 120,  290 => 107,  285 => 106,  282 => 105,  279 => 104,  276 => 103,  273 => 101,  264 => 98,  261 => 97,  258 => 96,  255 => 94,  252 => 93,  240 => 89,  237 => 87,  234 => 86,  231 => 85,  228 => 84,  217 => 85,  150 => 61,  143 => 57,  140 => 55,  121 => 51,  118 => 50,  109 => 46,  97 => 44,  82 => 34,  384 => 151,  378 => 149,  376 => 150,  373 => 149,  370 => 125,  363 => 139,  359 => 137,  352 => 145,  346 => 133,  343 => 117,  340 => 116,  334 => 128,  328 => 125,  322 => 130,  319 => 128,  316 => 127,  306 => 118,  287 => 112,  281 => 110,  249 => 92,  246 => 91,  193 => 71,  190 => 70,  187 => 69,  184 => 68,  181 => 67,  175 => 64,  172 => 63,  169 => 70,  166 => 68,  163 => 64,  160 => 62,  148 => 61,  145 => 60,  133 => 55,  111 => 43,  83 => 34,  174 => 73,  157 => 64,  154 => 63,  114 => 49,  86 => 35,  60 => 23,  48 => 16,  51 => 19,  42 => 13,  127 => 54,  124 => 51,  120 => 47,  117 => 46,  106 => 45,  103 => 44,  100 => 42,  93 => 37,  79 => 35,  76 => 33,  58 => 22,  45 => 15,  38 => 11,  90 => 40,  61 => 23,  56 => 20,  44 => 14,  36 => 11,  27 => 8,  357 => 134,  354 => 133,  344 => 127,  341 => 126,  339 => 137,  335 => 124,  331 => 114,  329 => 122,  323 => 118,  320 => 116,  315 => 115,  312 => 114,  309 => 110,  303 => 117,  300 => 116,  297 => 114,  291 => 105,  288 => 104,  284 => 111,  269 => 105,  266 => 103,  254 => 98,  251 => 88,  243 => 90,  239 => 91,  226 => 90,  223 => 88,  220 => 87,  214 => 84,  201 => 61,  198 => 60,  195 => 59,  192 => 57,  185 => 56,  178 => 70,  171 => 54,  168 => 53,  162 => 66,  159 => 65,  152 => 59,  146 => 46,  142 => 59,  136 => 57,  130 => 53,  115 => 48,  112 => 47,  69 => 27,  65 => 23,  53 => 20,  47 => 18,  32 => 9,  22 => 3,  108 => 47,  105 => 47,  101 => 45,  98 => 41,  95 => 39,  92 => 41,  88 => 36,  85 => 35,  81 => 36,  78 => 32,  74 => 28,  71 => 26,  67 => 24,  55 => 18,  52 => 17,  49 => 16,  40 => 16,  34 => 10,  31 => 8,  29 => 7,  26 => 6,  24 => 4,  21 => 2,  278 => 108,  275 => 96,  272 => 106,  270 => 100,  267 => 99,  263 => 98,  260 => 101,  257 => 100,  253 => 101,  250 => 100,  236 => 90,  233 => 89,  230 => 87,  227 => 86,  224 => 85,  222 => 85,  219 => 83,  216 => 82,  211 => 83,  208 => 82,  205 => 81,  202 => 80,  199 => 79,  196 => 77,  194 => 76,  191 => 74,  188 => 72,  182 => 69,  179 => 68,  176 => 66,  173 => 65,  170 => 66,  167 => 64,  164 => 63,  161 => 60,  158 => 59,  155 => 62,  137 => 54,  134 => 53,  131 => 53,  128 => 52,  125 => 41,  122 => 39,  119 => 49,  116 => 48,  113 => 45,  110 => 48,  107 => 44,  102 => 43,  99 => 43,  96 => 42,  94 => 37,  91 => 37,  89 => 36,  87 => 38,  84 => 36,  80 => 33,  77 => 32,  73 => 29,  70 => 31,  68 => 27,  66 => 28,  64 => 25,  62 => 22,  59 => 24,  57 => 20,  54 => 19,  50 => 17,  46 => 15,  43 => 17,  41 => 13,  39 => 12,  37 => 10,  35 => 10,  33 => 12,  30 => 8,  28 => 7,  25 => 5,  23 => 3,  19 => 1,);
    }
}
