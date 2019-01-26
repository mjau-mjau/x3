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
        return array (  72 => 32,  989 => 353,  984 => 352,  982 => 351,  977 => 348,  974 => 346,  952 => 341,  949 => 340,  943 => 338,  937 => 336,  934 => 335,  931 => 334,  928 => 332,  922 => 329,  915 => 326,  912 => 325,  907 => 322,  900 => 319,  894 => 317,  891 => 316,  888 => 314,  882 => 313,  876 => 311,  870 => 309,  864 => 307,  858 => 305,  852 => 303,  849 => 302,  844 => 301,  841 => 300,  835 => 296,  825 => 293,  819 => 292,  813 => 290,  807 => 288,  801 => 286,  795 => 284,  792 => 283,  787 => 282,  782 => 281,  770 => 277,  767 => 276,  764 => 275,  761 => 274,  752 => 270,  746 => 267,  743 => 266,  707 => 263,  698 => 258,  695 => 257,  690 => 256,  684 => 254,  681 => 252,  678 => 251,  675 => 249,  672 => 248,  669 => 247,  666 => 246,  663 => 244,  660 => 243,  657 => 242,  655 => 241,  652 => 240,  649 => 239,  638 => 234,  635 => 232,  632 => 231,  628 => 229,  624 => 227,  615 => 224,  612 => 222,  609 => 221,  606 => 220,  600 => 219,  595 => 218,  589 => 217,  584 => 216,  571 => 214,  568 => 213,  565 => 211,  562 => 210,  550 => 206,  546 => 205,  543 => 204,  540 => 203,  537 => 202,  534 => 200,  531 => 199,  522 => 198,  519 => 197,  516 => 196,  510 => 195,  505 => 194,  492 => 192,  487 => 191,  436 => 171,  433 => 170,  428 => 169,  425 => 168,  422 => 167,  419 => 166,  416 => 165,  413 => 164,  410 => 163,  407 => 161,  404 => 160,  385 => 151,  382 => 150,  379 => 149,  367 => 145,  364 => 144,  361 => 143,  358 => 142,  355 => 141,  349 => 138,  337 => 136,  326 => 133,  324 => 130,  301 => 120,  298 => 119,  292 => 116,  289 => 115,  286 => 114,  283 => 113,  280 => 111,  277 => 110,  274 => 109,  271 => 108,  265 => 105,  262 => 104,  259 => 102,  256 => 101,  247 => 97,  244 => 96,  241 => 94,  238 => 93,  235 => 92,  232 => 91,  229 => 90,  217 => 85,  138 => 55,  135 => 54,  132 => 53,  109 => 45,  980 => 304,  966 => 303,  961 => 301,  958 => 343,  954 => 298,  951 => 297,  945 => 292,  939 => 290,  936 => 289,  933 => 287,  927 => 286,  924 => 285,  919 => 328,  914 => 283,  909 => 282,  904 => 321,  899 => 280,  892 => 279,  887 => 278,  884 => 277,  878 => 273,  872 => 272,  869 => 271,  863 => 270,  860 => 269,  855 => 268,  850 => 267,  845 => 266,  840 => 265,  833 => 264,  829 => 295,  820 => 262,  817 => 260,  814 => 259,  811 => 258,  808 => 257,  805 => 256,  802 => 255,  799 => 253,  796 => 252,  791 => 249,  776 => 248,  773 => 279,  768 => 243,  765 => 242,  758 => 273,  755 => 272,  749 => 269,  744 => 238,  739 => 237,  731 => 236,  723 => 235,  717 => 234,  709 => 233,  704 => 261,  701 => 260,  699 => 230,  687 => 255,  683 => 226,  679 => 224,  676 => 223,  673 => 222,  667 => 220,  664 => 219,  661 => 218,  658 => 217,  650 => 215,  647 => 214,  644 => 236,  641 => 235,  633 => 210,  630 => 209,  627 => 208,  621 => 206,  618 => 225,  610 => 203,  607 => 202,  597 => 200,  594 => 199,  591 => 197,  588 => 196,  585 => 195,  582 => 194,  579 => 193,  576 => 215,  573 => 191,  570 => 190,  567 => 188,  564 => 187,  561 => 185,  556 => 184,  553 => 182,  548 => 181,  545 => 179,  509 => 178,  506 => 176,  503 => 175,  500 => 193,  497 => 173,  494 => 172,  491 => 171,  488 => 170,  484 => 190,  481 => 189,  478 => 188,  475 => 186,  472 => 185,  469 => 183,  466 => 182,  463 => 181,  460 => 180,  457 => 179,  454 => 178,  451 => 177,  448 => 176,  445 => 175,  442 => 174,  439 => 172,  437 => 151,  434 => 150,  431 => 149,  429 => 148,  426 => 147,  423 => 146,  420 => 144,  417 => 143,  414 => 142,  411 => 141,  408 => 139,  405 => 138,  402 => 137,  399 => 159,  396 => 158,  393 => 156,  390 => 155,  387 => 154,  381 => 128,  375 => 126,  372 => 125,  369 => 124,  366 => 122,  360 => 119,  351 => 115,  348 => 114,  345 => 113,  342 => 112,  336 => 110,  333 => 108,  330 => 107,  321 => 129,  318 => 127,  295 => 117,  282 => 98,  276 => 97,  268 => 106,  248 => 89,  245 => 88,  242 => 87,  221 => 79,  218 => 78,  215 => 76,  212 => 75,  209 => 74,  206 => 73,  204 => 72,  189 => 67,  186 => 66,  183 => 65,  180 => 64,  177 => 63,  165 => 58,  153 => 53,  150 => 62,  126 => 49,  123 => 47,  121 => 49,  118 => 50,  97 => 44,  82 => 34,  384 => 130,  378 => 127,  376 => 148,  373 => 147,  370 => 146,  363 => 121,  359 => 137,  352 => 139,  346 => 133,  343 => 132,  340 => 130,  334 => 135,  328 => 134,  322 => 123,  319 => 122,  316 => 120,  306 => 122,  287 => 99,  281 => 110,  249 => 97,  246 => 95,  193 => 74,  190 => 73,  187 => 72,  184 => 71,  181 => 70,  175 => 68,  172 => 66,  169 => 66,  166 => 65,  163 => 64,  160 => 62,  148 => 57,  145 => 59,  133 => 55,  111 => 41,  83 => 34,  174 => 62,  157 => 61,  154 => 59,  114 => 49,  86 => 35,  60 => 23,  48 => 16,  51 => 19,  42 => 13,  127 => 51,  124 => 51,  120 => 47,  117 => 46,  106 => 44,  103 => 43,  100 => 42,  93 => 37,  79 => 35,  76 => 33,  58 => 22,  45 => 15,  38 => 11,  90 => 40,  61 => 23,  56 => 20,  44 => 14,  36 => 11,  27 => 8,  357 => 118,  354 => 116,  344 => 137,  341 => 126,  339 => 111,  335 => 124,  331 => 127,  329 => 122,  323 => 118,  320 => 116,  315 => 126,  312 => 124,  309 => 123,  303 => 121,  300 => 116,  297 => 114,  291 => 105,  288 => 104,  284 => 111,  269 => 105,  266 => 103,  254 => 92,  251 => 90,  243 => 94,  239 => 86,  226 => 89,  223 => 88,  220 => 86,  214 => 83,  201 => 71,  198 => 70,  195 => 69,  192 => 68,  185 => 56,  178 => 69,  171 => 60,  168 => 59,  162 => 57,  159 => 56,  152 => 59,  146 => 46,  142 => 57,  136 => 52,  130 => 53,  115 => 47,  112 => 46,  69 => 27,  65 => 23,  53 => 20,  47 => 18,  32 => 9,  22 => 3,  108 => 40,  105 => 47,  101 => 45,  98 => 41,  95 => 39,  92 => 41,  88 => 36,  85 => 35,  81 => 36,  78 => 32,  74 => 28,  71 => 26,  67 => 24,  55 => 18,  52 => 17,  49 => 16,  40 => 16,  34 => 10,  31 => 8,  29 => 7,  26 => 6,  24 => 4,  21 => 2,  278 => 108,  275 => 96,  272 => 106,  270 => 102,  267 => 100,  263 => 95,  260 => 94,  257 => 93,  253 => 100,  250 => 98,  236 => 85,  233 => 83,  230 => 82,  227 => 81,  224 => 80,  222 => 85,  219 => 83,  216 => 82,  211 => 82,  208 => 81,  205 => 80,  202 => 79,  199 => 77,  196 => 76,  194 => 74,  191 => 73,  188 => 72,  182 => 69,  179 => 68,  176 => 66,  173 => 65,  170 => 65,  167 => 63,  164 => 63,  161 => 60,  158 => 59,  155 => 57,  137 => 54,  134 => 53,  131 => 53,  128 => 50,  125 => 41,  122 => 39,  119 => 49,  116 => 48,  113 => 45,  110 => 48,  107 => 44,  102 => 43,  99 => 43,  96 => 42,  94 => 35,  91 => 37,  89 => 36,  87 => 38,  84 => 36,  80 => 33,  77 => 32,  73 => 29,  70 => 31,  68 => 27,  66 => 28,  64 => 25,  62 => 22,  59 => 24,  57 => 20,  54 => 19,  50 => 17,  46 => 15,  43 => 17,  41 => 13,  39 => 12,  37 => 10,  35 => 10,  33 => 12,  30 => 8,  28 => 7,  25 => 5,  23 => 3,  19 => 1,);
    }
}
