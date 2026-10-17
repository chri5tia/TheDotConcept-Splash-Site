<?php

/* themes/fortytwo/templates/layout/html.html.twig */
class __TwigTemplate_b89b2ac39b440844d148c0836f8b2457bcf698334898f1f13d30169323f0a3ed extends Twig_Template
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
        $tags = array("set" => 43, "if" => 60);
        $filters = array("clean_class" => 45, "raw" => 53, "safe_join" => 54, "t" => 83);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set', 'if'),
                array('clean_class', 'raw', 'safe_join', 't'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 41
        echo "
";
        // line 43
        $context["body_classes"] = array(0 => ((        // line 44
(isset($context["logged_in"]) ? $context["logged_in"] : null)) ? ("user-logged-in") : ("")), 1 => (( !        // line 45
(isset($context["root_path"]) ? $context["root_path"] : null)) ? ("path-frontpage") : (("path-" . \Drupal\Component\Utility\Html::getClass((isset($context["root_path"]) ? $context["root_path"] : null))))), 2 => ((        // line 46
(isset($context["node_type"]) ? $context["node_type"] : null)) ? (("node--type-" . \Drupal\Component\Utility\Html::getClass((isset($context["node_type"]) ? $context["node_type"] : null)))) : ("")), 3 => ((        // line 47
(isset($context["db_offline"]) ? $context["db_offline"] : null)) ? ("db-offline") : ("")));
        // line 50
        echo "<!DOCTYPE html>
<html";
        // line 51
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["html_attributes"]) ? $context["html_attributes"] : null), "html", null, true));
        echo ">
<head>
  <head-placeholder token=\"";
        // line 53
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">
    <title>";
        // line 54
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('drupal_core')->safeJoin($this->env, (isset($context["head_title"]) ? $context["head_title"] : null), " | ")));
        echo "</title>
    <css-placeholder token=\"";
        // line 55
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">
      <js-placeholder token=\"";
        // line 56
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">
</head>
<body";
        // line 58
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["body_classes"]) ? $context["body_classes"] : null)), "method"), "html", null, true));
        echo ">

";
        // line 60
        if ((isset($context["grid"]) ? $context["grid"] : null)) {
            // line 61
            echo "  <div id=\"svg-grid-background\">
    <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" version=\"1.1\" x=\"0px\" y=\"0px\" width=\"1218px\" height=\"100%\" enable-background=\"new 0 0 1218 100%\" xml:space=\"preserve\">
      <rect x=\"0\"   fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"10\"  fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"20\"  fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"30\"  fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"40\"  fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"50\"  fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"60\"  fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"70\"  fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"80\"  fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"90\"  fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"100\" fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"110\" fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"120\" fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"130\" fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"140\" fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      <rect x=\"150\" fill=\"#29ABE2\" width=\"5\" height=\"100%\"/>
      </svg>
  </div>
";
        }
        // line 82
        echo "
<a href=\"#main-content\" class=\"visually-hidden focusable skip-link\">";
        // line 83
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Skip to main content")));
        echo "</a>
";
        // line 84
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page_top"]) ? $context["page_top"] : null), "html", null, true));
        echo "
";
        // line 85
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page"]) ? $context["page"] : null), "html", null, true));
        echo "
";
        // line 86
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page_bottom"]) ? $context["page_bottom"] : null), "html", null, true));
        echo "

<js-bottom-placeholder token=\"";
        // line 88
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">

";
        // line 90
        if ((isset($context["responsive_identifier"]) ? $context["responsive_identifier"] : null)) {
            // line 91
            echo "  <div class=\"responsive-identifier\"></div>
";
        }
        // line 93
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "themes/fortytwo/templates/layout/html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 93,  134 => 91,  132 => 90,  127 => 88,  122 => 86,  118 => 85,  114 => 84,  110 => 83,  107 => 82,  84 => 61,  82 => 60,  77 => 58,  72 => 56,  68 => 55,  64 => 54,  60 => 53,  55 => 51,  52 => 50,  50 => 47,  49 => 46,  48 => 45,  47 => 44,  46 => 43,  43 => 41,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation to display the basic html structure of a single*/
/*  * Drupal page.*/
/*  **/
/*  * Variables:*/
/*  * - $css: An array of CSS files for the current page.*/
/*  * - $language: (object) The language the site is being displayed in.*/
/*  *   $language->language contains its textual representation.*/
/*  *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.*/
/*  * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.*/
/*  * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.*/
/*  * - $head_title: A modified version of the page title, for use in the TITLE*/
/*  *   tag.*/
/*  * - $head_title_array: (array) An associative array containing the string parts*/
/*  *   that were used to generate the $head_title variable, already prepared to be*/
/*  *   output as TITLE tag. The key/value pairs may contain one or more of the*/
/*  *   following, depending on conditions:*/
/*  *   - title: The title of the current page, if any.*/
/*  *   - name: The name of the site.*/
/*  *   - slogan: The slogan of the site, if any, and if there is no title.*/
/*  * - $head: Markup for the HEAD section (including meta tags, keyword tags, and*/
/*  *   so on).*/
/*  * - $styles: Style tags necessary to import all CSS files for the page.*/
/*  * - $scripts: Script tags necessary to load the JavaScript files and settings*/
/*  *   for the page.*/
/*  * - $page_top: Initial markup from any modules that have altered the*/
/*  *   page. This variable should always be output first, before all other dynamic*/
/*  *   content.*/
/*  * - $page: The rendered page content.*/
/*  * - $page_bottom: Final closing markup from any modules that have altered the*/
/*  *   page. This variable should always be output last, after all other dynamic*/
/*  *   content.*/
/*  * - $classes String of classes that can be used to style contextually through*/
/*  *   CSS.*/
/*  **/
/*  * @see template_preprocess_html()*/
/*  *//* */
/* #}*/
/* */
/* {%*/
/*   set body_classes = [*/
/*     logged_in ? 'user-logged-in',*/
/*     not root_path ? 'path-frontpage' : 'path-' ~ root_path|clean_class,*/
/*     node_type ? 'node--type-' ~ node_type|clean_class,*/
/*     db_offline ? 'db-offline',*/
/*   ]*/
/* %}*/
/* <!DOCTYPE html>*/
/* <html{{ html_attributes }}>*/
/* <head>*/
/*   <head-placeholder token="{{ placeholder_token|raw }}">*/
/*     <title>{{ head_title|safe_join(' | ') }}</title>*/
/*     <css-placeholder token="{{ placeholder_token|raw }}">*/
/*       <js-placeholder token="{{ placeholder_token|raw }}">*/
/* </head>*/
/* <body{{ attributes.addClass(body_classes) }}>*/
/* */
/* {% if grid %}*/
/*   <div id="svg-grid-background">*/
/*     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="1218px" height="100%" enable-background="new 0 0 1218 100%" xml:space="preserve">*/
/*       <rect x="0"   fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="10"  fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="20"  fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="30"  fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="40"  fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="50"  fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="60"  fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="70"  fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="80"  fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="90"  fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="100" fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="110" fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="120" fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="130" fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="140" fill="#29ABE2" width="5" height="100%"/>*/
/*       <rect x="150" fill="#29ABE2" width="5" height="100%"/>*/
/*       </svg>*/
/*   </div>*/
/* {% endif %}*/
/* */
/* <a href="#main-content" class="visually-hidden focusable skip-link">{{ 'Skip to main content'|t }}</a>*/
/* {{ page_top }}*/
/* {{ page }}*/
/* {{ page_bottom }}*/
/* */
/* <js-bottom-placeholder token="{{ placeholder_token|raw }}">*/
/* */
/* {% if responsive_identifier %}*/
/*   <div class="responsive-identifier"></div>*/
/* {% endif %}*/
/* */
/* </body>*/
/* </html>*/
/* */
