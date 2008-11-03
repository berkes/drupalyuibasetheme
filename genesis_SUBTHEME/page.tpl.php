<?php
// $Id: page.tpl.php,v 1.7 2008/11/03 23:50:18 jmburnz Exp $

/**
 * @file page.tpl.php
 * Theme implementation to display a single Drupal page.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <!--[if IE]>
    <link rel="stylesheet" href="<?php print $base_path . $directory; ?>/ie.css" type="text/css" />
  <![endif]-->
  <?php print $scripts; ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
<?php
/**
 * Change the body id selector to your preferred layout.
 * E.g body id="genesis_1"
 *
 * @see layout.css
 */ 
?>
<body id="genesis_1" <?php print $page_classes; ?>>
  <div id="container" class="width <?php print $body_classes; ?> <?php //print 'grid' ;?>">

    <?php if (!empty($leaderboard)): ?>
		    <div id="leaderboard">
			     <?php print $leaderboard; ?>
		    </div>
    <?php endif; ?>
				
    <div id="header-nav" class="<?php print $header_classes; ?>">
				
						<div id="header" class="clear-block">
								<div class="header-inner inner">
								
										<?php if ($site_logo || $site_name || $site_slogan): ?>
												<div id="branding">
														<?php
														/**
															* See "function genesis_preprocess_page" if you need to modify 
															* the HTML for the logo and site_name. To customise, use your 
															* subthemes preprocess_page function.
															*/
														?>
														<?php if (!empty($site_logo)): ?>
																<div id="logo"><?php print $site_logo; ?></div>
														<?php endif; ?>
				
														<?php if (!empty($site_name)): print $site_name; endif; ?>
				
														<?php if (!empty($site_slogan)): ?>
																<div id="site-slogan"><?php print $site_slogan; ?></div>
														<?php endif; ?>
														
												</div> <!-- /branding -->
										<?php endif; ?>
		
										<?php if (!empty($search_box)): ?>
												<div id="search-box-top">
														<div id="search-box-inner">
																<?php print $search_box; ?>
														</div>
												</div>
										<?php endif; ?> <!-- /search-box -->
		
										<?php if (!empty($header)): ?>
												<div id="header-blocks">
														<div class="header-blocks-inner">
																<?php print $header; ?>
														</div>
												</div>
										<?php endif; ?>
		
								</div> <!-- /header-inner -->
						</div>  <!-- /header -->
		
						<?php if ($primary_menu || $secondary_menu): ?>
								<div id="nav" class="menu <?php print $nav_class; ?>">
										<div class="nav-inner">
				
												<?php if (!empty($primary_menu)): ?>
														<div id="primary" class="clear-block">
														  <div class="primary-inner">
																  <?php print $primary_menu; ?>
														  </div>
														</div>
												<?php endif; ?>
				
												<?php if (!empty($secondary_menu)): ?>
														<div id="secondary" class="clear-block">
														  <div class="secondary-inner">
																  <?php print $secondary_menu; ?>
																</div>
														</div>
												<?php endif; ?>
				
										</div>
								</div> <!-- /navigation -->
						<?php endif; ?>
				
    </div> <!-- /header-nav -->
				
				<?php if (!empty($breadcrumb)): ?>
						<div id="breadcrumb">
								<?php print $breadcrumb; ?>
						</div> <!-- /breadcrumb -->
				<?php endif; ?>
		
				<?php if (!empty($secondary_content)): ?>
						<div id="secondary-content" class="clear">
								<div class="inner">
										<?php print $secondary_content; ?>
								</div>
						</div> <!-- /secondary-content -->
				<?php endif; ?>

				<div id="columns" class="clear clear-block">
						<div id="content">
								<div id="content-inner">
	
										<?php if (!empty($mission)): ?>
										  <div id="mission"><?php print $mission; ?></div>
									 <?php endif; ?>
	
										<?php if (!empty($content_top)): ?>
												<div id="content-top">
														<?php print $content_top; ?>
												</div> <!-- /content_top -->
										<?php endif; ?>
	
										<div id="main-content">
												<?php if (!empty($title)): ?>
												  <h1 id="page-title"><?php print $title; ?></h1>
												<?php endif; ?>
												<?php if (!empty($tabs)): ?>
												  <div class="tabs"><?php print $tabs; ?></div>
												<?php endif; ?>
												<?php if (!empty($messages)): print $messages; endif; ?>
												<?php if (!empty($help)): print $help; endif; ?>
												<?php print $content; ?>
										</div>
	
										<?php if (!empty($content_bottom)): ?>
												<div id="content-bottom">
														<?php print $content_bottom; ?>
												</div> <!-- /content_bottom -->
										<?php endif; ?>
	
										<?php if ($feed_icons): ?>
												<div id="feed-icon">
														<?php print $feed_icons; ?>
												</div>
										<?php endif; ?>

								</div>
						</div>

						<?php if (!empty($left)): ?>
								<div id="sidebar-left">
										<div class="inner">
												<?php print $left; ?>
										</div>
								</div> <!-- /sidebar-left -->
						<?php endif; ?>

						<?php if (!empty($right)): ?>
								<div id="sidebar-right">
										<div class="inner">
												<?php print $right; ?>
										</div>
								</div> <!-- /sidebar-right -->
						<?php endif; ?>

				</div> <!-- /col wrapper -->

				<?php if (!empty($tertiary_content)): ?>
						<div id="tertiary-content" class="clear">
								<div class="inner">
										<?php print $tertiary_content; ?>
								</div> 
						</div> <!-- /tertiary_content -->
				<?php endif; ?>

    <?php if ($footer || $footer_message): ?>
						<div id="foot-wrapper">
				
								<?php if (!empty($footer)): ?>
										<div id="footer">
												<?php print $footer; ?>
										</div> <!-- /footer -->
								<?php endif; ?>
								
								<?php if (!empty($footer_message)): ?>
								<div id="footer-message">
										<?php print $footer_message; ?>
								</div> <!-- /footer-message -->
								<?php endif; ?>
		
						</div> <!-- /foot-wrapper -->
    <?php endif; ?>
				
  </div> <!-- /container -->
		
		<?php print $closure ?>
		
</body>
</html>