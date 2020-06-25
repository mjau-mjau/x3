<?php

/* partials/preview-image.html */
class __TwigTemplate_a4be08c3a9eb7dee12b95b73653f4a7074249c4f0a7c5fbce1e6cb2b5510de62 extends Twig_Template
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
        // line 4
        $context["page"] = ((array_key_exists("p", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["p"]) ? $context["p"] : null), (isset($context["page"]) ? $context["page"] : null)))) : ((isset($context["page"]) ? $context["page"] : null)));
        // line 5
        echo "
";
        // line 7
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "image"))))) {
            // line 8
            echo "\t";
            if (twig_in_filter("/", $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "image"))) {
                // line 9
                echo "\t\t";
                $context["page_image"] = ("./content" . call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('replace')->getCallable(), array(("/" . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "image")))), array("{{files}}" => "custom/files", "content/" => "", "./" => ""))), array("//" => "/"))));
                // line 10
                echo "\t";
            } else {
                // line 11
                echo "\t\t";
                $context["page_image"] = (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path") . "/") . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "image"))));
                // line 12
                echo "\t";
            }
            // line 13
            echo "
\t";
            // line 15
            echo "\t";
            if (((isset($context["page_image"]) ? $context["page_image"] : null) && (call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('last')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('split')->getCallable(), array((isset($context["page_image"]) ? $context["page_image"] : null), ".")))))) > 4))) {
                // line 16
                echo "\t\t";
                $context["page_image"] = ((isset($context["page_image"]) ? $context["page_image"] : null) . ".jpg");
                // line 17
                echo "\t";
            }
        }
        // line 19
        echo "
";
        // line 21
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "template_name") == "file")) {
            // line 22
            echo "\t";
            $context["url"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path");
            // line 23
            echo "
";
        } elseif (((isset($context["page_image"]) ? $context["page_image"] : null) && call_user_func_array($this->env->getFunction('exists')->getCallable(), array((isset($context["page_image"]) ? $context["page_image"] : null))))) {
            // line 26
            echo "\t";
            $context["url"] = (isset($context["page_image"]) ? $context["page_image"] : null);
            // line 27
            echo "
";
        } elseif (call_user_func_array($this->env->getFunction('exists')->getCallable(), array(($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path") . "/preview.jpg")))) {
            // line 30
            echo "\t";
            $context["url"] = ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path") . "/preview.jpg");
            // line 31
            echo "
";
        } elseif ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array(call_user_func_array($this->env->getFilter('first')->getCallable(), array($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "images"))))))) {
            // line 34
            echo "\t";
            $context["url"] = call_user_func_array($this->env->getFilter('first')->getCallable(), array($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "images")));
            // line 35
            echo "
";
        } elseif ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "children"))) > 0)) {
            // line 38
            echo "\t";
            $context["first_child_page"] = call_user_func_array($this->env->getFilter('first')->getCallable(), array($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "children")));
            // line 39
            echo "\t";
            if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array(call_user_func_array($this->env->getFilter('first')->getCallable(), array($this->env, $this->getAttribute((isset($context["first_child_page"]) ? $context["first_child_page"] : null), "images"))))))) {
                // line 40
                echo "\t\t";
                $context["url"] = call_user_func_array($this->env->getFilter('first')->getCallable(), array($this->env, $this->getAttribute((isset($context["first_child_page"]) ? $context["first_child_page"] : null), "images")));
                // line 41
                echo "\t";
            }
        }
        // line 43
        echo "
";
        // line 45
        echo (isset($context["url"]) ? $context["url"] : null);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/preview-image.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 41,  98 => 40,  95 => 39,  92 => 38,  88 => 35,  85 => 34,  74 => 27,  71 => 26,  64 => 22,  59 => 19,  52 => 16,  49 => 15,  43 => 12,  40 => 11,  34 => 9,  232 => 84,  225 => 83,  221 => 80,  217 => 78,  214 => 77,  211 => 76,  207 => 73,  204 => 72,  201 => 70,  187 => 69,  184 => 68,  181 => 66,  178 => 65,  176 => 64,  173 => 63,  170 => 62,  165 => 61,  162 => 59,  159 => 58,  156 => 57,  153 => 56,  150 => 55,  147 => 53,  144 => 52,  141 => 50,  138 => 49,  135 => 48,  132 => 47,  129 => 46,  126 => 44,  108 => 45,  105 => 43,  102 => 40,  99 => 39,  96 => 38,  93 => 37,  90 => 36,  87 => 35,  84 => 33,  81 => 31,  78 => 30,  73 => 30,  70 => 29,  67 => 23,  65 => 26,  62 => 21,  60 => 23,  58 => 22,  55 => 17,  53 => 19,  50 => 17,  46 => 13,  42 => 15,  39 => 13,  37 => 10,  35 => 11,  33 => 10,  31 => 8,  29 => 7,  26 => 5,  24 => 4,  21 => 2,  19 => 1,);
    }
}
