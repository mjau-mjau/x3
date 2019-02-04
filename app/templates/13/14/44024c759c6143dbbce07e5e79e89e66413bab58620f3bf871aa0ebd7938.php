<?php

/* partials/module.folders.html */
class __TwigTemplate_131444024c759c6143dbbce07e5e79e89e66413bab58620f3bf871aa0ebd7938 extends Twig_Template
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
        $context["folders"] = $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders");
        // line 6
        $context["assets"] = (isset($context["folder"]) ? $context["folder"] : null);
        // line 7
        $context["items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "items"), ","));
        // line 8
        $context["limit"] = $this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "limit");
        // line 9
        if ((call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["limit"]) ? $context["limit"] : null))) || ((isset($context["limit"]) ? $context["limit"] : null) < 1))) {
            $context["limit"] = 99999;
        }
        // line 10
        echo "
";
        // line 12
        $context["folders_split_view"] = (($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "enabled") && ($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") != "justified")) && ($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") != "columns"));
        // line 13
        if ((isset($context["folders_split_view"]) ? $context["folders_split_view"] : null)) {
            // line 14
            echo "\t";
            // line 15
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "invert")) {
                // line 16
                echo "\t\t";
                $context["push"] = ("medium-push-" . (12 - $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "ratio")));
                // line 17
                echo "\t\t";
                $context["pull"] = ("medium-pull-" . $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "ratio"));
                // line 18
                echo "\t";
            }
        }
        // line 20
        echo "
";
        // line 22
        if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "crop"), "enabled")) {
            // line 23
            echo "\t";
            $context["crop_ratio"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "crop"), "crop"), 1, array(), "array") / $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "crop"), "crop"), 0, array(), "array")) * 100);
            // line 24
            echo "\t";
            $context["data_crop"] = ((((" data-crop=\"" . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "crop"), "crop"), 0, array(), "array")) . ":") . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "crop"), "crop"), 1, array(), "array")) . "\"");
        }
        // line 26
        echo "
";
        // line 28
        if (($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") == "grid")) {
            // line 29
            echo "
\t";
            // line 31
            echo "\t";
            if (($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "space") > (-1))) {
                // line 32
                echo "\t\t";
                $context["ul_style"] = ((" style=\"margin: 0 " . ((((isset($context["width"]) ? $context["width"] : null) == "wide")) ? (($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "space") / 2)) : (((-$this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "space")) / 4)))) . "px\"");
                // line 33
                echo "\t\t";
                $context["li_style"] = ((((" style=\"padding: 0 " . ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "space") / 2)) . "px ") . $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "space")) . "px\"");
                // line 34
                echo "\t";
            }
            // line 35
            echo "
\t";
            // line 37
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "use_width")) {
                // line 38
                echo "\t\t";
                $context["ul_open"] = (("<ul class=\"items\"" . (isset($context["ul_style"]) ? $context["ul_style"] : null)) . ">");
                // line 39
                echo "
\t";
                // line 41
                echo "\t";
            } else {
                // line 42
                echo "\t\t";
                $context["block_grid"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "columns"), ","));
                // line 43
                echo "\t\t";
                $context["columns_max"] = call_user_func_array($this->env->getFunction('max')->getCallable(), array(call_user_func_array($this->env->getFunction('min')->getCallable(), array((isset($context["limit"]) ? $context["limit"] : null), call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "children_count"))))), 3));
                // line 44
                echo "\t\t";
                $context["small_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"))), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "1")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 45
                echo "\t\t";
                $context["medium_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "2")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 46
                echo "\t\t";
                $context["large_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"), "3"))) : ("3")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 47
                echo "\t\t";
                $context["ul_open"] = (((((((("<ul class=\"small-block-grid-" . (isset($context["small_grid"]) ? $context["small_grid"] : null)) . " medium-block-grid-") . (isset($context["medium_grid"]) ? $context["medium_grid"] : null)) . " large-block-grid-") . (isset($context["large_grid"]) ? $context["large_grid"] : null)) . " items\"") . (isset($context["ul_style"]) ? $context["ul_style"] : null)) . ">");
                // line 48
                echo "\t";
            }
            // line 49
            echo "
\t";
            // line 51
            echo "\t";
            $context["li_open"] = (("<li" . (isset($context["li_style"]) ? $context["li_style"] : null)) . ">");
            // line 52
            echo "\t";
            $context["li_close"] = "</li>";
            // line 53
            echo "\t";
            $context["ul_close"] = "</ul>";
        }
        // line 55
        echo "
";
        // line 57
        $context["children"] = call_user_func_array($this->env->getFunction('sortby')->getCallable(), array($this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "children"), $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "sortby"), ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "sort") == "desc")) ? (true) : (false))));
        // line 58
        echo "
";
        // line 60
        if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["children"]) ? $context["children"] : null))) > 0)) {
            // line 61
            echo "\t";
            echo (isset($context["ul_open"]) ? $context["ul_open"] : null);
            echo "
\t";
            // line 62
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["children"]) ? $context["children"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 63
                echo "\t";
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") < (isset($context["limit"]) ? $context["limit"] : null))) {
                    // line 64
                    echo "\t\t";
                    echo (isset($context["li_open"]) ? $context["li_open"] : null);
                    echo "

\t\t";
                    // line 67
                    echo "\t\t";
                    $context["title"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "title");
                    // line 68
                    echo "\t\t";
                    $context["title_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["title"]) ? $context["title"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                    // line 69
                    echo "\t\t";
                    $context["label"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "label");
                    // line 70
                    echo "\t\t";
                    $context["child_id"] = call_user_func_array($this->env->getFilter('attribute_friendly')->getCallable(), array((isset($context["label"]) ? $context["label"] : null)));
                    // line 71
                    echo "
\t\t";
                    // line 73
                    echo "\t\t";
                    $context["date"] = (($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "date", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "date"), $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "updated")))) : ($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "updated")));
                    // line 74
                    echo "\t\t";
                    if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "date_format") == "timeago")) {
                        // line 75
                        echo "\t\t\t";
                        $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"));
                        // line 76
                        echo "\t\t\t";
                        $context["date_class"] = "date timeago";
                        // line 77
                        echo "\t\t";
                    } else {
                        // line 78
                        echo "\t\t\t";
                        $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format"), "d F Y"))) : ("d F Y"))));
                        // line 79
                        echo "\t\t\t";
                        $context["date_class"] = "date";
                        // line 80
                        echo "\t\t";
                    }
                    // line 81
                    echo "\t\t";
                    $context["time_tag"] = (((((("<time itemprop=\"dateCreated\" datetime=\"" . call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"))) . "\" class=\"") . (isset($context["date_class"]) ? $context["date_class"] : null)) . "\">") . (isset($context["date_formatted"]) ? $context["date_formatted"] : null)) . "</time>");
                    // line 82
                    echo "
\t\t";
                    // line 83
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description"))))) {
                        // line 84
                        echo "\t\t\t";
                        $context["description"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description");
                        // line 85
                        echo "\t\t\t";
                        $context["description_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["description"]) ? $context["description"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                        // line 86
                        echo "\t\t";
                    }
                    // line 87
                    echo "
\t\t";
                    // line 89
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "gallery"), "assets"))))) {
                        // line 90
                        echo "\t\t\t";
                        $context["amount"] = call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, $this->getAttribute(call_user_func_array($this->env->getFunction('get')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "gallery"), "assets"))), "images")));
                        // line 91
                        echo "\t\t";
                    } else {
                        // line 92
                        echo "\t\t\t";
                        $context["amount"] = call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "images")));
                        // line 93
                        echo "\t\t";
                    }
                    // line 94
                    echo "
\t\t";
                    // line 96
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "folders"), "assets"))))) {
                        // line 97
                        echo "\t\t\t";
                        $context["folders_amount"] = $this->getAttribute(call_user_func_array($this->env->getFunction('get')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "folders"), "assets"))), "children_count");
                        // line 98
                        echo "\t\t";
                    } else {
                        // line 99
                        echo "\t\t\t";
                        $context["folders_amount"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "children_count");
                        // line 100
                        echo "\t\t";
                    }
                    // line 101
                    echo "
\t\t";
                    // line 103
                    echo "\t\t";
                    if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "tooltip"), "enabled")) {
                        // line 104
                        echo "\t\t\t";
                        $context["tooltip_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "tooltip"), "items"), ","));
                        // line 105
                        echo "\t\t\t";
                        ob_start();
                        // line 106
                        echo "\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["tooltip_items"]) ? $context["tooltip_items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 107
                            echo "\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo "<span class=\"title\">";
                                echo (isset($context["title"]) ? $context["title"] : null);
                                echo "</span>
\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 108
                                echo "<span class=\"title\">";
                                echo (isset($context["label"]) ? $context["label"] : null);
                                echo "</span>
\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 109
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "
\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "amount") && ((isset($context["amount"]) ? $context["amount"] : null) > 0))) {
                                // line 110
                                echo "<span class=\"amount\">";
                                echo (isset($context["amount"]) ? $context["amount"] : null);
                                echo " ";
                                echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["amount"]) ? $context["amount"] : null), "image", "images"));
                                echo "</span>
\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "folders_amount") && ((isset($context["folders_amount"]) ? $context["folders_amount"] : null) > 0))) {
                                // line 111
                                echo "<span class=\"folder_amount\">";
                                echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                                echo " ";
                                echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["folders_amount"]) ? $context["folders_amount"] : null), "album", "albums"));
                                echo "</span>
\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 112
                                echo "<span class=\"description\">";
                                echo (isset($context["description"]) ? $context["description"] : null);
                                echo "</span>
\t\t\t\t";
                            }
                            // line 114
                            echo "\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 115
                        echo "\t\t\t";
                        $context["link_title_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 116
                        echo "\t\t\t";
                        $context["link_title_content"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["link_title_content"]) ? $context["link_title_content"] : null), "html"))));
                        // line 117
                        echo "\t\t\t";
                        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["link_title_content"]) ? $context["link_title_content"] : null))))) {
                            ob_start();
                            echo "title=\"";
                            echo (isset($context["link_title_content"]) ? $context["link_title_content"] : null);
                            echo "\"";
                            $context["link_title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        }
                        // line 118
                        echo "\t\t";
                    }
                    // line 119
                    echo "
\t\t";
                    // line 121
                    echo "\t\t";
                    $context["link_target"] = "";
                    // line 122
                    echo "\t\t";
                    $context["link_class"] = "";
                    // line 123
                    echo "\t\t";
                    $context["data_popup"] = false;
                    // line 124
                    echo "\t\t";
                    $context["data_popup_content"] = false;
                    // line 125
                    echo "\t\t";
                    $context["data_popup_window"] = "";
                    // line 126
                    echo "\t\t";
                    $context["nofollow"] = "";
                    // line 127
                    echo "
\t\t";
                    // line 129
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "url"))))) {
                        // line 130
                        echo "
\t\t\t";
                        // line 132
                        echo "\t\t\t";
                        $context["link"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "url")));
                        // line 133
                        echo "
\t\t\t";
                        // line 135
                        echo "\t\t\t";
                        if ((0 === substr_compare((isset($context["link"]) ? $context["link"] : null), ":nofollow", -strlen(":nofollow")))) {
                            // line 136
                            echo "\t\t\t\t";
                            $context["nofollow"] = " rel=\"nofollow\"";
                            // line 137
                            echo "\t\t\t\t";
                            $context["link"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["link"]) ? $context["link"] : null), array(":nofollow" => "")));
                            // line 138
                            echo "\t\t\t";
                        }
                        // line 139
                        echo "
\t\t\t";
                        // line 141
                        echo "\t\t\t";
                        $context["hasExtension"] = call_user_func_array($this->env->getFunction('hasExtension')->getCallable(), array((isset($context["link"]) ? $context["link"] : null)));
                        // line 142
                        echo "
\t\t\t";
                        // line 144
                        echo "\t\t\t";
                        if (((call_user_func_array($this->env->getFilter('first')->getCallable(), array($this->env, (isset($context["link"]) ? $context["link"] : null))) != "/") && !twig_in_filter("http", (isset($context["link"]) ? $context["link"] : null)))) {
                            // line 145
                            echo "\t\t\t\t";
                            if ((isset($context["hasExtension"]) ? $context["hasExtension"] : null)) {
                                // line 146
                                echo "\t\t\t\t\t";
                                $context["link"] = ((call_user_func_array($this->env->getFilter('setpath')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "file_path"), "./")), (isset($context["rootpath"]) ? $context["rootpath"] : null))) . "/") . (isset($context["link"]) ? $context["link"] : null));
                                // line 147
                                echo "\t\t\t\t";
                            } else {
                                // line 148
                                echo "\t\t\t\t\t";
                                $context["link"] = (call_user_func_array($this->env->getFilter('setpath')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "permalink"), (isset($context["rootpath"]) ? $context["rootpath"] : null))) . (isset($context["link"]) ? $context["link"] : null));
                                // line 149
                                echo "\t\t\t\t";
                            }
                            // line 150
                            echo "
\t\t\t";
                            // line 152
                            echo "\t\t\t";
                        } elseif ((((call_user_func_array($this->env->getFilter('first')->getCallable(), array($this->env, (isset($context["link"]) ? $context["link"] : null))) == "/") && (call_user_func_array($this->env->getFilter('last')->getCallable(), array($this->env, (isset($context["link"]) ? $context["link"] : null))) != "/")) && (!(isset($context["hasExtension"]) ? $context["hasExtension"] : null)))) {
                            // line 153
                            echo "\t\t\t\t";
                            $context["link"] = ((isset($context["link"]) ? $context["link"] : null) . "/");
                            // line 154
                            echo "\t\t\t";
                        }
                        // line 155
                        echo "
\t\t\t";
                        // line 157
                        echo "\t\t\t";
                        if (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") && ($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") != "auto"))) {
                            // line 158
                            echo "\t\t\t\t";
                            if (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") == "popup")) {
                                // line 159
                                echo "\t\t\t\t\t";
                                // line 160
                                echo "\t\t\t\t\t";
                                $context["data_popup_window"] = (((($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "slug") . ",") . (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "width", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "width"), "600"))) : ("600"))) . ",") . (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "height", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "height"), "500"))) : ("500")));
                                // line 161
                                echo "\t\t\t\t";
                            } elseif (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") == "x3_popup")) {
                                // line 162
                                echo "\t\t\t\t\t";
                                // line 163
                                echo "\t\t\t\t\t";
                                $context["data_popup"] = true;
                                // line 164
                                echo "\t\t\t\t\t";
                                if ($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "content")) {
                                    // line 165
                                    echo "\t\t\t\t\t\t";
                                    $context["data_popup_content"] = true;
                                    // line 166
                                    echo "\t\t\t\t\t\t";
                                    $context["link"] = "#";
                                    // line 167
                                    echo "\t\t\t\t\t";
                                }
                                // line 168
                                echo "\t\t\t\t";
                            } else {
                                // line 169
                                echo "\t\t\t\t\t";
                                $context["link_target"] = $this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target");
                                // line 170
                                echo "\t\t\t\t";
                            }
                            // line 171
                            echo "\t\t\t";
                        } elseif ((twig_in_filter("http", (isset($context["link"]) ? $context["link"] : null)) || (isset($context["hasExtension"]) ? $context["hasExtension"] : null))) {
                            // line 172
                            echo "\t\t\t\t";
                            $context["link_target"] = "_blank";
                            // line 173
                            echo "\t\t\t";
                        }
                        // line 174
                        echo "
\t\t\t";
                        // line 176
                        echo "\t\t\t";
                        if ((isset($context["hasExtension"]) ? $context["hasExtension"] : null)) {
                            // line 177
                            echo "\t\t\t\t";
                            $context["link_class"] = ((isset($context["link_class"]) ? $context["link_class"] : null) . " no-ajax");
                            // line 178
                            echo "\t\t\t";
                        }
                        // line 179
                        echo "
\t\t";
                    } elseif (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "content") && ($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") == "x3_popup"))) {
                        // line 181
                        echo "\t\t\t";
                        $context["data_popup"] = true;
                        // line 182
                        echo "\t\t\t";
                        $context["data_popup_content"] = true;
                        // line 183
                        echo "\t\t\t";
                        $context["link"] = "#";
                        // line 184
                        echo "\t\t";
                    } else {
                        // line 185
                        echo "\t\t\t";
                        $context["link"] = call_user_func_array($this->env->getFilter('setpath')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "permalink"), array(" " => "_"))), "html")), (isset($context["rootpath"]) ? $context["rootpath"] : null)));
                        // line 186
                        echo "\t\t";
                    }
                    // line 187
                    echo "
\t\t";
                    // line 189
                    echo "\t\t";
                    ob_start();
                    echo "<a href=\"";
                    echo (isset($context["link"]) ? $context["link"] : null);
                    echo "\" class=\"item-link";
                    echo (isset($context["link_class"]) ? $context["link_class"] : null);
                    echo "\"";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["link_target"]) ? $context["link_target"] : null))))) {
                        echo " target=\"";
                        echo (isset($context["link_target"]) ? $context["link_target"] : null);
                        echo "\"";
                    }
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["data_popup_window"]) ? $context["data_popup_window"] : null))))) {
                        echo " data-popup-window=\"";
                        echo (isset($context["data_popup_window"]) ? $context["data_popup_window"] : null);
                        echo "\"";
                    }
                    if ((isset($context["data_popup"]) ? $context["data_popup"] : null)) {
                        echo " data-popup";
                    }
                    if ($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "popup_class")) {
                        echo " data-popup-class=\"";
                        echo $this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "popup_class");
                        echo "\"";
                    }
                    if ((isset($context["data_popup_content"]) ? $context["data_popup_content"] : null)) {
                        echo " data-popup-content=\"";
                        echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "content"), "html"));
                        echo "\"";
                    }
                    echo " ";
                    echo (isset($context["link_title"]) ? $context["link_title"] : null);
                    echo (isset($context["nofollow"]) ? $context["nofollow"] : null);
                    echo ">";
                    $context["href_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 190
                    echo "
\t\t";
                    // line 192
                    echo "\t\t";
                    ob_start();
                    $this->env->loadTemplate("partials/preview-image.html")->display(array_merge($context, array("page" => (isset($context["child"]) ? $context["child"] : null))));
                    $context["preview_img"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 193
                    echo "
\t\t";
                    // line 195
                    echo "\t\t";
                    if (call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["preview_img"]) ? $context["preview_img"] : null)))) {
                        $context["preview_img"] = (isset($context["preview_image"]) ? $context["preview_image"] : null);
                    }
                    // line 196
                    echo "
\t\t";
                    // line 198
                    echo "\t\t";
                    $context["preview_img_url"] = ((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["preview_img"]) ? $context["preview_img"] : null), ".")));
                    // line 199
                    echo "
\t\t";
                    // line 201
                    echo "    ";
                    if (((isset($context["preview_img"]) ? $context["preview_img"] : null) == "./app/public/images/default.png")) {
                        // line 202
                        echo "    \t";
                        $context["imgInfo"] = array(0 => 1280, 1 => 1280);
                        // line 203
                        echo "    \t";
                        $context["image_ratio"] = 100;
                        // line 204
                        echo "    ";
                    } else {
                        // line 205
                        echo "\t\t\t";
                        $context["imgInfo"] = call_user_func_array($this->env->getFunction('getimginfo')->getCallable(), array((isset($context["preview_img"]) ? $context["preview_img"] : null)));
                        // line 206
                        echo "    \t";
                        $context["image_ratio"] = ((array_key_exists("crop_ratio", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["crop_ratio"]) ? $context["crop_ratio"] : null), (((($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array"), 3))) : (3)) / (($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array"), 2))) : (2))) * 100)))) : ((((($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array"), 3))) : (3)) / (($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array"), 2))) : (2))) * 100)));
                        // line 207
                        echo "    ";
                    }
                    // line 208
                    echo "
    ";
                    // line 210
                    echo "    ";
                    ob_start();
                    // line 211
                    echo "    \t<h2 id=\"title-";
                    echo (isset($context["child_id"]) ? $context["child_id"] : null);
                    echo "\" data-file=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_img"]) ? $context["preview_img"] : null)));
                    echo "\" class=\"title\">";
                    echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                    echo "</h2>
    ";
                    $context["title_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 213
                    echo "    ";
                    ob_start();
                    // line 214
                    echo "    \t<h2 id=\"title-";
                    echo (isset($context["child_id"]) ? $context["child_id"] : null);
                    echo "\" class=\"title\">";
                    echo (isset($context["label"]) ? $context["label"] : null);
                    echo "</h2>
    ";
                    $context["label_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 216
                    echo "    ";
                    ob_start();
                    // line 217
                    echo "    \t<h6 class=\"date\">";
                    echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                    echo "</h6>
    ";
                    $context["date_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 219
                    echo "    ";
                    ob_start();
                    // line 220
                    echo "    \t";
                    if (((isset($context["amount"]) ? $context["amount"] : null) > 0)) {
                        // line 221
                        echo "    \t<h6 class=\"amount\"><span>";
                        echo (isset($context["amount"]) ? $context["amount"] : null);
                        echo " ";
                        echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["amount"]) ? $context["amount"] : null), "image", "images"));
                        echo "</span></h6>
    \t";
                    }
                    // line 223
                    echo "    ";
                    $context["amount_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 224
                    echo "    ";
                    ob_start();
                    // line 225
                    echo "    \t";
                    if (((isset($context["folders_amount"]) ? $context["folders_amount"] : null) > 0)) {
                        // line 226
                        echo "    \t<h6 class=\"folder_amount\"><span>";
                        echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                        echo " ";
                        echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["folders_amount"]) ? $context["folders_amount"] : null), "album", "albums"));
                        echo "</span></h6>
    \t";
                    }
                    // line 228
                    echo "    ";
                    $context["folders_amount_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 229
                    echo "    ";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description"))))) {
                        // line 230
                        echo "      ";
                        ob_start();
                        // line 231
                        echo "      \t<p>";
                        echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                        echo "</p>
      ";
                        $context["description_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 233
                        echo "    ";
                    }
                    // line 234
                    echo "    ";
                    ob_start();
                    // line 235
                    echo "    <figure>
\t\t\t<div class=\"img-link\">
\t\t\t\t<div class=\"image-container\" style=\"padding-bottom:";
                    // line 237
                    echo (isset($context["image_ratio"]) ? $context["image_ratio"] : null);
                    echo "%;\">
        \t<img data-src=\"";
                    // line 238
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_img_url"]) ? $context["preview_img_url"] : null)));
                    echo "\" data-width=\"";
                    echo $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array");
                    echo "\"";
                    echo (isset($context["data_crop"]) ? $context["data_crop"] : null);
                    echo " alt=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('striptags')->getCallable(), array((isset($context["title"]) ? $context["title"] : null))), "html"));
                    echo "\">
        </div>

        ";
                    // line 241
                    if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "caption"), "enabled")) {
                        // line 242
                        echo "        \t";
                        ob_start();
                        // line 243
                        echo "\t        \t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "caption"), "items"), ",")));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 244
                            echo "\t        \t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo "<span class=\"title\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</span>
\t        \t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 245
                                echo "<span class=\"title\">";
                                echo (isset($context["label"]) ? $context["label"] : null);
                                echo "</span>
\t        \t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "amount") && ((isset($context["amount"]) ? $context["amount"] : null) > 0))) {
                                // line 246
                                echo "<span class=\"amount\">";
                                echo (isset($context["amount"]) ? $context["amount"] : null);
                                echo " ";
                                echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["amount"]) ? $context["amount"] : null), "image", "images"));
                                echo "</span>
\t        \t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "folders_amount") && ((isset($context["folders_amount"]) ? $context["folders_amount"] : null) > 0))) {
                                // line 247
                                echo "<span class=\"folder_amount\">";
                                echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                                echo " ";
                                echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["folders_amount"]) ? $context["folders_amount"] : null), "album", "albums"));
                                echo "</span>
\t        \t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 248
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "
\t        \t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 249
                                echo "<span class=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</span>";
                            }
                            // line 250
                            echo "\t        \t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 251
                        echo "        \t";
                        $context["figcaption"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 252
                        echo "        ";
                        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["figcaption"]) ? $context["figcaption"] : null))))))) {
                            echo "<figcaption>";
                            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["figcaption"]) ? $context["figcaption"] : null)));
                            echo "</figcaption>";
                        }
                        // line 253
                        echo "        ";
                    }
                    // line 254
                    echo "\t\t\t</div>
\t\t</figure>
\t\t";
                    $context["figure"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 257
                    echo "
\t\t";
                    // line 259
                    echo "\t\t<section data-width=\"";
                    echo $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array");
                    echo "\" data-height=\"";
                    echo $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array");
                    echo "\" id=\"folder-";
                    echo (isset($context["child_id"]) ? $context["child_id"] : null);
                    echo "\" aria-labelledby=\"title-";
                    echo (isset($context["child_id"]) ? $context["child_id"] : null);
                    echo "\" class=\"item";
                    if ((isset($context["folders_split_view"]) ? $context["folders_split_view"] : null)) {
                        echo " row";
                    }
                    echo "\">
\t\t";
                    // line 260
                    echo (isset($context["href_tag"]) ? $context["href_tag"] : null);
                    echo "

\t\t";
                    // line 263
                    echo "\t\t";
                    if ((isset($context["folders_split_view"]) ? $context["folders_split_view"] : null)) {
                        // line 264
                        echo "
\t\t";
                        // line 266
                        echo "\t\t";
                        if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "invert")) {
                            // line 267
                            echo "\t\t\t";
                            $context["text_align"] = "medium-text-left";
                            // line 268
                            echo "\t\t";
                        } elseif ((!twig_in_filter("text-right", $this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "classes")) && !twig_in_filter("text-left", $this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "classes")))) {
                            // line 269
                            echo "\t\t\t";
                            $context["text_align"] = "medium-text-right";
                            // line 270
                            echo "\t\t";
                        }
                        // line 271
                        echo "
\t\t";
                        // line 273
                        echo "\t\t<div class=\"medium-";
                        echo $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "ratio");
                        echo " columns ";
                        echo (isset($context["push"]) ? $context["push"] : null);
                        echo " ";
                        echo (isset($context["text_align"]) ? $context["text_align"] : null);
                        echo "\">
\t\t";
                        // line 274
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 275
                            echo "\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo (isset($context["title_tag"]) ? $context["title_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 276
                                echo (isset($context["label_tag"]) ? $context["label_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 277
                                echo (isset($context["date_tag"]) ? $context["date_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "amount")) {
                                // line 278
                                echo (isset($context["amount_tag"]) ? $context["amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "folders_amount")) {
                                // line 279
                                echo (isset($context["folders_amount_tag"]) ? $context["folders_amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 280
                                echo (isset($context["description_tag"]) ? $context["description_tag"] : null);
                            }
                            // line 281
                            echo "\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 282
                        echo "\t\t</div>
\t\t<div class=\"medium-";
                        // line 283
                        echo (12 - $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "ratio"));
                        echo " columns ";
                        echo (isset($context["pull"]) ? $context["pull"] : null);
                        echo "\">
\t\t\t";
                        // line 284
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t</div>

\t\t";
                        // line 288
                        echo "\t\t";
                    } elseif (($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") != "justified")) {
                        // line 289
                        echo "\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 290
                            echo "\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo (isset($context["title_tag"]) ? $context["title_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 291
                                echo (isset($context["label_tag"]) ? $context["label_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 292
                                echo (isset($context["date_tag"]) ? $context["date_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "amount")) {
                                // line 293
                                echo (isset($context["amount_tag"]) ? $context["amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "folders_amount")) {
                                // line 294
                                echo (isset($context["folders_amount_tag"]) ? $context["folders_amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 295
                                echo (isset($context["description_tag"]) ? $context["description_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "preview")) {
                                // line 296
                                echo (isset($context["figure"]) ? $context["figure"] : null);
                            }
                            // line 297
                            echo "\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 298
                        echo "
\t\t";
                        // line 300
                        echo "\t\t";
                    } else {
                        // line 301
                        echo "\t\t\t";
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t";
                    }
                    // line 303
                    echo "
\t\t</a>
\t\t</section>

\t\t";
                    // line 308
                    echo "\t\t";
                    if (((((($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") == "vertical") && $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "vertical"), "horizontal_rule")) && (!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) && ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") < (isset($context["limit"]) ? $context["limit"] : null))) || ((isset($context["folders_split_view"]) ? $context["folders_split_view"] : null) && ($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") == "grid")))) {
                        // line 309
                        echo "\t\t<hr class=\"hr\">
\t\t";
                    }
                    // line 311
                    echo "
\t\t";
                    // line 312
                    echo (isset($context["li_close"]) ? $context["li_close"] : null);
                    echo "
\t";
                }
                // line 314
                echo "\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 315
            echo "\t";
            echo (isset($context["ul_close"]) ? $context["ul_close"] : null);
            echo "

";
        }
    }

    public function getTemplateName()
    {
        return "partials/module.folders.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1002 => 315,  988 => 314,  983 => 312,  980 => 311,  976 => 309,  973 => 308,  967 => 303,  961 => 301,  958 => 300,  955 => 298,  949 => 297,  946 => 296,  941 => 295,  936 => 294,  931 => 293,  926 => 292,  921 => 291,  914 => 290,  909 => 289,  906 => 288,  900 => 284,  894 => 283,  891 => 282,  885 => 281,  882 => 280,  877 => 279,  872 => 278,  867 => 277,  862 => 276,  855 => 275,  851 => 274,  842 => 273,  839 => 271,  836 => 270,  833 => 269,  830 => 268,  827 => 267,  824 => 266,  821 => 264,  818 => 263,  813 => 260,  798 => 259,  795 => 257,  790 => 254,  787 => 253,  780 => 252,  777 => 251,  771 => 250,  766 => 249,  761 => 248,  753 => 247,  745 => 246,  739 => 245,  731 => 244,  726 => 243,  723 => 242,  721 => 241,  709 => 238,  705 => 237,  701 => 235,  698 => 234,  695 => 233,  689 => 231,  686 => 230,  683 => 229,  680 => 228,  672 => 226,  669 => 225,  666 => 224,  663 => 223,  655 => 221,  652 => 220,  649 => 219,  643 => 217,  640 => 216,  632 => 214,  629 => 213,  619 => 211,  616 => 210,  613 => 208,  610 => 207,  607 => 206,  604 => 205,  601 => 204,  598 => 203,  595 => 202,  592 => 201,  589 => 199,  586 => 198,  583 => 196,  578 => 195,  575 => 193,  570 => 192,  567 => 190,  531 => 189,  528 => 187,  525 => 186,  522 => 185,  519 => 184,  516 => 183,  513 => 182,  510 => 181,  506 => 179,  503 => 178,  500 => 177,  497 => 176,  494 => 174,  491 => 173,  488 => 172,  485 => 171,  482 => 170,  479 => 169,  476 => 168,  473 => 167,  470 => 166,  467 => 165,  464 => 164,  461 => 163,  459 => 162,  456 => 161,  453 => 160,  451 => 159,  448 => 158,  445 => 157,  442 => 155,  439 => 154,  436 => 153,  433 => 152,  430 => 150,  427 => 149,  424 => 148,  421 => 147,  418 => 146,  415 => 145,  412 => 144,  409 => 142,  406 => 141,  403 => 139,  400 => 138,  397 => 137,  394 => 136,  391 => 135,  388 => 133,  385 => 132,  382 => 130,  379 => 129,  367 => 124,  364 => 123,  361 => 122,  358 => 121,  355 => 119,  337 => 115,  325 => 112,  317 => 111,  304 => 109,  298 => 108,  290 => 107,  285 => 106,  282 => 105,  279 => 104,  276 => 103,  273 => 101,  264 => 98,  261 => 97,  258 => 96,  255 => 94,  252 => 93,  240 => 89,  237 => 87,  234 => 86,  231 => 85,  228 => 84,  217 => 80,  150 => 61,  143 => 57,  140 => 55,  121 => 47,  118 => 46,  109 => 43,  97 => 38,  82 => 32,  384 => 151,  378 => 149,  376 => 127,  373 => 126,  370 => 125,  363 => 139,  359 => 137,  352 => 118,  346 => 133,  343 => 117,  340 => 116,  334 => 128,  328 => 125,  322 => 123,  319 => 122,  316 => 120,  306 => 118,  287 => 112,  281 => 110,  249 => 92,  246 => 91,  193 => 71,  190 => 70,  187 => 69,  184 => 68,  181 => 67,  175 => 64,  172 => 63,  169 => 66,  166 => 65,  163 => 64,  160 => 62,  148 => 60,  145 => 58,  133 => 52,  111 => 43,  83 => 34,  174 => 69,  157 => 61,  154 => 59,  114 => 45,  86 => 35,  60 => 23,  48 => 17,  51 => 19,  42 => 13,  127 => 49,  124 => 48,  120 => 47,  117 => 46,  106 => 42,  103 => 41,  100 => 39,  93 => 37,  79 => 31,  76 => 29,  58 => 22,  45 => 16,  38 => 12,  90 => 35,  61 => 24,  56 => 20,  44 => 14,  36 => 11,  27 => 6,  357 => 134,  354 => 133,  344 => 127,  341 => 126,  339 => 125,  335 => 124,  331 => 114,  329 => 122,  323 => 118,  320 => 116,  315 => 115,  312 => 114,  309 => 110,  303 => 117,  300 => 116,  297 => 114,  291 => 105,  288 => 104,  284 => 111,  269 => 105,  266 => 103,  254 => 98,  251 => 88,  243 => 90,  239 => 91,  226 => 83,  223 => 82,  220 => 81,  214 => 79,  201 => 61,  198 => 60,  195 => 59,  192 => 57,  185 => 56,  178 => 70,  171 => 54,  168 => 53,  162 => 50,  159 => 48,  152 => 59,  146 => 46,  142 => 54,  136 => 53,  130 => 51,  115 => 45,  112 => 44,  69 => 28,  65 => 23,  53 => 19,  47 => 16,  32 => 8,  22 => 3,  108 => 47,  105 => 45,  101 => 41,  98 => 40,  95 => 39,  92 => 37,  88 => 34,  85 => 33,  81 => 34,  78 => 27,  74 => 28,  71 => 26,  67 => 24,  55 => 18,  52 => 17,  49 => 16,  40 => 12,  34 => 9,  31 => 8,  29 => 7,  26 => 5,  24 => 4,  21 => 2,  278 => 108,  275 => 96,  272 => 106,  270 => 100,  267 => 99,  263 => 98,  260 => 101,  257 => 100,  253 => 93,  250 => 91,  236 => 90,  233 => 89,  230 => 87,  227 => 86,  224 => 85,  222 => 85,  219 => 83,  216 => 82,  211 => 78,  208 => 77,  205 => 76,  202 => 75,  199 => 74,  196 => 73,  194 => 74,  191 => 73,  188 => 72,  182 => 69,  179 => 68,  176 => 66,  173 => 65,  170 => 66,  167 => 64,  164 => 63,  161 => 60,  158 => 59,  155 => 62,  137 => 54,  134 => 53,  131 => 53,  128 => 52,  125 => 41,  122 => 39,  119 => 49,  116 => 48,  113 => 45,  110 => 48,  107 => 44,  102 => 43,  99 => 43,  96 => 42,  94 => 37,  91 => 35,  89 => 36,  87 => 41,  84 => 36,  80 => 32,  77 => 32,  73 => 30,  70 => 25,  68 => 27,  66 => 26,  64 => 23,  62 => 22,  59 => 20,  57 => 20,  54 => 19,  50 => 17,  46 => 15,  43 => 14,  41 => 13,  39 => 12,  37 => 10,  35 => 10,  33 => 9,  30 => 8,  28 => 6,  25 => 5,  23 => 3,  19 => 1,);
    }
}
