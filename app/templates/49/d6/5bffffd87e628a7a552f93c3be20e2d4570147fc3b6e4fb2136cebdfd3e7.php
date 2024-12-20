<?php

/* page.json */
class __TwigTemplate_49d65bffffd87e628a7a552f93c3be20e2d4570147fc3b6e4fb2136cebdfd3e7 extends Twig_Template
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
        // line 5
        $context["baseurl"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "base_url");
        // line 6
        echo "
";
        // line 8
        $context["absolutepath"] = call_user_func_array($this->env->getFilter('addprotocol')->getCallable(), array((isset($context["baseurl"]) ? $context["baseurl"] : null)));
        // line 9
        $context["rootpath"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["baseurl"]) ? $context["baseurl"] : null), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "domain_name") => "")));
        // line 10
        $context["assetspath"] = call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_files"), "/")), (isset($context["rootpath"]) ? $context["rootpath"] : null)));
        // line 11
        $context["absolutepath_page"] = call_user_func_array($this->env->getFilter('setpath')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink"), (isset($context["absolutepath"]) ? $context["absolutepath"] : null)));
        // line 12
        $context["rootpath_page"] = call_user_func_array($this->env->getFilter('setpath')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink"), (isset($context["rootpath"]) ? $context["rootpath"] : null)));
        // line 13
        echo "
";
        // line 15
        ob_start();
        $this->env->loadTemplate("partials/preview-image.html")->display($context);
        $context["preview_image"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 16
        if (call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["preview_image"]) ? $context["preview_image"] : null)))) {
            $context["preview_image"] = call_user_func_array($this->env->getFunction('get_default_preview_image')->getCallable(), array());
        }
        // line 17
        echo "
";
        // line 19
        $context["preview_image_full"] = (call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_files"), "/")), (isset($context["absolutepath"]) ? $context["absolutepath"] : null))) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, (isset($context["preview_image"]) ? $context["preview_image"] : null), ".")));
        // line 20
        echo "
";
        // line 22
        $context["page_title"] = "";
        // line 23
        $context["page_description"] = "";
        // line 24
        echo "
";
        // line 26
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "template_name") == "file")) {
            // line 27
            echo "
\t";
            // line 29
            echo "\t";
            $context["myimage"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path");
            // line 30
            echo "
\t";
            // line 32
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "image_extended")) {
                // line 33
                echo "\t\t";
                $context["dirname"] = call_user_func_array($this->env->getFilter('dirname')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink")));
                // line 34
                echo "\t\t";
                if ((((isset($context["dirname"]) ? $context["dirname"] : null) == ".") || call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["dirname"]) ? $context["dirname"] : null))))) {
                    $context["dirname"] = "/";
                }
                // line 35
                echo "\t\t";
                $context["parent"] = call_user_func_array($this->env->getFunction('get')->getCallable(), array((isset($context["dirname"]) ? $context["dirname"] : null)));
                // line 36
                echo "\t";
            }
            // line 37
            echo "
\t";
            // line 39
            echo "\t";
            $context["settings"] = ((array_key_exists("parent", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["parent"]) ? $context["parent"] : null), (isset($context["page"]) ? $context["page"] : null)))) : ((isset($context["page"]) ? $context["page"] : null)));
            // line 40
            echo "
\t";
            // line 42
            echo "\t";
            if ($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "link")) {
                // line 43
                echo "\t\t";
                echo call_user_func_array($this->env->getFunction('redirect')->getCallable(), array($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "link")));
                echo "

\t";
                // line 46
                echo "\t";
            } else {
                // line 47
                echo "
\t\t";
                // line 48
                $context["folder_path"] = (((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('dirname')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path"))), "."))) . "/");
                // line 49
                echo "\t\t";
                $context["page_title"] = call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array($this->env, call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "title"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "gallery"), "image"), "title"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "gallery"), "image"), "title_include"), $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "name"))), "<a><span><em><i><b><strong><small><s><mark>")), array("{file_name}" => call_user_func_array($this->env->getFilter('removeExtension')->getCallable(), array($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name"))), "{file_name_ext}" => $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name"))))), $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "name")));
                // line 50
                echo "\t\t";
                $context["image_description"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array($this->env, call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "description"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "gallery"), "image"), "description"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "gallery"), "image"), "description_include"), $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "name"))), "<a><span><em><i><b><strong><small><s><br><mark><img><kbd><code><button>")), array("{file_name}" => call_user_func_array($this->env->getFilter('removeExtension')->getCallable(), array($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name"))), "{file_name_ext}" => $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name")))));
                // line 51
                echo "\t\t";
                $context["page_description"] = ((array_key_exists("image_description", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null), (((isset($context["page_title"]) ? $context["page_title"] : null) . " | ") . $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "title"))))) : ((((isset($context["page_title"]) ? $context["page_title"] : null) . " | ") . $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "title"))));
                // line 52
                echo "\t";
            }
            // line 53
            echo "

\t";
            // line 56
            echo "\t";
            $context["template"] = "partials/file.html";
            // line 57
            echo "
";
        } else {
            // line 60
            echo "\t";
            $context["page_title"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title");
            // line 61
            echo "\t";
            $context["page_description"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "description");
            // line 62
            echo "\t";
            $context["template"] = "partials/content.html";
        }
        // line 64
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 67
        ob_start();
        ob_start();
        $template = $this->env->resolveTemplate((isset($context["template"]) ? $context["template"] : null));
        $template->display($context);
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 68
        echo call_user_func_array($this->env->getFunction('pageJson')->getCallable(), array((isset($context["page_title"]) ? $context["page_title"] : null), (isset($context["page_description"]) ? $context["page_description"] : null), (isset($context["content"]) ? $context["content"] : null), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "template_name"), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id"), (isset($context["preview_image_full"]) ? $context["preview_image_full"] : null), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink"), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path")));
        echo "
";
    }

    public function getTemplateName()
    {
        return "page.json";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 68,  156 => 67,  152 => 64,  148 => 62,  145 => 61,  142 => 60,  138 => 57,  135 => 56,  131 => 53,  128 => 52,  125 => 51,  122 => 50,  119 => 49,  117 => 48,  114 => 47,  111 => 46,  105 => 43,  102 => 42,  99 => 40,  96 => 39,  93 => 37,  90 => 36,  87 => 35,  82 => 34,  79 => 33,  76 => 32,  73 => 30,  70 => 29,  67 => 27,  65 => 26,  62 => 24,  60 => 23,  58 => 22,  55 => 20,  53 => 19,  50 => 17,  46 => 16,  42 => 15,  39 => 13,  37 => 12,  35 => 11,  33 => 10,  31 => 9,  29 => 8,  26 => 6,  24 => 5,  21 => 2,  19 => 1,);
    }
}
