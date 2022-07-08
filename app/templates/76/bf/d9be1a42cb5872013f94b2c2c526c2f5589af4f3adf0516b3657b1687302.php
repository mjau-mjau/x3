<?php

/* partials/footer.html */
class __TwigTemplate_76bfd9be1a42cb5872013f94b2c2c526c2f5589af4f3adf0516b3657b1687302 extends Twig_Template
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
        echo "</main>
</div>
</div>

<footer class=\"footer\">

\t";
        // line 8
        echo "\t";
        echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('removeComments')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "footer"))), array("{{copy}}" => (((((("<p>&copy; " . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "current_year")) . " <a href=\"") . (isset($context["rootpath"]) ? $context["rootpath"] : null)) . "/\">") . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "base_url")) . "</a></p>"))))));
        echo "

\t";
        // line 12
        echo "\t<p class=\"x3-footer-link\"><span data-nosnippet>X3 ";
        echo call_user_func_array($this->env->getFunction('random')->getCallable(), array($this->env, array(0 => "Photo Gallery Website", 1 => "Photography Website", 2 => "Image Gallery CMS", 3 => "Website for Photographers", 4 => "Online Portfolio")));
        echo " by <a href=\"https://www.photo.gallery\">www.photo.gallery</a></span></p>
</footer>

";
        // line 16
        echo "<script>
var x3_settings = ";
        // line 17
        echo call_user_func_array($this->env->getFunction('jsonSettings')->getCallable(), array((isset($context["page"]) ? $context["page"] : null)));
        echo ";
var x3_page = ";
        // line 18
        echo call_user_func_array($this->env->getFunction('pageJson')->getCallable(), array((isset($context["page_title"]) ? $context["page_title"] : null), (isset($context["page_description"]) ? $context["page_description"] : null), "", $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "template_name"), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id"), (isset($context["preview_image_full"]) ? $context["preview_image_full"] : null), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink"), $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "file_path")));
        echo ";
";
        // line 19
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            // line 20
            echo "function jsFail(){
\tvar s = document.createElement('script');
\ts.type = 'text/javascript';
\ts.onload = imagevue_;
\ts.src = '";
            // line 24
            echo (isset($context["local_js"]) ? $context["local_js"] : null);
            echo "';
\tdocument.getElementsByTagName('head')[0].appendChild(s);
}
";
        }
        // line 28
        echo "</script>

";
        // line 31
        $context["custom_js_files"] = call_user_func_array($this->env->getFunction('x3_glob')->getCallable(), array("./content/custom/files/javascript/*include*.js", (("<script id=\"custom_javascript_{{index}}\" src=\"" . (isset($context["assetspath"]) ? $context["assetspath"] : null)) . "/content/custom/files/javascript/{{basename}}\"></script>")));
        // line 32
        if ((isset($context["custom_js_files"]) ? $context["custom_js_files"] : null)) {
            echo (isset($context["custom_js_files"]) ? $context["custom_js_files"] : null);
        }
        // line 33
        echo "
";
        // line 35
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "js"))))))) {
            // line 36
            echo "<script id=\"custom-javascript\">";
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "js")));
            echo "</script>
";
        }
        // line 38
        echo "
";
        // line 40
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            // line 41
            echo "<script src=\"https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/velocity-animate@1.0.1/velocity.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/velocity-animate@1.0.1/velocity.ui.min.js\"></script>
";
            // line 45
            if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "layout") == "slideshow")) {
                echo "<script src=\"https://cdn.jsdelivr.net/npm/fotorama@4.6.4/fotorama.js\"></script>";
            }
            // line 46
            echo "<script src=\"https://cdn.jsdelivr.net/npm/string@3.3.3/dist/string.min.js\"></script>
";
        } else {
            // line 48
            echo "<script src=\"";
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/jquery/3.6.0/jquery.min.js\"></script>
<script src=\"";
            // line 49
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/animejs/3.2.1/anime.min.js\"></script>
<script src=\"";
            // line 50
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/velocity/1.0.1/velocity.min.js\"></script>
<script src=\"";
            // line 51
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/velocity/1.0.1/velocity.ui.min.js\"></script>
";
            // line 52
            if (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "gallery"), "layout") == "slideshow")) {
                echo "<script src=\"";
                echo (isset($context["local_public"]) ? $context["local_public"] : null);
                echo "/vendor/fotorama/4.6.4/fotorama.js\"></script>";
            }
            // line 53
            echo "<script src=\"";
            echo (isset($context["local_public"]) ? $context["local_public"] : null);
            echo "/vendor/stringjs/3.3.3/string.min.js\"></script>
";
        }
        // line 55
        echo "
";
        // line 57
        echo "<script src=\"";
        echo (isset($context["core_js"]) ? $context["core_js"] : null);
        echo "\"";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            echo " onerror=\"jsFail()\"";
        }
        echo " onload=\"imagevue";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            echo "_";
        }
        echo "();\"></script>

</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "partials/footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 57,  135 => 55,  123 => 52,  115 => 50,  111 => 49,  106 => 48,  98 => 45,  90 => 40,  81 => 36,  79 => 35,  76 => 33,  72 => 32,  51 => 19,  40 => 16,  27 => 8,  379 => 143,  376 => 142,  365 => 136,  362 => 134,  360 => 133,  356 => 132,  352 => 131,  350 => 130,  344 => 126,  341 => 124,  336 => 123,  333 => 122,  330 => 120,  324 => 118,  321 => 117,  318 => 115,  312 => 113,  309 => 112,  306 => 110,  300 => 108,  297 => 107,  293 => 104,  278 => 97,  270 => 91,  258 => 88,  255 => 86,  247 => 81,  243 => 80,  227 => 68,  224 => 66,  212 => 61,  189 => 54,  175 => 52,  172 => 51,  166 => 48,  163 => 46,  156 => 45,  150 => 44,  146 => 43,  140 => 41,  129 => 53,  126 => 37,  109 => 33,  92 => 41,  88 => 28,  85 => 27,  63 => 21,  53 => 20,  47 => 18,  32 => 8,  26 => 4,  24 => 3,  22 => 2,  290 => 112,  287 => 101,  284 => 99,  282 => 108,  279 => 106,  275 => 96,  272 => 94,  269 => 102,  265 => 99,  262 => 97,  248 => 96,  245 => 95,  242 => 93,  239 => 92,  236 => 91,  233 => 90,  230 => 69,  223 => 87,  221 => 86,  218 => 64,  215 => 63,  213 => 82,  211 => 81,  208 => 79,  205 => 59,  202 => 58,  199 => 57,  196 => 55,  194 => 74,  191 => 73,  188 => 72,  182 => 53,  179 => 68,  176 => 66,  173 => 65,  170 => 63,  167 => 62,  164 => 61,  161 => 60,  158 => 59,  155 => 57,  137 => 56,  134 => 40,  131 => 53,  128 => 52,  125 => 51,  122 => 50,  119 => 51,  116 => 34,  113 => 46,  110 => 45,  107 => 44,  102 => 46,  99 => 30,  96 => 40,  94 => 39,  91 => 37,  89 => 36,  87 => 38,  84 => 33,  80 => 24,  77 => 23,  73 => 28,  70 => 31,  68 => 26,  66 => 28,  64 => 24,  62 => 23,  59 => 24,  57 => 20,  54 => 18,  50 => 18,  46 => 16,  43 => 17,  41 => 13,  39 => 12,  37 => 11,  35 => 10,  33 => 12,  30 => 7,  28 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
