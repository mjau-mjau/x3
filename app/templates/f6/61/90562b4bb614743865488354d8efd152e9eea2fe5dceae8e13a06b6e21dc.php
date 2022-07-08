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
        $context["folder_path"] = (((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "file_path"), "."))) . "/");
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
            // line 61
            echo "\t";
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
                $context["url"] = ((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, (($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "file_path") . "/") . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), ".")));
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
                        $context["map_embed_button_item"] = (((("<button data-href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"button small button-map\" data-lang=\"map\"></button>");
                        // line 150
                        echo "\t\t\t";
                        $context["map_button_popup"] = (((("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"button small button-map\" target=\"_blank\" data-lang=\"map\"></a>");
                        // line 151
                        echo "\t\t\t";
                        $context["map_link_popup"] = (((("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" data-embed-modal=\"") . (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null)) . "\" class=\"link-map\" target=\"_blank\" data-lang=\"map\"></a>");
                        // line 152
                        echo "\t\t\t";
                        $context["map_button"] = (("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" class=\"button small button-map\" target=\"_blank\" data-lang=\"map\"></a>");
                        // line 153
                        echo "\t\t\t";
                        $context["map_link"] = (("<a href=\"" . (isset($context["map_link_src"]) ? $context["map_link_src"] : null)) . "\" class=\"link-map\" target=\"_blank\" data-lang=\"map\"></a>");
                        // line 154
                        echo "\t\t\t";
                        $context["data_geo"] = ((" data-geo=\"" . (isset($context["geo"]) ? $context["geo"] : null)) . "\"");
                        // line 155
                        echo "\t\t";
                    }
                    // line 156
                    echo "\t";
                }
                // line 157
                echo "
\t";
                // line 159
                echo "\t";
                $context["title"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array($this->env, call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "title"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "title"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "title_include"))), "<a><span><em><i><b><strong><small><s><mark>")), array("{file_name}" => (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), "{file_name_ext}" => $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), "{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"))));
                // line 160
                echo "\t";
                $context["title_name"] = ((array_key_exists("title", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["title"]) ? $context["title"] : null), $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "name")))) : ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "name")));
                // line 161
                echo "\t";
                if (((isset($context["title"]) ? $context["title"] : null) && (isset($context["geo"]) ? $context["geo"] : null))) {
                    $context["title"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["title"]) ? $context["title"] : null), array("{latitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude"), "{longitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"), "{map_embed_src}" => (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null), "{map_link_src}" => (isset($context["map_link_src"]) ? $context["map_link_src"] : null), "{map_button_popup}" => (isset($context["map_button_popup"]) ? $context["map_button_popup"] : null), "{map_link_popup}" => (isset($context["map_link_popup"]) ? $context["map_link_popup"] : null), "{map_button}" => (isset($context["map_button"]) ? $context["map_button"] : null), "{map_link}" => (isset($context["map_link"]) ? $context["map_link"] : null))));
                }
                // line 162
                echo "\t";
                $context["title_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["title_name"]) ? $context["title_name"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                // line 163
                echo "
\t";
                // line 165
                echo "\t";
                $context["image_description"] = call_user_func_array($this->env->getFunction('getDefault')->getCallable(), array($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "description"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "description"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "image"), "description_include")));
                // line 166
                echo "\t";
                if (call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["image_description"]) ? $context["image_description"] : null)))) {
                    // line 167
                    echo "\t\t";
                    $context["description"] = "";
                    // line 168
                    echo "\t\t";
                    $context["description_pseudo"] = "";
                    // line 169
                    echo "\t";
                } else {
                    // line 170
                    echo "\t\t";
                    $context["description"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('striptags')->getCallable(), array($this->env, (isset($context["image_description"]) ? $context["image_description"] : null), "<a><span><em><i><b><strong><small><s><br><mark><img><kbd><code><button>")), array("{file_name}" => (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null), "{file_name_ext}" => $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name"), "{path}" => (isset($context["folder_path"]) ? $context["folder_path"] : null), "{image_path}" => ((isset($context["folder_path"]) ? $context["folder_path"] : null) . $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name")), "{{files}}" => ((isset($context["assetspath"]) ? $context["assetspath"] : null) . "/content/custom/files"))));
                    // line 171
                    echo "\t\t";
                    if ((isset($context["geo"]) ? $context["geo"] : null)) {
                        $context["description"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["description"]) ? $context["description"] : null), array("{latitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "latitude"), "{longitude}" => $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "exif"), "longitude"), "{map_embed_src}" => (isset($context["map_embed_src"]) ? $context["map_embed_src"] : null), "{map_link_src}" => (isset($context["map_link_src"]) ? $context["map_link_src"] : null), "{map_button_popup}" => (isset($context["map_button_popup"]) ? $context["map_button_popup"] : null), "{map_link_popup}" => (isset($context["map_link_popup"]) ? $context["map_link_popup"] : null), "{map_button}" => (isset($context["map_button"]) ? $context["map_button"] : null), "{map_link}" => (isset($context["map_link"]) ? $context["map_link"] : null))));
                    }
                    // line 172
                    echo "\t\t";
                    $context["description_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["description"]) ? $context["description"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                    // line 173
                    echo "\t";
                }
                // line 174
                echo "
\t";
                // line 176
                echo "\t";
                $context["date"] = $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "date");
                // line 177
                echo "\t";
                if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "date_format") == "timeago")) {
                    // line 178
                    echo "\t\t";
                    $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "d F Y"));
                    // line 179
                    echo "\t\t";
                    $context["date_class"] = "date timeago";
                    // line 180
                    echo "\t";
                } else {
                    // line 181
                    echo "\t\t";
                    $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format"), "d F Y"))) : ("d F Y"))));
                    // line 182
                    echo "\t\t";
                    $context["date_class"] = "date";
                    // line 183
                    echo "\t";
                }
                // line 184
                echo "\t";
                $context["time_tag"] = (((((("<time itemprop=\"dateCreated\" datetime=\"" . call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"))) . "\" class=\"") . (isset($context["date_class"]) ? $context["date_class"] : null)) . "\">") . (isset($context["date_formatted"]) ? $context["date_formatted"] : null)) . "</time>");
                // line 185
                echo "
\t";
                // line 187
                echo "\t";
                $context["cart_button"] = "<button class=\"button small toggle-cart-button caption-cart-button\" data-action=\"toggle-cart-item\"></button>";
                // line 188
                echo "
\t";
                // line 190
                echo "\t";
                $context["image_ratio"] = ((array_key_exists("crop_ratio", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["crop_ratio"]) ? $context["crop_ratio"] : null), (($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") / $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")) * 100)))) : ((($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") / $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")) * 100)));
                // line 191
                echo "
\t";
                // line 193
                echo "\t";
                if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "tooltip"), "enabled")) {
                    // line 194
                    echo "\t\t";
                    $context["tooltip_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "tooltip"), "items"), ","));
                    // line 195
                    echo "\t\t";
                    ob_start();
                    // line 196
                    echo "\t\t";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["tooltip_items"]) ? $context["tooltip_items"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 197
                        echo "\t\t\t";
                        if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                            echo "<span class=\"title\">";
                            echo (isset($context["title_name"]) ? $context["title_name"] : null);
                            echo "</span>
\t\t\t";
                        } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                            // line 198
                            echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                            echo "
\t\t\t";
                        } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename")) {
                            // line 199
                            echo "<span>";
                            echo (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null);
                            echo "</span>
\t\t\t";
                        } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename_ext")) {
                            // line 200
                            echo "<span>";
                            echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name");
                            echo "</span>
\t\t\t";
                        } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                            // line 201
                            echo "<span class=\"description\">";
                            echo (isset($context["description"]) ? $context["description"] : null);
                            echo "</span>";
                        }
                        // line 202
                        echo "\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 203
                    echo "\t\t";
                    $context["link_title_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 204
                    echo "\t\t";
                    $context["link_title_content"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["link_title_content"]) ? $context["link_title_content"] : null), "html"))));
                    // line 205
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["link_title_content"]) ? $context["link_title_content"] : null))))) {
                        ob_start();
                        echo " title=\"";
                        echo (isset($context["link_title_content"]) ? $context["link_title_content"] : null);
                        echo "\"";
                        $context["link_title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    }
                    // line 206
                    echo "\t";
                }
                // line 207
                echo "
\t";
                // line 209
                echo "\t";
                ob_start();
                // line 210
                echo "\t";
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow")) {
                    // line 211
                    echo "\t<figure>
\t\t\t<div class=\"image-container\" style=\"padding-bottom:";
                    // line 212
                    echo (isset($context["image_ratio"]) ? $context["image_ratio"] : null);
                    echo "%;\">
\t\t\t\t<img data-src=\"";
                    // line 213
                    echo (isset($context["url_escaped"]) ? $context["url_escaped"] : null);
                    echo "\" data-width=\"";
                    echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width");
                    echo "\"";
                    echo (isset($context["data_crop"]) ? $context["data_crop"] : null);
                    echo " alt=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('striptags')->getCallable(), array($this->env, (isset($context["title_name"]) ? $context["title_name"] : null))), "html"));
                    echo "\" itemprop=\"thumbnail\">
\t\t\t</div>

\t\t";
                    // line 217
                    echo "\t\t";
                    if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "caption"), "enabled")) {
                        // line 218
                        echo "
\t\t\t";
                        // line 220
                        echo "\t\t\t";
                        ob_start();
                        // line 221
                        echo "\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "caption"), "items"), ",")));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 222
                            echo "\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo "<span class=\"title\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</span>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 223
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename")) {
                                // line 224
                                echo "<span>";
                                echo (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null);
                                echo "</span>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename_ext")) {
                                // line 225
                                echo "<span>";
                                echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name");
                                echo "</span>
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 226
                                echo " ";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description_pseudo"]) ? $context["description_pseudo"] : null)))))) {
                                // line 227
                                echo "<span class=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</span>
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "cart_button") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plugins"), "cart"), "enabled"))) {
                                // line 228
                                echo (isset($context["cart_button"]) ? $context["cart_button"] : null);
                            }
                            // line 229
                            echo "\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 230
                        echo "\t\t\t";
                        $context["figcaption_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 231
                        echo "\t\t\t";
                        $context["figcaption_content"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, (isset($context["figcaption_content"]) ? $context["figcaption_content"] : null)));
                        // line 232
                        echo "
\t\t\t";
                        // line 234
                        echo "\t\t\t";
                        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["figcaption_content"]) ? $context["figcaption_content"] : null))))) {
                            // line 235
                            echo "\t\t\t\t<figcaption itemprop=\"caption description\">";
                            echo (isset($context["figcaption_content"]) ? $context["figcaption_content"] : null);
                            echo "</figcaption>
\t\t\t";
                        }
                        // line 237
                        echo "
  \t";
                    }
                    // line 239
                    echo "\t</figure>
\t";
                }
                // line 241
                echo "\t";
                $context["figure"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 242
                echo "
\t";
                // line 244
                echo "\t";
                ob_start();
                // line 245
                echo "
\t\t";
                // line 246
                echo (isset($context["li_open"]) ? $context["li_open"] : null);
                echo "

\t\t";
                // line 249
                echo "\t\t";
                $context["anchor_class"] = "item img-link item-link";
                // line 250
                echo "\t\t";
                if (((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "clickable") && $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "popup"), "enabled")) && call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["image_link"]) ? $context["image_link"] : null)))) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow"))) {
                    // line 251
                    echo "\t\t\t";
                    $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " x3-popup");
                    // line 252
                    echo "\t\t";
                }
                // line 253
                echo "
\t\t";
                // line 255
                echo "\t\t";
                if ((isset($context["gallery_split_view"]) ? $context["gallery_split_view"] : null)) {
                    // line 256
                    echo "\t\t\t";
                    $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " row");
                    // line 257
                    echo "\t\t";
                }
                // line 258
                echo "
\t\t";
                // line 260
                echo "\t\t";
                $context["link_tag"] = (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "clickable")) ? ("a") : ("span"));
                // line 261
                echo "
\t\t";
                // line 263
                echo "\t\t";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plugins"), "panorama"), "enabled")) {
                    // line 264
                    echo "\t\t\t";
                    $context["data_pano"] = call_user_func_array($this->env->getFunction('pano_params')->getCallable(), array((isset($context["image"]) ? $context["image"] : null), (isset($context["assetspath"]) ? $context["assetspath"] : null)));
                    // line 265
                    echo "\t\t\t";
                    if ((0 === strpos((isset($context["data_pano"]) ? $context["data_pano"] : null), " data-panorama="))) {
                        $context["anchor_class"] = ((isset($context["anchor_class"]) ? $context["anchor_class"] : null) . " x3-panorama");
                    }
                    // line 266
                    echo "\t\t";
                }
                // line 267
                echo "
\t\t";
                // line 269
                echo "\t\t";
                $context["data_is_link"] = (((isset($context["image_link"]) ? $context["image_link"] : null)) ? (" data-is-link=\"true\"") : (""));
                // line 270
                echo "
\t\t";
                // line 272
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
                // line 275
                echo "\t\t";
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "slideshow")) {
                    // line 276
                    echo "
\t\t\t";
                    // line 278
                    echo "\t\t\t";
                    if ((isset($context["gallery_split_view"]) ? $context["gallery_split_view"] : null)) {
                        // line 279
                        echo "
\t\t\t\t";
                        // line 281
                        echo "\t\t\t\t";
                        if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "invert")) {
                            // line 282
                            echo "\t\t\t\t\t";
                            $context["text_align"] = "medium-text-left";
                            // line 283
                            echo "\t\t\t\t";
                        } elseif ((!twig_in_filter("text-right", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")) && !twig_in_filter("text-left", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")))) {
                            // line 284
                            echo "\t\t\t\t\t";
                            $context["text_align"] = "medium-text-right";
                            // line 285
                            echo "\t\t\t\t";
                        }
                        // line 286
                        echo "
\t\t\t\t";
                        // line 288
                        echo "\t\t\t\t<div class=\"medium-";
                        echo $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio");
                        echo " columns ";
                        echo (isset($context["push"]) ? $context["push"] : null);
                        echo " ";
                        echo (isset($context["text_align"]) ? $context["text_align"] : null);
                        echo "\">
\t\t\t\t\t";
                        // line 290
                        echo "\t\t\t\t\t";
                        if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["items"]) ? $context["items"] : null))) < 2)) {
                            $context["items"] = call_user_func_array($this->env->getFilter('merge')->getCallable(), array((isset($context["items"]) ? $context["items"] : null), array(0 => "title", 1 => "description")));
                        }
                        // line 291
                        echo "\t\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 292
                            echo "\t\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                // line 293
                                echo "\t\t\t\t\t\t\t<h2 class=\"title\" itemprop=\"caption\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</h2>
\t\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                                // line 295
                                echo "\t\t\t\t\t\t\t<p itemprop=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</p>
\t\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 297
                                echo "\t\t\t\t\t\t\t<h6 class=\"date\">";
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "</h6>
\t\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename")) {
                                // line 299
                                echo "\t\t\t\t\t\t\t<span class=\"gallery-filename\">";
                                echo (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null);
                                echo "</span>
\t\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename_ext")) {
                                // line 301
                                echo "\t\t\t\t\t\t\t<span class=\"gallery-filename_ext\">";
                                echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name");
                                echo "</span>
\t\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 303
                                echo "\t\t\t\t\t\t\t";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "cart_button") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plugins"), "cart"), "enabled"))) {
                                // line 305
                                echo "\t\t\t\t\t\t\t";
                                echo (isset($context["cart_button"]) ? $context["cart_button"] : null);
                                echo "
\t\t\t\t\t\t";
                            }
                            // line 307
                            echo "\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 308
                        echo "
\t\t\t\t</div>
\t\t\t\t<div class=\"medium-";
                        // line 310
                        echo (12 - $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "split"), "ratio"));
                        echo " columns ";
                        echo (isset($context["pull"]) ? $context["pull"] : null);
                        echo "\">
\t\t\t\t\t";
                        // line 311
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t\t\t</div>

\t\t\t";
                        // line 315
                        echo "\t\t\t";
                    } elseif (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") != "justified")) {
                        // line 316
                        echo "\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 317
                            echo "\t\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                // line 318
                                echo "\t\t\t\t\t\t<h2 class=\"title\" itemprop=\"caption\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</h2>
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["description"]) ? $context["description"] : null)))))) {
                                // line 320
                                echo "\t\t\t\t\t\t<p itemprop=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</p>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 322
                                echo "\t\t\t\t\t\t<h6 class=\"date\">";
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "</h6>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename")) {
                                // line 324
                                echo "\t\t\t\t\t\t<span class=\"gallery-filename\">";
                                echo (isset($context["name_no_ext"]) ? $context["name_no_ext"] : null);
                                echo "</span>
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "filename_ext")) {
                                // line 326
                                echo "\t\t\t\t\t\t<span class=\"gallery-filename_ext\">";
                                echo $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "file_name");
                                echo "</span>
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "maplink") && (isset($context["geo"]) ? $context["geo"] : null))) {
                                // line 328
                                echo "\t\t\t\t\t\t";
                                echo (isset($context["map_embed_button_item"]) ? $context["map_embed_button_item"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "cart_button") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plugins"), "cart"), "enabled"))) {
                                // line 330
                                echo "\t\t\t\t\t\t";
                                echo (isset($context["cart_button"]) ? $context["cart_button"] : null);
                                echo "
\t\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "preview")) {
                                // line 332
                                echo "\t\t\t\t\t\t";
                                echo (isset($context["figure"]) ? $context["figure"] : null);
                                echo "
\t\t\t\t\t";
                            }
                            // line 334
                            echo "\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 335
                        echo "
\t\t\t";
                        // line 337
                        echo "\t\t\t";
                    } else {
                        // line 338
                        echo "\t\t\t\t";
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t\t";
                    }
                    // line 340
                    echo "
\t\t";
                }
                // line 342
                echo "
\t\t</";
                // line 343
                echo (isset($context["link_tag"]) ? $context["link_tag"] : null);
                echo ">

\t\t";
                // line 346
                echo "\t\t";
                if ((((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "layout") == "vertical")) && $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "vertical"), "horizontal_rule"))) {
                    // line 347
                    echo "\t\t\t<hr class=\"hr\">
\t\t";
                }
                // line 349
                echo "
\t\t";
                // line 350
                echo (isset($context["li_close"]) ? $context["li_close"] : null);
                echo "

\t";
                $context["item"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 353
                echo "
\t";
                // line 355
                echo "\t";
                if ((twig_in_filter("landscape", (isset($context["module_classes"]) ? $context["module_classes"] : null)) || twig_in_filter("portrait", (isset($context["module_classes"]) ? $context["module_classes"] : null)))) {
                    // line 356
                    echo "\t\t";
                    if ((twig_in_filter("landscape", (isset($context["module_classes"]) ? $context["module_classes"] : null)) && ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width") > $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height")))) {
                        // line 357
                        echo "\t\t\t";
                        echo (isset($context["item"]) ? $context["item"] : null);
                        echo "
\t\t";
                    } elseif ((twig_in_filter("portrait", (isset($context["module_classes"]) ? $context["module_classes"] : null)) && ($this->getAttribute((isset($context["image"]) ? $context["image"] : null), "height") > $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "width")))) {
                        // line 359
                        echo "\t\t\t";
                        echo (isset($context["item"]) ? $context["item"] : null);
                        echo "
\t\t";
                    }
                    // line 361
                    echo "\t";
                } else {
                    // line 362
                    echo "\t\t";
                    echo (isset($context["item"]) ? $context["item"] : null);
                    echo "
\t";
                }
                // line 364
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
        // line 367
        echo "
";
        // line 369
        echo (isset($context["ul_close"]) ? $context["ul_close"] : null);
        echo "

";
        // line 372
        if ((((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_videos"]) ? $context["gallery_videos"] : null))) > 0) && !twig_in_filter("hide-video", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes"))) && twig_in_filter("video-bottom", $this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "classes")))) {
            // line 373
            echo "\t";
            if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["gallery_images"]) ? $context["gallery_images"] : null))) > 0)) {
                echo "<hr>";
            }
            // line 374
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
        return array (  1074 => 374,  1069 => 373,  1067 => 372,  1062 => 369,  1059 => 367,  1043 => 364,  1037 => 362,  1034 => 361,  1028 => 359,  1022 => 357,  1019 => 356,  1016 => 355,  1013 => 353,  1007 => 350,  1004 => 349,  1000 => 347,  997 => 346,  992 => 343,  989 => 342,  985 => 340,  979 => 338,  976 => 337,  973 => 335,  967 => 334,  961 => 332,  955 => 330,  943 => 326,  937 => 324,  931 => 322,  925 => 320,  919 => 318,  916 => 317,  911 => 316,  896 => 310,  892 => 308,  886 => 307,  874 => 303,  868 => 301,  862 => 299,  856 => 297,  836 => 291,  831 => 290,  822 => 288,  819 => 286,  816 => 285,  813 => 284,  810 => 283,  807 => 282,  804 => 281,  801 => 279,  792 => 275,  754 => 272,  751 => 270,  748 => 269,  742 => 266,  734 => 264,  731 => 263,  728 => 261,  725 => 260,  722 => 258,  719 => 257,  716 => 256,  713 => 255,  710 => 253,  698 => 249,  693 => 246,  690 => 245,  687 => 244,  684 => 242,  681 => 241,  677 => 239,  664 => 234,  661 => 232,  658 => 231,  655 => 230,  649 => 229,  646 => 228,  640 => 227,  628 => 225,  622 => 224,  617 => 223,  604 => 221,  601 => 220,  598 => 218,  595 => 217,  583 => 213,  579 => 212,  576 => 211,  573 => 210,  570 => 209,  567 => 207,  564 => 206,  555 => 205,  552 => 204,  549 => 203,  543 => 202,  538 => 201,  532 => 200,  526 => 199,  513 => 197,  460 => 177,  457 => 176,  454 => 174,  451 => 173,  448 => 172,  443 => 171,  440 => 170,  437 => 169,  434 => 168,  431 => 167,  428 => 166,  425 => 165,  422 => 163,  419 => 162,  358 => 141,  321 => 129,  319 => 128,  316 => 127,  313 => 125,  310 => 124,  307 => 123,  301 => 121,  295 => 118,  292 => 117,  289 => 116,  286 => 114,  283 => 113,  280 => 112,  277 => 110,  274 => 109,  271 => 108,  268 => 106,  265 => 105,  262 => 104,  259 => 102,  256 => 101,  244 => 97,  241 => 96,  238 => 94,  235 => 93,  232 => 91,  229 => 90,  168 => 70,  163 => 67,  160 => 65,  156 => 63,  153 => 62,  147 => 59,  144 => 58,  102 => 42,  87 => 34,  78 => 31,  55 => 19,  41 => 12,  34 => 8,  28 => 6,  1010 => 322,  996 => 321,  991 => 319,  988 => 318,  984 => 316,  981 => 315,  975 => 310,  969 => 308,  966 => 307,  963 => 305,  957 => 304,  954 => 303,  949 => 328,  944 => 301,  939 => 300,  934 => 299,  929 => 298,  922 => 297,  917 => 296,  914 => 295,  908 => 315,  902 => 311,  899 => 289,  893 => 288,  890 => 287,  885 => 286,  880 => 305,  875 => 284,  870 => 283,  863 => 282,  859 => 281,  850 => 295,  847 => 278,  844 => 293,  841 => 292,  838 => 275,  835 => 274,  832 => 273,  829 => 271,  826 => 270,  821 => 267,  806 => 266,  803 => 264,  798 => 278,  795 => 276,  788 => 259,  785 => 258,  779 => 257,  774 => 256,  769 => 255,  759 => 254,  750 => 252,  745 => 267,  737 => 265,  732 => 248,  729 => 247,  727 => 246,  715 => 243,  711 => 242,  707 => 252,  704 => 251,  701 => 250,  695 => 236,  692 => 235,  689 => 234,  686 => 233,  678 => 231,  676 => 230,  673 => 237,  670 => 228,  667 => 235,  659 => 225,  657 => 224,  654 => 223,  651 => 222,  645 => 220,  642 => 219,  634 => 226,  631 => 216,  621 => 214,  618 => 213,  615 => 211,  612 => 210,  609 => 222,  606 => 208,  603 => 207,  600 => 206,  597 => 205,  594 => 204,  591 => 202,  588 => 201,  585 => 199,  580 => 198,  577 => 196,  572 => 195,  569 => 193,  533 => 192,  530 => 190,  527 => 189,  524 => 188,  521 => 198,  518 => 186,  515 => 185,  512 => 184,  508 => 196,  505 => 195,  502 => 194,  499 => 193,  496 => 191,  493 => 190,  490 => 188,  487 => 187,  484 => 185,  481 => 184,  478 => 183,  475 => 182,  472 => 181,  469 => 180,  466 => 179,  463 => 178,  461 => 165,  458 => 164,  455 => 163,  453 => 162,  450 => 161,  447 => 160,  444 => 158,  441 => 157,  438 => 156,  435 => 155,  432 => 153,  429 => 152,  426 => 151,  423 => 150,  420 => 149,  417 => 148,  414 => 161,  411 => 160,  408 => 159,  405 => 157,  399 => 155,  393 => 153,  390 => 152,  387 => 151,  375 => 147,  372 => 146,  369 => 145,  366 => 143,  363 => 142,  357 => 122,  345 => 120,  333 => 134,  317 => 114,  308 => 112,  304 => 122,  298 => 119,  290 => 108,  279 => 105,  267 => 100,  255 => 95,  252 => 94,  249 => 93,  246 => 92,  237 => 88,  234 => 87,  231 => 86,  228 => 85,  223 => 88,  220 => 87,  217 => 85,  214 => 84,  211 => 82,  208 => 81,  205 => 80,  202 => 79,  199 => 78,  196 => 77,  193 => 76,  190 => 74,  187 => 70,  184 => 69,  181 => 68,  175 => 65,  172 => 64,  155 => 63,  150 => 61,  148 => 61,  145 => 59,  141 => 57,  138 => 56,  135 => 55,  132 => 54,  129 => 53,  126 => 52,  123 => 51,  112 => 46,  109 => 45,  106 => 44,  100 => 41,  97 => 40,  82 => 34,  79 => 32,  72 => 28,  65 => 24,  62 => 23,  90 => 27,  76 => 30,  49 => 18,  42 => 14,  402 => 156,  396 => 154,  394 => 158,  391 => 157,  388 => 155,  384 => 150,  381 => 149,  378 => 148,  371 => 145,  367 => 143,  360 => 124,  354 => 121,  351 => 140,  348 => 139,  342 => 138,  339 => 137,  336 => 135,  330 => 132,  327 => 131,  324 => 130,  314 => 124,  312 => 123,  309 => 122,  306 => 121,  303 => 119,  293 => 117,  291 => 116,  288 => 115,  285 => 107,  282 => 106,  276 => 104,  273 => 102,  270 => 101,  264 => 99,  261 => 98,  258 => 97,  253 => 100,  250 => 99,  247 => 98,  243 => 91,  240 => 90,  230 => 90,  226 => 89,  215 => 87,  212 => 86,  209 => 84,  206 => 83,  203 => 82,  200 => 81,  197 => 80,  194 => 79,  191 => 78,  188 => 73,  185 => 71,  182 => 74,  179 => 72,  176 => 71,  173 => 70,  161 => 65,  158 => 63,  149 => 60,  146 => 58,  140 => 56,  137 => 55,  134 => 53,  124 => 51,  122 => 50,  119 => 49,  116 => 48,  113 => 46,  103 => 42,  92 => 39,  83 => 36,  80 => 34,  59 => 24,  54 => 20,  47 => 14,  36 => 9,  27 => 7,  25 => 5,  174 => 69,  170 => 69,  167 => 68,  164 => 66,  157 => 62,  154 => 60,  152 => 61,  120 => 49,  117 => 48,  114 => 47,  110 => 48,  99 => 41,  96 => 39,  94 => 38,  86 => 37,  84 => 33,  81 => 32,  77 => 31,  73 => 24,  68 => 22,  60 => 22,  56 => 20,  52 => 17,  46 => 16,  43 => 14,  39 => 11,  31 => 9,  29 => 8,  24 => 4,  22 => 3,  142 => 54,  139 => 52,  128 => 50,  125 => 49,  121 => 48,  118 => 47,  115 => 45,  111 => 45,  108 => 44,  105 => 43,  101 => 43,  98 => 42,  95 => 41,  91 => 36,  88 => 36,  85 => 35,  74 => 29,  71 => 23,  69 => 26,  66 => 27,  64 => 28,  61 => 26,  57 => 20,  53 => 18,  51 => 19,  48 => 17,  44 => 13,  35 => 10,  33 => 10,  30 => 7,  26 => 5,  23 => 4,  50 => 17,  45 => 16,  40 => 13,  38 => 12,  21 => 2,  19 => 1,);
    }
}
