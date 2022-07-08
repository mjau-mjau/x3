<?php

/* partials/file.html */
class __TwigTemplate_db49246ef100488bf387c704be915976dc53fe33439588b93ef0ac7e41b020dc extends Twig_Template
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
        $context["image_page"] = call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('setpath')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink"), (isset($context["rootpath"]) ? $context["rootpath"] : null))), "html"));
        // line 4
        $context["preview_image_url"] = ((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, (isset($context["preview_image"]) ? $context["preview_image"] : null), ".")));
        // line 5
        $context["image_ratio"] = (($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "height") / $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "width")) * 100);
        // line 6
        $context["date"] = $this->getAttribute($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "exif"), "date_taken", array(), "array");
        // line 7
        echo "
";
        // line 9
        if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["parent_images"]) ? $context["parent_images"] : null))) > 1)) {
            // line 10
            echo "<div class=\"pagenav pagenav-static\">

\t";
            // line 13
            echo "\t";
            if ((isset($context["prev_image"]) ? $context["prev_image"] : null)) {
                // line 14
                echo "\t\t";
                $context["url"] = (("../" . call_user_func_array($this->env->getFunction('getSibling')->getCallable(), array(call_user_func_array($this->env->getFilter('removeExtension')->getCallable(), array($this->getAttribute((isset($context["prev_image"]) ? $context["prev_image"] : null), "file_name")))))) . "/");
                // line 15
                echo "\t\t<a href=\"";
                echo (isset($context["url"]) ? $context["url"] : null);
                echo "\" class=\"pagenav-link pagenav-prev\"><span class=\"pagenav-text\">";
                echo (($this->getAttribute((isset($context["prev_image"]) ? $context["prev_image"] : null), "title", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["prev_image"]) ? $context["prev_image"] : null), "title"), $this->getAttribute((isset($context["prev_image"]) ? $context["prev_image"] : null), "name")))) : ($this->getAttribute((isset($context["prev_image"]) ? $context["prev_image"] : null), "name")));
                echo "</span></a>
\t";
            }
            // line 17
            echo "
\t";
            // line 19
            echo "\t";
            if ((isset($context["next_image"]) ? $context["next_image"] : null)) {
                // line 20
                echo "\t\t";
                $context["url"] = (("../" . call_user_func_array($this->env->getFunction('getSibling')->getCallable(), array(call_user_func_array($this->env->getFilter('removeExtension')->getCallable(), array($this->getAttribute((isset($context["next_image"]) ? $context["next_image"] : null), "file_name")))))) . "/");
                // line 21
                echo "\t\t<a href=\"";
                echo (isset($context["url"]) ? $context["url"] : null);
                echo "\" class=\"pagenav-link pagenav-next\"><span class=\"pagenav-text\">";
                echo (($this->getAttribute((isset($context["next_image"]) ? $context["next_image"] : null), "title", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["next_image"]) ? $context["next_image"] : null), "title"), $this->getAttribute((isset($context["next_image"]) ? $context["next_image"] : null), "name")))) : ($this->getAttribute((isset($context["next_image"]) ? $context["next_image"] : null), "name")));
                echo "</span></a>
\t";
            }
            // line 23
            echo "</div>
";
        }
        // line 25
        echo "
";
        // line 27
        $context["fotomoto"] = "";
        // line 28
        $context["fotomoto_collection"] = "";
        // line 29
        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "plugins"), "fotomoto"), "enabled") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "plugins"), "fotomoto"), "store_id")) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "plugins"), "fotomoto"), "enabled_page"))) {
            // line 30
            echo "\t";
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "plugins"), "fotomoto"), "buy_button")) {
                // line 31
                echo "\t\t";
                $context["fotomoto"] = " file-fotomoto file-fotomoto-buybutton";
                // line 32
                echo "\t";
            } else {
                // line 33
                echo "\t\t";
                $context["fotomoto"] = " file-fotomoto";
                // line 34
                echo "\t";
            }
            // line 35
            echo "\t";
            if (call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "plugins"), "fotomoto"), "collection")))) {
                // line 36
                echo "\t\t";
                $context["fotomoto_collection"] = ((" data-fotomoto-collection=\"" . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "plugins"), "fotomoto"), "collection")))) . "\"");
                // line 37
                echo "\t";
            }
        }
        // line 39
        echo "
";
        // line 41
        $context["data_exif"] = "";
        // line 42
        $context["meta"] = "";
        // line 43
        $context["data_geo"] = "";
        // line 44
        if ($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "exif")) {
            // line 45
            echo "
\t";
            // line 47
            echo "\t";
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "popup"), "caption"), "exif")) {
                // line 48
                echo "\t\t";
                $context["exif_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "popup"), "caption"), "exif_items"), ","));
                // line 49
                echo "\t\t";
                if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["exif_items"]) ? $context["exif_items"] : null))) > 0)) {
                    // line 50
                    echo "
\t\t\t";
                    // line 56
                    echo "
\t\t\t";
                    // line 57
                    $context["exif_array"] = array();
                    // line 58
                    echo "\t\t\t";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["exif_items"]) ? $context["exif_items"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["key"]) {
                        if ($this->getAttribute($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "exif"), (isset($context["key"]) ? $context["key"] : null), array(), "array")) {
                            // line 59
                            echo "\t\t    ";
                            $context["exif_array"] = call_user_func_array($this->env->getFilter('merge')->getCallable(), array((isset($context["exif_array"]) ? $context["exif_array"] : null), array((isset($context["key"]) ? $context["key"] : null) => $this->getAttribute($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "exif"), (isset($context["key"]) ? $context["key"] : null), array(), "array"))));
                            // line 60
                            echo "\t\t    ";
                            $context["meta"] = ((((((((isset($context["meta"]) ? $context["meta"] : null) . "<div class=\"row file-exif-") . (isset($context["key"]) ? $context["key"] : null)) . "\"><div class=\"small-6 columns file-exif-key\"><span>") . call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('title')->getCallable(), array($this->env, (isset($context["key"]) ? $context["key"] : null))), array("_" => " ")))) . "</span></div><div class=\"small-6 columns file-exif-value styled\">") . $this->getAttribute($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "exif"), (isset($context["key"]) ? $context["key"] : null), array(), "array")) . "</div></div>");
                            // line 61
                            echo "\t\t\t";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['key'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 62
                    echo "\t\t\t";
                    if (call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["exif_array"]) ? $context["exif_array"] : null)))) {
                        $context["data_exif"] = ((" data-exif=\"" . call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('json_encode')->getCallable(), array((isset($context["exif_array"]) ? $context["exif_array"] : null))), "html_attr"))) . "\"");
                    }
                    // line 63
                    echo "
\t\t";
                }
                // line 65
                echo "\t";
            }
            // line 66
            echo "
\t";
            // line 68
            echo "\t";
            if (($this->getAttribute($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "exif"), "latitude") && $this->getAttribute($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "exif"), "longitude"))) {
                // line 69
                echo "\t\t";
                $context["geo"] = (($this->getAttribute($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "exif"), "latitude") . ",") . $this->getAttribute($this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "exif"), "longitude"));
                // line 70
                echo "\t\t";
                $context["map_embed_src"] = (("https://www.google.com/maps/embed/v1/place?q=" . (isset($context["geo"]) ? $context["geo"] : null)) . "&amp;key=AIzaSyDRp6xla9SxUmTBu6l_kprhjjI9e5-EVZk");
                // line 71
                echo "\t\t";
                $context["map_link_src"] = ("https://www.google.com/maps/search/?api=1&query=" . (isset($context["geo"]) ? $context["geo"] : null));
                // line 72
                echo "\t\t";
                // line 73
                echo "\t\t";
                $context["map_embed_button_item"] = (((("<button data-href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"button small button-map\" data-lang=\"map\"></button>");
                // line 74
                echo "\t\t";
                $context["map_button_popup"] = (((("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"button small button-map\" target=\"_blank\" data-lang=\"map\"></a>");
                // line 75
                echo "\t\t";
                $context["map_link_popup"] = (((("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"link-map\" target=\"_blank\" data-lang=\"map\"></a>");
                // line 76
                echo "\t\t";
                $context["map_button"] = (("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" class=\"button small button-map\" target=\"_blank\" data-lang=\"map\"></a>");
                // line 77
                echo "\t\t";
                $context["map_link"] = (("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" class=\"link-map\" target=\"_blank\" data-lang=\"map\"></a>");
                // line 78
                echo "\t\t";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "popup"), "caption"), "map")) {
                    $context["data_geo"] = ((" data-geo=\"" . (isset($context["geo"]) ? $context["geo"] : null)) . "\"");
                }
                // line 79
                echo "\t";
            }
        }
        // line 81
        echo "
";
        // line 83
        if ((isset($context["geo"]) ? $context["geo"] : null)) {
            // line 84
            echo "\t";
            $context["page_title"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["page_title"]) ? $context["page_title"] : null), array("{latitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude"), "{longitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"), "{map_embed_src}" => (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null), "{map_link_src}" => (isset($context["map_link_src"]) ? $context["map_link_src"] : null), "{map_button_popup}" => (isset($context["map_button_popup"]) ? $context["map_button_popup"] : null), "{map_link_popup}" => (isset($context["map_link_popup"]) ? $context["map_link_popup"] : null), "{map_button}" => (isset($context["map_button"]) ? $context["map_button"] : null), "{map_link}" => (isset($context["map_link"]) ? $context["map_link"] : null))));
            // line 85
            echo "\t";
            if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null))))) {
                // line 86
                echo "\t\t";
                $context["image_description"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null), array("{latitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude"), "{longitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"), "{map_embed_src}" => (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null), "{map_link_src}" => (isset($context["map_link_src"]) ? $context["map_link_src"] : null), "{map_button_popup}" => (isset($context["map_button_popup"]) ? $context["map_button_popup"] : null), "{map_link_popup}" => (isset($context["map_link_popup"]) ? $context["map_link_popup"] : null), "{map_button}" => (isset($context["map_button"]) ? $context["map_button"] : null), "{map_link}" => (isset($context["map_link"]) ? $context["map_link"] : null))));
                // line 87
                echo "\t";
            }
        }
        // line 89
        echo "
";
        // line 91
        echo "<div class=\"module row file gallery";
        echo (isset($context["fotomoto"]) ? $context["fotomoto"] : null);
        echo "\"";
        echo (isset($context["fotomoto_collection"]) ? $context["fotomoto_collection"] : null);
        echo ">
  <div data-options=\"caption:\" class=\"images clearfix context small-12 medium-10 large-8 small-centered columns narrower text-center frame";
        // line 92
        if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "popup"), "enabled") == true)) {
            echo " x3-hover-icon-primary";
        }
        echo "\">

  ";
        // line 95
        echo "
  <h1 class=\"title\">";
        // line 96
        echo (isset($context["page_title"]) ? $context["page_title"] : null);
        echo "</h1>
  ";
        // line 97
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null))))) {
            echo "<h2 class=\"subheader\">";
            echo (isset($context["image_description"]) ? $context["image_description"] : null);
            echo "</h2>";
        }
        // line 98
        echo "  ";
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["date"]) ? $context["date"] : null))))) {
            echo "<h6 class=\"date\"><time itemprop=\"dateCreated\" datetime=\"";
            echo call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"));
            echo "\">";
            echo call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "d F Y"));
            echo "</time></h6>";
        }
        // line 99
        echo "
  ";
        // line 101
        echo "\t<a href=\"";
        echo call_user_func_array($this->env->getFilter('setpath')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "permalink"), array(" " => "_"))))), (isset($context["rootpath"]) ? $context["rootpath"] : null)));
        echo "\" class=\"file-back\"></a>

\t";
        // line 104
        echo "\t<div class=\"gallery\">
\t\t<a class=\"item img-link item-link";
        // line 105
        if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "popup"), "enabled") == true)) {
            echo " x3-popup";
        }
        echo "\"";
        echo (isset($context["data_exif"]) ? $context["data_exif"] : null);
        echo (isset($context["data_geo"]) ? $context["data_geo"] : null);
        echo " id=\"image-";
        echo call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('attribute_friendly')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slug"))), "1"));
        echo "\" data-width=\"";
        echo $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "width");
        echo "\" data-height=\"";
        echo $this->getAttribute((isset($context["myimage"]) ? $context["myimage"] : null), "height");
        echo "\" href=\"";
        echo (isset($context["image_page"]) ? $context["image_page"] : null);
        echo "\" data-image=\"";
        echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_image_url"]) ? $context["preview_image_url"] : null)));
        echo "\" data-title=\"";
        echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html"));
        echo "\" data-description=\"";
        echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["image_description"]) ? $context["image_description"] : null), "html"));
        echo "\" data-date=\"";
        echo call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "d F Y"));
        echo "\">
\t\t\t<figure>
\t\t\t\t<div class=\"image-container\" style=\"padding-bottom:";
        // line 107
        echo (isset($context["image_ratio"]) ? $context["image_ratio"] : null);
        echo "%;\">
\t\t\t\t\t<img data-src=\"";
        // line 108
        echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_image_url"]) ? $context["preview_image_url"] : null)));
        echo "\" alt=\"";
        echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('striptags')->getCallable(), array($this->env, (isset($context["page_title"]) ? $context["page_title"] : null)))));
        echo "\">
\t\t\t\t</div>
\t\t\t</figure>
\t\t</a>
\t</div>

\t";
        // line 115
        echo "\t";
        if ((isset($context["meta"]) ? $context["meta"] : null)) {
            echo "<div class=\"file-exif\">";
            echo (isset($context["meta"]) ? $context["meta"] : null);
            echo "</div>";
        }
        // line 116
        echo "
\t";
        // line 118
        echo "\t";
        if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "disqus_shortname") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plugins"), "disqus"), "image"))) {
            // line 119
            echo "\t\t<hr>
\t\t";
            // line 120
            $this->env->loadTemplate("partials/module.disqus.html")->display($context);
            // line 121
            echo "\t";
        }
        // line 122
        echo "
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "partials/file.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  342 => 122,  339 => 121,  337 => 120,  334 => 119,  331 => 118,  328 => 116,  321 => 115,  310 => 108,  306 => 107,  280 => 105,  277 => 104,  271 => 101,  268 => 99,  259 => 98,  253 => 97,  249 => 96,  246 => 95,  239 => 92,  232 => 91,  225 => 87,  222 => 86,  214 => 83,  211 => 81,  207 => 79,  202 => 78,  185 => 72,  182 => 71,  179 => 70,  176 => 69,  173 => 68,  170 => 66,  163 => 63,  158 => 62,  151 => 61,  148 => 60,  145 => 59,  139 => 58,  137 => 57,  134 => 56,  131 => 50,  128 => 49,  125 => 48,  122 => 47,  119 => 45,  117 => 44,  115 => 43,  113 => 42,  111 => 41,  104 => 37,  101 => 36,  98 => 35,  95 => 34,  92 => 33,  89 => 32,  86 => 31,  83 => 30,  79 => 28,  77 => 27,  74 => 25,  59 => 20,  56 => 19,  45 => 15,  30 => 7,  28 => 6,  22 => 3,  244 => 90,  237 => 89,  233 => 86,  229 => 89,  226 => 83,  223 => 82,  219 => 85,  216 => 84,  213 => 76,  199 => 77,  196 => 76,  193 => 75,  190 => 74,  187 => 73,  184 => 68,  177 => 67,  175 => 66,  172 => 64,  169 => 63,  167 => 65,  165 => 61,  162 => 59,  159 => 58,  156 => 57,  153 => 56,  150 => 55,  147 => 53,  144 => 52,  141 => 50,  138 => 49,  135 => 48,  132 => 47,  129 => 46,  126 => 44,  108 => 39,  105 => 41,  102 => 40,  99 => 39,  96 => 38,  93 => 37,  90 => 36,  87 => 35,  84 => 33,  81 => 29,  78 => 31,  73 => 30,  70 => 23,  67 => 27,  65 => 26,  62 => 21,  60 => 23,  58 => 22,  55 => 20,  53 => 17,  50 => 17,  46 => 16,  42 => 14,  39 => 13,  37 => 12,  35 => 10,  33 => 9,  31 => 9,  29 => 8,  26 => 5,  24 => 4,  21 => 2,  19 => 1,);
    }
}
