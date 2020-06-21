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
        $context["meta_page_title"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('striptags')->getCallable(), array((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo", array(), "any", false, true), "title", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo", array(), "any", false, true), "title"), (isset($context["page_title"]) ? $context["page_title"] : null)))) : ((isset($context["page_title"]) ? $context["page_title"] : null))))), "html"))));
        // line 3
        $context["meta_page_description"] = call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('e')->getCallable(), array($this->env, call_user_func_array($this->env->getFilter('striptags')->getCallable(), array((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo", array(), "any", false, true), "description", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo", array(), "any", false, true), "description"), (isset($context["page_description"]) ? $context["page_description"] : null)))) : ((isset($context["page_description"]) ? $context["page_description"] : null))))), "html"))));
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
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo"), "keywords")));
            echo "\">";
        }
        // line 22
        echo "  ";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo"), "robots")) {
            echo "<meta name=\"robots\" content=\"";
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "seo"), "robots")));
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
            echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('lower')->getCallable(), array($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "settings"), "cdn_files"))), "/")), "http:")), "https:"));
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

\t";
        // line 91
        echo "\t";
        if (((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "font"), "font")))) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "font"), "font") != "none"))) {
            // line 92
            echo "\t<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=";
            echo call_user_func_array($this->env->getFilter('getfontstring')->getCallable(), array((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style", array(), "any", false, true), "font", array(), "any", false, true), "font", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style", array(), "any", false, true), "font", array(), "any", false, true), "font"), "Lato:400,700,900,400italic,700italic,900italic"))) : ("Lato:400,700,900,400italic,700italic,900italic"))));
            echo "\">
\t";
        }
        // line 94
        echo "
\t";
        // line 96
        echo "\t";
        echo call_user_func_array($this->env->getFilter('trim')->getCallable(), array(call_user_func_array($this->env->getFilter('removeComments')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "head")))));
        echo "

\t";
        // line 99
        echo "  <style id=\"default-fonts\"><!-- body,h1,h2,h3,h4,h5,h6 {font-family: \"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;} --></style>

  ";
        // line 102
        echo "  ";
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "css"))))) {
            // line 103
            echo "  <style id=\"custom-css\"><!-- ";
            echo call_user_func_array($this->env->getFilter('minify')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "css")));
            echo " --></style>
  ";
        }
        // line 105
        echo "

  ";
        // line 108
        echo "  ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "page_css")) {
            // line 109
            echo "  <style id=\"custom-page-css\">";
            echo call_user_func_array($this->env->getFilter('minify')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "page_css")));
            echo "</style>
  ";
        }
        // line 111
        echo "

  ";
        // line 114
        echo "  ";
        if ((!call_user_func_array($this->env->getTest('empty')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "logo_css"))))) {
            // line 115
            echo "  <style id=\"logo\"><!-- ";
            echo call_user_func_array($this->env->getFilter('minify')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "back"), "custom"), "logo_css")));
            echo " --></style>
  ";
        }
        // line 117
        echo "
  ";
        // line 119
        echo "  ";
        $context["custom_css_files"] = call_user_func_array($this->env->getFunction('x3_glob')->getCallable(), array("./content/custom/files/css/*include*.css", (("<link rel=\"stylesheet\" id=\"custom_css_{{index}}\" href=\"" . (isset($context["assetspath"]) ? $context["assetspath"] : null)) . "/content/custom/files/css/{{basename}}\">")));
        // line 120
        echo "  ";
        if ((isset($context["custom_css_files"]) ? $context["custom_css_files"] : null)) {
            echo (isset($context["custom_css_files"]) ? $context["custom_css_files"] : null);
        }
        // line 121
        echo "
  ";
        // line 123
        echo "  <style id=\"x3app\"></style>

</head>

";
        // line 127
        $context["layout"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style", array(), "any", false, true), "layout", array(), "any", false, true), "layout", array(), "any", true, true)) ? (call_user_func_array($this->env->getFilter('default')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style", array(), "any", false, true), "layout", array(), "any", false, true), "layout"), "topbar-float"))) : ("topbar-float"));
        // line 128
        if (twig_in_filter("topbar", (isset($context["layout"]) ? $context["layout"] : null))) {
            $context["fixed"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "layout"), "fixed");
        }
        // line 129
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "layout"), "wide")) {
            $context["wide"] = "wide";
        }
        // line 130
        $context["data_layout"] = call_user_func_array($this->env->getFilter('cleanData')->getCallable(), array((((((((((((((((((($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "include"), "body") . " ") . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "body")) . " ") . (isset($context["layout"]) ? $context["layout"] : null)) . " ") . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "skin"), "skin")) . " ") . (isset($context["fixed"]) ? $context["fixed"] : null)) . " ") . (isset($context["wide"]) ? $context["wide"] : null)) . " ") . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "style"), "skin"), "clear")) . " x3-") . $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "template_name")) . " slug-") . call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('attribute_friendly')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slug"))), "index"))) . " page-") . call_user_func_array($this->env->getFilter('default')->getCallable(), array(call_user_func_array($this->env->getFilter('attribute_friendly')->getCallable(), array(call_user_func_array($this->env->getFilter('trim')->getCallable(), array($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "permalink"), "/")))), "index")))));
        // line 131
        echo "
";
        // line 133
        echo "<body class=\"fa-loading initializing ";
        echo (isset($context["data_layout"]) ? $context["data_layout"] : null);
        echo "\" data-include=\"";
        echo call_user_func_array($this->env->getFilter('cleanData')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "include"), "body")));
        echo "\">
<div class=\"x3-loader\" title=\"loading\"></div>
<div class=\"sb-site-container\">
  <div>

    ";
        // line 139
        echo "    ";
        $this->env->loadTemplate("partials/nav/header.html")->display($context);
        // line 140
        echo "
  \t<main class=\"main\" id=\"content\">";
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
        return array (  376 => 140,  373 => 139,  362 => 133,  359 => 131,  357 => 130,  353 => 129,  349 => 128,  347 => 127,  341 => 123,  338 => 121,  333 => 120,  330 => 119,  327 => 117,  321 => 115,  318 => 114,  314 => 111,  308 => 109,  305 => 108,  301 => 105,  295 => 103,  292 => 102,  288 => 99,  282 => 96,  279 => 94,  273 => 92,  258 => 88,  255 => 86,  247 => 81,  243 => 80,  218 => 64,  215 => 63,  212 => 61,  189 => 54,  175 => 52,  172 => 51,  166 => 48,  163 => 46,  156 => 45,  150 => 44,  146 => 43,  140 => 41,  129 => 39,  126 => 37,  109 => 33,  92 => 29,  88 => 28,  85 => 27,  63 => 21,  53 => 19,  47 => 16,  32 => 8,  26 => 4,  24 => 3,  22 => 2,  278 => 106,  275 => 104,  272 => 103,  270 => 91,  267 => 100,  263 => 98,  260 => 97,  257 => 96,  253 => 93,  250 => 91,  236 => 90,  233 => 89,  230 => 69,  227 => 68,  224 => 66,  222 => 84,  219 => 83,  216 => 82,  211 => 81,  208 => 79,  205 => 59,  202 => 58,  199 => 57,  196 => 55,  194 => 74,  191 => 73,  188 => 72,  182 => 53,  179 => 68,  176 => 66,  173 => 65,  170 => 63,  167 => 62,  164 => 61,  161 => 60,  158 => 59,  155 => 57,  137 => 56,  134 => 40,  131 => 53,  128 => 52,  125 => 51,  122 => 50,  119 => 36,  116 => 34,  113 => 46,  110 => 45,  107 => 44,  102 => 32,  99 => 30,  96 => 40,  94 => 39,  91 => 37,  89 => 36,  87 => 35,  84 => 33,  80 => 24,  77 => 23,  73 => 28,  70 => 22,  68 => 26,  66 => 25,  64 => 24,  62 => 23,  59 => 21,  57 => 20,  54 => 18,  50 => 18,  46 => 16,  43 => 14,  41 => 13,  39 => 12,  37 => 11,  35 => 10,  33 => 9,  30 => 7,  28 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
