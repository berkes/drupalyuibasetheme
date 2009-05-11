// $Id: aria-roles.js,v 1.1.2.6 2009/05/11 20:28:32 jmburnz Exp $

/**
 * Insert WAI-ARIA Landmark Roles (Roles for Accessible Rich Internet Applications)
 *
 * http://www.w3.org/TR/2006/WD-aria-role-20060926/
 * 
 * Due to validation errors with WAI-ARIA roles and the W3C XHTML validator 
 * we use JavaScript to insert the roles. This is a work in process and will 
 * be deprecated at some stage.
 *
 * To unset comment out aria-roles.js in genesis.info
 */
if (Drupal.jsEnabled) {
  $(document).ready(function() {

    // Set role=banner on #branding wrapper div.
    $("#branding").attr("role","banner");

    // Set role=complementary on #main-content blocks, sidebars and regions.
    $(".block, .sidebar, .region").attr("role","complementary");

    // Remove role=complementary from system blocks.
    $(".block-system").removeAttr("role","complementary");

    // Set role=main on #main-content div.
    $("#main-content").attr("role","main");

    // Set role=search on search block and box.
    $("#search-theme-form, #search-block-form, #search-form").attr("role","search");

    // Set role=contentinfo on the footer message.
    $("#footer-message").attr("role","contentinfo");

    // Set role=article on nodes.
    $(".node").attr("role","article");

    // Set role=nav on navigation-like blocks.
    $("#nav, #breadcrumb, .block-menu, #block-user-1, .block-book, .block-forum, .block-blog, .block-comment, .block-statistics-0, .block-aggregator, .node ul.links, ul.pager").attr("role","navigation");
  
  });
}