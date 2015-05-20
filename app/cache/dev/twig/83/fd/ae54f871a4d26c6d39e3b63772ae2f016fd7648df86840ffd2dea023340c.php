<?php

/* ::base.html.twig */
class __TwigTemplate_83fdae54f871a4d26c6d39e3b63772ae2f016fd7648df86840ffd2dea023340c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <meta name=\"viewport\" content=\"initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=1\">
        <meta name=\"SKYPE_TOOLBAR\" content=\"SKYPE_TOOLBAR_PARSER_COMPATIBLE\">
        <meta content=\"telephone=no\" name=\"format-detection\">
        <meta name=\"keywords\" content=\"\">
        <meta name=\"description\" content=\"\">
        <meta name=\"copyright\" content=\"\">
        <meta name=\"author\" content=\"\">
        <meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
        <!-- <link rel=\"apple-touch-icon\" href=\"http://xsoft.org/assets/img/xsoft_touch-icon-iphone.png\">
        <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"http://xsoft.org/assets/img/xsoft_touch-icon-ipad.png\">
        <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"http://xsoft.org/assets/img/xsoft_touch-icon-iphone-retina.png\">
        <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"http://xsoft.org/assets/img/xsoft_touch-icon-ipad-retina.png\"> -->

        <!--[if lte IE 8]>
        <meta http-equiv=\"refresh\" content=\"0; url=http://browsehappy.com/\">
        <![endif]-->
        <!--[if IE]>
        <script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
        <![endif]-->

        
        <script type=\"text/javascript\" async=\"\" src=\"./XSoft_files/watch.js\"></script><script>
            document.createElement('aside');
            document.createElement('section');
        </script>
        <title>SEGUREX~";
        // line 30
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 31
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 39
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />

    </head>
    <body class=\"viewing-page-1\" data-section=\"/\">
        ";
        // line 43
        $this->displayBlock('body', $context, $blocks);
        // line 44
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 45
        echo "    </body>
</html>
";
    }

    // line 30
    public function block_title($context, array $blocks = array())
    {
    }

    // line 31
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 32
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/main.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
            <link type=\"text/css\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/onepage-scroll.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
            <link type=\"text/css\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
            <link type=\"text/css\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/media-queries.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
            <link type=\"text/css\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/scrollbar.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
            <link type=\"text/css\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
        ";
    }

    // line 43
    public function block_body($context, array $blocks = array())
    {
    }

    // line 44
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 43,  104 => 36,  100 => 35,  84 => 31,  70 => 44,  58 => 31,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 44,  102 => 32,  71 => 19,  67 => 15,  63 => 15,  59 => 14,  38 => 5,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 43,  56 => 9,  87 => 32,  21 => 2,  26 => 6,  93 => 28,  88 => 6,  78 => 21,  46 => 7,  27 => 4,  44 => 12,  31 => 5,  28 => 3,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 40,  91 => 27,  62 => 23,  49 => 19,  24 => 4,  25 => 3,  19 => 1,  79 => 30,  72 => 16,  69 => 25,  47 => 9,  40 => 8,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 37,  101 => 32,  98 => 31,  96 => 34,  83 => 25,  74 => 14,  66 => 15,  55 => 15,  52 => 21,  50 => 10,  43 => 8,  41 => 7,  35 => 4,  32 => 4,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 34,  106 => 36,  103 => 32,  99 => 31,  95 => 28,  92 => 33,  86 => 28,  82 => 22,  80 => 19,  73 => 45,  64 => 17,  60 => 39,  57 => 11,  54 => 30,  51 => 14,  48 => 13,  45 => 17,  42 => 7,  39 => 9,  36 => 5,  33 => 4,  30 => 7,);
    }
}
