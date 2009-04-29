// $Id: aria-roles.js,v 1.1.2.2 2009/04/29 21:38:46 jmburnz Exp $

/**
 * Insert WAI-ARIA Landmark Roles (Roles for Accessible Rich Internet Applications)
	*
	* http://www.w3.org/TR/2006/WD-aria-role-20060926/
	* 
	* Due to validation errors with WAI-ARIA roles and the W3C XHTML validator 
	* we use JavaScript to insert the roles. This is a work in process and will 
	* be deprecated at some stage.
	*
	* To use uncomment the script in genesis.info
 */
if (Drupal.jsEnabled) {
  $(document).ready(function() {
    $("#branding").attr("role","banner");
    $("#main-content").attr("role","main");
		  $(".block, .sidebar, .region").attr("role","complementary");
    $("#search, #block-search-0").attr("role","search");
    $("#nav, #breadcrumb, .block-menu, #block-user-1, .block-book, .block-forum, .block-blog, .block-statistics-0, .block-aggregator, .node ul.links, ul.pager").attr("role","navigation");
		  $("#footer-message").attr("role","contentinfo");
    $(".node").attr("role","article");
		  $(".block-system").removeAttr("role","complementary");
  }); 
}