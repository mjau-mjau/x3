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
        $context["content"] = call_user_func_array($this->env->getFilter('escapecode')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('replace')->getCallable(), array(((((call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "include"), "content_prepend"))) . " ") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "content")) . " ") . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "include"), "content_append")))), array("{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"), "[contact]" => "<form data-abide class=\"contactform\"><div><input required type=\"text\" name=\"name\" placeholder=\"Name\"></div><div><input required type=\"email\" name=\"email\" placeholder=\"Email\"></div><div><textarea required rows=6 name=\"message\" placeholder=\"What&#39;s up?\"></textarea></div><button type=\"submit\">Send</button></form>")))))));
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
        // line 23
        $context["items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "items"), ","));
        // line 24
        echo "
";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 27
            echo "
\t";
            // line 29
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                // line 30
                echo "\t<h1 class=\"title style-icon\"><span>";
                echo (isset($context["page_title"]) ? $context["page_title"] : null);
                echo "</span></h1>
\t";
            }
            // line 32
            echo "
\t";
            // line 34
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                // line 35
                echo "\t<h1 class=\"title\"><span>";
                echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "label");
                echo "</span></h1>
\t";
            }
            // line 37
            echo "
\t";
            // line 39
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "amount")) {
                // line 40
                echo "\t";
                $context["amount"] = call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null)));
                // line 41
                echo "\t";
                // line 42
                echo "\t<h6 class=\"amount amount-";
                echo (isset($context["amount"]) ? $context["amount"] : null);
                echo "\" data-lang=\"image";
                echo ((((isset($context["amount"]) ? $context["amount"] : null) == 1)) ? ("") : ("s"));
                echo "\">";
                echo (isset($context["amount"]) ? $context["amount"] : null);
                echo "</h6>
\t";
            }
            // line 44
            echo "
\t";
            // line 46
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "folders_amount")) {
                // line 47
                echo "\t";
                $context["folders_amount"] = $this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "children_count");
                // line 48
                echo "\t";
                // line 49
                echo "\t<h6 class=\"folder_amount folder-amount-";
                echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                echo "\" data-lang=\"folder";
                echo ((((isset($context["folders_amount"]) ? $context["folders_amount"] : null) == 1)) ? ("") : ("s"));
                echo "\">";
                echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                echo "</h6>
\t";
            }
            // line 51
            echo "
\t";
            // line 53
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                // line 54
                echo "\t<h6 class=\"date\">";
                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                echo "</h6>
\t";
            }
            // line 56
            echo "
\t";
            // line 58
            echo "\t";
            if ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["page_description"]) ? $context["page_description"] : null)))))) {
                // line 59
                echo "\t<h2 class=\"subheader\">";
                echo (isset($context["page_description"]) ? $context["page_description"] : null);
                echo "</h2>
\t";
            }
            // line 61
            echo "
\t";
            // line 63
            echo "\t";
            if (((isset($context["item"]) ? $context["item"] : null) == "preview")) {
                // line 64
                echo "
\t";
                // line 66
                echo "\t";
                if ($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "crop"), "enabled")) {
                    // line 67
                    echo "\t\t";
                    $context["crop_ratio"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "crop"), "crop"), 1, array(), "array") / $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "crop"), "crop"), 0, array(), "array")) * 100);
                    // line 68
                    echo "\t\t";
                    $context["data_crop"] = ((((" data-crop=\"" . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "crop"), "crop"), 0, array(), "array")) . ".") . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "crop"), "crop"), 1, array(), "array")) . "\"");
                    // line 69
                    echo "\t";
                }
                // line 70
                echo "
\t";
                // line 72
                echo "\t";
                $context["preview_image_url"] = ((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["preview_image"]) ? $context["preview_image"] : null), ".")));
                // line 73
                echo "
\t";
                // line 75
                echo "  ";
                if (((isset($context["preview_img"]) ? $context["preview_img"] : null) == "./app/public/images/default.png")) {
                    // line 76
                    echo "  \t";
                    $context["imgInfo"] = array(0 => 1280, 1 => 1280);
                    // line 77
                    echo "  \t";
                    $context["image_ratio"] = 100;
                    // line 78
                    echo "  ";
                } else {
                    // line 79
                    echo "\t\t";
                    $context["imgInfo"] = call_user_func_array($this->env->getFunction('getimginfo')->getCallable(), array((isset($context["preview_image"]) ? $context["preview_image"] : null)));
                    // line 80
                    echo "\t\t";
                    $context["image_ratio"] = ((array_key_exists("crop_ratio", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["crop_ratio"]) ? $context["crop_ratio"] : null), (($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array") / $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array")) * 100)))) : ((($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array") / $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array")) * 100)));
                    // line 81
                    echo "  ";
                }
                // line 82
                echo "
\t";
                // line 84
                echo "\t<div class=\"preview-image x-frame-medium-up images\">
\t\t<a class=\"img-link item-link item popup\" data-width=\"";
                // line 85
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
                // line 87
                echo (isset($context["image_ratio"]) ? $context["image_ratio"] : null);
                echo "%;\">
\t\t\t\t\t<img data-src=\"";
                // line 88
                echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_image_url"]) ? $context["preview_image_url"] : null)));
                echo "\" data-width=\"";
                echo $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array");
                echo "\"";
                echo (isset($context["data_crop"]) ? $context["data_crop"] : null);
                echo " alt=\"\">
\t\t\t\t</div>

\t\t\t";
                // line 92
                echo "\t\t\t";
                if ($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "caption"), "enabled")) {
                    // line 93
                    echo "        <figcaption>

        \t";
                    // line 96
                    echo "\t\t\t\t\t";
                    $context["caption_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "caption"), "items"), ","));
                    // line 97
                    echo "
        \t";
                    // line 99
                    echo "        \t";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["caption_items"]) ? $context["caption_items"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 100
                        echo "
        \t\t";
                        // line 102
                        echo "        \t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                            // line 103
                            echo "        \t\t<span class=\"title\">";
                            echo call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["page_title"]) ? $context["page_title"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                            echo "</span>
        \t\t";
                        }
                        // line 105
                        echo "
        \t\t";
                        // line 107
                        echo "        \t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                            // line 108
                            echo "        \t\t<span class=\"title\">";
                            echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "label");
                            echo "</span>
        \t\t";
                        }
                        // line 110
                        echo "
        \t\t";
                        // line 112
                        echo "        \t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "amount")) {
                            // line 113
                            echo "\t\t\t\t\t\t";
                            $context["amount"] = call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null)));
                            // line 114
                            echo "        \t\t";
                            // line 115
                            echo "        \t\t<span class=\"amount amount-";
                            echo (isset($context["amount"]) ? $context["amount"] : null);
                            echo "\" data-lang=\"image";
                            echo ((((isset($context["amount"]) ? $context["amount"] : null) == 1)) ? ("") : ("s"));
                            echo "\">";
                            echo (isset($context["amount"]) ? $context["amount"] : null);
                            echo "</span>
        \t\t";
                        }
                        // line 117
                        echo "
        \t\t";
                        // line 119
                        echo "        \t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "folders_amount")) {
                            // line 120
                            echo "        \t\t";
                            $context["folders_amount"] = $this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "children_count");
                            // line 121
                            echo "        \t\t";
                            // line 122
                            echo "        \t\t<span class=\"folder_amount folder-amount-";
                            echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                            echo "\" data-lang=\"folder";
                            echo ((((isset($context["folders_amount"]) ? $context["folders_amount"] : null) == 1)) ? ("") : ("s"));
                            echo "\">";
                            echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                            echo "</span>
        \t\t";
                        }
                        // line 124
                        echo "
        \t\t";
                        // line 126
                        echo "        \t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                            // line 127
                            echo "\t\t\t\t\t\t\t";
                            echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                            echo "
        \t\t";
                        }
                        // line 129
                        echo "
        \t\t";
                        // line 131
                        echo "        \t\t";
                        if ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["page_description"]) ? $context["page_description"] : null)))))) {
                            // line 132
                            echo "        \t\t\t<span class=\"description\">";
                            echo call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["page_description"]) ? $context["page_description"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                            echo "</span>
        \t\t";
                        }
                        // line 134
                        echo "
        \t\t";
                        // line 136
                        echo "        \t\t";
                        if ((((isset($context["item"]) ? $context["item"] : null) == "content") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["content"]) ? $context["content"] : null)))))) {
                            // line 137
                            echo "        \t\t\t<span class=\"content\">";
                            echo (isset($context["content"]) ? $context["content"] : null);
                            echo "</span>
        \t\t";
                        }
                        // line 139
                        echo "
        \t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 141
                    echo "        </figcaption>
      ";
                }
                // line 143
                echo "
\t\t\t</figure>
\t\t</a>
\t</div>
\t";
            }
            // line 148
            echo "
\t";
            // line 150
            echo "\t";
            if ((((isset($context["item"]) ? $context["item"] : null) == "content") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["content"]) ? $context["content"] : null)))))) {
                // line 151
                echo "\t\t";
                // line 153
                echo "\t\t<div class=\"content\">";
                echo (isset($context["content"]) ? $context["content"] : null);
                echo "</div>
\t";
            }
            // line 155
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
        return array (  392 => 155,  386 => 153,  384 => 151,  381 => 150,  378 => 148,  371 => 143,  367 => 141,  360 => 139,  354 => 137,  351 => 136,  348 => 134,  342 => 132,  339 => 131,  336 => 129,  330 => 127,  327 => 126,  324 => 124,  314 => 122,  312 => 121,  309 => 120,  306 => 119,  303 => 117,  293 => 115,  291 => 114,  288 => 113,  285 => 112,  282 => 110,  276 => 108,  273 => 107,  270 => 105,  264 => 103,  261 => 102,  258 => 100,  253 => 99,  250 => 97,  247 => 96,  243 => 93,  240 => 92,  230 => 88,  226 => 87,  215 => 85,  212 => 84,  209 => 82,  206 => 81,  203 => 80,  200 => 79,  197 => 78,  194 => 77,  191 => 76,  188 => 75,  185 => 73,  182 => 72,  179 => 70,  176 => 69,  173 => 68,  161 => 63,  158 => 61,  149 => 58,  146 => 56,  140 => 54,  137 => 53,  134 => 51,  124 => 49,  122 => 48,  119 => 47,  116 => 46,  113 => 44,  103 => 42,  92 => 37,  83 => 34,  80 => 32,  59 => 23,  54 => 19,  47 => 16,  36 => 11,  27 => 6,  25 => 5,  174 => 69,  170 => 67,  167 => 66,  164 => 64,  157 => 62,  154 => 60,  152 => 59,  120 => 58,  117 => 56,  114 => 50,  110 => 48,  99 => 43,  96 => 42,  94 => 41,  86 => 35,  84 => 36,  81 => 34,  77 => 32,  73 => 30,  68 => 27,  60 => 23,  56 => 20,  52 => 19,  46 => 16,  43 => 14,  39 => 12,  31 => 8,  29 => 7,  24 => 4,  22 => 3,  142 => 54,  139 => 52,  128 => 50,  125 => 49,  121 => 48,  118 => 47,  115 => 45,  111 => 44,  108 => 47,  105 => 45,  101 => 41,  98 => 40,  95 => 39,  91 => 39,  88 => 35,  85 => 33,  74 => 30,  71 => 29,  69 => 29,  66 => 27,  64 => 26,  61 => 24,  57 => 22,  53 => 20,  51 => 19,  48 => 17,  44 => 15,  35 => 10,  33 => 9,  30 => 7,  26 => 5,  23 => 4,  50 => 17,  45 => 6,  40 => 13,  38 => 12,  21 => 3,  19 => 1,);
    }
}
