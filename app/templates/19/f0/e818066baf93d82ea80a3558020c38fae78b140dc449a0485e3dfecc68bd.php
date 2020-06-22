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
        if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "assets") && call_user_func_array($this->env->getFunction('exists')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "assets"), "/")))))) {
            // line 13
            echo "\t";
            $context["folder"] = call_user_func_array($this->env->getFunction('get')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "assets"), "/"))));
        } else {
            // line 15
            echo "\t";
            $context["folder"] = (isset($context["page"]) ? $context["page"] : null);
        }
        // line 17
        echo "
";
        // line 19
        if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "assets") && call_user_func_array($this->env->getFunction('exists')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "assets"), "/")))))) {
            // line 20
            echo "\t";
            $context["gallery"] = call_user_func_array($this->env->getFunction('get')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "assets"), "/"))));
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
        return array (  142 => 54,  139 => 52,  128 => 50,  125 => 49,  121 => 48,  118 => 47,  115 => 45,  111 => 44,  91 => 36,  69 => 29,  66 => 27,  61 => 24,  57 => 22,  51 => 19,  48 => 17,  44 => 15,  38 => 12,  30 => 7,  23 => 4,  101 => 40,  98 => 39,  95 => 37,  92 => 38,  88 => 35,  85 => 33,  74 => 32,  71 => 30,  64 => 26,  59 => 19,  52 => 16,  49 => 15,  43 => 12,  40 => 13,  34 => 9,  232 => 84,  225 => 83,  221 => 80,  217 => 78,  214 => 77,  211 => 76,  207 => 73,  204 => 72,  201 => 70,  187 => 69,  184 => 68,  181 => 66,  178 => 65,  176 => 64,  173 => 63,  170 => 62,  165 => 61,  162 => 59,  159 => 58,  156 => 57,  153 => 56,  150 => 55,  147 => 53,  144 => 52,  141 => 50,  138 => 49,  135 => 48,  132 => 47,  129 => 46,  126 => 44,  108 => 43,  105 => 41,  102 => 40,  99 => 39,  96 => 38,  93 => 37,  90 => 36,  87 => 35,  84 => 33,  81 => 31,  78 => 30,  73 => 30,  70 => 29,  67 => 23,  65 => 26,  62 => 21,  60 => 23,  58 => 22,  55 => 17,  53 => 20,  50 => 17,  46 => 13,  42 => 15,  39 => 13,  37 => 10,  35 => 10,  33 => 9,  31 => 8,  29 => 7,  26 => 6,  24 => 4,  21 => 3,  19 => 2,);
    }
}
