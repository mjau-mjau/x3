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
        return array (  76 => 25,  49 => 18,  402 => 162,  396 => 160,  394 => 158,  391 => 157,  388 => 155,  384 => 153,  381 => 152,  378 => 150,  371 => 145,  367 => 143,  360 => 141,  354 => 139,  351 => 138,  348 => 136,  342 => 134,  339 => 133,  336 => 131,  330 => 129,  327 => 128,  324 => 126,  314 => 124,  312 => 123,  309 => 122,  306 => 121,  303 => 119,  293 => 117,  291 => 116,  288 => 115,  285 => 114,  282 => 112,  276 => 110,  273 => 109,  270 => 107,  264 => 105,  261 => 104,  258 => 102,  253 => 101,  250 => 99,  247 => 98,  243 => 95,  240 => 94,  230 => 90,  215 => 87,  212 => 86,  209 => 84,  206 => 83,  203 => 82,  200 => 81,  197 => 80,  194 => 79,  191 => 78,  188 => 77,  185 => 75,  182 => 74,  179 => 72,  176 => 71,  173 => 70,  161 => 65,  158 => 63,  149 => 60,  146 => 58,  140 => 56,  137 => 55,  134 => 53,  124 => 51,  122 => 50,  119 => 49,  116 => 48,  113 => 46,  103 => 44,  92 => 39,  83 => 36,  80 => 34,  59 => 24,  54 => 20,  47 => 16,  36 => 12,  27 => 6,  25 => 5,  174 => 69,  170 => 69,  164 => 66,  157 => 62,  154 => 60,  152 => 61,  120 => 58,  117 => 56,  114 => 50,  110 => 48,  94 => 41,  86 => 37,  77 => 32,  68 => 22,  56 => 20,  52 => 19,  43 => 14,  22 => 3,  142 => 54,  139 => 52,  128 => 50,  125 => 49,  121 => 48,  118 => 47,  115 => 45,  111 => 44,  101 => 43,  98 => 42,  95 => 41,  91 => 39,  88 => 35,  85 => 33,  74 => 32,  71 => 23,  69 => 29,  66 => 27,  64 => 28,  61 => 26,  57 => 22,  51 => 19,  48 => 17,  44 => 15,  30 => 7,  23 => 4,  244 => 90,  237 => 89,  233 => 86,  229 => 84,  226 => 89,  223 => 82,  219 => 79,  216 => 78,  213 => 76,  199 => 75,  196 => 74,  193 => 72,  190 => 71,  187 => 70,  184 => 68,  177 => 67,  175 => 66,  172 => 64,  169 => 63,  167 => 68,  165 => 61,  162 => 59,  159 => 58,  156 => 57,  153 => 56,  150 => 55,  147 => 53,  144 => 52,  141 => 50,  138 => 49,  135 => 48,  132 => 47,  129 => 46,  126 => 44,  108 => 47,  105 => 45,  102 => 40,  99 => 43,  96 => 31,  93 => 37,  90 => 27,  87 => 35,  84 => 36,  81 => 34,  78 => 31,  73 => 24,  70 => 29,  67 => 27,  65 => 26,  62 => 24,  60 => 23,  58 => 22,  55 => 20,  53 => 20,  46 => 16,  42 => 14,  39 => 12,  37 => 12,  35 => 10,  33 => 10,  31 => 9,  29 => 8,  26 => 6,  24 => 3,  50 => 17,  45 => 16,  40 => 13,  38 => 13,  21 => 2,  19 => 1,);
    }
}
