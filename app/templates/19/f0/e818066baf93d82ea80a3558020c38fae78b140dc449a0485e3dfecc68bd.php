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
        // line 2
        $context["layout"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "layout");
        // line 3
        $context["items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "items"), ","));
        // line 4
        echo "
";
        // line 6
        if ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "disqus_shortname") && $this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "disqus")) && ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slug") != "404"))) {
            $context["items"] = call_user_func_array($this->env->getFilter('merge')->getCallable(), array((isset($context["items"]) ? $context["items"] : null), array(0 => "disqus")));
        }
        // line 7
        echo "
";
        // line 9
        $context["container"] = "partials/module.layout.html";
        // line 10
        echo "
";
        // line 12
        if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "assets") && call_user_func_array($this->env->getFunction('exists')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "assets"), "/")))))) {
            // line 13
            echo "\t";
            $context["folder"] = call_user_func_array($this->env->getFunction('get')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "assets"), "/"))));
        } else {
            // line 15
            echo "\t";
            $context["folder"] = (isset($context["page"]) ? $context["page"] : null);
        }
        // line 17
        echo "
";
        // line 19
        if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "assets") && call_user_func_array($this->env->getFunction('exists')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "assets"), "/")))))) {
            // line 20
            echo "\t";
            $context["gallery"] = call_user_func_array($this->env->getFunction('get')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "assets"), "/"))));
        } else {
            // line 22
            echo "\t";
            $context["gallery"] = (isset($context["page"]) ? $context["page"] : null);
        }
        // line 24
        echo "
";
        // line 26
        $context["gallery_images"] = call_user_func_array($this->env->getFunction('sortby')->getCallable(), array($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "images"), $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "sortby"), ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "sort") == "desc")) ? (true) : (false))));
        // line 27
        echo "
";
        // line 29
        $context["gallery_videos"] = call_user_func_array($this->env->getFunction('sortby')->getCallable(), array($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "video"), $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "sortby"), ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "sort") == "desc")) ? (true) : (false))));
        // line 30
        echo "
";
        // line 32
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
                // line 33
                echo "
\t";
                // line 35
                echo "\t";
                if (((isset($context["module"]) ? $context["module"] : null) == "context")) {
                    // line 36
                    echo "\t";
                    $template = $this->env->resolveTemplate((isset($context["container"]) ? $context["container"] : null));
                    $template->display(array_merge($context, array("module" => (isset($context["module"]) ? $context["module"] : null), "default" => true)));
                    // line 37
                    echo "
\t";
                    // line 39
                    echo "\t";
                } elseif ((((isset($context["module"]) ? $context["module"] : null) == "folders") && ($this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "children_count") > 0))) {
                    // line 40
                    echo "\t";
                    $template = $this->env->resolveTemplate((isset($context["container"]) ? $context["container"] : null));
                    $template->display(array_merge($context, array("module" => (isset($context["module"]) ? $context["module"] : null), "default" => true, "class" => "images")));
                    // line 41
                    echo "
\t";
                    // line 43
                    echo "\t";
                } elseif ((((isset($context["module"]) ? $context["module"] : null) == "gallery") && (((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null))) > 0) || $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "embed")) || (call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_videos"]) ? $context["gallery_videos"] : null))) > 0)))) {
                    // line 44
                    echo "\t\t";
                    $template = $this->env->resolveTemplate((isset($context["container"]) ? $context["container"] : null));
                    $template->display(array_merge($context, array("module" => (isset($context["module"]) ? $context["module"] : null), "default" => true, "class" => "images")));
                    // line 45
                    echo "
\t";
                    // line 47
                    echo "\t";
                } elseif (((isset($context["module"]) ? $context["module"] : null) == "disqus")) {
                    // line 48
                    echo "\t";
                    $template = $this->env->resolveTemplate((isset($context["container"]) ? $context["container"] : null));
                    $template->display(array_merge($context, array("module" => (isset($context["module"]) ? $context["module"] : null), "default" => false)));
                    // line 49
                    echo "\t";
                }
                // line 50
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
        // line 52
        echo "
";
        // line 54
        $this->env->loadTemplate("partials/nav/pagenav.html")->display(array_merge($context, array("page" => (isset($context["page"]) ? $context["page"] : null))));
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
        return array (  142 => 54,  139 => 52,  121 => 48,  118 => 47,  115 => 45,  51 => 19,  48 => 17,  38 => 12,  90 => 30,  69 => 29,  61 => 24,  56 => 17,  44 => 15,  36 => 10,  27 => 6,  383 => 145,  380 => 144,  369 => 138,  366 => 136,  364 => 135,  360 => 134,  356 => 133,  354 => 132,  348 => 128,  345 => 126,  340 => 125,  337 => 124,  334 => 122,  328 => 120,  325 => 119,  322 => 117,  316 => 115,  313 => 114,  310 => 112,  304 => 110,  301 => 109,  297 => 106,  291 => 103,  288 => 101,  283 => 99,  280 => 98,  278 => 97,  275 => 96,  272 => 94,  270 => 91,  258 => 88,  255 => 86,  247 => 81,  243 => 80,  230 => 69,  227 => 68,  224 => 66,  218 => 64,  215 => 63,  212 => 61,  205 => 59,  202 => 58,  199 => 57,  196 => 55,  182 => 53,  175 => 52,  172 => 51,  166 => 48,  163 => 46,  156 => 45,  150 => 44,  129 => 39,  126 => 37,  109 => 33,  63 => 21,  53 => 20,  47 => 16,  32 => 8,  22 => 2,  101 => 40,  98 => 39,  95 => 37,  92 => 29,  88 => 35,  85 => 33,  81 => 31,  78 => 30,  74 => 32,  71 => 30,  67 => 23,  55 => 17,  52 => 16,  49 => 15,  40 => 13,  34 => 9,  31 => 8,  29 => 7,  26 => 6,  24 => 5,  21 => 3,  189 => 54,  186 => 80,  183 => 79,  181 => 78,  178 => 76,  174 => 74,  171 => 73,  168 => 72,  164 => 69,  160 => 66,  157 => 65,  154 => 64,  151 => 63,  148 => 62,  146 => 43,  143 => 60,  140 => 41,  134 => 40,  131 => 55,  128 => 50,  125 => 49,  122 => 50,  119 => 36,  116 => 34,  111 => 44,  108 => 43,  105 => 41,  102 => 32,  99 => 30,  96 => 32,  94 => 39,  91 => 36,  89 => 36,  87 => 35,  84 => 27,  80 => 24,  77 => 23,  73 => 28,  70 => 22,  68 => 26,  66 => 27,  64 => 26,  62 => 21,  59 => 19,  57 => 22,  54 => 18,  50 => 14,  46 => 13,  43 => 12,  41 => 13,  39 => 12,  37 => 10,  35 => 10,  33 => 9,  30 => 7,  28 => 6,  25 => 4,  23 => 4,  19 => 2,);
    }
}
