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
        return array (  174 => 69,  170 => 66,  164 => 63,  157 => 62,  154 => 60,  152 => 59,  120 => 58,  117 => 56,  114 => 50,  110 => 48,  94 => 41,  86 => 37,  77 => 32,  68 => 27,  56 => 21,  52 => 19,  43 => 14,  22 => 3,  142 => 54,  139 => 52,  128 => 50,  125 => 49,  121 => 48,  118 => 47,  115 => 45,  111 => 44,  101 => 40,  98 => 39,  95 => 37,  91 => 39,  88 => 35,  85 => 33,  74 => 32,  71 => 29,  69 => 29,  66 => 27,  64 => 25,  61 => 24,  57 => 22,  51 => 19,  48 => 17,  44 => 15,  30 => 7,  23 => 4,  244 => 90,  237 => 89,  233 => 86,  229 => 84,  226 => 83,  223 => 82,  219 => 79,  216 => 78,  213 => 76,  199 => 75,  196 => 74,  193 => 72,  190 => 71,  187 => 70,  184 => 68,  177 => 67,  175 => 66,  172 => 64,  169 => 63,  167 => 64,  165 => 61,  162 => 59,  159 => 58,  156 => 57,  153 => 56,  150 => 55,  147 => 53,  144 => 52,  141 => 50,  138 => 49,  135 => 48,  132 => 47,  129 => 46,  126 => 44,  108 => 47,  105 => 45,  102 => 40,  99 => 43,  96 => 42,  93 => 37,  90 => 36,  87 => 35,  84 => 36,  81 => 34,  78 => 31,  73 => 30,  70 => 29,  67 => 27,  65 => 26,  62 => 24,  60 => 23,  58 => 22,  55 => 20,  53 => 20,  46 => 16,  42 => 15,  39 => 12,  37 => 12,  35 => 10,  33 => 9,  31 => 8,  29 => 7,  26 => 5,  24 => 4,  50 => 17,  45 => 6,  40 => 13,  38 => 12,  21 => 3,  19 => 1,);
    }
}
