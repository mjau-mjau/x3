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
        if ((($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "crop"), "enabled") && ($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") != "justified")) && ($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") != "columns"))) {
            // line 23
            echo "\t";
            $context["crop_ratio"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "crop"), "crop"), 1, array(), "array") / $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "crop"), "crop"), 0, array(), "array")) * 100);
            // line 24
            echo "\t";
            $context["data_crop"] = ((((" data-crop=\"" . call_user_func_array($this->env->getFilter('round')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "crop"), "crop"), 0, array(), "array")))) . ".") . call_user_func_array($this->env->getFilter('round')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "crop"), "crop"), 1, array(), "array")))) . "\"");
        }
        // line 26
        echo "
";
        // line 28
        $context["children"] = call_user_func_array($this->env->getFunction('sortby')->getCallable(), array($this->getAttribute((isset($context["folder"]) ? $context["folder"] : null), "children"), $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "sortby"), ((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "folders"), "sort") == "desc")) ? (true) : (false))));
        // line 29
        echo "
";
        // line 31
        if (($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") == "grid")) {
            // line 32
            echo "
\t";
            // line 34
            echo "\t";
            if (($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "space") > (-1))) {
                // line 35
                echo "\t\t";
                $context["ul_style"] = ((" style=\"margin: 0 " . ((((isset($context["width"]) ? $context["width"] : null) == "wide")) ? (($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "space") / 2)) : (((-$this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "space")) / 4)))) . "px\"");
                // line 36
                echo "\t\t";
                $context["li_style"] = ((((" style=\"padding: 0 " . ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "space") / 2)) . "px ") . $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "space")) . "px\"");
                // line 37
                echo "\t";
            }
            // line 38
            echo "
\t";
            // line 40
            echo "\t";
            if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "use_width")) {
                // line 41
                echo "\t\t";
                $context["ul_open"] = (("<ul class=\"items\"" . (isset($context["ul_style"]) ? $context["ul_style"] : null)) . ">");
                // line 42
                echo "
\t";
                // line 44
                echo "\t";
            } else {
                // line 45
                echo "\t\t";
                $context["block_grid"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array(call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "grid"), "columns"), array(" " => ""))), ","));
                // line 46
                echo "\t\t";
                // line 47
                echo "\t\t";
                $context["columns_max"] = call_user_func_array($this->env->getFunction('max')->getCallable(), array(call_user_func_array($this->env->getFunction('min')->getCallable(), array((isset($context["limit"]) ? $context["limit"] : null), call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["children"]) ? $context["children"] : null))))), 3));
                // line 48
                echo "\t\t";
                $context["small_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 2, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"))), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "1")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 49
                echo "\t\t";
                $context["medium_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array(call_user_func_array($this->env->getFilter('default')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 1, array(), "array"), $this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array")))) : ($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"))), "2")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 50
                echo "\t\t";
                $context["large_grid"] = call_user_func_array($this->env->getFunction('min')->getCallable(), array((($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["block_grid"]) ? $context["block_grid"] : null), 0, array(), "array"), "3"))) : ("3")), (isset($context["columns_max"]) ? $context["columns_max"] : null)));
                // line 51
                echo "\t\t";
                $context["ul_open"] = (((((((("<ul class=\"small-block-grid-" . (isset($context["small_grid"]) ? $context["small_grid"] : null)) . " medium-block-grid-") . (isset($context["medium_grid"]) ? $context["medium_grid"] : null)) . " large-block-grid-") . (isset($context["large_grid"]) ? $context["large_grid"] : null)) . " items\"") . (isset($context["ul_style"]) ? $context["ul_style"] : null)) . ">");
                // line 52
                echo "\t";
            }
            // line 53
            echo "
\t";
            // line 55
            echo "\t";
            $context["li_open"] = (("<li" . (isset($context["li_style"]) ? $context["li_style"] : null)) . ">");
            // line 56
            echo "\t";
            $context["li_close"] = "</li>";
            // line 57
            echo "\t";
            $context["ul_close"] = "</ul>";
        }
        // line 59
        echo "
";
        // line 61
        if ((call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, (isset($context["children"]) ? $context["children"] : null))) > 0)) {
            // line 62
            echo "\t";
            echo (isset($context["ul_open"]) ? $context["ul_open"] : null);
            echo "
\t";
            // line 63
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
                // line 64
                echo "\t";
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") < (isset($context["limit"]) ? $context["limit"] : null))) {
                    // line 65
                    echo "\t\t";
                    echo (isset($context["li_open"]) ? $context["li_open"] : null);
                    echo "

\t\t";
                    // line 68
                    echo "\t\t";
                    $context["title"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "title");
                    // line 69
                    echo "\t\t";
                    $context["title_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["title"]) ? $context["title"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                    // line 70
                    echo "\t\t";
                    $context["label"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "label");
                    // line 71
                    echo "\t\t";
                    $context["child_id"] = call_user_func_array($this->env->getFilter('attribute_friendly')->getCallable(), array((isset($context["label"]) ? $context["label"] : null)));
                    // line 72
                    echo "
\t\t";
                    // line 74
                    echo "\t\t";
                    $context["date"] = (($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "date", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "date"), $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "updated")))) : ($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "updated")));
                    // line 75
                    echo "\t\t";
                    if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "date_format") == "timeago")) {
                        // line 76
                        echo "\t\t\t";
                        $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"));
                        // line 77
                        echo "\t\t\t";
                        $context["date_class"] = "date timeago";
                        // line 78
                        echo "\t\t";
                    } else {
                        // line 79
                        echo "\t\t\t";
                        $context["date_formatted"] = call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings", array(), "any", false, true), "date_format"), "d F Y"))) : ("d F Y"))));
                        // line 80
                        echo "\t\t\t";
                        $context["date_class"] = "date";
                        // line 81
                        echo "\t\t";
                    }
                    // line 82
                    echo "\t\t";
                    $context["time_tag"] = (((((("<time itemprop=\"dateCreated\" datetime=\"" . call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : null), "c"))) . "\" class=\"") . (isset($context["date_class"]) ? $context["date_class"] : null)) . "\">") . (isset($context["date_formatted"]) ? $context["date_formatted"] : null)) . "</time>");
                    // line 83
                    echo "
\t\t";
                    // line 84
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description"))))) {
                        // line 85
                        echo "\t\t\t";
                        $context["description"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description");
                        // line 86
                        echo "\t\t\t";
                        $context["description_pseudo"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["description"]) ? $context["description"] : null), array("<a" => "<span", "</a>" => "</span>", " href=" => " data-href=", " target=" => " data-target=")));
                        // line 87
                        echo "\t\t";
                    }
                    // line 88
                    echo "
\t\t";
                    // line 90
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "gallery"), "assets"))))) {
                        // line 91
                        echo "\t\t\t";
                        $context["amount"] = call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, $this->getAttribute(call_user_func_array($this->env->getFunction('get')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "gallery"), "assets"))), "images")));
                        // line 92
                        echo "\t\t";
                    } else {
                        // line 93
                        echo "\t\t\t";
                        $context["amount"] = call_user_func_array($this->env->getFilter('length')->getCallable(), array($this->env, $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "images")));
                        // line 94
                        echo "\t\t";
                    }
                    // line 95
                    echo "
\t\t";
                    // line 97
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "folders"), "assets"))))) {
                        // line 98
                        echo "\t\t\t";
                        $context["folders_amount"] = $this->getAttribute(call_user_func_array($this->env->getFunction('get')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "folders"), "assets"))), "children_count");
                        // line 99
                        echo "\t\t";
                    } else {
                        // line 100
                        echo "\t\t\t";
                        $context["folders_amount"] = $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "children_count");
                        // line 101
                        echo "\t\t";
                    }
                    // line 102
                    echo "
\t\t";
                    // line 104
                    echo "\t\t";
                    if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "tooltip"), "enabled")) {
                        // line 105
                        echo "\t\t\t";
                        $context["tooltip_items"] = call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "tooltip"), "items"), ","));
                        // line 106
                        echo "\t\t\t";
                        ob_start();
                        // line 107
                        echo "\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["tooltip_items"]) ? $context["tooltip_items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 108
                            echo "\t\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo "<span class=\"title\">";
                                echo (isset($context["title"]) ? $context["title"] : null);
                                echo "</span>
\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 109
                                echo "<span class=\"title\">";
                                echo (isset($context["label"]) ? $context["label"] : null);
                                echo "</span>
\t\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 110
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "
\t\t\t\t";
                                // line 112
                                echo "\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "amount") && ((isset($context["amount"]) ? $context["amount"] : null) > 0))) {
                                echo "<span class=\"amount\" data-lang=\"image";
                                echo ((((isset($context["amount"]) ? $context["amount"] : null) == 1)) ? ("") : ("s"));
                                echo "\">";
                                echo (isset($context["amount"]) ? $context["amount"] : null);
                                echo "</span>
\t\t\t\t";
                                // line 114
                                echo "\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "folders_amount") && ((isset($context["folders_amount"]) ? $context["folders_amount"] : null) > 0))) {
                                echo "<span class=\"folder_amount\" data-lang=\"folder";
                                echo ((((isset($context["folders_amount"]) ? $context["folders_amount"] : null) == 1)) ? ("") : ("s"));
                                echo "\">";
                                echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                                echo "</span>
\t\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 115
                                echo "<span class=\"description\">";
                                echo (isset($context["description"]) ? $context["description"] : null);
                                echo "</span>
\t\t\t\t";
                            }
                            // line 117
                            echo "\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 118
                        echo "\t\t\t";
                        $context["link_title_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 119
                        echo "\t\t\t";
                        $context["link_title_content"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["link_title_content"]) ? $context["link_title_content"] : null), "html"))));
                        // line 120
                        echo "\t\t\t";
                        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["link_title_content"]) ? $context["link_title_content"] : null))))) {
                            ob_start();
                            echo "title=\"";
                            echo (isset($context["link_title_content"]) ? $context["link_title_content"] : null);
                            echo "\"";
                            $context["link_title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        }
                        // line 121
                        echo "\t\t";
                    }
                    // line 122
                    echo "
\t\t";
                    // line 124
                    echo "\t\t";
                    $context["link_target"] = "";
                    // line 125
                    echo "\t\t";
                    $context["link_class"] = "";
                    // line 126
                    echo "\t\t";
                    $context["data_popup"] = false;
                    // line 127
                    echo "\t\t";
                    $context["data_popup_content"] = false;
                    // line 128
                    echo "\t\t";
                    $context["data_popup_window"] = "";
                    // line 129
                    echo "\t\t";
                    $context["nofollow"] = "";
                    // line 130
                    echo "
\t\t";
                    // line 132
                    echo "\t\t";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "url"))))) {
                        // line 133
                        echo "
\t\t\t";
                        // line 135
                        echo "\t\t\t";
                        $context["link"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "url")));
                        // line 136
                        echo "
\t\t\t";
                        // line 138
                        echo "\t\t\t";
                        if ((0 === substr_compare((isset($context["link"]) ? $context["link"] : null), ":nofollow", -strlen(":nofollow")))) {
                            // line 139
                            echo "\t\t\t\t";
                            $context["nofollow"] = " rel=\"nofollow\"";
                            // line 140
                            echo "\t\t\t\t";
                            $context["link"] = call_user_func_array($this->env->getFilter('replace')->getCallable(), array((isset($context["link"]) ? $context["link"] : null), array(":nofollow" => "")));
                            // line 141
                            echo "\t\t\t";
                        }
                        // line 142
                        echo "
\t\t\t";
                        // line 144
                        echo "\t\t\t";
                        $context["hasExtension"] = call_user_func_array($this->env->getFunction('hasExtension')->getCallable(), array((isset($context["link"]) ? $context["link"] : null)));
                        // line 145
                        echo "
\t\t\t";
                        // line 147
                        echo "\t\t\t";
                        if (((call_user_func_array($this->env->getFilter('first')->getCallable(), array($this->env, (isset($context["link"]) ? $context["link"] : null))) != "/") && !twig_in_filter("http", (isset($context["link"]) ? $context["link"] : null)))) {
                            // line 148
                            echo "\t\t\t\t";
                            if ((isset($context["hasExtension"]) ? $context["hasExtension"] : null)) {
                                // line 149
                                echo "\t\t\t\t\t";
                                $context["link"] = ((call_user_func_array($this->env->getFilter('setpath')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "file_path"), "./")), (isset($context["rootpath"]) ? $context["rootpath"] : null))) . "/") . (isset($context["link"]) ? $context["link"] : null));
                                // line 150
                                echo "\t\t\t\t";
                            } else {
                                // line 151
                                echo "\t\t\t\t\t";
                                $context["link"] = (call_user_func_array($this->env->getFilter('setpath')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "permalink"), (isset($context["rootpath"]) ? $context["rootpath"] : null))) . (isset($context["link"]) ? $context["link"] : null));
                                // line 152
                                echo "\t\t\t\t";
                            }
                            // line 153
                            echo "
\t\t\t";
                            // line 155
                            echo "\t\t\t";
                        } elseif ((((call_user_func_array($this->env->getFilter('first')->getCallable(), array($this->env, (isset($context["link"]) ? $context["link"] : null))) == "/") && (call_user_func_array($this->env->getFilter('last')->getCallable(), array($this->env, (isset($context["link"]) ? $context["link"] : null))) != "/")) && (!(isset($context["hasExtension"]) ? $context["hasExtension"] : null)))) {
                            // line 156
                            echo "\t\t\t\t";
                            $context["link"] = ((isset($context["link"]) ? $context["link"] : null) . "/");
                            // line 157
                            echo "\t\t\t";
                        }
                        // line 158
                        echo "
\t\t\t";
                        // line 160
                        echo "\t\t\t";
                        if (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") && ($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") != "auto"))) {
                            // line 161
                            echo "\t\t\t\t";
                            if (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") == "popup")) {
                                // line 162
                                echo "\t\t\t\t\t";
                                // line 163
                                echo "\t\t\t\t\t";
                                $context["data_popup_window"] = (((($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "slug") . ",") . (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "width", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "width"), "600"))) : ("600"))) . ",") . (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "height", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link", array(), "any", false, true), "height"), "500"))) : ("500")));
                                // line 164
                                echo "\t\t\t\t";
                            } elseif (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") == "x3_popup")) {
                                // line 165
                                echo "\t\t\t\t\t";
                                // line 166
                                echo "\t\t\t\t\t";
                                $context["data_popup"] = true;
                                // line 167
                                echo "\t\t\t\t\t";
                                if ($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "content")) {
                                    // line 168
                                    echo "\t\t\t\t\t\t";
                                    $context["data_popup_content"] = true;
                                    // line 169
                                    echo "\t\t\t\t\t\t";
                                    $context["link"] = "#";
                                    // line 170
                                    echo "\t\t\t\t\t";
                                }
                                // line 171
                                echo "\t\t\t\t";
                            } else {
                                // line 172
                                echo "\t\t\t\t\t";
                                $context["link_target"] = $this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target");
                                // line 173
                                echo "\t\t\t\t";
                            }
                            // line 174
                            echo "\t\t\t";
                        } elseif ((twig_in_filter("http", (isset($context["link"]) ? $context["link"] : null)) || (isset($context["hasExtension"]) ? $context["hasExtension"] : null))) {
                            // line 175
                            echo "\t\t\t\t";
                            $context["link_target"] = "_blank";
                            // line 176
                            echo "\t\t\t";
                        }
                        // line 177
                        echo "
\t\t\t";
                        // line 179
                        echo "\t\t\t";
                        if ((isset($context["hasExtension"]) ? $context["hasExtension"] : null)) {
                            // line 180
                            echo "\t\t\t\t";
                            $context["link_class"] = ((isset($context["link_class"]) ? $context["link_class"] : null) . " no-ajax");
                            // line 181
                            echo "\t\t\t";
                        }
                        // line 182
                        echo "
\t\t";
                    } elseif (($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "content") && ($this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "link"), "target") == "x3_popup"))) {
                        // line 184
                        echo "\t\t\t";
                        $context["data_popup"] = true;
                        // line 185
                        echo "\t\t\t";
                        $context["data_popup_content"] = true;
                        // line 186
                        echo "\t\t\t";
                        $context["link"] = "#";
                        // line 187
                        echo "\t\t";
                    } else {
                        // line 188
                        echo "\t\t\t";
                        $context["link"] = call_user_func_array($this->env->getFilter('setpath')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('replace')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "permalink"), array(" " => "_"))), "html")), (isset($context["rootpath"]) ? $context["rootpath"] : null)));
                        // line 189
                        echo "\t\t";
                    }
                    // line 190
                    echo "
\t\t";
                    // line 192
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
                    // line 193
                    echo "
\t\t";
                    // line 195
                    echo "\t\t";
                    ob_start();
                    $this->env->loadTemplate("partials/preview-image.html")->display(array_merge($context, array("page" => (isset($context["child"]) ? $context["child"] : null))));
                    $context["preview_img"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 196
                    echo "
\t\t";
                    // line 198
                    echo "\t\t";
                    if (call_user_func_array($this->env->getTest('empty')->getCallable(), array((isset($context["preview_img"]) ? $context["preview_img"] : null)))) {
                        $context["preview_img"] = (isset($context["preview_image"]) ? $context["preview_image"] : null);
                    }
                    // line 199
                    echo "
\t\t";
                    // line 201
                    echo "\t\t";
                    $context["preview_img_url"] = ((isset($context["assetspath"]) ? $context["assetspath"] : null) . call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, (isset($context["preview_img"]) ? $context["preview_img"] : null), ".")));
                    // line 202
                    echo "
\t\t";
                    // line 204
                    echo "    ";
                    if (((isset($context["preview_img"]) ? $context["preview_img"] : null) == "./app/public/images/default.png")) {
                        // line 205
                        echo "    \t";
                        $context["imgInfo"] = array(0 => 1280, 1 => 1280);
                        // line 206
                        echo "    \t";
                        $context["image_ratio"] = 100;
                        // line 207
                        echo "    ";
                    } else {
                        // line 208
                        echo "\t\t\t";
                        $context["imgInfo"] = call_user_func_array($this->env->getFunction('getimginfo')->getCallable(), array((isset($context["preview_img"]) ? $context["preview_img"] : null)));
                        // line 209
                        echo "    \t";
                        $context["image_ratio"] = ((array_key_exists("crop_ratio", $context)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array((isset($context["crop_ratio"]) ? $context["crop_ratio"] : null), (((($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array"), 3))) : (3)) / (($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array"), 2))) : (2))) * 100)))) : ((((($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array"), 3))) : (3)) / (($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array"), 2))) : (2))) * 100)));
                        // line 210
                        echo "    ";
                    }
                    // line 211
                    echo "
    ";
                    // line 213
                    echo "    ";
                    ob_start();
                    // line 214
                    echo "    \t<h2 id=\"title-";
                    echo (isset($context["child_id"]) ? $context["child_id"] : null);
                    echo "\" data-file=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_img"]) ? $context["preview_img"] : null)));
                    echo "\" class=\"title\">";
                    echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                    echo "</h2>
    ";
                    $context["title_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 216
                    echo "    ";
                    ob_start();
                    // line 217
                    echo "    \t<h2 id=\"title-";
                    echo (isset($context["child_id"]) ? $context["child_id"] : null);
                    echo "\" class=\"title\">";
                    echo (isset($context["label"]) ? $context["label"] : null);
                    echo "</h2>
    ";
                    $context["label_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 219
                    echo "    ";
                    ob_start();
                    // line 220
                    echo "    \t<h6 class=\"date\">";
                    echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                    echo "</h6>
    ";
                    $context["date_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 222
                    echo "    ";
                    ob_start();
                    // line 223
                    echo "    \t";
                    if (((isset($context["amount"]) ? $context["amount"] : null) > 0)) {
                        // line 224
                        echo "    \t";
                        // line 225
                        echo "    \t<h6 class=\"amount\" data-lang=\"image";
                        echo ((((isset($context["amount"]) ? $context["amount"] : null) == 1)) ? ("") : ("s"));
                        echo "\">";
                        echo (isset($context["amount"]) ? $context["amount"] : null);
                        echo "</h6>
    \t";
                    }
                    // line 227
                    echo "    ";
                    $context["amount_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 228
                    echo "    ";
                    ob_start();
                    // line 229
                    echo "    \t";
                    if (((isset($context["folders_amount"]) ? $context["folders_amount"] : null) > 0)) {
                        // line 230
                        echo "    \t";
                        // line 231
                        echo "    \t<h6 class=\"folder_amount\" data-lang=\"folder";
                        echo ((((isset($context["folders_amount"]) ? $context["folders_amount"] : null) == 1)) ? ("") : ("s"));
                        echo "\">";
                        echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                        echo "</h6>
    \t";
                    }
                    // line 233
                    echo "    ";
                    $context["folders_amount_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 234
                    echo "    ";
                    if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description"))))) {
                        // line 235
                        echo "      ";
                        ob_start();
                        // line 236
                        echo "      \t<p>";
                        echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                        echo "</p>
      ";
                        $context["description_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 238
                        echo "    ";
                    }
                    // line 239
                    echo "    ";
                    ob_start();
                    // line 240
                    echo "    <figure>
\t\t\t<div class=\"img-link\">
\t\t\t\t<div class=\"image-container\" style=\"padding-bottom:";
                    // line 242
                    echo (isset($context["image_ratio"]) ? $context["image_ratio"] : null);
                    echo "%;\">
        \t<img data-src=\"";
                    // line 243
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_img_url"]) ? $context["preview_img_url"] : null)));
                    echo "\" data-width=\"";
                    echo $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array");
                    echo "\"";
                    echo (isset($context["data_crop"]) ? $context["data_crop"] : null);
                    echo " alt=\"";
                    echo call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('striptags')->getCallable(), array($this->env, (isset($context["title"]) ? $context["title"] : null))), "html"));
                    echo "\">
        </div>

        ";
                    // line 246
                    if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "caption"), "enabled")) {
                        // line 247
                        echo "        \t";
                        ob_start();
                        // line 248
                        echo "\t        \t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable(call_user_func_array($this->env->getFilter('split')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "caption"), "items"), ",")));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 249
                            echo "\t        \t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo "<span class=\"title\">";
                                echo (isset($context["title_pseudo"]) ? $context["title_pseudo"] : null);
                                echo "</span>
\t        \t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 250
                                echo "<span class=\"title\">";
                                echo (isset($context["label"]) ? $context["label"] : null);
                                echo "</span>
\t        \t\t";
                                // line 252
                                echo "\t        \t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "amount") && ((isset($context["amount"]) ? $context["amount"] : null) > 0))) {
                                echo "<span class=\"amount\" data-lang=\"image";
                                echo ((((isset($context["amount"]) ? $context["amount"] : null) == 1)) ? ("") : ("s"));
                                echo "\">";
                                echo (isset($context["amount"]) ? $context["amount"] : null);
                                echo "</span>
\t        \t\t";
                                // line 254
                                echo "\t        \t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "folders_amount") && ((isset($context["folders_amount"]) ? $context["folders_amount"] : null) > 0))) {
                                echo "<span class=\"folder_amount\" data-lang=\"folder";
                                echo ((((isset($context["folders_amount"]) ? $context["folders_amount"] : null) == 1)) ? ("") : ("s"));
                                echo "\">";
                                echo (isset($context["folders_amount"]) ? $context["folders_amount"] : null);
                                echo "</span>
\t        \t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 255
                                echo (isset($context["time_tag"]) ? $context["time_tag"] : null);
                                echo "
\t        \t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 256
                                echo "<span class=\"description\">";
                                echo (isset($context["description_pseudo"]) ? $context["description_pseudo"] : null);
                                echo "</span>";
                            }
                            // line 257
                            echo "\t        \t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 258
                        echo "        \t";
                        $context["figcaption"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 259
                        echo "        ";
                        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, (isset($context["figcaption"]) ? $context["figcaption"] : null))))))) {
                            echo "<figcaption>";
                            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, (isset($context["figcaption"]) ? $context["figcaption"] : null)));
                            echo "</figcaption>";
                        }
                        // line 260
                        echo "        ";
                    }
                    // line 261
                    echo "\t\t\t</div>
\t\t</figure>
\t\t";
                    $context["figure"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 264
                    echo "
\t\t";
                    // line 266
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
                    // line 267
                    echo (isset($context["href_tag"]) ? $context["href_tag"] : null);
                    echo "

\t\t";
                    // line 270
                    echo "\t\t";
                    if ((isset($context["folders_split_view"]) ? $context["folders_split_view"] : null)) {
                        // line 271
                        echo "
\t\t";
                        // line 273
                        echo "\t\t";
                        if ($this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "invert")) {
                            // line 274
                            echo "\t\t\t";
                            $context["text_align"] = "medium-text-left";
                            // line 275
                            echo "\t\t";
                        } elseif ((!twig_in_filter("text-right", $this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "classes")) && !twig_in_filter("text-left", $this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "classes")))) {
                            // line 276
                            echo "\t\t\t";
                            $context["text_align"] = "medium-text-right";
                            // line 277
                            echo "\t\t";
                        }
                        // line 278
                        echo "
\t\t";
                        // line 280
                        echo "\t\t<div class=\"medium-";
                        echo $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "ratio");
                        echo " columns ";
                        echo (isset($context["push"]) ? $context["push"] : null);
                        echo " ";
                        echo (isset($context["text_align"]) ? $context["text_align"] : null);
                        echo "\">
\t\t";
                        // line 281
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 282
                            echo "\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo (isset($context["title_tag"]) ? $context["title_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 283
                                echo (isset($context["label_tag"]) ? $context["label_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 284
                                echo (isset($context["date_tag"]) ? $context["date_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "amount")) {
                                // line 285
                                echo (isset($context["amount_tag"]) ? $context["amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "folders_amount")) {
                                // line 286
                                echo (isset($context["folders_amount_tag"]) ? $context["folders_amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 287
                                echo (isset($context["description_tag"]) ? $context["description_tag"] : null);
                            }
                            // line 288
                            echo "\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 289
                        echo "\t\t</div>
\t\t<div class=\"medium-";
                        // line 290
                        echo (12 - $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "split"), "ratio"));
                        echo " columns ";
                        echo (isset($context["pull"]) ? $context["pull"] : null);
                        echo "\">
\t\t\t";
                        // line 291
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t</div>

\t\t";
                        // line 295
                        echo "\t\t";
                    } elseif (($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") != "justified")) {
                        // line 296
                        echo "\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 297
                            echo "\t\t\t";
                            if (((isset($context["item"]) ? $context["item"] : null) == "title")) {
                                echo (isset($context["title_tag"]) ? $context["title_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "label")) {
                                // line 298
                                echo (isset($context["label_tag"]) ? $context["label_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "date")) {
                                // line 299
                                echo (isset($context["date_tag"]) ? $context["date_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "amount")) {
                                // line 300
                                echo (isset($context["amount_tag"]) ? $context["amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "folders_amount")) {
                                // line 301
                                echo (isset($context["folders_amount_tag"]) ? $context["folders_amount_tag"] : null);
                                echo "
\t\t\t";
                            } elseif ((((isset($context["item"]) ? $context["item"] : null) == "description") && (!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "description")))))) {
                                // line 302
                                echo (isset($context["description_tag"]) ? $context["description_tag"] : null);
                                echo "
\t\t\t";
                            } elseif (((isset($context["item"]) ? $context["item"] : null) == "preview")) {
                                // line 303
                                echo (isset($context["figure"]) ? $context["figure"] : null);
                            }
                            // line 304
                            echo "\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 305
                        echo "
\t\t";
                        // line 307
                        echo "\t\t";
                    } else {
                        // line 308
                        echo "\t\t\t";
                        echo (isset($context["figure"]) ? $context["figure"] : null);
                        echo "
\t\t";
                    }
                    // line 310
                    echo "
\t\t</a>
\t\t</section>

\t\t";
                    // line 315
                    echo "\t\t";
                    if (((((($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") == "vertical") && $this->getAttribute($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "vertical"), "horizontal_rule")) && (!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) && ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") < (isset($context["limit"]) ? $context["limit"] : null))) || ((isset($context["folders_split_view"]) ? $context["folders_split_view"] : null) && ($this->getAttribute((isset($context["folders"]) ? $context["folders"] : null), "layout") == "grid")))) {
                        // line 316
                        echo "\t\t<hr class=\"hr\">
\t\t";
                    }
                    // line 318
                    echo "
\t\t";
                    // line 319
                    echo (isset($context["li_close"]) ? $context["li_close"] : null);
                    echo "
\t";
                }
                // line 321
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
            // line 322
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
        return array (  1010 => 322,  996 => 321,  991 => 319,  988 => 318,  984 => 316,  981 => 315,  975 => 310,  969 => 308,  966 => 307,  963 => 305,  957 => 304,  954 => 303,  949 => 302,  944 => 301,  939 => 300,  934 => 299,  929 => 298,  922 => 297,  917 => 296,  914 => 295,  908 => 291,  902 => 290,  899 => 289,  893 => 288,  890 => 287,  885 => 286,  880 => 285,  875 => 284,  870 => 283,  863 => 282,  859 => 281,  850 => 280,  847 => 278,  844 => 277,  841 => 276,  838 => 275,  835 => 274,  832 => 273,  829 => 271,  826 => 270,  821 => 267,  806 => 266,  803 => 264,  798 => 261,  795 => 260,  788 => 259,  785 => 258,  779 => 257,  774 => 256,  769 => 255,  759 => 254,  750 => 252,  745 => 250,  737 => 249,  732 => 248,  729 => 247,  727 => 246,  715 => 243,  711 => 242,  707 => 240,  704 => 239,  701 => 238,  695 => 236,  692 => 235,  689 => 234,  686 => 233,  678 => 231,  676 => 230,  673 => 229,  670 => 228,  667 => 227,  659 => 225,  657 => 224,  654 => 223,  651 => 222,  645 => 220,  642 => 219,  634 => 217,  631 => 216,  621 => 214,  618 => 213,  615 => 211,  612 => 210,  609 => 209,  606 => 208,  603 => 207,  600 => 206,  597 => 205,  594 => 204,  591 => 202,  588 => 201,  585 => 199,  580 => 198,  577 => 196,  572 => 195,  569 => 193,  533 => 192,  530 => 190,  527 => 189,  524 => 188,  521 => 187,  518 => 186,  515 => 185,  512 => 184,  508 => 182,  505 => 181,  502 => 180,  499 => 179,  496 => 177,  493 => 176,  490 => 175,  487 => 174,  484 => 173,  481 => 172,  478 => 171,  475 => 170,  472 => 169,  469 => 168,  466 => 167,  463 => 166,  461 => 165,  458 => 164,  455 => 163,  453 => 162,  450 => 161,  447 => 160,  444 => 158,  441 => 157,  438 => 156,  435 => 155,  432 => 153,  429 => 152,  426 => 151,  423 => 150,  420 => 149,  417 => 148,  414 => 147,  411 => 145,  408 => 144,  405 => 142,  402 => 141,  399 => 140,  396 => 139,  393 => 138,  390 => 136,  387 => 135,  384 => 133,  381 => 132,  378 => 130,  375 => 129,  372 => 128,  363 => 125,  357 => 122,  342 => 119,  339 => 118,  333 => 117,  327 => 115,  317 => 114,  308 => 112,  298 => 109,  285 => 107,  276 => 104,  273 => 102,  267 => 100,  264 => 99,  261 => 98,  252 => 94,  249 => 93,  246 => 92,  240 => 90,  237 => 88,  234 => 87,  231 => 86,  228 => 85,  226 => 84,  220 => 82,  217 => 81,  214 => 80,  193 => 72,  190 => 71,  187 => 70,  184 => 69,  181 => 68,  148 => 61,  145 => 59,  141 => 57,  138 => 56,  135 => 55,  132 => 53,  123 => 50,  120 => 49,  117 => 48,  114 => 47,  112 => 46,  106 => 44,  103 => 42,  100 => 41,  97 => 40,  82 => 34,  79 => 32,  72 => 28,  65 => 24,  60 => 22,  42 => 14,  40 => 13,  38 => 12,  31 => 9,  29 => 8,  90 => 30,  74 => 29,  71 => 24,  69 => 26,  61 => 18,  56 => 17,  44 => 15,  36 => 10,  27 => 7,  383 => 145,  380 => 144,  369 => 127,  366 => 126,  364 => 135,  360 => 124,  356 => 133,  354 => 121,  348 => 128,  345 => 120,  340 => 125,  337 => 124,  334 => 122,  328 => 120,  325 => 119,  322 => 117,  316 => 115,  313 => 114,  310 => 112,  304 => 110,  301 => 109,  297 => 106,  291 => 103,  288 => 101,  283 => 99,  280 => 98,  278 => 97,  270 => 101,  258 => 97,  255 => 95,  247 => 81,  243 => 91,  227 => 68,  224 => 66,  212 => 61,  189 => 54,  175 => 65,  172 => 64,  166 => 48,  163 => 46,  156 => 45,  150 => 62,  146 => 43,  140 => 41,  129 => 52,  126 => 51,  109 => 45,  92 => 29,  88 => 36,  85 => 35,  63 => 21,  53 => 18,  47 => 16,  32 => 8,  26 => 4,  24 => 5,  22 => 3,  290 => 108,  287 => 110,  284 => 109,  282 => 106,  279 => 105,  275 => 96,  272 => 94,  269 => 102,  265 => 99,  262 => 97,  248 => 96,  245 => 95,  242 => 93,  239 => 92,  236 => 91,  233 => 90,  230 => 69,  223 => 83,  221 => 86,  218 => 64,  215 => 63,  213 => 82,  211 => 79,  208 => 78,  205 => 77,  202 => 76,  199 => 75,  196 => 74,  194 => 74,  191 => 73,  188 => 72,  182 => 53,  179 => 68,  176 => 66,  173 => 65,  170 => 63,  167 => 62,  164 => 61,  161 => 60,  158 => 59,  155 => 63,  137 => 56,  134 => 40,  131 => 53,  128 => 52,  125 => 51,  122 => 50,  119 => 36,  116 => 34,  113 => 46,  110 => 45,  107 => 44,  102 => 32,  99 => 30,  96 => 32,  94 => 38,  91 => 37,  89 => 36,  87 => 35,  84 => 27,  80 => 24,  77 => 31,  73 => 28,  70 => 22,  68 => 26,  66 => 25,  64 => 20,  62 => 23,  59 => 21,  57 => 20,  54 => 18,  50 => 17,  46 => 16,  43 => 14,  41 => 13,  39 => 12,  37 => 11,  35 => 10,  33 => 9,  30 => 8,  28 => 6,  25 => 5,  23 => 3,  19 => 1,);
    }
}
