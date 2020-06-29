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
            $context["data_crop"] = ((((" data-crop=\"" . call_user_func_array($this->env->getFilter('round')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "crop"), 0, array(), "array")))) . ".") . call_user_func_array($this->env->getFilter('round')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "crop"), 1, array(), "array")))) . "\"");
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
            echo "
\t";
            // line 44
            echo "\t";
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "space") > (-1))) {
                // line 45
                echo "\t\t";
                $context["ul_style"] = ((" style=\"margin: 0 " . ((((isset($context["width"]) ? $context["width"] : null) == "wide")) ? (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "space") / 2)) : (((-$this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "space")) / 4)))) . "px\"");
                // line 46
                echo "\t\t";
                $context["li_style"] = ((((" style=\"padding: 0 " . ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "space") / 2)) . "px ") . $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "space")) . "px\"");
                // line 47
                echo "\t";
            }
            // line 48
            echo "
\t";
            // line 50
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "use_width")) {
                // line 51
                echo "\t\t";
                $context["ul_open"] = (("<ul class=\"items\"" . (isset($context["ul_style"]) ? $context["ul_style"] : null)) . ">");
                // line 52
                echo "
\t";
                // line 54
                echo "\t";
            } else {
                // line 55
                echo "\t\t";
                $context["block_grid"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array(call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "columns"), array(" " => ""))), ","));
                // line 56
                echo "\t\t";
                $context["columns_max"] = call_user_func_array($this->env->getFunction('max')->getCallable(), array(call_user_func_array($this->env->getFunction('min')->getCallable(), array((isset($context["limit"]) ? $context["limit"] : null), call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null))))), 3));
                // line 57
                echo "\t\t";
                $context["small_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"))), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "1")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 58
                echo "\t\t";
                $context["medium_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "2")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 59
                echo "\t\t";
                $context["large_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"), "3"))) : ("3")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 60
                echo "\t\t";
                $context["ul_open"] = (((((((("<ul class=\"small-block-grid-" . (isset($context["small_grid"]) ? $context["small_grid"] : null)) . " medium-block-grid-") . (isset($context["medium_grid"]) ? $context["medium_grid"] : null)) . " large-block-grid-") . (isset($context["large_grid"]) ? $context["large_grid"] : null)) . " items\"") . (isset($context["ul_style"]) ? $context["ul_style"] : null)) . ">");
                // line 61
                echo "\t";
            }
            // line 62
            echo "
\t";
            // line 63
            echo "\t
\t";
            // line 64
            $context["li_open"] = (("<li" . (isset($context["li_style"]) ? $context["li_style"] : null)) . ">");
            // line 65
            echo "\t";
            $context["li_close"] = "</li>";
            // line 66
            echo "\t";
            $context["ul_close"] = "</ul>";
        }
        // line 68
        echo "
";
        // line 70
        echo (isset($context["ul_open"]) ? $context["ul_open"] : null);
        echo "

";
        // line 73
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
            // line 74
            echo "
";
            // line 76
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") < (isset($context["limit"]) ? $context["limit"] : null))) {
                // line 77
                echo "
\t";
                // line 79
                echo "\t";
                $context["url"] = ((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array((($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "file_path") . "/") . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), ".")));
                // line 80
                echo "\t";
                $context["url_escaped"] = call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["url"]) ? $context["url"] : null)));
                // line 81
                echo "\t";
                $context["image_link"] = (($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "link", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "link"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link")))) : ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link")));
                // line 82
                echo "\t";
                $context["link_target"] = (($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "target", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "target"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link_target")))) : ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link_target")));
                // line 83
                echo "\t";
                $context["name_no_ext"] = call_user_func_array($this->env->getFilter('removeExtension')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")));
                // line 84
                echo "\t";
                $context["nofollow"] = "";
                // line 85
                echo "
\t";
                // line 87
                echo "\t";
                if ((isset($context["image_link"]) ? $context["image_link"] : null)) {
                    // line 88
                    echo "
\t\t";
                    // line 90
                    echo "\t\t";
                    if ((0 === substr_compare((isset($context["image_link"]) ? $context["image_link"] : null), ":nofollow", -strlen(":nofollow")))) {
                        // line 91
                        echo "\t\t\t";
                        $context["nofollow"] = " rel=\"nofollow\"";
                        // line 92
                        echo "\t\t\t";
                        $context["image_link"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["image_link"]) ? $context["image_link"] : null), array(":nofollow" => "")));
                        // line 93
                        echo "\t\t";
                    }
                    // line 94
                    echo "
\t\t";
                    // line 96
                    echo "\t\t";
                    $context["link_href"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["image_link"]) ? $context["image_link"] : null), array("{file_name}" => (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), "{file_name_ext}" => $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), "{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"))));
                    // line 97
                    echo "
\t\t";
                    // line 99
                    echo "\t\t";
                    if ((call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["link_target"]) ? $context["link_target"] : null))) || ((isset($context["link_target"]) ? $context["link_target"] : null) == "auto"))) {
                        // line 100
                        echo "\t\t\t";
                        if (((0 === strpos(call_user_func_array($this->env->getFilter('lower')->getCallable(), array($this->env, (isset($context["link_href"]) ? $context["link_href"] : null))), "http")) || call_user_func_array($this->env->getFunction('hasExtension')->getCallable(), array((isset($context["link_href"]) ? $context["link_href"] : null))))) {
                            // line 101
                            echo "\t\t\t\t";
                            $context["link_target"] = " target=\"_blank\"";
                            // line 102
                            echo "\t\t\t";
                        } else {
                            // line 103
                            echo "\t\t\t\t";
                            $context["link_target"] = "";
                            // line 104
                            echo "\t\t\t";
                        }
                        // line 105
                        echo "
\t\t";
                        // line 107
                        echo "\t\t";
                    } elseif (((isset($context["link_target"]) ? $context["link_target"] : null) == "popup")) {
                        // line 108
                        echo "\t\t\t";
                        $context["link_target"] = ((((((" data-popup-window=\"" . call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "name"), array(" " => "-")))) . ",") . $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "popup_width")) . ",") . $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "popup_height")) . "\"");
                        // line 109
                        echo "
\t\t";
                        // line 111
                        echo "\t\t";
                    } elseif (((isset($context["link_target"]) ? $context["link_target"] : null) == "_blank")) {
                        // line 112
                        echo "\t\t\t";
                        $context["link_target"] = " target=\"_blank\"";
                        // line 113
                        echo "
\t\t";
                        // line 115
                        echo "\t\t";
                    } elseif (((isset($context["link_target"]) ? $context["link_target"] : null) == "x3_popup")) {
                        // line 116
                        echo "\t\t\t";
                        $context["link_target"] = " data-popup";
                        // line 117
                        echo "
\t\t";
                        // line 119
                        echo "\t\t";
                    } else {
                        // line 120
                        echo "\t\t\t";
                        $context["link_target"] = "";
                        // line 121
                        echo "\t\t";
                    }
                    // line 122
                    echo "
\t";
                    // line 124
                    echo "\t";
                } else {
                    // line 125
                    echo "\t\t";
                    $context["link_href"] = ((call_user_func_array($this->env->getFilter('setpath')->getCallable(), array($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "permalink"), (isset($context["rootpath"]) ? $context["rootpath"] : null))) . call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), array(" " => "_")))) . "/");
                    // line 126
                    echo "\t\t";
                    $context["link_target"] = "";
                    // line 127
                    echo "\t";
                }
                // line 128
                echo "
\t";
                // line 130
                echo "\t";
                $context["exif_array"] = array();
                // line 131
                echo "\t";
                // line 132
                echo "\t";
                $context["data_exif"] = "";
                // line 133
                echo "\t";
                $context["geo"] = "";
                // line 134
                echo "\t";
                $context["data_geo"] = "";
                // line 135
                echo "
\t";
                // line 137
                echo "\t";
                if ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif")) {
                    // line 138
                    echo "
\t\t";
                    // line 140
                    echo "\t\t";
                    if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["exif_items"]) ? $context["exif_items"] : null))) > 0)) {
                        // line 141
                        echo "\t\t\t";
                        // line 144
                        echo "\t\t\t";
                        // line 145
                        echo "\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["exif_items"]) ? $context["exif_items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["key"]) {
                            if ($this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), (isset($context["key"]) ? $context["key"] : null), array(), "array")) {
                                // line 146
                                echo "\t\t    ";
                                $context["exif_array"] = call_user_func_array($this->env->getFilter('merge')->getCallable(), array((isset($context["exif_array"]) ? $context["exif_array"] : null), array((isset($context["key"]) ? $context["key"] : null) => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), (isset($context["key"]) ? $context["key"] : null), array(), "array"))));
                                // line 147
                                echo "\t\t\t";
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['key'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 148
                        echo "\t\t\t";
                        if (call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["exif_array"]) ? $context["exif_array"] : null)))) {
                            $context["data_exif"] = ((" data-exif=\"" . call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('json_encode')->getCallable(), array((isset($context["exif_array"]) ? $context["exif_array"] : null))), "html_attr"))) . "\"");
                        }
                        // line 149
                        echo "\t\t";
                    }
                    // line 150
                    echo "
\t\t";
                    // line 152
                    echo "\t\t";
                    if (($this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude") && $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"))) {
                        // line 153
                        echo "\t\t\t";
                        $context["geo"] = (($this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude") . ",") . $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"));
                        // line 154
                        echo "\t\t\t";
                        $context["map_embed_src"] = (("https://www.google.com/maps/embed/v1/place?q=" . (isset($context["geo"]) ? $context["geo"] : null)) . "&amp;key=AIzaSyDRp6xla9SxUmTBu6l_kprhjjI9e5-EVZk");
                        // line 155
                        echo "\t\t\t";
                        $context["map_link_src"] = ("https://www.google.com/maps/search/?api=1&query=" . (isset($context["geo"]) ? $context["geo"] : null));
                        // line 156
                        echo "\t\t\t";
                        $context["map_embed_button_item"] = (((("<button data-href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-popup-href=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"button small button-map\" data-popup-class=\"x3-popup-iframe-full\" data-popup></button>");
                        // line 157
                        echo "\t\t\t";
                        $context["map_button_popup"] = (((("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"button small button-map\" target=\"_blank\"></a>");
                        // line 158
                        echo "\t\t\t";
                        $context["map_link_popup"] = (((("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"link-map\" target=\"_blank\"></a>");
                        // line 159
                        echo "\t\t\t";
                        $context["map_button"] = (("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" class=\"button small button-map\" target=\"_blank\"></a>");
                        // line 160
                        echo "\t\t\t";
                        $context["map_link"] = (("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" class=\"link-map\" target=\"_blank\"></a>");
                        // line 161
                        echo "\t\t\t";
                        $context["data_geo"] = ((" data-geo=\"" . (isset($context["geo"]) ? $context["geo"] : null)) . "\"");
                        // line 162
                        echo "\t\t\t";
                        // line 165
                        echo "\t\t";
                    }
                    // line 166
                    echo "\t";
                }
                // line 167
                echo "
\t";
                // line 169
                echo "\t";
                $context["title"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array(call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "title"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "title"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "title_include"))), "<a><span><em><i><b><strong><small><s><mark>")), array("{file_name}" => (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), "{file_name_ext}" => $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), "{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"))));
                // line 170
                echo "\t";
                $context["title_name"] = ((array_key_exists("title", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["title"]) ? $context["title"] : null), $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "name")))) : ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "name")));
                // line 171
                echo "\t";
                if (((isset($context["title"]) ? $context["title"] : null) && (isset($context["geo"]) ? $context["geo"] : null))) {
                    $context["title"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["title"]) ? $context["title"] : null), array("{latitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude"), "{longitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"), "{map_embed_src}" => (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null), "{map_link_src}" => (isset($context["map_link_src"]) ? $context["map_link_src"] : null), "{map_button_popup}" => (isset($context["map_button_popup"]) ? $context["map_button_popup"] : null), "{map_link_popup}" => (isset($context["map_link_popup"]) ? $context["map_link_popup"] : null), "{map_button}" => (isset($context["map_button"]) ? $context["map_button"] : null), "{map_link}" => (isset($context["map_link"]) ? $context["map_link"] : null))));
                }
                // line 172
                echo "\t";
                $context["title_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["title_name"]) ? $context["title_name"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                // line 173
                echo "
\t";
                // line 175
                echo "\t";
                $context["image_description"] = call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "description"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "description"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "description_include")));
                // line 176
                echo "\t";
                if (call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null)))) {
                    // line 177
                    echo "\t\t";
                    $context["description"] = "";
                    // line 178
                    echo "\t\t";
                    $context["description_pseudo"] = "";
                    // line 179
                    echo "\t";
                } else {
                    // line 180
                    echo "\t\t";
                    $context["description"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null), "<a><span><em><i><b><strong><small><s><br><mark><img><kbd><code><button>")), array("{file_name}" => (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), "{file_name_ext}" => $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), "{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"))));
                    // line 181
                    echo "\t\t";
                    if ((isset($context["geo"]) ? $context["geo"] : null)) {
                        $context["description"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["description"]) ? $context["description"] : null), array("{latitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude"), "{longitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"), "{map_embed_src}" => (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null), "{map_link_src}" => (isset($context["map_link_src"]) ? $context["map_link_src"] : null), "{map_button_popup}" => (isset($context["map_button_popup"]) ? $context["map_button_popup"] : null), "{map_link_popup}" => (isset($context["map_link_popup"]) ? $context["map_link_popup"] : null), "{map_button}" => (isset($context["map_button"]) ? $context["map_button"] : null), "{map_link}" => (isset($context["map_link"]) ? $context["map_link"] : null))));
                    }
                    // line 182
                    echo "\t\t";
                    $context["description_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["description"]) ? $context["description"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                    // line 183
                    echo "\t";
                }
                // line 184
                echo "
\t";
                // line 186
                echo "\t";
                $context["date"] = $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "date");
                // line 187
                echo "\t";
                if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "date_format") == "timeago")) {
                    // line 188
                    echo "\t\t";
                    $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "d F Y"));
                    // line 189
                    echo "\t\t";
                    $context["date_class"] = "date timeago";
                    // line 190
                    echo "\t";
                } else {
                    // line 191
                    echo "\t\t";
                    $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format"), "d F Y"))) : ("d F Y"))));
                    // line 192
                    echo "\t\t";
                    $context["date_class"] = "date";
                    // line 193
                    echo "\t";
                }
                // line 194
                echo "\t";
                $context["time_tag"] = (((((("<time itemprop=\"dateCreated\" datetime=\"" . call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"))) . "\" class=\"") . (isset($context["date_class"]) ? $context["date_class"] : null)) . "\">") . (isset($context["date_formatted"]) ? $context["date_formatted"] : null)) . "</time>");
                // line 195
                echo "
\t";
                // line 197
                echo "\t";
                $context["image_ratio"] = ((array_key_exists("crop_ratio", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["crop_ratio"]) ? $context["crop_ratio"] : null), (($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") / $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")) * 100)))) : ((($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") / $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")) * 100)));
                // line 198
                echo "
\t";
                // line 200
                echo "\t";
                if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "tooltip"), "enabled")) {
                    // line 201
                    echo "\t\t";
                    $context["tooltip_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "tooltip"), "items"), ","));
                    // line 202
                    echo "\t\t";
                    ob_start();
                    // line 203
                    echo "\t\t";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["tooltip_items"]) ? $context["tooltip_items"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 204
                        echo "\t\t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                            echo "<span class=\"title\">";
                            echo (isset($context["title_name"]) ? $context["title_name"] : null);
                            echo "</span>
\t\t\t";
                        } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                            // line 205
                            echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                            echo "
\t\t\t";
                        } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                            // line 206
                            echo "<span class=\"description\">";
                            echo (isset($context["description"]) ? $context["description"] : null);
                            echo "</span>";
                        }
                        // line 207
                        echo "\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 208
                    echo "\t\t";
                    $context["link_title_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 209
                    echo "\t\t";
                    $context["link_title_content"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["link_title_content"]) ? $context["link_title_content"] : null), "html"))));
                    // line 210
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["link_title_content"]) ? $context["link_title_content"] : null))))) {
                        ob_start();
                        echo " title=\"";
                        echo (isset($context["link_title_content"]) ? $context["link_title_content"] : null);
                        echo "\"";
                        $context["link_title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    }
                    // line 211
                    echo "\t";
                }
                // line 212
                echo "
\t";
                // line 214
                echo "\t";
                ob_start();
                // line 215
                echo "\t";
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow")) {
                    // line 216
                    echo "\t<figure>
\t\t\t<div class=\"image-container\" style=\"padding-bottom:";
                    // line 217
                    echo (isset($context["image_ratio"]) ? $context["image_ratio"] : null);
                    echo "%;\">
\t\t\t\t<img data-src=\"";
                    // line 218
                    echo (isset($context["url_escaped"]) ? $context["url_escaped"] : null);
                    echo "\" data-width=\"";
                    echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width");
                    echo "\"";
                    echo (isset($context["data_crop"]) ? $context["data_crop"] : null);
                    echo " alt=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('striptags')->getCallable(), array((isset($context["title_name"]) ? $context["title_name"] : null))), "html"));
                    echo "\" itemprop=\"thumbnail\">
\t\t\t</div>

\t\t";
                    // line 222
                    echo "\t\t";
                    if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "caption"), "enabled")) {
                        // line 223
                        echo "
\t\t\t";
                        // line 225
                        echo "\t\t\t";
                        ob_start();
                        // line 226
                        echo "\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "caption"), "items"), ",")));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 227
                            echo "\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo "<span class=\"title\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</span>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 228
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 229
                                echo " ";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description_pseudo"]) ? $context["description_pseudo"] : null)))))) {
                                // line 230
                                echo "<span class=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</span>";
                            }
                            // line 231
                            echo "\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 232
                        echo "\t\t\t";
                        $context["figcaption_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 233
                        echo "\t\t\t";
                        $context["figcaption_content"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["figcaption_content"]) ? $context["figcaption_content"] : null)));
                        // line 234
                        echo "
\t\t\t";
                        // line 236
                        echo "\t\t\t";
                        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["figcaption_content"]) ? $context["figcaption_content"] : null))))) {
                            // line 237
                            echo "\t\t\t\t<figcaption itemprop=\"caption description\">";
                            echo (isset($context["figcaption_content"]) ? $context["figcaption_content"] : null);
                            echo "</figcaption>
\t\t\t";
                        }
                        // line 239
                        echo "
  \t";
                    }
                    // line 241
                    echo "\t</figure>
\t";
                }
                // line 243
                echo "\t";
                $context["figure"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 244
                echo "
\t";
                // line 246
                echo "\t";
                ob_start();
                // line 247
                echo "
\t\t";
                // line 248
                echo (isset($context["li_open"]) ? $context["li_open"] : null);
                echo "

\t\t";
                // line 251
                echo "\t\t";
                $context["anchor_class"] = "item img-link item-link";
                // line 252
                echo "\t\t";
                if (((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "clickable") && $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "popup"), "enabled")) && call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["image_link"]) ? $context["image_link"] : null)))) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow"))) {
                    // line 253
                    echo "\t\t\t";
                    $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " x3-popup");
                    // line 254
                    echo "\t\t";
                }
                // line 255
                echo "
\t\t";
                // line 257
                echo "\t\t";
                if ((isset($context["gallery_split_view"]) ? $context["gallery_split_view"] : null)) {
                    // line 258
                    echo "\t\t\t";
                    $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " row");
                    // line 259
                    echo "\t\t";
                }
                // line 260
                echo "
\t\t";
                // line 262
                echo "\t\t";
                $context["link_tag"] = (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "clickable")) ? ("a") : ("span"));
                // line 263
                echo "
\t\t";
                // line 265
                echo "\t\t";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plugins"), "panorama"), "enabled")) {
                    // line 266
                    echo "\t\t\t";
                    $context["data_pano"] = call_user_func_array($this->env->getFunction('pano_params')->getCallable(), array((isset($context["image"]) ? $context["image"] : null), (isset($context["assetspath"]) ? $context["assetspath"] : null)));
                    // line 267
                    echo "\t\t\t";
                    if ((0 === strpos((isset($context["data_pano"]) ? $context["data_pano"] : null), " data-panorama="))) {
                        $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " x3-panorama");
                    }
                    // line 268
                    echo "\t\t";
                }
                // line 269
                echo "
\t\t";
                // line 271
                echo "\t\t";
                $context["data_is_link"] = (((isset($context["image_link"]) ? $context["image_link"] : null)) ? (" data-is-link=\"true\"") : (""));
                // line 272
                echo "
\t\t";
                // line 274
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
                echo "\" data-name=\"";
                echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "name");
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
                // line 277
                echo "\t\t";
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow")) {
                    // line 278
                    echo "
\t\t\t";
                    // line 280
                    echo "\t\t\t";
                    if ((isset($context["gallery_split_view"]) ? $context["gallery_split_view"] : null)) {
                        // line 281
                        echo "
\t\t\t\t";
                        // line 283
                        echo "\t\t\t\t";
                        if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "invert")) {
                            // line 284
                            echo "\t\t\t\t\t";
                            $context["text_align"] = "medium-text-left";
                            // line 285
                            echo "\t\t\t\t";
                        } elseif ((!twig_in_filter("text-right", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")) && !twig_in_filter("text-left", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")))) {
                            // line 286
                            echo "\t\t\t\t\t";
                            $context["text_align"] = "medium-text-right";
                            // line 287
                            echo "\t\t\t\t";
                        }
                        // line 288
                        echo "
\t\t\t\t";
                        // line 290
                        echo "\t\t\t\t<div class=\"medium-";
                        echo $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio");
                        echo " columns ";
                        echo (isset($context["push"]) ? $context["push"] : null);
                        echo " ";
                        echo (isset($context["text_align"]) ? $context["text_align"] : null);
                        echo "\">
\t\t\t\t\t";
                        // line 292
                        echo "\t\t\t\t\t";
                        if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["items"]) ? $context["items"] : null))) < 2)) {
                            $context["items"] = call_user_func_array($this->env->getFilter('merge')->getCallable(), array((isset($context["items"]) ? $context["items"] : null), array(0 => "title", 1 => "description")));
                        }
                        // line 293
                        echo "\t\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 294
                            echo "\t\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                // line 295
                                echo "\t\t\t\t\t\t\t<h2 class=\"title\" itemprop=\"caption\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</h2>
\t\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                                // line 297
                                echo "\t\t\t\t\t\t\t<p itemprop=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</p>
\t\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 299
                                echo "\t\t\t\t\t\t\t<h6 class=\"date\">";
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "</h6>
\t\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 301
                                echo "\t\t\t\t\t\t\t";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t\t";
                            }
                            // line 303
                            echo "\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 304
                        echo "
\t\t\t\t</div>
\t\t\t\t<div class=\"medium-";
                        // line 306
                        echo (12 - $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio"));
                        echo " columns ";
                        echo (isset($context["pull"]) ? $context["pull"] : null);
                        echo "\">
\t\t\t\t\t";
                        // line 307
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t\t\t</div>

\t\t\t";
                        // line 311
                        echo "\t\t\t";
                    } elseif (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "justified")) {
                        // line 312
                        echo "\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 313
                            echo "\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                // line 314
                                echo "\t\t\t\t\t\t<h2 class=\"title\" itemprop=\"caption\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</h2>
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                                // line 316
                                echo "\t\t\t\t\t\t<p itemprop=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</p>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 318
                                echo "\t\t\t\t\t\t<h6 class=\"date\">";
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "</h6>
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 320
                                echo "\t\t\t\t\t\t";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "preview")) {
                                // line 322
                                echo "\t\t\t\t\t\t";
                                echo (isset($context["figure"]) ? $context["figure"] : null);
                                echo "
\t\t\t\t\t";
                            }
                            // line 324
                            echo "\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 325
                        echo "
\t\t\t";
                        // line 327
                        echo "\t\t\t";
                    } else {
                        // line 328
                        echo "\t\t\t\t";
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t\t";
                    }
                    // line 330
                    echo "
\t\t";
                }
                // line 332
                echo "
\t\t</";
                // line 333
                echo (isset($context["link_tag"]) ? $context["link_tag"] : null);
                echo ">

\t\t";
                // line 336
                echo "\t\t";
                if ((((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") == "vertical")) && $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "vertical"), "horizontal_rule"))) {
                    // line 337
                    echo "\t\t\t<hr class=\"hr\">
\t\t";
                }
                // line 339
                echo "
\t\t";
                // line 340
                echo (isset($context["li_close"]) ? $context["li_close"] : null);
                echo "

\t";
                $context["item"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 343
                echo "
\t";
                // line 345
                echo "\t";
                if ((twig_in_filter("landscape", (isset($context["module_classes"]) ? $context["module_classes"] : null)) || twig_in_filter("portrait", (isset($context["module_classes"]) ? $context["module_classes"] : null)))) {
                    // line 346
                    echo "\t\t";
                    if ((twig_in_filter("landscape", (isset($context["module_classes"]) ? $context["module_classes"] : null)) && ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width") > $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height")))) {
                        // line 347
                        echo "\t\t\t";
                        echo (isset($context["item"]) ? $context["item"] : null);
                        echo "
\t\t";
                    } elseif ((twig_in_filter("portrait", (isset($context["module_classes"]) ? $context["module_classes"] : null)) && ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") > $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")))) {
                        // line 349
                        echo "\t\t\t";
                        echo (isset($context["item"]) ? $context["item"] : null);
                        echo "
\t\t";
                    }
                    // line 351
                    echo "\t";
                } else {
                    // line 352
                    echo "\t\t";
                    echo (isset($context["item"]) ? $context["item"] : null);
                    echo "
\t";
                }
                // line 354
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
        // line 357
        echo "
";
        // line 359
        echo (isset($context["ul_close"]) ? $context["ul_close"] : null);
        echo "

";
        // line 362
        if ((((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_videos"]) ? $context["gallery_videos"] : null))) > 0) && !twig_in_filter("hide-video", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes"))) && twig_in_filter("video-bottom", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")))) {
            // line 363
            echo "\t";
            if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null))) > 0)) {
                echo "<hr>";
            }
            // line 364
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
        return array (  1016 => 364,  1011 => 363,  1009 => 362,  1004 => 359,  1001 => 357,  985 => 354,  979 => 352,  970 => 349,  964 => 347,  942 => 337,  939 => 336,  934 => 333,  927 => 330,  918 => 327,  915 => 325,  903 => 322,  897 => 320,  879 => 314,  876 => 313,  871 => 312,  868 => 311,  856 => 306,  852 => 304,  846 => 303,  840 => 301,  834 => 299,  828 => 297,  822 => 295,  819 => 294,  814 => 293,  809 => 292,  800 => 290,  797 => 288,  794 => 287,  791 => 286,  788 => 285,  785 => 284,  782 => 283,  779 => 281,  776 => 280,  773 => 278,  770 => 277,  732 => 274,  729 => 272,  720 => 268,  715 => 267,  712 => 266,  706 => 263,  703 => 262,  700 => 260,  697 => 259,  694 => 258,  691 => 257,  688 => 255,  685 => 254,  682 => 253,  679 => 252,  676 => 251,  671 => 248,  668 => 247,  665 => 246,  662 => 244,  659 => 243,  651 => 239,  645 => 237,  642 => 236,  639 => 234,  636 => 233,  633 => 232,  627 => 231,  622 => 230,  611 => 228,  603 => 227,  577 => 218,  573 => 217,  564 => 214,  561 => 212,  558 => 211,  549 => 210,  546 => 209,  543 => 208,  537 => 207,  532 => 206,  527 => 205,  514 => 203,  511 => 202,  508 => 201,  505 => 200,  502 => 198,  499 => 197,  496 => 195,  493 => 194,  490 => 193,  487 => 192,  484 => 191,  481 => 190,  478 => 189,  475 => 188,  472 => 187,  469 => 186,  466 => 184,  463 => 183,  460 => 182,  455 => 181,  452 => 180,  449 => 179,  446 => 178,  443 => 177,  440 => 176,  437 => 175,  434 => 173,  431 => 172,  426 => 171,  423 => 170,  420 => 169,  417 => 167,  414 => 166,  411 => 165,  368 => 148,  350 => 144,  348 => 141,  345 => 140,  342 => 138,  339 => 137,  336 => 135,  322 => 130,  319 => 128,  316 => 127,  313 => 126,  310 => 125,  307 => 124,  289 => 116,  286 => 115,  283 => 113,  280 => 112,  277 => 111,  274 => 109,  271 => 108,  268 => 107,  259 => 103,  256 => 102,  253 => 101,  250 => 100,  244 => 97,  241 => 96,  238 => 94,  235 => 93,  232 => 92,  229 => 91,  174 => 73,  169 => 70,  162 => 66,  159 => 65,  157 => 64,  154 => 63,  151 => 62,  142 => 59,  139 => 58,  136 => 57,  133 => 56,  130 => 55,  127 => 54,  124 => 52,  121 => 51,  118 => 50,  115 => 48,  98 => 41,  95 => 39,  78 => 32,  76 => 31,  51 => 17,  48 => 16,  45 => 15,  34 => 10,  1002 => 316,  988 => 315,  983 => 313,  980 => 312,  976 => 351,  973 => 309,  967 => 304,  961 => 346,  958 => 345,  955 => 343,  949 => 340,  946 => 339,  941 => 296,  936 => 295,  931 => 332,  926 => 293,  921 => 328,  914 => 291,  909 => 324,  906 => 289,  900 => 285,  894 => 284,  891 => 318,  885 => 316,  882 => 281,  877 => 280,  872 => 279,  867 => 278,  862 => 307,  855 => 276,  851 => 275,  842 => 274,  839 => 272,  836 => 271,  833 => 270,  830 => 269,  827 => 268,  824 => 267,  821 => 265,  818 => 264,  813 => 261,  798 => 260,  795 => 258,  790 => 255,  787 => 254,  780 => 253,  777 => 252,  771 => 251,  766 => 250,  761 => 249,  753 => 248,  745 => 247,  739 => 246,  731 => 245,  726 => 271,  723 => 269,  721 => 242,  709 => 265,  705 => 238,  701 => 236,  698 => 235,  695 => 234,  689 => 232,  686 => 231,  683 => 230,  680 => 229,  672 => 227,  669 => 226,  666 => 225,  663 => 224,  655 => 241,  652 => 221,  649 => 220,  643 => 218,  640 => 217,  632 => 215,  629 => 214,  619 => 212,  616 => 229,  613 => 209,  610 => 208,  607 => 207,  604 => 206,  601 => 205,  598 => 226,  595 => 225,  592 => 223,  589 => 222,  586 => 199,  583 => 197,  578 => 196,  575 => 194,  570 => 216,  567 => 215,  531 => 190,  528 => 188,  525 => 187,  522 => 186,  519 => 204,  516 => 184,  513 => 183,  510 => 182,  506 => 180,  503 => 179,  500 => 178,  497 => 177,  494 => 175,  491 => 174,  488 => 173,  485 => 172,  482 => 171,  479 => 170,  476 => 169,  473 => 168,  470 => 167,  467 => 166,  464 => 165,  461 => 164,  459 => 163,  456 => 162,  453 => 161,  451 => 160,  448 => 159,  445 => 158,  442 => 156,  439 => 155,  436 => 154,  433 => 153,  430 => 151,  427 => 150,  424 => 149,  421 => 148,  418 => 147,  415 => 146,  412 => 145,  409 => 162,  406 => 161,  403 => 160,  400 => 159,  397 => 158,  394 => 157,  391 => 156,  388 => 155,  385 => 154,  382 => 153,  379 => 152,  370 => 126,  367 => 125,  364 => 124,  361 => 147,  358 => 146,  355 => 120,  352 => 145,  343 => 118,  340 => 117,  337 => 116,  331 => 115,  325 => 131,  317 => 112,  309 => 111,  304 => 122,  298 => 120,  285 => 107,  276 => 104,  267 => 100,  264 => 99,  261 => 98,  252 => 94,  249 => 93,  246 => 92,  240 => 90,  237 => 88,  234 => 87,  231 => 86,  228 => 85,  226 => 90,  220 => 87,  217 => 85,  214 => 84,  193 => 72,  190 => 71,  187 => 70,  184 => 69,  181 => 68,  148 => 61,  145 => 60,  141 => 57,  138 => 56,  135 => 55,  132 => 53,  123 => 50,  120 => 49,  117 => 48,  114 => 47,  112 => 47,  106 => 45,  103 => 44,  100 => 42,  97 => 40,  82 => 34,  79 => 32,  72 => 28,  65 => 24,  60 => 22,  42 => 14,  40 => 12,  38 => 11,  31 => 9,  29 => 8,  90 => 30,  74 => 29,  71 => 24,  69 => 27,  61 => 23,  56 => 20,  44 => 15,  36 => 10,  27 => 7,  376 => 150,  373 => 149,  362 => 133,  359 => 131,  357 => 130,  353 => 129,  349 => 128,  347 => 127,  341 => 123,  338 => 121,  333 => 134,  330 => 133,  327 => 132,  321 => 115,  318 => 114,  314 => 111,  308 => 109,  305 => 108,  301 => 121,  295 => 119,  292 => 117,  288 => 99,  273 => 102,  270 => 101,  258 => 97,  255 => 95,  247 => 99,  243 => 91,  227 => 68,  224 => 66,  212 => 61,  189 => 54,  175 => 65,  172 => 64,  166 => 68,  163 => 46,  156 => 45,  150 => 62,  146 => 43,  140 => 41,  129 => 52,  126 => 51,  109 => 46,  92 => 29,  88 => 36,  85 => 35,  63 => 21,  53 => 18,  47 => 16,  32 => 9,  26 => 6,  24 => 5,  22 => 3,  290 => 108,  287 => 110,  284 => 109,  282 => 106,  279 => 105,  275 => 104,  272 => 103,  269 => 102,  265 => 105,  262 => 104,  248 => 96,  245 => 95,  242 => 93,  239 => 92,  236 => 91,  233 => 90,  230 => 69,  223 => 88,  221 => 86,  218 => 64,  215 => 63,  213 => 82,  211 => 83,  208 => 82,  205 => 81,  202 => 80,  199 => 79,  196 => 77,  194 => 76,  191 => 74,  188 => 72,  182 => 53,  179 => 68,  176 => 66,  173 => 65,  170 => 63,  167 => 62,  164 => 61,  161 => 60,  158 => 59,  155 => 63,  137 => 56,  134 => 40,  131 => 53,  128 => 52,  125 => 51,  122 => 50,  119 => 36,  116 => 34,  113 => 46,  110 => 45,  107 => 44,  102 => 32,  99 => 30,  96 => 32,  94 => 38,  91 => 37,  89 => 36,  87 => 35,  84 => 27,  80 => 33,  77 => 31,  73 => 29,  70 => 22,  68 => 26,  66 => 26,  64 => 25,  62 => 23,  59 => 22,  57 => 20,  54 => 18,  50 => 17,  46 => 16,  43 => 14,  41 => 13,  39 => 12,  37 => 11,  35 => 10,  33 => 9,  30 => 8,  28 => 7,  25 => 5,  23 => 3,  19 => 1,);
    }
}
