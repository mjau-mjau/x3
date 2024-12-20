<?php

/* page.html */
class __TwigTemplate_cc29202264ab201d0d43a63882c31b1c06ae7e7992a5c371c52f885633d0acfa extends Twig_Template
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
        echo "<!DOCTYPE html>
<!-- X3 website by www.photo.gallery -->
";
        // line 3
        ob_start();
        // line 4
        echo "
";
        // line 6
        $context["baseurl"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "base_url");
        // line 7
        echo "
";
        // line 9
        $context["absolutepath"] = call_user_func_array($this->env->getFilter('addprotocol')->getCallable(), array((isset($context["baseurl"]) ? $context["baseurl"] : null)));
        // line 10
        $context["rootpath"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["baseurl"]) ? $context["baseurl"] : null), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "domain_name") => "")));
        // line 11
        $context["assetspath"] = call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_files"), "/")), (isset($context["rootpath"]) ? $context["rootpath"] : null)));
        // line 12
        $context["absolutepath_page"] = call_user_func_array($this->env->getFilter('setpath')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink"), (isset($context["absolutepath"]) ? $context["absolutepath"] : null)));
        // line 13
        $context["rootpath_page"] = call_user_func_array($this->env->getFilter('setpath')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink"), (isset($context["rootpath"]) ? $context["rootpath"] : null)));
        // line 14
        echo "
";
        // line 16
        ob_start();
        $this->env->loadTemplate("partials/preview-image.html")->display($context);
        $context["preview_image"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 17
        if (call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["preview_image"]) ? $context["preview_image"] : null)))) {
            $context["preview_image"] = call_user_func_array($this->env->getFunction('get_default_preview_image')->getCallable(), array());
        }
        // line 18
        echo "
";
        // line 20
        $context["preview_image_full"] = (call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_files"), "/")), (isset($context["absolutepath"]) ? $context["absolutepath"] : null))) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, (isset($context["preview_image"]) ? $context["preview_image"] : null), ".")));
        // line 21
        echo "
";
        // line 23
        $context["local_public"] = ((isset($context["rootpath"]) ? $context["rootpath"] : null) . "/app/public");
        // line 24
        $context["local_js"] = ((((isset($context["local_public"]) ? $context["local_public"] : null) . "/js/") . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "x3_version")) . "/x3.min.js");
        // line 25
        $context["local_css"] = ((((((isset($context["local_public"]) ? $context["local_public"] : null) . "/css/") . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "x3_version")) . "/x3.skin.") . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "skin"), "skin")) . ".css");
        // line 26
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            // line 27
            echo "\t";
            $context["core_js"] = (("https://cdn.jsdelivr.net/npm/x3.photo.gallery@" . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "x3_version")) . "/js/x3.min.js");
            // line 28
            echo "\t";
            $context["core_css"] = (((("https://cdn.jsdelivr.net/npm/x3.photo.gallery@" . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "x3_version")) . "/css/x3.skin.") . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "skin"), "skin")) . ".css");
        } else {
            // line 30
            echo "\t";
            $context["core_js"] = (isset($context["local_js"]) ? $context["local_js"] : null);
            // line 31
            echo "\t";
            $context["core_css"] = (isset($context["local_css"]) ? $context["local_css"] : null);
        }
        // line 33
        echo "
";
        // line 35
        $context["page_title"] = "";
        // line 36
        $context["page_description"] = "";
        // line 37
        echo "
";
        // line 39
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "template_name") == "file")) {
            // line 40
            echo "
\t";
            // line 42
            echo "\t";
            $context["myimage"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path");
            // line 43
            echo "
\t";
            // line 45
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "image_extended")) {
                // line 46
                echo "\t\t";
                $context["dirname"] = call_user_func_array($this->env->getFilter('dirname')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink")));
                // line 47
                echo "\t\t";
                if ((((isset($context["dirname"]) ? $context["dirname"] : null) == ".") || call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["dirname"]) ? $context["dirname"] : null))))) {
                    $context["dirname"] = "/";
                }
                // line 48
                echo "\t\t";
                $context["parent"] = call_user_func_array($this->env->getFunction('get')->getCallable(), array((isset($context["dirname"]) ? $context["dirname"] : null)));
                // line 49
                echo "\t";
            }
            // line 50
            echo "
\t";
            // line 52
            echo "\t";
            $context["settings"] = ((array_key_exists("parent", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["parent"]) ? $context["parent"] : null), (isset($context["page"]) ? $context["page"] : null)))) : ((isset($context["page"]) ? $context["page"] : null)));
            // line 53
            echo "
\t";
            // line 55
            echo "\t";
            if ($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "link")) {
                // line 56
                echo "\t\t";
                echo call_user_func_array($this->env->getFunction('redirect')->getCallable(), array($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "link")));
                echo "

\t";
                // line 59
                echo "\t";
            } else {
                // line 60
                echo "
\t\t";
                // line 61
                $context["folder_path"] = (((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('dirname')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path"))), "."))) . "/");
                // line 62
                echo "\t\t";
                $context["page_title"] = call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array($this->env, call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "title"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "gallery"), "image"), "title"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "gallery"), "image"), "title_include"), $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "name"))), "<a><span><em><i><b><strong><small><s><mark>")), array("{file_name}" => call_user_func_array($this->env->getFilter('removeExtension')->getCallable(), array($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name"))), "{file_name_ext}" => $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name"))))), $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "name")));
                // line 63
                echo "\t\t";
                $context["image_description"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array($this->env, call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "description"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "gallery"), "image"), "description"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "gallery"), "image"), "description_include"), $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "name"))), "<a><span><em><i><b><strong><small><s><br><mark><img><kbd><code><button>")), array("{file_name}" => call_user_func_array($this->env->getFilter('removeExtension')->getCallable(), array($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name"))), "{file_name_ext}" => $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "file_name")))));
                // line 64
                echo "\t\t";
                $context["page_description"] = ((array_key_exists("image_description", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null), (((isset($context["page_title"]) ? $context["page_title"] : null) . " | ") . $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "title"))))) : ((((isset($context["page_title"]) ? $context["page_title"] : null) . " | ") . $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "title"))));
                // line 65
                echo "\t";
            }
            // line 66
            echo "

\t";
            // line 69
            echo "\t";
            $context["template"] = "partials/file.html";
        } else {
            // line 72
            echo "\t";
            $context["page_title"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title");
            // line 73
            echo "\t";
            $context["page_description"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "description");
            // line 74
            echo "\t";
            $context["template"] = "partials/content.html";
        }
        // line 76
        echo "
";
        // line 78
        $this->env->loadTemplate("partials/head.html")->display($context);
        // line 79
        $template = $this->env->resolveTemplate((isset($context["template"]) ? $context["template"] : null));
        $template->display($context);
        // line 80
        $this->env->loadTemplate("partials/footer.html")->display($context);
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 82
        echo "
<!-- X3 website by www.photo.gallery -->
";
    }

    public function getTemplateName()
    {
        return "page.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  189 => 82,  186 => 80,  183 => 79,  181 => 78,  178 => 76,  174 => 74,  171 => 73,  168 => 72,  164 => 69,  160 => 66,  157 => 65,  154 => 64,  151 => 63,  148 => 62,  146 => 61,  143 => 60,  140 => 59,  134 => 56,  131 => 55,  128 => 53,  125 => 52,  122 => 50,  119 => 49,  116 => 48,  111 => 47,  108 => 46,  105 => 45,  102 => 43,  99 => 42,  96 => 40,  94 => 39,  91 => 37,  89 => 36,  87 => 35,  84 => 33,  80 => 31,  77 => 30,  73 => 28,  70 => 27,  68 => 26,  66 => 25,  64 => 24,  62 => 23,  59 => 21,  57 => 20,  54 => 18,  50 => 17,  46 => 16,  43 => 14,  41 => 13,  39 => 12,  37 => 11,  35 => 10,  33 => 9,  30 => 7,  28 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
