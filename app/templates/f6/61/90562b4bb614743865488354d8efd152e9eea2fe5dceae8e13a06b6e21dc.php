<?php

/* partials/module.gallery.html */
class __TwigTemplate_f66190562b4bb614743865488354d8efd152e9eea2fe5dceae8e13a06b6e21dc extends Twig_Template
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
        // line 6
        $context["settings"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery");
        // line 7
        $context["items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "items"), ","));
        // line 8
        $context["limit"] = $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "limit");
        // line 9
        $context["folder_path"] = (((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "file_path"), "."))) . "/");
        // line 10
        if ((call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["limit"]) ? $context["limit"] : null))) || ((isset($context["limit"]) ? $context["limit"] : null) < 1))) {
            $context["limit"] = 99999;
        }
        // line 11
        $context["exif_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "popup"), "caption"), "exif_items"), ","));
        // line 12
        echo "
";
        // line 14
        if ((((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_videos"]) ? $context["gallery_videos"] : null))) > 0) && !twig_in_filter("hide-video", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes"))) && !twig_in_filter("video-bottom", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")))) {
            // line 15
            echo "\t";
            $this->env->loadTemplate("partials/module.video.html")->display($context);
            // line 16
            echo "\t";
            if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null))) > 0)) {
                // line 17
                echo "\t\t<hr>
\t";
            }
        }
        // line 20
        echo "
";
        // line 22
        $context["nofollow"] = (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "image_noindex")) ? (" rel=\"nofollow\"") : (""));
        // line 23
        echo "
";
        // line 25
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "enabled") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "justified")) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "columns"))) {
            // line 26
            echo "\t";
            $context["crop_ratio"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "crop"), 1, array(), "array") / $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "crop"), 0, array(), "array")) * 100);
            // line 27
            echo "\t";
            $context["data_crop"] = ((((" data-crop=\"" . call_user_func_array($this->env->getFilter('round')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "crop"), 0, array(), "array")))) . ":") . call_user_func_array($this->env->getFilter('round')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "crop"), 1, array(), "array")))) . "\"");
        }
        // line 29
        echo "
";
        // line 31
        $context["gallery_split_view"] = (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "enabled") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "justified")) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "columns"));
        // line 32
        if ((isset($context["gallery_split_view"]) ? $context["gallery_split_view"] : null)) {
            // line 33
            echo "\t";
            // line 34
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "invert")) {
                // line 35
                echo "\t\t";
                $context["push"] = ("medium-push-" . (12 - $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio")));
                // line 36
                echo "\t\t";
                $context["pull"] = ("medium-pull-" . $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio"));
                // line 37
                echo "\t";
            }
        }
        // line 39
        echo "
";
        // line 41
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") == "grid")) {
            // line 42
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "use_width")) {
                // line 43
                echo "\t\t";
                $context["block_grid"] = array(0 => "3", 1 => "2", 2 => "1");
                // line 44
                echo "\t";
            } else {
                // line 45
                echo "\t\t";
                $context["block_grid"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "columns"), ","));
                // line 46
                echo "\t";
            }
            // line 47
            echo "\t";
            $context["columns_limit"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array((isset($context["limit"]) ? $context["limit"] : null), call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null)))));
            // line 48
            echo "\t";
            $context["small_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"))), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "1")), (isset($context["columns_limit"]) ? $context["columns_limit"] : null)));
            // line 49
            echo "\t";
            $context["medium_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "2")), (isset($context["columns_limit"]) ? $context["columns_limit"] : null)));
            // line 50
            echo "\t";
            $context["large_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"), "3"))) : ("3")), (isset($context["columns_limit"]) ? $context["columns_limit"] : null)));
            // line 51
            echo "
\t";
            // line 52
            $context["ul_open"] = (((((("<ul class=\"small-block-grid-" . (isset($context["small_grid"]) ? $context["small_grid"] : null)) . " medium-block-grid-") . (isset($context["medium_grid"]) ? $context["medium_grid"] : null)) . " large-block-grid-") . (isset($context["large_grid"]) ? $context["large_grid"] : null)) . " items\">");
            // line 53
            echo "\t";
            $context["li_open"] = "<li>";
            // line 54
            echo "\t";
            $context["li_close"] = "</li>";
            // line 55
            echo "\t";
            $context["ul_close"] = "</ul>";
        }
        // line 57
        echo "
";
        // line 59
        echo (isset($context["ul_open"]) ? $context["ul_open"] : null);
        echo "

";
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["gallery_images"]) ? $context["gallery_images"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 63
            echo "
";
            // line 65
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") < (isset($context["limit"]) ? $context["limit"] : null))) {
                // line 66
                echo "
\t";
                // line 68
                echo "\t";
                $context["url"] = ((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array((($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "file_path") . "/") . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), ".")));
                // line 69
                echo "\t";
                $context["url_escaped"] = call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["url"]) ? $context["url"] : null)));
                // line 70
                echo "\t";
                $context["image_link"] = (($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "link", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "link"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link")))) : ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link")));
                // line 71
                echo "\t";
                $context["link_target"] = (($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "target", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "target"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link_target")))) : ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link_target")));
                // line 72
                echo "\t";
                $context["name_no_ext"] = call_user_func_array($this->env->getFilter('removeExtension')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")));
                // line 73
                echo "\t";
                $context["nofollow"] = "";
                // line 74
                echo "
\t";
                // line 76
                echo "\t";
                if ((isset($context["image_link"]) ? $context["image_link"] : null)) {
                    // line 77
                    echo "
\t\t";
                    // line 79
                    echo "\t\t";
                    if ((0 === substr_compare((isset($context["image_link"]) ? $context["image_link"] : null), ":nofollow", -strlen(":nofollow")))) {
                        // line 80
                        echo "\t\t\t";
                        $context["nofollow"] = " rel=\"nofollow\"";
                        // line 81
                        echo "\t\t\t";
                        $context["image_link"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["image_link"]) ? $context["image_link"] : null), array(":nofollow" => "")));
                        // line 82
                        echo "\t\t";
                    }
                    // line 83
                    echo "
\t\t";
                    // line 85
                    echo "\t\t";
                    $context["link_href"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["image_link"]) ? $context["image_link"] : null), array("{file_name}" => (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), "{file_name_ext}" => $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), "{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"))));
                    // line 86
                    echo "
\t\t";
                    // line 88
                    echo "\t\t";
                    if ((call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["link_target"]) ? $context["link_target"] : null))) || ((isset($context["link_target"]) ? $context["link_target"] : null) == "auto"))) {
                        // line 89
                        echo "\t\t\t";
                        if (((0 === strpos(call_user_func_array($this->env->getFilter('lower')->getCallable(), array($this->env, (isset($context["link_href"]) ? $context["link_href"] : null))), "http")) || call_user_func_array($this->env->getFunction('hasExtension')->getCallable(), array((isset($context["link_href"]) ? $context["link_href"] : null))))) {
                            // line 90
                            echo "\t\t\t\t";
                            $context["link_target"] = " target=\"_blank\"";
                            // line 91
                            echo "\t\t\t";
                        } else {
                            // line 92
                            echo "\t\t\t\t";
                            $context["link_target"] = "";
                            // line 93
                            echo "\t\t\t";
                        }
                        // line 94
                        echo "
\t\t";
                        // line 96
                        echo "\t\t";
                    } elseif (((isset($context["link_target"]) ? $context["link_target"] : null) == "popup")) {
                        // line 97
                        echo "\t\t\t";
                        $context["link_target"] = ((((((" data-popup-window=\"" . call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "name"), array(" " => "-")))) . ",") . $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "popup_width")) . ",") . $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "popup_height")) . "\"");
                        // line 98
                        echo "
\t\t";
                        // line 100
                        echo "\t\t";
                    } elseif (((isset($context["link_target"]) ? $context["link_target"] : null) == "_blank")) {
                        // line 101
                        echo "\t\t\t";
                        $context["link_target"] = " target=\"_blank\"";
                        // line 102
                        echo "
\t\t";
                        // line 104
                        echo "\t\t";
                    } elseif (((isset($context["link_target"]) ? $context["link_target"] : null) == "x3_popup")) {
                        // line 105
                        echo "\t\t\t";
                        $context["link_target"] = " data-popup";
                        // line 106
                        echo "
\t\t";
                        // line 108
                        echo "\t\t";
                    } else {
                        // line 109
                        echo "\t\t\t";
                        $context["link_target"] = "";
                        // line 110
                        echo "\t\t";
                    }
                    // line 111
                    echo "
\t";
                    // line 113
                    echo "\t";
                } else {
                    // line 114
                    echo "\t\t";
                    $context["link_href"] = ((call_user_func_array($this->env->getFilter('setpath')->getCallable(), array($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "permalink"), (isset($context["rootpath"]) ? $context["rootpath"] : null))) . call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), array(" " => "_")))) . "/");
                    // line 115
                    echo "\t\t";
                    $context["link_target"] = "";
                    // line 116
                    echo "\t";
                }
                // line 117
                echo "
\t";
                // line 119
                echo "\t";
                $context["exif_array"] = array();
                // line 120
                echo "\t";
                // line 121
                echo "\t";
                $context["data_exif"] = "";
                // line 122
                echo "\t";
                $context["geo"] = "";
                // line 123
                echo "\t";
                $context["data_geo"] = "";
                // line 124
                echo "
\t";
                // line 126
                echo "\t";
                if ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif")) {
                    // line 127
                    echo "
\t\t";
                    // line 129
                    echo "\t\t";
                    if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["exif_items"]) ? $context["exif_items"] : null))) > 0)) {
                        // line 130
                        echo "\t\t\t";
                        // line 133
                        echo "\t\t\t";
                        // line 134
                        echo "\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["exif_items"]) ? $context["exif_items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["key"]) {
                            if ($this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), (isset($context["key"]) ? $context["key"] : null), array(), "array")) {
                                // line 135
                                echo "\t\t    ";
                                $context["exif_array"] = call_user_func_array($this->env->getFilter('merge')->getCallable(), array((isset($context["exif_array"]) ? $context["exif_array"] : null), array((isset($context["key"]) ? $context["key"] : null) => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), (isset($context["key"]) ? $context["key"] : null), array(), "array"))));
                                // line 136
                                echo "\t\t\t";
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['key'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 137
                        echo "\t\t\t";
                        if (call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["exif_array"]) ? $context["exif_array"] : null)))) {
                            $context["data_exif"] = ((" data-exif=\"" . call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('json_encode')->getCallable(), array((isset($context["exif_array"]) ? $context["exif_array"] : null))), "html_attr"))) . "\"");
                        }
                        // line 138
                        echo "\t\t";
                    }
                    // line 139
                    echo "
\t\t";
                    // line 141
                    echo "\t\t";
                    if (($this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude") && $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"))) {
                        // line 142
                        echo "\t\t\t";
                        $context["geo"] = (($this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude") . ",") . $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"));
                        // line 143
                        echo "\t\t\t";
                        $context["map_embed_src"] = (("https://www.google.com/maps/embed/v1/place?q=" . (isset($context["geo"]) ? $context["geo"] : null)) . "&amp;key=AIzaSyDRp6xla9SxUmTBu6l_kprhjjI9e5-EVZk");
                        // line 144
                        echo "\t\t\t";
                        $context["map_link_src"] = ("https://www.google.com/maps/search/?api=1&query=" . (isset($context["geo"]) ? $context["geo"] : null));
                        // line 145
                        echo "\t\t\t";
                        $context["map_embed_button_item"] = (((("<button data-href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-popup-href=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"button small button-map\" data-popup-class=\"x3-popup-iframe-full\" data-popup></button>");
                        // line 146
                        echo "\t\t\t";
                        $context["map_button_popup"] = (((("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"button small button-map\" target=\"_blank\"></a>");
                        // line 147
                        echo "\t\t\t";
                        $context["map_link_popup"] = (((("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"link-map\" target=\"_blank\"></a>");
                        // line 148
                        echo "\t\t\t";
                        $context["map_button"] = (("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" class=\"button small button-map\" target=\"_blank\"></a>");
                        // line 149
                        echo "\t\t\t";
                        $context["map_link"] = (("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" class=\"link-map\" target=\"_blank\"></a>");
                        // line 150
                        echo "\t\t\t";
                        $context["data_geo"] = ((" data-geo=\"" . (isset($context["geo"]) ? $context["geo"] : null)) . "\"");
                        // line 151
                        echo "\t\t\t";
                        // line 154
                        echo "\t\t";
                    }
                    // line 155
                    echo "\t";
                }
                // line 156
                echo "
\t";
                // line 158
                echo "\t";
                $context["title"] = call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array(call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "title"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "title"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "title_include"))), "<a><span><em><i><b><strong><small><s><mark>")), array("{file_name}" => (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), "{file_name_ext}" => $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), "{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files")))), $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "name")));
                // line 159
                echo "\t";
                if ((isset($context["geo"]) ? $context["geo"] : null)) {
                    $context["title"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["title"]) ? $context["title"] : null), array("{latitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude"), "{longitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"), "{map_embed_src}" => (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null), "{map_link_src}" => (isset($context["map_link_src"]) ? $context["map_link_src"] : null), "{map_button_popup}" => (isset($context["map_button_popup"]) ? $context["map_button_popup"] : null), "{map_link_popup}" => (isset($context["map_link_popup"]) ? $context["map_link_popup"] : null), "{map_button}" => (isset($context["map_button"]) ? $context["map_button"] : null), "{map_link}" => (isset($context["map_link"]) ? $context["map_link"] : null))));
                }
                // line 160
                echo "\t";
                $context["title_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["title"]) ? $context["title"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                // line 161
                echo "
\t";
                // line 163
                echo "\t";
                $context["image_description"] = call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "description"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "description"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "description_include")));
                // line 164
                echo "\t";
                if (call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null)))) {
                    // line 165
                    echo "\t\t";
                    $context["description"] = "";
                    // line 166
                    echo "\t\t";
                    $context["description_pseudo"] = "";
                    // line 167
                    echo "\t";
                } else {
                    // line 168
                    echo "\t\t";
                    $context["description"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null), "<a><span><em><i><b><strong><small><s><br><mark><img><kbd><code><button>")), array("{file_name}" => (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), "{file_name_ext}" => $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), "{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"))));
                    // line 169
                    echo "\t\t";
                    if ((isset($context["geo"]) ? $context["geo"] : null)) {
                        $context["description"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["description"]) ? $context["description"] : null), array("{latitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude"), "{longitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"), "{map_embed_src}" => (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null), "{map_link_src}" => (isset($context["map_link_src"]) ? $context["map_link_src"] : null), "{map_button_popup}" => (isset($context["map_button_popup"]) ? $context["map_button_popup"] : null), "{map_link_popup}" => (isset($context["map_link_popup"]) ? $context["map_link_popup"] : null), "{map_button}" => (isset($context["map_button"]) ? $context["map_button"] : null), "{map_link}" => (isset($context["map_link"]) ? $context["map_link"] : null))));
                    }
                    // line 170
                    echo "\t\t";
                    $context["description_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["description"]) ? $context["description"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                    // line 171
                    echo "\t";
                }
                // line 172
                echo "
\t";
                // line 174
                echo "\t";
                $context["date"] = $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "date");
                // line 175
                echo "\t";
                if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "date_format") == "timeago")) {
                    // line 176
                    echo "\t\t";
                    $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "d F Y"));
                    // line 177
                    echo "\t\t";
                    $context["date_class"] = "date timeago";
                    // line 178
                    echo "\t";
                } else {
                    // line 179
                    echo "\t\t";
                    $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format"), "d F Y"))) : ("d F Y"))));
                    // line 180
                    echo "\t\t";
                    $context["date_class"] = "date";
                    // line 181
                    echo "\t";
                }
                // line 182
                echo "\t";
                $context["time_tag"] = (((((("<time itemprop=\"dateCreated\" datetime=\"" . call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"))) . "\" class=\"") . (isset($context["date_class"]) ? $context["date_class"] : null)) . "\">") . (isset($context["date_formatted"]) ? $context["date_formatted"] : null)) . "</time>");
                // line 183
                echo "
\t";
                // line 185
                echo "\t";
                $context["image_ratio"] = ((array_key_exists("crop_ratio", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["crop_ratio"]) ? $context["crop_ratio"] : null), (($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") / $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")) * 100)))) : ((($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") / $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")) * 100)));
                // line 186
                echo "
\t";
                // line 188
                echo "\t";
                if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "tooltip"), "enabled")) {
                    // line 189
                    echo "\t\t";
                    $context["tooltip_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "tooltip"), "items"), ","));
                    // line 190
                    echo "\t\t";
                    ob_start();
                    // line 191
                    echo "\t\t";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["tooltip_items"]) ? $context["tooltip_items"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 192
                        echo "\t\t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                            echo "<span class=\"title\">";
                            echo (isset($context["title"]) ? $context["title"] : null);
                            echo "</span>
\t\t\t";
                        } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                            // line 193
                            echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                            echo "
\t\t\t";
                        } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                            // line 194
                            echo "<span class=\"description\">";
                            echo (isset($context["description"]) ? $context["description"] : null);
                            echo "</span>";
                        }
                        // line 195
                        echo "\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 196
                    echo "\t\t";
                    $context["link_title_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 197
                    echo "\t\t";
                    $context["link_title_content"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["link_title_content"]) ? $context["link_title_content"] : null), "html"))));
                    // line 198
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["link_title_content"]) ? $context["link_title_content"] : null))))) {
                        ob_start();
                        echo " title=\"";
                        echo (isset($context["link_title_content"]) ? $context["link_title_content"] : null);
                        echo "\"";
                        $context["link_title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    }
                    // line 199
                    echo "\t";
                }
                // line 200
                echo "
\t";
                // line 202
                echo "\t";
                ob_start();
                // line 203
                echo "\t";
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow")) {
                    // line 204
                    echo "\t<figure>
\t\t\t<div class=\"image-container\" style=\"padding-bottom:";
                    // line 205
                    echo (isset($context["image_ratio"]) ? $context["image_ratio"] : null);
                    echo "%;\">
\t\t\t\t<img data-src=\"";
                    // line 206
                    echo (isset($context["url_escaped"]) ? $context["url_escaped"] : null);
                    echo "\" data-width=\"";
                    echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width");
                    echo "\"";
                    echo (isset($context["data_crop"]) ? $context["data_crop"] : null);
                    echo " alt=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('striptags')->getCallable(), array((isset($context["title"]) ? $context["title"] : null))), "html"));
                    echo "\" itemprop=\"thumbnail\">
\t\t\t</div>

\t\t";
                    // line 210
                    echo "\t\t";
                    if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "caption"), "enabled")) {
                        // line 211
                        echo "
\t\t\t";
                        // line 213
                        echo "\t\t\t";
                        ob_start();
                        // line 214
                        echo "\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "caption"), "items"), ",")));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 215
                            echo "\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo "<span class=\"title\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</span>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 216
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 217
                                echo " ";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description_pseudo"]) ? $context["description_pseudo"] : null)))))) {
                                // line 218
                                echo "<span class=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</span>";
                            }
                            // line 219
                            echo "\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 220
                        echo "\t\t\t";
                        $context["figcaption_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 221
                        echo "\t\t\t";
                        $context["figcaption_content"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["figcaption_content"]) ? $context["figcaption_content"] : null)));
                        // line 222
                        echo "
\t\t\t";
                        // line 224
                        echo "\t\t\t";
                        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["figcaption_content"]) ? $context["figcaption_content"] : null))))) {
                            // line 225
                            echo "\t\t\t\t<figcaption itemprop=\"caption description\">";
                            echo (isset($context["figcaption_content"]) ? $context["figcaption_content"] : null);
                            echo "</figcaption>
\t\t\t";
                        }
                        // line 227
                        echo "
  \t";
                    }
                    // line 229
                    echo "\t</figure>
\t";
                }
                // line 231
                echo "\t";
                $context["figure"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 232
                echo "
\t";
                // line 234
                echo "\t";
                ob_start();
                // line 235
                echo "
\t\t";
                // line 236
                echo (isset($context["li_open"]) ? $context["li_open"] : null);
                echo "

\t\t";
                // line 239
                echo "\t\t";
                $context["anchor_class"] = "item img-link item-link";
                // line 240
                echo "\t\t";
                if ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "popup"), "enabled") && call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["image_link"]) ? $context["image_link"] : null)))) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow"))) {
                    // line 241
                    echo "\t\t";
                    // line 242
                    echo "\t\t\t";
                    $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " x3-popup");
                    // line 243
                    echo "\t\t";
                }
                // line 244
                echo "
\t\t";
                // line 246
                echo "\t\t";
                if ((isset($context["gallery_split_view"]) ? $context["gallery_split_view"] : null)) {
                    // line 247
                    echo "\t\t\t";
                    $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " row");
                    // line 248
                    echo "\t\t";
                }
                // line 249
                echo "
\t\t";
                // line 251
                echo "\t\t";
                $context["link_tag"] = (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "clickable")) ? ("a") : ("span"));
                // line 252
                echo "
\t\t";
                // line 254
                echo "\t\t";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plugins"), "panorama"), "enabled")) {
                    // line 255
                    echo "\t\t\t";
                    $context["data_pano"] = call_user_func_array($this->env->getFunction('pano_params')->getCallable(), array((isset($context["image"]) ? $context["image"] : null), (isset($context["assetspath"]) ? $context["assetspath"] : null)));
                    // line 256
                    echo "\t\t\t";
                    if ((0 === strpos((isset($context["data_pano"]) ? $context["data_pano"] : null), " data-panorama="))) {
                        $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " x3-panorama");
                    }
                    // line 257
                    echo "\t\t";
                }
                // line 258
                echo "
\t\t";
                // line 260
                echo "\t\t";
                $context["data_is_link"] = (((isset($context["image_link"]) ? $context["image_link"] : null)) ? (" data-is-link=\"true\"") : (""));
                // line 261
                echo "
\t\t";
                // line 263
                echo "\t\t<";
                echo (isset($context["link_tag"]) ? $context["link_tag"] : null);
                echo " class=\"";
                echo (isset($context["anchor_class"]) ? $context["anchor_class"] : null);
                echo "\"";
                echo (isset($context["data_exif"]) ? $context["data_exif"] : null);
                echo (isset($context["data_geo"]) ? $context["data_geo"] : null);
                echo " data-width=\"";
                echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width");
                echo "\" data-height=\"";
                echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height");
                echo "\" data-image=\"";
                echo (isset($context["url_escaped"]) ? $context["url_escaped"] : null);
                echo "\" data-title=\"";
                echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["title"]) ? $context["title"] : null), "html"));
                echo "\" data-description=\"";
                echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["description"]) ? $context["description"] : null), "html"));
                echo "\" data-date=\"";
                echo (isset($context["date_formatted"]) ? $context["date_formatted"] : null);
                echo "\"";
                echo (isset($context["data_is_link"]) ? $context["data_is_link"] : null);
                echo " href=\"";
                echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["link_href"]) ? $context["link_href"] : null)));
                echo "\"";
                echo (isset($context["link_target"]) ? $context["link_target"] : null);
                echo " id=\"image-";
                echo (($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "id", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "id"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index")))) : ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index")));
                echo "\"";
                echo (isset($context["link_title"]) ? $context["link_title"] : null);
                echo " itemprop=\"associatedMedia\" itemscope itemtype=\"http://schema.org/ImageObject\"";
                echo (isset($context["nofollow"]) ? $context["nofollow"] : null);
                echo (isset($context["data_pano"]) ? $context["data_pano"] : null);
                echo ">

\t\t";
                // line 266
                echo "\t\t";
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow")) {
                    // line 267
                    echo "
\t\t\t";
                    // line 269
                    echo "\t\t\t";
                    if ((isset($context["gallery_split_view"]) ? $context["gallery_split_view"] : null)) {
                        // line 270
                        echo "
\t\t\t\t";
                        // line 272
                        echo "\t\t\t\t";
                        if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "invert")) {
                            // line 273
                            echo "\t\t\t\t\t";
                            $context["text_align"] = "medium-text-left";
                            // line 274
                            echo "\t\t\t\t";
                        } elseif ((!twig_in_filter("text-right", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")) && !twig_in_filter("text-left", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")))) {
                            // line 275
                            echo "\t\t\t\t\t";
                            $context["text_align"] = "medium-text-right";
                            // line 276
                            echo "\t\t\t\t";
                        }
                        // line 277
                        echo "
\t\t\t\t";
                        // line 279
                        echo "\t\t\t\t<div class=\"medium-";
                        echo $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio");
                        echo " columns ";
                        echo (isset($context["push"]) ? $context["push"] : null);
                        echo " ";
                        echo (isset($context["text_align"]) ? $context["text_align"] : null);
                        echo "\">
\t\t\t\t\t";
                        // line 281
                        echo "\t\t\t\t\t";
                        if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["items"]) ? $context["items"] : null))) < 2)) {
                            $context["items"] = call_user_func_array($this->env->getFilter('merge')->getCallable(), array((isset($context["items"]) ? $context["items"] : null), array(0 => "title", 1 => "description")));
                        }
                        // line 282
                        echo "\t\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 283
                            echo "\t\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                // line 284
                                echo "\t\t\t\t\t\t\t<h2 class=\"title\" itemprop=\"caption\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</h2>
\t\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                                // line 286
                                echo "\t\t\t\t\t\t\t<p itemprop=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</p>
\t\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 288
                                echo "\t\t\t\t\t\t\t<h6 class=\"date\">";
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "</h6>
\t\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 290
                                echo "\t\t\t\t\t\t\t";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t\t";
                            }
                            // line 292
                            echo "\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 293
                        echo "
\t\t\t\t</div>
\t\t\t\t<div class=\"medium-";
                        // line 295
                        echo (12 - $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio"));
                        echo " columns ";
                        echo (isset($context["pull"]) ? $context["pull"] : null);
                        echo "\">
\t\t\t\t\t";
                        // line 296
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t\t\t</div>

\t\t\t";
                        // line 300
                        echo "\t\t\t";
                    } elseif (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "justified")) {
                        // line 301
                        echo "\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 302
                            echo "\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                // line 303
                                echo "\t\t\t\t\t\t<h2 class=\"title\" itemprop=\"caption\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</h2>
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                                // line 305
                                echo "\t\t\t\t\t\t<p itemprop=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</p>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 307
                                echo "\t\t\t\t\t\t<h6 class=\"date\">";
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "</h6>
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 309
                                echo "\t\t\t\t\t\t";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "preview")) {
                                // line 311
                                echo "\t\t\t\t\t\t";
                                echo (isset($context["figure"]) ? $context["figure"] : null);
                                echo "
\t\t\t\t\t";
                            }
                            // line 313
                            echo "\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 314
                        echo "
\t\t\t";
                        // line 316
                        echo "\t\t\t";
                    } else {
                        // line 317
                        echo "\t\t\t\t";
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t\t";
                    }
                    // line 319
                    echo "
\t\t";
                }
                // line 321
                echo "
\t\t</";
                // line 322
                echo (isset($context["link_tag"]) ? $context["link_tag"] : null);
                echo ">

\t\t";
                // line 325
                echo "\t\t";
                if ((((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") == "vertical")) && $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "vertical"), "horizontal_rule"))) {
                    // line 326
                    echo "\t\t\t<hr class=\"hr\">
\t\t";
                }
                // line 328
                echo "
\t\t";
                // line 329
                echo (isset($context["li_close"]) ? $context["li_close"] : null);
                echo "

\t";
                $context["item"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 332
                echo "
\t";
                // line 334
                echo "\t";
                if ((twig_in_filter("landscape", (isset($context["module_classes"]) ? $context["module_classes"] : null)) || twig_in_filter("portrait", (isset($context["module_classes"]) ? $context["module_classes"] : null)))) {
                    // line 335
                    echo "\t\t";
                    if ((twig_in_filter("landscape", (isset($context["module_classes"]) ? $context["module_classes"] : null)) && ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width") > $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height")))) {
                        // line 336
                        echo "\t\t\t";
                        echo (isset($context["item"]) ? $context["item"] : null);
                        echo "
\t\t";
                    } elseif ((twig_in_filter("portrait", (isset($context["module_classes"]) ? $context["module_classes"] : null)) && ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") > $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")))) {
                        // line 338
                        echo "\t\t\t";
                        echo (isset($context["item"]) ? $context["item"] : null);
                        echo "
\t\t";
                    }
                    // line 340
                    echo "\t";
                } else {
                    // line 341
                    echo "\t\t";
                    echo (isset($context["item"]) ? $context["item"] : null);
                    echo "
\t";
                }
                // line 343
                echo "
";
            }
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 346
        echo "
";
        // line 348
        echo (isset($context["ul_close"]) ? $context["ul_close"] : null);
        echo "

";
        // line 351
        if ((((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_videos"]) ? $context["gallery_videos"] : null))) > 0) && !twig_in_filter("hide-video", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes"))) && twig_in_filter("video-bottom", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")))) {
            // line 352
            echo "\t";
            if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null))) > 0)) {
                echo "<hr>";
            }
            // line 353
            echo "\t";
            $this->env->loadTemplate("partials/module.video.html")->display($context);
        }
    }

    public function getTemplateName()
    {
        return "partials/module.gallery.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  989 => 353,  984 => 352,  982 => 351,  977 => 348,  974 => 346,  952 => 341,  949 => 340,  943 => 338,  937 => 336,  934 => 335,  931 => 334,  928 => 332,  922 => 329,  915 => 326,  912 => 325,  907 => 322,  900 => 319,  894 => 317,  891 => 316,  888 => 314,  882 => 313,  876 => 311,  870 => 309,  864 => 307,  858 => 305,  852 => 303,  849 => 302,  844 => 301,  841 => 300,  835 => 296,  825 => 293,  819 => 292,  813 => 290,  807 => 288,  801 => 286,  795 => 284,  792 => 283,  787 => 282,  782 => 281,  770 => 277,  767 => 276,  764 => 275,  761 => 274,  752 => 270,  746 => 267,  743 => 266,  707 => 263,  698 => 258,  695 => 257,  690 => 256,  684 => 254,  681 => 252,  678 => 251,  675 => 249,  672 => 248,  669 => 247,  666 => 246,  663 => 244,  660 => 243,  657 => 242,  655 => 241,  652 => 240,  649 => 239,  638 => 234,  635 => 232,  632 => 231,  628 => 229,  624 => 227,  615 => 224,  612 => 222,  609 => 221,  606 => 220,  600 => 219,  595 => 218,  589 => 217,  584 => 216,  571 => 214,  568 => 213,  565 => 211,  562 => 210,  550 => 206,  546 => 205,  543 => 204,  540 => 203,  537 => 202,  534 => 200,  531 => 199,  522 => 198,  519 => 197,  516 => 196,  510 => 195,  505 => 194,  492 => 192,  487 => 191,  436 => 171,  433 => 170,  428 => 169,  425 => 168,  422 => 167,  419 => 166,  416 => 165,  413 => 164,  410 => 163,  407 => 161,  404 => 160,  385 => 151,  382 => 150,  379 => 149,  367 => 145,  364 => 144,  361 => 143,  358 => 142,  355 => 141,  349 => 138,  337 => 136,  326 => 133,  324 => 130,  301 => 120,  298 => 119,  292 => 116,  289 => 115,  286 => 114,  283 => 113,  280 => 111,  277 => 110,  274 => 109,  271 => 108,  265 => 105,  262 => 104,  259 => 102,  256 => 101,  247 => 97,  244 => 96,  241 => 94,  238 => 93,  235 => 92,  232 => 91,  229 => 90,  217 => 85,  138 => 55,  135 => 54,  132 => 53,  109 => 45,  980 => 304,  966 => 303,  961 => 301,  958 => 343,  954 => 298,  951 => 297,  945 => 292,  939 => 290,  936 => 289,  933 => 287,  927 => 286,  924 => 285,  919 => 328,  914 => 283,  909 => 282,  904 => 321,  899 => 280,  892 => 279,  887 => 278,  884 => 277,  878 => 273,  872 => 272,  869 => 271,  863 => 270,  860 => 269,  855 => 268,  850 => 267,  845 => 266,  840 => 265,  833 => 264,  829 => 295,  820 => 262,  817 => 260,  814 => 259,  811 => 258,  808 => 257,  805 => 256,  802 => 255,  799 => 253,  796 => 252,  791 => 249,  776 => 248,  773 => 279,  768 => 243,  765 => 242,  758 => 273,  755 => 272,  749 => 269,  744 => 238,  739 => 237,  731 => 236,  723 => 235,  717 => 234,  709 => 233,  704 => 261,  701 => 260,  699 => 230,  687 => 255,  683 => 226,  679 => 224,  676 => 223,  673 => 222,  667 => 220,  664 => 219,  661 => 218,  658 => 217,  650 => 215,  647 => 214,  644 => 236,  641 => 235,  633 => 210,  630 => 209,  627 => 208,  621 => 206,  618 => 225,  610 => 203,  607 => 202,  597 => 200,  594 => 199,  591 => 197,  588 => 196,  585 => 195,  582 => 194,  579 => 193,  576 => 215,  573 => 191,  570 => 190,  567 => 188,  564 => 187,  561 => 185,  556 => 184,  553 => 182,  548 => 181,  545 => 179,  509 => 178,  506 => 176,  503 => 175,  500 => 193,  497 => 173,  494 => 172,  491 => 171,  488 => 170,  484 => 190,  481 => 189,  478 => 188,  475 => 186,  472 => 185,  469 => 183,  466 => 182,  463 => 181,  460 => 180,  457 => 179,  454 => 178,  451 => 177,  448 => 176,  445 => 175,  442 => 174,  439 => 172,  437 => 151,  434 => 150,  431 => 149,  429 => 148,  426 => 147,  423 => 146,  420 => 144,  417 => 143,  414 => 142,  411 => 141,  408 => 139,  405 => 138,  402 => 137,  399 => 159,  396 => 158,  393 => 156,  390 => 155,  387 => 154,  381 => 128,  375 => 126,  372 => 125,  369 => 124,  366 => 122,  360 => 119,  351 => 115,  348 => 114,  345 => 113,  342 => 112,  336 => 110,  333 => 108,  330 => 107,  321 => 129,  318 => 127,  295 => 117,  282 => 98,  276 => 97,  268 => 106,  248 => 89,  245 => 88,  242 => 87,  221 => 79,  218 => 78,  215 => 76,  212 => 75,  209 => 74,  206 => 73,  204 => 72,  189 => 67,  186 => 66,  183 => 65,  180 => 64,  177 => 63,  165 => 58,  153 => 53,  150 => 62,  126 => 49,  123 => 47,  121 => 49,  118 => 48,  97 => 36,  82 => 34,  384 => 130,  378 => 127,  376 => 148,  373 => 147,  370 => 146,  363 => 121,  359 => 137,  352 => 139,  346 => 133,  343 => 132,  340 => 130,  334 => 135,  328 => 134,  322 => 123,  319 => 122,  316 => 120,  306 => 122,  287 => 99,  281 => 110,  249 => 97,  246 => 95,  193 => 74,  190 => 73,  187 => 72,  184 => 71,  181 => 70,  175 => 68,  172 => 66,  169 => 66,  166 => 65,  163 => 64,  160 => 62,  148 => 57,  145 => 59,  133 => 51,  111 => 41,  83 => 34,  174 => 62,  157 => 61,  154 => 59,  114 => 42,  86 => 35,  60 => 23,  48 => 16,  51 => 17,  42 => 13,  127 => 51,  124 => 50,  120 => 47,  117 => 46,  106 => 44,  103 => 43,  100 => 42,  93 => 37,  79 => 30,  76 => 31,  58 => 22,  45 => 15,  38 => 11,  90 => 35,  61 => 23,  56 => 20,  44 => 14,  36 => 11,  27 => 6,  357 => 118,  354 => 116,  344 => 137,  341 => 126,  339 => 111,  335 => 124,  331 => 127,  329 => 122,  323 => 118,  320 => 116,  315 => 126,  312 => 124,  309 => 123,  303 => 121,  300 => 116,  297 => 114,  291 => 105,  288 => 104,  284 => 111,  269 => 105,  266 => 103,  254 => 92,  251 => 90,  243 => 94,  239 => 86,  226 => 89,  223 => 88,  220 => 86,  214 => 83,  201 => 71,  198 => 70,  195 => 69,  192 => 68,  185 => 56,  178 => 69,  171 => 60,  168 => 59,  162 => 57,  159 => 56,  152 => 59,  146 => 46,  142 => 57,  136 => 52,  130 => 52,  115 => 47,  112 => 46,  69 => 27,  65 => 23,  53 => 19,  47 => 16,  32 => 9,  22 => 3,  108 => 40,  105 => 45,  101 => 41,  98 => 41,  95 => 39,  92 => 37,  88 => 36,  85 => 35,  81 => 34,  78 => 32,  74 => 28,  71 => 26,  67 => 24,  55 => 18,  52 => 17,  49 => 16,  40 => 12,  34 => 10,  31 => 8,  29 => 7,  26 => 6,  24 => 4,  21 => 2,  278 => 108,  275 => 96,  272 => 106,  270 => 102,  267 => 100,  263 => 95,  260 => 94,  257 => 93,  253 => 100,  250 => 98,  236 => 85,  233 => 83,  230 => 82,  227 => 81,  224 => 80,  222 => 85,  219 => 83,  216 => 82,  211 => 82,  208 => 81,  205 => 80,  202 => 79,  199 => 77,  196 => 76,  194 => 74,  191 => 73,  188 => 72,  182 => 69,  179 => 68,  176 => 66,  173 => 65,  170 => 65,  167 => 63,  164 => 63,  161 => 60,  158 => 59,  155 => 57,  137 => 54,  134 => 53,  131 => 53,  128 => 50,  125 => 41,  122 => 39,  119 => 49,  116 => 48,  113 => 45,  110 => 48,  107 => 44,  102 => 43,  99 => 43,  96 => 42,  94 => 35,  91 => 37,  89 => 36,  87 => 41,  84 => 36,  80 => 33,  77 => 32,  73 => 29,  70 => 25,  68 => 27,  66 => 26,  64 => 25,  62 => 22,  59 => 22,  57 => 20,  54 => 19,  50 => 17,  46 => 15,  43 => 14,  41 => 13,  39 => 12,  37 => 10,  35 => 10,  33 => 9,  30 => 8,  28 => 7,  25 => 5,  23 => 3,  19 => 1,);
    }
}
