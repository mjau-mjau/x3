<?php

/* partials/module.layout.html */
class __TwigTemplate_6ad8b378f74fa88b3cda75370e856f680e33a9b343ec48c60332caeec89deac4 extends Twig_Template
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
";
        // line 3
        $context["name"] = (isset($context["module"]) ? $context["module"] : null);
        // line 4
        $context["module"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), (isset($context["module"]) ? $context["module"] : null), array(), "array");
        // line 5
        echo "
";
        // line 7
        if (($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "width") && ($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "width") != "width-default"))) {
            // line 8
            echo "\t";
            $context["width"] = $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "width");
        } elseif (($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "width") && ($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "width") != "width-default"))) {
            // line 10
            echo "  ";
            $context["width"] = $this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "width");
        } else {
            // line 12
            echo "\t";
            $context["width"] = "";
        }
        // line 14
        echo "
";
        // line 16
        if ((((isset($context["width"]) ? $context["width"] : null) == "wide") || ((isset($context["name"]) ? $context["name"] : null) == "disqus"))) {
            // line 17
            echo "\t";
            $context["columns"] = "";
        } elseif (((isset($context["width"]) ? $context["width"] : null) == "narrow")) {
            // line 19
            echo "\t";
            $context["columns"] = "small-12 large-10 small-centered columns";
        } elseif (((isset($context["width"]) ? $context["width"] : null) == "narrower")) {
            // line 21
            echo "\t";
            $context["columns"] = "small-12 medium-10 large-8 small-centered columns";
        } elseif (((isset($context["width"]) ? $context["width"] : null) == "narrowest")) {
            // line 23
            echo "\t";
            $context["columns"] = "small-12 medium-9 large-6 small-centered columns";
        } else {
            // line 25
            echo "\t";
            $context["columns"] = "small-12 small-centered columns";
        }
        // line 27
        echo "
";
        // line 29
        if ((((isset($context["width"]) ? $context["width"] : null) == "wide") || ((isset($context["name"]) ? $context["name"] : null) == "disqus"))) {
            // line 30
            echo "\t<div class=\"module\">
";
        } else {
            // line 32
            echo "\t<div class=\"module row\">
";
        }
        // line 34
        echo "
";
        // line 36
        ob_start();
        // line 37
        if (((isset($context["name"]) ? $context["name"] : null) == "gallery")) {
            echo "itemscope itemtype=\"http://schema.org/ImageGallery\"";
        }
        $context["schema"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 39
        echo "
";
        // line 41
        if ($this->getAttribute($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "caption"), "enabled")) {
            // line 42
            echo "\t";
            $context["caption_classes"] = $this->getAttribute($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "caption"), "align");
            // line 43
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "caption"), "hover")) {
                $context["caption_classes"] = ((isset($context["caption_classes"]) ? $context["caption_classes"] : null) . " caption-hover");
            }
        }
        // line 45
        echo "
";
        // line 47
        if ((($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "layout") == "vertical") && $this->getAttribute($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "vertical"), "horizontal_rule"))) {
            // line 48
            echo "\t";
            $context["hr"] = "hr";
        }
        // line 50
        echo "
";
        // line 56
        echo "
";
        // line 58
        ob_start();
        echo "clearfix ";
        echo (isset($context["name"]) ? $context["name"] : null);
        echo " ";
        echo (isset($context["columns"]) ? $context["columns"] : null);
        echo " ";
        if ($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "layout")) {
            echo "layout-";
            echo $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "layout");
        }
        echo " ";
        echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "include"), "layout");
        echo " ";
        echo $this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "classes");
        echo " ";
        echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "include"), (isset($context["name"]) ? $context["name"] : null), array(), "array");
        echo " ";
        echo $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "classes");
        echo " ";
        echo (isset($context["caption_classes"]) ? $context["caption_classes"] : null);
        echo " ";
        echo (isset($context["class"]) ? $context["class"] : null);
        echo " title-";
        echo (($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "title_size", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "title_size"), "normal"))) : ("normal"));
        echo " ";
        echo (isset($context["width"]) ? $context["width"] : null);
        echo " ";
        echo (isset($context["hr"]) ? $context["hr"] : null);
        echo " ";
        echo (($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "text_align", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "text_align"), $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "context"), "text_align")))) : ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "context"), "text_align")));
        $context["module_classes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 59
        $context["module_classes"] = call_user_func_array($this->env->getFilter('textAlign')->getCallable(), array(call_user_func_array($this->env->getFilter('cleanData')->getCallable(), array((isset($context["module_classes"]) ? $context["module_classes"] : null)))));
        // line 60
        echo "
";
        // line 62
        echo "<div class=\"";
        echo (isset($context["module_classes"]) ? $context["module_classes"] : null);
        echo "\" ";
        echo (isset($context["schema"]) ? $context["schema"] : null);
        echo ">
\t";
        // line 63
        $template = $this->env->resolveTemplate((("partials/module." . (isset($context["name"]) ? $context["name"] : null)) . ".html"));
        $template->display($context);
        // line 64
        echo "\t<hr class=\"module-separator\" />
\t";
        // line 66
        echo "</div>

";
        // line 69
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "partials/module.layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 69,  170 => 66,  167 => 64,  164 => 63,  157 => 62,  154 => 60,  152 => 59,  120 => 58,  117 => 56,  114 => 50,  110 => 48,  108 => 47,  105 => 45,  99 => 43,  96 => 42,  94 => 41,  91 => 39,  86 => 37,  84 => 36,  81 => 34,  77 => 32,  73 => 30,  71 => 29,  68 => 27,  64 => 25,  60 => 23,  56 => 21,  52 => 19,  48 => 17,  46 => 16,  43 => 14,  39 => 12,  35 => 10,  31 => 8,  29 => 7,  26 => 5,  24 => 4,  22 => 3,  50 => 8,  45 => 6,  40 => 5,  38 => 4,  21 => 3,  19 => 1,);
    }
}
