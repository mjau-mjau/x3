<?php

/* partials/module.context.html */
class __TwigTemplate_c9b7c9246efd0e1b2925f0d5be07a7ddbaf8ee655b71bbcd734853652002757c extends Twig_Template
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
        echo "
";
        // line 5
        $context["p"] = (isset($context["page"]) ? $context["page"] : null);
        // line 6
        $context["context"] = $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "context");
        // line 7
        $context["page_description"] = $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "description");
        // line 8
        $context["content"] = call_user_func_array($this->env->getFilter('escapecode')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('replace')->getCallable(), array(((((call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "include"), "content_prepend"))) . " ") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "content")) . " ") . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "include"), "content_append")))), array("{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"), "[contact]" => "<form data-abide class=\"contactform\"><div><input required type=\"text\" name=\"name\" placeholder=\"Name\"></div><div><input required type=\"email\" name=\"email\" placeholder=\"Email\"></div><div><textarea required rows=6 name=\"message\" placeholder=\"What&#39;s up?\"></textarea></div><button type=\"submit\">Send</button></form>")))))));
        // line 9
        echo "
";
        // line 11
        $context["date"] = (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "date", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "date"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "updated")))) : ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "updated")));
        // line 12
        if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "date_format") == "timeago")) {
            // line 13
            echo "\t";
            $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "d F Y"));
            // line 14
            echo "\t";
            $context["date_class"] = "date timeago";
        } else {
            // line 16
            echo "\t";
            $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format"), "d F Y"))) : ("d F Y"))));
            // line 17
            echo "\t";
            $context["date_class"] = "date";
        }
        // line 19
        $context["time_tag"] = (((((("<time itemprop=\"dateCreated\" datetime=\"" . call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"))) . "\" class=\"") . (isset($context["date_class"]) ? $context["date_class"] : null)) . "\">") . (isset($context["date_formatted"]) ? $context["date_formatted"] : null)) . "</time>");
        // line 20
        echo "
";
        // line 24
        $context["items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array(((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "plugins"), "breadcrumbs"), "enabled") && !twig_in_filter("breadcrumbs", $this->getAttribute((isset($context["context"]) ? $context["context"] : null), "items")))) ? (((twig_in_filter("description", $this->getAttribute((isset($context["context"]) ? $context["context"] : null), "items"))) ? (call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "items"), array("description" => "description,breadcrumbs")))) : (((twig_in_filter("title", $this->getAttribute((isset($context["context"]) ? $context["context"] : null), "items"))) ? (call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "items"), array("title" => "title,breadcrumbs")))) : (("breadcrumbs," . $this->getAttribute((isset($context["context"]) ? $context["context"] : null), "items"))))))) : ($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "items"))), ","));
        // line 26
        echo "
";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 29
            echo "
\t";
            // line 31
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                // line 32
                echo "\t<h1 class=\"title style-icon\"><span>";
                echo (isset($context["page_title"]) ? $context["page_title"] : null);
                echo "</span></h1>
\t";
            }
            // line 34
            echo "
\t";
            // line 36
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                // line 37
                echo "\t<h1 class=\"title\"><span>";
                echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "label");
                echo "</span></h1>
\t";
            }
            // line 39
            echo "
\t";
            // line 41
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "amount")) {
                // line 42
                echo "\t";
                $context["amount"] = call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null)));
                // line 43
                echo "\t";
                // line 44
                echo "\t<h6 class=\"amount amount-";
                echo (isset($context["amount"]) ? $context["amount"] : null);
                echo "\" data-lang=\"image";
                echo ((((isset($context["amount"]) ? $context["amount"] : null) == 1)) ? ("") : ("s"));
                echo "\">";
                echo (isset($context["amount"]) ? $context["amount"] : null);
                echo "</h6>
\t";
            }
            // line 46
            echo "
\t";
            // line 48
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "folders_amount")) {
                // line 49
                echo "\t";
                $context["folders_amount"] = $this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "children_count");
                // line 50
                echo "\t";
                // line 51
                echo "\t<h6 class=\"folder_amount folder-amount-";
                echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                echo "\" data-lang=\"folder";
                echo ((((isset($context["folders_amount"]) ? $context["folders_amount"] : null) == 1)) ? ("") : ("s"));
                echo "\">";
                echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                echo "</h6>
\t";
            }
            // line 53
            echo "
\t";
            // line 55
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                // line 56
                echo "\t<h6 class=\"date\">";
                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                echo "</h6>
\t";
            }
            // line 58
            echo "
\t";
            // line 60
            echo "\t";
            if ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["page_description"]) ? $context["page_description"] : null)))))) {
                // line 61
                echo "\t<h2 class=\"subheader\">";
                echo (isset($context["page_description"]) ? $context["page_description"] : null);
                echo "</h2>
\t";
            }
            // line 63
            echo "
\t";
            // line 65
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "preview")) {
                // line 66
                echo "
\t";
                // line 68
                echo "\t";
                if ($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "crop"), "enabled")) {
                    // line 69
                    echo "\t\t";
                    $context["crop_ratio"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "crop"), "crop"), 1, array(), "array") / $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "crop"), "crop"), 0, array(), "array")) * 100);
                    // line 70
                    echo "\t\t";
                    $context["data_crop"] = ((((" data-crop=\"" . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "crop"), "crop"), 0, array(), "array")) . ".") . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "crop"), "crop"), 1, array(), "array")) . "\"");
                    // line 71
                    echo "\t";
                }
                // line 72
                echo "
\t";
                // line 74
                echo "\t";
                $context["preview_image_url"] = ((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, (isset($context["preview_image"]) ? $context["preview_image"] : null), ".")));
                // line 75
                echo "
\t";
                // line 77
                echo "  ";
                if (((isset($context["preview_img"]) ? $context["preview_img"] : null) == "./app/public/images/default.png")) {
                    // line 78
                    echo "  \t";
                    $context["imgInfo"] = array(0 => 1280, 1 => 1280);
                    // line 79
                    echo "  \t";
                    $context["image_ratio"] = 100;
                    // line 80
                    echo "  ";
                } else {
                    // line 81
                    echo "\t\t";
                    $context["imgInfo"] = call_user_func_array($this->env->getFunction('getimginfo')->getCallable(), array((isset($context["preview_image"]) ? $context["preview_image"] : null)));
                    // line 82
                    echo "\t\t";
                    $context["image_ratio"] = ((array_key_exists("crop_ratio", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["crop_ratio"]) ? $context["crop_ratio"] : null), (($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array") / $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array")) * 100)))) : ((($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array") / $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array")) * 100)));
                    // line 83
                    echo "  ";
                }
                // line 84
                echo "
\t";
                // line 86
                echo "\t<div class=\"preview-image x-frame-medium-up images\">
\t\t<a class=\"img-link item-link item popup\" data-width=\"";
                // line 87
                echo $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array");
                echo "\" data-height=\"";
                echo $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array");
                echo "\" href=\".\" data-popup-href=\"";
                echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_image_url"]) ? $context["preview_image_url"] : null)));
                echo "\" data-image=\"";
                echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_image_url"]) ? $context["preview_image_url"] : null)));
                echo "\">
\t\t\t<figure>
\t\t\t\t<div class=\"image-container\" style=\"padding-bottom:";
                // line 89
                echo (isset($context["image_ratio"]) ? $context["image_ratio"] : null);
                echo "%;\">
\t\t\t\t\t<img data-src=\"";
                // line 90
                echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_image_url"]) ? $context["preview_image_url"] : null)));
                echo "\" data-width=\"";
                echo $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array");
                echo "\"";
                echo (isset($context["data_crop"]) ? $context["data_crop"] : null);
                echo " alt=\"\">
\t\t\t\t</div>

\t\t\t";
                // line 94
                echo "\t\t\t";
                if ($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "caption"), "enabled")) {
                    // line 95
                    echo "        <figcaption>

        \t";
                    // line 98
                    echo "\t\t\t\t\t";
                    $context["caption_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "caption"), "items"), ","));
                    // line 99
                    echo "
        \t";
                    // line 101
                    echo "        \t";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["caption_items"]) ? $context["caption_items"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 102
                        echo "
        \t\t";
                        // line 104
                        echo "        \t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                            // line 105
                            echo "        \t\t<span class=\"title\">";
                            echo call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["page_title"]) ? $context["page_title"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                            echo "</span>
        \t\t";
                        }
                        // line 107
                        echo "
        \t\t";
                        // line 109
                        echo "        \t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                            // line 110
                            echo "        \t\t<span class=\"title\">";
                            echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "label");
                            echo "</span>
        \t\t";
                        }
                        // line 112
                        echo "
        \t\t";
                        // line 114
                        echo "        \t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "amount")) {
                            // line 115
                            echo "\t\t\t\t\t\t";
                            $context["amount"] = call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null)));
                            // line 116
                            echo "        \t\t";
                            // line 117
                            echo "        \t\t<span class=\"amount amount-";
                            echo (isset($context["amount"]) ? $context["amount"] : null);
                            echo "\" data-lang=\"image";
                            echo ((((isset($context["amount"]) ? $context["amount"] : null) == 1)) ? ("") : ("s"));
                            echo "\">";
                            echo (isset($context["amount"]) ? $context["amount"] : null);
                            echo "</span>
        \t\t";
                        }
                        // line 119
                        echo "
        \t\t";
                        // line 121
                        echo "        \t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "folders_amount")) {
                            // line 122
                            echo "        \t\t";
                            $context["folders_amount"] = $this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "children_count");
                            // line 123
                            echo "        \t\t";
                            // line 124
                            echo "        \t\t<span class=\"folder_amount folder-amount-";
                            echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                            echo "\" data-lang=\"folder";
                            echo ((((isset($context["folders_amount"]) ? $context["folders_amount"] : null) == 1)) ? ("") : ("s"));
                            echo "\">";
                            echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                            echo "</span>
        \t\t";
                        }
                        // line 126
                        echo "
        \t\t";
                        // line 128
                        echo "        \t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                            // line 129
                            echo "\t\t\t\t\t\t\t";
                            echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                            echo "
        \t\t";
                        }
                        // line 131
                        echo "
        \t\t";
                        // line 133
                        echo "        \t\t";
                        if ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["page_description"]) ? $context["page_description"] : null)))))) {
                            // line 134
                            echo "        \t\t\t<span class=\"description\">";
                            echo call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["page_description"]) ? $context["page_description"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                            echo "</span>
        \t\t";
                        }
                        // line 136
                        echo "
        \t\t";
                        // line 138
                        echo "        \t\t";
                        if ((((isset($context["item"]) ? $context["item"] : null) == "content") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["content"]) ? $context["content"] : null)))))) {
                            // line 139
                            echo "        \t\t\t<span class=\"content\">";
                            echo (isset($context["content"]) ? $context["content"] : null);
                            echo "</span>
        \t\t";
                        }
                        // line 141
                        echo "
        \t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 143
                    echo "        </figcaption>
      ";
                }
                // line 145
                echo "
\t\t\t</figure>
\t\t</a>
\t</div>
\t";
            }
            // line 150
            echo "
\t";
            // line 152
            echo "\t";
            if ((((isset($context["item"]) ? $context["item"] : null) == "breadcrumbs") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "plugins"), "breadcrumbs"), "enabled"))) {
                // line 153
                echo "\t\t<div class=\"x3-breadcrumbs x3-breadcrumbs-primary\"></div>
\t";
            }
            // line 155
            echo "
\t";
            // line 157
            echo "\t";
            if ((((isset($context["item"]) ? $context["item"] : null) == "content") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["content"]) ? $context["content"] : null)))))) {
                // line 158
                echo "\t\t";
                // line 160
                echo "\t\t<div class=\"content\">";
                echo (isset($context["content"]) ? $context["content"] : null);
                echo "</div>
\t";
            }
            // line 162
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "partials/module.context.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  402 => 162,  396 => 160,  394 => 158,  391 => 157,  388 => 155,  384 => 153,  381 => 152,  378 => 150,  371 => 145,  367 => 143,  360 => 141,  354 => 139,  351 => 138,  348 => 136,  342 => 134,  339 => 133,  336 => 131,  330 => 129,  327 => 128,  324 => 126,  314 => 124,  312 => 123,  309 => 122,  306 => 121,  303 => 119,  293 => 117,  291 => 116,  288 => 115,  285 => 114,  282 => 112,  276 => 110,  273 => 109,  270 => 107,  264 => 105,  261 => 104,  258 => 102,  253 => 101,  250 => 99,  247 => 98,  243 => 95,  240 => 94,  230 => 90,  226 => 89,  215 => 87,  212 => 86,  209 => 84,  206 => 83,  203 => 82,  200 => 81,  197 => 80,  194 => 79,  191 => 78,  188 => 77,  185 => 75,  182 => 74,  179 => 72,  176 => 71,  173 => 70,  161 => 65,  158 => 63,  149 => 60,  146 => 58,  140 => 56,  137 => 55,  134 => 53,  124 => 51,  122 => 50,  119 => 49,  116 => 48,  113 => 46,  103 => 44,  92 => 39,  83 => 36,  80 => 34,  59 => 24,  54 => 19,  47 => 16,  36 => 11,  27 => 6,  25 => 5,  174 => 69,  170 => 69,  167 => 68,  164 => 66,  157 => 62,  154 => 60,  152 => 61,  120 => 58,  117 => 56,  114 => 50,  110 => 48,  99 => 43,  96 => 42,  94 => 41,  86 => 37,  84 => 36,  81 => 34,  77 => 32,  73 => 30,  68 => 29,  60 => 23,  56 => 20,  52 => 19,  46 => 16,  43 => 14,  39 => 12,  31 => 8,  29 => 7,  24 => 4,  22 => 3,  142 => 54,  139 => 52,  128 => 50,  125 => 49,  121 => 48,  118 => 47,  115 => 45,  111 => 44,  108 => 47,  105 => 45,  101 => 43,  98 => 42,  95 => 41,  91 => 39,  88 => 35,  85 => 33,  74 => 32,  71 => 31,  69 => 29,  66 => 27,  64 => 28,  61 => 26,  57 => 22,  53 => 20,  51 => 19,  48 => 17,  44 => 15,  35 => 10,  33 => 9,  30 => 7,  26 => 5,  23 => 4,  50 => 17,  45 => 6,  40 => 13,  38 => 12,  21 => 3,  19 => 1,);
    }
}
