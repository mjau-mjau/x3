<?php

/* partials/nav/pagenav.html */
class __TwigTemplate_ebadc15d287fc691126415e9238fb5eb8664a0355b0684ce4be7e6519cda65b7 extends Twig_Template
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
        ob_start();
        // line 2
        echo "
";
        // line 3
        if (((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "pagenav") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slug"))))) && (call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plugins"), "pagenav"), "hide_has_children"))) || ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "children_count") == 0))) && (call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plugins"), "pagenav"), "hide_root"))) || (call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink"), "/")))) > 2)))) {
            // line 6
            echo "
";
            // line 8
            $context["siblings"] = call_user_func_array($this->env->getFunction('get_adjacent_siblings')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path")));
            // line 9
            if (((isset($context["siblings"]) ? $context["siblings"] : null) && ($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "prev") || $this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "next")))) {
                // line 10
                echo "
";
                // line 12
                $context["href_base"] = call_user_func_array($this->env->getFilter('dirname')->getCallable(), array((isset($context["rootpath_page"]) ? $context["rootpath_page"] : null)));
                // line 13
                if ((call_user_func_array($this->env->getFilter('last')->getCallable(), array($this->env, (isset($context["href_base"]) ? $context["href_base"] : null))) != "/")) {
                    $context["href_base"] = ((isset($context["href_base"]) ? $context["href_base"] : null) . "/");
                }
                // line 14
                echo "
";
                // line 16
                echo "<div class=\"pagenav pagenav-static\">

\t";
                // line 18
                if ($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "prev")) {
                    // line 19
                    echo "\t\t";
                    $context["href_prev"] = (((isset($context["href_base"]) ? $context["href_base"] : null) . $this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "prev"), "slug")) . "/");
                    // line 20
                    echo "\t\t<a href=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["href_prev"]) ? $context["href_prev"] : null)));
                    echo "\" class=\"pagenav-link pagenav-prev\"";
                    if ($this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "prev"), "title")) {
                        echo " title=\"";
                        echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "prev"), "title")));
                        echo "\"";
                    }
                    echo "><span class=\"pagenav-text\">";
                    echo $this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "prev"), "label");
                    echo "</span></a>
\t";
                }
                // line 22
                echo "
\t";
                // line 23
                if ($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "next")) {
                    // line 24
                    echo "\t\t";
                    $context["href_next"] = (((isset($context["href_base"]) ? $context["href_base"] : null) . $this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "next"), "slug")) . "/");
                    // line 25
                    echo "\t\t<a href=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["href_next"]) ? $context["href_next"] : null)));
                    echo "\" class=\"pagenav-link pagenav-next\"";
                    if ($this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "next"), "title")) {
                        echo " title=\"";
                        echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "next"), "title")));
                        echo "\"";
                    }
                    echo "><span class=\"pagenav-text\">";
                    echo $this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), "next"), "label");
                    echo "</span></a>
\t";
                }
                // line 27
                echo "
</div>
";
            }
        }
        // line 31
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/nav/pagenav.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 16,  1076 => 374,  1071 => 373,  1069 => 372,  1064 => 369,  1061 => 367,  1045 => 364,  1039 => 362,  1036 => 361,  1030 => 359,  1024 => 357,  1021 => 356,  1018 => 355,  1015 => 353,  1009 => 350,  1006 => 349,  1002 => 347,  999 => 346,  994 => 343,  987 => 340,  978 => 337,  951 => 328,  945 => 326,  933 => 322,  927 => 320,  921 => 318,  918 => 317,  913 => 316,  910 => 315,  904 => 311,  898 => 310,  894 => 308,  888 => 307,  882 => 305,  876 => 303,  864 => 299,  858 => 297,  852 => 295,  846 => 293,  843 => 292,  833 => 290,  824 => 288,  818 => 285,  815 => 284,  812 => 283,  809 => 282,  800 => 278,  797 => 276,  794 => 275,  755 => 272,  752 => 270,  749 => 269,  746 => 267,  743 => 266,  738 => 265,  735 => 264,  726 => 260,  723 => 258,  720 => 257,  717 => 256,  714 => 255,  708 => 252,  705 => 251,  702 => 250,  699 => 249,  694 => 246,  691 => 245,  688 => 244,  685 => 242,  682 => 241,  674 => 237,  668 => 235,  665 => 234,  662 => 232,  656 => 230,  650 => 229,  647 => 228,  641 => 227,  635 => 226,  629 => 225,  623 => 224,  610 => 222,  605 => 221,  602 => 220,  599 => 218,  596 => 217,  583 => 213,  579 => 212,  576 => 211,  573 => 210,  570 => 209,  567 => 207,  564 => 206,  555 => 205,  552 => 204,  549 => 203,  543 => 202,  538 => 201,  532 => 200,  526 => 199,  513 => 197,  460 => 177,  457 => 176,  454 => 174,  451 => 173,  448 => 172,  443 => 171,  440 => 170,  437 => 169,  434 => 168,  431 => 167,  428 => 166,  425 => 165,  422 => 163,  419 => 162,  358 => 141,  321 => 129,  319 => 128,  307 => 123,  295 => 118,  292 => 117,  289 => 116,  286 => 114,  277 => 110,  274 => 109,  271 => 108,  268 => 106,  265 => 105,  262 => 104,  259 => 102,  256 => 101,  244 => 97,  241 => 96,  238 => 94,  235 => 93,  232 => 91,  229 => 90,  153 => 62,  147 => 59,  144 => 58,  76 => 25,  1010 => 322,  996 => 321,  991 => 342,  988 => 318,  984 => 316,  981 => 338,  975 => 335,  969 => 334,  966 => 307,  963 => 332,  957 => 330,  954 => 303,  949 => 302,  944 => 301,  939 => 324,  934 => 299,  929 => 298,  922 => 297,  917 => 296,  914 => 295,  908 => 291,  902 => 290,  899 => 289,  893 => 288,  890 => 287,  885 => 286,  880 => 285,  875 => 284,  870 => 301,  863 => 282,  859 => 281,  850 => 280,  847 => 278,  844 => 277,  841 => 276,  838 => 291,  835 => 274,  832 => 273,  829 => 271,  826 => 270,  821 => 286,  806 => 281,  803 => 279,  798 => 261,  795 => 260,  788 => 259,  785 => 258,  779 => 257,  774 => 256,  769 => 255,  759 => 254,  750 => 252,  745 => 250,  737 => 249,  732 => 263,  729 => 261,  727 => 246,  715 => 243,  711 => 253,  707 => 240,  704 => 239,  701 => 238,  695 => 236,  692 => 235,  689 => 234,  686 => 233,  678 => 239,  676 => 230,  673 => 229,  670 => 228,  667 => 227,  659 => 231,  657 => 224,  654 => 223,  651 => 222,  645 => 220,  642 => 219,  634 => 217,  631 => 216,  621 => 214,  618 => 223,  615 => 211,  612 => 210,  609 => 209,  606 => 208,  603 => 207,  600 => 206,  597 => 205,  594 => 204,  591 => 202,  588 => 201,  585 => 199,  580 => 198,  577 => 196,  572 => 195,  569 => 193,  533 => 192,  530 => 190,  527 => 189,  524 => 188,  521 => 198,  518 => 186,  515 => 185,  512 => 184,  508 => 196,  505 => 195,  502 => 194,  499 => 193,  496 => 191,  493 => 190,  490 => 188,  487 => 187,  484 => 185,  481 => 184,  478 => 183,  475 => 182,  472 => 181,  469 => 180,  466 => 179,  463 => 178,  461 => 165,  458 => 164,  455 => 163,  453 => 162,  450 => 161,  447 => 160,  444 => 158,  441 => 157,  438 => 156,  435 => 155,  432 => 153,  429 => 152,  426 => 151,  423 => 150,  420 => 149,  417 => 148,  414 => 161,  411 => 160,  408 => 159,  405 => 157,  399 => 155,  393 => 153,  390 => 152,  387 => 151,  375 => 147,  372 => 146,  363 => 142,  357 => 122,  333 => 134,  317 => 114,  308 => 112,  298 => 119,  290 => 108,  279 => 105,  267 => 100,  252 => 94,  249 => 93,  246 => 92,  237 => 88,  234 => 87,  231 => 86,  228 => 85,  223 => 88,  220 => 87,  217 => 85,  214 => 84,  211 => 82,  208 => 81,  193 => 76,  190 => 74,  187 => 70,  184 => 69,  155 => 63,  145 => 59,  141 => 57,  138 => 56,  135 => 55,  132 => 54,  123 => 51,  112 => 46,  106 => 44,  100 => 41,  97 => 40,  82 => 34,  79 => 32,  72 => 28,  65 => 24,  42 => 14,  402 => 156,  396 => 154,  394 => 158,  391 => 157,  388 => 155,  384 => 150,  381 => 149,  378 => 148,  371 => 145,  367 => 143,  351 => 140,  342 => 138,  339 => 137,  336 => 135,  330 => 132,  327 => 131,  324 => 130,  314 => 124,  312 => 123,  309 => 122,  306 => 121,  303 => 119,  293 => 117,  285 => 107,  282 => 106,  276 => 104,  273 => 102,  264 => 99,  261 => 98,  253 => 100,  250 => 99,  240 => 90,  226 => 89,  209 => 84,  206 => 83,  203 => 82,  200 => 81,  197 => 80,  194 => 79,  191 => 78,  188 => 73,  185 => 71,  179 => 72,  176 => 71,  173 => 70,  161 => 65,  158 => 63,  149 => 60,  137 => 55,  124 => 51,  113 => 46,  103 => 42,  83 => 36,  170 => 69,  167 => 68,  152 => 61,  120 => 49,  117 => 48,  114 => 47,  110 => 48,  86 => 37,  60 => 22,  142 => 54,  139 => 52,  121 => 48,  118 => 47,  115 => 45,  51 => 19,  48 => 17,  38 => 13,  90 => 27,  69 => 26,  61 => 26,  56 => 20,  44 => 13,  36 => 12,  27 => 7,  383 => 145,  380 => 144,  369 => 145,  366 => 143,  364 => 135,  360 => 124,  356 => 133,  354 => 121,  348 => 139,  345 => 120,  340 => 125,  337 => 124,  334 => 122,  328 => 120,  325 => 119,  322 => 117,  316 => 127,  313 => 125,  310 => 124,  304 => 122,  301 => 121,  297 => 106,  291 => 116,  288 => 115,  283 => 113,  280 => 112,  278 => 97,  275 => 96,  272 => 94,  270 => 101,  258 => 97,  255 => 95,  247 => 98,  243 => 91,  230 => 90,  227 => 68,  224 => 66,  218 => 64,  215 => 87,  212 => 86,  205 => 80,  202 => 79,  199 => 78,  196 => 77,  182 => 74,  175 => 65,  172 => 64,  166 => 48,  163 => 67,  156 => 63,  150 => 61,  129 => 53,  126 => 52,  109 => 45,  63 => 21,  53 => 18,  47 => 14,  32 => 8,  22 => 3,  101 => 43,  98 => 42,  95 => 41,  92 => 39,  88 => 36,  85 => 35,  81 => 32,  78 => 31,  74 => 29,  71 => 23,  67 => 23,  55 => 19,  52 => 17,  49 => 18,  40 => 13,  34 => 8,  31 => 9,  29 => 8,  26 => 6,  24 => 3,  21 => 2,  189 => 54,  186 => 80,  183 => 79,  181 => 68,  178 => 76,  174 => 69,  171 => 73,  168 => 70,  164 => 66,  160 => 65,  157 => 62,  154 => 60,  151 => 63,  148 => 61,  146 => 58,  143 => 60,  140 => 56,  134 => 53,  131 => 55,  128 => 50,  125 => 49,  122 => 50,  119 => 49,  116 => 48,  111 => 45,  108 => 44,  105 => 43,  102 => 42,  99 => 41,  96 => 31,  94 => 38,  91 => 36,  89 => 36,  87 => 34,  84 => 33,  80 => 34,  77 => 31,  73 => 24,  70 => 22,  68 => 22,  66 => 27,  64 => 28,  62 => 23,  59 => 24,  57 => 20,  54 => 20,  50 => 17,  46 => 16,  43 => 14,  41 => 12,  39 => 11,  37 => 10,  35 => 10,  33 => 10,  30 => 7,  28 => 6,  25 => 5,  23 => 4,  19 => 1,);
    }
}
