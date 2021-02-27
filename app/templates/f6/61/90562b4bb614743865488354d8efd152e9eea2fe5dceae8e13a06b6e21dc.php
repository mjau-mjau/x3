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
        $context["settings"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery");
        // line 4
        $context["items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "items"), ","));
        // line 5
        $context["limit"] = $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "limit");
        // line 6
        $context["folder_path"] = (((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "file_path"), "."))) . "/");
        // line 7
        if ((call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["limit"]) ? $context["limit"] : null))) || ((isset($context["limit"]) ? $context["limit"] : null) < 1))) {
            $context["limit"] = 99999;
        }
        // line 8
        $context["exif_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "popup"), "caption"), "exif_items"), ","));
        // line 9
        echo "
";
        // line 11
        if ((((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_videos"]) ? $context["gallery_videos"] : null))) > 0) && !twig_in_filter("hide-video", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes"))) && !twig_in_filter("video-bottom", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")))) {
            // line 12
            echo "\t";
            $this->env->loadTemplate("partials/module.video.html")->display($context);
            // line 13
            echo "\t";
            if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null))) > 0)) {
                // line 14
                echo "\t\t<hr>
\t";
            }
        }
        // line 17
        echo "
";
        // line 19
        $context["nofollow"] = (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "image_noindex")) ? (" rel=\"nofollow\"") : (""));
        // line 20
        echo "
";
        // line 22
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "enabled") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "justified")) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "columns"))) {
            // line 23
            echo "\t";
            $context["crop_ratio"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "crop"), 1, array(), "array") / $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "crop"), 0, array(), "array")) * 100);
            // line 24
            echo "\t";
            $context["data_crop"] = ((((" data-crop=\"" . call_user_func_array($this->env->getFilter('round')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "crop"), 0, array(), "array")))) . ".") . call_user_func_array($this->env->getFilter('round')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "crop"), "crop"), 1, array(), "array")))) . "\"");
        }
        // line 26
        echo "
";
        // line 28
        $context["gallery_split_view"] = (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "enabled") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "justified")) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "columns"));
        // line 29
        if ((isset($context["gallery_split_view"]) ? $context["gallery_split_view"] : null)) {
            // line 30
            echo "\t";
            // line 31
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "invert")) {
                // line 32
                echo "\t\t";
                $context["push"] = ("medium-push-" . (12 - $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio")));
                // line 33
                echo "\t\t";
                $context["pull"] = ("medium-pull-" . $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio"));
                // line 34
                echo "\t";
            }
        }
        // line 36
        echo "
";
        // line 38
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") == "grid")) {
            // line 39
            echo "
\t";
            // line 41
            echo "\t";
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "space") > (-1))) {
                // line 42
                echo "\t\t";
                $context["ul_style"] = ((" style=\"margin: 0 " . ((((isset($context["width"]) ? $context["width"] : null) == "wide")) ? (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "space") / 2)) : (((-$this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "space")) / 4)))) . "px\"");
                // line 43
                echo "\t\t";
                $context["li_style"] = ((((" style=\"padding: 0 " . ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "space") / 2)) . "px ") . $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "space")) . "px\"");
                // line 44
                echo "\t";
            }
            // line 45
            echo "
\t";
            // line 47
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "use_width")) {
                // line 48
                echo "\t\t";
                $context["ul_open"] = (("<ul class=\"items\"" . (isset($context["ul_style"]) ? $context["ul_style"] : null)) . ">");
                // line 49
                echo "
\t";
                // line 51
                echo "\t";
            } else {
                // line 52
                echo "\t\t";
                $context["block_grid"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array(call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "grid"), "columns"), array(" " => ""))), ","));
                // line 53
                echo "\t\t";
                $context["columns_max"] = call_user_func_array($this->env->getFunction('max')->getCallable(), array(call_user_func_array($this->env->getFunction('min')->getCallable(), array((isset($context["limit"]) ? $context["limit"] : null), call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null))))), 3));
                // line 54
                echo "\t\t";
                $context["small_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"))), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "1")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 55
                echo "\t\t";
                $context["medium_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "2")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 56
                echo "\t\t";
                $context["large_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"), "3"))) : ("3")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 57
                echo "\t\t";
                $context["ul_open"] = (((((((("<ul class=\"small-block-grid-" . (isset($context["small_grid"]) ? $context["small_grid"] : null)) . " medium-block-grid-") . (isset($context["medium_grid"]) ? $context["medium_grid"] : null)) . " large-block-grid-") . (isset($context["large_grid"]) ? $context["large_grid"] : null)) . " items\"") . (isset($context["ul_style"]) ? $context["ul_style"] : null)) . ">");
                // line 58
                echo "\t";
            }
            // line 59
            echo "
\t";
            // line 60
            echo "\t
\t";
            // line 61
            $context["li_open"] = (("<li" . (isset($context["li_style"]) ? $context["li_style"] : null)) . ">");
            // line 62
            echo "\t";
            $context["li_close"] = "</li>";
            // line 63
            echo "\t";
            $context["ul_close"] = "</ul>";
        }
        // line 65
        echo "
";
        // line 67
        echo (isset($context["ul_open"]) ? $context["ul_open"] : null);
        echo "

";
        // line 70
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
            // line 71
            echo "
";
            // line 73
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") < (isset($context["limit"]) ? $context["limit"] : null))) {
                // line 74
                echo "
\t";
                // line 76
                echo "\t";
                $context["url"] = ((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array((($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "file_path") . "/") . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), ".")));
                // line 77
                echo "\t";
                $context["url_escaped"] = call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["url"]) ? $context["url"] : null)));
                // line 78
                echo "\t";
                $context["image_link"] = (($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "link", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "link"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link")))) : ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link")));
                // line 79
                echo "\t";
                $context["link_target"] = (($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "target", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "target"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link_target")))) : ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "link_target")));
                // line 80
                echo "\t";
                $context["name_no_ext"] = call_user_func_array($this->env->getFilter('removeExtension')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")));
                // line 81
                echo "\t";
                $context["nofollow"] = "";
                // line 82
                echo "
\t";
                // line 84
                echo "\t";
                if ((isset($context["image_link"]) ? $context["image_link"] : null)) {
                    // line 85
                    echo "
\t\t";
                    // line 87
                    echo "\t\t";
                    if ((0 === substr_compare((isset($context["image_link"]) ? $context["image_link"] : null), ":nofollow", -strlen(":nofollow")))) {
                        // line 88
                        echo "\t\t\t";
                        $context["nofollow"] = " rel=\"nofollow\"";
                        // line 89
                        echo "\t\t\t";
                        $context["image_link"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["image_link"]) ? $context["image_link"] : null), array(":nofollow" => "")));
                        // line 90
                        echo "\t\t";
                    }
                    // line 91
                    echo "
\t\t";
                    // line 93
                    echo "\t\t";
                    $context["link_href"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["image_link"]) ? $context["image_link"] : null), array("{file_name}" => (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), "{file_name_ext}" => $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), "{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"))));
                    // line 94
                    echo "
\t\t";
                    // line 96
                    echo "\t\t";
                    if ((call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["link_target"]) ? $context["link_target"] : null))) || ((isset($context["link_target"]) ? $context["link_target"] : null) == "auto"))) {
                        // line 97
                        echo "\t\t\t";
                        if (((0 === strpos(call_user_func_array($this->env->getFilter('lower')->getCallable(), array($this->env, (isset($context["link_href"]) ? $context["link_href"] : null))), "http")) || call_user_func_array($this->env->getFunction('hasExtension')->getCallable(), array((isset($context["link_href"]) ? $context["link_href"] : null))))) {
                            // line 98
                            echo "\t\t\t\t";
                            $context["link_target"] = " target=\"_blank\"";
                            // line 99
                            echo "\t\t\t";
                        } else {
                            // line 100
                            echo "\t\t\t\t";
                            $context["link_target"] = "";
                            // line 101
                            echo "\t\t\t";
                        }
                        // line 102
                        echo "
\t\t";
                        // line 104
                        echo "\t\t";
                    } elseif (((isset($context["link_target"]) ? $context["link_target"] : null) == "popup")) {
                        // line 105
                        echo "\t\t\t";
                        $context["link_target"] = ((((((" data-popup-window=\"" . call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "name"), array(" " => "-")))) . ",") . $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "popup_width")) . ",") . $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "popup_height")) . "\"");
                        // line 106
                        echo "
\t\t";
                        // line 108
                        echo "\t\t";
                    } elseif (((isset($context["link_target"]) ? $context["link_target"] : null) == "_blank")) {
                        // line 109
                        echo "\t\t\t";
                        $context["link_target"] = " target=\"_blank\"";
                        // line 110
                        echo "
\t\t";
                        // line 112
                        echo "\t\t";
                    } elseif (((isset($context["link_target"]) ? $context["link_target"] : null) == "x3_popup")) {
                        // line 113
                        echo "\t\t\t";
                        $context["link_target"] = " data-popup";
                        // line 114
                        echo "
\t\t";
                        // line 116
                        echo "\t\t";
                    } else {
                        // line 117
                        echo "\t\t\t";
                        $context["link_target"] = "";
                        // line 118
                        echo "\t\t";
                    }
                    // line 119
                    echo "
\t";
                    // line 121
                    echo "\t";
                } else {
                    // line 122
                    echo "\t\t";
                    $context["link_href"] = ((call_user_func_array($this->env->getFilter('setpath')->getCallable(), array($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "permalink"), (isset($context["rootpath"]) ? $context["rootpath"] : null))) . call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), array(" " => "_")))) . "/");
                    // line 123
                    echo "\t\t";
                    $context["link_target"] = "";
                    // line 124
                    echo "\t";
                }
                // line 125
                echo "
\t";
                // line 127
                echo "\t";
                $context["exif_array"] = array();
                // line 128
                echo "\t";
                // line 129
                echo "\t";
                $context["data_exif"] = "";
                // line 130
                echo "\t";
                $context["geo"] = "";
                // line 131
                echo "\t";
                $context["data_geo"] = "";
                // line 132
                echo "
\t";
                // line 134
                echo "\t";
                if ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif")) {
                    // line 135
                    echo "
\t\t";
                    // line 137
                    echo "\t\t";
                    if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["exif_items"]) ? $context["exif_items"] : null))) > 0)) {
                        // line 138
                        echo "\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["exif_items"]) ? $context["exif_items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["key"]) {
                            if ($this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), (isset($context["key"]) ? $context["key"] : null), array(), "array")) {
                                // line 139
                                echo "\t\t    ";
                                $context["exif_array"] = call_user_func_array($this->env->getFilter('merge')->getCallable(), array((isset($context["exif_array"]) ? $context["exif_array"] : null), array((isset($context["key"]) ? $context["key"] : null) => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), (isset($context["key"]) ? $context["key"] : null), array(), "array"))));
                                // line 140
                                echo "\t\t\t";
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['key'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 141
                        echo "\t\t\t";
                        if (call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["exif_array"]) ? $context["exif_array"] : null)))) {
                            $context["data_exif"] = ((" data-exif=\"" . call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('json_encode')->getCallable(), array((isset($context["exif_array"]) ? $context["exif_array"] : null))), "html_attr"))) . "\"");
                        }
                        // line 142
                        echo "\t\t";
                    }
                    // line 143
                    echo "
\t\t";
                    // line 145
                    echo "\t\t";
                    if (($this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude") && $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"))) {
                        // line 146
                        echo "\t\t\t";
                        $context["geo"] = (($this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude") . ",") . $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"));
                        // line 147
                        echo "\t\t\t";
                        $context["map_embed_src"] = (("https://www.google.com/maps/embed/v1/place?q=" . (isset($context["geo"]) ? $context["geo"] : null)) . "&amp;key=AIzaSyDRp6xla9SxUmTBu6l_kprhjjI9e5-EVZk");
                        // line 148
                        echo "\t\t\t";
                        $context["map_link_src"] = ("https://www.google.com/maps/search/?api=1&query=" . (isset($context["geo"]) ? $context["geo"] : null));
                        // line 149
                        echo "\t\t\t";
                        // line 150
                        echo "\t\t\t";
                        $context["map_embed_button_item"] = (((("<button data-href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"button small button-map\" data-lang=\"map\"></button>");
                        // line 151
                        echo "\t\t\t";
                        $context["map_button_popup"] = (((("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"button small button-map\" target=\"_blank\" data-lang=\"map\"></a>");
                        // line 152
                        echo "\t\t\t";
                        $context["map_link_popup"] = (((("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"link-map\" target=\"_blank\" data-lang=\"map\"></a>");
                        // line 153
                        echo "\t\t\t";
                        $context["map_button"] = (("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" class=\"button small button-map\" target=\"_blank\" data-lang=\"map\"></a>");
                        // line 154
                        echo "\t\t\t";
                        $context["map_link"] = (("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" class=\"link-map\" target=\"_blank\" data-lang=\"map\"></a>");
                        // line 155
                        echo "\t\t\t";
                        $context["data_geo"] = ((" data-geo=\"" . (isset($context["geo"]) ? $context["geo"] : null)) . "\"");
                        // line 156
                        echo "\t\t";
                    }
                    // line 157
                    echo "\t";
                }
                // line 158
                echo "
\t";
                // line 160
                echo "\t";
                $context["title"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array(call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "title"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "title"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "title_include"))), "<a><span><em><i><b><strong><small><s><mark>")), array("{file_name}" => (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), "{file_name_ext}" => $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), "{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"))));
                // line 161
                echo "\t";
                $context["title_name"] = ((array_key_exists("title", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["title"]) ? $context["title"] : null), $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "name")))) : ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "name")));
                // line 162
                echo "\t";
                if (((isset($context["title"]) ? $context["title"] : null) && (isset($context["geo"]) ? $context["geo"] : null))) {
                    $context["title"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["title"]) ? $context["title"] : null), array("{latitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude"), "{longitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"), "{map_embed_src}" => (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null), "{map_link_src}" => (isset($context["map_link_src"]) ? $context["map_link_src"] : null), "{map_button_popup}" => (isset($context["map_button_popup"]) ? $context["map_button_popup"] : null), "{map_link_popup}" => (isset($context["map_link_popup"]) ? $context["map_link_popup"] : null), "{map_button}" => (isset($context["map_button"]) ? $context["map_button"] : null), "{map_link}" => (isset($context["map_link"]) ? $context["map_link"] : null))));
                }
                // line 163
                echo "\t";
                $context["title_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["title_name"]) ? $context["title_name"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                // line 164
                echo "
\t";
                // line 166
                echo "\t";
                $context["image_description"] = call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "description"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "description"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "description_include")));
                // line 167
                echo "\t";
                if (call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null)))) {
                    // line 168
                    echo "\t\t";
                    $context["description"] = "";
                    // line 169
                    echo "\t\t";
                    $context["description_pseudo"] = "";
                    // line 170
                    echo "\t";
                } else {
                    // line 171
                    echo "\t\t";
                    $context["description"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null), "<a><span><em><i><b><strong><small><s><br><mark><img><kbd><code><button>")), array("{file_name}" => (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), "{file_name_ext}" => $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), "{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"))));
                    // line 172
                    echo "\t\t";
                    if ((isset($context["geo"]) ? $context["geo"] : null)) {
                        $context["description"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["description"]) ? $context["description"] : null), array("{latitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude"), "{longitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"), "{map_embed_src}" => (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null), "{map_link_src}" => (isset($context["map_link_src"]) ? $context["map_link_src"] : null), "{map_button_popup}" => (isset($context["map_button_popup"]) ? $context["map_button_popup"] : null), "{map_link_popup}" => (isset($context["map_link_popup"]) ? $context["map_link_popup"] : null), "{map_button}" => (isset($context["map_button"]) ? $context["map_button"] : null), "{map_link}" => (isset($context["map_link"]) ? $context["map_link"] : null))));
                    }
                    // line 173
                    echo "\t\t";
                    $context["description_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["description"]) ? $context["description"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                    // line 174
                    echo "\t";
                }
                // line 175
                echo "
\t";
                // line 177
                echo "\t";
                $context["date"] = $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "date");
                // line 178
                echo "\t";
                if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "date_format") == "timeago")) {
                    // line 179
                    echo "\t\t";
                    $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "d F Y"));
                    // line 180
                    echo "\t\t";
                    $context["date_class"] = "date timeago";
                    // line 181
                    echo "\t";
                } else {
                    // line 182
                    echo "\t\t";
                    $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format"), "d F Y"))) : ("d F Y"))));
                    // line 183
                    echo "\t\t";
                    $context["date_class"] = "date";
                    // line 184
                    echo "\t";
                }
                // line 185
                echo "\t";
                $context["time_tag"] = (((((("<time itemprop=\"dateCreated\" datetime=\"" . call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"))) . "\" class=\"") . (isset($context["date_class"]) ? $context["date_class"] : null)) . "\">") . (isset($context["date_formatted"]) ? $context["date_formatted"] : null)) . "</time>");
                // line 186
                echo "
\t";
                // line 188
                echo "\t";
                $context["image_ratio"] = ((array_key_exists("crop_ratio", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["crop_ratio"]) ? $context["crop_ratio"] : null), (($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") / $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")) * 100)))) : ((($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") / $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")) * 100)));
                // line 189
                echo "
\t";
                // line 191
                echo "\t";
                if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "tooltip"), "enabled")) {
                    // line 192
                    echo "\t\t";
                    $context["tooltip_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "tooltip"), "items"), ","));
                    // line 193
                    echo "\t\t";
                    ob_start();
                    // line 194
                    echo "\t\t";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["tooltip_items"]) ? $context["tooltip_items"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 195
                        echo "\t\t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                            echo "<span class=\"title\">";
                            echo (isset($context["title_name"]) ? $context["title_name"] : null);
                            echo "</span>
\t\t\t";
                        } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                            // line 196
                            echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                            echo "
\t\t\t";
                        } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename")) {
                            // line 197
                            echo "<span>";
                            echo (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null);
                            echo "</span>
\t\t\t";
                        } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename_ext")) {
                            // line 198
                            echo "<span>";
                            echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name");
                            echo "</span>
\t\t\t";
                        } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                            // line 199
                            echo "<span class=\"description\">";
                            echo (isset($context["description"]) ? $context["description"] : null);
                            echo "</span>";
                        }
                        // line 200
                        echo "\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 201
                    echo "\t\t";
                    $context["link_title_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 202
                    echo "\t\t";
                    $context["link_title_content"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["link_title_content"]) ? $context["link_title_content"] : null), "html"))));
                    // line 203
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["link_title_content"]) ? $context["link_title_content"] : null))))) {
                        ob_start();
                        echo " title=\"";
                        echo (isset($context["link_title_content"]) ? $context["link_title_content"] : null);
                        echo "\"";
                        $context["link_title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    }
                    // line 204
                    echo "\t";
                }
                // line 205
                echo "
\t";
                // line 207
                echo "\t";
                ob_start();
                // line 208
                echo "\t";
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow")) {
                    // line 209
                    echo "\t<figure>
\t\t\t<div class=\"image-container\" style=\"padding-bottom:";
                    // line 210
                    echo (isset($context["image_ratio"]) ? $context["image_ratio"] : null);
                    echo "%;\">
\t\t\t\t<img data-src=\"";
                    // line 211
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
                    // line 215
                    echo "\t\t";
                    if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "caption"), "enabled")) {
                        // line 216
                        echo "
\t\t\t";
                        // line 218
                        echo "\t\t\t";
                        ob_start();
                        // line 219
                        echo "\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "caption"), "items"), ",")));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 220
                            echo "\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo "<span class=\"title\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</span>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 221
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename")) {
                                // line 222
                                echo "<span>";
                                echo (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null);
                                echo "</span>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename_ext")) {
                                // line 223
                                echo "<span>";
                                echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name");
                                echo "</span>
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 224
                                echo " ";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description_pseudo"]) ? $context["description_pseudo"] : null)))))) {
                                // line 225
                                echo "<span class=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</span>";
                            }
                            // line 226
                            echo "\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 227
                        echo "\t\t\t";
                        $context["figcaption_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 228
                        echo "\t\t\t";
                        $context["figcaption_content"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["figcaption_content"]) ? $context["figcaption_content"] : null)));
                        // line 229
                        echo "
\t\t\t";
                        // line 231
                        echo "\t\t\t";
                        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["figcaption_content"]) ? $context["figcaption_content"] : null))))) {
                            // line 232
                            echo "\t\t\t\t<figcaption itemprop=\"caption description\">";
                            echo (isset($context["figcaption_content"]) ? $context["figcaption_content"] : null);
                            echo "</figcaption>
\t\t\t";
                        }
                        // line 234
                        echo "
  \t";
                    }
                    // line 236
                    echo "\t</figure>
\t";
                }
                // line 238
                echo "\t";
                $context["figure"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 239
                echo "
\t";
                // line 241
                echo "\t";
                ob_start();
                // line 242
                echo "
\t\t";
                // line 243
                echo (isset($context["li_open"]) ? $context["li_open"] : null);
                echo "

\t\t";
                // line 246
                echo "\t\t";
                $context["anchor_class"] = "item img-link item-link";
                // line 247
                echo "\t\t";
                if (((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "clickable") && $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "popup"), "enabled")) && call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["image_link"]) ? $context["image_link"] : null)))) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow"))) {
                    // line 248
                    echo "\t\t\t";
                    $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " x3-popup");
                    // line 249
                    echo "\t\t";
                }
                // line 250
                echo "
\t\t";
                // line 252
                echo "\t\t";
                if ((isset($context["gallery_split_view"]) ? $context["gallery_split_view"] : null)) {
                    // line 253
                    echo "\t\t\t";
                    $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " row");
                    // line 254
                    echo "\t\t";
                }
                // line 255
                echo "
\t\t";
                // line 257
                echo "\t\t";
                $context["link_tag"] = (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "clickable")) ? ("a") : ("span"));
                // line 258
                echo "
\t\t";
                // line 260
                echo "\t\t";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plugins"), "panorama"), "enabled")) {
                    // line 261
                    echo "\t\t\t";
                    $context["data_pano"] = call_user_func_array($this->env->getFunction('pano_params')->getCallable(), array((isset($context["image"]) ? $context["image"] : null), (isset($context["assetspath"]) ? $context["assetspath"] : null)));
                    // line 262
                    echo "\t\t\t";
                    if ((0 === strpos((isset($context["data_pano"]) ? $context["data_pano"] : null), " data-panorama="))) {
                        $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " x3-panorama");
                    }
                    // line 263
                    echo "\t\t";
                }
                // line 264
                echo "
\t\t";
                // line 266
                echo "\t\t";
                $context["data_is_link"] = (((isset($context["image_link"]) ? $context["image_link"] : null)) ? (" data-is-link=\"true\"") : (""));
                // line 267
                echo "
\t\t";
                // line 269
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
                // line 272
                echo "\t\t";
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow")) {
                    // line 273
                    echo "
\t\t\t";
                    // line 275
                    echo "\t\t\t";
                    if ((isset($context["gallery_split_view"]) ? $context["gallery_split_view"] : null)) {
                        // line 276
                        echo "
\t\t\t\t";
                        // line 278
                        echo "\t\t\t\t";
                        if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "invert")) {
                            // line 279
                            echo "\t\t\t\t\t";
                            $context["text_align"] = "medium-text-left";
                            // line 280
                            echo "\t\t\t\t";
                        } elseif ((!twig_in_filter("text-right", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")) && !twig_in_filter("text-left", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")))) {
                            // line 281
                            echo "\t\t\t\t\t";
                            $context["text_align"] = "medium-text-right";
                            // line 282
                            echo "\t\t\t\t";
                        }
                        // line 283
                        echo "
\t\t\t\t";
                        // line 285
                        echo "\t\t\t\t<div class=\"medium-";
                        echo $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio");
                        echo " columns ";
                        echo (isset($context["push"]) ? $context["push"] : null);
                        echo " ";
                        echo (isset($context["text_align"]) ? $context["text_align"] : null);
                        echo "\">
\t\t\t\t\t";
                        // line 287
                        echo "\t\t\t\t\t";
                        if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["items"]) ? $context["items"] : null))) < 2)) {
                            $context["items"] = call_user_func_array($this->env->getFilter('merge')->getCallable(), array((isset($context["items"]) ? $context["items"] : null), array(0 => "title", 1 => "description")));
                        }
                        // line 288
                        echo "\t\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 289
                            echo "\t\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                // line 290
                                echo "\t\t\t\t\t\t\t<h2 class=\"title\" itemprop=\"caption\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</h2>
\t\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                                // line 292
                                echo "\t\t\t\t\t\t\t<p itemprop=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</p>
\t\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 294
                                echo "\t\t\t\t\t\t\t<h6 class=\"date\">";
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "</h6>
\t\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename")) {
                                // line 296
                                echo "\t\t\t\t\t\t\t<span class=\"gallery-filename\">";
                                echo (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null);
                                echo "</span>
\t\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename_ext")) {
                                // line 298
                                echo "\t\t\t\t\t\t\t<span class=\"gallery-filename_ext\">";
                                echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name");
                                echo "</span>
\t\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 300
                                echo "\t\t\t\t\t\t\t";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t\t";
                            }
                            // line 302
                            echo "\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 303
                        echo "
\t\t\t\t</div>
\t\t\t\t<div class=\"medium-";
                        // line 305
                        echo (12 - $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio"));
                        echo " columns ";
                        echo (isset($context["pull"]) ? $context["pull"] : null);
                        echo "\">
\t\t\t\t\t";
                        // line 306
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t\t\t</div>

\t\t\t";
                        // line 310
                        echo "\t\t\t";
                    } elseif (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "justified")) {
                        // line 311
                        echo "\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 312
                            echo "\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                // line 313
                                echo "\t\t\t\t\t\t<h2 class=\"title\" itemprop=\"caption\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</h2>
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                                // line 315
                                echo "\t\t\t\t\t\t<p itemprop=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</p>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 317
                                echo "\t\t\t\t\t\t<h6 class=\"date\">";
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "</h6>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename")) {
                                // line 319
                                echo "\t\t\t\t\t\t<span class=\"gallery-filename\">";
                                echo (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null);
                                echo "</span>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename_ext")) {
                                // line 321
                                echo "\t\t\t\t\t\t<span class=\"gallery-filename_ext\">";
                                echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name");
                                echo "</span>
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 323
                                echo "\t\t\t\t\t\t";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "preview")) {
                                // line 325
                                echo "\t\t\t\t\t\t";
                                echo (isset($context["figure"]) ? $context["figure"] : null);
                                echo "
\t\t\t\t\t";
                            }
                            // line 327
                            echo "\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 328
                        echo "
\t\t\t";
                        // line 330
                        echo "\t\t\t";
                    } else {
                        // line 331
                        echo "\t\t\t\t";
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t\t";
                    }
                    // line 333
                    echo "
\t\t";
                }
                // line 335
                echo "
\t\t</";
                // line 336
                echo (isset($context["link_tag"]) ? $context["link_tag"] : null);
                echo ">

\t\t";
                // line 339
                echo "\t\t";
                if ((((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") == "vertical")) && $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "vertical"), "horizontal_rule"))) {
                    // line 340
                    echo "\t\t\t<hr class=\"hr\">
\t\t";
                }
                // line 342
                echo "
\t\t";
                // line 343
                echo (isset($context["li_close"]) ? $context["li_close"] : null);
                echo "

\t";
                $context["item"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 346
                echo "
\t";
                // line 348
                echo "\t";
                if ((twig_in_filter("landscape", (isset($context["module_classes"]) ? $context["module_classes"] : null)) || twig_in_filter("portrait", (isset($context["module_classes"]) ? $context["module_classes"] : null)))) {
                    // line 349
                    echo "\t\t";
                    if ((twig_in_filter("landscape", (isset($context["module_classes"]) ? $context["module_classes"] : null)) && ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width") > $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height")))) {
                        // line 350
                        echo "\t\t\t";
                        echo (isset($context["item"]) ? $context["item"] : null);
                        echo "
\t\t";
                    } elseif ((twig_in_filter("portrait", (isset($context["module_classes"]) ? $context["module_classes"] : null)) && ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") > $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")))) {
                        // line 352
                        echo "\t\t\t";
                        echo (isset($context["item"]) ? $context["item"] : null);
                        echo "
\t\t";
                    }
                    // line 354
                    echo "\t";
                } else {
                    // line 355
                    echo "\t\t";
                    echo (isset($context["item"]) ? $context["item"] : null);
                    echo "
\t";
                }
                // line 357
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
        // line 360
        echo "
";
        // line 362
        echo (isset($context["ul_close"]) ? $context["ul_close"] : null);
        echo "

";
        // line 365
        if ((((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_videos"]) ? $context["gallery_videos"] : null))) > 0) && !twig_in_filter("hide-video", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes"))) && twig_in_filter("video-bottom", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")))) {
            // line 366
            echo "\t";
            if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null))) > 0)) {
                echo "<hr>";
            }
            // line 367
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
        return array (  1056 => 367,  1051 => 366,  1049 => 365,  1044 => 362,  1041 => 360,  1025 => 357,  1019 => 355,  1016 => 354,  1004 => 350,  1001 => 349,  998 => 348,  995 => 346,  989 => 343,  986 => 342,  982 => 340,  979 => 339,  974 => 336,  971 => 335,  967 => 333,  961 => 331,  958 => 330,  955 => 328,  943 => 325,  937 => 323,  931 => 321,  925 => 319,  919 => 317,  913 => 315,  907 => 313,  904 => 312,  896 => 310,  884 => 305,  874 => 302,  868 => 300,  862 => 298,  856 => 296,  830 => 288,  825 => 287,  816 => 285,  813 => 283,  810 => 282,  807 => 281,  804 => 280,  801 => 279,  792 => 275,  789 => 273,  786 => 272,  748 => 269,  742 => 266,  739 => 264,  736 => 263,  731 => 262,  728 => 261,  725 => 260,  722 => 258,  719 => 257,  716 => 255,  713 => 254,  710 => 253,  698 => 248,  687 => 243,  684 => 242,  681 => 241,  675 => 238,  671 => 236,  661 => 232,  658 => 231,  655 => 229,  652 => 228,  649 => 227,  643 => 226,  638 => 225,  632 => 224,  626 => 223,  620 => 222,  607 => 220,  602 => 219,  599 => 218,  596 => 216,  593 => 215,  581 => 211,  574 => 209,  571 => 208,  568 => 207,  565 => 205,  562 => 204,  553 => 203,  550 => 202,  547 => 201,  541 => 200,  536 => 199,  519 => 196,  511 => 195,  506 => 194,  503 => 193,  500 => 192,  497 => 191,  494 => 189,  491 => 188,  488 => 186,  485 => 185,  482 => 184,  479 => 183,  476 => 182,  473 => 181,  470 => 180,  467 => 179,  464 => 178,  452 => 173,  418 => 162,  415 => 161,  412 => 160,  409 => 158,  406 => 157,  403 => 156,  400 => 155,  397 => 154,  394 => 153,  391 => 152,  388 => 151,  385 => 150,  383 => 149,  380 => 148,  377 => 147,  374 => 146,  371 => 145,  368 => 143,  353 => 140,  338 => 135,  335 => 134,  332 => 132,  329 => 131,  326 => 130,  323 => 129,  315 => 125,  303 => 121,  294 => 117,  291 => 116,  288 => 114,  225 => 88,  222 => 87,  219 => 85,  216 => 84,  210 => 81,  207 => 80,  204 => 79,  201 => 78,  198 => 77,  195 => 76,  192 => 74,  165 => 67,  162 => 65,  153 => 61,  147 => 59,  144 => 58,  111 => 45,  108 => 44,  105 => 43,  81 => 32,  78 => 31,  76 => 30,  55 => 19,  52 => 17,  34 => 8,  1010 => 352,  996 => 321,  991 => 319,  988 => 318,  984 => 316,  981 => 315,  975 => 310,  969 => 308,  966 => 307,  963 => 305,  957 => 304,  954 => 303,  949 => 327,  944 => 301,  939 => 300,  934 => 299,  929 => 298,  922 => 297,  917 => 296,  914 => 295,  908 => 291,  902 => 290,  899 => 311,  893 => 288,  890 => 306,  885 => 286,  880 => 303,  875 => 284,  870 => 283,  863 => 282,  859 => 281,  850 => 294,  847 => 278,  844 => 292,  841 => 276,  838 => 290,  835 => 289,  832 => 273,  829 => 271,  826 => 270,  821 => 267,  806 => 266,  803 => 264,  798 => 278,  795 => 276,  788 => 259,  785 => 258,  779 => 257,  774 => 256,  769 => 255,  759 => 254,  750 => 252,  745 => 267,  737 => 249,  732 => 248,  729 => 247,  727 => 246,  715 => 243,  711 => 242,  707 => 252,  704 => 250,  701 => 249,  695 => 247,  692 => 246,  689 => 234,  686 => 233,  678 => 239,  676 => 230,  673 => 229,  670 => 228,  667 => 234,  659 => 225,  657 => 224,  654 => 223,  651 => 222,  645 => 220,  642 => 219,  634 => 217,  631 => 216,  621 => 214,  618 => 213,  615 => 221,  612 => 210,  609 => 209,  606 => 208,  603 => 207,  600 => 206,  597 => 205,  594 => 204,  591 => 202,  588 => 201,  585 => 199,  580 => 198,  577 => 210,  572 => 195,  569 => 193,  533 => 192,  530 => 198,  527 => 189,  524 => 197,  521 => 187,  518 => 186,  515 => 185,  512 => 184,  508 => 182,  505 => 181,  502 => 180,  499 => 179,  496 => 177,  493 => 176,  490 => 175,  487 => 174,  484 => 173,  481 => 172,  478 => 171,  475 => 170,  472 => 169,  469 => 168,  466 => 167,  463 => 166,  461 => 177,  458 => 175,  455 => 174,  453 => 162,  450 => 161,  447 => 172,  444 => 171,  441 => 170,  438 => 169,  435 => 168,  432 => 167,  429 => 166,  426 => 164,  423 => 163,  420 => 149,  417 => 148,  414 => 147,  411 => 145,  408 => 144,  405 => 142,  402 => 141,  399 => 140,  396 => 139,  393 => 138,  390 => 136,  387 => 135,  384 => 133,  381 => 132,  378 => 130,  375 => 129,  372 => 128,  369 => 127,  366 => 126,  363 => 125,  357 => 122,  354 => 121,  345 => 120,  342 => 119,  339 => 118,  327 => 115,  317 => 114,  308 => 112,  304 => 110,  298 => 109,  285 => 113,  276 => 109,  273 => 108,  267 => 105,  264 => 104,  261 => 102,  252 => 99,  249 => 98,  246 => 97,  240 => 94,  237 => 93,  234 => 91,  231 => 90,  228 => 89,  226 => 84,  220 => 82,  217 => 81,  214 => 80,  193 => 72,  190 => 73,  187 => 71,  184 => 69,  181 => 68,  148 => 61,  145 => 59,  141 => 57,  138 => 56,  135 => 55,  132 => 54,  123 => 51,  120 => 49,  117 => 48,  114 => 47,  112 => 46,  106 => 44,  103 => 42,  100 => 41,  97 => 40,  82 => 34,  79 => 32,  72 => 28,  65 => 24,  60 => 22,  42 => 14,  40 => 13,  38 => 12,  31 => 9,  29 => 8,  90 => 30,  74 => 29,  71 => 24,  69 => 26,  61 => 18,  56 => 17,  44 => 13,  36 => 9,  27 => 7,  379 => 143,  376 => 142,  365 => 142,  362 => 134,  360 => 141,  356 => 132,  352 => 131,  350 => 139,  344 => 138,  341 => 137,  336 => 123,  333 => 117,  330 => 120,  324 => 118,  321 => 128,  318 => 127,  312 => 124,  309 => 123,  306 => 122,  300 => 119,  297 => 118,  293 => 104,  278 => 97,  270 => 106,  258 => 101,  255 => 100,  247 => 81,  243 => 96,  227 => 68,  224 => 66,  212 => 61,  189 => 54,  175 => 65,  172 => 64,  166 => 48,  163 => 46,  156 => 45,  150 => 60,  146 => 43,  140 => 41,  129 => 53,  126 => 52,  109 => 45,  92 => 29,  88 => 36,  85 => 35,  63 => 21,  53 => 18,  47 => 14,  32 => 8,  26 => 5,  24 => 4,  22 => 3,  290 => 108,  287 => 101,  284 => 99,  282 => 112,  279 => 110,  275 => 96,  272 => 94,  269 => 102,  265 => 99,  262 => 97,  248 => 96,  245 => 95,  242 => 93,  239 => 92,  236 => 91,  233 => 90,  230 => 69,  223 => 83,  221 => 86,  218 => 64,  215 => 63,  213 => 82,  211 => 79,  208 => 78,  205 => 77,  202 => 76,  199 => 75,  196 => 74,  194 => 74,  191 => 73,  188 => 72,  182 => 53,  179 => 68,  176 => 66,  173 => 65,  170 => 70,  167 => 62,  164 => 61,  161 => 60,  158 => 63,  155 => 62,  137 => 56,  134 => 40,  131 => 53,  128 => 52,  125 => 51,  122 => 50,  119 => 36,  116 => 34,  113 => 46,  110 => 45,  107 => 44,  102 => 42,  99 => 41,  96 => 39,  94 => 38,  91 => 36,  89 => 36,  87 => 34,  84 => 33,  80 => 24,  77 => 31,  73 => 28,  70 => 22,  68 => 26,  66 => 25,  64 => 20,  62 => 23,  59 => 21,  57 => 20,  54 => 18,  50 => 17,  46 => 16,  43 => 14,  41 => 12,  39 => 11,  37 => 11,  35 => 10,  33 => 9,  30 => 7,  28 => 6,  25 => 5,  23 => 3,  19 => 1,);
    }
}
