<?php

/* themes/fortytwo/templates/layout/page.html.twig */
class __TwigTemplate_edcc19c97a5247fce610077a2f43c88bfc9d5cefcbd6e53437e009e0e722981c extends Twig_Template
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
        $tags = array("if" => 53);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
                array(),
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

        // line 48
        echo "
<header>
  ";
        // line 50
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array()), "html", null, true));
        echo "
</header>

";
        // line 53
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "navigation", array())) {
            // line 54
            echo "  <div class=\"navigation\">
    ";
            // line 55
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "navigation", array()), "html", null, true));
            echo "
  </div>
";
        }
        // line 58
        echo "
<div class=\"wrapper\">
  ";
        // line 60
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "breadcrumb", array()), "html", null, true));
        echo "

  <section class=\"content column\">
    ";
        // line 63
        if ((isset($context["messages"]) ? $context["messages"] : null)) {
            // line 64
            echo "      <div class=\"messages\">
        ";
            // line 65
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["messages"]) ? $context["messages"] : null), "html", null, true));
            echo "
      </div>
    ";
        }
        // line 68
        echo "    ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array()), "html", null, true));
        echo "

    ";
        // line 70
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array())) {
            // line 71
            echo "      <div class=\"highlighted\">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array()), "html", null, true));
            echo "</div>
    ";
        }
        // line 73
        echo "
    <a id=\"main-content\"></a>

    ";
        // line 76
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true));
        echo "
  </section>

  ";
        // line 79
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array())) {
            // line 80
            echo "    <aside class=\"column sidebar first\">
      ";
            // line 81
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array()), "html", null, true));
            echo "
    </aside>  <!-- End first aside. -->
  ";
        }
        // line 84
        echo "
  ";
        // line 85
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array())) {
            // line 86
            echo "    <aside class=\"column sidebar second\">
      ";
            // line 87
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array()), "html", null, true));
            echo "
    </aside> <!-- End second aside. -->
  ";
        }
        // line 90
        echo "
</div>

";
        // line 93
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array()) || (isset($context["theme_credit"]) ? $context["theme_credit"] : null))) {
            // line 94
            echo "  <footer>
    ";
            // line 95
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array()), "html", null, true));
            echo "
    ";
            // line 96
            if ((isset($context["theme_credit"]) ? $context["theme_credit"] : null)) {
                // line 97
                echo "      <div class = \"theme-credit\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["theme_credit"]) ? $context["theme_credit"] : null), "html", null, true));
                echo "</div>
    ";
            }
            // line 99
            echo "  </footer>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/fortytwo/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 99,  151 => 97,  149 => 96,  145 => 95,  142 => 94,  140 => 93,  135 => 90,  129 => 87,  126 => 86,  124 => 85,  121 => 84,  115 => 81,  112 => 80,  110 => 79,  104 => 76,  99 => 73,  93 => 71,  91 => 70,  85 => 68,  79 => 65,  76 => 64,  74 => 63,  68 => 60,  64 => 58,  58 => 55,  55 => 54,  53 => 53,  47 => 50,  43 => 48,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation to display a single page.*/
/*  **/
/*  * The doctype, html, head and body tags are not in this template. Instead they*/
/*  * can be found in the html.html.twig template in this directory.*/
/*  **/
/*  * Available variables:*/
/*  **/
/*  * General utility variables:*/
/*  * - base_path: The base URL path of the Drupal installation. Will usually be*/
/*  *   "/" unless you have installed Drupal in a sub-directory.*/
/*  * - is_front: A flag indicating if the current page is the front page.*/
/*  * - logged_in: A flag indicating if the user is registered and signed in.*/
/*  * - is_admin: A flag indicating if the user has permission to access*/
/*  *   administration pages.*/
/*  **/
/*  * Site identity:*/
/*  * - front_page: The URL of the front page. Use this instead of base_path when*/
/*  *   linking to the front page. This includes the language domain or prefix.*/
/*  **/
/*  * Page content (in order of occurrence in the default page.html.twig):*/
/*  * - messages: Status and error messages. Should be displayed prominently.*/
/*  * - node: Fully loaded node, if there is an automatically-loaded node*/
/*  *   associated with the page and the node ID is the second argument in the*/
/*  *   page's path (e.g. node/12345 and node/12345/revisions, but not*/
/*  *   comment/reply/12345).*/
/*  **/
/*  * Regions:*/
/*  * - page.header: Items for the header region.*/
/*  * - page.primary_menu: Items for the primary menu region.*/
/*  * - page.secondary_menu: Items for the secondary menu region.*/
/*  * - page.highlighted: Items for the highlighted content region.*/
/*  * - page.help: Dynamic help text, mostly for admin pages.*/
/*  * - page.content: The main content of the current page.*/
/*  * - page.sidebar_first: Items for the first sidebar.*/
/*  * - page.sidebar_second: Items for the second sidebar.*/
/*  * - page.footer: Items for the footer region.*/
/*  * - page.breadcrumb: Items for the breadcrumb region.*/
/*  **/
/*  * @see template_preprocess_page()*/
/*  * @see html.html.twig*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* */
/* <header>*/
/*   {{ page.header }}*/
/* </header>*/
/* */
/* {% if page.navigation %}*/
/*   <div class="navigation">*/
/*     {{ page.navigation }}*/
/*   </div>*/
/* {% endif %}*/
/* */
/* <div class="wrapper">*/
/*   {{ page.breadcrumb }}*/
/* */
/*   <section class="content column">*/
/*     {% if messages %}*/
/*       <div class="messages">*/
/*         {{ messages }}*/
/*       </div>*/
/*     {% endif %}*/
/*     {{ page.help }}*/
/* */
/*     {% if page.highlighted %}*/
/*       <div class="highlighted">{{ page.highlighted }}</div>*/
/*     {% endif %}*/
/* */
/*     <a id="main-content"></a>*/
/* */
/*     {{ page.content }}*/
/*   </section>*/
/* */
/*   {% if page.sidebar_first %}*/
/*     <aside class="column sidebar first">*/
/*       {{ page.sidebar_first }}*/
/*     </aside>  <!-- End first aside. -->*/
/*   {% endif %}*/
/* */
/*   {% if page.sidebar_second %}*/
/*     <aside class="column sidebar second">*/
/*       {{ page.sidebar_second }}*/
/*     </aside> <!-- End second aside. -->*/
/*   {% endif %}*/
/* */
/* </div>*/
/* */
/* {% if page.footer or theme_credit %}*/
/*   <footer>*/
/*     {{ page.footer }}*/
/*     {% if theme_credit %}*/
/*       <div class = "theme-credit">{{ theme_credit }}</div>*/
/*     {% endif %}*/
/*   </footer>*/
/* {% endif %}*/
/* */
