<?php

/* partials/nav/article-nav.html */
class __TwigTemplate_1f36d1ecb2312cbfabcf5cbe221c4c4abc5939dcee62ac401dbd44c47b0d0d0b extends Twig_Template
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
            if (((isset($context["siblings"]) ? $context["siblings"] : null) && ($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), 0, array(), "array") || $this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), 1, array(), "array")))) {
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
                echo "<div class=\"article-nav\">

\t";
                // line 18
                if ($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), 1, array(), "array")) {
                    // line 19
                    echo "\t\t";
                    $context["href_next"] = (((isset($context["href_base"]) ? $context["href_base"] : null) . $this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), 1, array(), "array"), "slug")) . "/");
                    // line 20
                    echo "\t\t<a href=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["href_next"]) ? $context["href_next"] : null)));
                    echo "\" class=\"next\"><span>";
                    echo $this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), 1, array(), "array"), "label");
                    echo "</span></a>
\t";
                }
                // line 22
                echo "
\t";
                // line 23
                if ($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), 0, array(), "array")) {
                    // line 24
                    echo "\t\t";
                    $context["href_prev"] = (((isset($context["href_base"]) ? $context["href_base"] : null) . $this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), 0, array(), "array"), "slug")) . "/");
                    // line 25
                    echo "\t\t<a href=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["href_prev"]) ? $context["href_prev"] : null)));
                    echo "\" class=\"previous\"><span>";
                    echo $this->getAttribute($this->getAttribute((isset($context["siblings"]) ? $context["siblings"] : null), 0, array(), "array"), "label");
                    echo "</span></a>
\t";
                }
                // line 27
                echo "
\t";
                // line 29
                echo "
\t";
                // line 39
                echo "
</div>
";
            }
        }
        // line 43
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/nav/article-nav.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 23,  51 => 19,  42 => 14,  130 => 52,  127 => 51,  124 => 49,  120 => 48,  117 => 47,  115 => 46,  106 => 42,  103 => 41,  100 => 39,  93 => 37,  79 => 34,  76 => 32,  58 => 22,  45 => 16,  38 => 13,  90 => 43,  69 => 28,  61 => 18,  56 => 21,  44 => 12,  36 => 12,  27 => 6,  362 => 133,  359 => 132,  348 => 126,  345 => 124,  343 => 123,  339 => 122,  335 => 121,  333 => 120,  327 => 116,  324 => 114,  319 => 113,  316 => 112,  313 => 110,  307 => 108,  304 => 107,  301 => 105,  295 => 103,  292 => 102,  288 => 99,  282 => 96,  279 => 94,  273 => 92,  258 => 88,  255 => 86,  247 => 81,  243 => 80,  218 => 64,  215 => 63,  212 => 61,  189 => 54,  175 => 52,  172 => 51,  166 => 48,  163 => 46,  156 => 45,  150 => 44,  146 => 43,  140 => 41,  129 => 39,  126 => 37,  109 => 33,  63 => 21,  53 => 19,  47 => 16,  32 => 8,  22 => 2,  108 => 45,  105 => 43,  101 => 41,  98 => 40,  95 => 31,  92 => 29,  88 => 29,  85 => 28,  81 => 29,  78 => 27,  74 => 31,  71 => 29,  67 => 24,  55 => 17,  52 => 16,  49 => 18,  40 => 12,  34 => 9,  31 => 9,  29 => 8,  26 => 6,  24 => 3,  21 => 2,  278 => 106,  275 => 104,  272 => 103,  270 => 91,  267 => 100,  263 => 98,  260 => 97,  257 => 96,  253 => 93,  250 => 91,  236 => 90,  233 => 89,  230 => 69,  227 => 68,  224 => 66,  222 => 84,  219 => 83,  216 => 82,  211 => 81,  208 => 79,  205 => 59,  202 => 58,  199 => 57,  196 => 55,  194 => 74,  191 => 73,  188 => 72,  182 => 53,  179 => 68,  176 => 66,  173 => 65,  170 => 63,  167 => 62,  164 => 61,  161 => 60,  158 => 59,  155 => 57,  137 => 54,  134 => 53,  131 => 53,  128 => 52,  125 => 51,  122 => 50,  119 => 36,  116 => 34,  113 => 45,  110 => 43,  107 => 44,  102 => 32,  99 => 42,  96 => 38,  94 => 39,  91 => 37,  89 => 36,  87 => 35,  84 => 39,  80 => 31,  77 => 30,  73 => 23,  70 => 25,  68 => 26,  66 => 26,  64 => 20,  62 => 22,  59 => 19,  57 => 20,  54 => 20,  50 => 14,  46 => 13,  43 => 14,  41 => 13,  39 => 12,  37 => 10,  35 => 9,  33 => 10,  30 => 8,  28 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
