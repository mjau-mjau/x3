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
        return array (  90 => 27,  76 => 25,  49 => 18,  42 => 14,  384 => 151,  378 => 149,  376 => 147,  373 => 146,  370 => 144,  363 => 139,  359 => 137,  352 => 135,  346 => 133,  343 => 132,  340 => 130,  334 => 128,  331 => 127,  328 => 125,  322 => 123,  319 => 122,  316 => 120,  306 => 118,  303 => 117,  300 => 116,  297 => 114,  287 => 112,  284 => 111,  281 => 110,  278 => 108,  272 => 106,  269 => 105,  266 => 103,  260 => 101,  257 => 100,  254 => 98,  249 => 97,  246 => 95,  243 => 94,  239 => 91,  236 => 90,  226 => 86,  222 => 85,  211 => 83,  208 => 82,  205 => 80,  202 => 79,  199 => 78,  196 => 77,  193 => 76,  190 => 75,  187 => 74,  184 => 73,  181 => 71,  178 => 70,  175 => 68,  172 => 67,  169 => 66,  166 => 65,  163 => 64,  160 => 62,  148 => 57,  145 => 56,  136 => 52,  133 => 51,  130 => 49,  92 => 37,  83 => 34,  80 => 32,  59 => 23,  54 => 20,  47 => 16,  36 => 12,  27 => 6,  25 => 5,  174 => 69,  170 => 66,  167 => 64,  164 => 63,  157 => 61,  154 => 59,  152 => 59,  120 => 47,  117 => 46,  114 => 45,  110 => 48,  99 => 43,  96 => 31,  94 => 41,  86 => 35,  84 => 36,  81 => 34,  77 => 32,  73 => 24,  68 => 22,  60 => 23,  56 => 20,  52 => 19,  46 => 16,  43 => 14,  39 => 12,  31 => 9,  29 => 8,  24 => 3,  22 => 3,  142 => 54,  139 => 52,  128 => 50,  125 => 49,  121 => 48,  118 => 47,  115 => 45,  111 => 43,  108 => 47,  105 => 45,  101 => 41,  98 => 40,  95 => 39,  91 => 39,  88 => 35,  85 => 33,  74 => 30,  71 => 23,  69 => 29,  66 => 27,  64 => 26,  61 => 24,  57 => 22,  53 => 20,  51 => 19,  48 => 17,  44 => 15,  35 => 10,  33 => 10,  30 => 7,  26 => 6,  23 => 4,  50 => 17,  45 => 16,  40 => 13,  38 => 13,  21 => 2,  19 => 1,);
    }
}
