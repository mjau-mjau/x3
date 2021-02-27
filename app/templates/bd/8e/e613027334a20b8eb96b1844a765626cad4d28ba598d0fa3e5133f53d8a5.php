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
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["logo_title"]) ? $context["logo_title"] : null)));
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
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["logo_content"]) ? $context["logo_content"] : null)));
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
        return array (  90 => 30,  74 => 25,  71 => 24,  69 => 23,  61 => 18,  56 => 17,  44 => 12,  36 => 10,  27 => 6,  379 => 143,  376 => 142,  365 => 136,  362 => 134,  360 => 133,  356 => 132,  352 => 131,  350 => 130,  344 => 126,  341 => 124,  336 => 123,  333 => 122,  330 => 120,  324 => 118,  321 => 117,  318 => 115,  312 => 113,  309 => 112,  306 => 110,  300 => 108,  297 => 107,  293 => 104,  278 => 97,  270 => 91,  258 => 88,  255 => 86,  247 => 81,  243 => 80,  227 => 68,  224 => 66,  212 => 61,  189 => 54,  175 => 52,  172 => 51,  166 => 48,  163 => 46,  156 => 45,  150 => 44,  146 => 43,  140 => 41,  129 => 39,  126 => 37,  109 => 33,  92 => 29,  88 => 29,  85 => 27,  63 => 21,  53 => 15,  47 => 16,  32 => 8,  26 => 4,  24 => 5,  22 => 2,  290 => 112,  287 => 101,  284 => 99,  282 => 108,  279 => 106,  275 => 96,  272 => 94,  269 => 102,  265 => 99,  262 => 97,  248 => 96,  245 => 95,  242 => 93,  239 => 92,  236 => 91,  233 => 90,  230 => 69,  223 => 87,  221 => 86,  218 => 64,  215 => 63,  213 => 82,  211 => 81,  208 => 79,  205 => 59,  202 => 58,  199 => 57,  196 => 55,  194 => 74,  191 => 73,  188 => 72,  182 => 53,  179 => 68,  176 => 66,  173 => 65,  170 => 63,  167 => 62,  164 => 61,  161 => 60,  158 => 59,  155 => 57,  137 => 56,  134 => 40,  131 => 53,  128 => 52,  125 => 51,  122 => 50,  119 => 36,  116 => 34,  113 => 46,  110 => 45,  107 => 44,  102 => 32,  99 => 30,  96 => 32,  94 => 39,  91 => 37,  89 => 36,  87 => 35,  84 => 27,  80 => 24,  77 => 23,  73 => 28,  70 => 22,  68 => 26,  66 => 25,  64 => 20,  62 => 23,  59 => 21,  57 => 20,  54 => 18,  50 => 14,  46 => 16,  43 => 14,  41 => 13,  39 => 12,  37 => 11,  35 => 10,  33 => 9,  30 => 8,  28 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
