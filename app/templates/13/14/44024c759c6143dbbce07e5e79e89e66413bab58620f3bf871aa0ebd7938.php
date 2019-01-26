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
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "use_width")) {
                // line 30
                echo "\t\t";
                $context["block_grid"] = array(0 => "3", 1 => "2", 2 => "1");
                // line 31
                echo "\t";
            } else {
                // line 32
                echo "\t\t";
                $context["block_grid"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "columns"), ","));
                // line 33
                echo "\t";
            }
            // line 34
            echo "\t";
            $context["columns_limit"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array((isset($context["limit"]) ? $context["limit"] : null), $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "children_count")));
            // line 35
            echo "\t";
            $context["small_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"))), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "1")), (isset($context["columns_limit"]) ? $context["columns_limit"] : null)));
            // line 36
            echo "\t";
            $context["medium_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "2")), (isset($context["columns_limit"]) ? $context["columns_limit"] : null)));
            // line 37
            echo "\t";
            $context["large_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"), "3"))) : ("3")), (isset($context["columns_limit"]) ? $context["columns_limit"] : null)));
            // line 38
            echo "
\t";
            // line 39
            $context["ul_open"] = (((((("<ul class=\"small-block-grid-" . (isset($context["small_grid"]) ? $context["small_grid"] : null)) . " medium-block-grid-") . (isset($context["medium_grid"]) ? $context["medium_grid"] : null)) . " large-block-grid-") . (isset($context["large_grid"]) ? $context["large_grid"] : null)) . " items\">");
            // line 40
            echo "\t";
            $context["li_open"] = "<li>";
            // line 41
            echo "\t";
            $context["li_close"] = "</li>";
            // line 42
            echo "\t";
            $context["ul_close"] = "</ul>";
        }
        // line 44
        echo "
";
        // line 46
        $context["children"] = call_user_func_array($this->env->getFunction('sortby')->getCallable(), array($this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "children"), $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "sortby"), ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "sort") == "desc")) ? (true) : (false))));
        // line 47
        echo "
";
        // line 49
        if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["children"]) ? $context["children"] : null))) > 0)) {
            // line 50
            echo "\t";
            echo (isset($context["ul_open"]) ? $context["ul_open"] : null);
            echo "
\t";
            // line 51
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
                // line 52
                echo "\t";
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") < (isset($context["limit"]) ? $context["limit"] : null))) {
                    // line 53
                    echo "\t\t";
                    echo (isset($context["li_open"]) ? $context["li_open"] : null);
                    echo "

\t\t";
                    // line 56
                    echo "\t\t";
                    $context["title"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "title");
                    // line 57
                    echo "\t\t";
                    $context["title_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["title"]) ? $context["title"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                    // line 58
                    echo "\t\t";
                    $context["label"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "label");
                    // line 59
                    echo "\t\t";
                    $context["child_id"] = call_user_func_array($this->env->getFilter('attribute_friendly')->getCallable(), array((isset($context["label"]) ? $context["label"] : null)));
                    // line 60
                    echo "
\t\t";
                    // line 62
                    echo "\t\t";
                    $context["date"] = (($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "date", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "date"), $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "updated")))) : ($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "updated")));
                    // line 63
                    echo "\t\t";
                    if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "date_format") == "timeago")) {
                        // line 64
                        echo "\t\t\t";
                        $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"));
                        // line 65
                        echo "\t\t\t";
                        $context["date_class"] = "date timeago";
                        // line 66
                        echo "\t\t";
                    } else {
                        // line 67
                        echo "\t\t\t";
                        $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format"), "d F Y"))) : ("d F Y"))));
                        // line 68
                        echo "\t\t\t";
                        $context["date_class"] = "date";
                        // line 69
                        echo "\t\t";
                    }
                    // line 70
                    echo "\t\t";
                    $context["time_tag"] = (((((("<time itemprop=\"dateCreated\" datetime=\"" . call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"))) . "\" class=\"") . (isset($context["date_class"]) ? $context["date_class"] : null)) . "\">") . (isset($context["date_formatted"]) ? $context["date_formatted"] : null)) . "</time>");
                    // line 71
                    echo "
\t\t";
                    // line 72
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description"))))) {
                        // line 73
                        echo "\t\t\t";
                        $context["description"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description");
                        // line 74
                        echo "\t\t\t";
                        $context["description_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["description"]) ? $context["description"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                        // line 75
                        echo "\t\t";
                    }
                    // line 76
                    echo "
\t\t";
                    // line 78
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "gallery"), "assets"))))) {
                        // line 79
                        echo "\t\t\t";
                        $context["amount"] = call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, $this->getAttribute(call_user_func_array($this->env->getFunction('get')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "gallery"), "assets"))), "images")));
                        // line 80
                        echo "\t\t";
                    } else {
                        // line 81
                        echo "\t\t\t";
                        $context["amount"] = call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "images")));
                        // line 82
                        echo "\t\t";
                    }
                    // line 83
                    echo "
\t\t";
                    // line 85
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "folders"), "assets"))))) {
                        // line 86
                        echo "\t\t\t";
                        $context["folders_amount"] = $this->getAttribute(call_user_func_array($this->env->getFunction('get')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "folders"), "assets"))), "children_count");
                        // line 87
                        echo "\t\t";
                    } else {
                        // line 88
                        echo "\t\t\t";
                        $context["folders_amount"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "children_count");
                        // line 89
                        echo "\t\t";
                    }
                    // line 90
                    echo "
\t\t";
                    // line 92
                    echo "\t\t";
                    if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "tooltip"), "enabled")) {
                        // line 93
                        echo "\t\t\t";
                        $context["tooltip_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "tooltip"), "items"), ","));
                        // line 94
                        echo "\t\t\t";
                        ob_start();
                        // line 95
                        echo "\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["tooltip_items"]) ? $context["tooltip_items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 96
                            echo "\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo "<span class=\"title\">";
                                echo (isset($context["title"]) ? $context["title"] : null);
                                echo "</span>
\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 97
                                echo "<span class=\"title\">";
                                echo (isset($context["label"]) ? $context["label"] : null);
                                echo "</span>
\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 98
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "
\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "amount") && ((isset($context["amount"]) ? $context["amount"] : null) > 0))) {
                                // line 99
                                echo "<span class=\"amount\">";
                                echo (isset($context["amount"]) ? $context["amount"] : null);
                                echo " ";
                                echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["amount"]) ? $context["amount"] : null), "image", "images"));
                                echo "</span>
\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "folders_amount") && ((isset($context["folders_amount"]) ? $context["folders_amount"] : null) > 0))) {
                                // line 100
                                echo "<span class=\"folder_amount\">";
                                echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                                echo " ";
                                echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["folders_amount"]) ? $context["folders_amount"] : null), "album", "albums"));
                                echo "</span>
\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 101
                                echo "<span class=\"description\">";
                                echo (isset($context["description"]) ? $context["description"] : null);
                                echo "</span>
\t\t\t\t";
                            }
                            // line 103
                            echo "\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 104
                        echo "\t\t\t";
                        $context["link_title_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 105
                        echo "\t\t\t";
                        $context["link_title_content"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["link_title_content"]) ? $context["link_title_content"] : null), "html"))));
                        // line 106
                        echo "\t\t\t";
                        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["link_title_content"]) ? $context["link_title_content"] : null))))) {
                            ob_start();
                            echo "title=\"";
                            echo (isset($context["link_title_content"]) ? $context["link_title_content"] : null);
                            echo "\"";
                            $context["link_title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        }
                        // line 107
                        echo "\t\t";
                    }
                    // line 108
                    echo "
\t\t";
                    // line 110
                    echo "\t\t";
                    $context["link_target"] = "";
                    // line 111
                    echo "\t\t";
                    $context["link_class"] = "";
                    // line 112
                    echo "\t\t";
                    $context["data_popup"] = false;
                    // line 113
                    echo "\t\t";
                    $context["data_popup_content"] = false;
                    // line 114
                    echo "\t\t";
                    $context["data_popup_window"] = "";
                    // line 115
                    echo "\t\t";
                    $context["nofollow"] = "";
                    // line 116
                    echo "
\t\t";
                    // line 118
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "url"))))) {
                        // line 119
                        echo "
\t\t\t";
                        // line 121
                        echo "\t\t\t";
                        $context["link"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "url")));
                        // line 122
                        echo "
\t\t\t";
                        // line 124
                        echo "\t\t\t";
                        if ((0 === substr_compare((isset($context["link"]) ? $context["link"] : null), ":nofollow", -strlen(":nofollow")))) {
                            // line 125
                            echo "\t\t\t\t";
                            $context["nofollow"] = " rel=\"nofollow\"";
                            // line 126
                            echo "\t\t\t\t";
                            $context["link"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["link"]) ? $context["link"] : null), array(":nofollow" => "")));
                            // line 127
                            echo "\t\t\t";
                        }
                        // line 128
                        echo "
\t\t\t";
                        // line 130
                        echo "\t\t\t";
                        $context["hasExtension"] = call_user_func_array($this->env->getFunction('hasExtension')->getCallable(), array((isset($context["link"]) ? $context["link"] : null)));
                        // line 131
                        echo "
\t\t\t";
                        // line 133
                        echo "\t\t\t";
                        if (((call_user_func_array($this->env->getFilter('first')->getCallable(), array($this->env, (isset($context["link"]) ? $context["link"] : null))) != "/") && !twig_in_filter("http", (isset($context["link"]) ? $context["link"] : null)))) {
                            // line 134
                            echo "\t\t\t\t";
                            if ((isset($context["hasExtension"]) ? $context["hasExtension"] : null)) {
                                // line 135
                                echo "\t\t\t\t\t";
                                $context["link"] = ((call_user_func_array($this->env->getFilter('setpath')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "file_path"), "./")), (isset($context["rootpath"]) ? $context["rootpath"] : null))) . "/") . (isset($context["link"]) ? $context["link"] : null));
                                // line 136
                                echo "\t\t\t\t";
                            } else {
                                // line 137
                                echo "\t\t\t\t\t";
                                $context["link"] = (call_user_func_array($this->env->getFilter('setpath')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "permalink"), (isset($context["rootpath"]) ? $context["rootpath"] : null))) . (isset($context["link"]) ? $context["link"] : null));
                                // line 138
                                echo "\t\t\t\t";
                            }
                            // line 139
                            echo "
\t\t\t";
                            // line 141
                            echo "\t\t\t";
                        } elseif ((((call_user_func_array($this->env->getFilter('first')->getCallable(), array($this->env, (isset($context["link"]) ? $context["link"] : null))) == "/") && (call_user_func_array($this->env->getFilter('last')->getCallable(), array($this->env, (isset($context["link"]) ? $context["link"] : null))) != "/")) && (!(isset($context["hasExtension"]) ? $context["hasExtension"] : null)))) {
                            // line 142
                            echo "\t\t\t\t";
                            $context["link"] = ((isset($context["link"]) ? $context["link"] : null) . "/");
                            // line 143
                            echo "\t\t\t";
                        }
                        // line 144
                        echo "
\t\t\t";
                        // line 146
                        echo "\t\t\t";
                        if (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") && ($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") != "auto"))) {
                            // line 147
                            echo "\t\t\t\t";
                            if (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") == "popup")) {
                                // line 148
                                echo "\t\t\t\t\t";
                                // line 149
                                echo "\t\t\t\t\t";
                                $context["data_popup_window"] = (((($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "slug") . ",") . (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "width", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "width"), "600"))) : ("600"))) . ",") . (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "height", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "height"), "500"))) : ("500")));
                                // line 150
                                echo "\t\t\t\t";
                            } elseif (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") == "x3_popup")) {
                                // line 151
                                echo "\t\t\t\t\t";
                                // line 152
                                echo "\t\t\t\t\t";
                                $context["data_popup"] = true;
                                // line 153
                                echo "\t\t\t\t\t";
                                if ($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "content")) {
                                    // line 154
                                    echo "\t\t\t\t\t\t";
                                    $context["data_popup_content"] = true;
                                    // line 155
                                    echo "\t\t\t\t\t\t";
                                    $context["link"] = "#";
                                    // line 156
                                    echo "\t\t\t\t\t";
                                }
                                // line 157
                                echo "\t\t\t\t";
                            } else {
                                // line 158
                                echo "\t\t\t\t\t";
                                $context["link_target"] = $this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target");
                                // line 159
                                echo "\t\t\t\t";
                            }
                            // line 160
                            echo "\t\t\t";
                        } elseif ((twig_in_filter("http", (isset($context["link"]) ? $context["link"] : null)) || (isset($context["hasExtension"]) ? $context["hasExtension"] : null))) {
                            // line 161
                            echo "\t\t\t\t";
                            $context["link_target"] = "_blank";
                            // line 162
                            echo "\t\t\t";
                        }
                        // line 163
                        echo "
\t\t\t";
                        // line 165
                        echo "\t\t\t";
                        if ((isset($context["hasExtension"]) ? $context["hasExtension"] : null)) {
                            // line 166
                            echo "\t\t\t\t";
                            $context["link_class"] = ((isset($context["link_class"]) ? $context["link_class"] : null) . " no-ajax");
                            // line 167
                            echo "\t\t\t";
                        }
                        // line 168
                        echo "
\t\t";
                    } elseif (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "content") && ($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") == "x3_popup"))) {
                        // line 170
                        echo "\t\t\t";
                        $context["data_popup"] = true;
                        // line 171
                        echo "\t\t\t";
                        $context["data_popup_content"] = true;
                        // line 172
                        echo "\t\t\t";
                        $context["link"] = "#";
                        // line 173
                        echo "\t\t";
                    } else {
                        // line 174
                        echo "\t\t\t";
                        $context["link"] = call_user_func_array($this->env->getFilter('setpath')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "permalink"), array(" " => "_"))), "html")), (isset($context["rootpath"]) ? $context["rootpath"] : null)));
                        // line 175
                        echo "\t\t";
                    }
                    // line 176
                    echo "
\t\t";
                    // line 178
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
                    // line 179
                    echo "
\t\t";
                    // line 181
                    echo "\t\t";
                    ob_start();
                    $this->env->loadTemplate("partials/preview-image.html")->display(array_merge($context, array("page" => (isset($context["child"]) ? $context["child"] : null))));
                    $context["preview_img"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 182
                    echo "
\t\t";
                    // line 184
                    echo "\t\t";
                    if (call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["preview_img"]) ? $context["preview_img"] : null)))) {
                        $context["preview_img"] = (isset($context["preview_image"]) ? $context["preview_image"] : null);
                    }
                    // line 185
                    echo "
\t\t";
                    // line 187
                    echo "\t\t";
                    $context["preview_img_url"] = ((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["preview_img"]) ? $context["preview_img"] : null), ".")));
                    // line 188
                    echo "
\t\t";
                    // line 190
                    echo "    ";
                    if (((isset($context["preview_img"]) ? $context["preview_img"] : null) == "./app/public/images/default.png")) {
                        // line 191
                        echo "    \t";
                        $context["imgInfo"] = array(0 => 1280, 1 => 1280);
                        // line 192
                        echo "    \t";
                        $context["image_ratio"] = 100;
                        // line 193
                        echo "    ";
                    } else {
                        // line 194
                        echo "\t\t\t";
                        $context["imgInfo"] = call_user_func_array($this->env->getFunction('getimginfo')->getCallable(), array((isset($context["preview_img"]) ? $context["preview_img"] : null)));
                        // line 195
                        echo "    \t";
                        $context["image_ratio"] = ((array_key_exists("crop_ratio", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["crop_ratio"]) ? $context["crop_ratio"] : null), (((($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array"), 3))) : (3)) / (($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array"), 2))) : (2))) * 100)))) : ((((($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array"), 3))) : (3)) / (($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array"), 2))) : (2))) * 100)));
                        // line 196
                        echo "    ";
                    }
                    // line 197
                    echo "
    ";
                    // line 199
                    echo "    ";
                    ob_start();
                    // line 200
                    echo "    \t<h2 id=\"title-";
                    echo (isset($context["child_id"]) ? $context["child_id"] : null);
                    echo "\" data-file=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_img"]) ? $context["preview_img"] : null)));
                    echo "\" class=\"title\">";
                    echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                    echo "</h2>
    ";
                    $context["title_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 202
                    echo "    ";
                    ob_start();
                    // line 203
                    echo "    \t<h2 id=\"title-";
                    echo (isset($context["child_id"]) ? $context["child_id"] : null);
                    echo "\" class=\"title\">";
                    echo (isset($context["label"]) ? $context["label"] : null);
                    echo "</h2>
    ";
                    $context["label_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 205
                    echo "    ";
                    ob_start();
                    // line 206
                    echo "    \t<h6 class=\"date\">";
                    echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                    echo "</h6>
    ";
                    $context["date_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 208
                    echo "    ";
                    ob_start();
                    // line 209
                    echo "    \t";
                    if (((isset($context["amount"]) ? $context["amount"] : null) > 0)) {
                        // line 210
                        echo "    \t<h6 class=\"amount\"><span>";
                        echo (isset($context["amount"]) ? $context["amount"] : null);
                        echo " ";
                        echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["amount"]) ? $context["amount"] : null), "image", "images"));
                        echo "</span></h6>
    \t";
                    }
                    // line 212
                    echo "    ";
                    $context["amount_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 213
                    echo "    ";
                    ob_start();
                    // line 214
                    echo "    \t";
                    if (((isset($context["folders_amount"]) ? $context["folders_amount"] : null) > 0)) {
                        // line 215
                        echo "    \t<h6 class=\"folder_amount\"><span>";
                        echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                        echo " ";
                        echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["folders_amount"]) ? $context["folders_amount"] : null), "album", "albums"));
                        echo "</span></h6>
    \t";
                    }
                    // line 217
                    echo "    ";
                    $context["folders_amount_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 218
                    echo "    ";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description"))))) {
                        // line 219
                        echo "      ";
                        ob_start();
                        // line 220
                        echo "      \t<p>";
                        echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                        echo "</p>
      ";
                        $context["description_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 222
                        echo "    ";
                    }
                    // line 223
                    echo "    ";
                    ob_start();
                    // line 224
                    echo "    <figure>
\t\t\t<div class=\"img-link\">
\t\t\t\t<div class=\"image-container\" style=\"padding-bottom:";
                    // line 226
                    echo (isset($context["image_ratio"]) ? $context["image_ratio"] : null);
                    echo "%;\">
        \t<img data-src=\"";
                    // line 227
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
                    // line 230
                    if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "caption"), "enabled")) {
                        // line 231
                        echo "        \t";
                        ob_start();
                        // line 232
                        echo "\t        \t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "caption"), "items"), ",")));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 233
                            echo "\t        \t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo "<span class=\"title\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</span>
\t        \t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 234
                                echo "<span class=\"title\">";
                                echo (isset($context["label"]) ? $context["label"] : null);
                                echo "</span>
\t        \t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "amount") && ((isset($context["amount"]) ? $context["amount"] : null) > 0))) {
                                // line 235
                                echo "<span class=\"amount\">";
                                echo (isset($context["amount"]) ? $context["amount"] : null);
                                echo " ";
                                echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["amount"]) ? $context["amount"] : null), "image", "images"));
                                echo "</span>
\t        \t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "folders_amount") && ((isset($context["folders_amount"]) ? $context["folders_amount"] : null) > 0))) {
                                // line 236
                                echo "<span class=\"folder_amount\">";
                                echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                                echo " ";
                                echo call_user_func_array($this->env->getFunction('pluralize')->getCallable(), array((isset($context["folders_amount"]) ? $context["folders_amount"] : null), "album", "albums"));
                                echo "</span>
\t        \t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 237
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "
\t        \t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 238
                                echo "<span class=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</span>";
                            }
                            // line 239
                            echo "\t        \t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 240
                        echo "        \t";
                        $context["figcaption"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 241
                        echo "        ";
                        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["figcaption"]) ? $context["figcaption"] : null))))))) {
                            echo "<figcaption>";
                            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array((isset($context["figcaption"]) ? $context["figcaption"] : null)));
                            echo "</figcaption>";
                        }
                        // line 242
                        echo "        ";
                    }
                    // line 243
                    echo "\t\t\t</div>
\t\t</figure>
\t\t";
                    $context["figure"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 246
                    echo "
\t\t";
                    // line 248
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
                    // line 249
                    echo (isset($context["href_tag"]) ? $context["href_tag"] : null);
                    echo "

\t\t";
                    // line 252
                    echo "\t\t";
                    if ((isset($context["folders_split_view"]) ? $context["folders_split_view"] : null)) {
                        // line 253
                        echo "
\t\t";
                        // line 255
                        echo "\t\t";
                        if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "invert")) {
                            // line 256
                            echo "\t\t\t";
                            $context["text_align"] = "medium-text-left";
                            // line 257
                            echo "\t\t";
                        } elseif ((!twig_in_filter("text-right", $this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "classes")) && !twig_in_filter("text-left", $this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "classes")))) {
                            // line 258
                            echo "\t\t\t";
                            $context["text_align"] = "medium-text-right";
                            // line 259
                            echo "\t\t";
                        }
                        // line 260
                        echo "
\t\t";
                        // line 262
                        echo "\t\t<div class=\"medium-";
                        echo $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "ratio");
                        echo " columns ";
                        echo (isset($context["push"]) ? $context["push"] : null);
                        echo " ";
                        echo (isset($context["text_align"]) ? $context["text_align"] : null);
                        echo "\">
\t\t";
                        // line 263
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 264
                            echo "\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo (isset($context["title_tag"]) ? $context["title_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 265
                                echo (isset($context["label_tag"]) ? $context["label_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 266
                                echo (isset($context["date_tag"]) ? $context["date_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "amount")) {
                                // line 267
                                echo (isset($context["amount_tag"]) ? $context["amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "folders_amount")) {
                                // line 268
                                echo (isset($context["folders_amount_tag"]) ? $context["folders_amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 269
                                echo (isset($context["description_tag"]) ? $context["description_tag"] : null);
                            }
                            // line 270
                            echo "\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 271
                        echo "\t\t</div>
\t\t<div class=\"medium-";
                        // line 272
                        echo (12 - $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "ratio"));
                        echo " columns ";
                        echo (isset($context["pull"]) ? $context["pull"] : null);
                        echo "\">
\t\t\t";
                        // line 273
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t</div>

\t\t";
                        // line 277
                        echo "\t\t";
                    } elseif (($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") != "justified")) {
                        // line 278
                        echo "\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 279
                            echo "\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo (isset($context["title_tag"]) ? $context["title_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 280
                                echo (isset($context["label_tag"]) ? $context["label_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 281
                                echo (isset($context["date_tag"]) ? $context["date_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "amount")) {
                                // line 282
                                echo (isset($context["amount_tag"]) ? $context["amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "folders_amount")) {
                                // line 283
                                echo (isset($context["folders_amount_tag"]) ? $context["folders_amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 284
                                echo (isset($context["description_tag"]) ? $context["description_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "preview")) {
                                // line 285
                                echo (isset($context["figure"]) ? $context["figure"] : null);
                            }
                            // line 286
                            echo "\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 287
                        echo "
\t\t";
                        // line 289
                        echo "\t\t";
                    } else {
                        // line 290
                        echo "\t\t\t";
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t";
                    }
                    // line 292
                    echo "
\t\t</a>
\t\t</section>

\t\t";
                    // line 297
                    echo "\t\t";
                    if (((((($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") == "vertical") && $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "vertical"), "horizontal_rule")) && (!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) && ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") < (isset($context["limit"]) ? $context["limit"] : null))) || ((isset($context["folders_split_view"]) ? $context["folders_split_view"] : null) && ($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") == "grid")))) {
                        // line 298
                        echo "\t\t<hr class=\"hr\">
\t\t";
                    }
                    // line 300
                    echo "
\t\t";
                    // line 301
                    echo (isset($context["li_close"]) ? $context["li_close"] : null);
                    echo "
\t";
                }
                // line 303
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
            // line 304
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
        return array (  980 => 304,  966 => 303,  961 => 301,  958 => 300,  954 => 298,  951 => 297,  945 => 292,  939 => 290,  936 => 289,  933 => 287,  927 => 286,  924 => 285,  919 => 284,  914 => 283,  909 => 282,  904 => 281,  899 => 280,  892 => 279,  887 => 278,  884 => 277,  878 => 273,  872 => 272,  869 => 271,  863 => 270,  860 => 269,  855 => 268,  850 => 267,  845 => 266,  840 => 265,  833 => 264,  829 => 263,  820 => 262,  817 => 260,  814 => 259,  811 => 258,  808 => 257,  805 => 256,  802 => 255,  799 => 253,  796 => 252,  791 => 249,  776 => 248,  773 => 246,  768 => 243,  765 => 242,  758 => 241,  755 => 240,  749 => 239,  744 => 238,  739 => 237,  731 => 236,  723 => 235,  717 => 234,  709 => 233,  704 => 232,  701 => 231,  699 => 230,  687 => 227,  683 => 226,  679 => 224,  676 => 223,  673 => 222,  667 => 220,  664 => 219,  661 => 218,  658 => 217,  650 => 215,  647 => 214,  644 => 213,  641 => 212,  633 => 210,  630 => 209,  627 => 208,  621 => 206,  618 => 205,  610 => 203,  607 => 202,  597 => 200,  594 => 199,  591 => 197,  588 => 196,  585 => 195,  582 => 194,  579 => 193,  576 => 192,  573 => 191,  570 => 190,  567 => 188,  564 => 187,  561 => 185,  556 => 184,  553 => 182,  548 => 181,  545 => 179,  509 => 178,  506 => 176,  503 => 175,  500 => 174,  497 => 173,  494 => 172,  491 => 171,  488 => 170,  484 => 168,  481 => 167,  478 => 166,  475 => 165,  472 => 163,  469 => 162,  466 => 161,  463 => 160,  460 => 159,  457 => 158,  454 => 157,  451 => 156,  448 => 155,  445 => 154,  442 => 153,  439 => 152,  437 => 151,  434 => 150,  431 => 149,  429 => 148,  426 => 147,  423 => 146,  420 => 144,  417 => 143,  414 => 142,  411 => 141,  408 => 139,  405 => 138,  402 => 137,  399 => 136,  396 => 135,  393 => 134,  390 => 133,  387 => 131,  381 => 128,  375 => 126,  372 => 125,  369 => 124,  366 => 122,  360 => 119,  351 => 115,  348 => 114,  345 => 113,  342 => 112,  336 => 110,  333 => 108,  330 => 107,  321 => 106,  318 => 105,  295 => 100,  282 => 98,  276 => 97,  268 => 96,  248 => 89,  245 => 88,  242 => 87,  221 => 79,  218 => 78,  215 => 76,  212 => 75,  209 => 74,  206 => 73,  204 => 72,  189 => 67,  186 => 66,  183 => 65,  180 => 64,  177 => 63,  165 => 58,  153 => 53,  150 => 52,  126 => 49,  123 => 47,  121 => 46,  118 => 44,  97 => 36,  82 => 31,  384 => 130,  378 => 127,  376 => 147,  373 => 146,  370 => 144,  363 => 121,  359 => 137,  352 => 135,  346 => 133,  343 => 132,  340 => 130,  334 => 128,  328 => 125,  322 => 123,  319 => 122,  316 => 120,  306 => 118,  287 => 99,  281 => 110,  249 => 97,  246 => 95,  193 => 76,  190 => 75,  187 => 74,  184 => 73,  181 => 71,  175 => 68,  172 => 67,  169 => 66,  166 => 65,  163 => 64,  160 => 62,  148 => 57,  145 => 56,  133 => 51,  111 => 41,  83 => 34,  174 => 62,  157 => 61,  154 => 59,  114 => 42,  86 => 35,  60 => 23,  48 => 17,  51 => 19,  42 => 13,  127 => 51,  124 => 49,  120 => 47,  117 => 46,  106 => 39,  103 => 38,  100 => 37,  93 => 37,  79 => 30,  76 => 29,  58 => 22,  45 => 16,  38 => 12,  90 => 35,  61 => 24,  56 => 20,  44 => 14,  36 => 11,  27 => 6,  357 => 118,  354 => 116,  344 => 127,  341 => 126,  339 => 111,  335 => 124,  331 => 127,  329 => 122,  323 => 118,  320 => 116,  315 => 104,  312 => 114,  309 => 103,  303 => 101,  300 => 116,  297 => 114,  291 => 105,  288 => 104,  284 => 111,  269 => 105,  266 => 103,  254 => 92,  251 => 90,  243 => 94,  239 => 86,  226 => 86,  223 => 70,  220 => 68,  214 => 66,  201 => 71,  198 => 70,  195 => 69,  192 => 68,  185 => 56,  178 => 70,  171 => 60,  168 => 59,  162 => 57,  159 => 56,  152 => 59,  146 => 46,  142 => 54,  136 => 52,  130 => 49,  115 => 46,  112 => 36,  69 => 28,  65 => 23,  53 => 19,  47 => 16,  32 => 8,  22 => 3,  108 => 40,  105 => 45,  101 => 41,  98 => 40,  95 => 39,  92 => 37,  88 => 33,  85 => 32,  81 => 34,  78 => 27,  74 => 28,  71 => 26,  67 => 24,  55 => 18,  52 => 17,  49 => 16,  40 => 12,  34 => 9,  31 => 8,  29 => 7,  26 => 5,  24 => 4,  21 => 2,  278 => 108,  275 => 96,  272 => 106,  270 => 102,  267 => 100,  263 => 95,  260 => 94,  257 => 93,  253 => 93,  250 => 91,  236 => 85,  233 => 83,  230 => 82,  227 => 81,  224 => 80,  222 => 85,  219 => 83,  216 => 82,  211 => 83,  208 => 82,  205 => 80,  202 => 79,  199 => 78,  196 => 77,  194 => 74,  191 => 73,  188 => 72,  182 => 69,  179 => 68,  176 => 66,  173 => 65,  170 => 66,  167 => 64,  164 => 63,  161 => 60,  158 => 59,  155 => 57,  137 => 54,  134 => 53,  131 => 53,  128 => 50,  125 => 41,  122 => 39,  119 => 49,  116 => 48,  113 => 45,  110 => 48,  107 => 44,  102 => 43,  99 => 43,  96 => 42,  94 => 35,  91 => 34,  89 => 36,  87 => 41,  84 => 36,  80 => 32,  77 => 32,  73 => 30,  70 => 25,  68 => 27,  66 => 26,  64 => 23,  62 => 22,  59 => 20,  57 => 20,  54 => 19,  50 => 17,  46 => 15,  43 => 14,  41 => 13,  39 => 12,  37 => 10,  35 => 10,  33 => 9,  30 => 8,  28 => 6,  25 => 5,  23 => 3,  19 => 1,);
    }
}
