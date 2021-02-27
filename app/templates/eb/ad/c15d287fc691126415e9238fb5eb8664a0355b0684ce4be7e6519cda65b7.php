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
        return array (  90 => 27,  76 => 25,  51 => 19,  49 => 18,  42 => 14,  392 => 155,  386 => 153,  384 => 151,  381 => 150,  378 => 148,  371 => 143,  367 => 141,  360 => 139,  354 => 137,  351 => 136,  348 => 134,  342 => 132,  339 => 131,  336 => 129,  330 => 127,  327 => 126,  324 => 124,  314 => 122,  312 => 121,  309 => 120,  306 => 119,  303 => 117,  293 => 115,  291 => 114,  288 => 113,  285 => 112,  282 => 110,  276 => 108,  273 => 107,  270 => 105,  264 => 103,  261 => 102,  258 => 100,  253 => 99,  250 => 97,  247 => 96,  243 => 93,  240 => 92,  230 => 88,  226 => 87,  215 => 85,  212 => 84,  209 => 82,  206 => 81,  203 => 80,  200 => 79,  197 => 78,  194 => 77,  191 => 76,  188 => 75,  185 => 73,  182 => 72,  179 => 70,  176 => 69,  173 => 68,  161 => 63,  158 => 61,  149 => 58,  146 => 56,  140 => 54,  137 => 53,  134 => 51,  124 => 49,  122 => 48,  119 => 47,  116 => 46,  113 => 44,  103 => 42,  101 => 41,  98 => 40,  95 => 39,  92 => 37,  83 => 34,  80 => 32,  74 => 30,  61 => 24,  59 => 23,  54 => 20,  47 => 16,  36 => 12,  33 => 10,  27 => 6,  25 => 5,  174 => 69,  170 => 67,  167 => 66,  164 => 64,  157 => 62,  154 => 60,  152 => 59,  120 => 58,  117 => 56,  114 => 50,  110 => 48,  108 => 47,  105 => 45,  99 => 43,  96 => 31,  94 => 41,  91 => 39,  86 => 35,  84 => 36,  81 => 34,  77 => 32,  73 => 24,  71 => 23,  68 => 22,  64 => 26,  60 => 23,  56 => 20,  52 => 19,  48 => 17,  46 => 16,  43 => 14,  39 => 12,  35 => 10,  31 => 9,  29 => 8,  26 => 6,  24 => 3,  22 => 3,  50 => 17,  45 => 16,  40 => 13,  38 => 13,  21 => 2,  19 => 1,);
    }
}
