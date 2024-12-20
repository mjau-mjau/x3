<?php

/* partials/head.html */
class __TwigTemplate_bbf84e8334aa77fc3e030e582b6b9bca6aa66114b7201078c756af50f9885fea extends Twig_Template
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
        echo "<html>
";
        // line 2
        $context["meta_page_title"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('striptags')->getCallable(), array($this->env, (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo", array(), "any", false, true), "title", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo", array(), "any", false, true), "title"), (isset($context["page_title"]) ? $context["page_title"] : null)))) : ((isset($context["page_title"]) ? $context["page_title"] : null))))), "html"))));
        // line 3
        $context["meta_page_description"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('striptags')->getCallable(), array($this->env, (($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo", array(), "any", false, true), "description", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo", array(), "any", false, true), "description"), (isset($context["page_description"]) ? $context["page_description"] : null)))) : ((isset($context["page_description"]) ? $context["page_description"] : null))))), "html"))));
        // line 4
        echo "<head>

";
        // line 7
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "google_analytics")) {
            // line 8
            echo "<script async src=\"https://www.googletagmanager.com/gtag/js?id=";
            echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "google_analytics");
            echo "\"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '";
            // line 13
            echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "google_analytics");
            echo "');
</script>
";
        }
        // line 16
        echo "
  ";
        // line 18
        echo "  <meta charset=\"utf-8\">
  <title>";
        // line 19
        echo (isset($context["meta_page_title"]) ? $context["meta_page_title"] : null);
        echo "</title>
  ";
        // line 20
        if ((isset($context["meta_page_description"]) ? $context["meta_page_description"] : null)) {
            echo "<meta name=\"description\" content=\"";
            echo (isset($context["meta_page_description"]) ? $context["meta_page_description"] : null);
            echo "\">";
        }
        // line 21
        echo "  ";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo"), "keywords")) {
            echo "<meta name=\"keywords\" content=\"";
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo"), "keywords")));
            echo "\">";
        }
        // line 22
        echo "  ";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo"), "robots")) {
            echo "<meta name=\"robots\" content=\"";
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo"), "robots")));
            echo "\">";
        }
        // line 23
        echo "  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <link rel=\"canonical\" href=\"";
        // line 24
        echo (isset($context["absolutepath_page"]) ? $context["absolutepath_page"] : null);
        echo "\">

  ";
        // line 27
        echo "  <link rel=\"dns-prefetch\" href=\"//auth.photo.gallery\">
  ";
        // line 28
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            echo "<link rel=\"dns-prefetch\" href=\"//cdn.jsdelivr.net\">";
        }
        // line 29
        echo "  ";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_files")) {
            echo "<link rel=\"dns-prefetch\" href=\"";
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('lower')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_files"))), "/")), "http:")), "https:"));
            echo "\">";
        }
        // line 30
        echo "
  ";
        // line 32
        echo "  ";
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "google_author"))))) {
            echo "<link rel=\"author\" href=\"https://plus.google.com/";
            echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "google_author");
            echo "\">";
        }
        // line 33
        echo "  ";
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "google_site_verification"))))) {
            echo "<meta name=\"google-site-verification\" content=\"";
            echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "google_site_verification");
            echo "\">";
        }
        // line 34
        echo "
  ";
        // line 36
        echo "  ";
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "twitter_username"))))) {
            echo "<meta name=\"twitter:site\" content=\"@";
            echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "twitter_username");
            echo "\">";
        }
        // line 37
        echo "
  ";
        // line 39
        echo "  <meta property=\"og:title\" content=\"";
        echo (isset($context["meta_page_title"]) ? $context["meta_page_title"] : null);
        echo "\">
  ";
        // line 40
        if ((isset($context["meta_page_description"]) ? $context["meta_page_description"] : null)) {
            echo "<meta property=\"og:description\" content=\"";
            echo (isset($context["meta_page_description"]) ? $context["meta_page_description"] : null);
            echo "\">";
        }
        // line 41
        echo "  <meta property=\"og:url\" content=\"";
        echo (isset($context["absolutepath_page"]) ? $context["absolutepath_page"] : null);
        echo "\">
  <meta property=\"og:type\" content=\"website\">
  <meta property=\"og:updated_time\" content=\"";
        // line 43
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "updated");
        echo "\">
  ";
        // line 44
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "facebook_author"))))) {
            echo "<meta property=\"article:author\" content=\"";
            echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "facebook_author");
            echo "\">";
        }
        // line 45
        echo "  ";
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "facebook_publisher"))))) {
            echo "<meta property=\"article:publisher\" content=\"";
            echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "accounts"), "facebook_publisher");
            echo "\">";
        }
        // line 46
        echo "
  ";
        // line 48
        echo "  <meta property=\"og:image\" content=\"";
        echo call_user_func_array($this->env->getFilter('replace')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, (isset($context["preview_image_full"]) ? $context["preview_image_full"] : null))), array(" " => "%20")));
        echo "\">

  ";
        // line 51
        echo "  ";
        $context["imgInfo"] = call_user_func_array($this->env->getFunction('getimginfo')->getCallable(), array((isset($context["preview_image"]) ? $context["preview_image"] : null)));
        // line 52
        echo "  ";
        if ($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), "mime", array(), "array")) {
            echo "<meta property=\"og:image:type\" content=\"";
            echo $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), "mime", array(), "array");
            echo "\">";
        }
        // line 53
        echo "  ";
        if ($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array")) {
            echo "<meta property=\"og:image:width\" content=\"";
            echo $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 0, array(), "array");
            echo "\" />";
        }
        // line 54
        echo "  ";
        if ($this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array")) {
            echo "<meta property=\"og:image:height\" content=\"";
            echo $this->getAttribute((isset($context["imgInfo"]) ? $context["imgInfo"] : null), 1, array(), "array");
            echo "\" />";
        }
        // line 55
        echo "
  ";
        // line 57
        echo "  ";
        $context["favicon"] = call_user_func_array($this->env->getFunction('firstImage')->getCallable(), array("./content/custom/favicon"));
        // line 58
        echo "  ";
        if ((isset($context["favicon"]) ? $context["favicon"] : null)) {
            // line 59
            echo "  <link rel=\"icon\" href=\"";
            echo (isset($context["assetspath"]) ? $context["assetspath"] : null);
            echo (isset($context["favicon"]) ? $context["favicon"] : null);
            echo "\">
  ";
        }
        // line 61
        echo "
  ";
        // line 63
        echo "  ";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "feed")) {
            // line 64
            echo "  <link href=\"";
            echo (isset($context["absolutepath"]) ? $context["absolutepath"] : null);
            echo "/feed/\" type=\"application/atom+xml\" rel=\"alternate\" title=\"Atom Feed\">
  ";
        }
        // line 66
        echo "
  ";
        // line 68
        echo "  ";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            // line 69
            echo "<script>
var css_counter = 0;
function imagevue_(){
\tcss_counter ++;
\tif(css_counter === 1) imagevue();
};
function cssFail(){
\tcss_counter --;
\tvar l = document.createElement('link');
\tl.onload = imagevue_;
\tl.rel = 'stylesheet';
\tl.id = '";
            // line 80
            echo $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "skin"), "skin");
            echo "';
\tl.href = '";
            // line 81
            echo (isset($context["local_css"]) ? $context["local_css"] : null);
            echo "';
\tdocument.getElementsByTagName('head')[0].appendChild(l);
}
</script>
  ";
        }
        // line 86
        echo "
  ";
        // line 88
        echo "  <link rel=\"stylesheet\" id=\"";
        echo $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "skin"), "skin");
        echo "\" href=\"";
        echo (isset($context["core_css"]) ? $context["core_css"] : null);
        echo "\"";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_core")) {
            echo " onerror=\"cssFail();\"";
        }
        echo ">

  ";
        // line 91
        echo "  ";
        // line 94
        echo "
\t";
        // line 96
        echo "\t";
        if (((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "font"), "font")))) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "font"), "font") != "none"))) {
            // line 97
            echo "\t";
            // line 98
            echo "  <link rel=\"preconnect\" href=\"https://fonts.bunny.net\">
  <link rel=\"stylesheet\" href=\"https://fonts.bunny.net/css?family=";
            // line 99
            echo call_user_func_array($this->env->getFilter('getfontstring')->getCallable(), array((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style", array(), "any", false, true), "font", array(), "any", false, true), "font", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style", array(), "any", false, true), "font", array(), "any", false, true), "font"), "Lato:400,700,900,400italic,700italic,900italic"))) : ("Lato:400,700,900,400italic,700italic,900italic"))));
            echo "\">
\t";
        }
        // line 101
        echo "
\t";
        // line 103
        echo "\t";
        echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('removeComments')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "head")))));
        echo "

\t";
        // line 106
        echo "  <style id=\"default-fonts\"><!-- body,h1,h2,h3,h4,h5,h6 {font-family: \"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;} --></style>

  ";
        // line 109
        echo "  ";
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "css"))))) {
            // line 110
            echo "  <style id=\"custom-css\"><!-- ";
            echo call_user_func_array($this->env->getFilter('minify')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "css")));
            echo " --></style>
  ";
        }
        // line 112
        echo "
  ";
        // line 114
        echo "  ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "page_css")) {
            // line 115
            echo "  <style id=\"custom-page-css\">";
            echo call_user_func_array($this->env->getFilter('minify')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "page_css")));
            echo "</style>
  ";
        }
        // line 117
        echo "
  ";
        // line 119
        echo "  ";
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "logo_css"))))) {
            // line 120
            echo "  <style id=\"logo\"><!-- ";
            echo call_user_func_array($this->env->getFilter('minify')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "logo_css")));
            echo " --></style>
  ";
        }
        // line 122
        echo "
  ";
        // line 124
        echo "  ";
        $context["custom_css_files"] = call_user_func_array($this->env->getFunction('x3_glob')->getCallable(), array("./content/custom/files/css/*include*.css", (("<link rel=\"stylesheet\" id=\"custom_css_{{index}}\" href=\"" . (isset($context["assetspath"]) ? $context["assetspath"] : null)) . "/content/custom/files/css/{{basename}}\">")));
        // line 125
        echo "  ";
        if ((isset($context["custom_css_files"]) ? $context["custom_css_files"] : null)) {
            echo (isset($context["custom_css_files"]) ? $context["custom_css_files"] : null);
        }
        // line 126
        echo "
  ";
        // line 128
        echo "  <style id=\"x3app\"></style>

</head>

";
        // line 132
        $context["layout"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style", array(), "any", false, true), "layout", array(), "any", false, true), "layout", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style", array(), "any", false, true), "layout", array(), "any", false, true), "layout"), "topbar-float"))) : ("topbar-float"));
        // line 133
        if (twig_in_filter("topbar", (isset($context["layout"]) ? $context["layout"] : null))) {
            $context["fixed"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "layout"), "fixed");
        }
        // line 134
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "layout"), "wide")) {
            $context["wide"] = "wide";
        }
        // line 135
        $context["data_layout"] = call_user_func_array($this->env->getFilter('cleanData')->getCallable(), array((((((((((((((((((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "include"), "body") . " ") . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "body")) . " ") . (isset($context["layout"]) ? $context["layout"] : null)) . " ") . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "skin"), "skin")) . " ") . (isset($context["fixed"]) ? $context["fixed"] : null)) . " ") . (isset($context["wide"]) ? $context["wide"] : null)) . " ") . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "skin"), "clear")) . " x3-") . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "template_name")) . " slug-") . call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('attribute_friendly')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slug"))), "index"))) . " page-") . call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('attribute_friendly')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink"), "/")))), "index")))));
        // line 136
        echo "
";
        // line 138
        echo "<body class=\"fa-loading initializing ";
        echo (isset($context["data_layout"]) ? $context["data_layout"] : null);
        echo "\" data-include=\"";
        echo call_user_func_array($this->env->getFilter('cleanData')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "include"), "body")));
        echo "\">
<div class=\"x3-loader\" title=\"loading\"></div>
<div class=\"sb-site-container\">
  <div>

    ";
        // line 144
        echo "    ";
        $this->env->loadTemplate("partials/nav/header.html")->display($context);
        // line 145
        echo "
  \t<main class=\"main\" id=\"content\">
";
    }

    public function getTemplateName()
    {
        return "partials/head.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  383 => 145,  380 => 144,  369 => 138,  366 => 136,  364 => 135,  360 => 134,  356 => 133,  354 => 132,  348 => 128,  345 => 126,  340 => 125,  337 => 124,  334 => 122,  328 => 120,  325 => 119,  322 => 117,  316 => 115,  313 => 114,  310 => 112,  304 => 110,  301 => 109,  297 => 106,  291 => 103,  288 => 101,  283 => 99,  280 => 98,  278 => 97,  275 => 96,  272 => 94,  270 => 91,  258 => 88,  255 => 86,  247 => 81,  243 => 80,  230 => 69,  227 => 68,  224 => 66,  218 => 64,  215 => 63,  212 => 61,  205 => 59,  202 => 58,  199 => 57,  196 => 55,  182 => 53,  175 => 52,  172 => 51,  166 => 48,  163 => 46,  156 => 45,  150 => 44,  129 => 39,  126 => 37,  109 => 33,  63 => 21,  53 => 19,  47 => 16,  32 => 8,  22 => 2,  101 => 41,  98 => 40,  95 => 39,  92 => 29,  88 => 28,  85 => 27,  81 => 31,  78 => 30,  74 => 27,  71 => 26,  67 => 23,  55 => 17,  52 => 16,  49 => 15,  40 => 11,  34 => 9,  31 => 8,  29 => 7,  26 => 4,  24 => 3,  21 => 2,  189 => 54,  186 => 80,  183 => 79,  181 => 78,  178 => 76,  174 => 74,  171 => 73,  168 => 72,  164 => 69,  160 => 66,  157 => 65,  154 => 64,  151 => 63,  148 => 62,  146 => 43,  143 => 60,  140 => 41,  134 => 40,  131 => 55,  128 => 53,  125 => 52,  122 => 50,  119 => 36,  116 => 34,  111 => 47,  108 => 45,  105 => 43,  102 => 32,  99 => 30,  96 => 40,  94 => 39,  91 => 37,  89 => 36,  87 => 35,  84 => 33,  80 => 24,  77 => 23,  73 => 28,  70 => 22,  68 => 26,  66 => 25,  64 => 22,  62 => 21,  59 => 19,  57 => 20,  54 => 18,  50 => 18,  46 => 13,  43 => 12,  41 => 13,  39 => 12,  37 => 10,  35 => 10,  33 => 9,  30 => 7,  28 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
