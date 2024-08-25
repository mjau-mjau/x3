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
        return array (  90 => 27,  49 => 18,  42 => 14,  1076 => 374,  1071 => 373,  1069 => 372,  1064 => 369,  1061 => 367,  1045 => 364,  1039 => 362,  1036 => 361,  1030 => 359,  1024 => 357,  1021 => 356,  1018 => 355,  1015 => 353,  1009 => 350,  1006 => 349,  1002 => 347,  999 => 346,  994 => 343,  991 => 342,  987 => 340,  981 => 338,  978 => 337,  975 => 335,  969 => 334,  963 => 332,  957 => 330,  951 => 328,  945 => 326,  939 => 324,  933 => 322,  927 => 320,  921 => 318,  918 => 317,  913 => 316,  910 => 315,  904 => 311,  898 => 310,  894 => 308,  888 => 307,  882 => 305,  876 => 303,  870 => 301,  864 => 299,  858 => 297,  852 => 295,  846 => 293,  843 => 292,  838 => 291,  833 => 290,  824 => 288,  821 => 286,  818 => 285,  815 => 284,  812 => 283,  809 => 282,  806 => 281,  803 => 279,  800 => 278,  797 => 276,  794 => 275,  755 => 272,  752 => 270,  749 => 269,  746 => 267,  743 => 266,  738 => 265,  735 => 264,  732 => 263,  729 => 261,  726 => 260,  723 => 258,  720 => 257,  717 => 256,  714 => 255,  711 => 253,  708 => 252,  705 => 251,  702 => 250,  699 => 249,  694 => 246,  691 => 245,  688 => 244,  685 => 242,  682 => 241,  678 => 239,  674 => 237,  668 => 235,  665 => 234,  662 => 232,  659 => 231,  656 => 230,  650 => 229,  647 => 228,  641 => 227,  635 => 226,  629 => 225,  623 => 224,  618 => 223,  610 => 222,  605 => 221,  602 => 220,  599 => 218,  596 => 217,  583 => 213,  579 => 212,  576 => 211,  573 => 210,  570 => 209,  567 => 207,  564 => 206,  555 => 205,  552 => 204,  549 => 203,  543 => 202,  538 => 201,  532 => 200,  526 => 199,  521 => 198,  513 => 197,  508 => 196,  505 => 195,  502 => 194,  499 => 193,  496 => 191,  493 => 190,  490 => 188,  487 => 187,  484 => 185,  481 => 184,  478 => 183,  475 => 182,  472 => 181,  469 => 180,  466 => 179,  463 => 178,  460 => 177,  457 => 176,  454 => 174,  451 => 173,  448 => 172,  443 => 171,  440 => 170,  437 => 169,  434 => 168,  431 => 167,  428 => 166,  425 => 165,  422 => 163,  419 => 162,  414 => 161,  411 => 160,  408 => 159,  405 => 157,  399 => 155,  393 => 153,  390 => 152,  387 => 151,  375 => 147,  372 => 146,  369 => 145,  366 => 143,  363 => 142,  358 => 141,  333 => 134,  321 => 129,  319 => 128,  316 => 127,  313 => 125,  310 => 124,  307 => 123,  304 => 122,  301 => 121,  298 => 119,  295 => 118,  292 => 117,  289 => 116,  286 => 114,  283 => 113,  280 => 112,  277 => 110,  274 => 109,  271 => 108,  268 => 106,  265 => 105,  262 => 104,  259 => 102,  256 => 101,  244 => 97,  241 => 96,  238 => 94,  235 => 93,  232 => 91,  229 => 90,  223 => 88,  220 => 87,  217 => 85,  214 => 84,  211 => 82,  208 => 81,  205 => 80,  202 => 79,  199 => 78,  196 => 77,  193 => 76,  190 => 74,  168 => 70,  163 => 67,  160 => 65,  156 => 63,  153 => 62,  150 => 61,  147 => 59,  144 => 58,  141 => 57,  138 => 56,  135 => 55,  132 => 54,  129 => 53,  126 => 52,  123 => 51,  102 => 42,  87 => 34,  78 => 31,  76 => 25,  72 => 28,  65 => 24,  62 => 23,  55 => 19,  41 => 12,  34 => 8,  28 => 6,  402 => 156,  396 => 154,  394 => 158,  391 => 157,  388 => 155,  384 => 150,  381 => 149,  378 => 148,  371 => 145,  367 => 143,  360 => 141,  354 => 139,  351 => 140,  348 => 139,  342 => 138,  339 => 137,  336 => 135,  330 => 132,  327 => 131,  324 => 130,  314 => 124,  312 => 123,  309 => 122,  306 => 121,  303 => 119,  293 => 117,  291 => 116,  288 => 115,  285 => 114,  282 => 112,  276 => 110,  273 => 109,  270 => 107,  264 => 105,  261 => 104,  258 => 102,  253 => 100,  250 => 99,  247 => 98,  243 => 95,  240 => 94,  230 => 90,  226 => 89,  215 => 87,  212 => 86,  209 => 84,  206 => 83,  203 => 82,  200 => 81,  197 => 80,  194 => 79,  191 => 78,  188 => 73,  185 => 71,  182 => 74,  179 => 72,  176 => 71,  173 => 70,  161 => 65,  158 => 63,  149 => 60,  146 => 58,  140 => 56,  137 => 55,  134 => 53,  124 => 51,  122 => 50,  119 => 49,  116 => 48,  113 => 46,  103 => 44,  92 => 39,  83 => 36,  80 => 34,  59 => 24,  54 => 20,  47 => 14,  36 => 12,  27 => 6,  25 => 5,  174 => 69,  170 => 69,  167 => 68,  164 => 66,  157 => 62,  154 => 60,  152 => 61,  120 => 49,  117 => 48,  114 => 47,  110 => 48,  99 => 41,  96 => 31,  94 => 38,  86 => 37,  84 => 33,  81 => 32,  77 => 32,  73 => 24,  68 => 22,  60 => 22,  56 => 20,  52 => 17,  46 => 16,  43 => 14,  39 => 11,  31 => 9,  29 => 8,  24 => 3,  22 => 3,  142 => 54,  139 => 52,  128 => 50,  125 => 49,  121 => 48,  118 => 47,  115 => 45,  111 => 45,  108 => 44,  105 => 43,  101 => 43,  98 => 42,  95 => 41,  91 => 36,  88 => 35,  85 => 33,  74 => 29,  71 => 23,  69 => 26,  66 => 27,  64 => 28,  61 => 26,  57 => 20,  53 => 20,  51 => 19,  48 => 17,  44 => 13,  35 => 10,  33 => 10,  30 => 7,  26 => 6,  23 => 4,  50 => 17,  45 => 16,  40 => 13,  38 => 13,  21 => 2,  19 => 1,);
    }
}
