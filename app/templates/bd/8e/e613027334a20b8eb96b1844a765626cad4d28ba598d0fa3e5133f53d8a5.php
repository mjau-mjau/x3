<?php

/* partials/nav/header.html */
class __TwigTemplate_bd8ee613027334a20b8eb96b1844a765626cad4d28ba598d0fa3e5133f53d8a5 extends Twig_Template
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
        echo "
<header class=\"header\">

\t\t";
        // line 5
        echo "\t\t";
        $context["logo_title"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style", array(), "any", false, true), "logo", array(), "any", false, true), "title", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style", array(), "any", false, true), "logo", array(), "any", false, true), "title"), "Logo Here"))) : ("Logo Here"));
        // line 6
        echo "
\t\t";
        // line 8
        echo "\t\t";
        ob_start();
        // line 9
        echo "\t\t\t";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "logo"), "use_image")) {
            // line 10
            echo "\t\t\t\t<img src=\"";
            echo ((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFunction('firstImage')->getCallable(), array("./content/custom/logo")));
            echo "\" alt=\"";
            echo (isset($context["logo_title"]) ? $context["logo_title"] : null);
            echo "\" />
\t\t\t";
        } else {
            // line 12
            echo "\t\t\t\t";
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, (isset($context["logo_title"]) ? $context["logo_title"] : null)));
            echo "
\t  \t";
        }
        // line 14
        echo "  \t";
        $context["logo_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 15
        echo "
  \t";
        // line 17
        echo "  \t";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "logo"), "use_image")) {
            $context["logo_classes"] = " logo-image";
        }
        // line 18
        echo "
\t\t";
        // line 20
        echo "\t\t<div class=\"nav-wrapper\">
\t\t\t<nav class=\"nav\">
\t\t\t\t<div class=\"logo-wrapper\">
\t\t\t\t";
        // line 23
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "logo"), "enabled")) {
            // line 24
            echo "\t\t\t\t\t";
            $context["logo_link"] = ((call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "logo"), "link")))) ? (((isset($context["rootpath"]) ? $context["rootpath"] : null) . "/")) : ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "logo"), "link")));
            // line 25
            echo "\t\t\t\t\t<a href=\"";
            echo (isset($context["logo_link"]) ? $context["logo_link"] : null);
            echo "\" class=\"logo ";
            echo (isset($context["logo_classes"]) ? $context["logo_classes"] : null);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, (isset($context["logo_content"]) ? $context["logo_content"] : null)));
            echo "</a>
\t\t\t\t";
        }
        // line 27
        echo "\t\t\t\t</div>
\t\t\t\t<ul class=\"menu slim\">
\t\t\t\t\t";
        // line 29
        if ((!$this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "menu_disabled"))) {
            // line 30
            echo "\t\t\t\t\t\t";
            echo call_user_func_array($this->env->getFunction('getMenu')->getCallable(), array());
            echo "
\t\t\t\t\t";
        }
        // line 32
        echo "\t\t\t\t</ul>
\t\t\t</nav>
\t\t</div>

</header>";
    }

    public function getTemplateName()
    {
        return "partials/nav/header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 30,  69 => 23,  61 => 18,  56 => 17,  44 => 12,  36 => 10,  27 => 6,  383 => 145,  380 => 144,  369 => 138,  366 => 136,  364 => 135,  360 => 134,  356 => 133,  354 => 132,  348 => 128,  345 => 126,  340 => 125,  337 => 124,  334 => 122,  328 => 120,  325 => 119,  322 => 117,  316 => 115,  313 => 114,  310 => 112,  304 => 110,  301 => 109,  297 => 106,  291 => 103,  288 => 101,  283 => 99,  280 => 98,  278 => 97,  275 => 96,  272 => 94,  270 => 91,  258 => 88,  255 => 86,  247 => 81,  243 => 80,  230 => 69,  227 => 68,  224 => 66,  218 => 64,  215 => 63,  212 => 61,  205 => 59,  202 => 58,  199 => 57,  196 => 55,  182 => 53,  175 => 52,  172 => 51,  166 => 48,  163 => 46,  156 => 45,  150 => 44,  129 => 39,  126 => 37,  109 => 33,  63 => 21,  53 => 15,  47 => 16,  32 => 8,  22 => 2,  101 => 41,  98 => 40,  95 => 39,  92 => 29,  88 => 29,  85 => 27,  81 => 31,  78 => 30,  74 => 25,  71 => 24,  67 => 23,  55 => 17,  52 => 16,  49 => 15,  40 => 11,  34 => 9,  31 => 8,  29 => 7,  26 => 4,  24 => 5,  21 => 2,  189 => 54,  186 => 80,  183 => 79,  181 => 78,  178 => 76,  174 => 74,  171 => 73,  168 => 72,  164 => 69,  160 => 66,  157 => 65,  154 => 64,  151 => 63,  148 => 62,  146 => 43,  143 => 60,  140 => 41,  134 => 40,  131 => 55,  128 => 53,  125 => 52,  122 => 50,  119 => 36,  116 => 34,  111 => 47,  108 => 45,  105 => 43,  102 => 32,  99 => 30,  96 => 32,  94 => 39,  91 => 37,  89 => 36,  87 => 35,  84 => 27,  80 => 24,  77 => 23,  73 => 28,  70 => 22,  68 => 26,  66 => 25,  64 => 20,  62 => 21,  59 => 19,  57 => 20,  54 => 18,  50 => 14,  46 => 13,  43 => 12,  41 => 13,  39 => 12,  37 => 10,  35 => 10,  33 => 9,  30 => 8,  28 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
