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
        return array (  108 => 45,  98 => 40,  88 => 35,  85 => 34,  81 => 31,  71 => 26,  64 => 22,  62 => 21,  52 => 16,  49 => 15,  37 => 10,  34 => 9,  100 => 22,  97 => 21,  92 => 38,  86 => 18,  84 => 17,  80 => 16,  67 => 23,  63 => 9,  43 => 12,  112 => 39,  110 => 38,  105 => 43,  101 => 41,  95 => 39,  89 => 32,  83 => 31,  78 => 30,  74 => 27,  70 => 27,  65 => 10,  59 => 19,  55 => 17,  51 => 6,  48 => 20,  46 => 13,  42 => 17,  40 => 11,  38 => 3,  36 => 2,  33 => 10,  31 => 8,  29 => 7,  26 => 5,  24 => 4,  21 => 2,  19 => 1,);
    }
}
