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
        echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('removeComments')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "footer"))), array("{{copy}}" => (((((("<p>&copy; " . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "current_year")) . " <a href=\"") . (isset($context["rootpath"]) ? $context["rootpath"] : null)) . "/\">") . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "base_url")) . "</a></p>"))))));
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
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "js"))))))) {
            // line 36
            echo "<script id=\"custom-javascript\">";
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "js")));
            echo "</script>
";
        }
        // line 38
        echo "
";
        // line 40
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            // line 41
            echo "<script src=\"https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js\"></script>
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
            echo "/vendor/jquery/3.5.1/jquery.min.js\"></script>
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
</html>";
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
        return array (  138 => 57,  135 => 55,  129 => 53,  123 => 52,  106 => 48,  90 => 40,  76 => 33,  72 => 32,  51 => 19,  47 => 18,  27 => 8,  342 => 122,  339 => 121,  337 => 120,  334 => 119,  331 => 118,  328 => 116,  321 => 115,  310 => 108,  306 => 107,  280 => 105,  277 => 104,  271 => 101,  268 => 99,  259 => 98,  253 => 97,  249 => 96,  246 => 95,  232 => 91,  229 => 89,  225 => 87,  222 => 86,  219 => 85,  216 => 84,  214 => 83,  207 => 79,  193 => 75,  190 => 74,  187 => 73,  185 => 72,  163 => 63,  151 => 61,  148 => 60,  145 => 59,  139 => 58,  117 => 44,  115 => 50,  111 => 49,  104 => 37,  86 => 31,  83 => 30,  79 => 35,  56 => 19,  53 => 20,  45 => 15,  42 => 14,  22 => 3,  108 => 39,  105 => 43,  101 => 36,  98 => 45,  95 => 34,  92 => 41,  88 => 35,  85 => 34,  81 => 36,  78 => 30,  74 => 25,  71 => 26,  67 => 23,  55 => 17,  52 => 16,  49 => 15,  40 => 16,  34 => 9,  31 => 8,  29 => 7,  26 => 5,  24 => 4,  21 => 2,  290 => 112,  287 => 110,  284 => 109,  282 => 108,  279 => 106,  275 => 104,  272 => 103,  269 => 102,  265 => 99,  262 => 97,  248 => 96,  245 => 95,  242 => 93,  239 => 92,  236 => 91,  233 => 90,  230 => 88,  223 => 87,  221 => 86,  218 => 84,  215 => 83,  213 => 82,  211 => 81,  208 => 79,  205 => 78,  202 => 78,  199 => 77,  196 => 76,  194 => 74,  191 => 73,  188 => 72,  182 => 71,  179 => 70,  176 => 69,  173 => 68,  170 => 66,  167 => 65,  164 => 61,  161 => 60,  158 => 62,  155 => 57,  137 => 57,  134 => 56,  131 => 50,  128 => 49,  125 => 48,  122 => 47,  119 => 51,  116 => 48,  113 => 42,  110 => 45,  107 => 44,  102 => 46,  99 => 42,  96 => 40,  94 => 39,  91 => 37,  89 => 32,  87 => 38,  84 => 33,  80 => 31,  77 => 27,  73 => 28,  70 => 31,  68 => 26,  66 => 28,  64 => 22,  62 => 21,  59 => 24,  57 => 20,  54 => 18,  50 => 17,  46 => 13,  43 => 17,  41 => 13,  39 => 13,  37 => 10,  35 => 10,  33 => 12,  30 => 7,  28 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
