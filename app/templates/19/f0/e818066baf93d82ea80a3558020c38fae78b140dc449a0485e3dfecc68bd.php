<?php

/* partials/content.html */
class __TwigTemplate_19f0e818066baf93d82ea80a3558020c38fae78b140dc449a0485e3dfecc68bd extends Twig_Template
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
        $this->env->loadTemplate("partials/nav/article-nav.html")->display(array_merge($context, array("page" => (isset($context["page"]) ? $context["page"] : null))));
        // line 2
        echo "
";
        // line 4
        $context["layout"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "layout");
        // line 5
        $context["items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "items"), ","));
        // line 6
        echo "
";
        // line 8
        if ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "disqus_shortname") && $this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "disqus")) && ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slug") != "404"))) {
            $context["items"] = call_user_func_array($this->env->getFilter('merge')->getCallable(), array((isset($context["items"]) ? $context["items"] : null), array(0 => "disqus")));
        }
        // line 9
        echo "
";
        // line 11
        $context["container"] = "partials/module.layout.html";
        // line 12
        echo "
";
        // line 14
        if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "assets") && call_user_func_array($this->env->getFunction('exists')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "assets"), "/")))))) {
            // line 15
            echo "\t";
            $context["folder"] = call_user_func_array($this->env->getFunction('get')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "assets"), "/"))));
        } else {
            // line 17
            echo "\t";
            $context["folder"] = (isset($context["page"]) ? $context["page"] : null);
        }
        // line 19
        echo "
";
        // line 21
        if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "assets") && call_user_func_array($this->env->getFunction('exists')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "assets"), "/")))))) {
            // line 22
            echo "\t";
            $context["gallery"] = call_user_func_array($this->env->getFunction('get')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "assets"), "/"))));
        } else {
            // line 24
            echo "\t";
            $context["gallery"] = (isset($context["page"]) ? $context["page"] : null);
        }
        // line 26
        echo "
";
        // line 28
        $context["gallery_images"] = call_user_func_array($this->env->getFunction('sortby')->getCallable(), array($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "images"), $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "sortby"), ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "sort") == "desc")) ? (true) : (false))));
        // line 29
        echo "
";
        // line 31
        $context["gallery_videos"] = call_user_func_array($this->env->getFunction('sortby')->getCallable(), array($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "video"), $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "sortby"), ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "sort") == "desc")) ? (true) : (false))));
        // line 32
        echo "
";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            if ((!$this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), (isset($context["module"]) ? $context["module"] : null), array(), "array"), "hide"))) {
                // line 35
                echo "
\t";
                // line 37
                echo "\t";
                if (((isset($context["module"]) ? $context["module"] : null) == "context")) {
                    // line 38
                    echo "\t";
                    $template = $this->env->resolveTemplate((isset($context["container"]) ? $context["container"] : null));
                    $template->display(array_merge($context, array("module" => (isset($context["module"]) ? $context["module"] : null), "default" => true)));
                    // line 39
                    echo "
\t";
                    // line 41
                    echo "\t";
                } elseif ((((isset($context["module"]) ? $context["module"] : null) == "folders") && ($this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "children_count") > 0))) {
                    // line 42
                    echo "\t";
                    $template = $this->env->resolveTemplate((isset($context["container"]) ? $context["container"] : null));
                    $template->display(array_merge($context, array("module" => (isset($context["module"]) ? $context["module"] : null), "default" => true, "class" => "images")));
                    // line 43
                    echo "
\t";
                    // line 45
                    echo "\t";
                    // line 46
                    echo "\t";
                    // line 47
                    echo "\t";
                } elseif ((((isset($context["module"]) ? $context["module"] : null) == "gallery") && (((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null))) > 0) || $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "embed")) || (call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_videos"]) ? $context["gallery_videos"] : null))) > 0)))) {
                    // line 48
                    echo "\t\t";
                    $template = $this->env->resolveTemplate((isset($context["container"]) ? $context["container"] : null));
                    $template->display(array_merge($context, array("module" => (isset($context["module"]) ? $context["module"] : null), "default" => true, "class" => "images")));
                    // line 49
                    echo "
\t";
                    // line 51
                    echo "\t";
                } elseif (((isset($context["module"]) ? $context["module"] : null) == "disqus")) {
                    // line 52
                    echo "\t";
                    $template = $this->env->resolveTemplate((isset($context["container"]) ? $context["container"] : null));
                    $template->display(array_merge($context, array("module" => (isset($context["module"]) ? $context["module"] : null), "default" => false)));
                    // line 53
                    echo "\t";
                }
                // line 54
                echo "
";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "partials/content.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 52,  127 => 51,  124 => 49,  120 => 48,  117 => 47,  115 => 46,  106 => 42,  103 => 41,  100 => 39,  93 => 37,  79 => 34,  76 => 32,  58 => 22,  45 => 15,  38 => 11,  90 => 35,  69 => 28,  61 => 18,  56 => 21,  44 => 12,  36 => 10,  27 => 6,  362 => 133,  359 => 132,  348 => 126,  345 => 124,  343 => 123,  339 => 122,  335 => 121,  333 => 120,  327 => 116,  324 => 114,  319 => 113,  316 => 112,  313 => 110,  307 => 108,  304 => 107,  301 => 105,  295 => 103,  292 => 102,  288 => 99,  282 => 96,  279 => 94,  273 => 92,  258 => 88,  255 => 86,  247 => 81,  243 => 80,  218 => 64,  215 => 63,  212 => 61,  189 => 54,  175 => 52,  172 => 51,  166 => 48,  163 => 46,  156 => 45,  150 => 44,  146 => 43,  140 => 41,  129 => 39,  126 => 37,  109 => 33,  63 => 21,  53 => 19,  47 => 16,  32 => 8,  22 => 2,  108 => 45,  105 => 43,  101 => 41,  98 => 40,  95 => 31,  92 => 29,  88 => 29,  85 => 28,  81 => 27,  78 => 26,  74 => 31,  71 => 29,  67 => 23,  55 => 17,  52 => 16,  49 => 17,  40 => 12,  34 => 9,  31 => 8,  29 => 7,  26 => 5,  24 => 4,  21 => 2,  278 => 106,  275 => 104,  272 => 103,  270 => 91,  267 => 100,  263 => 98,  260 => 97,  257 => 96,  253 => 93,  250 => 91,  236 => 90,  233 => 89,  230 => 69,  227 => 68,  224 => 66,  222 => 84,  219 => 83,  216 => 82,  211 => 81,  208 => 79,  205 => 59,  202 => 58,  199 => 57,  196 => 55,  194 => 74,  191 => 73,  188 => 72,  182 => 53,  179 => 68,  176 => 66,  173 => 65,  170 => 63,  167 => 62,  164 => 61,  161 => 60,  158 => 59,  155 => 57,  137 => 54,  134 => 53,  131 => 53,  128 => 52,  125 => 51,  122 => 50,  119 => 36,  116 => 34,  113 => 45,  110 => 43,  107 => 44,  102 => 32,  99 => 42,  96 => 38,  94 => 39,  91 => 37,  89 => 36,  87 => 35,  84 => 27,  80 => 31,  77 => 30,  73 => 23,  70 => 22,  68 => 26,  66 => 26,  64 => 20,  62 => 24,  59 => 19,  57 => 20,  54 => 18,  50 => 14,  46 => 13,  43 => 14,  41 => 13,  39 => 12,  37 => 10,  35 => 9,  33 => 9,  30 => 8,  28 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
